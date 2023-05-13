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
        MerchantArea::create(['name' => 'Van 6']);
        MerchantArea::create(['name' => 'Van 7']);
        MerchantArea::create(['name' => 'Bago']);
        MerchantArea::create(['name' => 'Dawei']);
        MerchantArea::create(['name' => 'Dike Oo']);
        MerchantArea::create(['name' => 'Gadoke Payargyi']);
        MerchantArea::create(['name' => 'Mawlamyaing']);
        MerchantArea::create(['name' => 'Myaung Mya']);
        MerchantArea::create(['name' => 'Pathein']);
        MerchantArea::create(['name' => 'Phaung Daw Thi']);
        MerchantArea::create(['name' => 'Pyay']);
        MerchantArea::create(['name' => 'Taik Kyi']);
        MerchantArea::create(['name' => 'Taung Ngu']);
        MerchantArea::create(['name' => 'Thanlyin']);
        MerchantArea::create(['name' => 'Tontae']);
    }
}
