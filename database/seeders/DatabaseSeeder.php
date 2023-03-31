<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() :void
    {
        $this->call([
            UserSeeder::class,
            ChannelSeeder::class,
            SubChannelSeeder::class,
            RegionSeeder::class,
            DivisionStateSeeder::class,
            TownshipSeeder::class,
            CitySeeder::class,
            CustomerTypeSeeder::class,
            MerchantTypeSeeder::class,
            MerchantAreaSeeder::class,
            MerchantTeamSeeder::class,
            OutletSeeder::class,
            SupervisorSeeder::class,
            ProductBrandSeeder::class,
            ProductCategorySeeder::class,
            ProductSubCategorySeeder::class,
            BaReportTypeSeeder::class
        ]);
    }
}
