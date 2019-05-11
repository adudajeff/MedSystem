<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class ReportsModel  extends Model
{
    

	public function loadbillsummary()
	{
	     return(DB::table('billsum')
		     ->join('patient', 'patient.PatientId', '=', 'billsum.PatientId')
             ->select('patient.PatientId','billsum.billdate','patient.LastName','patient.FirstName','billsum.invoiceno',DB::raw('sum(billsum.billamount) as amount'))         
             ->Groupby('patient.LastName','patient.FirstName','billsum.invoiceno','patient.PatientId','billsum.billdate')
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
	
	
	

}
