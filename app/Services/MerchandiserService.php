<?php

namespace App\Services;

use App\Exceptions\CustomException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Merchandiser;

class MerchandiserService
{

    public function model(): Merchandiser
    {
        return new Merchandiser();
    }

    public function storeMerchandiser($request)
    {
        try {
            DB::beginTransaction();
            $merchandiser = $this->createMerchandiser($request);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    private function createMerchandiser($request): Merchandiser
    {
        return Merchandiser::create([
            'name'               => $request->name ?? null,
            'mer_code'           => $request->code,
            'region_id'          => $request->region,
            'merchant_team_id'   => $request->team,
            'merchant_area_id'   => $request->area,
            'channel_id'         => $request->channel,
            'password'           => Hash::make($request->password),
        ]);
    }

    public function update(Request $request, Merchandiser $merchandiser)
    {
        try {
            DB::beginTransaction();
            $this->updateMerchandiser($request, $merchandiser);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    
    private function updateMerchandiser($request, Merchandiser $merchandiser): void
    {
        $merchandiser->update([
            'name'               => $request->name ?? $merchandiser->name,
            'mer_code'           => $request->code ?? $merchandiser->mer_code,
            'region_id'          => $request->region ?? $merchandiser->region_id,
            'merchant_team_id'   => $request->team ?? $merchandiser->merchant_team_id,
            'merchant_area_id'   => $request->area ?? $merchandiser->merchant_area_id,
            'channel_id'         => $request->channel ?? $merchandiser->channel_id,
            'password'           => $request->password ? Hash::make($request->password) : $merchandiser->password,

        ]);
    }
}
