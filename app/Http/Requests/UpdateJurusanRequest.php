<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJurusanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $id = $this->route('id');

        return [
            'kode_jurusan' => 'required|unique:dbjurusan,kode_jurusan,' . $id . '|max:20',
            'nama_jurusan' => 'required',
            'pilih_fakultas' => 'required',
            'keterangan' => 'nullable', // Optional field
        ];
    }

    public function messages()
    {
        return [
            'kode_jurusan.required' => 'Kode jurusan wajib diisi',
            'kode_jurusan.max' => 'Kode jurusan terlalu panjang',
            'nama_jurusan.required' => 'Nama jurusan wajib diisi',
            'pilih_fakultas.required' => 'Nama Fakultas wajib diisi',
        ];
    }
}
