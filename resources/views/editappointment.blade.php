@extends('layouts.app')
@section('title', 'Edit Appointment')
@section('content')
     <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    
						<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Edit Appointment </div>
							<div class="tools">
								<a href="javascript:;" class="collapse"> </a>
								<a href="#portlet-config" data-toggle="modal" class="config"> </a>
								<a href="javascript:;" class="reload"> </a>
								<a href="javascript:;" class="remove"> </a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
						           @foreach($appointments as $appointment)
                                    <form action="/Appointments/editrecord"  class="form-horizontal" method="post">                                         
										<div class="form-body">
										 <div class="form-group row">
											 <label class="control-label col-md-0">
											 </label>
											 <div class="col-md-12">
												   @if ($errors->has('failed'))
													<div class="alert alert-danger">
														{{ $errors->first('failed') }}
													</div>
												   @endif
												   @if ($errors->has('success'))
													<div class="alert alert-success">
														{{ $errors->first('success') }}
													</div>
												   @endif
											 </div>
										 </div>
                                        	<div class="form-group {{ $errors->has('PatientId') ? ' has-error' : '' }} ">
                                                <label class="control-label col-md-3">Select IMC member
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
												    <input type="hidden" name="_token" value="{{ csrf_token() }}">
												    <input type="hidden" name="AppointmentID" value="{{ $appointment->AppointmentID }}">
                                                    <select readonly class="form-control input-height"  name="PatientId">
													       <option value="{{ $appointment->PatientId }}">{{ $appointment->FirstName.' '.$appointment->LastName }}</option>
                                                        @foreach($patients as $key)
														   <option value="{{ $key->PatientId }}">{{ $key->FirstName.' '.$key->LastName }}</option>
														@endforeach
                                                    </select>
													      @if ($errors->has('PatientId'))
															<span class="help-block ">
																{{ $errors->first('PatientId') }}
															</span>
														   @endif
                                                </div>
                                            </div>
											
                                            <div class="form-group {{ $errors->has('Appointmentdate') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Date Of Appointment
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
													   <div class="input-group input-medium date date-picker" data-date="{{ date('d-m-Y') }}" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
																<input class="form-control input-height" name="Appointmentdate" size="16" placeholder="date of appointment" type="text" value="{{ $appointment->Appointmentdate }}">
																<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
														</div>
                                                        <input type="hidden" id="dtp_input2" value="">
														 @if ($errors->has('Appointmentdate'))
															<span class="help-block ">
																{{ $errors->first('Appointmentdate') }}
															</span>
														   @endif
                                                </div>
                                            </div>
										   <div class="form-group ">
												<label class="control-label col-md-3">From</label>
												<div class="col-md-5">
													<div class="row">
														<div class="col-md-5">
															<div class="input-icon">
															        <i class="fa fa-clock-o"></i>
                                                                    <input name="Start" type="text"  class="form-control timepicker timepicker-default" value="{{ $appointment->Start }}">
															</div>
														</div>
														 <label class="control-label small-label col-md-2">To</label>
														<div class="col-md-5">
															<div class="input-icon">
															        <i class="fa fa-clock-o"></i>
                                                                    <input name="End" type="text" class="form-control timepicker timepicker-default" value="{{ $appointment->End }}">
															</div>
														</div>
													</div>
												</div>
											</div>
                                           
                                             <div class="form-group row {{ $errors->has('Physician') ? ' has-error' : '' }}">
													<label class="control-label col-md-3">Consulting Doctor 
														<span class="required" aria-required="true"> * </span>
													</label>
													<div class="col-md-5">
														<select class="form-control input-height" name="Physician">
															 <option selected value="{{ $appointment->docid }}">{{ $appointment->doctorname }}</option>
															@foreach($doctors as $key)
															   <option value="{{ $key->docid }}">{{ $key->doctorname }}</option>
															@endforeach
														</select>
														   @if ($errors->has('Physician'))
															<span class="help-block ">
																{{ $errors->first('Physician') }}
															</span>
														   @endif
													</div>
										    </div>
											
											<div class="form-group row {{ $errors->has('hosptal') ? ' has-error' : '' }}">
													<label class="control-label col-md-3">Hosptal 
														<span class="required" aria-required="true"> * </span>
													</label>
													<div class="col-md-5">
														<select class="form-control input-height" name="hosptal">
															 <option value="{{ $appointment->hosptalid }}">{{ $appointment->hosptalname }}</option>
															@foreach($hosptals as $key)
															   <option value="{{ $key->hosptalid }}">{{ $key->hosptalname }}</option>
															@endforeach
														</select>
														   @if ($errors->has('hosptal'))
															<span class="help-block ">
																{{ $errors->first('hosptal') }}
															</span>
														   @endif
													</div>
										    </div>
										    <div class="form-group {{ $errors->has('Condition') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Injury/Condition
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="Condition" type="text" placeholder="Injury/Condition" value="fever" class="form-control input-height" value="{{ $appointment->Condition }}">
                                                          @if ($errors->has('Condition'))
															<span class="help-block ">
																{{ $errors->first('Condition') }}
															</span>
														   @endif
												</div>
												
                                            </div>
                                            <div class="form-group {{ $errors->has('TherapyStartDate') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Therapy Started Date(IF ANY)
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group input-medium date date-picker" data-date="{{ date('d-m-Y') }}" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
															<input name="TherapyStartDate" class="form-control input-height" size="16" placeholder="date of appointment" type="text" value="{{ date('d-m-Y',strtotime($appointment->Condition) ) }}">
															<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                    </div>
                                                      <input type="hidden" id="dtp_input3" value="">
													      @if ($errors->has('TherapyStartDate'))
															<span class="help-block ">
																{{ $errors->first('TherapyStartDate') }}
															</span>
														   @endif
                                                </div>
                                            </div>
											<div class="form-group {{ $errors->has('Note') ? ' has-error' : '' }}">
												<label class="control-label col-md-3">Note 
												</label>
												<div class="col-md-5">
													<textarea name="Note" class="form-control" placeholder="note" rows="5">{{ $appointment->Note }}</textarea>
													     @if ($errors->has('Note'))
															<span class="help-block ">
																{{ $errors->first('Note') }}
															</span>
														   @endif
												</div>
											</div>
											 <div class="form-group {{ $errors->has('Postponementdate') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Postponement Date
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group input-medium date date-picker" data-date="{{ date('d-m-Y') }}" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
															<input name="Postponementdate" class="form-control input-height" size="16" placeholder="date of appointment" type="text" value="{{ date('d-m-Y',strtotime($appointment->Postponementdate) ) }}">
															<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                                    </div>
                                                      <input type="hidden" id="dtp_input3" value="">
													      @if ($errors->has('Postponementdate'))
															<span class="help-block ">
																{{ $errors->first('Postponementdate') }}
															</span>
														   @endif
                                                </div>
                                            </div>
											<div class="form-group {{ $errors->has('postponementreason') ? ' has-error' : '' }}">
												<label class="control-label col-md-3">Postponement Reason 
												</label>
												<div class="col-md-5">
													<textarea name="postponementreason" class="form-control" placeholder="Postponement Reason" rows="5">{{ $appointment->postponementreason }}</textarea>
													     @if ($errors->has('postponementreason'))
															<span class="help-block ">
																{{ $errors->first('postponementreason') }}
															</span>
														   @endif
												</div>
											</div>
											 <div class="form-group row {{ $errors->has('status') ? ' has-error' : '' }}">
												<label class="control-label col-md-3">Select status
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="col-md-5">
													<select class="form-control input-height"  name="status">
														 <option selected value="{{ $appointment->status  }}">{{ $appointment->status }}</option>
														
														   <option value="CLOSED">CLOSED</option>
														   <option value="OPEN">OPEN</option>
														   <option value="SUSPENDED">SUSPENDED</option>
														
													</select>
													   @if ($errors->has('status'))
														<span class="help-block ">
															{{ $errors->first('status') }}
														</span>
													   @endif
												</div>
											 </div> 
										</div>
									
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info">Edit Record</button>
                                                    <a href="/Appointments" class="btn btn-default red" >Appointment List</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>                       
						       @endforeach
						     <!-- END FORM-->
                         </div>
					  </div><!-- Chezea hapa ndani buda-->
					      <!-- END CONTENT BODY -->
			   </div>               
@endsection