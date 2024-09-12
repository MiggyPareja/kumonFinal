<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('student_id')->primary(); // Primary key, 13-character string
            $table->string('last_name', 255);
            $table->string('first_name', 255);
            // Student Name - First Name, Last Name
            $table->enum('student_subject', ['Math', 'Reading', 'Math & Reading']); // Subject (single value)
            $table->date('enroll_date'); // Enroll date
            $table->double('amount_tbp'); // To be Paid
            $table->enum('status', ['C', 'A']); // Status (single value)
            $table->enum('grade_level', [
                'PK3', 'PK2', 'PK1','P1', 'P2', 'P3',
                'P4', 'P5', 'P6', 'P7', 'P8', 'P9',
                'P10', 'P11', 'P12' ,'P13'
            ]); // Grade Level
            $table->date('payment_date'); // Payment date
            $table->softDeletes(); // Adds a 'deleted_at' column for soft deletes
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students'); // Corrected table name from 'student' to 'students'
    }
};
