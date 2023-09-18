<?php

namespace App\Services;
use App\Models\MrInputField;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateFieldRequest;

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
    } catch (\Exception $exception) {
      DB::rollBack();
    }
  }

  private function createField($request): MrInputField
  {
    $reportTypeId = $request->merchandiser_report_type_id;
    $lastCount = MrInputField::where('merchandiser_report_type_id', $reportTypeId)->max('identifier');
    if($lastCount == null){
      $count = 1;
    }else{
      $count = preg_replace('/[^0-9]/', '', $lastCount) + 1;
    }
    return MrInputField::create([
      'merchandiser_report_type_id' => $request->merchandiser_report_type_id,
      'display_name' => $request->display_name,
      'identifier' => "field_".$count++,
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
