<?php

namespace App\Http\Controllers;

use App\Globalmodel;
use App\AppointmentModel;
use App\AssigncoverModel;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class AssigncoverController extends Controller {
	
	public function __construct()
    {
        $this->middleware('auth');
    }
   public function index()
    {
       $newcovers=new AssigncoverModel();	    
	   $covers=$newcovers->Loadcovers();   
	   return view('allacovers')->with(compact('covers'));	                               
    }
   public function assignnewcover() {
	   $cover=new AssigncoverModel();
	   $patients=$cover->Loadpatients();       
	   $hosptals=$cover->Loadhosptals();	   
	   $doctors=$cover->LoadDoctors();	   
	   $covertypes=$cover->Loadcovertype();	   
	
      return view('assigncover')->with(compact('patients'))
	                               ->with(compact('hosptals'))
	                               ->with(compact('doctors'))
	                               ->with(compact('covertypes'));
  }
  
  public function loadedits($coverid=null,$patientid=null) {
	   $cover=new AssigncoverModel();
	   $patients=$cover->Loadpatients();       
	   $hosptals=$cover->Loadhosptals();	   
	   $doctors=$cover->LoadDoctors();	   
	   $covertypes=$cover->Loadcovertype();	   
	   $covers=$cover->singlecover($coverid,$patientid);	   
	
      return view('editcoverassignment')->with(compact('patients'))
									    ->with(compact('hosptals'))
									    ->with(compact('doctors'))
									    ->with(compact('covers'))
									    ->with(compact('covertypes'));
  }
	
   public function addnew(Request $request) {
	   
	    $validator = Validator::make($request->all(), [           
			'PatientId'=>'required',                 
			'startdate'=>'required|date',
			'expirydate'=>'required|date',
			'coverid'=>'required', 
			'status'=>'required', 
			'amount'=>'required' 
        ]);
		
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your fields as indicated in red! and press add button');
            return redirect('covers/assignnewcover')
                        ->withErrors($validator)
                        ->withInput();
        } 		
	    $addcovers = new AssigncoverModel();
		
       if ($addcovers->Assigncover([          
			'coverid' =>$request->input('coverid'), 
			'PatientId' =>$request->input('PatientId'),               
			'Startdate' =>date('Y-m-d',strtotime($request->input('startdate'))),
			'expirydate' =>date('Y-m-d',strtotime($request->input('expirydate'))),					
			'status' =>$request->input('status'),					
			'amount' =>$request->input('amount')					
        ],$request->input('coverid'),$request->input('PatientId')))
        { 
	     
		    return redirect('covers/allcovers');
	             
       }else{
		   
		    $validator->errors()->add('failed', 'Record Save Failed');
	         return redirect('covers/assignnewcover')
	             ->withErrors($validator);
	   }               
   }
     
public function editcover(Request $request) {
	   
	    $validator = Validator::make($request->all(), [           
			'PatientId'=>'required',                 
			'startdate'=>'required|date',
			'expirydate'=>'required|date',
			'coverid'=>'required', 
			'status'=>'required', 
			'amount'=>'required' 
        ]);
		
       
		
	    $coverid=$request->input('coverid');
	    $patientid=$request->input('PatientId');
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your fields as indicated in red! and press add button');
            return redirect('covers/loadedits/'.$coverid.'/'.$patientid.'')
                        ->withErrors($validator)
                        ->withInput();
        } 
		
		
		$addcovers = new AssigncoverModel();
		
       if ($addcovers->Editcover([ 
			'Startdate' =>date('Y-m-d',strtotime($request->input('startdate'))),
			'expirydate' =>date('Y-m-d',strtotime($request->input('expirydate'))),					
			'status' =>$request->input('status'),					
			'amount' =>str_replace(',','',$request->input('amount'))					
        ],$request->input('coverid'),$request->input('PatientId')))
        { 
	     
		    return redirect('covers/allcovers');
	             
       }else{
		   
		    $validator->errors()->add('failed', 'Record Save Failed');
	         return redirect('covers/loadedits/'.$coverid.'/'.$patientid.'')
	             ->withErrors($validator);
	   }               
   }   
}