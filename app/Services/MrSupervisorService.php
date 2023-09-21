<?php

namespace App\Services;

use App\Http\Requests\UpdateMrSupervisorRequest;
use Illuminate\Support\Facades\DB;
use App\Models\MrSupervisor;
use Illuminate\Support\Facades\Hash;

class MrSupervisorService
{

  public function model(): MrSupervisor
  {
    return new MrSupervisor();
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

  private function createSupervisor($request): MrSupervisor
  {
    return MrSupervisor::create([
      'name'       => $request->name,
      'code'       => $request->code,
      'password'   => Hash::make($request->password),
      'executive_id' => $request->executive_id,
    ]);
  }

  public function update(UpdateMrSupervisorRequest $request, MrSupervisor $supervisor)
    {
        try {
            DB::beginTransaction();
            $this->updateSupervisor($request, $supervisor);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

  private function updateSupervisor($request, MrSupervisor $supervisor): void
  {
      $supervisor->update([
          'name' => $request->name ?? $supervisor->name,
          'code' => $request->code ?? $supervisor->code,
          'password' => $request->password ? Hash::make($request->password) : $supervisor->password,
          'executive_id' => $request->executive_id ?? $supervisor->executive_id,
      ]);
  }
}
