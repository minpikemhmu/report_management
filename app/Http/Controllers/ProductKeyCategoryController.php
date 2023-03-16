<?php

namespace App\Http\Controllers;

use App\Models\ProductKeyCategory;
use App\Http\Requests\StoreProductKeyCategoryRequest;
use App\Http\Requests\UpdateProductKeyCategoryRequest;
use App\Services\ProductKeyCategoryService;

class ProductKeyCategoryController extends Controller
{
    public function __construct(private ProductKeyCategoryService $productKeyCategoryService) 
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productKeyCategories = ProductKeyCategory::all();
        return view('product_key_categories.index', compact('productKeyCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_key_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductKeyCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductKeyCategoryRequest $request)
    {
        $this->productKeyCategoryService->storeProductKeyCategory($request);
        return redirect()->route('product_key_cateogories.index')->with("successMsg",'New Product Key Category was ADDED in your data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductKeyCategory  $productKeyCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductKeyCategory $productKeyCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductKeyCategory  $productKeyCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productKeyCategory = ProductKeyCategory::find($id);
        return view('product_key_categories.edit', compact('productKeyCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductKeyCategoryRequest  $request
     * @param  \App\Models\ProductKeyCategory  $productKeyCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductKeyCategoryRequest $request, $id)
    {
        $this->productKeyCategoryService->update($request, $id);
        return redirect()->route('product_key_cateogories.index')->with("successMsg",'Existing Product Key Category was UPDATED in your data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductKeyCategory  $productKeyCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductKeyCategory $productKeyCategory)
    {
        //
    }
}
