<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BaReportType;

class BaReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BaReportType::create(['name' => 'BA offtake Reports']);
        BaReportType::create(['name' => 'OSA 35 Reports']);
        BaReportType::create(['name' => 'Confirm PO Reports']);
        BaReportType::create(['name' => 'Stock Receive Reports']);
    }
}
