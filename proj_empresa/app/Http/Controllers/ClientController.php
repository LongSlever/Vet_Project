<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Consultation;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ClientController extends Controller
{
    public function __construct() {
        $this->middleware("user-access");
    }

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
        $client->password = Hash::make($request->input('password'));
        $client->email = $request->input('email');
        $client->cell_phone = $request->input('cellphone');
        $client->address = $request->input('address');
        $client->city = $request->input('city');
        $client->uf = $request->input('uf');
        if(!$request->file('photo')) {
            $client->photo = "";
        }else {
            $client->photo = $request->file('photo')->store('photos/clients');
        }

        $client->save();

        return redirect('/client');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $client = Client::find($id);
        echo('Hi'. $id);
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
        $no_photo = $request->input('no_photo');
        if(isset($client)) {
            if ($no_photo) {
                $client->photo = "";
            } elseif ($request->hasFile('photo')) {
                $client->photo = $request->file('photo')->store('photos/clients');
            }
            $client->name = $request->input('name');
            $client->email = $request->input('email');
            $client->cell_phone = $request->input('cellphone');
            $client->address = $request->input('address');
            $client->city = $request->input('city');
            $client->uf = $request->input('uf');

            $client->save();

            return redirect ('/client/profile');
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

    public function profile() {
        $petsAll = Pet::all();
        $pets = array();
        $consultationsAll = Consultation::all();
        $consultations = array();
        foreach ($petsAll as $pet) {
            if ($pet->client_id === Auth::guard('clients')->user()->id) {
                $pets[] = $pet;
                foreach ($consultationsAll as $consultation) {
                if ($pet->id == $consultation->pet_id) {
                    $consultations[] = $consultation;
                }
            }
        }
    }
        return view('client.profile', compact('pets', 'consultations'));
    }
}
