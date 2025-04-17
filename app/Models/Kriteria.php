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

}
