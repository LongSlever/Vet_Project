<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $procedures = Procedure::all();

        if(isset($procedures)) {
            return view ('procedure.index', compact ('procedures'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('procedure.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $procedure = new Procedure();

        $procedure->name = $request->input('name');
        $procedure->price = $request->input('price');

        $procedure->save();

        return redirect('/procedure');
    }

    /**
     * Display the specified resource.
     */
    public function show(Procedure $procedure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $procedure = Procedure::find($id);

        if(isset($procedure)) {
            return view('procedure.edit', compact('procedure'));
        }

        return redirect('/procedure');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $procedure = Procedure::find($id);

        if(isset($procedure)) {
            $procedure->name = $request->input('name');
            $procedure->price = $request->input('price');

            $procedure->save();
        }

        return redirect('/procedure');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $procedure = Procedure::find($id);
        if(isset($procedure)) {
            $procedure->delete();

        }
        return redirect('/procedure');


    }
}
