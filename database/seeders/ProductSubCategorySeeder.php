<?php

namespace Database\Seeders;

use App\Models\ProductSubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductSubCategory::create(["name" => "Cleanse"]);
        ProductSubCategory::create(["name" => "Whip"]);
        ProductSubCategory::create(["name" => "Mousse"]);
        ProductSubCategory::create(["name" => "Micellar"]);
        ProductSubCategory::create(["name" => "Moist"]);
        ProductSubCategory::create(["name" => "Cream"]);
        ProductSubCategory::create(["name" => "Roll-on"]);
        ProductSubCategory::create(["name" => "Spray"]);
        ProductSubCategory::create(["name" => "Deo Serum"]);
        ProductSubCategory::create(["name" => "Lotion"]);
        ProductSubCategory::create(["name" => "Serum"]);
        ProductSubCategory::create(["name" => "Sun Face"]);
        ProductSubCategory::create(["name" => "Sun Body"]);
        ProductSubCategory::create(["name" => "LIP"]);
    }
}
