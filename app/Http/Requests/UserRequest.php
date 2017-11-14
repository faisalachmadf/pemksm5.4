<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $password = 'alpha_num|min:8';

        if ($this->has('id')) {
            $id = $this->input('id');
            $oldPassword = 'required';
            $passwordRequired = '';

            if (empty($this->input('password_lama')) && empty($this->input('password'))) {
                $password = '';
                $oldPassword = '';
            }
        } else {
            $id = 0;
            $oldPassword = '';
            $passwordRequired = '|required';
        }

        return [
            'username' => 'required|unique:users,username,'.$id.'|alpha_dash',
            'email' => 'required|email|unique:users,username,'.$id,
            'password_lama' => $oldPassword,
            'password' => $password.$passwordRequired,
            'konfirmasi_password' => 'same:password'.$passwordRequired,
            'first_name' => 'alpha',
            'last_name' => 'alpha',
            'role' => 'required'
        ];
    }
}
