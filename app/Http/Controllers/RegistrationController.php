<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct(){}

    public function index(){
        return view('registration');
    }
    
    public function register(Request $request){

        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $res = new Registration();
        $res->email = $request->email;
        $res->message = $request->message;
        $res->save();

        if(!empty($res)){
            return redirect('/getAllData');
        }
        return view('registration'); 
    }

    public function getAllData(){
        return Registration::all();
    }
}

