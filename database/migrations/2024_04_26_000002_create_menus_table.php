<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('menus')) {
            Schema::create('menus', function (Blueprint $table) {
                $table->id();
                $table->enum('meal_type', ['breakfast', 'lunch', 'dinner']);
                $table->string('menu_item');
                $table->text('description')->nullable();
                $table->integer('calories')->nullable();
                $table->decimal('protein', 5, 2)->nullable();
                $table->decimal('carbs', 5, 2)->nullable();
                $table->decimal('fats', 5, 2)->nullable();
                $table->date('date');
                $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
                $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
}; 