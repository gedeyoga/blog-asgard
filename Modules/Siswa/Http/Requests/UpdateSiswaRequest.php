<?php

namespace Modules\Siswa\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateSiswaRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'jurusan_id' => 'required|integer',
            'nama' => 'required|string|min:2',
            'umur' => 'required|integer',
            'gambar' => ''
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
