<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $title = 'Dashboard SPK';
        
        // Ambil data untuk perhitungan
        $kriterias = [];
        $alternatifs = [];
        $nilais = [];
        
        foreach (Kriteria::all() as $kriteria)
            $kriterias[$kriteria->id_kriteria] = $kriteria;
            
        foreach (Alternatif::all() as $alternatif)
            $alternatifs[$alternatif->id_alternatif] = $alternatif;
            
        foreach (Nilai::orderBy('id_alternatif')->orderBy('id_kriteria')->get() as $nilai)
            $nilais[$nilai->id_alternatif][$nilai->id_kriteria] = $nilai->nilai;

        // Hitung min dan max
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

        // Normalisasi
        $normal = [];
        foreach ($nilais as $key => $val) {
            foreach ($kriterias as $k => $kriteria) {
                if (isset($val[$k]) && isset($minmax[$k]['min']) && isset($minmax[$k]['max']) && $val[$k] != 0) {
                    if (strtolower($kriteria->atribut) == 'benefit') {
                        $normal[$key][$k] = $val[$k] / ($minmax[$k]['max'] ?: 1);
                    } else {
                        $normal[$key][$k] = ($minmax[$k]['min'] ?: 1) / $val[$k];
                    }
                } else {
                    $normal[$key][$k] = null;
                }
            }
        }

        // Pembobotan
        $terbobot = [];
        foreach ($normal as $key => $val) {
            foreach ($val as $k => $v) {
                $terbobot[$key][$k] = $v * $kriterias[$k]->bobot;
            }
        }

        // Total nilai
        $total = [];
        foreach ($terbobot as $key => $val) {
            $total[$key] = array_sum($val);
        }

        // Ranking
        arsort($total);
        $rank = [];
        $no = 1;
        foreach ($total as $key => $val) {
            $rank[$key] = $no++;
        }
        ksort($total);

        // Format data untuk chart
        $chartData = [
            'labels' => [],
            'values' => [],
            'ranks' => []
        ];
        
        foreach ($total as $id_alternatif => $totalNilai) {
            $chartData['labels'][] = $alternatifs[$id_alternatif]->nama_alternatif . ' (' . $alternatifs[$id_alternatif]->id_alternatif . ')';
            $chartData['values'][] = $totalNilai;
            $chartData['ranks'][] = $rank[$id_alternatif];
        }
       
        return view('home', compact('title', 'chartData'));
    }
}
