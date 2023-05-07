<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create(['name'=> 'Yangon', 'division_state_id'=>'1', 'region_id' => 2]);
        City::create(['name'=> 'Taunggyi', 'division_state_id'=>'2', 'region_id' => 2]);
    }
}
