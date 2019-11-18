<?php

namespace App\Http\Controllers;
use App\Globalmodel;
use App\DoctorModel;
use App\ReceiptModel;
use App\RoleModel;
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
	
	 public function allhosptal()
    {
        $alldoctors=new DoctorModel();
		$doctors=$alldoctors->Loaddoctors();
		$hospital=$alldoctors->Loadhospital();
		
		return view('Allhosptal')->with(compact('hospital'));
    }
	
	public function newhospital() {
	        
              return view('newhospital');
			
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
	
	public function loadhospedits($id)
    {
         $alldoctors=new DoctorModel();
		$doctors=$alldoctors->Loaddoctors();
		$hospital=$alldoctors->Loadhospitaledit($id);
		
		
		return view('edithospital')->with(compact('hospital'));
								
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
   
   public function editdoctor(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'doctorname' => 'required',            
			'email'=>'required|email',
			'mobile'=>'required',
			'hosptal'=>'required',
			'id'=>'required',
        ]);
		

		
	
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your fields as indicated in red! and press add button');
            return redirect('Doctors/newdoctor')
                        ->withErrors($validator)
                        ->withInput();
        } 
		     
		
	    $doctor = new DoctorModel();
		
       if ($doctor->Updatedoctors([          
			'doctorname' =>$request->input('doctorname'),
			'mobile' =>$request->input('mobile'),
			'email' =>$request->input('email'),
			'hosptalid' =>$request->input('hosptal')
        ],$request->input('id')))
        { 
	     
		    return redirect('Alldoctors');
	             
       }else{
		   
		    $validator->errors()->add('failed', 'Record Save Failed');
	         return redirect('Doctors/newdoctor')
	             ->withErrors($validator);
	   }               
   }
   
   public function addnewhosp(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'hospitalname' => 'required',            
			'email'=>'required|email',
			'mobile'=>'required|numeric',		
        ]);
		

		
	
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your fields as indicated in red! and press add button');
            return redirect('Hospitals/newhospital')
                        ->withErrors($validator)
                        ->withInput();
        } 
		     
		
	    $doctor = new DoctorModel();
		
       if ($doctor->Addhosp([          
			'hosptalname' =>$request->input('hospitalname'),
			'mobile' =>$request->input('mobile'),
			'email' =>$request->input('email')
			
        ]))
        { 
	     
		    return redirect('Hospitals/Allhospital');
	             
       }else{
		   
		    $validator->errors()->add('failed', 'Record Save Failed');
	         return redirect('Hospitals/newhospital')
	             ->withErrors($validator);
	   }               
   } 
   
   public function edithosp(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'id' => 'required',            
            'hospitalname' => 'required',            
			'email'=>'required|email',
			'mobile'=>'required|numeric',		
        ]);
		

		
	
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your fields as indicated in red! and press add button');
            return redirect('Hospitals/loadedits/'.$request->input('id').'')
                        ->withErrors($validator)
                        ->withInput();
        } 
		     
		
	    $doctor = new DoctorModel();
		
       if ($doctor->Updatehospital([          
			'hosptalname' =>$request->input('hospitalname'),
			'mobile' =>$request->input('mobile'),
			'email' =>$request->input('email')
			
        ],$request->input('id')))
        { 
	     
		    return redirect('Hospitals/Allhospital');
	             
       }else{
		   
		    $validator->errors()->add('failed', 'Record Save Failed');
	         return redirect('Hospitals/loadedits/'.$request->input('id').'')
	             ->withErrors($validator);
	   }               
   }

   public function deleterecord($table=null,$field=null,$value=null)
   {
	    
	    $delete = new Globalmodel();
		
		if ($delete->deleterecord($table,$field,$value))
		{
				
			return response()->json([
			'success' => 'Record Deleted Successfully!'
			]);
		}else{
			return response()->json([
			'error' => 'Record Deletion Failed!'
			]);
			//return \Redirect::back();			
		}
		
	    
   }	   
   
  
}

