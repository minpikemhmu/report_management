<?php

namespace App\Services;

use App\Http\Requests\Outlets\UpdateOutletRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Outlet;

class OutletService
{

  public function model(): Outlet
  {
    return new Outlet();
  }

  public function storeOutlet($request)
  {
    try {
      DB::beginTransaction();
      $outlet = $this->createOutlet($request);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function createOutlet($request): Outlet
  {
    return Outlet::create([
      'outlet_id'  => $request->outlet_id,
      'name'       => $request->name,
    ]);
  }

  public function update(UpdateOutletRequest $request, Outlet $outlet)
    {
        try {
            DB::beginTransaction();
            $this->updateOutlet($request, $outlet);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

  private function updateOutlet($request, Outlet $outlet): void
  {
      $outlet->update([
          'outlet_id' => $request->outlet_id ?? $outlet->outlet_id,
          'name' => $request->name ?? $outlet->name,
      ]);
  }
}
