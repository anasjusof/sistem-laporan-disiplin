<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Laporan;

use Auth;

class PensyarahController extends Controller
{
    public function showSenaraiLaporan(){
        $senarai_laporan = Laporan::where('pensyarah_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(5);
        return view('pensyarah.senarailaporan', compact('senarai_laporan'));
    }
    
    public function showLaporan(){
        return view('pensyarah.laporan');
    }
    
    public function createLaporan(Request $request){
        $input = $request->all();

        Laporan::create($input);

        return redirect('/pensyarah-senarailaporan');
    }
    
    public function deleteLaporan(){
        
    }
}
