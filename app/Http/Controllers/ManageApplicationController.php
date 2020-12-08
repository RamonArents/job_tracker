<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Auth;
use Validator;

class ManageApplicationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Returns the dashboard page with the job data
     * @return view
     */
    public function showDashboard(){
        
        $getJobs = Application::where('user_id', Auth::id())->orderBy('favorite', 'desc')->get();

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
        $rules = [
            'name' => 'required|max:255',  
            'description' => 'required',       
            'website' => 'required|max:255', 
            'location' => 'required|max:255',  
            'success' => 'required|max:255'     
        ];
        $messages = [
            'name.required' => 'Het naamveld mag niet leeg zijn.',
            'name.max' => 'Het naamveld mag maximaal 255 characters lang zijn.',
            'description.required' => 'Het beschrijvingsveld mag niet leeg zijn.',
            'website.required' => 'Het websiteveld mag niet leeg zijn.',
            'website.max' => 'Het websiteveld mag maximaal 255 characters lang zijn.',
            'location.required' => 'Het locatieveld mag niet leeg zijn.',
            'location.max' => 'Het locatieveld mag maximaal 255 characters lang zijn.',
            'success.required' => 'Het succesveld mag niet leeg zijn.',
            'success.max' => 'Het succesveld mag maximaal 255 characters lang zijn.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return \Redirect::back()->withErrors($validator)->withInput();
        }else{
            $addData = new Application;
            $addData->user_id = Auth::id();
            $addData->name = $request->input('name');
            $addData->job_description = $request->input('description');
            $addData->website = $request->input('website');
            $addData->location = $request->input('location');
            $addData->success = $request->input('success');
            $addData->favorite = 1;
            $addData->save();
    
            return redirect('/dashboard')->with('success', 'Vacature succesvol opgeslagen.');
        }   
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
     /**
     * Saves the edited data of the edit page
     * @param $request the request to send the new data to the db
     * @param $id of the job
     * @return view
     */
    public function editApplication(Request $request, $id){
        $rules = [
            'name' => 'required|max:255',  
            'description' => 'required',       
            'website' => 'required|max:255', 
            'location' => 'required|max:255',  
            'success' => 'required|max:255'     
        ];
        $messages = [
            'name.required' => 'Het naamveld mag niet leeg zijn.',
            'name.max' => 'Het naamveld mag maximaal 255 characters lang zijn.',
            'description.required' => 'Het beschrijvingsveld mag niet leeg zijn.',
            'website.required' => 'Het websiteveld mag niet leeg zijn.',
            'website.max' => 'Het websiteveld mag maximaal 255 characters lang zijn.',
            'location.required' => 'Het locatieveld mag niet leeg zijn.',
            'location.max' => 'Het locatieveld mag maximaal 255 characters lang zijn.',
            'success.required' => 'Het succesveld mag niet leeg zijn.',
            'success.max' => 'Het succesveld mag maximaal 255 characters lang zijn.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return \Redirect::back()->withErrors($validator)->withInput();
        }else{
            $editData = Application::find($id);
            $editData->name = $request->input('name');
            $editData->job_description = $request->input('description');
            $editData->website = $request->input('website');
            $editData->location = $request->input('location');
            $editData->success = $request->input('success');
            $editData->save();

            return redirect('/dashboard')->with('success', 'Vacature succesvol bijgewerkt.');
        }
    }
    /**
     * Gets the delete page
     * 
     * @param $id of the selected job
     * @return view
     */
    public function getDelete($id){
        $getJob = Application::find($id);

        return view('delete', ['job' => $getJob]);
    }
    /**
     * Deletes an application. Softdeletes are used
     *
     * @param  array $request
     * @param $id from the application to delete
     * @return view
     */
    public function deleteApplication($id)
    {
        $application = Application::find($id);
        $application->delete();

        return redirect('/dashboard')->with('success', 'Vacature succesvol verwijderd.');
    }
    /**
     * Adds favorites to jobs
     * @param Illuminate\Http\Request $request
     * @param $id from the favorite job
     * @return view
     */
    public function addFavorite(Request $request, $id){
        $application = Application::find($id);
        $application->favorite = $request->input('favorite');
        $application->save();

        return redirect('/dashboard')->with('success', 'Vacature aan favorieten toegevoegd.');
    }
}
