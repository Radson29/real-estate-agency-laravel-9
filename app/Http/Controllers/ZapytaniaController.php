<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontakt;

class ZapytaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $zapytania = Kontakt::orderBy('id', 'DESC')->paginate(1);
        return view('admin.layouts.zapytania.zapytania', compact('zapytania'));
    }


    public function show($id)
    {
        $zapytanie = Kontakt::findOrFail($id);
        return view('admin.layouts.zapytania.info-zapytania', compact('zapytanie'));
    }

}
