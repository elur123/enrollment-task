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
            $table->id();
            $table->uuid('uuid');
            $table->string('student_id');
            $table->string('fullname');
            $table->string('email');
            $table->string('mobile_number');
            $table->string('address');
            $table->integer('gpa');
            $table->bigInteger('course_id');
            $table->boolean('has_scholarship');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
