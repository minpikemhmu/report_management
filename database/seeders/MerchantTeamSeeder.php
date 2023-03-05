<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MerchantTeam;

class MerchantTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MerchantTeam::create(['name' => 'Team 1']);
        MerchantTeam::create(['name' => 'Team 2']);
        MerchantTeam::create(['name' => 'Team 3']);
        MerchantTeam::create(['name' => 'Team 4']);
        MerchantTeam::create(['name' => 'Team 5']);
    }
}
