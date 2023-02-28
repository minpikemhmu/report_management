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
        Township::create(['name'=> 'Yangon', 'division_state_id'=>'1', 'region_id' => 2]);
        Township::create(['name'=> 'Taunggyi', 'division_state_id'=>'2', 'region_id' => 2]);
    }
}
