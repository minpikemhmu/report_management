<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MerchantArea;

class MerchantAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MerchantArea::create(['name' => 'Van 1']);
        MerchantArea::create(['name' => 'Van 2']);
        MerchantArea::create(['name' => 'Van 3']);
        MerchantArea::create(['name' => 'Van 4']);
        MerchantArea::create(['name' => 'Van 5']);
    }
}
