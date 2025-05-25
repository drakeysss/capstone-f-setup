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
        $tableName = 'recipes';
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('recipe_week');
            $table->string('recipe_day');
            $table->string('recipe_type');
            $table->string('recipe_name');
            $table->string('recipe_status');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }

};
