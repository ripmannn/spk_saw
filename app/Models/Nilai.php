<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'tb_nilai';
    protected $primaryKey = 'id_nilai';
    protected $fillable = ['id_alternatif', 'id_kriteria', 'nilai'];
}
