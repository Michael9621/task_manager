<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class verifyController extends Controller
{
     public function verify($token)
    {
       User::where('token',$token)->firstOrFail()

       ->update(['token' => null]);  


       return redirect()

       ->route('/admin')

       ->with('status', 'Account verifed ');   
    }
}
