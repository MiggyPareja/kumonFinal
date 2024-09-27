<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'student_subject',
        'student_id',
        'enroll_date',
        'amount_tbp',
        'status',
        'payment_date',
        'grade_level',
        'balance',
        'month_of',
        'no_of_months'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'enroll_date' => 'date',
        'payment_date' => 'date',
        'amount_tbp' => 'double',
        'balance' => 'decimal:2',
        'month_of' => 'date',
        'no_of_months' => 'integer'
    ];
}
