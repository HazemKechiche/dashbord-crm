<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunicationTemplate;
use App\Models\Client;



class CommunicationTemplateController extends Controller
{
    public function index()
    {
        $communicationTemplates = CommunicationTemplate::all();
        $clients = Client::all();
        return view('communication_template.index', compact('communicationTemplates','clients'));
    }

    public function create($client_id) 
    {
        $client = Client::find($client_id);

        
        return view('communication_template.create', compact('client'));
    }

    public function store(Request $request ,$client_id)
    {
        $validatedData = $request->validate([
            
            'type' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);
        $validatedData['client_id'] = $client_id;


        CommunicationTemplate::create($validatedData);

        return redirect()->route('communication_template.index')
            ->with('success', 'Communication template created successfully.');
    }

    public function edit(CommunicationTemplate $communicationTemplate)
    {
        $clients = Client::all();
        return view('communication_template.edit', compact('communicationTemplate', 'clients'));
    }

    public function update(Request $request, CommunicationTemplate $communicationTemplate)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'type' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);

        $communicationTemplate->update($request->all());

        return redirect()->route('communication_template.index')
            ->with('success', 'Communication template updated successfully.');
    }

    public function destroy($id)
    {$communicationTemplate = CommunicationTemplate::find($id);
        $communicationTemplate->delete();

        return redirect()->route('communication_template.index')
            ->with('success', 'Communication template deleted successfully.');
    }
}
