<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Activity;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function stat()
    {
        $clients = Client::withCount('activities')->get(); // Count the number of activities for each client
        $clientNames = $clients->pluck('Nom');
      //  $activityCounts = $clients->pluck('activities_count');
     // dd($clients);  
      //dd($clientNames);
      $clientActivityCounts = [];
      foreach ($clients as $client) {
          $activityCount = Activity::where('client_id', $client->id)->count();
          $clientActivityCounts[] = $activityCount;
      }
      
  
      return view('dashboard',compact('clientActivityCounts','clientNames'));
    }

}