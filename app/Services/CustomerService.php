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
        // dd($request);
        return Customer::create([
            'name'                  => $request->name ?? null,
            'dksh_customer_id'      => $request->customer_id,
            'is_ba'                 => $request->is_ba,
            'address'               => $request->address,
            'phone_number'          => $request->phone_number,
            'division_state_id'     => $request->division,
            'total_frequency'       => $request->total_frequency,
            'township_id'           => $request->township,
            'city_id'               => $request->city,
            'customer_type_id'      => $request->customer_type,
        ]);
    }

    public function update(Request $request, Customer $customer)
    {
        try {
            DB::beginTransaction();
            $this->updateCustomer($request, $customer);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    
    private function updateCustomer($request, Customer $customer): void
    {
        $customer->update([
            'name'              => $request->name ?? $customer->name,
            'dksh_customer_id'  => $request->customer_id ?? $customer->dksh_customer_id,
            'is_ba'             => $request->is_ba ?? $customer->is_ba,
            'address'           => $request->address ?? $customer->address,
            'phone_number'      => $request->phone_number ?? $customer->phone_number,
            'division_state_id' => $request->division ?? $customer->division_state_id,
            'total_frequency'   => $request->total_frequency ?? $customer->total_frequency,
            'township_id'       => $request->township ?? $customer->township_id,
            'city_id'           => $request->city ?? $customer->city_id,
            'customer_type_id'  => $request->customer_type ?? $customer->customer_type_id,
        ]);
    }
}
