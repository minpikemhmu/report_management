<?php

namespace App\Services;

use App\Http\Requests\UpdateProductSubCategoryRequest;
use App\Models\ProductSubCategory;
use Illuminate\Support\Facades\DB;

class ProductSubCategoryService
{

  public function model(): ProductSubCategory
  {
    return new ProductSubCategory();
  }

  public function storeProductSubCategory($request)
  {
    try {
      DB::beginTransaction();
      $productSubCategory = $this->createProductSubCategory($request);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function createProductSubCategory($request): ProductSubCategory
  {
    return ProductSubCategory::create([
      'name'       => $request->name,
    ]);
  }

  public function update(UpdateProductSubCategoryRequest $request, $id)
  {
    try {
      DB::beginTransaction();
      $this->updateProductSubCategory($request, $id);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function updateProductSubCategory($request, $id): void
  {
    $productSubCategory = ProductSubCategory::find($id);
    $productSubCategory->update([
      'name' => $request->name ?? $productSubCategory->name,
    ]);
  }
}
