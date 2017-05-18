<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'pensyarah_id', 'semester', 'sesi', 'nama_pelajar', 'no_tentera_kp', 'pengambilan', 'mata_pelajaran_dan_kod', 'nama_bilik_kuliah', 'tarikh_dan_masa', 
        'nama_pa', 'salah_laku_1', 'salah_laku_2', 'salah_laku_3', 'salah_laku_4', 'salah_laku_5', 'salah_laku_6', 'salah_laku_7', 'lain_lain',
    ];
}
