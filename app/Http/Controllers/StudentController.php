<?php

namespace App\Http\Controllers;
use App\Models\Students;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentView = Students::all();
        return view('Students',compact('studentView'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function generateStudentId()
{
    // Get the current year
    $year = date('Y');

    // Get the last student ID for this year, if it exists
    $lastStudent = Students::where('student_id', 'LIKE', $year . '%')
        ->orderBy('student_id', 'desc')
        ->first();

    // Determine the next sequence number
    if ($lastStudent) {
        // Extract the sequence number from the last ID
        $lastSequence = (int)substr($lastStudent->student_id, 4);
        $newSequence = $lastSequence + 1;
    } else {
        // No students for this year, start at 1
        $newSequence = 1;
    }

    // Pad the sequence number with leading zeros
    $newSequencePadded = str_pad($newSequence, 9, '0', STR_PAD_LEFT);

    // Combine year and padded sequence number to form the new ID
    $newStudentId = $year . $newSequencePadded;

    return $newStudentId;
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Generate student ID
    $studentId = $this->generateStudentId();


    $no_of_months = 1;


    $currentDate = Carbon::now();
    $nextMonth = $currentDate->addMonth()->format('F');

    // Create the new student record with all the fields, including the auto-filled ones
    Students::create([
        'student_id' => $studentId,
        'last_name' => $request->input('last_name'),
        'first_name' => $request->input('first_name'),
        'student_subject' => $request->input('student_subject'),
        'enroll_date' => $request->input('enroll_date'),
        'amount_tbp' => $request->input('amount_tbp'),
        'status' => $request->input('status'),
        'grade_level' => $request->input('grade_level'),
        'payment_date' => $request->input('payment_date'),
        'no_of_months' => $no_of_months,
        'month_of' => $nextMonth,
        'balance' => $request->input('balance'),
    ]);

    // Redirect to the Students index page after successful creation
    return redirect()->route('Students.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
