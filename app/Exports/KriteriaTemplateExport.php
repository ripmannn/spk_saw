<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class KriteriaTemplateExport implements FromCollection, WithHeadings, WithTitle
{

    public function collection()
    {
        // Mengembalikan koleksi KOSONG (hanya header)
        return collect([
            [
                'Contoh Kriteria', // nama_kriteria
                'benefit', // atribut
                0.25 // bobot
            ]
        ]);
    }

    public function headings(): array
    {
        // Sesuaikan dengan struktur tabel
        return [
            'nama_kriteria',
            'atribut',
            'bobot'
        ];
    }

    public function title(): string
    {
        return 'kriteria';
    }
}
