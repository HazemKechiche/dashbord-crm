<?php
namespace App\Http\Controllers;
use App\Models\Prospect;
use Illuminate\Http\Request;

class ProspectController extends Controller
{
    public function index()
    {
        $prospects = Prospect::all();
        return view('prospects.index', compact('prospects'));
    }

    public function create()
    {
        return view('prospects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'GestionnaireDuProspect' => 'required|string',
            'Prénom' => 'required|string',
            'Nom' => 'required|string',
            'Titre' => 'nullable|string',
            'E-mail' => 'required|email|unique:prospects',
            'Téléphone' => 'nullable|string',
            'StatutduProspect' => 'required|string',
            'ChiffreAffaires' => 'nullable|numeric',
            'Nbredemployes' => 'nullable|integer',
            'Address' => 'nullable|string',
            'Codepostal' => 'nullable|string',
            
        ]);
    
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = $file->getClientOriginalName(); // Vous pouvez choisir un nom unique si vous le souhaitez
            // Utilisation du dossier public
            $file->storeAs('public/pdf', $fileName);
    
            // Enregistrement du nom du fichier dans la base de données
            $data['pdf_filename'] = $fileName;
        }
    
        // Enregistrement du prospect dans la base de données
        Prospect::create($data);
    
        return redirect()->route('prospects.index')->with('success', 'Prospect créé avec succès!');
    }
    

    public function show(Prospect $prospect)
    {
        return view('prospects.show', compact('prospect'));
    }

    public function edit(Prospect $prospect)
    {
        return view('prospects.edit', compact('prospect'));
    }

    public function update(Request $request, Prospect $prospect)
    {
        $data = $request->validate([
            'GestionnaireDuProspect' => 'required|string',
            'Prénom' => 'required|string',
            'Nom' => 'required|string',
            'Titre' => 'nullable|string',
            'E-mail' => 'required|email|unique:prospects,E-mail,' . $prospect->id,
            'Téléphone' => 'nullable|string',
            'StatutduProspect' => 'required|string',
            'ChiffreAffaires' => 'nullable|numeric',
            'Nbredemployes' => 'nullable|integer',
            'Address' => 'nullable|string',
            'Codepostal' => 'nullable|string',
        ]);
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = $file->getClientOriginalName(); // Vous pouvez choisir un nom unique si vous le souhaitez
            // Utilisation du dossier public
            $file->storeAs('public/pdf', $fileName);
    
            // Enregistrement du nom du fichier dans la base de données
            $data['pdf_filename'] = $fileName;
        }

        $prospect->update($data);

        return redirect()->route('prospects.index')->with('success', 'Prospect updated successfully!');
    }

    public function destroy(Prospect $prospect)
    {
        $prospect->delete();

        return redirect()->route('prospects.index')->with('success', 'Prospect deleted successfully!');
    }
}
