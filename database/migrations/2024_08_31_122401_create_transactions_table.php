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
    Schema::create('transaction', function (Blueprint $table) {
        $table->id(); // Primary key, auto-incrementing
        $table->date('date_of_payment'); // Date of payment
        $table->enum('payment_method', ['Cash', 'Gcash', 'Bank']); // Payment method
        $table->string('teacher'); // Teacher associated with payment
        $table->double('payment_amount'); // Payment amount
        $table->string('remarks', 255); // Remarks, made nullable // Add automatic remarks if payment amount  < amount-tbp //automatic input of 'Paid for 'payment_month'' if paid
        $table->date('payment_month'); // Next date of payment, made nullable
        $table->softDeletes(); // Adds 'deleted_at' column for soft deletes
        $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
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
