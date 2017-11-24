<?php

namespace App\Http\Requests\Lppd;

use Illuminate\Foundation\Http\FormRequest;

class GaleriLppdRequest extends FormRequest
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
            'judul' => 'required|unique:galeri_lppds,judul,'.$id,
            'tags.*' => 'required',
            'gambar' => 'image|mimes:jpeg,png,bmp,gif,svg'.$gambar,
            'gambars.*' => 'image|mimes:jpeg,png,bmp,gif,svg'.$gambar
        ];
    }
}
