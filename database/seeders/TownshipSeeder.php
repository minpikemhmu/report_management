<?php

namespace Database\Seeders;

use App\Models\Township;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TownshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Township::create(['name'=> 'InnSein', 'city_id'=>'1', 'division_state_id'=>'1', 'region_id' => 2]);
        Township::create(['name'=> 'Ma Yan Kone', 'city_id'=>'1', 'division_state_id'=>'1', 'region_id' => 2]);
        Township::create(['name'=> 'YanKin', 'city_id'=>'1', 'division_state_id'=>'1', 'region_id' => 2]);
        Township::create(['name'=> 'San Chaung', 'city_id'=>'1', 'division_state_id'=>'1', 'region_id' => 2]);
        Township::create(['name'=> 'Kamaryut', 'city_id'=>'1', 'division_state_id'=>'1', 'region_id' => 2]);

        Township::create(['name'=> 'Taunggyi', 'city_id'=>'2', 'division_state_id'=>'2', 'region_id' => 1]);
        Township::create(['name'=> 'Nyaung Shwe', 'city_id'=>'2', 'division_state_id'=>'2', 'region_id' => 1]);
        Township::create(['name'=> 'Shwe Nyaung', 'city_id'=>'2', 'division_state_id'=>'2', 'region_id' => 1]);
    }
}
