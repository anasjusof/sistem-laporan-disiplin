<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PensyarahRequest extends Request
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
        if($this->method() == 'POST' || $this->method() == 'PATCH')
        {
            return [
                'semester'=>'required',
                'sesi'=>'required',
                'nama_pelajar'=>'required',
                'no_tentera_kp'=>'required',
                'pengambilan'=>'required',
                'mata_pelajaran_dan_kod'=>'required',
                'nama_bilik_kuliah'=>'required',
                'tarikh_dan_masa'=>'required',
                'nama_pa'=>'required',
            ];
        }
    }

    public function messages(){

        return [
            'semester.required'=>'Sila isi semester',
            'sesi.required'=>'Sila isi sesi',
            'nama_pelajar.required'=>'Sila isi nama pelajar',
            'no_tentera_kp.required'=>'Sila isi no tentera / no KP',
            'pengambilan.required'=>'Sila isi pengambilan',
            'mata_pelajaran_dan_kod.required'=>'Sila isi mata pelajaran dan kod',
            'nama_bilik_kuliah.required'=>'Sila isi nama bilik kuliah/ dewan kuliah',
            'tarikh_dan_masa.required'=>'Sila isi tarikh dan masa',
            'nama_pa.required'=>'Sila isi nama penasihat akademik',
            
        ];
    }
}
