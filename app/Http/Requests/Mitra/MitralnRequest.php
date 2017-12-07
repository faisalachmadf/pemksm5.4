<?php

namespace App\Http\Requests\Mitra;

use Illuminate\Foundation\Http\FormRequest;

class MitralnRequest extends FormRequest
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
            'id_katmitraln' => 'required',
            'judul' => 'required|unique:beritas,judul,'.$id,
            'isi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,bmp,gif,svg'.$gambar
        ];
    }
}
