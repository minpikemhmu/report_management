<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PosmProduct;

class PosmProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PosmProduct::create(['name' => "Himalaya Shelf Frame"]);
        PosmProduct::create(['name' => "Himalaya PB Board (Horizontal)"]);
        PosmProduct::create(['name' => 'Himalaya PB Board (Vertical)']);
        PosmProduct::create(['name' => "Deo Thanakha Vinyl 5x1"]);
        PosmProduct::create(['name' => 'Deo Thanakha Vinyl PB Board(Horizontal)']);
        PosmProduct::create(['name' => 'BodyWomen Sarkura PP Board (Horizontal )']);
        PosmProduct::create(['name' => "Body W Sakura Vinyl 5'x1"]);
        PosmProduct::create(['name' => 'Body W Sakura Vinyl 4x2']);
        PosmProduct::create(['name' => 'Body W Sakura Vinyl 6x3']);
        PosmProduct::create(['name' => "Body Lotion Dangler"]);
        PosmProduct::create(['name' => "Body W Sakura Sticker (Vertical)"]);
        PosmProduct::create(['name' => 'Body W Sakura Sticker (Horizontal)']);
        PosmProduct::create(['name' => "Body W Sakura Shelf Frame"]);
        PosmProduct::create(['name' => 'Body W Sakura Shelf Frame(New small )']);
        PosmProduct::create(['name' => 'Body Outlet Maintained']);
        PosmProduct::create(['name' => 'DNA Shelf Frame']);
        PosmProduct::create(['name' => 'DNA Flat Line Bunner']);
        PosmProduct::create(['name' => 'DNA Vinyl 4x2']);
        PosmProduct::create(['name' => 'DNA Vinyl 6x3']);
        PosmProduct::create(['name' => "DNA PB Boad"]);
        PosmProduct::create(['name' => "Extra White Deo 5x1 Flag Line"]);
        PosmProduct::create(['name' => 'Extra White Deo 4x2 Vinyl']);
        PosmProduct::create(['name' => "Cool Kick 5x1"]);
        PosmProduct::create(['name' => 'Cool Kick 4x2']);
        PosmProduct::create(['name' => 'Cool Kick Shelf Strip']);
        PosmProduct::create(['name' => 'Cool Kick Shelf Frame']);
        PosmProduct::create(['name' => 'Body Sarkura 4 x 2 Before']);
        PosmProduct::create(['name' => 'Body  Sarkura 4 x 2 After']);
    }
}
