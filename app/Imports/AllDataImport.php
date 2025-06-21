<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AllDataImport implements WithMultipleSheets 
{
    public function sheets(): array
    {
        return [
            'kriteria' => new KriteriaImport(),
            'alternatif' => new AlternatifImport(),
            'nilai' => new NilaiImport(),
        ];
    }
}