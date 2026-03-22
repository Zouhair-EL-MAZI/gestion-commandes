<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showRegisterForm(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|min:6'
        ]);

        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('loginform')->with('success', 'Account created successfully. Please login.');

    }

    public function showLoginForm(){
        return view('auth.LoginForm');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password , $user->password)){               // Auth::attempt(['email' => $request->email,'password' => $request->password]) -->  haka kaytcheki o kayconnecti f nafs lwa9t ;
            Auth::login($user);                                  // pour connecter l'utilisateur
            $request->session()->regenerate();                   // hna! bach session id tbadl
            return redirect()->route('commandes.index')->with('success', 'Logged in successfully.');
        }else{
            return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginform')->with('success', 'Logged out successfully.');
    }
}
