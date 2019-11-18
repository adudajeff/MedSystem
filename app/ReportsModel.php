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
             ->select(DB::raw('MAX(patient.PatientId) as PatientId'),DB::raw('MAX(billsum.billdate) as billdate'),DB::raw('MAX(patient.LastName) as LastName'),DB::raw('MAX(patient.FirstName) as FirstName'),DB::raw('MAX(billsum.invoiceno) as invoiceno'),DB::raw('sum(billsum.billamount) as amount'))         
             ->Groupby('billsum.invoiceno')
		      ->get());
	}
	public function loadbillsummaryexpand($invoiceno=null)
	{
	     return(DB::table('billsum')
		     ->join('patient', 'patient.PatientId', '=', 'billsum.PatientId')
             ->select('patient.PatientId','billsum.billdate','billsum.billno','patient.LastName','patient.FirstName','billsum.invoiceno','billsum.Paymentstatus','billsum.billamount')         
             ->where('billsum.invoiceno','=',$invoiceno)
		      ->get());
	}
	public function Loadcovers()
	{
	   return(DB::table('documents')
		      ->join('patient', 'patient.PatientId', '=', 'documents.PatientId')
		      ->join('documenttype', 'documenttype.type', '=', 'documents.documenttype')
		      ->join('billsum', 'billsum.invoiceno', '=', 'documents.invoiceno')
             ->join('hosptal', 'hosptal.hosptalid', '=', 'documents.hosptalid')
             ->join('country', 'patient.CountryCode', '=', 'country.CountryCode')
			 ->where('externalmember','=', 1)
             ->select('billsum.*','documents.*','documenttype.*','hosptal.hosptalname','patient.*','country.*')            
		      ->get());
	}
	public function LoadcoversSSSS()
	{
	     return(DB::table('insurancecover')
		     ->join('cover', 'cover.coverid', '=', 'insurancecover.coverid')
             ->join('patient', 'patient.PatientId', '=', 'insurancecover.PatientId')             
             ->select('insurancecover.*','cover.*','patient.*')            
		      ->get());
	}
	
		
	

}
