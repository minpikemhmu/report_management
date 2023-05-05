<?php

namespace App\Exports;

use App\Models\MerchandiseReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MerchandiserReportExport implements FromCollection, WithCustomCsvSettings, WithHeadings
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
        return ["No", "Report Date", "Merchandiser Name", "Customer Name", "Gondolar Type", "Trip Type", "Outskirt Type", "remark", "gondolar_size_inches_length", 'gondolar_size_inches_weight', "gondolar_size_centimeters_length", "gondolar_size_centimeters_weight", 'backlit_size_inches_length', "backlit_size_inches_weight", "backlit_size_centimeters_length",'backlit_size_centimeters_weight', "qty", "latitude",'longitude'];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->reports;
    }
}
