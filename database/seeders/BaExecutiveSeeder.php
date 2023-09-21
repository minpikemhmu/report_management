<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BaExecutive;
use Illuminate\Support\Facades\Hash;

class BaExecutiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BaExecutive::updateOrCreate(['name' => 'TLZ', 'code'=>'1234', 'password'=>Hash::make(123456789), 'manager_id' => 1]);
    }
}
