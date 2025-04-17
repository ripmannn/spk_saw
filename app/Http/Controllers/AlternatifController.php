<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Alternatif';
        $alternatifs = Alternatif::all();
        return view('alternatif.index', compact('title', 'alternatifs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Alternatif';
        return view('alternatif.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_alternatif' => 'required|string|max:255',
        ]);

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

        Alternatif::create([
            'id_alternatif' => $newId,
            'nama_alternatif' => $request->nama_alternatif,
        ]);

        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternatif $alternatif)
    {
        $title = 'Edit Alternatif';
        return view('alternatif.edit', compact('alternatif', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'nama_alternatif' => 'required|string|max:255',
        ]);

        $alternatif->update([
            'nama_alternatif' => $request->nama_alternatif,
        ]);

        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();

        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil dihapus.');
    }
}
