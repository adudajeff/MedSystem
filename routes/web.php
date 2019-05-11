<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', array(
  'uses' => 'MainController@showLogin'
));
// route to process the form
Route::post('/login', array(
  'uses' => 'MainController@doLogin'
));
Route::get('/logout', array(
  'uses' => 'HomeController@doLogout'
));
Route::get('/',
function ()
 {
  return view('auth/login');
});

//Route::get('/home', 'HomeController@index')->name('Medic Home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('Medic Home');

Route::get('home/insert','studInsertController@insertform');
Route::post('home/create','studInsertController@insert');

//Appointments
Route::get('/Appointments', 'AppointmentController@index')->name('All Appointments');

Route::get('Appointments/newappointment','AppointmentController@newappointment');
Route::get('Appointments/editappointment/{appointmentid}','AppointmentController@editappointment');
Route::post('Appointments/addnew','AppointmentController@addnew');
Route::post('Appointments/editrecord','AppointmentController@editrecord');

//Staffs/patients

Route::get('/Patients', 'PatientsController@index')->name('All Appointments');
Route::get('Patients/newpatient','PatientsController@newpatient');
Route::post('Patients/addnew','PatientsController@addnew');
Route::get("Patients/loadedits/{patientid}","PatientsController@loadedits");
Route::post('Patients/editpatient','PatientsController@editpatient');


//doctors

Route::get('/Alldoctors', 'DoctorsController@index')->name('All Appointments');
Route::get('Doctors/newdoctor','DoctorsController@newdoctor');
Route::post('Doctors/addnew','DoctorsController@addnew');
Route::get("Doctors/loadedits/{patientid}","DoctorsController@loadedits");
Route::post('Doctors/editdoctor','DoctorsController@editdoctor');

//upload Receipts

Route::get('Uploadreceipt/newpost','NewreceiptController@index');
Route::post('Uploadreceipt/upload','NewreceiptController@uploadnew');
Route::get('Uploadreceipt/allreceiptposts', 'NewreceiptController@loaddocuments')->name('All Receipt Documents');

//bill  Summary
Route::get('Uploadreceipt/billsum/{invoiceno}','NewreceiptController@createbillsum');
Route::get('Uploadreceipt/deletesum/{invoiceno}/{billid}','NewreceiptController@deletesum');
Route::post('Uploadreceipt/addnewsum','NewreceiptController@addnewsum');
Route::get('Uploadreceipt/printsum/{invoiceno}','NewreceiptController@printsum');


//Assign Cover  
Route::get('covers/assignnewcover','AssigncoverController@assignnewcover');
Route::get('covers/allcovers','AssigncoverController@index');
Route::post('covers/addnew','AssigncoverController@addnew');
Route::post('covers/editcover','AssigncoverController@editcover');
Route::get('covers/loadedits/{coverid}/{patientid}','AssigncoverController@loadedits');

//reconcile Cover
Route::get('reconcile/reconcilebill','ReconcileController@bill');
Route::get('reconcile/reconcilecover','ReconcileController@cover');
Route::get('reconcile/loadreconcile/{coverid}/{patientid}','ReconcileController@loadreconcile');
Route::post('reconcile/reconcileupdate','ReconcileController@reconcileupdate');

//reconcile Bill
Route::get('reconcile/reconcilebill','ReconcileController@bill');
Route::post('/reconcile/updateinvoice','ReconcileController@updateinvoice');

//Reports Routes
Route::get('reports/billsummary','ReportsController@billsummaries');
Route::get('reports/Allcovers','ReportsController@allcovers');
Route::get('reports/Allreceiptuploads','ReportsController@Allreceiptuploads');
Route::get('reports/AllAppointments','ReportsController@Allappointments');
Route::get('reports/allpatients','ReportsController@Allpatients');

//Roles Routes
Route::get('User/profile/{id}','ProfileController@profile');
Route::post('User/addnew','ProfileController@editprofile');
Route::post('User/updaterights','ProfileController@updaterights');

Route::get('User/ajax','ProfileController@ajax');
