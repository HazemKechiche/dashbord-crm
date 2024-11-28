<?php

namespace App\Http\Controllers;


use App\Models\Affaire;
use App\Models\Client;
use Illuminate\Http\Request;

class AffaireController extends Controller
{
    /**
     * Display a listing of the affaires.
     */
    public function index()
    {
        $affaires = Affaire::all();
        $clients = Client::all(); // Fetch the list of all clients
    
        return view('affaires.affaires', compact('affaires', 'clients'));
    }

    /**
     * Show the form for creating a new affaire.
     */
    public function create($id)
    {
        $clients = Client::find($id); // Fetch the list of all clients
        return view('affaires.create', compact( 'clients'));

    }

    /**
     * Store a newly created affaire in the database.
     */
    public function store(Request $request,$id)
    {
        $validatedData = $request->validate([
            'GestionnaireAffaire' => 'required',
            'NomAffaire' => 'required',
            'NomClient' => 'required',
            'Type' => 'required',
            'OrigineProspect' => 'required',
            'Montant' => 'required|numeric',
            'DateEcheance' => 'required|date',
            'Etape' => 'required',
            'ChiffreAffaires' => 'required|numeric',
            'DescriptionAttendue' => 'nullable',
        ]);
        $validatedData['client_id'] = $id;

        Affaire::create($validatedData);

        return redirect()->route('affaires.affaires')->with('success', 'Affaire created successfully!');
    }

    /**
     * Display the specified affaire.
     */
    public function show($id)
    {
        $affaire = Affaire::findOrFail($id);
        return view('affaires.show', ['affaire' => $affaire]);
    }

    /**
     * Show the form for editing the specified affaire.
     */
    public function edit($id)
    {
        $affaire = Affaire::findOrFail($id);
        return view('affaires.edit', ['affaire' => $affaire]);
    }

    /**
     * Update the specified affaire in the database.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'GestionnaireAffaire' => 'required',
            'NomAffaire' => 'required',
            'NomClient' => 'required',
            'Type' => 'required',
            'OrigineProspect' => 'required',
            'Montant' => 'required|numeric',
            'DateEcheance' => 'required|date',
            'Etape' => 'required',
            'ChiffreAffaires' => 'required|numeric',
            'DescriptionAttendue' => 'nullable',
        ]);

        $affaire = Affaire::findOrFail($id);
        $affaire->update($validatedData);

        return redirect()->route('affaires.affaires')->with('success', 'Affaire updated successfully!');
    }

    /**
     * Remove the specified affaire from the database.
     */
    public function destroy($id)
    {
        $affaire = Affaire::findOrFail($id);
        $affaire->delete();

        return redirect()->route('affaires.affaires')->with('success', 'Affaire deleted successfully!');
    }
}
