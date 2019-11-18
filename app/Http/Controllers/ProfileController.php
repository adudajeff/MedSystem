<?php

namespace App\Http\Controllers;
use App\PatientModel;
use App\RoleModel;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller {
	
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
 
   
   public function profile($id=null) {
	         if ($id==null)
             {				 
	         $id=\Auth::user()->id;
			 }
		     
			 $Lprofile=new RoleModel;
			 $profile=$Lprofile->Loadprofile($id);
			 //dd($profile);
			 $appointment=$Lprofile->Loadappointments($id);
			 $roles=$Lprofile->Loaduserroles($id);
			 
             return view('profile')->with(compact('profile'))
			                           ->with(compact('appointment'))
			                           ->with(compact('roles'));
   }
	
   public function editprofile(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'FirstName' => 'required',            
			'LastName'=>'required',                    
			'Address'=>'required',                 
			'Patientid'=>'required',                 
			'MobileNo'=>'required|numeric', 
			'Email'=>'required|email',       
        ]);
		

		
	
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your fields as indicated in red! and press add button');
            return redirect('User/profile')
                        ->withErrors($validator)
                        ->withInput();
        } 
		
	    $patient = new PatientModel();
		
       if ($patient->Updatepatients([          
			'FirstName' =>$request->input('FirstName'),        
			'LastName' =>$request->input('LastName'),                   
			'Address' =>$request->input('Address'),
			'MobileNo' =>$request->input('MobileNo'), 
			'Email' =>$request->input('Email')
        ],$request->input('Patientid')))
        { 
	        $validator->errors()->add('failed', 'Record Save Success');
		    return redirect('User/profile/'.$request->input('Patientid').'')->withErrors($validator);
	             
       }else{
		   
		    $validator->errors()->add('failed', 'No change was Detected');
	         return redirect('User/profile/'.$request->input('Patientid').'')
	             ->withErrors($validator);
	   }               
   }
   
   public function updaterights(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'Patientidr' => 'required',            
            'optPatient' => 'required|in:1,0',            
			'optDoctor'=>'required|in:1,0',                    
			'optAppointment'=>'required|in:1,0',                 
			'optBilling'=>'required|in:1,0',                 
			'optCover'=>'required|in:1,0', 
			'optInvoivce'=>'required|in:1,0',       
			'optReconciliations'=>'required|in:1,0',       
        ]);
		
			
        if ($validator->fails()) {
			$validator->errors()->add('failedr', 'Complete Your fields as indicated in red! and press add Save Record');
            return redirect('User/profile/'.$request->input('Patientidr').'')
                        ->withErrors($validator)
                        ->withInput();
        } 
		
	    $role = new RoleModel();
		
       if ($role->Updaterights([          
			'id' =>$request->input('Patientidr'),        
			'patients' =>$request->input('optPatient'),        
			'doctors' =>$request->input('optDoctor'),                   
			'appointments' =>$request->input('optAppointment'),
			'billing' =>$request->input('optBilling'), 
			'covermanagement' =>$request->input('optCover'),
			'documents' =>$request->input('optInvoivce'),
			'reconciliation' =>$request->input('optReconciliations'),
			'reports' =>$request->input('optreports'),
			'settings' =>$request->input('optsettings')
        ],$request->input('Patientidr')))
        { 
	        $validator->errors()->add('successr', 'Record Save Success');
		    return redirect('User/profile/'.$request->input('Patientidr').'')->withErrors($validator);
	             
       }else{
		   
		    $validator->errors()->add('failedr', 'No change was Detected');
	         return redirect('User/profile/'.$request->input('Patientidr').'')
	             ->withErrors($validator);
	   }               
   } 
    public function ajax(){
		return view('testajax');
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
			'IMSNO' =>$request->input('IMSNO'),
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