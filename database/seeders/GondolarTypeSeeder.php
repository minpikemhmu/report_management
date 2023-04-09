<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GondolarType;

class GondolarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GondolarType::create(['name' => 'Women']);
        GondolarType::create(['name' => 'Men']);
        GondolarType::create(['name' => 'Coolkick']);
        GondolarType::create(['name' => 'Men & Women']);
    }
}
