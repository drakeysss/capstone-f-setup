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
        Schema::table('weekly_menu_orders', function (Blueprint $table) {
            $table->text('ingredients')->nullable()->after('menu_item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weekly_menu_orders', function (Blueprint $table) {
            $table->dropColumn('ingredients');
        });
    }
};
