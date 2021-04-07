<?php

namespace Modules\Mahasiswa\Entities;

use Illuminate\Database\Eloquent\Model;

class MahasiswaTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'mahasiswa__mahasiswa_translations';
}
