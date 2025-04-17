<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class HitungController extends Controller
{

    public function index()
    {
        $title = 'Perhitungan';
        $kriterias = [];
        $alternatifs = [];
        $nilais = [];
        foreach (Kriteria::all() as $kriteria)
            $kriterias[$kriteria->id_kriteria] = $kriteria;
        foreach (Alternatif::all() as $alternatif)
            $alternatifs[$alternatif->id_alternatif] = $alternatif;
        foreach (Nilai::orderBy('id_alternatif')->orderBy('id_kriteria')->get() as $nilai)
            $nilais[$nilai->id_alternatif][$nilai->id_kriteria] = $nilai->nilai;

        $minmax = [];
        $arr = [];
        foreach ($nilais as $key => $val) {
            foreach ($val as $k => $v) {
                $arr[$k][$key] = $v;
            }
        }
        foreach ($arr as $key => $val) {
            $minmax[$key]['min'] = min($val);
            $minmax[$key]['max'] = max($val);
        }
        $normal = [];
        foreach ($nilais as $key => $val) {
            foreach ($val as $k => $v) {
                $normal[$key][$k] = strtolower($kriterias[$k]->atribut) == 'benefit' ? $v / $minmax[$k]['max'] : $minmax[$k]['min'] / $v;
            }
        }
        $terbobot = [];
        foreach ($normal as $key => $val) {
            foreach ($val as $k => $v) {
                $terbobot[$key][$k] = $v * $kriterias[$k]->bobot;
            }
        }
        $total = [];
        foreach ($terbobot as $key => $val) {
            $total[$key] = array_sum($val);
        }
        arsort($total);
        $rank = [];
        $no = 1;
        foreach ($total as $key => $val) {
            $rank[$key] = $no++;
        }
        ksort($total);
        return view('hitung.index', compact('title', 'kriterias', 'alternatifs', 'nilais', 'minmax', 'normal', 'terbobot', 'total', 'rank'));
    }
    
}
