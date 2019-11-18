<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class PatientModel extends Model
{
    
	public function Loadpatients()
	{
	    return(DB::table('patient')
		     ->join('country', 'patient.CountryCode', '=', 'country.CountryCode')             
		     ->join('title', 'patient.Title', '=', 'title.TitleCode')             
             ->select('country.*','patient.*','title.*')            
		      ->get());		
	}
	public function loadtitle()
	{
	   return(DB::table('title')->get());	
	}
	public function Addpatients(array $data)
	{
	    
		return(DB::table('patient')->insert($data));
	}
	
	public function LoadCountry()
	{
	    
		return(DB::table('country')->get());
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
						 ->join('country', 'patient.CountryCode', '=', 'country.CountryCode')
						 ->join('title', 'patient.Title', '=', 'title.TitleCode')   
		                 ->where('patient.patientid', $id)
						 ->select('country.*','patient.*','title.*')
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
