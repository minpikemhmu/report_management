<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MrExecutive;

class MrExecutiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MrExecutive::updateOrCreate(['name' => 'Zin Mar Oo', 'manager_id' => 1]);
    }
}
