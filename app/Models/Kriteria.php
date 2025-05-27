<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'tb_kriteria';
    protected $primaryKey = 'id_kriteria';
    public $incrementing = false;
    protected $fillable = ['id_kriteria', 'nama_kriteria', 'atribut', 'bobot'];

    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'id_kriteria', 'id_kriteria');
    }

    // Relasi many-to-many dengan alternatif melalui tabel nilai
    public function alternatifs()
    {
        return $this->belongsToMany(Alternatif::class, 'tb_nilai', 'id_kriteria', 'id_alternatif')
            ->withPivot('nilai')
            ->withTimestamps();
    }

}
