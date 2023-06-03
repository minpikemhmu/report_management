<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\BaStaff;
use Illuminate\Support\Facades\Hash;
use App\Models\Channel;
use App\Models\City;
use App\Models\Customer;
use App\Models\ProductBrand;
use App\Models\SubChannel;
use App\Models\Supervisor;

class BaStaffImport implements ToCollection
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
            $customer = Customer::where('dksh_customer_id', $row[1])->first();
            $channel = Channel::where("name",$row[3])->first();
            $supervisor = Supervisor::where("name",$row[4])->first();
            $subchannel = SubChannel::where("name",$row[5])->first();
            $city = City::where("name",$row[6])->first();
            $brand = ProductBrand::where("name",$row[7])->first();

            if (!$channel || !$customer || !$supervisor || !$subchannel || !$city || !$brand) {
                $success = false;
            }
        }

        if ($success) {
            // All rows are correct, proceed with attaching and storing data
            foreach ($collection as $row) {
                $customer = Customer::where('dksh_customer_id', $row[1])->first();
                $channel = Channel::where("name",$row[3])->first();
                $supervisor = Supervisor::where("name",$row[4])->first();
                $subchannel = SubChannel::where("name",$row[5])->first();
                $city = City::where("name",$row[6])->first();
                $brand = ProductBrand::where("name",$row[7])->first();
                BaStaff::create([
                    'ba_code' => $row[0],
                    'customer_id' => $customer->id,
                    'name' => $row[2],
                    'channel_id' => $channel->id,
                    'supervisor_id' =>$supervisor->id,
                    'subchannel_id' => $subchannel->id,
                    'city_id' => $city->id,
                    'product_brand_id' => $brand->id,
                    'password' => Hash::make($row[8]),
                ]);
            }

            $this->message = true;
        } else {
            $this->message = false;
        }
    }
}
