<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\ProductKeyCategory;
use App\Models\ProductSubCategory;

class productImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public $message = true;
    public $errorRows;

    public function getSuccess()
    {
        return $this->message;
    }

    public function getErrorRows()
    {
        return $this->errorRows ?? [];
    }

    public function collection(Collection $collection)
    {
        $success = true; // Flag to track if all rows are correct
        $errorRows = [];
        foreach ($collection as $index => $row) {
            $brand = ProductBrand::where("name",$row[3])->first();

            if(isset($row[5])){
                $category = ProductCategory::where('name', $row[5])->first();
                if(!$category){
                    $success = false;
                    $errorRows[] = $index + 1;
                }
            }
            if(isset($row[6])){
                $sub_category = ProductSubCategory::where("name",$row[6])->first();
                if(!$sub_category){
                    $success = false;
                    $errorRows[] = $index + 1;
                }
            }
            if(isset($row[7])){
                $key_category = ProductKeyCategory::where("name",$row[7])->first();
                if(!$key_category){
                    $success = false;
                    $errorRows[] = $index + 1;
                }
            }

            if (!$brand) {
                $success = false;
                $errorRows[] = $index + 1;
            }
        }

        if ($success) {
            // All rows are correct, proceed with attaching and storing data
            foreach ($collection as $row) {
            $brand = ProductBrand::where("name",$row[3])->first();
            if(isset($row[5])){
                $category = ProductCategory::where('name', $row[5])->first();
                $category_id = $category->id;
            }else{
                $category_id = $row[5];
            }

            if(isset($row[6])){
                $sub_category = ProductSubCategory::where("name",$row[6])->first();
                $sub_category_id = $sub_category->id;
            }else{
                $sub_category_id = $row[6];
            }


            if(isset($row[7])){
                $key_category = ProductKeyCategory::where("name",$row[7])->first();
                $key_category_id = $key_category->id;
            }else{
                $key_category_id = $row[7];
            }
            Product::create([
                'name' => $row[0],
                'product_code' => $row[1],
                'brn_code' => $row[2],
                'product_brands_id' => $brand->id,
                'price' => $row[4],
                'product_category_id' => $category_id,
                'product_key_category_id' => $sub_category_id,
                'product_sub_category_id' => $key_category_id,
                'size' => $row[8],
            ]);
        }

            $this->message = true;
        } else {
            $this->message = false;
            $this->errorRows = $errorRows[0];
        }
    }
}
