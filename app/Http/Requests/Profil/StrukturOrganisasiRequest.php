<?php

namespace App\Http\Requests\Profil;

use Illuminate\Foundation\Http\FormRequest;

class StrukturOrganisasiRequest extends FormRequest
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
        if ($this->has('id')) {
            $id = $this->input('id');
            $gambar = '';
        } else {
            $id = 0;
            $gambar = '|required';
        }

        return [
            'id_katbagian' => 'required',
            'id_katjabatan' => 'required',
            'id_katgolongan' => 'required',
            'nip' => 'required|numeric|unique:pegawais,nip,'.$id,
            'nama' => 'required',
            'mulaijabat' => 'required|date_format:d/m/Y',
            'pendidikan' => 'required',
            'riwayatkerja' => 'required',
            'gambar' => 'image|mimes:jpeg,png,bmp,gif,svg'.$gambar
        ];
    }
}
