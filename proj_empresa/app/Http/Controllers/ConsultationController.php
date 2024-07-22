<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Consultation;
use App\Models\Pet;
use App\Models\Procedure;
use App\Models\Vet;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::all();
        if(isset($consultations)) {
            return view("consultations.index", compact("consultations"));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pets = Pet::all();
        $vets = Vet::all();
        $procedures = Procedure::all();
        if(isset($vets) && isset($pets) && isset($procedures)) {
            return view("consultations.new", compact('pets', 'vets', 'procedures'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pet = Pet::find($request->input('pet_id'));

        $vet = Pet::find($request->input('vet_id'));

        $consultation = new Consultation();

        $consultation->date = date('Y-m-d', strtotime($request->date));

        $consultation->pet()->associate($pet);

        $consultation->vet()->associate($vet);

        $consultation->price = $request->input('price');

        $consultation->save();

        //procedimentos

        $array_procedures = json_decode($request->input('memo_procedures'));

        foreach($array_procedures as $procedure) {
            //associação muitos para muitos
            $consultation->procedures()->attach($procedure->IDPROCEDURE);
        }

        return redirect('/consultation');
    }


    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation, int $id)
    {
        $consultation = Consultation::find($id);

        if(isset($consultation)) {
            return view('consultations.show', compact('consultation'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation, int $id)
    {
        $consultation = Consultation::find($id);

        if(isset($consultation)) {
            $consultation->delete();

        }
        return redirect('/consultation');
    }
}
