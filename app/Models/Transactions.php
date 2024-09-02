<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    use HasFactory, SoftDeletes;

    // The table associated with the model (optional if it follows Laravel's naming convention)
    protected $table = 'transactions';

    // The attributes that are mass assignable
    protected $fillable = [
        'date_of_payment',
        'student_id',
        'payment_method',
        'teacher',
        'reference_number',
        'payment_amount',
        'remarks',
        'next_date_of_payment',
        'or_number'
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'date_of_payment' => 'date',
        'next_date_of_payment' => 'date',
        'payment_amount' => 'float',
    ];
    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
