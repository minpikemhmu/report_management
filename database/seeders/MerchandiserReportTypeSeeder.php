<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MerchandiserReportType;

class MerchandiserReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MerchandiserReportType::updateOrCreate(['name' => 'Hygiene']);
        MerchandiserReportType::updateOrCreate(['name' => 'MSL']);
        MerchandiserReportType::updateOrCreate(['name' => 'OSA']);
        MerchandiserReportType::updateOrCreate(['name' => 'Outlet']);
        MerchandiserReportType::updateOrCreate(['name' => 'Planogram']);
        MerchandiserReportType::updateOrCreate(['name' => 'POSM']);
        MerchandiserReportType::updateOrCreate(['name' => 'Sale Team Visit']);
        MerchandiserReportType::updateOrCreate(['name' => 'OSA(Hansaplast)']);
    }
}
