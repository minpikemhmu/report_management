<?php

namespace App\Services;

use App\Http\Requests\UpdateMrLeaderRequest;
use Illuminate\Support\Facades\DB;
use App\Models\MrLeader;

class MrLeaderService
{

  public function model(): MrLeader
  {
    return new MrLeader();
  }

  public function storeLeader($request)
  {
    try {
      DB::beginTransaction();
      $leader = $this->createLeader($request);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function createLeader($request): MrLeader
  {
    return MrLeader::create([
      'name'       => $request->name,
      'supervisor_id' => $request->supervisor_id,
    ]);
  }

  public function update(UpdateMrLeaderRequest $request, MrLeader $leader)
    {
        try {
            DB::beginTransaction();
            $this->updateLeader($request, $leader);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

  private function updateLeader($request, MrLeader $leader): void
  {
      $leader->update([
          'name' => $request->name ?? $leader->name,
          'supervisor_id' => $request->supervisor_id ?? $leader->supervisor_id,
      ]);
  }
}
