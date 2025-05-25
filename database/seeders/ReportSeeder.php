<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reports_reasons_list')->insert([
            [
                'report_id' => 1,
                'report_name' => 'Overproduction',
            ],
             [
                'report_id' => 2,
                'report_name' => 'Spoilage',
            ],
            [
                'report_id' => 3,
                'report_name' => 'Consumer Behavior',
            ],
            [
                'report_id' => 4,
                'report_name' => 'Waste Management',
            ],
            [
                'report_id' => 5,
                'report_name' => 'Inventory Management',
            ],
            [
                'report_id' => 6,
                'report_name' => 'Supplier Performance',
            ],
            [
                'report_id' => 7,
                'report_name' => 'Food Safety',
            ],


        ]);
    }
}
