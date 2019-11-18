<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class DoctorModel extends Model
{
    
	public function Loaddoctors()
	{
	    return(DB::table('doctor')		
		      
			  ->get());
		
	}
	
	public function Adddoctors(array $data)
	{
	    
		return(DB::table('doctor')->insert($data));
	}
	
	public function Addhosp(array $data)
	{
	    
		return(DB::table('hosptal')->insert($data));
	}
	public function Loadhospital()
	{
	    
		return(DB::table('hosptal')		
		      
			  ->get());
	}
	
	public function Updatedoctors(array $data,$id)
	{
	    return(DB::table('doctor')
		                 ->where('docid', $id)
		                 ->update($data));
	}
	
	public function Updatehospital(array $data,$id)
	{
	    return(DB::table('hosptal')
		                 ->where('hosptalid', $id)
		                 ->update($data));
	}
	
	public function loadedit($id)
	{
	    return(DB::table('doctor')
		                 ->join('hosptal', 'hosptal.hosptalid', '=', 'doctor.hosptalid')
		                 ->where('doctor.docid', $id)
						  ->select('doctor.*','hosptal.*')
		                 ->get());
	}
	
	public function Loadhospitaledit($id)
	{
	    return(DB::table('hosptal')
		                 
		                 ->where('hosptalid', $id)						  
		                 ->get());
	}
	
	public function Deleterecord()
	{
	    return(DB::table('doctor')->get());
	}
	
	public function search()
	{
	    return(DB::table('doctor')->get());
	}

}
