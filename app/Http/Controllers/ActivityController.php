<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Client;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {

        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    public function create($client_id)
    {
        $clients = Client::findOrFail($client_id);
        return view('activities.create', compact('clients'));
    }

    public function store(Request $request,$id)
    {
        
        $validatedData = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'description' => 'nullable',
            'date_time' => 'required|date',
            
            
        ]);
        $validatedData['client_id'] = $id;

        Activity::create($validatedData);
        
        return redirect()->route('activities.index')->with('success', 'Activity created successfully!');
    }

    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $activity->update($request->all());
        return redirect()->route('activities.index')->with('success', 'Activity updated successfully!');
    }

    public function destroy($activity)
    {
       $activityy = Activity::findOrFail($activity);
        $activityy->delete();
        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully!');
    }
}
