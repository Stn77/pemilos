<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    
    function Login(Request $request){
        $credentials = $request->validate([
            'nisn' => ['required'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            
            // Cek apakah user sudah login di device lain
            if ($user->device_token && $user->device_token !== session()->getId()) {
                // Force logout dari device sebelumnya
                Session::getHandler()->destroy($user->device_token);
            }
            
            // Update device token dan waktu login terakhir
            $user->update([
                'device_token' => session()->getId(),
                'last_login_at' => now(),
            ]);

            $request->session()->regenerate();
            if(Auth::user()->role === 'admin'){
                return redirect()->route('admin.dasboard');
            } else {
                if(Auth::user()->vote_status === 'sudah'){
                    return redirect()->route('voteTrue');
                }
                return redirect()->route('votePage');
            }
        }
    
        return back()->with('username', 'Invalid credentials.');
    }

    function logout(){
        $user = Auth::user();
        $user->update([
            'device_token' => null,
            'last_logout_at' => now(),
        ]);
        Auth::logout();
        return redirect()->route('loginPage');
    }
}
