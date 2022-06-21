<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Nieruchomosci,
    Agenci,
    User,
  Kontakt};

class AdminController extends Controller
{
    public function index()
    {

        $nieruchomosci = Nieruchomosci::orderBy('id', 'DESC')->get();
        $op_nieruchomosci = $nieruchomosci->where('Czy_opublikowany', '1')->count();
        $nowe_nieruchomosci = $nieruchomosci->where('Czy_opublikowany', '0')->count();
        $uzytkownicy = User::all();
        $op_uzytkownicy = $uzytkownicy->where('role', '2')->count();
        $op_agenci =Agenci::count();
        $zapytania = Kontakt::orderBy('id', 'DESC')->get();

        return view('admin.layouts.index',compact('op_nieruchomosci','op_uzytkownicy','nieruchomosci',
                    'nowe_nieruchomosci','zapytania','op_agenci'));
    }
}
