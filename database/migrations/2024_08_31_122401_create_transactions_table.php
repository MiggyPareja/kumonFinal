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
    Schema::create('transactions', function (Blueprint $table) {
    $table->id(); // Primary key, auto-incrementing
    $table->string('student_id', 12); // Foreign key referencing students table
    $table->date('date_of_payment'); // Date of payment
    $table->enum('payment_method', ['Cash', 'Gcash', 'Bank']); // Payment method
    $table->string('teacher'); // Teacher associated with payment
    $table->double('payment_amount'); // Payment amount
    $table->string('remarks', 255)->nullable(); // Remarks, made nullable
    $table->date('payment_month'); // Next date of payment
    $table->softDeletes(); // Adds 'deleted_at' column for soft deletes
    $table->timestamps(); // Adds 'created_at' and 'updated_at' columns

    // Adding the foreign key constraint
    $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
