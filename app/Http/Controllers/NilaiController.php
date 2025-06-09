<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Nilai';
        $kriterias = [];
        $alternatifs = [];
        $nilais = [];
        foreach (Kriteria::all() as $kriteria)
            $kriterias[$kriteria->id_kriteria] = $kriteria;
        foreach (Alternatif::all() as $alternatif)
            $alternatifs[$alternatif->id_alternatif] = $alternatif;
        foreach (Nilai::orderBy('id_alternatif')->orderBy('id_kriteria')->get() as $nilai)
            $nilais[$nilai->id_alternatif][$nilai->id_kriteria] = $nilai->nilai;

        return view('nilai.index', compact('title', 'kriterias', 'alternatifs', 'nilais'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
    {
        $title = 'Tambah Nilai';

        $idsAlternatifSudahAdaNilai = Nilai::select('id_alternatif')
                                          ->distinct()
                                          ->pluck('id_alternatif')
                                          ->all();

        // Variabel $alternatifs sekarang akan berisi alternatif yang belum dinilai
        $alternatifs = Alternatif::whereNotIn('id_alternatif', $idsAlternatifSudahAdaNilai)
                                 ->get();

        $kriterias = Kriteria::all();

        return view('nilai.create', compact('title', 'alternatifs', 'kriterias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_alternatif' => 'required',
            'nilai.*' => 'required|numeric|min:0|max:5'
        ]);

        foreach ($request->nilai as $id_kriteria => $nilai) {
            Nilai::updateOrCreate(
                ['id_alternatif' => $request->id_alternatif, 'id_kriteria' => $id_kriteria],
                ['nilai' => $nilai]
            );
        }

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_alternatif)
    {
        $title = 'Edit Nilai';
        $alternatif = Alternatif::findOrFail($id_alternatif);
        $kriterias = Kriteria::all();
        $nilaiMap = Nilai::where('id_alternatif', $id_alternatif)->pluck('nilai', 'id_kriteria');

        return view('nilai.edit', compact('title', 'alternatif', 'kriterias', 'nilaiMap'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_alternatif)
    {
        $request->validate([
            'nilai.*' => 'required|numeric|min:1|max:5'
        ]);

        foreach ($request->nilai as $id_kriteria => $v) {
            Nilai::updateOrCreate(
                ['id_alternatif' => $id_alternatif, 'id_kriteria' => $id_kriteria],
                ['nilai' => $v]
            );
        }

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_alternatif)
    {
        Nilai::where('id_alternatif', $id_alternatif)->delete();
        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus!');
    }
}
