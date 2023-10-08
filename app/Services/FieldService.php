<?php

namespace App\Services;
use App\Models\MrInputField;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateFieldRequest;
use App\Exceptions\FieldException;

class FieldService
{

  public function model(): MrInputField
  {
    return new MrInputField();
  }

  public function storeField($request)
  {
    try {
      DB::beginTransaction();
      $field = $this->createField($request);
      DB::commit();
    } catch (FieldException $exception) {
      DB::rollBack();
      throw new FieldException($exception);
    }
  }

  private function createField($request)
  {
    $reportTypeId = $request->merchandiser_report_type_id;
    $lastCount = MrInputField::where('merchandiser_report_type_id', $reportTypeId)
        ->selectRaw('MAX(CAST(SUBSTRING(identifier, 7) AS UNSIGNED)) AS numeric_part')
        ->first();
    if($lastCount->numeric_part == null){
      $count = 1;
    }else if($lastCount->numeric_part >= 20){
      throw new FieldException;
    }else{
      $count = $lastCount->numeric_part + 1;
    }
    return MrInputField::create([
      'merchandiser_report_type_id' => $request->merchandiser_report_type_id,
      'display_name' => $request->display_name,
      'identifier' => "field_".$count,
      'display_order' => $request->display_order,
      'field_type' => $request->field_type,
      'isRequired' => $request->isRequired,
      'list_data' => $request->list_data,
      'active_status' => $request->active_status,
    ]);
  }

  public function update(UpdateFieldRequest $request, MrInputField $field)
  {
    try {
      DB::beginTransaction();
      $this->updateField($request, $field);
      DB::commit();
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function updateField($request, MrInputField $field): void
  {
    // dd($request->all());
    $field->update([
      'display_name' => $request->display_name ?? $field->display_name,
      'display_order' => $request->display_order ?? $field->display_order,
      'field_type' => $request->field_type ?? $field->field_type,
      'isRequired' => $request->isRequired ?? $field->isRequired,
      'list_data' => $request->list_data ?? $field->list_data,
      'active_status' => $request->active_status ?? $field->active_status,
    ]);
  }
}
