<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function login () {
        // dd(bcrypt('minhman'));
        if(auth()->check()){
            return redirect()->route('backend.dashboard');
        }
        return view('backend.login');
       
    }
    public function PostLogin ( Request $request ) {
        $remember = $request->has('remember_me') ? true : false;
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)){
            $result = DB::table('users')->where('email' , $request->email)->first();
            Session::put('name' , $result->name);
            Session::put('id' , $result->id);
            return redirect()->route('backend.dashboard');
        }else{
            return redirect()->route('admin.login')->with('message' , 'Nhập sai mật khẩu hoặc tài khoản');
        }
    }
    public function logout () {
        Session::put('name' , null);
        Session::put('id' , null);
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
