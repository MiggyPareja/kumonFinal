<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    use HasFactory, SoftDeletes;

    // The table associated with the model (optional if it follows Laravel's naming convention)
    protected $table = 'transactions';

    // The attributes that are mass assignable
    protected $fillable = [
        'date_of_payment',
        'payment_method',
        'teacher',
        'payment_amount',
        'remarks',
        'next_date_of_payment',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'date_of_payment' => 'date',
        'next_date_of_payment' => 'date',
        'payment_amount' => 'float',
    ];
}
