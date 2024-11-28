<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProsposalController extends Controller
{
     public function create($client_id)
    {
        // Get the client by its ID to pass it to the view
        $client = Client::findOrFail($client_id);

        // Pass the $client_id and $client to the view
        return view('proposals.create', compact('client_id', 'client'));
    }

    public function store(Request $request, $client_id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'presentation_file_content' => 'file|mimes:pdf,ppt,pptx|max:2048',
        ]);

        $proposal = new Proposal([
            'client_id' => $client_id,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('presentation_file')) {
            $file = $request->file('presentation_file');
            
            $fileName = $file->getClientOriginalName(); // Vous pouvez choisir un nom unique si vous le souhaitez
            // Utilisation du dossier public
            $file->storeAs('public/pdf', $fileName);
            $proposal['presentation_file_content'] = $fileName;
    
            // Enregistrement du nom du fichier dans la base de données
            
        }

        $proposal->save();

        return redirect()->route('proposals.index',['client_id'=>$client_id])->with('success', 'Proposition créée avec succès.');
    }

    public function index($client_id)
    {
        // Fetch all proposals associated with the specified client_id
        $proposals = Proposal::where('client_id', $client_id)->get();
        $client_id = Client::findOrFail($client_id);
    
        // Pass the proposals data to the view for displaying
        return view('proposals.index', compact('proposals','client_id'));
    }
    
    public function edit($client_id, $proposal_id)
    {
        // Retrieve the proposal you want to edit for the specific client
        $proposal = Proposal::where('client_id', $client_id)->findOrFail($proposal_id);

        // Your code to display the proposal edit form, passing the $proposal to the view
        // For example, you can use the $proposal to pre-fill the form fields.
    }

    public function update(Request $request, $client_id, $proposal_id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'presentation_file' => 'file|mimes:pdf,ppt,pptx|max:2048',
        ]);

        $proposal = Proposal::where('client_id', $client_id)->findOrFail($proposal_id);

        $proposal->title = $request->input('title');
        $proposal->description = $request->input('description');

        if ($request->hasFile('presentation_file')) {
            // Delete the old presentation file, if it exists
            if ($proposal->presentation_file) {
                Storage::disk('public')->delete($proposal->presentation_file);
            }

            // Upload the new presentation file
            $file = $request->file('presentation_file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('proposals', $fileName, 'public');
            $proposal->presentation_file = $filePath;
        }

        $proposal->save();

        return redirect()->route('proposals.index')->with('success', 'Proposition mise à jour avec succès.');
    }

    public function destroy($client_id, $proposal_id)
    {
        $proposal = Proposal::where('client_id', $client_id)->findOrFail($proposal_id);

        // Delete the associated presentation file, if it exists
        if ($proposal->presentation_file) {
            Storage::disk('public')->delete($proposal->presentation_file);
        }

        $proposal->delete();

        return redirect()->route('proposals.index',['client_id'=>$client_id])->with('success', 'Proposition supprimée avec succès.');
    }
}
