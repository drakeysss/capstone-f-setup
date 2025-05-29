<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('waste_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reason_id')->constrained('reports_reasons_list', 'report_id');
            $table->string('meal_name');
            $table->enum('meal_type', ['Breakfast', 'Lunch', 'Dinner', 'Snack']);
            $table->decimal('quantity', 10, 2);
            $table->decimal('cost', 10, 2);
            $table->date('waste_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('waste_entries');
    }
}; 