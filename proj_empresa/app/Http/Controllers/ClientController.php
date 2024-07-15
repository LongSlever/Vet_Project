<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();


        if(isset($clients)) {
            return view('client.index', compact('clients'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->cell_phone = $request->input('cellphone');
        $client->address = $request->input('address');
        $client->city = $request->input('city');
        $client->uf = $request->input('uf');

        $client->save();

        return redirect('/client');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::find($id);
        if(isset($client)) {
            return view('client.edit', compact('client'));
        }else {
            return redirect('/client');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client= Client::find($id);

        if(isset($client)) {
            $client->name = $request->input('name');
            $client->email = $request->input('email');
            $client->cell_phone = $request->input('cellphone');
            $client->address = $request->input('address');
            $client->city = $request->input('city');
            $client->uf = $request->input('uf');

            $client->save();
            
            return redirect ('/client');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);

        if(isset($client)) {
            $client->delete();

            return redirect('/client');
        }
    }
}