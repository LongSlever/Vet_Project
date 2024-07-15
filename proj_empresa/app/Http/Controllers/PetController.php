<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
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
        return view("pet.new");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pet = new Pet();
        $pet->name = $request->input('name');
        if(!$request->file('photo')) {
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

        return redirect('/pet');
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
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
