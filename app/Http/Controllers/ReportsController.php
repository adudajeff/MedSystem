<?php

namespace App\Http\Controllers;

use App\Globalmodel;
use App\AppointmentModel;
use App\ReportsModel;
use App\AssigncoverModel;
use App\ReceiptModel;
use App\RoleModel;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ReportsController extends Controller {
	
	public function __construct()
    {
        $this->middleware('auth');
    }
     
  public function Allreceiptuploads() {
	  
	    $alldocuments=new ReceiptModel();
		$documents=$alldocuments->Loaddocumets();
		return view('Allreceiptuploads')->with(compact('documents'));
  } 
  public function billsummaries() {
	  
	    $alldocuments=new ReceiptModel();
	    $billsammary=new ReportsModel();
		$billsum=$billsammary->loadbillsummary();
		
		$documents=$alldocuments->Loaddocumets();
		return view('billsammaryreport')
		                 ->with(compact('billsum'))
		                 ->with(compact('documents'));
  }
  public function allcovers() {
	     
	    $reportscover=new ReportsModel();
		$covers=$reportscover->Loadcovers();
		
		return view('allpatientscovers')
		                 ->with(compact('covers'));
  }
  
  public function aarlist() {
	     
	    $reportscover=new ReportsModel();
		$covers=$reportscover->LoadcoversSSSS();
		
		return view('aarlist')
		                 ->with(compact('covers'));
  }
  
  public function imclist() {
	     
	    $alldocuments=new ReceiptModel();
		$documents=$alldocuments->Loadbillings();
		return view('imslist')->with(compact('documents'));
		
		
  }
  public function imsmlists() {
	     
	    $reportscover=new ReportsModel();
		$documents=$reportscover->Loadcovers();
		
		return view('imsmlists')
		                 ->with(compact('documents'));
		
		
  }
  public function allappointments() {
	     
	   $allappointment=new AppointmentModel();	     
	   $appointments=$allappointment->LoadAppointments();   
	   return view('allappointmentreports')->with(compact('appointments'));
  }
  
  public function appointmentsschedule() {
	     
	   $allpatients=new AppointmentModel();
       $counts=new GlobalModel();
	   $appointmentcount=$counts->appointmentscounts();
	   $documentcount=$counts->documentscounts();
	   $mbilsumcounts=$counts->mbilsumcount();
	   $patientcount=$counts->patientcount();
	   $reminder=$counts->reminder();
	   $remindercount=$counts->remindercount();
	   $notification=$counts->notification();
	   $notificationcount=$counts->notificationcount();
	   
	   $appointments=$allpatients->LoadAppointments(); 
	   return view('appointmentsschedule')->with(compact('appointments'))
						  ->with('calendar','Y')
						  ->with('appointmentcount',$appointmentcount)
						  ->with('documentcount',$documentcount)
						  ->with('mbilsumcounts',$mbilsumcounts)
						  ->with('reminder',$reminder)
						  ->with('remindercount',$remindercount)
						  ->with('notification',$notification)
						  ->with('notificationcount',$notificationcount)
						  ->with('patientcount',$patientcount);
  }
	
  
}