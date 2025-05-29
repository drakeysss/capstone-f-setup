<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('weekly_menus', function (Blueprint $table) {
            $table->id();
            $table->string('week_type'); // 'week1' or 'week2'
            $table->string('day'); // monday, tuesday, etc.
            $table->string('meal_type'); // breakfast, lunch, dinner
            $table->string('menu');
            $table->text('ingredients');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weekly_menus');
    }
}; 