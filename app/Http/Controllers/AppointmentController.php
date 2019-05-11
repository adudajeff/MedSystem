<?php

namespace App\Http\Controllers;

use App\Globalmodel;
use App\AppointmentModel;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class AppointmentController extends Controller {
	
	public function __construct()
    {
        $this->middleware('auth');
    }
   public function index()
    {
       $allappointment=new AppointmentModel();
	   $patients=$allappointment->Loadpatients();       
	   $hosptals=$allappointment->Loadhosptals();	   
	   $doctors=$allappointment->LoadDoctors();   
	   $appointments=$allappointment->LoadAppointments();   
	   return view('allappointment')->with(compact('patients'))
	                                ->with(compact('hosptals'))
	                                ->with(compact('appointments'))
	                                ->with(compact('doctors'));
    }
   public function newappointment() {
	   $allappointment=new AppointmentModel();
	   $patients=$allappointment->Loadpatients();       
	   $hosptals=$allappointment->Loadhosptals();	   
	   $doctors=$allappointment->LoadDoctors();	   
	
      return view('newappointment')->with(compact('patients'))
	                               ->with(compact('hosptals'))
	                               ->with(compact('doctors'));
  }
  
  public function editappointment($AppointmentID=null) {
	   $allappointment=new AppointmentModel();
	   $patients=$allappointment->Loadpatients();       
	   $hosptals=$allappointment->Loadhosptals();	   
	   $doctors=$allappointment->LoadDoctors();	   
	   $appointments=$allappointment->LoadSingle($AppointmentID);	   
	
      return view('editappointment')->with(compact('patients'))
	                               ->with(compact('hosptals'))
	                               ->with(compact('appointments'))
	                               ->with(compact('doctors'));
  }
	
   public function addnew(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'Note' => 'required',
			'PatientId'=>'required',                 
			'Appointmentdate'=>'required|date',
			'Start'=>'required',                        
			'End'=>'required', 
			'Physician'=>'required',                      
			'Condition'=>'required',          
			'hosptal'=>'required',          
			'TherapyStartDate'=>'required' 
        ]);
		
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your fields as indicated in red! and press add button');
            return redirect('Appointments/newappointment')
                        ->withErrors($validator)
                        ->withInput();
        } 		
	    $Appointment = new AppointmentModel();
		
       if ($Appointment->Addappointments([          
			'Note' =>$request->input('Note'),        
			'Physician' =>$request->input('Physician'),                   
			'PatientId' =>$request->input('PatientId'),               
			'Start' =>date('h:i:s',strtotime($request->input('Start'))),
			'hosptalId' =>$request->input('hosptal'),
			'End' =>date('h:i:s',strtotime($request->input('End'))),
			'Appointmentdate' =>date('Y-m-d',strtotime($request->input('Appointmentdate'))),                   
			'Condition' =>$request->input('Condition'), 
			'TherapyStartDate' =>date('Y-m-d',strtotime($request->input('TherapyStartDate'))) 
        ]))
        { 
	     
		    return redirect('Appointments');
	             
       }else{
		   
		    $validator->errors()->add('failed', 'Record Save Failed');
	         return redirect('Appointments/newappointment')
	             ->withErrors($validator);
	   }               
   } 
   
   public function editrecord(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'Note' => 'required',
			'PatientId'=>'required',                 
			'Appointmentdate'=>'required|date',
			'Start'=>'required',                        
			'End'=>'required', 
			'Physician'=>'required',                      
			'Condition'=>'required',          
			'AppointmentID'=>'required',          
			'hosptal'=>'required',          
			'TherapyStartDate'=>'required' 
        ]);
		$AppointmentID=$request->input('AppointmentID');
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your fields as indicated in red! and press add button');
            return redirect('Appointments/editappointment/'.$AppointmentID.'')
                        ->withErrors($validator)
                        ->withInput();
        } 		
	    $Appointment = new AppointmentModel();
		 $postponed="N";
		if (date('Y-m-d',strtotime($request->input('Postponementdate')))>date('Y-m-d',strtotime($request->input('Appointmentdate'))))
		{
			 $postponed="Y";
		}
       if ($Appointment->editappointments([          
			'Note' =>$request->input('Note'),        
			'Physician' =>$request->input('Physician'),                   
			//'PatientId' =>$request->input('PatientId'),               
			'Start' =>date('h:i:s',strtotime($request->input('Start'))),
			'hosptalId' =>$request->input('hosptal'),
			'End' =>date('h:i:s',strtotime($request->input('End'))),
			'Appointmentdate' =>date('Y-m-d',strtotime($request->input('Appointmentdate'))),                   
			'Postponementdate' =>date('Y-m-d',strtotime($request->input('Postponementdate'))),                   
			'Condition' =>$request->input('Condition'), 
			'postponementreason' =>$request->input('postponementreason'), 
			'status' =>$request->input('status'), 
			'postponed' =>$postponed, 
			'TherapyStartDate' =>date('Y-m-d',strtotime($request->input('TherapyStartDate'))) 
        ],$AppointmentID))
        { 
	     
		    return redirect('Appointments');
	             
       }else{
		   
		    $validator->errors()->add('failed', 'Record Save Failed');
	         return redirect('Appointments/editappointment/'.$AppointmentID.'')
	             ->withErrors($validator);
	   }               
   } 
}