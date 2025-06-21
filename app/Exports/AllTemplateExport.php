<?php
namespace App\Exports;


use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\KriteriaTemplateExport;
use App\Exports\AlternatifTemplateExport;
use App\Exports\NilaiTemplateExport;

class AllTemplateExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new KriteriaTemplateExport(),
            new AlternatifTemplateExport(),
            new NilaiTemplateExport()
        ];
    }
}