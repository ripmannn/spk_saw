<?php

namespace App\Exports;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
class NilaiTemplateExport implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
        // Ambil beberapa alternatif dan kriteria untuk contoh
        $alternatifs = Alternatif::limit(2)->get(['id_alternatif']);
        $kriterias = Kriteria::limit(2)->get(['id_kriteria']);
        
        $data = collect();
        
        // Buat kombinasi
        foreach ($alternatifs as $alt) {
            foreach ($kriterias as $kri) {
                $data->push([
                    'id_alternatif' => $alt->id_alternatif,
                    'id_kriteria' => $kri->id_kriteria,
                    'nilai' => rand(1, 5) // nilai contoh
                ]);
            }
        }
        
        return $data;
    }

    public function headings(): array
    {
        return [
            'id_alternatif',
            'id_kriteria',
            'nilai'
        ];
    }

    public function title(): string
    {
        return 'nilai';
    }
}
