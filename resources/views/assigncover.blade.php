@extends('layouts.app')
@section('content')
     <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
         <div class="page-content">
					 <div class="row">
                        <div class="col-md-12">                           
					    <div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Assign Cover </div>
							<div class="tools">
								<a href="javascript:;" class="collapse"> </a>
								<a href="#portlet-config" data-toggle="modal" class="config"> </a>
								<a href="javascript:;" class="reload"> </a>
								<a href="javascript:;" class="remove"> </a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
                            <form id="cover" action="/covers/addnew" method="post" enctype="">
                               <div class="form-body">
								 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
								 <div class="form-group row {{ $errors->has('PatientId') ? ' has-error' : '' }}">
										<label class="control-label col-md-3">Select Patient/Staff
											<span class="required" aria-required="true"> * </span>
										</label>
										<div class="col-md-5">
											<select class="form-control input-height"  name="PatientId">
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
								<div class="form-group row {{ $errors->has('coverid') ? ' has-error' : '' }}">
										<label class="control-label col-md-3">Select Cover
											<span class="required" aria-required="true"> * </span>
										</label>
										<div class="col-md-5">
											<select class="form-control input-height" multiple name="coverid">
											     <option value="{{ old('coverid') }}">{{ old('coverid') }}</option>
												@foreach($covertypes as $key)
												   <option value="{{ $key->coverid }}">{{ $key->covername }}</option>
												@endforeach
											</select>
											   @if ($errors->has('coverid'))
												<span class="help-block ">
													{{ $errors->first('coverid') }}
												</span>
											   @endif
										</div>
                                </div>
                                <div class="form-group row {{ $errors->has('amount') ? ' has-error' : '' }}">
										<label class="control-label col-md-3">Cover Amount
											<span class="required" aria-required="true"> * </span>
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control input-height" value="{{ old('amount') }}" name="amount">
											
											   @if ($errors->has('amount'))
												<span class="help-block ">
													{{ $errors->first('amount') }}
												</span>
											   @endif
										</div>
                                </div>	 								
							   <div class="form-group row {{ $errors->has('startdate') ? ' has-error' : '' }}">
										<label class="control-label col-md-3">Start Date
											<span class="required" aria-required="true"> * </span>
										</label>
										<div class="col-md-5">
											   <div class="input-group input-medium date date-picker" data-date="{{ date('d-m-Y') }}" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
														<input class="form-control input-height" name="startdate" size="16" placeholder="Start Date" type="text" value="{{ date('d-m-Y') }}">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
												</div>
												<input type="hidden" id="dtp_input2" value="">
												 @if ($errors->has('startdate'))
													<span class="help-block ">
														{{ $errors->first('startdate') }}
													</span>
												   @endif
										</div>
								</div> 
								<div class="form-group row {{ $errors->has('expirydate') ? ' has-error' : '' }}">
										<label class="control-label col-md-3">Expiry Date
											<span class="required" aria-required="true"> * </span>
										</label>
										<div class="col-md-5">
											   <div class="input-group input-medium date date-picker" data-date="{{ date('d-m-Y') }}" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
														<input class="form-control input-height" name="expirydate" size="16" placeholder="Expiry Date" type="text" value="{{ date('d-m-Y') }}">
														<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
												</div>
												<input type="hidden" id="dtp_input2" value="">
												 @if ($errors->has('expirydate'))
													<span class="help-block ">
														{{ $errors->first('expirydate') }}
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
											     
												
												   <option selected value="NOT PAID">NOT PAID</option>
												   <option value="PAID">PAID</option>
												   <option value="SUSPENDED">SUSPENDED</option>
												
											</select>
											   @if ($errors->has('status'))
												<span class="help-block ">
													{{ $errors->first('status') }}
												</span>
											   @endif
										</div>
                                </div>
								 <div class="form-group row">
                                                 <label class="control-label col-md-3">
                                                 </label>
                                                 <div class="col-md-5">
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
													
								 <div class="form-group row ">
								    <label class="control-label col-md-3">
											<span class="required" aria-required="true"> * </span>
								   </label>
									<div class="col-md-5">
										<button type="submit" class="btn btn-info">Assign Cover</button>
										
									</div>
								</div>
							  <div>
                            </form>
                        
                        </div>
                    </div>
                    </div>
					</div>
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
		  </div><!-- Chezea hapa ndani buda-->
					    
	</div>               
@endsection