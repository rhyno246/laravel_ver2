<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
            return redirect()->route('backend.dashboard');
        }else{
            return redirect()->route('admin.login')->with('message' , 'Nhập sai mật khẩu hoặc tài khoản');
        }
    }
    public function logout () {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
