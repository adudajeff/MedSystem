<?php

namespace App\Http\Controllers;

use App\Globalmodel;
use App\AssigncoverModel;
use App\ReceiptModel;
use App\ReportsModel;
use App\RoleModel;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ReconcileController extends Controller {
	
	public function __construct()
    {
        $this->middleware('auth');
    }
   public function index()
    {
  
    }
public function bill() {
	    $alldocuments=new ReceiptModel();
		$documents=$alldocuments->Loaddocumetsedits();
		return view('receiptformarking')->with(compact('documents'));
  }

public function billforreconcile() {
		  
	    $alldocuments=new ReceiptModel();
	    $billsammary=new ReportsModel();
		$billsum=$billsammary->loadbillsummary();
		
		$documents=$alldocuments->Loaddocumets();
		return view('billsammaryreportreconcile')
		                 ->with(compact('billsum'))
		                 ->with(compact('documents'));
  
}

public function billforreconcileexpand($invoiceno=null) {
		  
	$alldocuments=new ReceiptModel();
	$billsammary=new ReportsModel();
	$billsum=$billsammary->loadbillsummaryexpand($invoiceno);
	
	$documents=$alldocuments->Loaddocumets();
	return view('formarking')
					 ->with(compact('billsum'))
					 ->with(compact('documents'));

}
  
 public function cover() {
	   $newcovers=new AssigncoverModel();	    
	   $covers=$newcovers->Loadcovers();      
	
      return view('coverforreconcile')->with(compact('covers'));
  }
  
   public function loadreconcile($coverid=null,$patientid=null) {
	   
	   $cover=new AssigncoverModel();
	   $patients=$cover->Loadpatients();       
	   $hosptals=$cover->Loadhosptals();	   
	   $doctors=$cover->LoadDoctors();	   
	   $covertypes=$cover->Loadcovertype();	   
	   $covers=$cover->singlecover($coverid,$patientid);	   
	
      return view('editcoverreconcile')->with(compact('patients'))
									    ->with(compact('hosptals'))
									    ->with(compact('doctors'))
									    ->with(compact('covers'))
									    ->with(compact('covertypes'));
      
  }
  public function updateinvoice(Request $request) {
	  $validator = Validator::make($request->all(), [           
			'docid'=>'required'
			 
        ]);
		
       	
	    
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'No record selected for update, kindly select and press Mark Button');
            return redirect('/reconcile/reconcilebill')
                        ->withErrors($validator)
                        ->withInput();
		}
			
		$save=new ReceiptModel;		
		foreach($request->input('docid') as $tem)
		{
				 if ($save->Updateinvoice([
					'Paymentstatus' =>'PAID'					
				],$tem))
				{ 
				    $validator->errors()->add('success', 'Record updated');
					return redirect('reconcile/reconcilebill')
						 ->withErrors($validator);
			   }else{
				   
					$validator->errors()->add('failed', 'Record Save Failed');
					 return redirect('reconcile/reconcilebill')
						 ->withErrors($validator);
			   }
		}
		
			
  }
  
  
  public function updatepaid(Request $request) {
	  $validator = Validator::make($request->all(), [           
			'docid'=>'required'
			 
        ]);
		
       	
	    
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'No record selected for update, kindly select and press Mark Button');
                         return  redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
		}
			
		$save=new ReceiptModel;		
		foreach($request->input('docid') as $tem)
		{
				 if ($save->updatepaid([
					'Paymentstatus' =>'PAID'					
				],$tem))
				{ 
				    $validator->errors()->add('success', 'Record updated');
					
			   }else{
				   
					$validator->errors()->add('failed', 'Record Save Failed');
					 
			   }
		}
		
		return redirect()->back()
		    ->withErrors($validator);	
  }
   

   public function reconcileupdate(Request $request) {
	
	   $validator = Validator::make($request->all(), [           
			'PatientId'=>'required', 
			'coverid'=>'required',			
			'amount'=>'required', 
			'reconamount'=>'required', 
        ]);
		
       
		
	    $coverid=$request->input('coverid');
	    $patientid=$request->input('PatientId');
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your fields as indicated in red! and press add button');
            return redirect('reconcile/loadreconcile/'.$coverid.'/'.$patientid.'')
                        ->withErrors($validator)
                        ->withInput();
        } 
		
		
	   $addcovers = new AssigncoverModel();
		
       if ($addcovers->Editcover([
			'amount' =>str_replace(',','',$request->input('amount')),					
			'reconamount' =>str_replace(',','',$request->input('reconamount'))					
        ],$request->input('coverid'),$request->input('PatientId')))
        { 
	     
		    return redirect('reconcile/reconcilecover');
	             
       }else{
		   
		    $validator->errors()->add('failed', 'Record Save Failed');
	         return redirect('reconcile/loadreconcile/'.$coverid.'/'.$patientid.'')
	             ->withErrors($validator);
	   } 
   }   
}