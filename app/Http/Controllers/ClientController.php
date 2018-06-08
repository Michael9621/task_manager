<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Client;


class ClientController extends Controller
{
     public function add()
    {
    	return view('client');
    }
    public function create(Request $request)
    {


       $client = new Client();
       $client->name= $request->name;
       $client->email= $request->email;
       $client->location= $request->location;
       $client->save();
       return redirect('/')->with('msg','you created a new client'); 
    }
    public function edit(client $client)
    {

    	if (Auth::check() )
        {            
                return view('editclient', compact('client'));
        }           
        else {
             return redirect('/');
         }            	
    }

    public function update(Request $request, client $client)
    {
    	if(isset($_POST['delete'])) {
    		$client->delete();
    		return redirect('/')->with('msg','you deleted a client');
    	}
    	else
    	{

        $client->name= $request->name;
        $client->email= $request->email;
        $client->location= $request->location;
        $client->save();
	    return redirect('/')->with('msg','you edited client'); 
    	}    	
    }
}

