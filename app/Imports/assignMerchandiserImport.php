<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Customer;
use App\Models\Merchandiser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class assignMerchandiserImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
           $merchandiser= Merchandiser::where('name', $row[0])->first();
           $customer = Customer::where('name', $row[1])->first();
           $date = Carbon::create(1900, 1, 1)
                    ->addDays($row[2] - 2)
                    ->format('Y-m-d');
           $merchandiser->customers()->attach($customer->id, ['assign_date' => $date]);
        }
    }
}
