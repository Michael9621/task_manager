<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\staff;


class StaffController extends Controller
{
     public function add()
    {
    	return view('staff');
    }
    public function create(Request $request)
    {
       $staff = new staff();
       $staff->name= $request->name;
       $staff->save();
       return redirect('/')->with('msg','you created a new staff member'); 
    }
    public function edit(Staff $staff)
    {

    	if (Auth::check() )
        {            
                return view('editStaff', compact('staff'));
        }           
        else {
             return redirect('/');
         }            	
    }

    public function update(Request $request, staff $staff)
    {
    	if(isset($_POST['delete'])) {
    		$staff->delete();
    		return redirect('/')->with('msg','you deleted a  staff member');
    	}
    	else
    	{

        $staff->name= $request->name;
        $staff->save();
	    return redirect('/')->with('msg','you edited a staff member'); 
    	}    	
    }
}

