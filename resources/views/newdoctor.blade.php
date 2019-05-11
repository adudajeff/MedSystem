@extends('layouts.app')
@section('content')
     <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    
						<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Doctor Basic Information </div>
							<div class="tools">
								<a href="javascript:;" class="collapse"> </a>
								<a href="#portlet-config" data-toggle="modal" class="config"> </a>
								<a href="javascript:;" class="reload"> </a>
								<a href="javascript:;" class="remove"> </a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
						  
                                <form action="/Doctors/addnew" id="form_sample_1" class="form-horizontal" method="post">
                                        <div class="form-body">
										     <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                            <div class="form-group row {{ $errors->has('doctorname') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Doctor Name
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="doctorname" value="{{ old('doctorname') }}" data-required="1" placeholder="Enter Doctor Name" class="form-control input-height" > 
													        @if ($errors->has('doctorname'))
															<span class="help-block help-block-error">
																{{ $errors->first('doctorname') }}
															</span>
														     @endif
													</div>
                                                           
											  </div>

                                            <div class="form-group row {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Mobile No.
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="mobile" type="text" placeholder="Enter Mobile Number" class="form-control input-height" value="{{ old('mobile') }}"> 
													   @if ($errors->has('mobile'))
														<span class="help-block ">
															{{ $errors->first('mobile') }}
														</span>
													   @endif
													</div>
                                                      
											</div>
                                            <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Email
                                                </label>
                                                <div class="col-md-5">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                                <i class="fa fa-envelope"></i>
                                                            </span>
                                                        <input type="text" name="email" class="form-control input-height"  placeholder="Email Address" value="{{ old('email') }}"> 
															 
														</div>
														   @if ($errors->has('email'))
															<span class="help-block help-block-error">
																{{ $errors->first('email') }}>
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
											<div class="form-actions">
													
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info">Add Record</button>
                                                    <button type="reset" class="btn btn-default">reset</button>
                                                </div>
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