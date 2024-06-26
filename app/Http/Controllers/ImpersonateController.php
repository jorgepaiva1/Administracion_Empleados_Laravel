<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
    public function index(){
        if(Auth::user()->is_employeer == 0) {
            $usuarios = User::all();
            return view('usuarios.index', ['usuarios' => $usuarios]);
        }
            return redirect('/');
    }




    public function index2(){ //nombres

        if(Auth::user()->is_employeer ==1) {
            $datos = User::all();
            return view('users.index',  ['datos' =>$datos]);
        }
        return redirect('/');
    }

    public function start(Request $request){

        $id = $request->input('user');

        if(session()->get('impersonated_by') == null){
            session()->put('original_impersonated_by', auth()->id());
        }
        session()->put('impersonated_by', auth()->id());

        Auth::loginUsingId($id); //loginUsingId(login($request));
        session()->put('is_impersonated',true);
        return redirect('/');
    }

    public function stop(User $user){

        if (session()->get('is_impersonated')){
            session()->pull('is_impersonated');
        }

        Auth::loginUsingId(session()->pull('original_impersonated_by'));
        session()->pull('impersonated_by');
        return redirect('/');
    }

    public function selectUser(Request $request){
        $userId = $request->input('user');
        if(!$userId){
            return redirect()->back();
        }
        session()->put('original_impersonated_by', auth()->id());
        Auth::loginUsingId($userId);
        session()->put('is_impersonated',true);
        return redirect('/');
    }

}
