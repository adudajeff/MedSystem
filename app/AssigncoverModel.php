<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class AssigncoverModel  extends Model
{
    
	public function Loadpatients()
	{
	    return(DB::table('patient')->get());
	}
	
	public function Loadhosptals()
	{
	    return(DB::table('hosptal')->get());
	}
	
	public function LoadDoctors()
	{
	    return(DB::table('doctor')->get());
	}
	
	public function Loadcovertype()
	{
	    return(DB::table('cover')->get());
	}
	public function LoadAppointments()
	{
	     return(DB::table('appointment')
		     ->join('patient', 'patient.PatientId', '=', 'appointment.PatientId')
             ->join('hosptal', 'hosptal.hosptalid', '=', 'appointment.hosptalId')
             ->join('doctor', 'doctor.docid', '=', 'appointment.Physician')
             ->select('hosptal.*','appointment.*','patient.PatientId','hosptal.hosptalname','patient.FirstName', 'patient.LastName','doctor.doctorname')            
		      ->get());
	}
	public function Loadcovers()
	{
	     return(DB::table('insurancecover')
		     ->join('cover', 'cover.coverid', '=', 'insurancecover.coverid')
             ->join('patient', 'patient.PatientId', '=', 'insurancecover.PatientId')             
             ->select('insurancecover.*','cover.*','patient.*')            
		      ->get());
	}	
	public function singlecover($coverid,$patientid)
	{
	     return(DB::table('insurancecover')
		     ->join('cover', 'cover.coverid', '=', 'insurancecover.coverid')
             ->join('patient', 'patient.PatientId', '=', 'insurancecover.PatientId')             
             ->where('insurancecover.PatientId', '=', $patientid)             
             ->where('insurancecover.coverid', '=', $coverid)             
             ->select('insurancecover.*','cover.*','patient.*')            
		      ->get());
	}
	public function Assigncover(array $data,$coverid,$PatientId)
	{
	     if (DB::table('insurancecover')->where('coverid', '=', $coverid)
										->where('PatientId', '=', $PatientId)
			                                                   ->exists())
			 
	    {
		   
		}else{
			return(DB::table('insurancecover')->insert($data));
		}
		
	}
	public function Editcover(array $data,$coverid,$PatientId)
	{
	     if (DB::table('insurancecover')->where('coverid', '=', $coverid)
										->where('PatientId', '=', $PatientId)
			                                                   ->exists())
															                                
			 
	    {
		     return(DB::table('insurancecover')
										->where('coverid', '=', $coverid)
										->where('PatientId', '=', $PatientId)
										->update($data)
			 ); 
		}else{
			
		}
		
	}
	public function Updatepatients(array $data,$id)
	{
	    return(DB::table('patient')
		                 ->where('PatientId', $id)
		                 ->update($data));
	}
	
	public function loadedit($id)
	{
	    return(DB::table('patient')
		                 ->where('patientid', $id)
		                 ->get());
	}
	
	public function Deleterecord()
	{
	    return(DB::table('patients')->get());
	}
	
	public function search()
	{
	    return(DB::table('patients')->get());
	}

}
