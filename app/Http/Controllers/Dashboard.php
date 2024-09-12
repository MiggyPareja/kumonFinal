<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\DueStudents;
use Carbon\Carbon;

class Dashboard extends Controller
{
    public function index()
    {
        $studentsDue = DueStudents::all();
        return view('Dashboard',compact('studentsDue'));
    }

    public function create()
    {
        // Step 1: Retrieve all students that are eligible for due
        $students = Students::where('status', 'C') // Assuming active students only
                           ->whereNotNull('amount_tbp') // Ensure they have an amount to be paid
                           ->whereNotNull('payment_date') // Ensure there is a payment date
                           ->get();

        // Step 2: Prepare due_student entries
        $dueEntries = [];
        foreach ($students as $student) {
            // Parse the month and year from the payment_date
            $paymentDate = Carbon::parse($student->payment_date); // Use Carbon to handle the date
             $monthOf = $paymentDate->startOfMonth()->format('Y-m-d'); // Display month as "October 2024" format

            // Step 3: Adjust 'no_of_months' if needed (default is set to 1, adjust logic as per requirement)
            $noOfMonths = 1; // You can modify this logic depending on your business rules.

            $dueEntries[] = [
                'student_id' => $student->student_id,
                'balance' => $student->amount_tbp, // Use the 'amount_tbp' as the balance
                'month_of' => $monthOf, // Use parsed payment date month (formatted as Month Year)
                'no_of_months' => $noOfMonths, // Dynamic logic for no_of_months can be added here
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Step 4: Insert entries into due_student table
        DueStudents::insert($dueEntries);

        // Step 5: Return success response with formatted data
        return response()->json([
            'message' => 'Due entries created successfully!',
            'entries' => $dueEntries, // Return the entries as well for review
            'entries_count' => count($dueEntries)
        ]);
    }

}
