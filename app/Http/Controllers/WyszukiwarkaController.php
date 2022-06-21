<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Nieruchomosci
};

class WyszukiwarkaController extends Controller
{
    public function search(Request $request)
    {
      
        $miasto = $request->get('Miasto');
        $sypialnie = $request->get('sypialnie');
        $cena = $request->get('cena');
        $łazienki=$request->get('łazienki');
        $nieruchomosci = Nieruchomosci::whereBetween('cena',[0,$cena])->
                                orWhere('sypialnie',$sypialnie)->
                                orWhere('miasto',$miasto)->
                                orWhere('łazienki',$łazienki)->
                                paginate(6);


                    if(count($nieruchomosci) > 0){

                        return view('strona.layouts.wyszukaj',compact('nieruchomosci'));

                    }
                    else return view ('strona.layouts.wyszukaj',compact('nieruchomosci'));

    }
}
