			@extends('layouts.app')
			@section('title', 'All Appointments')
            @section('content')	

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">                 
							
							<div class="row">
								<div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">All Appointments</span>
									                                                          
                                        <a href="/Appointments/newappointment"> <label class="btn btn-transparent blue btn-outline btn-circle btn-sm active"><i class="fa fa-plus"></i>Add Record </label>  </a>             
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
								    </form>
									<meta name="csrf-token" content="{{ csrf_token() }}">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                         <thead>
                                            <tr>
                                                <th class="all">No</th>
                                                <th class="min-phone-l">First Name</th> 
												<th class="all">Doctor Name</th>												
                                                <th class="all">Hosptal</th>                                               
                                                <th class="all">App. Date</th>                                               
                                                <th class="all">Start</th>                                               
                                                <th class="all">End</th>                      
                                                <th class="all">Status</th>                      
                                                <th class="all">PostPoned</th>                      
                                                <th class="none">Therapy Start Date</th>                      
                                                <th class="none">Condition/Therapy</th>                      
                                                <th class="none">Note</th>                      
                                                <th class="none">Postponement Date</th>                      
                                                <th class="none">Postponement Reason</th>                      
                                                <th class="all">Edit</th>
                                                <th class="all">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										    @foreach($appointments as $appointment)
                                            <tr>
                                                <td>{{ $appointment->PatientId }}</td>
                                                <td>{{ $appointment->FirstName.' '.$appointment->LastName }}</td>                                                                                              
                                                <td>{{ $appointment->doctorname }}</td>                                                
                                                <td>{{ $appointment->hosptalname }}</td>                                                
                                                <td>{{ $appointment->Appointmentdate }}</td>                                                
                                                <td>{{ $appointment->Start }}</td>                                                
                                                <td>{{ $appointment->End }}</td>                                                
                                                <td>@if ($appointment->status=='OPEN') <span class="label label-success"> {{ $appointment->status }}</span> @else <span class="label label-warning"> {{ $appointment->status }}</span> @endif</td>                                                
                                                <td>@if ($appointment->postponed=='Y') <span class="label label-success"> {{ "YES" }}</span> @else <span class="label label-warning"> {{ "NO" }}</span> @endif</td>                                                
                                                <td>{{ $appointment->TherapyStartDate }}</td>                                                
                                                <td>{{ $appointment->Condition }}</td>                                                
                                                <td>{{ $appointment->Note }}</td> 
												<td>{{ $appointment->Postponementdate }}</td>     
												<td>{{ $appointment->postponementreason }}</td>     
                                                <td><a  href="{{ url('Appointments/editappointment/' . $appointment->AppointmentID )}}" ><i class="fa fa-pencil m-r-5"></i> Edit</a></td>
                                                <td><a  href="#" onclick="deleterecord('{{ url('Appointments/deleterecord/appointment/AppointmentID/'.$appointment->AppointmentID )}}')" class="delete" ><i class="fa fa-trash-o"></i> Delete</a></td>
											
                                            </tr>
											 @endforeach
                                           <tfoot
                                            <tr>
                                                <th class="all">No</th>
                                                <th class="min-phone-l">First Name</th>                                               
												<th class="all">Doctor Name</th>												
                                                <th class="min-tablet">Hosptal Name</th>                                                
                                                <th class="min-tablet">App. Date</th>                                                
                                                <th class="min-tablet">Start</th>                                                
                                                <th class="min-tablet">End</th>
                                                <th class="min-tablet">status</th>
                                                <th class="min-tablet">PostPoned</th>
												<th class="all">Therapy Start Date</th> 
												<th class="none">Condition/Therapy</th> 												
												<th class="none">Note</th> 	
												<th class="none">Postponement Date</th>                      
                                                <th class="none">Postponement Reason</th> 
                                                <th class="none">edit</th>
                                                <th class="none">delete</th>
                                            </tr>
                                        </tfoot>
                                        </tbody>
                                    </table>
									</form>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
					</div><!-- Chezea hapa ndani buda-->
					      <!-- END CONTENT BODY -->
			   </div> 
		@endsection