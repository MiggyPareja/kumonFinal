<?php

namespace App\Http\Controllers;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Students');
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
        // Extract the sequence number from the last ID (e.g., 201500000001 -> 1)
        $lastSequence = (int)substr($lastStudent->student_id, 4);
        $newSequence = $lastSequence + 1;
    } else {
        // No students for this year, start at 1
        $newSequence = 1;
    }

    // Pad the sequence number with leading zeros
    $newSequencePadded = str_pad($newSequence, 7, '0', STR_PAD_LEFT);

    // Combine year and padded sequence number to form the new ID
    $newStudentId = $year . $newSequencePadded;

    return $newStudentId;
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $studentId = $this->generateStudentId();

    // Create the new student record
        Students::create([
        'student_id' => $studentId,
        'student_name' => $request->input('student_name'),
        'student_subject' => $request->input('student_subject'),
        'enroll_date' => $request->input('enroll_date'),
        'amount_tbp' => $request->input('amount_tbp'),
        'status' => $request->input('status'),
        'grade_level' => $request->input('grade_level'),
    ]);

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
