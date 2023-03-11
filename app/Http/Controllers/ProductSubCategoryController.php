<?php

namespace App\Http\Controllers;

use App\Models\ProductSubCategory;
use App\Http\Requests\StoreProductSubCategoryRequest;
use App\Http\Requests\UpdateProductSubCategoryRequest;
use App\Services\ProductSubCategoryService;

class ProductSubCategoryController extends Controller
{
    public function __construct(private ProductSubCategoryService $ProductSubCategoryService) 
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productSubCategories = ProductSubCategory::all();
        return view('product_sub_categories.index', compact('productSubCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_sub_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductSubCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductSubCategoryRequest $request)
    {
        $this->ProductSubCategoryService->storeProductSubCategory($request);
        return redirect()->route('product_sub_cateogories.index')->with("successMsg",'New Product Sub Category was ADDED in your data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSubCategory $productSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productSubCategory = ProductSubCategory::find($id);
        return view('product_sub_categories.edit', compact('productSubCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductSubCategoryRequest  $request
     * @param  \App\ModelsProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductSubCategoryRequest $request, $id)
    {
        $this->ProductSubCategoryService->update($request, $id);
        return redirect()->route('product_sub_cateogories.index')->with("successMsg",'Existing Product Sub Category was UPDATED in your data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductSubCategory $productSubCategory)
    {
        //
    }
}
