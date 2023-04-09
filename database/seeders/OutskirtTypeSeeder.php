<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OutskirtType;

class OutskirtTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OutskirtType::create(['name' => 'Blue Zone']);
        OutskirtType::create(['name' => 'Shop Sign']);
        OutskirtType::create(['name' => 'Shop Sign Post']);
        OutskirtType::create(['name' => 'Shop Sign Post Light']);
        OutskirtType::create(['name' => 'Window Display']);
        OutskirtType::create(['name' => 'Wall Unit']);
        OutskirtType::create(['name' => 'Standee and Standee Display Shelf outlet']);
        OutskirtType::create(['name' => 'Die Cut Outlet']);
        OutskirtType::create(['name' => 'Shelf Strip Outlet']);
        OutskirtType::create(['name' => 'Deo Table Top Outlet']);
    }
}
