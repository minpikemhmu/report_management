<?php

namespace App\Exports;

use App\Models\MerchandiseReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BaDailyReportExport implements FromCollection, WithCustomCsvSettings, WithHeadings
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
        return ["No", "BA Report Date", "BA Report Type", "BA Code", "BA Name", "Region", "Supervisor", "City", "Key Channel", "Sub Channel", "Customer Name", "Customer ID", "Product ID", "Product Name", "Count"];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->reports;
    }
}
