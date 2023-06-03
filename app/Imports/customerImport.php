<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\DivisionState;
use App\Models\Township;
use App\Models\City;
use App\Models\CustomerType;

class customerImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public $message = true;

    public function getSuccess()
    {
        return $this->message;
    }

    public function collection(Collection $collection)
    {
        $success = true; // Flag to track if all rows are correct
        foreach ($collection as $row) {
            $cusType = CustomerType::where("name",$row[6])->first();
            $division = DivisionState::where('name', $row[7])->first();
            $city = City::where("name",$row[8])->first();
            $township = Township::where("name",$row[9])->first();

            if (!$division || !$township || !$city || !$cusType) {
                $success = false;
            }
            if($row[2] != "BA" && $row[2] != "Non BA"){
                $success = false;
            }
        }

        if ($success) {
            // All rows are correct, proceed with attaching and storing data
            foreach ($collection as $row) {
            $cusType = CustomerType::where("name",$row[6])->first();
            $division = DivisionState::where('name', $row[7])->first();
            $city = City::where("name",$row[8])->first();
            $township = Township::where("name",$row[9])->first();
            if($row[2] != "BA"){
                $is_ba = 1;
            }else if($row[2] != "Non BA"){
                $is_ba = 0;
            }
                Customer::create([
                    'name'                  => $row[0],
                    'dksh_customer_id'      => $row[1],
                    'is_ba'                 => $is_ba,
                    'address'               => $row[3],
                    'phone_number'          => $row[4],
                    'total_frequency'       => $row[5],
                    'customer_type_id'      => $cusType->id,
                    'division_state_id'     => $division->id,
                    'city_id'               => $city->id,
                    'township_id'           => $township->id,
                ]);
            }

            $this->message = true;
        } else {
            $this->message = false;
        }
    }
}
