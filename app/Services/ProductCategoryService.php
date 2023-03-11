<?php

namespace App\Services;

use App\Http\Requests\UpdateProductCategoryRequest;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;

class ProductCategoryService
{

  public function model(): ProductCategory
  {
    return new ProductCategory();
  }

  public function storeProductCategory($request)
  {
    try {
      DB::beginTransaction();
      $productCategory = $this->createProductCategory($request);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function createProductCategory($request): ProductCategory
  {
    return ProductCategory::create([
      'name'       => $request->name,
    ]);
  }

  public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        try {
            DB::beginTransaction();
            $this->updateProductCategory($request, $productCategory);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

  private function updateProductCategory($request, ProductCategory $productCategory): void
  {
      $productCategory->update([
          'name' => $request->name ?? $productCategory->name,
      ]);
  }
}
