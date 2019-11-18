@extends('layouts.app')
@section('content')
     <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    
						<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Hospital Basic Information </div>
							<div class="tools">
								<a href="javascript:;" class="collapse"> </a>
								<a href="#portlet-config" data-toggle="modal" class="config"> </a>
								<a href="javascript:;" class="reload"> </a>
								<a href="javascript:;" class="remove"> </a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							
						       @foreach($hospital as $key)
                                <form action="/Hospitals/edithosp" id="form_sample_1" class="form-horizontal" method="post">
                                        <div class="form-body">
										     <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
										     <input type = "hidden" name = "id" value = "{{ $key->hosptalid}}">
                                            <div class="form-group row {{ $errors->has('hosptalname') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Hospital Name
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input type="text" name="hospitalname" value=" @if ((old('hosptalname'))>"")  {{ old('hosptalname') }} @else {{ $key->hosptalname }} @endif " data-required="1" placeholder="Enter Hospital Name" class="form-control input-height" > 
													        @if ($errors->has('hosptalname'))
															<span class="help-block help-block-error">
																{{ $errors->first('hosptalname') }}
															</span>
														     @endif
													</div>
                                                           
											  </div>

                                            <div class="form-group row {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Mobile No.
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
                                                    <input name="mobile" type="text" placeholder="Enter Mobile Number" class="form-control input-height" value="@if ((old('mobile'))>"")  {{ old('mobile') }} @else {{ $key->mobile }} @endif "> 
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
                                                        <input type="text" name="email" class="form-control input-height"  placeholder="Email Address" value="@if ((old('email'))>"")  {{ old('email') }} @else {{ $key->email }} @endif "> 
															 
														</div>
														   @if ($errors->has('email'))
															<span class="help-block help-block-error">
																{{ $errors->first('email') }}>
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
                                                    <button type="submit" class="btn btn-info">Update Record</button>
                                                    <button type="reset" class="btn btn-default">reset</button>
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