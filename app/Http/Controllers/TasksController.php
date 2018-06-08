<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin',compact('user'));
    }

    public function add()
    {
        return view('add');
    }

    public function create(Request $request)
    {
        

        if($request->date1 > $request->date2 ||  $request->date2 > $request->date3 ||  $request->date1 > $request->date3 ){
             //echo $error_date="Dates are not in order";
            return redirect('/task')->with('status', 'Task not created:dates are not in order');
        }
        elseif(empty($request->staff)){
            //  echo $ $error_checkbox="atleast 1 required";
              return redirect('/task')->with('status', 'Task not created:atleast 1 entry required in staff');

        }

        else{
        $task = new Task();
        $task->job_type= $request->job;
        $task->client = $request->client;
        $task->staff = implode(" , ",$request->staff);
        $task->start_date = $request->date1;
        $task->expected_completion_date = $request->date2;
        $task->due_date = $request->date3;
        $task->user_id = Auth::id();
        $task->save();
        return redirect('/')->with('msg','success! You created a new task');
        } 

    }

    public function edit(Task $task)
    {

        if (Auth::check() && Auth::user()->id == $task->user_id)
        {            
                return view('edit', compact('task'));
        }           
        else {
             return redirect('/');
         }              
    }

    public function update(Request $request, Task $task)
    {
        if(isset($_POST['delete'])) {
            $task->delete();
            return redirect('/')->with('msg','You deleted a task');
        }
        else
        {
          
        if($request->date1 > $request->date2 ||  $request->date2 > $request->date3 ||  $request->date1 > $request->date3 ){
             //echo $error_date="Dates are not in order";
            return redirect('/')->with('status', 'Task not edited:dates are not in order');
        }
        elseif(empty($request->staff)){
            //  echo $ $error_checkbox="atleast 1 required";
              return redirect('/')->with('status', 'Task not edited:atleast 1 entry required in staff');

        }

        $task->job_type= $request->job;
        $task->client = $request->client;
        $task->staff = implode(" , ",$request->staff);
        $task->start_date = $request->date1;
        $task->expected_completion_date = $request->date2;
        $task->due_date = $request->date3;
        $task->save();
        return redirect('/')->with('msg','You edited a status'); 
        }       

    }
    
    public function edit_status(Task $task)
    {

        if (Auth::check() && Auth::user()->id == $task->user_id)
        {            
                return view('edit_status', compact('status'));
        }           
        else {
             return redirect('/');
         }              
    }

    public function update_status(Request $request, Task $task)
    {

        $task->status= $request->status;

        $task->save();
        return redirect('/')->with('msg', 'You updated a status'); 
             

    }

}