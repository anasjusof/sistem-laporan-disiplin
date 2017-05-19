<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class KetuaBatallionRequest extends Request
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
        if($this->method() == 'POST')
        {
            return [
                'name'=>'required',
                'staff_id'=>'required|unique:users',
                'email'=>'required|email|max:255|unique:users',
                'fakulti'=>'required',
                'roles_id'=>'required',
                'password' => 'required|min:6|confirmed',
            ];
        }
        
        if($this->method() == 'PATCH')
        {
            return [
                'name'=>'required',
                'email'=>'required|email|max:255|unique:users',
                'fakulti'=>'required',
                'roles_id'=>'required',
            ];
        }
    }

    public function messages(){

        return [
            'name.required'=>'Sila isi nama',
            'staff_id.required'=>'Sila isi id staf',
            'email.required'=>'Sila isi email',
            'fakulti.required'=>'Sila isi fakulti',
            'jawatan.required'=>'Sila pilih jawatan',
            'password.required'=>'Sila isi kata laluan',
            
            'email.unique' => 'Email telah berdaftar',
            'email.email' => 'Sila isi format email yang betul',
            
            'password.confirmed' => 'Kata laluan tidak sama',
            'password.min' => 'Kata laluan mesti lebih 6 karakter',
            
            'staff_id.unique' => 'ID staf telah berdaftar',
        ];
    }
}
