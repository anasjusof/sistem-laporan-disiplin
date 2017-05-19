<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PensyarahRequest;

use App\Http\Requests;
use App\Laporan;

use Auth;

class PensyarahController extends Controller
{
    public function showSenaraiLaporan(){
        if(Auth::user()->roles_id == 0){
            $senarai_laporan = Laporan::where('pensyarah_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(5);
        }
        if(Auth::user()->roles_id == 1){
            $senarai_laporan = Laporan::orderBy('id', 'DESC')->paginate(5);
        }
        
        return view('pensyarah.senarailaporan', compact('senarai_laporan'));
    }
    
    public function showLaporan(){
        return view('pensyarah.laporan');
    }
    
    public function createLaporan(PensyarahRequest $request){
        $input = $request->all();

        Laporan::create($input);

        return redirect('/pensyarah-senarailaporan');
    }
    
    public function deleteLaporan(Request $request){
        $laporans = Laporan::findOrFail($request->laporan_id);

	foreach($laporans as $laporan){
    		$laporan->delete();
    	}

    	return redirect()->back();
    }
    
    public function editLaporan(PensyarahRequest $request){
        $input = $request->all();
        
        $laporan = Laporan::findOrFail($input['laporan_id']);
        
        if(empty($input['salah_laku_1'])){ $input['salah_laku_1'] = ''; }
        if(empty($input['salah_laku_2'])){ $input['salah_laku_2'] = ''; }
        if(empty($input['salah_laku_3'])){ $input['salah_laku_3'] = ''; }
        if(empty($input['salah_laku_4'])){ $input['salah_laku_4'] = ''; }
        if(empty($input['salah_laku_5'])){ $input['salah_laku_5'] = ''; }
        if(empty($input['salah_laku_6'])){ $input['salah_laku_6'] = ''; }
        if(empty($input['salah_laku_7'])){ $input['salah_laku_7'] = ''; $input['lain_lain'] = ''; }
        
        $laporan->semester = $input['semester'];
        $laporan->sesi = $input['sesi'];
        $laporan->nama_pelajar = $input['nama_pelajar'];
        $laporan->no_tentera_kp = $input['no_tentera_kp'];
        $laporan->pengambilan = $input['pengambilan'];
        $laporan->mata_pelajaran_dan_kod = $input['mata_pelajaran_dan_kod'];
        $laporan->nama_bilik_kuliah = $input['nama_bilik_kuliah'];
        $laporan->tarikh_dan_masa = $input['tarikh_dan_masa'];
        $laporan->nama_pa = $input['nama_pa'];
        $laporan->lain_lain = $input['lain_lain'];
        $laporan->salah_laku_1 = $input['salah_laku_1'];
        $laporan->salah_laku_2 = $input['salah_laku_2'];
        $laporan->salah_laku_3 = $input['salah_laku_3'];
        $laporan->salah_laku_4 = $input['salah_laku_4'];
        $laporan->salah_laku_5 = $input['salah_laku_5'];
        $laporan->salah_laku_6 = $input['salah_laku_6'];
        $laporan->salah_laku_7 = $input['salah_laku_7'];
        
        $laporan->save();
        return redirect()->back();
    }
    
    public function showSpecificLaporan($laporan_id){
        $laporan = Laporan::find($laporan_id);
        
        return view('pensyarah.specificlaporan', compact('laporan'));
    }
}
