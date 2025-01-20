<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
;

class AuthenticatedSessionController extends Controller
{
    
    function tampilRegistrasi(){
        return view('registrasi');
    }

    function submitRegistrasi(Request $request){
        $user = new user();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password = bcrypt($request->name);
        $user->save();
       // dd($user);

        return redirect()->route('login.tampil');

    }

    function tampillogin(){
        return view('login');
    }

    function submitlogin(Request $request){
        $data = $request->only('email', 'password');
    
    if (Auth::attempt($data)) {
        $request->session()->regenerate();
        return redirect()->route('reservasi.form'); // Mengarahkan ke halaman reservasi.form
    } else {
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }
}  
} 