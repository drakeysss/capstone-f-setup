<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('weekly_menu_orders', function (Blueprint $table) {
            $table->id();
            $table->string('week');
            $table->string('day');
            $table->string('meal_type');
            $table->string('menu_item');
            $table->boolean('is_editable')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weekly_menu_orders');
    }
}; 