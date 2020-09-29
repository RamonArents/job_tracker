<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Auth;

class ManageApplicationController extends Controller
{
    /**
     * Returns the dashboard page with the job data
     * @return view
     */
    public function showDashboard(){
        
        $getJobs = Application::where('user_id', Auth::id())->get();

        return view('dashboard', ['jobs' => $getJobs]);
    }
    /**
     * Shows the page to add applications
     * @return view
     */
    public function getAdd(){
        return view('add');
    }
    /**
     * Adds the applications to the database
     * @param Illuminate\Http\Request $request
     * @return view
     */
    public function addApplication(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'website' => 'required|max:255'
        ]);

        $addData = new Application;
        $addData->user_id = Auth::id();
        $addData->name = $request->input('name');
        $addData->job_description = $request->input('description');
        $addData->website = $request->input('website');
        $addData->save();

        return redirect('/dashboard')->with('success', 'Vacature succesvol opgeslagen.');
    }
    
}
