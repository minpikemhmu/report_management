<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\ProductKeyCategory;
use App\Models\ProductSubCategory;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Imports\productImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService)
    {        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $product_brands = ProductBrand::all();
        $product_categories = ProductCategory::all();
        $product_sub_categories = ProductSubCategory::all();
        return view('products.index', compact('products', 'product_brands', 'product_categories', 'product_sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $products = Product::all();
        $product_brands = ProductBrand::all();
        $product_categories = ProductCategory::all();
        $product_key_categories = ProductKeyCategory::all();
        $product_sub_categories = ProductSubCategory::all();
        return view('products.create', compact('product_brands', 'product_categories', 'product_key_categories', 'product_sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $this->productService->storeProduct($request);
        return redirect()->route('products.index')->with("successMsg",'New Product was ADDED in your data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // $products = Product::all();
        $product_brands = ProductBrand::all();
        $product_categories = ProductCategory::all();
        $product_sub_categories = ProductSubCategory::all();
        $product_key_categories = ProductKeyCategory::all();
        return view('products.edit', compact('product', 'product_brands', 'product_categories', 'product_key_categories','product_sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->productService->update($request, $product);
        return redirect()->route('products.index')->with("successMsg",'Existing Product was UPDATED in your data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function productImport(Request $request)
    {
        $import = new productImport();
        Excel::import($import, request()->file('file'));
        if($import->getSuccess() == false){
            return redirect()->back()->with('failedMsg', 'Some data are inavalid!.');
        }else{
            return redirect()->back()->with('successMsg', 'Excel file imported successfully.');
        }
    }
}
