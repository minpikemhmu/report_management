<?php

namespace App\Services;

use App\Http\Requests\StoreBaDailyReportRequest;
use App\Http\Requests\UpdateBaDailyReportRequest;
use App\Models\BaDailyReport;
use App\Models\BaDailyReportProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class BaDailyReportService
{
  public function model(): BaDailyReport
  {
    return new BaDailyReport();
  }

  public function store(StoreBaDailyReportRequest $request)
  {
    try {
      DB::beginTransaction();
      $baDailyReport = $this->createBaDailyReport($request);
      DB::commit();
      return $baDailyReport;
    } catch (\Exception $exception) {
      DB::rollBack();
      throw $exception;
    }
  }

  private function createBaDailyReport(StoreBaDailyReportRequest $request): BaDailyReport
  {
    $baDailyReport = Arr::except($request->all(), 'products');
    $productsData = Arr::get($request->all(), 'products', []);

    $report = BaDailyReport::create($baDailyReport);
    

    foreach ($productsData as $productData) {
      $product = Product::findOrFail($productData['product_id']);
      $count = $productData['count'];
      if(isset($productData['manufacture_date'])){
        $manufacture_date=$productData['manufacture_date'];
      }else{
        $manufacture_date= null;
      }
      if(isset($productData['expiry_date'])){
        $expiry_date = $productData['expiry_date'];
      }else{
        $expiry_date = null;
      }
      $price = $product->price;

      // Creating and commit the BaDailyReportProducts
      BaDailyReportProduct::create([
        'ba_daily_report_id' => $report->id,
        'product_id' => $product->id,
        'count' => $count,
        'price' => $price,
        'manufacture_date' => $manufacture_date,
        'expiry_date' => $expiry_date,
      ]);
    }
    
    return $report;

  }


  // public function update(UpdateBaDailyReportRequest $request, BaDailyReport $baDailyReport)
  // {
  //   try {
  //     DB::beginTransaction();
  //     $this->updateBaDailyReport($request, $baDailyReport);
  //     DB::commit();
  //     return $baDailyReport;
  //   } catch (\Exception $exception) {
  //     DB::rollBack();
  //     throw $exception;
  //   }
  // }

  // private function updateBaDailyReport(UpdateBaDailyReportRequest $request, BaDailyReport $baDailyReport): void
  // {
  //   $baDailyReport->update([
  //     'ba_report_date' => $request->ba_report_date ?? $baDailyReport->ba_report_date,
  //     'bastaff_id' => $request->bastaff_id ?? $baDailyReport->bastaff_id,
  //     'outlet_id' => $request->outlet_id ?? $baDailyReport->outlet_id,
  //     'ba_report_type_id' => $request->ba_report_type_id ?? $baDailyReport->ba_report_type_id,
  //   ]);

  // }
}
