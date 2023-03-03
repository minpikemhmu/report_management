<?php

namespace Database\Seeders;

use App\Models\Supervisor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supervisor::create(['name' => 'Aye Pwint Phyu', 'region_id' => 2]);
        Supervisor::create(['name' => 'Ei Thet Mon', 'region_id' => 2]);
        Supervisor::create(['name' => 'Kay Khaing Oo', 'region_id' => 2]);
        Supervisor::create(['name' => 'Nan Mya Sandar Cho', 'region_id' => 2]);
        Supervisor::create(['name' => 'Thae Mon Su Kyaw', 'region_id' => 2]);
        Supervisor::create(['name' => 'Thandar Swe', 'region_id' => 2]);
        Supervisor::create(['name' => 'Tin Nilar Lwin', 'region_id' => 2]);
        Supervisor::create(['name' => 'Ei Mon Kyaw', 'region_id' => 2]);
        Supervisor::create(['name' => 'Kyi Kyi Aye', 'region_id' => 1]);
        Supervisor::create(['name' => 'Nway Nway Tun', 'region_id' => 1]);
    }
}
