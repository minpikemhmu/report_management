<?php

namespace App\Services;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{

  public function model(): Product
  {
    return new Product();
  }

  public function storeProduct($request)
  {
    try {
      DB::beginTransaction();
      $product = $this->createProduct($request);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function createProduct($request): Product
  {
    return Product::create([
      'name' => $request->name,
      'product_code' => $request->product_code,
      'brn_code' => $request->brn_code,
      'product_brands_id' => $request->product_brands_id,
      'product_category_id' => $request->product_category_id,
      'product_sub_category_id' => $request->product_sub_category_id,
      'size' => $request->size,
    ]);
  }

  public function update(UpdateProductRequest $request, Product $product)
  {
    try {
      DB::beginTransaction();
      $this->updateProduct($request, $product);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function updateProduct($request, Product $product): void
  {
    $product->update([
      'name' => $request->name ?? $product->name,
      'product_code' => $request->product_code ?? $product->product_code,
      'brn_code' => $request->brn_code ?? $product->brn_code,
      'product_brands_id' => $request->product_brands_id ?? $product->product_brands_id,
      'product_category_id' => $request->product_category_id ?? $product->product_category_id,
      'product_sub_category_id' => $request->product_sub_category_id ?? $product->product_sub_category_id,
      'size' => $request->size ?? $product->size,
    ]);
  }
}
