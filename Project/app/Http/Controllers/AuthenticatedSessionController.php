<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    # LOGIN

    public function form(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'login' => 'required|string|max:30',
            'mdp' => 'required|string|max:60',
        ]);

        $credentials = ['login' => $request->input('login'), 'password' => $request->input('mdp')];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->flash('success','Login successful');

            if(Auth::user()->IsAdmin()){
                return redirect()->intended('/adminHome');
            }
            if(Auth::user()->IsEnseignant()){
                return redirect()->intended('/enseignantHome');
            }
            if(Auth::user()->IsGestionnaire()){
                return redirect()->intended('/gestionnaireHome');
            }
            return redirect()->intended('/error');
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }

    # LOGOUT

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success','Logout successful');
    }
}
