<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{
   

    public function login()
    {
        if (Auth::check() && Auth::user()->role == 2) {
          
            return redirect()->route('index');

        }else if (Auth::check() && Auth::user()->role == 0){

            return redirect()->route('admin.index');
        }
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','max:8'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success("Pomyślnie zalogowano!","Baw sie dobrze");
           
            if (Auth::check() && Auth::user()->role == 2) {
          
                return redirect()->route('index');
    
            }else if (Auth::check() && Auth::user()->role == 0){
    
                return redirect()->route('admin.index');
            }

        }

        return back()->withErrors([
            'email' => 'Podane dane uwierzytelniające nie są zgodne z naszymi danymi.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::info("Zostales wylogowany!");
        return redirect()->route('index');
        
    }



}
