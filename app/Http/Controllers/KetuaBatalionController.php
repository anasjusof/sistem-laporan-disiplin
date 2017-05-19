<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\KetuaBatallionRequest;

use App\User;
use Auth;

class KetuaBatalionController extends Controller
{
    public function showPensyarah(){
        $pensyarahs = User::orderBy('id', 'DESC')->paginate(5);
        return view('ketuabatallion.senaraipensyarah', compact('pensyarahs'));
    }
    
    public function createPensyarah(KetuaBatallionRequest $request){
        $input = $request->except('password_confirmation');
        
        $input['password'] = bcrypt($request->password);
        
        User::create($input);

        return redirect()->back();
    }
    
    public function deletePensyarah(Request $request){
        $pensyarahs = User::findOrFail($request->pensyarah_id);

		foreach($pensyarahs as $pensyarah){
    		$pensyarah->delete();
    	}

    	return redirect()->back();
    }
    
    public function updatePensyarah(KetuaBatallionRequest $request){
        $input = $request->all();
        
        $pensyarah = User::find($request->id);
        
        $pensyarah->name = $input['name'];
        $pensyarah->email = $input['email'];
        $pensyarah->fakulti = $input['fakulti'];
        $pensyarah->roles_id = $input['roles_id'];
        
        $pensyarah->save();
        
        return redirect()->back();
    }
    
    public function changePassword(UpdatePasswordRequest $request){
        $user = User::find(Auth::user()->id);
        
        $user->password = bcrypt($request->password);
        
        $user->save();
        
        return redirect()->back();
    }
}
