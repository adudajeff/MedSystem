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
								->take(200)
						           ->count());
	}
	public function appointmentscounts()
	{
	    return(DB::table('appointment')->get()
									->take(200)
						           ->count());
	}
	public function mbilsumcount()
	{
	    return(DB::table('mbillsum')->get()
									->take(200)
						           ->count());
	}
	
	public function patientcount()
	{
	    return(DB::table('patient')->get()
		                           ->take(200)
						           ->count());
	}
	
	public function reminder()
	{
	    return(DB::table('notifications')
		        ->where('type', 'Reminder')
				->select('notifications.*')
				->take(10)
				->get());
	}
	public function remindercount()
	{
	    return(DB::table('notifications')
		        ->where('type', 'Reminder')
				->select('notifications.*')
				->get()
				->take(10)
				->count());
	}
	
	public function notification()
	{
	    return(DB::table('notifications')
		        ->where('type', 'Notific')
				->select('notifications.*')
				->take(10)
				->get());
	}
	public function notificationcount()
	{
	    return(DB::table('notifications')
		        ->where('type', 'Notific')
				->select('notifications.*')
				->get()
				->take(10)
				->count());
	}
	
	public function deleterecord($table=null,$field=null,$value=null)
	{
	    return(DB::table($table)		       
		       ->where($field, '=', $value) 
		      ->delete());
	}

}
