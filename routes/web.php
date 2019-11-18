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
Route::get('/register', array(
  'uses' => 'MainController@showRegister'
));
// route to process the form
Route::post('/login', array(
  'uses' => 'MainController@doLogin'
));
Route::get('/logout', array(
  'uses' => 'HomeController@doLogout'
));

Route::post('password/reset', [
  'as' => 'password.update',
  'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('/password/reset/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

Route::get('/',
function ()
 {
  return view('auth/login');
});
Route::get('Uploadreceipt/docuploads','UploadPublicDocs@Publicuploads')->name('Upload Receipts/Invoices');
Route::post('Uploadreceipt/uploadpub','UploadPublicDocs@uploadnew');

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
Route::get('Appointments/deleterecord/{table}/{field}/{value}','HomeController@deleterecord');
//Staffs/patients

Route::get('/Patients', 'PatientsController@index')->name('All Appointments');
Route::get('Patients/newpatient','PatientsController@newpatient');
Route::post('Patients/addnew','PatientsController@addnew');
Route::get("Patients/loadedits/{patientid}","PatientsController@loadedits");
Route::post('Patients/editpatient','PatientsController@editpatient');
Route::get('Patients/deleterecord/{table}/{field}/{value}','HomeController@deleterecord');

//doctors

Route::get('/Alldoctors', 'DoctorsController@index')->name('All Doctors');
Route::get('Doctors/newdoctor','DoctorsController@newdoctor');
Route::post('Doctors/addnew','DoctorsController@addnew');
Route::get("Doctors/loadedits/{patientid}","DoctorsController@loadedits");
Route::post('Doctors/editdoctor','DoctorsController@editdoctor');
Route::get('Doctors/deleterecord/{table}/{field}/{value}','HomeController@deleterecord');
//all hosptals

Route::get('Hospitals/Allhospital', 'DoctorsController@allhosptal')->name('All Hospital');
Route::get('Hospitals/newhospital','DoctorsController@newhospital');
Route::post('Hospitals/addnewhosp','DoctorsController@addnewhosp');
Route::get("Hospitals/loadedits/{patientid}","DoctorsController@loadhospedits");
Route::post('Hospitals/edithosp','DoctorsController@edithosp');
Route::get('Hospitals/deleterecord/{table}/{field}/{value}','DoctorsController@deleterecord');

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
Route::get('covers/deleterecord/{table}/{field}/{value}','HomeController@deleterecord');
//reconcile Cover
Route::get('reconcile/reconcilebill','ReconcileController@bill');
Route::get('reconcile/reconcilecover','ReconcileController@cover');
Route::get('reconcile/loadreconcile/{coverid}/{patientid}','ReconcileController@loadreconcile');
Route::post('reconcile/reconcileupdate','ReconcileController@reconcileupdate');

//reconcile Bill
Route::get('reconcile/reconcilebill','ReconcileController@bill');
Route::post('/reconcile/updateinvoice','ReconcileController@updateinvoice');

Route::get('reconcile/reconcilesum','ReconcileController@billforreconcile');
Route::get('reconcile/loadbillsummaryexpand/{invoiceno}','ReconcileController@billforreconcileexpand');
Route::post('/reconcile/updatepaid','ReconcileController@updatepaid');

//Reports Routes
Route::get('reports/billsummary','ReportsController@billsummaries');
Route::get('reports/allcovers','ReportsController@allcovers');
Route::get('reports/Allreceiptuploads','ReportsController@Allreceiptuploads');
Route::get('reports/allappointments','ReportsController@allappointments');
Route::get('reports/appointmentsschedule','ReportsController@appointmentsschedule');
Route::get('reports/allpatients','ReportsController@Allpatients');
Route::get('reports/aarlists','ReportsController@aarlist')->name("AAR Lists");
Route::get('reports/imslists','ReportsController@imclist')->name("IMS Claim Lists");
Route::get('reports/imsmlists','ReportsController@imsmlists')->name("IMS Members Lists");

//Roles Routes
Route::get('User/profile/{id}','ProfileController@profile');
Route::post('User/addnew','ProfileController@editprofile');
Route::post('User/updaterights','ProfileController@updaterights');

Route::get('test', function () {
    SMSProvider::sendMessage('0725811554', 'Hallo! hallo Friends');
});

Route::get('User/ajax','ProfileController@ajax');
