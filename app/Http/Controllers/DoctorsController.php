<?php

namespace App\Http\Controllers;
use App\DoctorModel;
use App\ReceiptModel;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class DoctorsController extends Controller {
	
	public function __construct()
    {
        $this->middleware('auth');
    }
   public function index()
    {
        $alldoctors=new DoctorModel();
		$doctors=$alldoctors->Loaddoctors();
		
		return view('Alldoctors')->with(compact('doctors'));
    }
	
    public function loadedits($id)
    {
         $doctoredit=new DoctorModel();
		 $allhosptals=new ReceiptModel();
		 
		 
		$hosptals=$allhosptals->Loadhosptals();
		$doctors=$doctoredit->loadedit($id);
		
		return view('editdoctor')->with(compact('doctors'))
								->with(compact('hosptals'));
    }
	
   public function newdoctor() {
	         $allhosptals=new ReceiptModel();
		     $hosptals=$allhosptals->Loadhosptals();
              return view('newdoctor')
			  ->with(compact('hosptals'));
   }
	
   public function addnew(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'doctorname' => 'required',            
			'email'=>'required|email',
			'mobile'=>'required|numeric',
			'hosptal'=>'required',
        ]);
		

		
	
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your fields as indicated in red! and press add button');
            return redirect('Doctors/newdoctor')
                        ->withErrors($validator)
                        ->withInput();
        } 
		     
		
	    $doctor = new DoctorModel();
		
       if ($doctor->Adddoctors([          
			'doctorname' =>$request->input('doctorname'),
			'mobile' =>$request->input('mobile'),
			'email' =>$request->input('email'),
			'hosptalid' =>$request->input('hosptal')
        ]))
        { 
	     
		    return redirect('Alldoctors');
	             
       }else{
		   
		    $validator->errors()->add('failed', 'Record Save Failed');
	         return redirect('Doctors/newdoctor')
	             ->withErrors($validator);
	   }               
   } 
   
   public function editpatient(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'PatientId' => 'required',            
            'FirstName' => 'required',            
			'LastName'=>'required',                    
			'Address'=>'required',                 
			'MobileNo'=>'required|numeric',             
			//'InsuranceID'=>'required', 
			'DOB'=>'required|date',                        
			'Age'=>'required|numeric',                        
			'picture'=>'required',                        
			'Gender'=>'required',                      
			'MaritalStatus'=>'required',          
			'BloodGroup'=>'required',                  
			'BloodPressure'=>'required',                
			'Sugar'=>'required',                       
			'Condition'=>'required',    
			'Email'=>'required|email',       
        ]);
		
       
		
	    $patientid=$request->input('PatientId');
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your fields as indicated in red! and press add button');
            return redirect('Patients/loadedits/'.$patientid.'')
                        ->withErrors($validator)
                        ->withInput();
        } 
		
		
		$name="";
		if($file=$request->file('picture')){
			$file=$request->file('picture');
		
			$name=$file->getClientOriginalName();
			$name=$request->input('FirstName').'_profilepic_'.$name;
			$file->move('image',$request->input('FirstName').'_profilepic_'.$name);			
		}		
			
		
	   $patient = new PatientModel();
	   
       if ($patient->Updatepatients([          
			'FirstName' =>$request->input('FirstName'),        
			'LastName' =>$request->input('LastName'),                   
			'Address' =>$request->input('Address'),               
			'MobileNo' =>$request->input('MobileNo'),
			'DOB' =>date('Y-m-d',strtotime($request->input('DOB'))),                   
			'Age' =>$request->input('Age'),             				
			'Picture'=>$name,           	
			'Gender' =>$request->input('Gender'),                     
			'MaritalStatus' =>$request->input('MaritalStatus'),         
			'BloodGroup' =>$request->input('BloodGroup'),                 
			'BloodPressure' =>$request->input('BloodPressure'),              
			'Sugar' =>$request->input('Sugar'),                     
			'Condition' =>$request->input('Condition'),  
			'Email' =>$request->input('Email')
        ],$patientid))
        { 
	     
		    return redirect('Patients');
	             
       }else{
		   
		    $validator->errors()->add('failed', 'Record Save Failed');
	         return redirect('Patients/loadedits/'.$patientid.'')
	             ->withErrors($validator);
	   }               
   }
}