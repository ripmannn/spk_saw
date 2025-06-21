<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\KriteriaImport;
use App\Exports\KriteriaTemplateExport;
use App\Imports\AlternatifImport;
use App\Exports\AlternatifTemplateExport;
use App\Imports\NilaiImport;
use App\Exports\NilaiTemplateExport;
use App\Exports\AllTemplateExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

use App\Imports\AllDataImport;

class ImportController extends Controller
{
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new KriteriaImport, $request->file('file'));

        return back()->with('success', 'Data berhasil diimport!');
    }

    public function downloadTemplate()
    {
        return Excel::download(
            new KriteriaTemplateExport(),
            'template-kriteria.xlsx' // Nama file
        );
    }

    public function importAlternatif(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new AlternatifImport, $request->file('file'));

        return back()->with('success', 'Data Alternatif berhasil diimport!');
    }

    public function downloadAlternatifTemplate()
    {
        return Excel::download(
            new AlternatifTemplateExport(),
            'template-alternatif.xlsx'
        );
    }

    public function importNilai(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        try {
            Excel::import(new NilaiImport, $request->file('file'));
            return back()->with('success', 'Data Nilai berhasil diimport!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function downloadNilaiTemplate()
    {
        return Excel::download(
            new NilaiTemplateExport(),
            'template-nilai.xlsx'
        );
    }


    public function importAll(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        try {
            // Verify if the uploaded file has the required sheets
            $filePath = $request->file('file')->getRealPath();
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);

            // Check if required sheets exist
            $requiredSheets = ['kriteria', 'alternatif', 'nilai'];
            $sheetNames = $spreadsheet->getSheetNames();

            foreach ($requiredSheets as $sheet) {
                if (!in_array($sheet, $sheetNames)) {
                    return back()->withErrors(['error' => "Sheet '$sheet' tidak ditemukan di file Excel. Pastikan semua sheet ada (kriteria, alternatif, nilai)."]);
                }
            }

            // Pastikan import berurutan: kriteria -> alternatif -> nilai
            DB::transaction(function () use ($request) {
                Excel::import(new AllDataImport, $request->file('file'));
            });

            return back()->with('success', 'Semua data berhasil diimport!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function downloadAllTemplate()
    {
        $filename = 'template-full.xlsx';

        return Excel::download(
            new AllTemplateExport(),
            $filename,
            \Maatwebsite\Excel\Excel::XLSX,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"'
            ]
        );
    }
}
