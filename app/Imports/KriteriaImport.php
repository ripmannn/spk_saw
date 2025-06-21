<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\Kriteria;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithTitle;

class KriteriaImport implements ToModel, WithHeadingRow, WithValidation, WithTitle
{
    public function model(array $row)
    {
        // Get the last kriteria to generate new ID
        $last = Kriteria::orderBy('id_kriteria', 'desc')->first();
        
        if ($last) {
            $lastNumber = (int) substr($last->id_kriteria, 1);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        
        // Format the new ID as C01, C02, etc.
        $newId = 'C' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);
        
        return new Kriteria([
            'id_kriteria' => $newId,
            'nama_kriteria' => $row['nama_kriteria'],
            'atribut' => $row['atribut'],
            'bobot' => $row['bobot']
        ]);
    }
    
    public function rules(): array
    {
        return [
            'nama_kriteria' => [
                'required',
                'string',
                'max:255',
                'regex:/^[^0-9]*$/',
                'unique:tb_kriteria,nama_kriteria'
            ],
            'atribut' => function ($attribute, $value, $onFailure) {
                if (!in_array(strtolower($value), ['benefit', 'cost'])) {
                    $onFailure('Atribut harus benefit atau cost');
                }
            },
            'bobot' => 'required|numeric|min:0|max:5'
        ];
    }

    public function title(): string
    {
        return 'kriteria';
    }
}
