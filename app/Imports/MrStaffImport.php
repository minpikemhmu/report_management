<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use App\Models\Merchandiser;
use App\Models\Region;
use App\Models\MerchantTeam;
use App\Models\MerchantArea;
use App\Models\Channel;
use App\Models\MrLeader;

class MrStaffImport implements ToCollection
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
            $team = MerchantTeam::where('name', $row[2])->first();
            $region = Region::where("name",$row[3])->first();
            $area = MerchantArea::where("name",$row[4])->first();
            $channel = Channel::where("name",$row[5])->first();
            $leader = MrLeader::where("name",$row[6])->first();

            if (!$team || !$region || !$area || !$channel || !$leader) {
                $success = false;
            }
        }

        if ($success) {
            // All rows are correct, proceed with attaching and storing data
            foreach ($collection as $row) {
                $team = MerchantTeam::where('name', $row[2])->first();
                $region = Region::where("name",$row[3])->first();
                $area = MerchantArea::where("name",$row[4])->first();
                $channel = Channel::where("name",$row[5])->first();
                $leader = MrLeader::where("name",$row[6])->first();
                Merchandiser::create([
                    'name'               => $row[0],
                    'mer_code'           => $row[1],
                    'merchant_team_id'   => $team->id,
                    'region_id'          => $region->id,
                    'merchant_area_id'   => $area->id,
                    'channel_id'         => $channel->id,
                    'leader_id'          => $leader->id,
                    'password'           => Hash::make($row[7]),
                ]);
            }

            $this->message = true;
        } else {
            $this->message = false;
        }
    }
}
