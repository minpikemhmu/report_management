<?php

namespace App\Services;

use App\Http\Requests\StoreBaAssignRequest;
use App\Models\BaAssign;
use Illuminate\Support\Facades\DB;

class BaAssignService
{
    public function model(): BaAssign
    {
        return new BaAssign();
    }

    public function storeBaAssign(StoreBaAssignRequest $request)
    {
        try {
            DB::beginTransaction();
            $baAssign = $this->createBaAssign($request);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    private function createBaAssign(StoreBaAssignRequest $request): BaAssign
    {
        return BaAssign::create([
            'ba_staff_id' => $request->ba_staff_id,
            'product_key_category_id' => $request->product_key_category_id,
            'target_quantity' => $request->target_quantity,
            'month' => $request->month,
            'year' => $request->year,
        ]);
    }
}
