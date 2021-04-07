<?php

namespace Modules\Siswa\Entities;

use Illuminate\Database\Eloquent\Model;

class SiswaTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'siswa__siswa_translations';
}
