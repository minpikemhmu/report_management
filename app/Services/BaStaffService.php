<?php

namespace App\Services;

use App\Http\Requests\BaStaff\UpdateBaStaffRequest;
use App\Http\Requests\Outlets\UpdateOutletRequest;
use App\Models\BaStaff;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BaStaffService
{

  public function model(): BaStaff
  {
    return new BaStaff();
  }

  public function storeBaStaff($request)
  {
    try {
      DB::beginTransaction();
      $baStaff = $this->createBaStaff($request);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function createBaStaff($request): BaStaff
  {
    return BaStaff::create([
      'ba_code' => $request->ba_code,
      'name' => $request->name,
      'supervisor_id' => $request->supervisor_id,
      'city_id' => $request->city_id,
      'customer_id' => $request->customer_id,
      'channel_id' => $request->channel_id,
      'subchennel_id' => $request->subchennel_id,
      'password' => Hash::make($request->password),
    ]);
  }

  public function update(UpdateBaStaffRequest $request, BaStaff $baStaff)
  {
    try {
      DB::beginTransaction();
      $this->updateBaStaff($request, $baStaff);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function updateBaStaff($request, BaStaff $baStaff): void
  {
    // $baStaff=BaStaff::find($id);
    // dd($baStaff);
    $baStaff->update([
      'ba_code' => $request->ba_code ?? $baStaff->ba_code,
      'name' => $request->name ?? $baStaff->name,
      'supervisor_id' => $request->supervisor_id?? $baStaff->supervisor_id,
      'city_id' => $request->city_id  ?? $baStaff->city_id,
      // 'outlet_id' => $request->outlet_id  ?? $baStaff->outlet_id,
      'customer_id' => $request->customer_id  ?? $baStaff->customer_id,
      'channel_id' => $request->channel_id ?? $baStaff->channel_id,
      'subchennel_id' => $request->subchennel_id ?? $baStaff->subchennel_id,
      'password' => $request->password ? Hash::make($request->password) : $baStaff->password,
    ]);
  }
}
