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
    $table->string('student_id')->primary(); // Primary key, 12-character string
    $table->string('student_name', 255); // Student Name
    $table->enum('student_subject', ['Math', 'Reading', 'Math & Reading']); // Subject (single value)
    $table->date('enroll_date'); // Enroll date
    $table->double('amount_tbp'); // To be Paid
    $table->enum('status', ['C', 'A']); // Status (single value)
    $table->enum('grade_level', [
        'PK-3', 'PK-2', 'PK-1', 'Kinder', 'Grade 1', 'Grade 2', 'Grade 3',
        'Grade 4', 'Grade 5', 'Grade 6', 'Grade 7', 'Grade 8', 'Grade 9',
        'Grade 10', 'Grade 11', 'Grade 12'
    ]); // Grade Level
    $table->softDeletes(); // Adds a 'deleted_at' column for soft deletes
    $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
});
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
