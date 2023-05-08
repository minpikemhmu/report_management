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
        DivisionState::updateOrCreate(['name' => 'Kachin', 'region_id' => 1]);
        DivisionState::updateOrCreate(['name' => 'Kayah', 'region_id' => 2]);
        DivisionState::updateOrCreate(['name' => 'Kayin', 'region_id' => 2]);
        DivisionState::updateOrCreate(['name' => 'Chin', 'region_id' => 1]);
        DivisionState::updateOrCreate(['name' => 'Sagaing', 'region_id' => 1]);
        DivisionState::updateOrCreate(['name' => 'Tanintharyi', 'region_id' => 2]);
        DivisionState::updateOrCreate(['name' => 'Bago (East)', 'region_id' => 2]);
        DivisionState::updateOrCreate(['name' => 'Bago (West)', 'region_id' => 2]);
        DivisionState::updateOrCreate(['name' => 'Magway', 'region_id' => 1]);
        DivisionState::updateOrCreate(['name' => 'Mandalay', 'region_id' => 1]);
        DivisionState::updateOrCreate(['name' => 'Mon', 'region_id' => 2]);
        DivisionState::updateOrCreate(['name' => 'Rakhine', 'region_id' => 1]);
        DivisionState::updateOrCreate(['name' => 'Yangon', 'region_id' => 2]);
        DivisionState::updateOrCreate(['name' => 'Shan (South)', 'region_id' => 1]);
        DivisionState::updateOrCreate(['name' => 'Shan (North)', 'region_id' => 1]);
        DivisionState::updateOrCreate(['name' => 'Shan (East)', 'region_id' => 1]);
        DivisionState::updateOrCreate(['name' => 'Ayeyarwady', 'region_id' => 2]);
        DivisionState::updateOrCreate(['name' => 'Nay Pyi Taw', 'region_id' => 1]);
    }
}
