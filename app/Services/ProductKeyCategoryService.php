<?php

namespace App\Services;

use App\Http\Requests\UpdateProductKeyCategoryRequest;
use App\Models\ProductKeyCategory;
use Illuminate\Support\Facades\DB;

class ProductKeyCategoryService
{

  public function model(): ProductKeyCategory
  {
    return new ProductKeyCategory();
  }

  public function storeProductKeyCategory($request)
  {
    try {
      DB::beginTransaction();
      $productSubCategory = $this->createProductKeyCategory($request);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function createProductKeyCategory($request): ProductKeyCategory
  {
    return ProductKeyCategory::create([
      'name'       => $request->name,
    ]);
  }

  public function update(UpdateProductKeyCategoryRequest $request, $id)
  {
    try {
      DB::beginTransaction();
      $this->updateProductKeyCategory($request, $id);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function updateProductKeyCategory($request, $id): void
  {
    $productSubCategory = ProductKeyCategory::find($id);
    $productSubCategory->update([
      'name' => $request->name ?? $productSubCategory->name,
    ]);
  }
}
