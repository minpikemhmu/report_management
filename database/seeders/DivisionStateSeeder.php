<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DivisionState;

class DivisionStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DivisionState::create(['name'=> 'Yangon', 'region_id' => 2]);
        DivisionState::create(['name'=> 'Shan', 'region_id' => 1]);
    }
}
