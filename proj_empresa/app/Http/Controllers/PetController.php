<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function __construct() {
        $this->middleware("user-access");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::all();
        if(isset($pets)) {
            return view("pet.index", compact("pets"));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();

        if(isset($clients)) {
            return view("pet.new", compact('clients'));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = Client::find($request->input('client_id'));

        if(isset($client)) {

        $pet = new Pet();
        $pet->name = $request->input('name');
        if(!$request->file('photo')) {
            $pet->photo = "";
        }else {
            $pet->photo = $request->file('photo')->store('photos');
        }
        $pet->client()->associate($client);
        $pet->name = $request->input('name');
        $pet->breed = $request->input('breed');
        $pet->specie = $request->input('specie');
        $pet->color = $request->input('color');
        $pet->age = $request->input('age');
        $pet->birth_date = date('Y-m-d', strtotime($request->input('birth_date')));
        $pet->weight = $request->input('weight');
        $pet->descript = $request->input('descript');
        $pet->gender = $request->input('gender');

        $pet->save();

        return redirect('/client/profile');

        }



    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $pet = Pet::find($id);

        $clients = Client::all();
        if(isset($pet)) {
            return view('pet.edit', compact('pet', 'clients'));
        }else {
            return redirect('/pet');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $no_photo = $request->input('no_photo');
        // Achando o ID do pet
        $pet= Pet::find($id);
        // Achando o ID do cliente pel input client_id
        $client = Client::find($request->input('client_id'));
        //fazendo a associação
        $pet->client()->associate($client);
        //passando os dados para a instância
        $pet->name = $request->input('name');
        if(isset($no_photo)) {
            $pet->photo = "";
        }else {
            $pet->photo = $request->file('photo')->store('photos');
        }
        $pet->name = $request->input('name');
        $pet->breed = $request->input('breed');
        $pet->specie = $request->input('specie');
        $pet->color = $request->input('color');
        $pet->age = $request->input('age');
        $pet->birth_date = date('Y-m-d', strtotime($request->input('birth_date')));
        $pet->weight = $request->input('weight');
        $pet->descript = $request->input('descript');
        $pet->gender = $request->input('gender');

        $pet->save();

        return redirect ('/pet');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $pet = Pet::find($id);
        if(isset($pet)) {
            $pet->delete();

            return redirect('/pet');
        }
    }
}

