<?php

namespace Database\Seeders;

use App\Models\ProductBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductBrand::create(['name' => 'NIVEA']);
        ProductBrand::create(['name' => 'CutePress']);
        ProductBrand::create(['name' => 'Colgate']);
        ProductBrand::create(['name' => 'Palmolive']);
    }
}
