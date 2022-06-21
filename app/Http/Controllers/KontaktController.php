<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontakt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class KontaktController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'Imie'=>['required','string','max:255'],
            'email'=>['required','string','max:255'],
            'numer_telefonu'=>['required','numeric','max:9'],
            'opis'=>'required|max:255',
            'id_nieruchomosci' => 'required',
            'id_uzytkownika' => 'required',

        ]);

        $kontakt = new Kontakt([
            'Imie' => $request->get('Imie'),
            'email' => $request->get('email'),
            'numer_telefonu' => $request->get('numer_telefonu'),
            'opis' => $request->get('opis'),
            'id_nieruchomosci' => $request->get('id_nieruchomosci'),
            'id_uzytkownika' => $request->get('id_uzytkownika'),

        ]);
      

      
       $isSuccess= $kontakt->save();
      

        if ($isSuccess) {
        
            Alert::success("Pomyślnie wysłano wiadomość!","");
            return redirect('/');
        } else {
            Alert::info("Coś poszło nie tak :(","");
            return redirect()->back();
        }

    }
}
