<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job;


class JobController extends Controller
{
     public function add()
    {
    	return view('job');
    }
    public function create(Request $request)
    {
       $job = new Job();
       $job->name= $request->name;
       $job->save();
       return redirect('/')->with('msg','you created a new job'); 
    }
    public function edit(job $job)
    {

    	if (Auth::check() )
        {            
                return view('editjob', compact('job'));
        }           
        else {
             return redirect('/');
         }            	
    }

    public function update(Request $request, job $job)
    {
    	if(isset($_POST['delete'])) {
    		$job->delete();
    		return redirect('/')->with('you deleted a job');
    	}
    	else
    	{

        $job->name= $request->name;
        $job->save();
	    return redirect('/')->with('you edited a job'); 
    	}    	
    }
}

