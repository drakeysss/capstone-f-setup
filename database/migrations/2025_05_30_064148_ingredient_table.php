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
            $table->enum('ingredient_category', ['Meat', 'Vegetables and Legumes', 'Dry Goods', 'Fruits', 'Dairy', 'Fish', 'Seasonings and Condiments','Pantry Staples'])->nullable();
            $table->enum('ingredient_unit', ['pcs','kg','can/s','pack/s', 'tray/s', 'container/s', 'gallon/s', 'box/es', 'bottle/s', 'dozen/s'])->nullable();
            $table->decimal('ingredient_price', 8, 2)->nullable();
            $table->unsignedInteger('ingredient_quantity')->nullable();
            $table->timestamps();
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
