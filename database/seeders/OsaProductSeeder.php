<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OsaProduct;

class OsaProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OsaProduct::create(['name' => 'NIVEA-D W RO ExtraWhitening 50ml 83747 (Extra Brightening)']);
        OsaProduct::create(['name' => 'NIVEA-D W RO Pearl & Beauty 50ml 83735']);
        OsaProduct::create(['name' => 'NIVEA-D W RO Thanakha 50ml 84536']);
        OsaProduct::create(['name' => 'NIVEA-D M RO DEEP DARKWOOD 50ml 80031']);
        OsaProduct::create(['name' => 'NIVEA-D M RO CoolKick BLUE 50ml 82886']);
        OsaProduct::create(['name' => 'NIVEA-M Mud Foam AOC 100g 83940']);
        OsaProduct::create(['name' => 'NIVEA-M Deep White OC Foam 100g84415']);
        OsaProduct::create(['name' => 'NIVEA-W Foam White Pearl_New 50g 86704 ']);
        OsaProduct::create(['name' => 'NIVEA-W Foam White Pearl_New 100g 81295']);
        OsaProduct::create(['name' => 'NIVEA-B Radiant Sakura Lotion 200ml 85701 ']);
    }
}
