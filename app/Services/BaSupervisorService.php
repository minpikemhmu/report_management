<?php

namespace App\Services;

use App\Http\Requests\UpdateBaSupervisorRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Supervisor;
use Illuminate\Support\Facades\Hash;

class BaSupervisorService
{

  public function model(): Supervisor
  {
    return new Supervisor();
  }

  public function storeSupervisor($request)
  {
    try {
      DB::beginTransaction();
      $supervisor = $this->createSupervisor($request);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function createSupervisor($request): Supervisor
  {
    return Supervisor::create([
      'name'       => $request->name,
      'code'       => $request->code,
      'password'   => Hash::make($request->password),
      'executive_id' => $request->executive_id,
      'region_id'  => $request->region_id,
    ]);
  }

  public function update(UpdateBaSupervisorRequest $request, Supervisor $supervisor)
    {
        try {
            DB::beginTransaction();
            $this->updateSupervisor($request, $supervisor);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

  private function updateSupervisor($request, Supervisor $supervisor): void
  {
      $supervisor->update([
          'name' => $request->name ?? $supervisor->name,
          'code' => $request->code ?? $supervisor->code,
          'password' => $request->password ? Hash::make($request->password) : $supervisor->password,
          'executive_id' => $request->executive_id ?? $supervisor->executive_id,
          'region_id' => $request->region_id ?? $supervisor->region_id,
      ]);
  }
}
