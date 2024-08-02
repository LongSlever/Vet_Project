<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\Request;

class VetController extends Controller
{
    public function __construct() {
        $this->middleware("user-access");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vets = Vet::all();

        if(isset($vets)) {
            return view('vet.index', compact('vets'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vet.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vet = new Vet();
        $vet->name = $request->input('name');
        $vet->email = $request->input('email');
        $vet->cellphone = $request->input('cellphone');
        $vet->address = $request->input('address');
        $vet->city = $request->input('city');
        $vet->uf = $request->input('uf');

        $vet->save();

        return redirect('/vet');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vet $vet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vet $vet, int $id)
    {
        $vet = Vet::find($id);
        if(isset($vet)) {
            return view('vet.edit', compact('vet'));
        }else {
            return redirect('/vet');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $vet= Vet::find($id);

        if(isset($vet)) {
            $vet->name = $request->input('name');
            $vet->email = $request->input('email');
            $vet->cellphone = $request->input('cellphone');
            $vet->address = $request->input('address');
            $vet->city = $request->input('city');
            $vet->uf = $request->input('uf');

            $vet->save();

            return redirect ('/vet');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vet $vet, int $id)
    {
        $vet = Vet::find($id);

        if(isset($vet)) {
            $vet->delete();

            return redirect('/vet');
        }
    }
}
