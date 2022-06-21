<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenci;
use App\Models\Agent_miesiaca;

class Agent_miesController extends Controller
{
   
    public function index()
    {
        $agent= Agent_miesiaca::with('Agenci')->first();
        $agenci = Agenci::all();
        return view('admin.layouts.agent-miesiaca.agent', compact('agent','agenci'));


    }

    public function store(Request $request)
    {
        $request->validate([
            'id_agenta'=>'required'

        ]);

        $agent = new Agent_miesiaca([
            'id_agenta' => $request->get('id_agenta'),

        ]);

        $isSuccess = $agent->save();

        if($isSuccess){
            return redirect(route('Amiesiac.index'))->with('success', 'Agent miesiąca ustawiony !');
        }else{
            return redirect()->back()->with('error', 'Cos poszlo nie tak!');

        }
    }


    public function show($id)
    {
        $agent = Agent_miesiaca::findOrFail($id);
        $agenci = Agenci::all();
        return view('admin.layouts.agent-miesiaca.change-agent', compact('agent','agenci'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'id_agenta'=>'required'

        ]);

        $agent = Agent_miesiaca::findOrFail($id);
        $agent ->id_agenta = $request->get('id_agenta');

        $isSuccess = $agent->save();

        if($isSuccess){
            return redirect(route('Amiesiac.index'))->with('success', 'Agent miesiąca ustawiony!');
        }else{
            return redirect()->back()->with('error', 'Coś poszlo nie tak!');

        }
    }


}
