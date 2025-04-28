<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('student_meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('meal_id');
            $table->string('meal_name');
            $table->date('consumption_date');
            $table->string('meal_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_meals');
    }
}; 