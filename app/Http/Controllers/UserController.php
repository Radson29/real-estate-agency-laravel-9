<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{

    public function index()
    {
        $users = User::latest()->get();
        $users2= $users->where('role', '2');
        return view('admin.layouts.users.users', compact('users','users2'));
    }


    public function show($id)
    {
        $user = User::findOrfail($id);
        return view('admin.layouts.users.profile', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'imie' => ['required', 'string', 'max:255'],
            'nazwisko' => ['required', 'string', 'max:255'],
            'nazwa_uzytkownika' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = User::findOrFail($id);
        $user -> imie = $request->get('imie');
        $user -> nazwisko = $request->get('nazwisko');
        $user -> nazwa_uzytkownika = $request->get('nazwa_uzytkownika');
        $user -> email = $request->get('email');

       $user->save();

        return redirect(route('users.index'))->with('success', 'Uzytkownik zaktualizowany pomyślnie!');

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $isSuccess = $user->delete();
    }
    
}
