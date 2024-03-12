<?php

namespace App\Exports;

use App\Models\MerchandiseReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerReportExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    protected $reports;

    public function __construct($reports)
    {
        $this->reports = $reports;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return ["No", "Name", "dksh customer id", "is_ba", "address", "phone_number", "division_state", "township", "city", "customer type", "total_frequency", "outlet brand",];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->reports;
    }
}
