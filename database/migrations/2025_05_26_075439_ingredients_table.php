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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id('ingredient_id');
            $table->string('ingredient_name');
            $table->string('ingredient_type')->nullable();
            $table->string('ingredient_unit')->nullable();
            $table->decimal('ingredient_price', 8, 2)->nullable();
            $table->unsignedInteger('ingredient_quantity')->nullable();
            $table->timestamps();

            $table->foreignId('recipe_id')
                ->constrained('recipes', 'recipe_id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
