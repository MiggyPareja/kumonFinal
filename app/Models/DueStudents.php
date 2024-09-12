<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DueStudents extends Model
{
    use HasFactory;

    // Define the table name (optional if you follow Laravel's naming convention)
    protected $table = 'due_student';

    // Define fillable fields to allow mass assignment
    protected $fillable = [
        'student_id',
        'balance',
        'month_of',
        'no_of_months',
    ];

    // Specify the data types of the fields
    protected $casts = [
        'balance' => 'decimal:2',
        'month_of' => 'date',
        'no_of_months' => 'integer',
    ];

    // Relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id', 'student_id');
    }
}
