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
    /**
     * Shows the edit page to edit a job
     * @param $id of the job
     * @return view
     */
    public function getEdit($id){

        $getJob = Application::find($id);

        return view('edit', ['job' => $getJob]);
    }
    public function editApplication(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'website' => 'required|max:255'
        ]);

        $editData = Application::find($id);
        $editData->name = $request->input('name');
        $editData->job_description = $request->input('description');
        $editData->website = $request->input('website');
        $editData->save();

        return redirect('/dashboard')->with('success', 'Vacature succesvol bijgewerkt.');
    }
    
}
