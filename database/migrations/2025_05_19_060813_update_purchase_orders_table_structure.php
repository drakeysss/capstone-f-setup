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
        Schema::table('purchase_orders', function (Blueprint $table) {
            if (!Schema::hasColumn('purchase_orders', 'order_date')) {
                $table->dateTime('order_date')->after('id');
            }
            if (!Schema::hasColumn('purchase_orders', 'total_cost')) {
                $table->decimal('total_cost', 10, 2)->after('order_date');
            }
            if (Schema::hasColumn('purchase_orders', 'status')) {
                $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending')->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_orders', function (Blueprint $table) {
            if (Schema::hasColumn('purchase_orders', 'order_date')) {
                $table->dropColumn('order_date');
            }
            if (Schema::hasColumn('purchase_orders', 'total_cost')) {
                $table->dropColumn('total_cost');
            }
        });
    }
};
