<?php

namespace Modules\Mahasiswa\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use Translatable;

    protected $table = 'mahasiswa__mahasiswas';
    public $translatedAttributes = [];
    protected $fillable = [];
}
