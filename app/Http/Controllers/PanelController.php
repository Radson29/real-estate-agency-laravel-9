<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\{
    Nieruchomosci,
     Agenci,
    Kontakt,
    Agent_miesiaca,
 };

use Illuminate\Support\Facades\Auth;


class PanelController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            $userid = Auth::id();
            $lista = Kontakt::with('nieruchomosci')->where('id_uzytkownika',$userid)->get();

            return view('strona.layouts.panel_uzytkownika',compact('lista'));
        }

    }

    public function destroy(Kontakt $kontakt)
    {
    
         $kontakt->deleteOrFail();
         Alert::success("Pomyślnie usunięto wiadomosc!","");
         return redirect()->back();
        
    }
}
