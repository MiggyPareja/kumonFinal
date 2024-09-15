<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDueStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('due_student', function (Blueprint $table) {
            $table->id();
            $table->string('student_id', 13); // Match this with the student_id field in the students table (string type)
            $table->decimal('balance', 8, 2);
            $table->date('month_of');
            $table->integer('no_of_months')->default(1);
            $table->softDeletes();
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('due_student');
    }
}
