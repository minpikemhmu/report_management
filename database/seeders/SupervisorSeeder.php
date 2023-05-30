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
        Supervisor::updateOrCreate(['name' => 'Aye Pwint Phyu', 'region_id' => 2, 'executive_id' => 1]);
        Supervisor::updateOrCreate(['name' => 'Ei Thet Mon', 'region_id' => 2, 'executive_id' => 1]);
        Supervisor::updateOrCreate(['name' => 'Kay Khaing Oo', 'region_id' => 2, 'executive_id' => 1]);
        Supervisor::updateOrCreate(['name' => 'Nan Mya Sandar Cho', 'region_id' => 2, 'executive_id' => 1]);
        Supervisor::updateOrCreate(['name' => 'Thae Mon Su Kyaw', 'region_id' => 2, 'executive_id' => 1]);
        Supervisor::updateOrCreate(['name' => 'Thandar Swe', 'region_id' => 2, 'executive_id' => 1]);
        Supervisor::updateOrCreate(['name' => 'Tin Nilar Lwin', 'region_id' => 2, 'executive_id' => 1]);
        Supervisor::updateOrCreate(['name' => 'Ei Mon Kyaw', 'region_id' => 2, 'executive_id' => 1]);
        Supervisor::updateOrCreate(['name' => 'Kyi Kyi Aye', 'region_id' => 1, 'executive_id' => 1]);
        Supervisor::updateOrCreate(['name' => 'Nway Nway Tun', 'region_id' => 1, 'executive_id' => 1]);
    }
}
