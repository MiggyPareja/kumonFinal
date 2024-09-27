<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\Students;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
     $students = Students::select('student_id','last_name','first_name')->get();
    $transactions = Transactions::all();
     return view('Transactions', compact('students','transactions'));
     }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function pass(Request $request)
    {
        $student_id = $request->input('student_id');
    $payment_month = $request->input('payment_month');
    $payment_amount = $request->input('payment_amount');

    return view('Transactions', compact('student_id', 'payment_month', 'payment_amount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'student_id' => 'required',
        'date_of_payment' => 'required|date',
        'payment_method' => 'required|string',
        'teacher' => 'required|string',
        'reference_number' => 'required|numeric',
        'payment_amount' => 'required|numeric|min:0',
        'remarks' => 'nullable|string',
        'or_number' => 'required',
        'payment_month' => 'required',
    ]);


    Transactions::create($validatedData);


    return redirect()->route('Transactions.index');
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

