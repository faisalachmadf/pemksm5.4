<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LayananRequest extends FormRequest
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
            $file = '';
        } else {
            $id = 0;
            $file = '|required';
        }

        return [
            'id_katbagian' => 'required',
            'judul' => 'required|unique:layanans,judul,'.$id,
            'isi' => 'required',
            'tanggal' => 'required|date_format:d/m/Y',
            'file' => 'image|mimes:jpeg,png,bmp,gif,svg'.$file
        ];
    }
}
