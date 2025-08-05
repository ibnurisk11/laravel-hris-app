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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->integer('month');
            $table->integer('year');
            $table->decimal('basic_salary', 15, 2);
            $table->decimal('employer_pays_fee', 15, 2);
            $table->decimal('bonus', 15, 2);
            $table->decimal('performance_allowance', 15, 2);
            $table->decimal('overtime', 15, 2);
            $table->decimal('pph21', 15, 2);
            $table->decimal('bpjs', 15, 2);
            $table->decimal('jht', 15, 2);
            $table->decimal('receivable_employee', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};