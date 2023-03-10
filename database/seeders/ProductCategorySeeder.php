<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::truncate();
        ProductCategory::create(["name" => "Women Foam"]);
        ProductCategory::create(["name" => "Women Moist"]);
        ProductCategory::create(["name" => "Men Foam"]);
        ProductCategory::create(["name" => "Men Moist"]);
        ProductCategory::create(["name" => "DEO Men"]);
        ProductCategory::create(["name" => "DEO Women"]);
        ProductCategory::create(["name" => "Body"]);
        ProductCategory::create(["name" => "APC"]);
        ProductCategory::create(["name" => " Sun "]);
        ProductCategory::create(["name" => "Lips"]);
    }
}
