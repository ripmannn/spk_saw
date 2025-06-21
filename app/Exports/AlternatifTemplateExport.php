<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class AlternatifTemplateExport implements FromCollection, WithHeadings,withTitle
{
    public function collection()
    {
        return collect([
            [
          
                'nama_alternatif' => 'Mamat'
            ],
            [
             
                'nama_alternatif' => 'Contoh'
            ],
            
        ]);
    }

    public function headings(): array
    {
        return [
           
            'nama_alternatif'
        ];
    }

    public function title(): string
    {
        return 'alternatif';
    }
}