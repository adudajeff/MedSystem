<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Globalmodel extends Model
{
    
	public function loaddata()
	{
	    return(DB::table('student')->get());
	}
	public function documentscounts()
	{
	    return(DB::table('documents')->get()
						           ->count());
	}
	public function appointmentscounts()
	{
	    return(DB::table('appointment')->get()
						           ->count());
	}
	public function mbilsumcount()
	{
	    return(DB::table('mbillsum')->get()
						           ->count());
	}
	
	public function patientcount()
	{
	    return(DB::table('patient')->get()
						           ->count());
	}

}
