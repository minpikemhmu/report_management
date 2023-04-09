<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TripType;

class TripTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TripType::create(['name' => 'Base City']);
        TripType::create(['name' => 'Day Return']);
        TripType::create(['name' => 'Night Trip']);
    }
}
