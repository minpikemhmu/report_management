<?php

namespace App\Services;

use App\Http\Requests\UpdateProductBrandRequest;
use Illuminate\Support\Facades\DB;
use App\Models\ProductBrand;

class ProductBrandService
{

  public function model(): ProductBrand
  {
    return new ProductBrand();
  }

  public function storeProductBrand($request)
  {
    try {
      DB::beginTransaction();
      $productBrand = $this->createProductBrand($request);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function createProductBrand($request): ProductBrand
  {
    return ProductBrand::create([
      'name'       => $request->name,
    ]);
  }

  public function update(UpdateProductBrandRequest $request, ProductBrand $productBrand)
    {
        try {
            DB::beginTransaction();
            $this->updateProductBrand($request, $productBrand);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

  private function updateProductBrand($request, ProductBrand $productBrand): void
  {
      $productBrand->update([
          'name' => $request->name ?? $productBrand->name,
      ]);
  }
}
