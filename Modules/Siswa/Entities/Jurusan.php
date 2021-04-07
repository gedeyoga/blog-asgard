<?php

namespace Modules\Siswa\Entities;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'siswa__jurusans';
    protected $fillable = ['nama_jurusan'];

    public function siswa(){
        return $this->hasMany(Siswa::class , 'jurusan_id' , 'id');
    }
}
