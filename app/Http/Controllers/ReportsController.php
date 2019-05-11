<?php

namespace App\Http\Controllers;

use App\Globalmodel;
use App\AppointmentModel;
use App\ReportsModel;
use App\AssigncoverModel;
use App\ReceiptModel;
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
	
  
}