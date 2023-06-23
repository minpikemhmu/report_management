<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\BaAssign;
use App\Models\BaStaff;
use App\Models\ProductKeyCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class baAssignImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public $message = true;
    public $errorRows;

    public function getSuccess()
    {
        return $this->message;
    }

    public function getErrorRows()
    {
        return $this->errorRows ?? [];
    }

    public function collection(Collection $collection)
    {
        $success = true; // Flag to track if all rows are correct
        $errorRows = [];

        foreach ($collection as $index => $row) {
            $ba_staff = BaStaff::where('ba_code', $row[0])->first();
            $key_category = ProductKeyCategory::where("name",$row[1])->first();
            
            if($row[3] > 12 || $row[3]<0){
                $success = false;
                $errorRows[] = $index + 1;
            }

            if (!$ba_staff || !$key_category) {
                $success = false;
                $errorRows[] = $index + 1;
            }
        }

        if ($success) {
            // All rows are correct, proceed with attaching and storing data
            foreach ($collection as $row) {
                $ba_staff = BaStaff::where('ba_code', $row[0])->first();
                $key_category = ProductKeyCategory::where("name",$row[1])->first();

                BaAssign::create([
                    'ba_staff_id' => $ba_staff->id,
                    'product_key_category_id' => $key_category->id,
                    'target_quantity' => $row[2],
                    'month' => $row[3],
                    'year' => $row[4],
                ]);
            }

            $this->message = true;
        } else {
            $this->message = false;
            $this->errorRows = $errorRows[0];
        }
    }
}
