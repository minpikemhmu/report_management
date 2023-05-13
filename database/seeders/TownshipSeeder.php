<?php

namespace Database\Seeders;

use App\Models\Township;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TownshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Township::updateOrCreate(['city_id' => 1, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Myitkyina']);
        Township::updateOrCreate(['city_id' => 2, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Bhamo']);
        Township::updateOrCreate(['city_id' => 3, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Chipwi']);
        Township::updateOrCreate(['city_id' => 4, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Hpakant']);
        Township::updateOrCreate(['city_id' => 5, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Injangyang']);
        Township::updateOrCreate(['city_id' => 6, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Khaunglanhpu']);
        Township::updateOrCreate(['city_id' => 7, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Machanbaw']);
        Township::updateOrCreate(['city_id' => 8, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Mansi']);
        Township::updateOrCreate(['city_id' => 9, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Mogaung']);
        Township::updateOrCreate(['city_id' => 10, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Mohnyin']);
        Township::updateOrCreate(['city_id' => 11, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Momauk']);
        Township::updateOrCreate(['city_id' => 12, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Nawngmun']);
        Township::updateOrCreate(['city_id' => 13, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Puta-O']);
        Township::updateOrCreate(['city_id' => 14, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Shwegu']);
        Township::updateOrCreate(['city_id' => 15, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Sumprabum']);
        Township::updateOrCreate(['city_id' => 16, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Tanai']);
        Township::updateOrCreate(['city_id' => 17, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Tsawlaw']);
        Township::updateOrCreate(['city_id' => 18, 'region_id' => 1, 'division_state_id' => 1, 'name' => 'Waingmaw']);

        Township::updateOrCreate(['city_id' => 19, 'region_id' => 2, 'division_state_id' => 2, 'name' => 'Loikaw']);
        Township::updateOrCreate(['city_id' => 20, 'region_id' => 2, 'division_state_id' => 2, 'name' => 'Demoso']);
        Township::updateOrCreate(['city_id' => 21, 'region_id' => 2, 'division_state_id' => 2, 'name' => 'Bawlake']);
        Township::updateOrCreate(['city_id' => 22, 'region_id' => 2, 'division_state_id' => 2, 'name' => 'Hpasawng']);
        Township::updateOrCreate(['city_id' => 23, 'region_id' => 2, 'division_state_id' => 2, 'name' => 'Hpruso']);
        Township::updateOrCreate(['city_id' => 24, 'region_id' => 2, 'division_state_id' => 2, 'name' => 'Mese']);
        Township::updateOrCreate(['city_id' => 25, 'region_id' => 2, 'division_state_id' => 2, 'name' => 'Shadaw']);

        Township::updateOrCreate(['city_id' => 26, 'region_id' => 2, 'division_state_id' => 3, 'name' => 'Hpa-An']);
        Township::updateOrCreate(['city_id' => 27, 'region_id' => 2, 'division_state_id' => 3, 'name' => 'Thandaunggyi']);
        Township::updateOrCreate(['city_id' => 28, 'region_id' => 2, 'division_state_id' => 3, 'name' => 'Hlaingbwe']);
        Township::updateOrCreate(['city_id' => 29, 'region_id' => 2, 'division_state_id' => 3, 'name' => 'Hpapun']);
        Township::updateOrCreate(['city_id' => 30, 'region_id' => 2, 'division_state_id' => 3, 'name' => 'Kawkareik']);
        Township::updateOrCreate(['city_id' => 31, 'region_id' => 2, 'division_state_id' => 3, 'name' => 'Kyainseikgyi']);
        Township::updateOrCreate(['city_id' => 32, 'region_id' => 2, 'division_state_id' => 3, 'name' => 'Myawaddy']);

        Township::updateOrCreate(['city_id' => 33, 'region_id'  => 1, 'division_state_id' => 4, 'name' => 'Ha Kha']);
        Township::updateOrCreate(['city_id' => 34, 'region_id' => 1, 'division_state_id' => 4, 'name' => 'Falan']);
        Township::updateOrCreate(['city_id' => 35, 'region_id' => 1, 'division_state_id' => 4, 'name' => 'Kanpetlet']);
        Township::updateOrCreate(['city_id' => 36, 'region_id' => 1, 'division_state_id' => 4, 'name' => 'Matupi']);
        Township::updateOrCreate(['city_id' => 37, 'region_id' => 1, 'division_state_id' => 4, 'name' => 'Mindat']);
        Township::updateOrCreate(['city_id' => 38, 'region_id' => 1, 'division_state_id' => 4, 'name' => 'Paletwa']);
        Township::updateOrCreate(['city_id' => 39, 'region_id' => 1, 'division_state_id' => 4, 'name' => 'Tedim']);
        Township::updateOrCreate(['city_id' => 40, 'region_id' => 1, 'division_state_id' => 4, 'name' => 'Thantlang']);
        Township::updateOrCreate(['city_id' => 41, 'region_id' => 1, 'division_state_id' => 4, 'name' => 'Tonzang']);

        Township::updateOrCreate(['city_id' => 42, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Monywa']);
        Township::updateOrCreate(['city_id' => 43, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Sagaing']);
        Township::updateOrCreate(['city_id' => 44, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Ayadaw']);
        Township::updateOrCreate(['city_id' => 45, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Banmauk']);
        Township::updateOrCreate(['city_id' => 46, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Budalin']);
        Township::updateOrCreate(['city_id' => 47, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Chaung-U']);
        Township::updateOrCreate(['city_id' => 48, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Hkamti']);
        Township::updateOrCreate(['city_id' => 49, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Homalin']);
        Township::updateOrCreate(['city_id' => 50, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Indaw']);
        Township::updateOrCreate(['city_id' => 51, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Kale']);
        Township::updateOrCreate(['city_id' => 52, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Kalewa']);
        Township::updateOrCreate(['city_id' => 53, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Kanbalu']);
        Township::updateOrCreate(['city_id' => 54, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Kani']);
        Township::updateOrCreate(['city_id' => 55, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Katha']);
        Township::updateOrCreate(['city_id' => 56, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Kawlin']);
        Township::updateOrCreate(['city_id' => 57, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Khin-U']);
        Township::updateOrCreate(['city_id' => 58, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Kyunhla']);
        Township::updateOrCreate(['city_id' => 59, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Lahe']);
        Township::updateOrCreate(['city_id' => 60, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Lay Shi']);
        Township::updateOrCreate(['city_id' => 61, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Mawlaik']);
        Township::updateOrCreate(['city_id' => 62, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Mingin']);
        Township::updateOrCreate(['city_id' => 63, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Myaung']);
        Township::updateOrCreate(['city_id' => 64, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Myinmu']);
        Township::updateOrCreate(['city_id' => 65, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Nanyun']);
        Township::updateOrCreate(['city_id' => 66, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Pale']);
        Township::updateOrCreate(['city_id' => 67, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Paungbyin']);
        Township::updateOrCreate(['city_id' => 68, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Pinlebu']);
        Township::updateOrCreate(['city_id' => 69, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Salingyi']);
        Township::updateOrCreate(['city_id' => 70, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Shwebo']);
        Township::updateOrCreate(['city_id' => 71, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Tabayin']);
        Township::updateOrCreate(['city_id' => 72, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Tamu']);
        Township::updateOrCreate(['city_id' => 73, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Taze']);
        Township::updateOrCreate(['city_id' => 74, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Tigyaing']);
        Township::updateOrCreate(['city_id' => 75, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Wetlet']);
        Township::updateOrCreate(['city_id' => 76, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Wuntho']);
        Township::updateOrCreate(['city_id' => 77, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Ye-U']);
        Township::updateOrCreate(['city_id' => 78, 'region_id' => 1, 'division_state_id' => 5, 'name' => 'Yinmarbin']);

        Township::updateOrCreate(['city_id' => 79, 'region_id' => 2, 'division_state_id' => 6, 'name' => 'Dawei']);
        Township::updateOrCreate(['city_id' => 80, 'region_id' => 2, 'division_state_id' => 6, 'name' => 'Launglon']);
        Township::updateOrCreate(['city_id' => 81, 'region_id' => 2, 'division_state_id' => 6, 'name' => 'Bokpyin']);
        Township::updateOrCreate(['city_id' => 82, 'region_id' => 2, 'division_state_id' => 6, 'name' => 'Kawthoung']);
        Township::updateOrCreate(['city_id' => 83, 'region_id' => 2, 'division_state_id' => 6, 'name' => 'Kyunsu']);
        Township::updateOrCreate(['city_id' => 84, 'region_id' => 2, 'division_state_id' => 6, 'name' => 'Myeik']);
        Township::updateOrCreate(['city_id' => 85, 'region_id' => 2, 'division_state_id' => 6, 'name' => 'Palaw']);
        Township::updateOrCreate(['city_id' => 86, 'region_id' => 2, 'division_state_id' => 6, 'name' => 'Tanintharyi']);
        Township::updateOrCreate(['city_id' => 87, 'region_id' => 2, 'division_state_id' => 6, 'name' => 'Thayetchaung']);
        Township::updateOrCreate(['city_id' => 88, 'region_id' => 2, 'division_state_id' => 6, 'name' => 'Yebyu']);

        Township::updateOrCreate(['city_id' => 89, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Daik U']);
        Township::updateOrCreate(['city_id' => 90, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Kawa']);
        Township::updateOrCreate(['city_id' => 91, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Htantabin']);
        Township::updateOrCreate(['city_id' => 92, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Kyaukkyi']);
        Township::updateOrCreate(['city_id' => 93, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Kyauktaga']);
        Township::updateOrCreate(['city_id' => 94, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Oktwin']);
        Township::updateOrCreate(['city_id' => 95, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Nyaunglebin']);
        Township::updateOrCreate(['city_id' => 96, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Phyu']);
        Township::updateOrCreate(['city_id' => 97, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Shwegyin']);
        Township::updateOrCreate(['city_id' => 98, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Taungoo']);
        Township::updateOrCreate(['city_id' => 99, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Thanatpin']);
        Township::updateOrCreate(['city_id' => 100, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Waw']);
        Township::updateOrCreate(['city_id' => 101, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Yedashe']);
        Township::updateOrCreate(['city_id' => 102, 'region_id' => 2, 'division_state_id' => 7, 'name' => 'Bago']);

        Township::updateOrCreate(['city_id' => 103, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Letpatan']);
        Township::updateOrCreate(['city_id' => 104, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Min Hla']);
        Township::updateOrCreate(['city_id' => 105, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Gyobingauk']);
        Township::updateOrCreate(['city_id' => 106, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Monyo']);
        Township::updateOrCreate(['city_id' => 107, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Nattalin']);
        Township::updateOrCreate(['city_id' => 108, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Okpho']);
        Township::updateOrCreate(['city_id' => 109, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Padaung']);
        Township::updateOrCreate(['city_id' => 110, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Paukkhaung']);
        Township::updateOrCreate(['city_id' => 111, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Paungde']);
        Township::updateOrCreate(['city_id' => 112, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Pyay']);
        Township::updateOrCreate(['city_id' => 113, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Shwedaung']);
        Township::updateOrCreate(['city_id' => 114, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Thayarwady']);
        Township::updateOrCreate(['city_id' => 115, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Thegon']);
        Township::updateOrCreate(['city_id' => 116, 'region_id' => 2, 'division_state_id' => 8, 'name' => 'Zigon']);

        Township::updateOrCreate(['city_id' => 117, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Aunglan']);
        Township::updateOrCreate(['city_id' => 118, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Chauk']);
        Township::updateOrCreate(['city_id' => 119, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Gangaw']);
        Township::updateOrCreate(['city_id' => 120, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Kamma']);
        Township::updateOrCreate(['city_id' => 121, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Magway']);
        Township::updateOrCreate(['city_id' => 121, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Minbu']);
        Township::updateOrCreate(['city_id' => 123, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Mindon']);
        Township::updateOrCreate(['city_id' => 124, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Minhla']);
        Township::updateOrCreate(['city_id' => 125, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Myaing']);
        Township::updateOrCreate(['city_id' => 126, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Myothit']);
        Township::updateOrCreate(['city_id' => 127, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Natmauk']);
        Township::updateOrCreate(['city_id' => 128, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Ngape']);
        Township::updateOrCreate(['city_id' => 129, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Pakokku']);
        Township::updateOrCreate(['city_id' => 130, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Pauk']);
        Township::updateOrCreate(['city_id' => 131, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Pwintbyu']);
        Township::updateOrCreate(['city_id' => 132, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Salin']);
        Township::updateOrCreate(['city_id' => 133, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Saw']);
        Township::updateOrCreate(['city_id' => 134, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Seikphyu']);
        Township::updateOrCreate(['city_id' => 135, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Sidoktaya']);
        Township::updateOrCreate(['city_id' => 136, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Sinbaungwe']);
        Township::updateOrCreate(['city_id' => 137, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Taungdwingyi']);
        Township::updateOrCreate(['city_id' => 138, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Thayet']);
        Township::updateOrCreate(['city_id' => 139, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Tilin']);
        Township::updateOrCreate(['city_id' => 140, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Yenangyaung']);
        Township::updateOrCreate(['city_id' => 141, 'region_id' => 1, 'division_state_id' => 9, 'name' => 'Yesagyo']);

        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Chanayethazan']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Chanmyathazi']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Amarapura']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Aungmyaythazan']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Kyaukpadaung']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Kyaukse']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Madaya']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Mahaaungmyay']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Mahlaing']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Meiktila']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Mogoke']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Myingyan']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Myittha']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Natogyi']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Ngazun']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Nyaung-U']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Patheingyi']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Pyawbwe']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Pyigyitagon']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Pyinoolwin']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Singu']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Sintgaing']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Tada-U']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Taungtha']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Thabeikkyin']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Thazi']);
        Township::updateOrCreate(['city_id'=> 142,'region_id' => 1, 'division_state_id' => 10, 'name' => 'Wundwin']);

        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Kamaryut']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Ahlone']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Bahan']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Botahtaung']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Cocokyun']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Dagon']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Dagon Myothit (East)']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Dagon Myothit (North)']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Dagon Myothit (Seikkan)']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Dagon Myothit (South)']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Dala']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Dawbon']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Hlaing']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Hlaingtharya']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Hlegu']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Hmawbi']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Htantabin']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Insein']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Kawhmu']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Kayan']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Kungyangon']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Kyauktada']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Kyauktan']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Kyeemyindaing']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Lanmadaw']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Latha']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Mayangone']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Mingaladon']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Mingalartaungnyunt']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'North Okkalapa']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Pabedan']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Pazundaung']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'San Chaung']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Seikgyikanaungto']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Seikkan']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Shwepyithar']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'South Okkalapa']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Taikkyi']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Tamwe']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Thaketa']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Thanlyin']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Thingangyun']);   
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Thongwa']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Twantay']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Yankin']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Hlaingtharya (East)']);
        Township::updateOrCreate(['city_id'=> 170,'region_id' => 2, 'division_state_id' => 13, 'name' => 'Hlaingtharya (West)']);

        Township::updateOrCreate(['city_id'=> 248,'region_id' => 1, 'division_state_id' => 18, 'name' => 'Lewe']);
        Township::updateOrCreate(['city_id'=> 248,'region_id' => 1, 'division_state_id' => 18, 'name' => 'Det Khi Na Thi Ri']);
        Township::updateOrCreate(['city_id'=> 248,'region_id' => 1, 'division_state_id' => 18, 'name' => 'Oke Ta Ra Thi Ri']);
        Township::updateOrCreate(['city_id'=> 248,'region_id' => 1, 'division_state_id' => 18, 'name' => 'Poke Ba Thi Ri']);
        Township::updateOrCreate(['city_id'=> 248,'region_id' => 1, 'division_state_id' => 18, 'name' => 'Tatkon']);
        Township::updateOrCreate(['city_id'=> 248,'region_id' => 1, 'division_state_id' => 18, 'name' => 'Za Bu Thi Ri']);
        Township::updateOrCreate(['city_id'=> 248,'region_id' => 1, 'division_state_id' => 18, 'name' => 'Zay Yar Thi Ri']);
    }
}