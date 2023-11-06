<?php

namespace App\Exports;

use App\Models\MerchandiseReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MerchandiserReportExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    protected $reports;
    protected $excelColumns;

    public function __construct($reports, $excelColumns)
    {
        $this->reports = $reports;
        $this->excelColumns = $excelColumns;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function headings(): array
    {
        return $this->excelColumns;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->reports;
    }
}
