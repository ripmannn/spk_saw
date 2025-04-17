<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Kriteria';
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('title', 'kriterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Kriteria';
        return view('kriteria.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'nama_kriteria' => 'required',
            'atribut' => 'required|in:Benefit,Cost',
            'bobot' => 'required|numeric|min:0|max:1'
        ]);

        $last = Kriteria::orderBy('id_kriteria', 'desc')->first();

        if ($last) {
            // Extract the number from the last ID, e.g., K03 -> 3
            $lastNumber = (int) substr($last->id_kriteria, 1);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Format the new ID as K01, K02, etc.
        $newId = 'C' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        Kriteria::create([
            'id_kriteria' => $newId,
            'nama_kriteria' => $request->nama_kriteria,
            'atribut' => $request->atribut,
            'bobot' => $request->bobot,
        ]);
        return redirect()->route('kriteria.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        $title = 'Edit Kriteria';
        return view('kriteria.edit', compact('kriteria', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'atribut' => 'required|in:benefit,cost',
            'bobot' => 'required|numeric'
        ]);

        $kriteria->update($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriteria.index')->with('success', 'Data berhasil dihapus');
    }
}
