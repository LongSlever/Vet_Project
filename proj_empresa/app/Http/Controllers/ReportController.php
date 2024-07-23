<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Consultation;
use App\Models\Pet;
use App\Models\Procedure;
use App\Models\Vet;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("reports.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        switch($request->input('report_type')) {
            case 'clients':
                $clients = Client::all();
                if(isset($clients)) {
                    return view('reports.client-report', compact('clients'));
                }
                break;
            case 'pets':
                $pets = Pet::all();
                if(isset($pets)) {
                    return view('reports.pet-report', compact('pets'));
                }
                break;
            case 'procedures':
                    $procedures = Procedure::all();
                    if(isset($procedures)) {
                        return view('reports.procedure-report', compact('procedures'));
                    }
                    break;
            case 'consultations':
                    $consultations = Consultation::all();
                    if(isset($consultations)) {
                        return view('reports.consultation-report', compact('consultations'));
                    }
                    break;
            case 'vets':
                    $vets = Vet::all();
                    if(isset($vets)) {
                        return view('reports.vet-report', compact('vets'));
                    }
                        break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
