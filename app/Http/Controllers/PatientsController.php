<?php

namespace App\Http\Controllers;
use Response;
use App\PatientModel;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PatientsController extends Controller {
	
	public function __construct()
    {
        $this->middleware('auth');		
    }
   public function index()
    {
        $allpatients=new PatientModel();		
		$patients=$allpatients->Loadpatients();
		return view('AllPatients')->with(compact('patients'));
								 
    }
	
    public function loadedits($patientid)
    {
        $patientedit=new PatientModel();
		
		$patients=$patientedit->loadedit($patientid);
		$country=$patientedit->LoadCountry();
		
		return view('editpatients')->with(compact('patients'))
									->with(compact('country'));
    }
	
   public function newpatient() {
	   $Loaddata=new PatientModel();
			$country=$Loaddata->LoadCountry();
              return view('newpatient')->with(compact('country'));
   } 
   
   public function profile() {
              return view('profile');
   }
	
   public function addnew(Request $request) {
	    $this->layout = null;
	    $validator = Validator::make($request->all(), [
            'FirstName' => 'required',            
			'LastName'=>'required',                    
			'Address'=>'required',                 
			'MobileNo'=>'required|numeric',             
			'IMSNO'=>'required',             
			//'InsuranceID'=>'required', 
			'DOB'=>'required|date',                        
			'Age'=>'required|numeric',                        
			//'picture'=>'required',                        
			'Gender'=>'required',                      
			'GroupNo'=>'required',                      
			'OptionNo'=>'required',                      
			'CountryCode'=>'required',                      
			'MaritalStatus'=>'required',          
			'BloodGroup'=>'required',                  
			'BloodPressure'=>'required',                
			'Sugar'=>'required',                       
			'Condition'=>'required',    
			'Email'=>'required|email',       
        ]);
	
		
	
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your fields as indicated in red! and press add button');
            #return redirect('Patients/newpatient')
                        #->withErrors($validator)
                        #->withInput();
						
						//if ($request->ajax()) {
						//     response()->json($validator);
						//}
						 return \Redirect::back()->withErrors($validator)
												 ->withInput();
			//$response = array(
           // 'status' => 'success',
           // 'msg' => 'Setting created successfully',
           // );
         // return Response::json($response);  // <<<<<<<<< see this line
						
        } 
		$name="";
		if($file=$request->file('picture')){
			$file=$request->file('picture');
		
			$name=$file->getClientOriginalName();
			$name=$request->input('FirstName').'_profilepic_'.$name;
			$file->move('image',$name);			
		}	
       
		
	    $patient = new PatientModel();
		
       if ($patient->Addpatients([          
			'FirstName' =>$request->input('FirstName'),        
			'LastName' =>$request->input('LastName'),                   
			'Address' =>$request->input('Address'),               
			'MobileNo' =>$request->input('MobileNo'),            
			'IMSNO' =>$request->input('IMSNO'),            
			//$InsuranceID=$request->input('name'), 
			'DOB' =>date('Y-m-d',strtotime($request->input('DOB'))),                   
			'Age' =>$request->input('Age'),                       
			'Picture'=>$name,                        
			'Gender' =>$request->input('Gender'),                     
			'GroupNo' =>$request->input('GroupNo'),                     
			'OptionNo' =>$request->input('OptionNo'),                     
			'CountryCode' =>$request->input('CountryCode'),                     
			'MaritalStatus' =>$request->input('MaritalStatus'),         
			'BloodGroup' =>$request->input('BloodGroup'),                 
			'BloodPressure' =>$request->input('BloodPressure'),              
			'Sugar' =>$request->input('Sugar'),                     
			'Condition' =>$request->input('Condition'),  
			'Email' =>$request->input('Email')
        ]))
        { 
	        #if ($request->ajax()) {
            #return response()->json();
            #}             
		    return redirect('Patients');	             
       }else{		   
		     $validator->errors()->add('failed', 'Record Save Failed');	         
			    #if ($request->ajax()) {
				 #return response()->json();
				#}
			 return \Redirect::back()
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
			'IMSNO'=>'required',             
			//'InsuranceID'=>'required', 
			'DOB'=>'required|date',                        
			'Age'=>'required|numeric',                        
			//'picture'=>'required',                        
			'GroupNo'=>'required',                      
			'CountryCode'=>'required',                      
			'OptionNo'=>'required',                      
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
			$file->move('image',$name);			
		}		
		
		
	   $patient = new PatientModel();
	   
       if ($patient->Updatepatients([          
			'FirstName' =>$request->input('FirstName'),        
			'LastName' =>$request->input('LastName'),                   
			'Address' =>$request->input('Address'),               
			'MobileNo' =>$request->input('MobileNo'),
			'IMSNO' =>$request->input('IMSNO'),
			'DOB' =>date('Y-m-d',strtotime($request->input('DOB'))),                   
			'Age' =>$request->input('Age'), 
			'Picture'=>$name,
			'Gender' =>$request->input('Gender'),                     
			'GroupNo' =>$request->input('GroupNo'),                     
			'OptionNo' =>$request->input('OptionNo'),                     
			'CountryCode' =>$request->input('CountryCode'),                     
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