<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use App\Models\employe;
use Illuminate\Http\Request;

class ReunionController extends Controller
{
    // Display a listing of reunions
    public function index()
    {
        $reunions = Reunion::all();
        return view('reunions.index', ['reunions' => $reunions]);
    }

    // Show the form to create a new reunion
    public function create()
    {
        return view('reunions.create');
    }

    // Store a new reunion in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomReunion' => 'required',
            'Emplacement' => 'required',
            'dateD' => 'required|date',
            'dateF' => 'required|date',
            'Hote' => 'required',
            'Rappel' => 'required',
            'Description' => 'nullable',
        ]);

        Reunion::create($validatedData);

        return redirect()->route('reunions.index')->with('success', 'Reunion created successfully!');
    }

    // Show a single reunion's details
    public function show($id)
    {
        $reunion = Reunion::findOrFail($id);
        return view('reunions.show', ['reunion' => $reunion]);
    }

    // Show the form to edit a reunion
    public function edit($id)
    {
        $reunion = Reunion::findOrFail($id);
        return view('reunions.update', ['reunion' => $reunion]);
    }

    // Update a reunion in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomReunion' => 'required',
            'Emplacement' => 'required',
            'dateD' => 'required|date',
            'dateF' => 'required|date',
            'Hote' => 'required',
            'Rappel' => 'required',
            'Description' => 'nullable',
        ]);

        $reunion = Reunion::findOrFail($id);
        $reunion->update($validatedData);

        return redirect()->route('reunions.index')->with('success', 'Reunion updated successfully!');
    }

    // Delete a reunion from the database
    public function destroy($id)
    {
        $reunion = Reunion::findOrFail($id);
        $reunion->delete();

        return redirect()->route('reunions.index')->with('success', 'Reunion deleted successfully!');
    }
    public function showEmployees(Reunion $reunion)
{
    // Get employees associated with the specific reunion
    $employes = $reunion->employes;
    
    // Get IDs of employees associated with any reunion
    $associatedEmployeeIds = $reunion->employes->pluck('id')->toArray();
    
    // Get employees not associated with any reunion
    $availableEmployees = employe::whereNotIn('id', $associatedEmployeeIds)->get();

    // Load the view to display the details of participants associated with the reunion
    return view('reunions.employes', compact('employes', 'reunion', 'availableEmployees'));
}
public function assignEmployees(Request $request, $id)
{
    $reunion = Reunion::find($id);
    if (!$reunion) {
        return redirect()->back()->with('error', 'Reunion not found');
    }

    $employeeIds = $request->input('employees');

    // Attach the selected employees to the reunion
    $reunion->employes()->attach($employeeIds);

    return redirect()->route('reunion.employes', ['reunion' => $reunion])->with('success', 'Employees assigned to reunion successfully!');
}
public function disassociate($ReunionId, $employeId)
    {
        $reunion = Reunion::findOrFail($ReunionId);
        $employe = Employe::findOrFail($employeId);

        // Detach the employee from the tache
        $reunion->employes()->detach($employe);

        return redirect()->route('reunion.employes',['reunion'=> $reunion])->with('success', 'Employee disassociated from tache successfully!');
    }
}
