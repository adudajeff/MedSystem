@extends('layouts.app')
@section('content')
     <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Add Student
                                <small>Add Student</small>
                            </h1>
                        </div>
						</div><!-- end of page head--->
						<!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
							<ul class="page-breadcrumb breadcrumb">
								<li>
									<a href="index.html">Student</a>
									<i class="fa fa-circle"></i>
								</li>
								<li>
									<a href="#">Add Student</a>
									<i class="fa fa-circle"></i>
								</li>
								<li>
									<span class="active">Add Student Page</span>
								</li>
							</ul>
						<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Add Student Form </div>
							<div class="tools">
								<a href="javascript:;" class="collapse"> </a>
								<a href="#portlet-config" data-toggle="modal" class="config"> </a>
								<a href="javascript:;" class="reload"> </a>
								<a href="javascript:;" class="remove"> </a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
						  
						<form  class="form-horizontal" action = "/home/create" method = "post">
						    <div class="form-body">
							 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
							   <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
									<label for="email" class="col-md-4 control-label">Name</label>

									<div class="col-md-6">									   
										  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"   autofocus>                                
									   
										  @if ($errors->has('name'))
											<span class="help-block">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
										   @endif
									</div>
									
								</div> 
								<div class="form-group">
                                      <label class="control-label col-md-4">Start With Years</label>
									<div class="col-md-6">
										<div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
											<input type="text" class="form-control" readonly>
											<span class="input-group-btn">
												<button class="btn default" type="button">
													<i class="fa fa-calendar"></i>
												</button>
											</span>
										</div>
										
									</div>
								</div>
								<div class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
									<label for="dob" class="col-md-4 control-label">Date Of Birth</label>

									<div class="col-md-6">
									   
										<input id="dob" type="text" class="form-control" name="dob" value="{{ old('dob') }}"  autofocus>  
										   @if ($errors->has('dob'))
											<span class="help-block">
												<strong>{{ $errors->first('dob') }}</strong>
											</span>
										   @endif
									</div>
								</div>
								<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="email" class="col-md-4 control-label">Email Address</label>

									<div class="col-md-6">
									    <div class="input-group">
											<span class="input-group-addon input-circle-left">
												<i class="fa fa-envelope"></i>
											</span>
										   <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"  autofocus>  
										  </div>
										   @if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										   @endif
									</div>
								</div>
								<div class="form-group {{ $errors->has('age') ? ' has-error' : '' }}">
									<label for="age" class="col-md-4 control-label">Age</label>

									<div class="col-md-6">
										<input id="age" type="text" class="form-control" name="age" value="{{ old('age') }}"   autofocus> 
											@if ($errors->has('age'))
											<span class="help-block">
												<strong>{{ $errors->first('age') }}</strong>
											</span>
										   @endif
									</div>
								</div>
								<div class="form-group {{ $errors->has('failed') ? ' has-error' : '' }}">		

									<div class="col-md-8 col-md-offset-4">
											@if ($errors->has('failed'))
											<span class="help-block">
												<strong>{{ $errors->first('failed') }}</strong>
											</span>
										   @endif
										   @if ($errors->has('success'))
											<div class="alert-success">
												<strong>{{ $errors->first('success') }}</strong>
											</div>
										   @endif
									</div>
								</div>
								
                           							
							   </div><!------end of formbody --->
							   <div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn btn-circle green">Submit</button>
											<button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button>
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