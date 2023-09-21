<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MrExecutive;
use Illuminate\Support\Facades\Hash;

class MrExecutiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MrExecutive::updateOrCreate(['name' => 'Zin Mar Oo', 'code'=>'1234', 'password'=>Hash::make(123456789), 'manager_id' => 1]);
    }
}
