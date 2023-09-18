<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MrInputField;

class MrFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createOrUpdateField(3, "Product", "list_input", 'osa_products');
        $this->createOrUpdateField(3, "Gondolor Type", "list_input", 'gondolar_types');
        $this->createOrUpdateField(3, "Trip Type", "list_input", 'trip_types');
        $this->createOrUpdateField(3, "Gondolor Type", "list_input", 'outskirt_types');

        $this->createOrUpdateField(6, "Product", "list_input", 'posm_products');
        $this->createOrUpdateField(6, "Gondolor Type", "list_input", 'gondolar_types');
        $this->createOrUpdateField(6, "Trip Type", "list_input", 'trip_types');
        $this->createOrUpdateField(6, "Outskirt Type", "list_input", 'outskirt_types');

        $this->createOrUpdateField(8, "Product", "list_input", 'osa_hansaplast_products');
        $this->createOrUpdateField(8, "Gondolor Type", "list_input", 'gondolar_types');
        $this->createOrUpdateField(8, "Trip Type", "list_input", 'trip_types');
        $this->createOrUpdateField(8, "Outskirt Type", "list_input", 'outskirt_types');
    }

    private function createOrUpdateField($reportTypeId, $displayName, $fieldType, $listData)
    {
        $lastCount = MrInputField::where('merchandiser_report_type_id', $reportTypeId)->max('identifier');
        $lastOrder = MrInputField::where('merchandiser_report_type_id', $reportTypeId)->max('display_order');

        $count = $lastCount ? preg_replace('/[^0-9]/', '', $lastCount) + 1 : 1;

        MrInputField::updateOrCreate(
            [
                'merchandiser_report_type_id' => $reportTypeId,
                'display_name' => $displayName,
                'identifier' => "field_" . $count++,
                'display_order' => $lastOrder + 1,
                'field_type' => $fieldType,
                'isRequired' => 1,
                'list_data' => $listData,
                'active_status' => 1,
            ]
        );
    }
}
