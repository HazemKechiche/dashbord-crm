<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Activity;
use App\Models\Proposal;
use App\Models\CommunicationTemplate;
use App\Models\Affaire;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $clients = Client::where('idSecteur', $id)->get();
        return view('clients.index', compact('clients','id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        return view('clients.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,string $id)
    {
        {
            // Valider les données saisies par l'utilisateur
            $request->validate([
                'nom' => 'required|string|max:255',
                'gestionnaire' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'telephone' => 'required|string|max:20',
                'fournisseur' => 'required|string|max:255',
                'departement' => 'required|string|max:255',
                'telecopie' => 'required|string|max:20',
                'adresse' => 'required|string',
                'code_postal' => 'required|string|max:20',
                'description' => 'required|string',
            ]);
        
            // Créer un nouveau service avec les attributs fournis par l'utilisateur
            $service = new Client();
            $service->GestionnaireDuContact = $request->input('gestionnaire');
            $service->nom = $request->input('nom');
            $service->prenom = $request->input('prenom');
            $service->{'e-mail'} = $request->input('email');
            $service->telephone = $request->input('telephone');
            $service->NomDuFournisseur = $request->input('fournisseur');
            $service->Département = $request->input('departement');
            $service->telecopie = $request->input('telecopie');
            $service->adresse = $request->input('adresse');
            $service->CodePostal = $request->input('code_postal');
            $service->description = $request->input('description');
            $service->idSecteur = $id;
            $service->save();
        
            // Rediriger vers la page d'index des services avec un message de succès
            return redirect()->route('clients.index', ['id' => $id])->with('success', 'Le service a été créé avec succès !');
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activity = Activity::where('client_id',$id)->get();
        $proposals = Proposal::where('client_id',$id)->get();
        $coms = CommunicationTemplate::where('client_id',$id)->get();
        $affaires = Affaire::where('client_id',$id)->get();
        $client = Client::findOrFail($id); // Assuming your client model is "Client"
        return view('clients.show', compact('client','activity','proposals','coms','affaires'));
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
    public function destroy(string $id,string $idd)
    {
        $service = Client::find($id); 
        $service->delete();
        return redirect()->route('clients.index', ['id' => $idd])->with('success', 'Client supprimé avec succes !');
    }
}
