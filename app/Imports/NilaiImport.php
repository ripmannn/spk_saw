<?php

namespace App\Imports;

use App\Models\Nilai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithTitle;

class NilaiImport implements ToCollection, WithHeadingRow, WithTitle
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Validasi manual
            $this->validateRow($row);
            
            // Gunakan updateOrCreate untuk menghindari duplikasi
            Nilai::updateOrCreate(
                [
                    'id_alternatif' => $row['id_alternatif'],
                    'id_kriteria' => $row['id_kriteria']
                ],
                [
                    'nilai' => $row['nilai']
                ]
            );
        }
    }

    protected function validateRow($row)
    {
        $validator = \Validator::make($row->toArray(), [
            'id_alternatif' => [
                'required',
                'string',
                'max:16',
                Rule::exists('tb_alternatif', 'id_alternatif')
            ],
            'id_kriteria' => [
                'required',
                'string',
                'max:16',
                Rule::exists('tb_kriteria', 'id_kriteria')
            ],
            'nilai' => 'required|numeric|min:0|max:5'
        ], [
            'id_alternatif.exists' => 'ID Alternatif tidak ditemukan',
            'id_kriteria.exists' => 'ID Kriteria tidak ditemukan'
        ]);

        if ($validator->fails()) {
            throw new \Exception(implode(', ', $validator->errors()->all()));
        }
    }

    public function title(): string
    {
        return 'nilai';
    }
}
