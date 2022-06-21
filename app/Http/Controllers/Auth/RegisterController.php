<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class RegisterController extends Controller
{
   
public function create()
{
    if (Auth::check()) {
        return redirect()->route('index');
    }
    return view('auth.register');
}

public function store(Request $request)
{
    $request->validate([
        'imie' => ['required', 'string', 'max:255'],
           'nazwisko' => ['required', 'string', 'max:255'],
            'nazwa_uzytkownika' => ['required', 'string',  'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed','max:10'],
    ]);

    $user = User::create([
        'imie' => $request->imie,
        'nazwisko' => $request->nazwisko,
        'nazwa_uzytkownika' => $request->nazwa_uzytkownika,
        'email' => $request->email,
        'role' => '2',
        'password' => Hash::make($request->password),
       
    ]);
   Alert::success("Pomyślnie zarejestrowano","witaj na naszej stronie !");

    Auth::login($user);

    return redirect()->route('index');
}




}