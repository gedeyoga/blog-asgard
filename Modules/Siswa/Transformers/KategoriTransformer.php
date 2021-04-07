<?php

namespace Modules\Siswa\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class KategoriTransformer extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_kategori' => $this->nama_kategori,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
