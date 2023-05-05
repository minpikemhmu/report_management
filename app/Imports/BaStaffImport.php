<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\BaStaff;
use Illuminate\Support\Facades\Hash;

class BaStaffImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            BaStaff::create([
                'ba_code' => $row[0],
                'name' => $row[1],
                'supervisor_id' => 1,
                'city_id' => 1,
                'customer_id' => 1,
                'channel_id' => 1,
                'subchannel_id' => 1,
                'password' => Hash::make($row[7]),
              ]);
        }
    }
}
