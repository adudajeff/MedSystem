<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class AppointmentModel extends Model
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
	public function LoadAppointments()
	{
	     return(DB::table('appointment')
		     ->join('patient', 'patient.PatientId', '=', 'appointment.PatientId')
             ->join('hosptal', 'hosptal.hosptalid', '=', 'appointment.hosptalId')
             ->join('doctor', 'doctor.docid', '=', 'appointment.Physician')
             ->select('hosptal.*','appointment.*','patient.PatientId','hosptal.hosptalname','patient.FirstName', 'patient.LastName','doctor.doctorname')            
		      ->get());
	}
	
	public function LoadSingle($id)
	{
	     return(DB::table('appointment')
		     ->join('patient', 'patient.PatientId', '=', 'appointment.PatientId')
             ->join('hosptal', 'hosptal.hosptalid', '=', 'appointment.hosptalId')
             ->join('doctor', 'doctor.docid', '=', 'appointment.Physician')
             ->where('appointment.AppointmentID', '=', $id)
             ->select('hosptal.*','appointment.*','patient.PatientId','hosptal.hosptalname','patient.FirstName', 'patient.LastName','doctor.docid','doctor.doctorname')            
		      ->get());
	}
	
	public function Addappointments(array $data)
	{
	    
		return(DB::table('appointment')->insert($data));
	}
	
	public function editappointments(array $data,$id)
	{
	    
		return(DB::table('appointment')
		->where('AppointmentID', $id)
		->update($data));
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
