<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductBrandResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductBrand;
use Illuminate\Http\Request;
use App\Traits\ResponserTraits;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;


class ProductApiController extends Controller
{
    use ResponserTraits;
    public function paginate(?int $perPage = 15): LengthAwarePaginator
    {
        dd(request('product_name'));
        return  $this->model()
            ->latest()
            ->where('name', 'like', '%' . request('product_name') ?? '' . '%')
            ->paginate($perPage)
            ->withQueryString();
    }

    public function index(Request $request)
    {
        $productName = isset($request['product_name']) ? $request['product_name'] : '';
        $limit = isset($request['limit']) ? $request['limit'] : '';

        $productsQuery = Product::query();

        if ($request->has('product_brands_id')) {
            $productsQuery->where('product_brands_id', $request->product_brands_id);
        }

        if ($request->has('product_category_id')) {
            $productsQuery->where('product_category_id', $request->product_category_id);
        }

        if ($request->has('product_key_category_id')) {
            $productsQuery->where('product_key_category_id', $request->product_key_category_id);
        }

        if ($request->has('product_sub_category_id')) {
            $productsQuery->where('product_sub_category_id', $request->product_sub_category_id);
        }

        $productsQuery->where('name', 'LIKE', "%$productName%");

        $products = $productsQuery->paginate($limit)->withQueryString();

        return $this->responseSuccessWithPaginate('success', ProductResource::collection($products));
    }

    public function getAllProductBrands(Request $request)
    {
        $productBrands = ProductBrand::all();
        return $this->responseSuccess('success', ProductBrandResource::collection($productBrands));
    }
}
