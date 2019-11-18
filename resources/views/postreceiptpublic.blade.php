<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Medic Plus | User Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
         <link rel="shortcut icon" href="{{ asset('image/medicfav.png') }}" /> 
		
		<style>
		      .user-login-5 .login-container>.login-content {
					margin-top: 10%;
				}
				.user-login-5 .login-logo.login-6 {
					top:10px !important;
				}
				
				.user-login-5 .form-group.has-error {
					border-bottom: 0px solid #ed6b75!important;
				}
              	
		</style>
		</head>
    <!-- END HEAD -->
    <body class="login" style="/*background-image:url({{ asset('image/bg-1.png') }});background-position: center;*/">
        <!-- BEGIN : LOGIN PAGE 5-2 -->
        <div class="user-login-5">
            <div class="row bs-reset">
			    <div class="col-md-6 bs-reset">
                    <div class="login-bg "> <!--<img class="login-logo login-6 " src="{{ asset('image/consolata2.png') }}" />--> </div>
                </div>
                <div class="col-md-6 login-container bs-reset">
                    <img class="login-logo login-6" src="{{ asset('assets/layouts/layout4/img/medic.png') }}" />
                    <div class="login-content">
                         <div class="m-heading-1 border-green m-bordered">
                                <h3>Upload your Hospital Invoices,Receipt and Discharge Sheet</h3>                                
                            </div>
                            <form id="fileupload1" action="/Uploadreceipt/uploadpub" method="post" enctype="multipart/form-data">
                                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
								 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
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
								 <div class="form-group row {{ $errors->has('hosptal') ? ' has-error' : '' }}">
										<label class="control-label col-md-3">Select Hospital
											<span class="required" aria-required="true"> * </span>
										</label>
										<div class="col-md-5">
											<select class="form-control input-height"  name="hosptal">
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
								<div class="form-group row {{ $errors->has('documenttype') ? ' has-error' : '' }}">
										<label class="control-label col-md-3">Select Document Type
											<span class="required" aria-required="true"> * </span>
										</label>
										<div class="col-md-5">
											<select class="form-control input-height"  name="documenttype">
											     <option value="{{ old('documenttype') }}">{{ old('documenttype') }}</option>
												@foreach($documenttypes as $key)
												    @if ($key->type=='INV')
												   <option value="{{ $key->type }}" selected>{{ $key->documenttype }}</option>
											        @endif
												   <option value="{{ $key->type }}">{{ $key->documenttype }}</option>
												@endforeach
											</select>
											   @if ($errors->has('documenttype'))
												<span class="help-block ">
													{{ $errors->first('documenttype') }}
												</span>
											   @endif
										</div>
                                </div>
								 <div class="form-group row {{ $errors->has('invoiceno') ? ' has-error' : '' }}">
											<label class="control-label col-md-3">Invoice No.
												<span class="required" aria-required="true"> * </span>
											</label>
												<div class="col-md-5">
												<input type="text" name="invoiceno" data-required="1" placeholder="Enter Your Invoice No" class="form-control input-height" value="{{ old('invoiceno') }}"> 
														@if ($errors->has('invoiceno'))
														<span class="help-block ">
															{{ $errors->first('invoiceno') }}
														</span>
														 @endif
												</div>                                                            
								</div>
								
								<div class="form-group row {{ $errors->has('IMSNO') ? ' has-error' : '' }}">
											<label class="control-label col-md-3">IMS No.
												<span class="required" aria-required="true"> * </span>
											</label>
												<div class="col-md-5">
												<input type="text" name="IMSNO" data-required="1" placeholder="Enter Your IMS No" class="form-control input-height" value="{{ old('IMSNO') }}"> 
														@if ($errors->has('IMSNO'))
														<span class="help-block ">
															{{ $errors->first('IMSNO') }}
														</span>
														 @endif
												</div>                                                            
								</div>
								 <div class="form-group row {{ $errors->has('Amount') ? ' has-error' : '' }}">
											<label class="control-label col-md-3">Invoice Amount.
												<span class="required" aria-required="true"> * </span>
											</label>
												<div class="col-md-5">
												<input type="text" name="Amount" data-required="1" placeholder="Enter Your Invoice Amount" class="form-control input-height" value="{{ old('Amount') }}"> 
														@if ($errors->has('Amount'))
														<span class="help-block ">
															{{ $errors->first('Amount') }}
														</span>
														 @endif
												</div>                                                            
								</div>
								<div class="form-group row {{ $errors->has('Invoicedate') ? ' has-error' : '' }}">
                                                <label class="control-label col-md-3">Document Date
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <div class="col-md-5">
													   <div class="input-group input-medium date date-picker" data-date="{{ date('d-m-Y') }}" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
																<input class="form-control input-height" name="Invoicedate" size="16" placeholder="Document Date" type="text" value="{{ date('d-m-Y') }}">
																<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
														</div>
                                                        <input type="hidden" id="dtp_input2" value="">
														 @if ($errors->has('Invoicedate'))
															<span class="help-block ">
																{{ $errors->first('Invoicedate') }}
															</span>
														   @endif
                                                </div>
                                </div>
								<div class="form-group row  {{ $errors->has('files') ? ' has-error' : '' }}">
								  <label class="control-label col-md-3">Select Invoice/Bill to upload
											<span class="required" aria-required="true"> * </span>
								  </label>
											<div class="row  fileupload-buttonbar">
												<div class="col-lg-7">												  
													<!-- The fileinput-button span is used to style the file input field as button -->
													<span class="btn blue fileinput-button">
														<i class="fa fa-plus"></i>
														<span> Add files... </span>
													<input type="file" name="files[]" multiple="" value="" > </span>
													    @if ($errors->has('files'))
														<span class="help-block ">
															{{ $errors->first('files') }}
														</span>
														 @endif
											</div>
										      
							       </div>
                                 </div>			
								 <div class="form-group row ">
								    <label class="control-label col-md-3">
											<span class="required" aria-required="true"></span>
								   </label>
									<div class="col-md-5">
										<button type="submit" class="btn btn-info">Complete Upload</button> <a href="/home" type="submit" class="btn btn-danger">Back Home</a>
										
									</div>
								</div>								
								
                            </form>
							<hr>
                               
						
                    </div>
                    <div class="login-footer">                             
                                <div class="panel-body">
                                    <ul>
                                        <li> The maximum file size for uploads in this system is
                                            <strong>5 MB</strong> (default file size is unlimited). </li>
                                        <li> Only image files (
                                            <strong>JPG, GIF, PNG</strong>) are allowed in this system (by default there is no file type restriction). </li>
                                        </ul>
                                </div>
                    </div>
                </div>
               
            </div>
        </div>
       <!-- END : LOGIN PAGE 5-2 -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/login-5.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
  
