<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenci;
use App\Listing;
use Session;

class AgentController extends Controller
{

    public function index()
    {
        $agenci = Agenci::with("Nieruchomosci")->get();
        return view('admin.layouts.agenci.agenci', compact('agenci'));
    }

    public function create()
    {
        return view('admin.layouts.agenci.dodaj_agenta');
    }


    public function store(Request $request)
    {

        $request->validate([
            'imie'=>['required','max:255'],
            'adres'=>['required','max:255'],
            'email'=>['required','max:50'],
            'numer_telefonu'=>['required','numeric'],
            'zdjecie' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $agent = new Agenci([
            'imie' => $request->get('imie'),
            'adres' => $request->get('adres'),
            'email' => $request->get('email'),
            'numer_telefonu' => $request->get('numer_telefonu'),

        ]);

        $isSuccess = $this -> imageUploadHandler($request->zdjecie, $request->imie, $agent);

        if($isSuccess){
            return redirect(route('Aagenci.index'))->with('success', 'Agent dodany!');
        }else{
            return redirect()->back()->with('error', 'Coś poszlo nie tak!');
        }

    }


    public function show($id)
    {
        $agent = Agenci::findOrFail($id);
        return view('admin.layouts.agenci.info_agent', compact('agent'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'imie'=>['required','max:255'],
            'adres'=>['required','max:255'],
            'email'=>['required','max:50'],
            'numer_telefonu'=>['required','numeric']
        ]);

        $agent =Agenci::findOrFail($id);
        $agent -> imie = $request->get('imie');
        $agent -> adres = $request->get('adres');
        $agent -> email = $request->get('email');
        $agent -> numer_telefonu = $request->get('numer_telefonu');

        $successMessage = redirect(route('Aagenci.index'))->with('success', 'Zaktualizowano Agenta!');

        if(!$request->zdjecie){
            $agent->save();
            return $successMessage;
        }
        elseif(file_exists($agent->zdjecie)){  

            unlink($agent->image);
        }
        $isSuccess = $this -> imageUploadHandler($request->zdjecie, $request->imie, $agent);

        if($isSuccess){
            return $successMessage;
        }else{
            return redirect()->back()->with('error', 'Coś poszlo nie tak!');
        }
    }

    public function destroy($id)
    {
        $agent = Agenci::findOrFail($id);

        if(file_exists($agent->zdjecie)){
            unlink($agent->zdjecie);
        }
        $agent -> delete();
        return redirect(route('Aagenci.index'))->with('success', 'Pomyślnie usunięto agenta!');

    }

    private function imageUploadHandler($image,$name, $agent)
    {

        $image_new_name = $name.'.'.time().'.'.$image->getClientOriginalExtension();
        $isScucess = $image->move(public_path('images/agenci_zdjecia'), $image_new_name);

        if($isScucess){
            $image_url = 'images/agenci_zdjecia/'.$image_new_name;
            $agent->zdjecie = $image_url;
            $agent->save();

            return TRUE;
        return FALSE;

        }
    }
}
