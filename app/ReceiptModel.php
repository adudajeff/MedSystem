<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class ReceiptModel extends Model
{
    
	public function Loadhosptals()
	{
	    return(DB::table('hosptal')->get());
	}
	public function documenttype()
	{
	    return(DB::table('documenttype')->get());
	}
	
	public function Loaddocumets()
	{
	    return(DB::table('documents')
		      ->join('patient', 'patient.PatientId', '=', 'documents.PatientId')
		      ->join('documenttype', 'documenttype.type', '=', 'documents.documenttype')
             ->join('hosptal', 'hosptal.hosptalid', '=', 'documents.hosptalid')
             ->join('country', 'patient.CountryCode', '=', 'country.CountryCode')
             ->select('documents.*','documenttype.*','hosptal.hosptalname','patient.*','country.*')            
		      ->get());
	}
	public function Loaddocumetsedits()
	{
	    return(DB::table('documents')
		      ->join('patient', 'patient.PatientId', '=', 'documents.PatientId')
		      ->join('documenttype', 'documenttype.type', '=', 'documents.documenttype')
             ->join('hosptal', 'hosptal.hosptalid', '=', 'documents.hosptalid')
             ->join('country', 'patient.CountryCode', '=', 'country.CountryCode')
             ->select('documents.*','documenttype.*','hosptal.hosptalname','patient.*','country.*')            
		      ->get());
	}
	
	public function Loadbillings()
	{
	    return(DB::table('documents')
		      ->join('patient', 'patient.PatientId', '=', 'documents.PatientId')
		      ->join('documenttype', 'documenttype.type', '=', 'documents.documenttype')
		      ->join('billsum', 'billsum.invoiceno', '=', 'documents.invoiceno')
             ->join('hosptal', 'hosptal.hosptalid', '=', 'documents.hosptalid')
             ->join('country', 'patient.CountryCode', '=', 'country.CountryCode')
             ->select('billsum.*','documents.*','documenttype.*','hosptal.hosptalname','patient.*','country.*')            
		      ->get());
	}
	
		
	public function Loaddocumetprint($invoiceno)
	{
	    return(DB::table('documents')
		      ->join('patient', 'patient.PatientId', '=', 'documents.PatientId')
		      ->join('documenttype', 'documenttype.type', '=', 'documents.documenttype')
             ->join('hosptal', 'hosptal.hosptalid', '=', 'documents.hosptalid')
             ->where('invoiceno','=', $invoiceno)
             ->select('documents.*','documenttype.*','patient.PatientId','hosptal.hosptalname','patient.FirstName', 'patient.LastName')            
		      ->get());
	}
	
	public function loadbillsum($invoiceno=null)
	{
	    return(DB::table('billsum')		      
		       ->where('invoiceno', '=', $invoiceno)
              ->select('billsum.*')            
		      ->get());
	}
	
	public function loadmbillsum($invoiceno=null)
	{
	    return(DB::table('mbillsum')
               ->join('patient', 'patient.PatientId', '=', 'mbillsum.PatientId')
				->join('country', 'patient.CountryCode', '=', 'country.CountryCode')			   
		       ->where('invoiceno', '=', $invoiceno)
              ->select('mbillsum.*','patient.*','Country.*')            
		      ->get());
	}
	
	public function deletebill($invoiceno=null,$billid=null)
	{
	    return(DB::table('billsum')		       
		       ->where('invoiceno', '=', $invoiceno)                      
		       ->where('id', '=', $billid)                      
		      ->delete());
	}
	
	public function Adddocuments(array $data)
	{
	    
		return(DB::table('documents')->insert($data));
	}
	
	public function Updateinvoice(array $data,$item)
	{
	    
	      return(DB::table('documents')
		                 ->where('docid', $item)
		                 ->update($data));
	}
	
	public function updatepaid(array $data,$item)
	{
	    
	      return(DB::table('billsum')
		                 ->where('billno', $item)
		                 ->update($data));
	}
	
	public function Addsum(array $data)
	{
	    
		return(DB::table('billsum')->insert($data));
	}
	
	public function Addbsum(array $data,$invoiceno=null)
	{
	    if (DB::table('mbillsum')->where('invoiceno', '=', $invoiceno)->exists()) {
		   // user found
		}else{
			return(DB::table('mbillsum')->insert($data));
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
	
	public function loadimsno($imsno)
	{
	    return(DB::table('patient')
		                 ->where('IMSNO', $imsno)
						 ->select('patient.PatientId') 
		                 ->first());
	}	
	public function loadname($invoiceno)
	{
	    return(DB::table('documents')
		     ->join('patient', 'patient.PatientId', '=', 'documents.PatientId')		      
             ->select('patient.*') 
			 ->where('invoiceno',$invoiceno)
		     ->first());
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
