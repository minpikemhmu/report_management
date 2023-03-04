<?php

namespace App\Services;

use App\Exceptions\CustomException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Customer;

class CustomerService
{

    public function model(): Customer
    {
        return new Customer();
    }

    public function storeCustomer($request)
    {
        try {
            DB::beginTransaction();
            $customer = $this->createCustomer($request);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    private function createCustomer($request): Customer
    {
        return Customer::create([
            'name'                  => $request->name ?? null,
            'dksh_customer_id'      => $request->customer_id,
            'address'               => $request->address,
            'phone_number'          => $request->phone_number,
            'division_state_id'     => $request->division,
            'region_id'             => $request->region,
            'township_id'           => $request->township,
            'city_id'               => $request->city,
            'customer_type'         => $request->customer_type,
        ]);
    }
}
