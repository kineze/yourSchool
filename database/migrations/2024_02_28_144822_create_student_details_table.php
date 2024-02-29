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
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('student_nic');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->enum('blood_group', ['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-'])->nullable();
            $table->string('previous_school')->nullable();
            $table->enum('orphan', ['yes', 'no'])->default('no');
            $table->enum('religion', ['Christianity', 'Islam', 'Hinduism', 'Buddhism'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_details');
    }
};
