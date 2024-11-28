<?php

namespace App\Http\Controllers;

use App\Models\employe;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        $employees = employe::all();
        return view('employes.index', ['employes' => $employees]);
    }

    // Show the form to create a new employe
    public function create()
    {
        return view('employes.create');
    }

    // Store a new employe in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'E-mail' => 'required|email',
            'Poste' => 'required',
            'Telephone' => 'required'
        ]);

        employe::create($validatedData);

        return redirect()->route('employes.index')->with('success', 'Employe created successfully!');
    }

    // Show a single employe's details
    public function show($id)
    {
        $employees = employe::findOrFail($id);
        return view('employes.show', ['employe' => $employe]);
    }

    // Show the form to edit an employe
    public function edit($id)
    {
        $employees = employe::findOrFail($id);
        return view('employes.update    ', ['employe' => $employees]);
    }

    // Update an employe in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'E-mail' => 'required|email',
            'Poste' => 'required',
            'Telephone' => 'required'
        ]);

        $employees = employe::findOrFail($id);
        $employees->update($validatedData);

        return redirect()->route('employes.index')->with('success', 'Employe updated successfully!');
    }

    // Delete an employe from the database
    public function destroy($id)
    {
        $employees = employe::findOrFail($id);
        $employees->delete();

        return redirect()->route('employes.index')->with('success', 'Employe deleted successfully!');
    }


}
