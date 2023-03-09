<?php

namespace App\Http\Controllers\Backend;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function showLogin(){
        return view('backend.auth.login');
    }

    public function postLogin(Request $request){
            $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($request->only('email','password'))){
            return redirect(route('items.index'));   
        }else{
            return redirect()->back();
        }
    }

        public function logout(){
        Auth::logout();

        return redirect(url('/admin/login'));
    }
}