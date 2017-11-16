<?php

namespace App\Http\Requests\Profil;

use Illuminate\Foundation\Http\FormRequest;

class VisiMisiRequest extends FormRequest
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
        } else {
            $id = 0;
        }

        return [
            'judul' => 'required|unique:selayangs,judul,'.$id,
            'isi' => 'required'
        ];
    }
}
