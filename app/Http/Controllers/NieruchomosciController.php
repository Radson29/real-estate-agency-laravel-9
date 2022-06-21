<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Nieruchomosci,Agenci
};


class NieruchomosciController extends Controller
{

    public function index()
    {
        $Anieruchomosci = Nieruchomosci::orderBy('id', 'DESC')->get();
        $publiczne_nieruchomosci = $Anieruchomosci->where('Czy_opublikowany', '1');
        $niepublikowane_nieruchomosci = $Anieruchomosci->where('Czy_opublikowany', '0');
        return view('admin.layouts.nieruchomosci.nieruchomosci', compact('publiczne_nieruchomosci','niepublikowane_nieruchomosci'));
    }


    public function create()
    {
        $agenci = Agenci::all();
        return view('admin.layouts.nieruchomosci.dodaj-nieruchomosc', compact('agenci'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'tytuł' => 'required',
            'opis' => 'required',
            'cena' => ['required','numeric'],
            'powierzchnia' => ['required','numeric'],
            'garaże' => ['required','numeric'],
            'sypialnie' => ['required','numeric'],
            'łazienki' => ['required','numeric'],
            'Miasto' => 'required',
            'Kraj' => 'required',
            'id_agenta' => 'required',
            'Czy_opublikowany' => ['required','numeric'],
            'zdjecie_opcjonalne0' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $nieruchomosc = new Nieruchomosci([
            'tytuł' => $request->get('tytuł'),
            'opis' => $request->get('opis'),
            'cena' => $request->get('cena'),
            'powierzchnia' => $request->get('powierzchnia'),
            'sypialnie' => $request->get('sypialnie'),
            'łazienki' => $request->get('łazienki'),
            'garaże' => $request->get('garaże'),
            'Miasto' => $request->get('Miasto'),
            'Kraj' => $request->get('Kraj'),
            'id_agenta' => $request->get('id_agenta'),
            'Czy_opublikowany' => $request->get('Czy_opublikowany'),
        ]);


        //call custom file upload function
        $isSuccess = $this->massimageUploadHandler($request, $nieruchomosc);

        if ($isSuccess) {

            $nieruchomosc->save();
            return redirect(route('Anieruchomosci.index'))->with('success', 'Nieruchomość dodana!');
        } else {
            return redirect()->back()->with('error', 'Coś poszło nie tak!');
        }
    }


    public function show($id)
    {
        $nieruchomosc = Nieruchomosci::findOrFail($id);
        return view('admin.layouts.nieruchomosci.info-nieruchomosc', compact('nieruchomosc'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'zdjecie_opcjonalne' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $nieruchomosc = Nieruchomosci::findOrFail($id);


        $nieruchomosc->tytuł = $request->get('tytuł');
        $nieruchomosc->opis = $request->get('opis');
        $nieruchomosc->cena= $request->get('cena');
        $nieruchomosc->powierzchnia = $request->get('powierzchnia');
        $nieruchomosc->garaże = $request->get('garaże');
        $nieruchomosc->sypialnie = $request->get('sypialnie');
        $nieruchomosc->łazienki= $request->get('łazienki');
        $nieruchomosc->Miasto = $request->get('Miasto');
        $nieruchomosc->Kraj = $request->get('Kraj');
        $nieruchomosc->id_agenta = $request->get('id_agenta');
        $nieruchomosc->czy_opublikowany = $request->get('Czy_opublikowany');


       
        $this->massimageUploadHandler($request, $nieruchomosc);
        $nieruchomosc->save();
        return redirect(route('Anieruchomosci.index'))->with('success', 'Nieruchomość zaktualizowana pomyślnie!');
    }


    public function destroy($id)
    {
        $nieruchomosc = Nieruchomosci::findOrFail($id);

        $isSuccess = $nieruchomosc->delete();

        if ($isSuccess) {
            $this->imageDeleteHandler($nieruchomosc);
        }
        return redirect(route('Anieruchomosci.index'))->with('success', 'Nieruchomość usunięta pomyślnie!');
    }


   
    private function massimageUploadHandler($request, $nieruchomosc)
    {
        $isSuccess = FALSE;
        $images = array(
            $request->zdjecie_opcjonalne0,
            $request->zdjecie_opcjonalne1,
            $request->zdjecie_opcjonalne2,
            $request->zdjecie_opcjonalne3,
        );

        foreach ($images as $key => $image) {


            if (file_exists($image)) {

                $isSuccess = $this->imageUploadHandler($image, $nieruchomosc, $key);
            }
        }
        return $isSuccess;
    }

   

    private function imageUploadHandler($image, $nieruchomosc, $key)
    {
        $image_new_name = time() . '.' . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension();
        $isScucess = $image->move(public_path('images/nieruchomosci'), $image_new_name);
        if ($isScucess) {
            $image_url = 'images/nieruchomosci/' . $image_new_name;
            $table_name = 'zdjecie_opcjonalne' . $key;
            if (file_exists($nieruchomosc->$table_name)) {
                unlink($nieruchomosc->$table_name);
            }
            $nieruchomosc->$table_name = $image_url;
            return TRUE;
            return FALSE;
        }
    }

   
    private function imageDeleteHandler($nieruchomosc)
    {
        $images = array(
            $nieruchomosc->zdjecie_opcjonalne0,
            $nieruchomosc->zdjecie_opcjonalne1,
            $nieruchomosc->zdjecie_opcjonalne2,
            $nieruchomosc->zdjecie_opcjonalne3,
         
         
        );
        foreach ($images as $image) {
            if (file_exists($image)) {
                unlink($image);
            }
        }
    }
}
