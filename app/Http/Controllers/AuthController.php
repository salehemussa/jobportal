<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller{
    public function showRegister() {
        return view('auth.register');
    }

    
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required|in:admin,user',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::login($user);
          $user = Auth::user();
            if($user->role === 'admin'){
              return redirect()->route('admin.vacances.index');
              session()->flash('success','login successfully');
            }elseif($user->role === 'user'){
              return redirect()->route('user.vacances.index');
              session()->flash('success','login successfully');
            }
    }


    public function showLogin() {
        return view('auth.login');
    }


    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if($user->role === 'admin'){
            session()->flash('success','login successfully');
            return redirect()->route('admin.vacances.index');
            }elseif($user->role === 'user'){
            session()->flash('success','login successfully');
            return redirect()->route('user.vacances.index');
            }
            Auth::logout();
            return back()->with('error','invalid role');
        }
        return back()->with('error','invalid credentils');
    }
    

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

