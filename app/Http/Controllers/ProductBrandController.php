<?php

namespace App\Http\Controllers;

use App\Models\ProductBrand;
use App\Http\Requests\StoreProductBrandRequest;
use App\Http\Requests\UpdateProductBrandRequest;
use App\Services\ProductBrandService;

class ProductBrandController extends Controller
{
    public function __construct(private ProductBrandService $productBrandService)
    {   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_brands = ProductBrand::all();
        return view('product_brands.index', compact('product_brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductBrandRequest $request)
    {
        $this->productBrandService->storeProductBrand($request);
        return redirect()->route('product_brands.index')->with("successMsg",'New Product Brand was ADDED in your data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBrand $productBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productBrand = ProductBrand::find($id);
        return view('product_brands.edit', compact('productBrand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductBrandRequest  $request
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductBrandRequest $request, ProductBrand $productBrand)
    {
        $this->productBrandService->update($request, $productBrand);
        return redirect()->route('product_brands.index')->with("successMsg",'Existing Product Brand was UPDATED in your data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductBrand $productBrand)
    {
        //
    }
}
