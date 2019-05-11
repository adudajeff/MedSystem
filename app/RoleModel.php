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
	   
	    if (DB::table('user_roles')->where('userid', '=', $id)->exists()) {
				return(DB::table('user_roles')
							 ->where('userid', $id)
							 ->update($data));
		}else{
			    return(DB::table('user_roles')->insert($data));
		}
	}
	
	

}
