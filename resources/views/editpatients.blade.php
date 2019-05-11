@extends('layouts.app')
@section('content')

     <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    
						<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Patient/Staff Basic Information </div>
							<div class="tools">
								<a href="javascript:;" class="collapse"> </a>
								<a href="#portlet-config" data-toggle="modal" class="config"> </a>
								<a href="javascript:;" class="reload"> </a>
								<a href="javascript:;" class="remove"> </a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
						       @foreach($patients as $patient)
                                <form action="/Patients/editpatient" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
										     <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
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
										   <div class="form-group row {{ $errors->has('FirstName') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Surname
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="FirstName" value="{{ $patient->FirstName }}" data-required="1" placeholder="enter Surname " class="form-control input-height" > 
                                                    <input type="hidden" name="PatientId" value="{{ $patient->PatientId }}" data-required="1" placeholder="patientid" class="form-control input-height" > 
													        @if ($errors->has('FirstName'))
															<span class="help-block help-block-error">
																{{ $errors->first('FirstName') }}
															</span>
														     @endif
													</div>
                                                           
											  </div>
                                              <div class="form-group row {{ $errors->has('LastName') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Other Names
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                    <div class="col-md-5">
                                                    <input type="text" name="LastName" data-required="1" placeholder="enter Other Names" class="form-control input-height" value="{{ $patient->LastName }}"> 
													        @if ($errors->has('LastName'))
															<span class="help-block ">
																{{ $errors->first('LastName') }}
															</span>
														     @endif
											        </div>                                                            
											 </div>
											  <div class="form-group row {{ $errors->has('CountryCode') ? ' has-error' : '' }}">
													<label class="control-label col-md-3">Select Country 
														<span class="required" aria-required="true"> * </span>
													</label>
													<div class="col-md-5">
														<select class="form-control input-height" name="CountryCode">
															<option value="{{ $patient->CountryCode }}">{{ $patient->Country }}</option>
															@foreach($country as $key)
															   <option value="{{ $key->CountryCode }}">{{ $key->Country }}</option>
															@endforeach
														</select>
														   @if ($errors->has('CountryCode'))
															<span class="help-block ">
																{{ $errors->first('CountryCode') }}
															</span>
														   @endif
													</div>
										    </div>
                                            <div class="form-group row {{ $errors->has('DOB') ? ' has-error' : '' }} ">
                                                <label class="control-label col-md-3">Date Of Birth
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                     <div class="input-group input-medium date date-picker " data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
																<input name="DOB" class="form-control input-height" size="16" placeholder="date of appointment" type="text" value="{{ $patient->DOB }}">
																<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
																												        
													</div>
													    	    @if ($errors->has('DOB'))
																<span class="help-block ">
																	{{ $errors->first('DOB') }}
																</span>
																 @endif     
                                                    <input type="hidden" id="dtp_input2" value="">
	                                            </div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('Gender') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Gender
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="Gender">
                                                        <option value="{{ $patient->Gender }}">{{ $patient->Gender }}</option>
                                                        <option value="Not Applicable" >Not Applicable</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Male">Female</option>
                                                    </select>
													   @if ($errors->has('Gender'))
														<span class="help-block ">
															{{ $errors->first('Gender') }}
														</span>
													   @endif
                                                </div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('Age') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Age
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                <input type="text" name="Age" value="{{ $patient->Age }}" data-required="1" placeholder="enter your age" class="form-control input-height"> 
												    @if ($errors->has('Age'))
														<span class="help-block help-block-error">
															{{ $errors->first('Age') }}
														</span>
													   @endif
												</div>
                                                      
											</div>
                                            <div class="form-group row {{ $errors->has('MobileNo') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Mobile No.
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="MobileNo" type="text" placeholder="mobile number" class="form-control input-height" value="{{ $patient->MobileNo }}"> 
													   @if ($errors->has('MobileNo'))
														<span class="help-block ">
															{{ $errors->first('MobileNo') }}
														</span>
													   @endif
													</div>
                                                      
											</div>
											<div class="form-group row {{ $errors->has('IMSNO') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">IMS No.
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="IMSNO" type="text" placeholder="IMS number" class="form-control input-height" value="{{ $patient->IMSNO }}"> 
													   @if ($errors->has('IMSNO'))
														<span class="help-block ">
															{{ $errors->first('IMSNO') }}
														</span>
													   @endif
													</div>
                                                      
											</div>
											<div class="form-group row {{ $errors->has('GroupNo') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Group No.
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="GroupNo" type="text" placeholder="Group number" class="form-control input-height" value="{{ $patient->GroupNo }}"> 
													   @if ($errors->has('GroupNo'))
														<span class="help-block ">
															{{ $errors->first('GroupNo') }}
														</span>
													   @endif
													</div>                                                      
											</div>
											<div class="form-group row {{ $errors->has('OptionNo') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Option No.
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="OptionNo" type="text" placeholder="Option number" class="form-control input-height" value="{{ $patient->OptionNo }}"> 
													   @if ($errors->has('OptionNo'))
														<span class="help-block ">
															{{ $errors->first('OptionNo') }}
														</span>
													   @endif
													</div>                                                      
											</div>
                                            <div class="form-group row {{ $errors->has('Email') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Email
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
													<span class="input-group-addon">
															<i class="fa fa-envelope"></i>
														</span>
													<input type="text" name="Email" class="form-control input-height"  placeholder="Email Address" value="{{ $patient->Email }}"> 
														 
													</div>
												   @if ($errors->has('Email'))
													<span class="help-block help-block-error">
														{{ $errors->first('Email') }}>
													</span>
												   @endif                                                        
											   </div>
                                            </div>
                                             <div class="form-group row {{ $errors->has('Address') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Address
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <textarea name="Address" placeholder="address" class="form-control" rows="5">{{ $patient->Address }}</textarea>
                                                       @if ($errors->has('Address'))
														<span class="help-block help-block-error">
															{{ $errors->first('Address') }}
														</span>
													   @endif
												</div>
                                            </div>
                                            <div class="form-group row  {{ $errors->has('MaritalStatus') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Marital Status 
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="MaritalStatus" >
                                                        <option  value="{{ $patient->MaritalStatus }}">{{ $patient->MaritalStatus }}</option>
                                                        <option value="">Select...</option>
                                                        <option value="Not Applicable">Not Applicable</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                    </select>
													  @if ($errors->has('MaritalStatus'))
														<span class="help-block">
															{{ $errors->first('MaritalStatus') }}
														</span>
													   @endif
                                                </div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('picture') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Upload Picture
                                                </label>
                                                <div class="compose-editor  col-md-5">
                                                     <input name="picture" type="file" class="default" multiple="" value="" >
												       @if ($errors->has('picture'))
														<span class="help-block">
															{{ $errors->first('picture') }}
														</span>
													   @endif
                                                 </div>
												        
                                            </div>
                                            <div class="form-group row {{ $errors->has('BloodGroup') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Blood Group
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <select class="form-control input-height" name="BloodGroup" >
                                                        <option value="{{ $patient->BloodGroup }}">{{ $patient->BloodGroup }}</option>
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+</">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>	
                                                    </select>
													  @if ($errors->has('BloodGroup'))
														<span class="help-block">
															<strong>{{ $errors->first('BloodGroup') }}</strong>
														</span>
													   @endif
                                                </div>
                                            </div>
                                         	<div class="form-group row {{ $errors->has('BloodPressure') ? ' has-error' : '' }}">
                                                 <label class="control-label col-md-3">Blood Presure
                                                 </label>
                                                 <div class="col-md-5">
                                                     <input name="BloodPressure" type="text" class="form-control input-height" value="{{ $patient->BloodPressure }}"  placeholder="blood presure" >
                                                       @if ($errors->has('BloodPressure'))
														<span class="help-block">
															<strong>{{ $errors->first('BloodPressure') }}</strong>
														</span>
													   @endif
												 </div>
                                             </div>
											<div class="form-group row {{ $errors->has('Sugar') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Blood Sugar
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control input-height" placeholder="sugger" value="{{ $patient->Sugar }}" name="Sugar">
                                                      @if ($errors->has('Sugar'))
														<span class="help-block ">
															{{ $errors->first('Sugar') }}
														</span>
													   @endif
												</div>
                                            </div>
                                            <div class="form-group row {{ $errors->has('Condition') ? ' has-error' : '' }}">
                                                 <label class="control-label col-md-3">Injury/Condition
                                                 </label>
                                                 <div class="col-md-5">
                                                     <input type="text" class="form-control input-height" value="{{ $patient->Condition }}" placeholder="injury/condition" name="Condition">
                                                     @if ($errors->has('Condition'))
														<span class="help-block">
															{{ $errors->first('Condition') }}
														</span>
													   @endif
												 </div>
                                             </div>     
											 
										
											<div class="form-actions">
													
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info">Update Record</button>
                                                    
                                                </div>
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