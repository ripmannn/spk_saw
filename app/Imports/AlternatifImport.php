<?php

namespace App\Imports;

use App\Models\Alternatif;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithTitle;

class AlternatifImport implements ToModel, WithHeadingRow, WithValidation, WithTitle
{

    public function rules(): array
    {
        return [
            
            'nama_alternatif' => 'required|string|max:255|unique:tb_alternatif,nama_alternatif|regex:/^[^0-9]*$/'
        ];
    }
    public function model(array $row)
    {
        // Ambil ID terakhir
        $last = Alternatif::orderBy('id_alternatif', 'desc')->first();

        if ($last) {
            // Ambil angka dari ID terakhir, misal A03 -> 3
            $lastNumber = (int) substr($last->id_alternatif, 1);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Format jadi A01, A02, dst.
        $newId = 'A' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return new Alternatif([
            'id_alternatif' => $newId,
            'nama_alternatif' => $row['nama_alternatif']
            // Timestamps otomatis
        ]);
    }
    public function title(): string
    {
        return 'alternatif';
    }
}