<?php

namespace App\Http\Requests\DataKerjasama;

use Illuminate\Foundation\Http\FormRequest;

class KerjasamaDnRequest extends FormRequest
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
            'id_katdn' => 'required',
            'id_katjenisdn' => 'required',
            'tahun' => 'required|date_format:Y',
            'nomor' => 'required',
            'judul' => 'required|unique:kerjasama_dns,judul,'.$id,
            'pihak' => 'required',
            'summary' => 'required',
            'tanggal' => 'required|date_range:d/m/Y',
            'id_katopd' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,bmp,gif,svg'.$gambar
        ];
    }
}
