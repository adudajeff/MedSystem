<?php

namespace App\Http\Controllers;

use App\ReceiptModel;
use App\RoleModel;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response ;

class UploadPublicDocs extends Controller
{
 
    public function __construct()
    {
        $this->middleware('guest');
    }
	
	public function Publicuploads()
    {
        
		$allhosptals=new ReceiptModel();
		$hosptals=$allhosptals->Loadhosptals();
		$documenttypes=$allhosptals->documenttype();
		return view('postreceiptpublic')->with(compact('hosptals'))
									->with(compact('documenttypes'));
    }
	
	 public function uploadnew(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'hosptal' => 'required', 
			'invoiceno'=>'required',                       
			'Amount'=>'required',                       
			'Invoicedate'=>'required',                       
			'IMSNO'=>'required',                       
			'documenttype'=>'required',                       
			'files'=>'required'                       
			      
        ]);
	  
		
	
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'No file Selected for download');
           return redirect('Uploadreceipt/docuploads')
                       ->withErrors($validator)
                       ->withInput();
        } 
		
		//GET ID No USING IMSNO
		$getimsno=new ReceiptModel();
		$patientid=$getimsno->loadimsno($request->input('IMSNO'));
		
		if ($patientid !== null) {
		   $patientid=($patientid->PatientId);
        }else{
            $validator->errors()->add('failed', 'Record Upload failed, Your Have entered a wrong IMSNO');
		    return redirect('Uploadreceipt/docuploads')
			 ->withErrors($validator);
        }			
		$name=""; 
		//$patientid = \Auth::user()->id;
		
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
				'Amount' =>str_replace(',','',$request->input('Amount')),
				'Invoicedate' =>date('Y-m-d',strtotime($request->input('Invoicedate'))),
				'documenttype' =>$request->input('documenttype'),        
				'hosptalid' =>$request->input('hosptal')
			]);     
			
			
        }
       }	  
		 $validator->errors()->add('success', 'Record Upload success');
		 return redirect('Uploadreceipt/docuploads')
			 ->withErrors($validator);
	              
   } 

}
