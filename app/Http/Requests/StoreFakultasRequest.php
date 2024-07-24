<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFakultasRequest extends FormRequest
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
        return [
            'kode_fakultas' => 'required|unique:dbfakultas,kode_fakultas|max:20',
            'nama_fakultas' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'kode_fakultas.required' => 'Kode fakultas wajib diisi',
            'kode_fakultas.unique' => 'Kode fakultas ini telah digunakan',
            'kode_fakultas.max' => 'Kode fakultas terlalu panjang',
            'nama_fakultas.required' => 'Nama fakultas wajib diisi',
        ];
    }
}
