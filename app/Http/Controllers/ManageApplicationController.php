<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageApplicationController extends Controller
{
    /**
     * Shows the page to add applications
     * @return view
     */
    public function getAdd(){
        return view('add');
    }
    /**
     * Adds the applications to the database
     * @return view
     */
    public function addApplication(Request $request){
        
    }
}
