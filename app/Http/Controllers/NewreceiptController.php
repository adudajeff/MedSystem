<?php

namespace App\Http\Controllers;

use App\ReceiptModel;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response ;

class NewreceiptController extends Controller {
	
	public function __construct()
    {
        $this->middleware('auth');
    }
   public function index()
    {
        
		$allhosptals=new ReceiptModel();
		$hosptals=$allhosptals->Loadhosptals();
		$documenttypes=$allhosptals->documenttype();
		return view('postreceipt')->with(compact('hosptals'))
									->with(compact('documenttypes'));
    }
	
	public function printsum($invoiceno=null){
		
		$alldocuments=new ReceiptModel();
		$documents=$alldocuments->Loaddocumetprint($invoiceno);
		$allbills=$alldocuments->loadbillsum($invoiceno);
		$bilsums=$alldocuments->loadmbillsum($invoiceno);
		$documenttypes=$alldocuments->documenttype();
		return view('summary_print')->with(compact('allbills'))
									->with(compact('bilsums'))
									->with(compact('documenttypes'))
									->with(compact('documents'));
    }
	
	public function createbillsum($invoiceno=null)
    {
        
		$alldocuments=new ReceiptModel();
		$documents=$alldocuments->Loaddocumets();
		$allbills=$alldocuments->loadbillsum($invoiceno);
		$name = \Auth::user()->name;
		return view('createbillsum')->with(compact('documents'))
									->with('invoiceno',$invoiceno)		
									->with('pname',$name)		
									->with(compact('allbills'));		
	
    }
	
	public function deletesum($invoiceno=null,$billid=null)
    {
        
		$alldocuments=new ReceiptModel();
		$documents=$alldocuments->Loaddocumets();
		$allbills=$alldocuments->loadbillsum($invoiceno);
		$alldocuments->deletebill($invoiceno,$billid);
		$name = \Auth::user()->name;
		
            return redirect('Uploadreceipt/billsum/'.$invoiceno.'')
                        ->withErrors('success', 'Delete Success')
                        ->with('pname', $name)
                        ->withInput();		
	
    }
	
	public function loaddocuments()
    {
        $alldocuments=new ReceiptModel();
		$documents=$alldocuments->Loaddocumets();
		return view('allreceiptposts')->with(compact('documents'));
    }
	
	
	 public function uploadnew(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'hosptal' => 'required', 
			'invoiceno'=>'required',                       
			'documenttype'=>'required',                       
			'files'=>'required'                       
			      
        ]);
	  
		//$json= response()->json('success', 200);
	
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'No file Selected for download');
           return redirect('Uploadreceipt/newpost')
                       ->withErrors($validator)
                       ->withInput();
        } 
		
		
		$name=""; 
		$patientid = \Auth::user()->id;
		
      if($files=$request->file('files')){
        foreach($files as $file){
            $name=$file->getClientOriginalName();
            $file->move('image',$patientid.'_invoice_'.$name);			
            $images[]=$name;
			
			 $Receipt = new ReceiptModel();		
			 $Receipt->Adddocuments([          
				'document' =>$patientid.'_invoice_'.$name,        
				'datecreated' =>date('Y-m-d'),        
				'Patientid' =>$patientid,        
				'invoiceno' =>$request->input('invoiceno'),        
				'documenttype' =>$request->input('documenttype'),        
				'hosptalid' =>$request->input('hosptal')
			]);     
			
			
        }
       }	  
		$validator->errors()->add('success', 'Record Save success');
		 return redirect('Uploadreceipt/allreceiptposts')
			 ->withErrors($validator);
	              
   } 
   
   public function addnewsum(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'billdetail' => 'required', 
            'billno' => 'required', 
			'invoiceno'=>'required',                       
			'billamount'=>'required',                       
			'billdate'=>'required|date'                       
			      
        ]);
	  
		
	
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Correct the errors and Proceed');
            return redirect('Uploadreceipt/billsum/'.$request->input('invoiceno').'')
                        ->withErrors($validator)
                        ->withInput();
        } 
		
		 
		$patientid = \Auth::user()->id;
		$name = \Auth::user()->name;
		  
		 $Receipt = new ReceiptModel();		
		 if( $Receipt->Addsum([ 
			'Patientid' =>$patientid,        
			'invoiceno' =>$request->input('invoiceno'),
			'billdetail' =>$request->input('billdetail'),        
			'billamount' =>$request->input('billamount'),
			'billno' =>$request->input('billno'),
			'billdate' =>date('Y-m-d',strtotime($request->input('billdate')))
		]))
		{
		
		 $Receipt-> Addbsum([ 
			'Patientid' =>$patientid,        
			'invoiceno' =>$request->input('invoiceno'),
			'description' =>'Bill Detail for '.$patientid.$request->input('invoiceno'), 
			'billdate' =>date('Y-m-d',strtotime($request->input('billdate'))),
			'createdby' =>$name
		],$request->input('invoiceno'));
         $validator->errors()->add('success', 'Save Success! Add Another Bill Detail');
		 return redirect('Uploadreceipt/billsum/'.$request->input('invoiceno').'')
			 ->withErrors($validator);

        }else{
			
	   
		 $validator->errors()->add('faild', 'Bill Creation failed');
		 return redirect('Uploadreceipt/billsum/'.$request->input('invoiceno').'')
			 ->withErrors($validator);
		}
		         
   } 
	
    
}