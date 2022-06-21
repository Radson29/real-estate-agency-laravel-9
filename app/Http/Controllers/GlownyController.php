<?php

namespace App\Http\Controllers;

use App\Models\{
    Nieruchomosci,
     Agenci,
    Kontakt,
    Agent_miesiaca,
 };

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class GlownyController extends Controller
{
    public function index()
    {
//3 najnowsze na glownej
        $najnowsze = Nieruchomosci::orderBy('id', 'DESC')->where('Czy_opublikowany','1')->limit('3')->get();
        $agenci= Agenci::all();
        $s = Agent_miesiaca::with('agenci')->first();
        return view('strona.layouts.index', compact('s','agenci','najnowsze'));
    }

    public function oferty()
    {
// wszystkie oferty
        $oferty = Nieruchomosci::orderBy('id', 'DESC')->where('Czy_opublikowany','1')->paginate(6);
        return view('strona.layouts.oferty', compact('oferty'));
    }

    public function nieruchomosc($id)
    {
   //informacje o danej nieruchomosci
        $nieruchomosc = Nieruchomosci::with('agenci')->where('Czy_opublikowany','1')->findOrFail($id);
        return view('strona.layouts.informacje', compact('nieruchomosc'));
    }



  


}
