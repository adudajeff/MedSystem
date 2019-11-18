<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    
	
	public function Loadprofile($id)
	{
	    return(DB::table('patient')
		                  ->join('country', 'patient.CountryCode', '=', 'country.CountryCode')
                          ->select('patient.*','country.*')
		                 ->where('patient.patientid', $id)
		                 ->get());
	}
	public function Loadappointments($id)
	{
	    return(DB::table('appointment')
		                  ->join('patient', 'patient.PatientId', '=', 'appointment.PatientId')
						  ->join('hosptal', 'hosptal.hosptalid', '=', 'appointment.hosptalid')
                          ->select('patient.*','appointment.*','hosptal.*')
		                 ->where('patient.patientid', $id)
		                 ->get());
	}
	public function Loaduserroles($id)
	{
	    return(DB::table('patient')
		                  ->join('users', 'patient.PatientId', '=', 'users.id')						 
                          ->select('patient.*','users.*')
		                 ->where('users.id', $id)
		                 ->get());
	}	
	public function Loadusers($id)
	{
	    return(DB::table('patient')
		                  ->join('users', 'patient.PatientId', '=', 'users.id')						 
                          ->select('patient.*','users.*')
		                 ->where('users.documents', 1)
		                 ->where('users.id', $id)
		                 ->where('users.appointments', 1)
		                 ->get());
	}
	
	public function Loadusersadmin()
	{
	    return(DB::table('patient')
		                  ->join('users', 'patient.PatientId', '=', 'users.id')						 
                          ->select('patient.*','users.*')
		                 ->where('users.documents', 1)		                
		                 ->where('users.appointments', 1)
		                 ->get());
	}
	public function Loadroles($id)
	{
	    return(DB::table('patient')
		                  ->join('user_roles', 'patient.PatientId', '=', 'user_roles.userid')						 
                          ->select('patient.*','user_roles.*')
		                 ->where('user_roles.userid', $id)		                
		                 ->get());
						 
	}
	public function Updatepatients(array $data,$id)
	{
	    return(DB::table('patient')
		                 ->where('PatientId', $id)
		                 ->update($data));
	}
	
	public function Updaterights(array $data,$id)
	{
	   
	    if (DB::table('users')->where('id', '=', $id)->exists()) {
				return(DB::table('users')
							 ->where('users.id', $id)
							 ->update($data));
		}else{
			    return(DB::table('users')->insert($data));
		}
	}
	
	

}
