<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudInsertController extends Controller {
	
	public function __construct()
    {
        $this->middleware('auth');
    }
   public function index()
    {
        return view('home');
    }
	public function insertform() {
      return view('stud_create');
   }
	
   public function insert(Request $request) {
	   
	    $validator = Validator::make($request->all(), [
            'name' => 'required',
            'dob' => 'required|date',
            'age' => 'required|numeric',
            'email' => 'required|email',
        ]);
		
	
        if ($validator->fails()) {
			$validator->errors()->add('failed', 'Complete Your Fields as indicated in Red! and Press Add Button Again');
            return redirect('home/insert')
                        ->withErrors($validator)
                        ->withInput();
        } 
	    
	   
	   
      $name = $request->input('name');
      $dob = $request->input('dob');
      $age = $request->input('age');
      DB::insert('insert into student (name,dob,age) values(?,?,?)',[$name,$dob,$age]);
	  
      $validator->errors()->add('success', 'Record Add Success New');
            //return redirect('home/insert')
                        //->withErrors($validator)
                       // ->withInput();
      return redirect('home/insert')
	             ->withErrors($validator);
                        
   }
}