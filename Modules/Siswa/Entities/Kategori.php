<?php

namespace Modules\Siswa\Entities;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "siswa__kategories";
    protected $fillable = ['nama_kategori'];
}
