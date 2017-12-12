<?php

namespace App\Http\Requests\Tkksd;

use Illuminate\Foundation\Http\FormRequest;

class TkksdRequest extends FormRequest
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
            'judul' => 'required|unique:laporans,judul,'.$id,
            'isi' => 'required',
            'tanggal' => 'required|date_format:d/m/Y',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpeg,png,bmp,gif,svg,rar,zip'.$file
        ];
    }
}
