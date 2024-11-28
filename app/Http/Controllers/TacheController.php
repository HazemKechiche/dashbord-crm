<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\employe;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /**
     * Display a listing of the taches.
     */
    public function index()
    {
        $taches = Tache::all();
        $employess = employe::all();
              // Get IDs of employees associated with any tache
              $idsEmployesAssocies = Employe::has('taches')->pluck('id')->toArray();
        
              // Get employees not associated with any tache
              $employes = Employe::whereNotIn('id', $idsEmployesAssocies)->get();
   

        return view('taches.index', compact('taches', 'employes'));
    }

    /**
     * Show the form for creating a new tache.
     */
    public function create()
    {
        return view('taches.create');
    }

    /**
     * Store a newly created tache in the database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Gestionnairedetache' => 'required',
            'DatedEcheance' => 'required|date',
            'DateD' => 'required|date',
            'DateF' => 'required|date',
            'Etat' => 'required',
            'Localisation' => 'required',
            'type' => 'required',
            'Priorite' => 'required',
            'Description' => 'nullable',
        ]);

        Tache::create($validatedData);

        return redirect()->route('taches.index')->with('success', 'Tache created successfully!');
    }

    /**
     * Display the specified tache.
     */
    public function show($id)
    {
        $tache = Tache::findOrFail($id);
        return view('taches.show', ['tache' => $tache]);
    }

    /**
     * Show the form for editing the specified tache.
     */
    public function edit($id)
    {
        $tache = Tache::findOrFail($id);
        return view('taches.update', ['tache' => $tache]);
    }

    /**
     * Update the specified tache in the database.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Gestionnairedetache' => 'required',
            'DatedEcheance' => 'required|date',
            'DateD' => 'required|date',
            'DateF' => 'required|date',
            'Etat' => 'required',
            'Localisation' => 'required',
            'type' => 'required',
            'Priorite' => 'required',
            'Description' => 'nullable',
        ]);

        $tache = Tache::findOrFail($id);
        $tache->update($validatedData);

        return redirect()->route('taches.index')->with('success', 'Tache updated successfully!');
    }

    /**
     * Remove the specified tache from the database.
     */
    public function destroy($id)
    {
        $tache = Tache::findOrFail($id);
        $tache->delete();

        return redirect()->route('taches.index')->with('success', 'Tache deleted successfully!');
    }

    public function assignEmployees(Request $request, $id)
{
    $tache = Tache::find($id);
    if (!$tache) {
        return redirect()->back()->with('error', 'Tache not found');
    }

    $employeeIds = $request->input('employees');

    // Attach the selected employees to the tache
    $tache->employes()->attach($employeeIds);

    return redirect()->route('taches.employes',['tache'=> $tache])->with('success', 'Employees assigned to tache successfully!');
}
public function showEmployees(Tache $tache)
{
    // Récupérez les employés associés à la tâche spécifique
    $employes = $tache->employes;
     // Get IDs of employees associated with any tache
     $idsEmployesAssocies = $tache->employes->pluck('id')->toArray();        
     // Get employees not associated with any tache
     $employesDisponibles = employe::whereNotIn('id', $idsEmployesAssocies)->get();

    // Chargez la vue pour afficher les détails des employés associés
    return view('taches.employes', compact('employes', 'tache','employesDisponibles'));
}
public function disassociate($tacheId, $employeId)
    {
        $tache = Tache::findOrFail($tacheId);
        $employe = Employe::findOrFail($employeId);

        // Detach the employee from the tache
        $tache->employes()->detach($employe);

        return redirect()->route('taches.employes',['tache'=> $tache])->with('success', 'Employee disassociated from tache successfully!');
    }

}
