<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\GlobalModel;
use App\AppointmentModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $allpatients=new AppointmentModel();
       $counts=new GlobalModel();
	   $appointmentcount=$counts->appointmentscounts();
	   $documentcount=$counts->documentscounts();
	   $mbilsumcounts=$counts->mbilsumcount();
	   $patientcount=$counts->patientcount();
	   
	   $appointments=$allpatients->LoadAppointments(); 
	   return view('home')->with(compact('appointments'))
						  ->with('calendar','Y')
						  ->with('appointmentcount',$appointmentcount)
						  ->with('documentcount',$documentcount)
						  ->with('mbilsumcounts',$mbilsumcounts)
						  ->with('patientcount',$patientcount);
    }
	   
   public function dologout(){
	   return redirect('login')->with(Auth::logout());
   }
   public function insert(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'name' => 'required',
            'dob' => 'required|date',
            'age' => 'required|numeric',
        ]);
		
	
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your Fields as indicated in Red! and Press Add Button Again');
            return redirect('home/insert')
                        ->withErrors($validator)
                        ->withInput();
        } 
	    
	   
	   
      $name = $request->input('name');
      $dob = $request->input('dob');
      $age = $request->input('age');
      DB::insert('insert into student (name,dob,age) values(?,?,?)',[$name,$dob,$age]);
	  
      $validator->errors()->add('success', 'Record Add Success');
            //return redirect('home/insert')
                        //->withErrors($validator)
                       // ->withInput();
      return redirect('home/insert')
	             ->withErrors($validator);
                        
   }
}
