<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MrLeader;

class MrLeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MrLeader::updateOrCreate(['name' => 'Lwin Min Aung', 'supervisor_id' => 1]);
        MrLeader::updateOrCreate(['name' => 'Aung Myo Minn', 'supervisor_id' => 1]);
        MrLeader::updateOrCreate(['name' => 'Ko Ko Min', 'supervisor_id' => 1]);
        MrLeader::updateOrCreate(['name' => 'Vacant', 'supervisor_id' => 1]);
        MrLeader::updateOrCreate(['name' => 'Naing Win Tun', 'supervisor_id' => 1]);
        MrLeader::updateOrCreate(['name' => 'Wai Yan Tun', 'supervisor_id' => 2]);
        MrLeader::updateOrCreate(['name' => 'Soe Ye Yin Naing', 'supervisor_id' => 2]);
        MrLeader::updateOrCreate(['name' => 'Zayar Lin', 'supervisor_id' => 2]);
        MrLeader::updateOrCreate(['name' => 'Maung Maung Kyaw', 'supervisor_id' => 2]);
        MrLeader::updateOrCreate(['name' => 'Nay Win Kyaw', 'supervisor_id' => 2]);
    }
}
