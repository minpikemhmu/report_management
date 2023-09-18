<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BaExecutive;
use App\Models\BaManager;
use App\Models\MrExecutive;
use App\Models\MrManager;
use App\Models\MrSupervisor;
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
            CitySeeder::class,
            TownshipSeeder::class,
            CustomerTypeSeeder::class,
            MerchantTypeSeeder::class,
            MerchantAreaSeeder::class,
            MerchantTeamSeeder::class,
            OutletSeeder::class,
            BaManagerSeeder::class,
            BaExecutiveSeeder::class,
            SupervisorSeeder::class,
            MrManagerSeeder::class,
            MrExecutiveSeeder::class,
            MrSupervisorSeeder::class,
            MrLeaderSeeder::class,
            ProductBrandSeeder::class,
            ProductCategorySeeder::class,
            ProductSubCategorySeeder::class,
            BaReportTypeSeeder::class,
            GondolarTypeSeeder::class,
            OutskirtTypeSeeder::class,
            TripTypeSeeder::class,
            MerchandiserReportTypeSeeder::class,
            OsaProductSeeder::class,
            OsaHansaplastProductSeeder::class,
            PosmProductSeeder::class,
            MrFieldSeeder::class,
        ]);
    }
}
