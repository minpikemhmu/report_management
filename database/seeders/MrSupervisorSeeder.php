<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MrSupervisor;

class MrSupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MrSupervisor::updateOrCreate(['name' => 'Swan Pyae  Aung', 'executive_id' => 1]);
        MrSupervisor::updateOrCreate(['name' => 'Myat Thu', 'executive_id' => 1]);
    }
}
