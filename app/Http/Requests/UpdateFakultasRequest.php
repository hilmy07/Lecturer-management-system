<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFakultasRequest extends FormRequest
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
            'kode_fakultas' => 'required|unique:dbfakultas,kode_fakultas,' . $id . '|max:20',
            'nama_fakultas' => 'required',
            'keterangan' => 'nullable', // Optional field
        ];
    }

    public function messages()
    {
        return [
            'kode_jurusan.required' => 'Kode fakultas wajib diisi',
            'kode_jurusan.max' => 'Kode fakultas terlalu panjang',
            'nama_jurusan.required' => 'Nama fakultas wajib diisi',
        ];
    }
}
