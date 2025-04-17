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
}
