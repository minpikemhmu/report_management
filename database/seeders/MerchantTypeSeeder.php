<?php

namespace Database\Seeders;

use App\Models\MerchantType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MerchantType::create(['name'=>'BA']);
        MerchantType::create(['name'=>'Non-BA']);
    }
}
