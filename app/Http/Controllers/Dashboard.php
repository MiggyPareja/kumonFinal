<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Transactions;
use Carbon\Carbon;

class Dashboard extends Controller
{
    public function index()
    {
        $studentsDue = Students::all();
        return view('Dashboard',compact('studentsDue'));
    }
    public function pass(Request $request)
    {
    $transactions = Transactions::all();
    $students = Students::all();
    $student_id = $request->input('student_id');
    $payment_month = $request->input('payment_month');
    $payment_amount = $request->input('payment_amount');

    return view('Transactions', compact('student_id', 'payment_month', 'payment_amount','students','transactions'));
    }

    public function create()
    {
        // Retrieve all students that are eligible for dues
        $students = Students::where('status', 'C')
                           ->whereNotNull('balance')
                           ->whereNotNull('month_of')
                           ->get();

        //  Prepare due_student entries
        $dueEntries = [];
        foreach ($students as $student) {
            // Parse the month and year from the payment_date
            $paymentDate = Carbon::parse($student->payment_date);
            $monthOf = $paymentDate->startOfMonth()->format('Y-m-d'); // Store as Y-m-d format for DB

            //  Check if the entry already exists for this student and the current month
            $existingEntry = DueStudents::where('student_id', $student->student_id)
                                       ->where('month_of', $monthOf)
                                       ->first();

            if (!$existingEntry) {
                //  Determine 'no_of_months' based on student's payment history
                $lastDueEntry = DueStudents::where('student_id', $student->student_id)
                                          ->orderBy('month_of', 'desc')
                                          ->first();

                // If there's a history, calculate months since the last payment; otherwise default to 1
                if ($lastDueEntry) {
                    $lastPaymentDate = Carbon::parse($lastDueEntry->month_of);
                    $noOfMonths = $paymentDate->diffInMonths($lastPaymentDate) + 1; // Calculate months
                } else {
                    $noOfMonths = 1; // No history, default to 1 month
                }

                //  Prepare the due entries
                $dueEntries[] = [
                    'student_id' => $student->student_id,
                    'balance' => $student->amount_tbp, // Use the 'amount_tbp' as the balance
                    'month_of' => $monthOf, // Store in Y-m-d format
                    'no_of_months' => $noOfMonths, // Dynamic number of months
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        //  Insert entries into due_student table if there are any
        if (!empty($dueEntries)) {
            DueStudents::insert($dueEntries);
        }


        //  Return success response with the created data
        return response()->json([
            'message' => 'Due entries created successfully!',
            'entries' => $dueEntries, // Return the entries for review
            'entries_count' => count($dueEntries),
        ]);
    }
}
