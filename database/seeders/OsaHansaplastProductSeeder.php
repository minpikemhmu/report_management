<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OsaHansaplastProduct;

class OsaHansaplastProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OsaHansaplastProduct::create(['name' => "Elastic 100's"]);
        OsaHansaplastProduct::create(['name' => "Elastic 100+10"]);
        OsaHansaplastProduct::create(['name' => 'Jumbo 50+1']);
        OsaHansaplastProduct::create(['name' => "Transparent 20's"]);
        OsaHansaplastProduct::create(['name' => 'Aqua Protect']);
        OsaHansaplastProduct::create(['name' => 'Foot Plaster']);
        OsaHansaplastProduct::create(['name' => 'Frozen']);
        OsaHansaplastProduct::create(['name' => 'Mickey']);
        OsaHansaplastProduct::create(['name' => 'Elastic Tape 1M']);
    }
}
