			@extends('layouts.app')
			@section('title', 'All Patients')
            @section('content')
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content"> 
							<div class="row">
								<div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">All Patients/Staffs</span>
									                                                          
                                        <a href="/Patients/newpatient"> <label class="btn btn-transparent green btn-outline btn-circle btn-sm active"><i class="fa fa-plus"></i>Add Record </label>  </a>             
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                         <thead>
                                            <tr>
                                                <th class="all">No</th>												                                               
                                                <th class="min-phone-l">First Name</th>
                                                <th class="min-tablet">Last Name</th>
                                                <th class="all">Address</th>
                                                <th class="all">MobileNo</th>
                                                <th class="none">Gender</th>
                                                <th class="desktop">Email</th>
                                                <th class="none">DOB.</th>
                                                <th class="all">Edit</th>
                                                <th class="all">Profile</th>
                                                <th class="all">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										    @foreach($patients as $patient)
                                            <tr>
                                                <td>{{ $patient->PatientId }}</td>
												<!--<td > <img class="img-circle" alt="" width="10%" height="10%" src="{{ asset('image/'.$patient->Picture ) }}" />	</td>-->                                                												
                                                <td>{{ $patient->FirstName }}</td>
                                                <td>{{ $patient->LastName }}</td>
                                                <td>{{ $patient->Address }}</td>
                                                <td>{{ $patient->MobileNo }}</td>
                                                <td>{{ $patient->Gender }}</td>
                                                <td>{{ $patient->Email }}</td>
                                                <td>{{ $patient->DOB }}</td>
                                                <td><a  href="{{ url('Patients/loadedits/' . $patient->PatientId )}}" ><i class="fa fa-pencil green m-r-5"></i> Edit</a></td>
                                                <td><a  href="{{ url('User/profile/' . $patient->PatientId )}}" ><i class="fa fa-eye m-r-5 green"></i> View</a></td>
                                                <td><a  href="#"  ><i class="fa fa-trash-o"></i> Delete</a></td>
											
                                            </tr>
											 @endforeach
                                           <tfoot
                                            <tr>
                                                <th class="all">No</th>												                                             
                                                <th class="min-phone-l">First Name</th>
                                                <th class="min-tablet">Last Name</th>
                                                <th class="all">Address</th>
                                                <th class="all">MobileNo</th>
                                                <th class="none">Gender</th>
                                                <th class="desktop">Email</th>
                                                <th class="none">DOB.</th>
                                                <th class="all">Edit</th>
                                                <th class="all">Profile</th>
                                                <th class="all">Delete</th>
                                            </tr>
                                        </tfoot>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
					</div><!-- Chezea hapa ndani buda-->
					      <!-- END CONTENT BODY -->
			   </div> 
		@endsection