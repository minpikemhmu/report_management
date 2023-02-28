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
        City::create(['name'=> 'InnSein', 'township_id'=>'1', 'division_state_id'=>'1', 'region_id' => 2]);
        City::create(['name'=> 'Ma Yan Kone', 'township_id'=>'1', 'division_state_id'=>'1', 'region_id' => 2]);
        City::create(['name'=> 'YanKin', 'township_id'=>'1', 'division_state_id'=>'1', 'region_id' => 2]);
        City::create(['name'=> 'San Chaung', 'township_id'=>'1', 'division_state_id'=>'1', 'region_id' => 2]);
        City::create(['name'=> 'Kamaryut', 'township_id'=>'1', 'division_state_id'=>'1', 'region_id' => 2]);

        City::create(['name'=> 'Taunggyi', 'township_id'=>'2', 'division_state_id'=>'2', 'region_id' => 1]);
        City::create(['name'=> 'Nyaung Shwe', 'township_id'=>'2', 'division_state_id'=>'2', 'region_id' => 1]);
        City::create(['name'=> 'Shwe Nyaung', 'township_id'=>'2', 'division_state_id'=>'2', 'region_id' => 1]);
    }
}
