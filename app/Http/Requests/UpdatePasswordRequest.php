<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdatePasswordRequest extends Request
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
        if($this->method() == 'PATCH')
        {
            return [
                'password' => 'required|min:6|confirmed',
            ];
        }
    }
    
    public function messages(){

        return [
            'password.required'=>'Sila isi kata laluan',
            'password.confirmed' => 'Kata laluan tidak sama',
            'password.min' => 'Kata laluan mesti lebih 6 karakter',
        ];
    }
}
