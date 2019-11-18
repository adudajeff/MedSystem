@extends('layouts.app')
@section('title', 'Add Appointment Page')
@section('content')
     <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    
						<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Add Appointment </div>
							<div class="tools">
								<a href="javascript:;" class="collapse"> </a>
								<a href="#portlet-config" data-toggle="modal" class="config"> </a>
								<a href="javascript:;" class="reload"> </a>
								<a href="javascript:;" class="remove"> </a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->						  
                                    <form action="/Appointments/addnew"  class="form-horizontal" method="post">
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
                                                    <select class="select2 form-control input-height"  name="PatientId">
													    <option value="{{ old('PatientId') }}">{{ old('PatientId') }}</option>
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
																<input class="form-control input-height" name="Appointmentdate" size="16" placeholder="date of appointment" type="text" value="{{ date('d-m-Y') }}">
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
                                                                    <input name="Start" type="text"  class="form-control timepicker timepicker-default">
															</div>
														</div>
														 <label class="control-label small-label col-md-2">To</label>
														<div class="col-md-5">
															<div class="input-icon">
															        <i class="fa fa-clock-o"></i>
                                                                    <input name="End" type="text" class="form-control timepicker timepicker-default">
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
															 <option value="{{ old('Physician') }}">{{ old('Physician') }}</option>
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
															 <option value="{{ old('hosptal') }}">{{ old('hosptal') }}</option>
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
                                                    <input name="Condition" type="text" placeholder="Injury/Condition" value="fever" class="form-control input-height">
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
															<input name="TherapyStartDate" class="form-control input-height" size="16" placeholder="date of appointment" type="text" value="{{ date('d-m-Y') }}">
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
													<textarea name="Note" class="form-control" placeholder="note" rows="5">nothing</textarea>
													     @if ($errors->has('Note'))
															<span class="help-block ">
																{{ $errors->first('Note') }}
															</span>
														   @endif
												</div>
											</div>
										</div>
								
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info">Add Record</button>
                                                     <a href="/Appointments" class="btn btn-default red" >Appointment List</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>                       
						
						     <!-- END FORM-->
                         </div>
					  </div><!-- Chezea hapa ndani buda-->
					      <!-- END CONTENT BODY -->
			   </div>               
@endsection