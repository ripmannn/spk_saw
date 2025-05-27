<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'tb_alternatif';
    protected $primaryKey = 'id_alternatif';
    public $incrementing = false;

    protected $fillable = ['id_alternatif', 'nama_alternatif'];

    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'id_alternatif', 'id_alternatif');
    }

    // Relasi many-to-many dengan kriteria melalui tabel nilai
    public function kriterias()
    {
        return $this->belongsToMany(Kriteria::class, 'tb_nilai', 'id_alternatif', 'id_kriteria')
                    ->withPivot('nilai')
                    ->withTimestamps();
    }
}
