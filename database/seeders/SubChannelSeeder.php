<?php

namespace Database\Seeders;

use App\Models\SubChannel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubChannel::create(['name' => 'GT Loyalty']);
        SubChannel::create(['name' => 'Market Partner']);
        SubChannel::create(['name' => 'Modern Trade']);
        SubChannel::create(['name' => 'Trade Partner']);
        SubChannel::create(['name' => 'Whole Saler']);
    }
}
