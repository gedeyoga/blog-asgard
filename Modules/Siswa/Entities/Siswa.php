<?php

namespace Modules\Siswa\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use Translatable;

    protected $table = 'siswa__siswas';
    public $translatedAttributes = [];
    protected $fillable = ['jurusan_id','nama' , 'umur' ,'gambar','alamat' , 'lng','lat'];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class , 'jurusan_id' , 'id');
    }
}
