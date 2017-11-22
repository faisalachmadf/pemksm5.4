<?php

namespace App\Http\Requests\Kelembagaan;

use Illuminate\Foundation\Http\FormRequest;

class KelembagaanRequest extends FormRequest
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
            'judul' => 'required|unique:kelembagaans,judul,'.$id,
            'tanggal' => 'required|date_format:d/m/Y',
            'isi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,bmp,gif,svg'.$gambar
        ];
    }
}
