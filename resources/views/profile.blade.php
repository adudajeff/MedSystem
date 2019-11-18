@extends('layouts.app')
@section('content')
     <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                     <div class="page-content">
					    <div class="page-title">
                            <h1>Member Profile 
                                <small>My Profile</small>
                            </h1>
                        </div>
                       <div class="profile">
                        <div class="tabbable-line tabbable-full-width">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab"> Overview </a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab"> Account </a>
                                </li>
                                <li>
                                    <a href="#tab_1_6" data-toggle="tab"> Help </a>
                                </li>
                            </ul>
							<?php 
								 $name= "";                                 
                                 $Address=""; 
                                 $MobileNo="";                                 
                                 $Email =""; 
                                 $DOB="" ;
                                 $MobileNo="";
                                 $Condition="";
                                 $Country="";
								 $Picture="";
								 $PatientId="";
							?>
							@foreach($profile as $key)
							    <?php 
								 $PatientId= $key->PatientId;                                 
								 $name= $key->FirstName.' '.$key->LastName;                                 
                                 $Address=$key->Address; 
                                 $MobileNo=$key->MobileNo;                                 
                                 $Email =$key->Email; 
                                 $DOB=$key->DOB ;
                                 $MobileNo=$key->MobileNo;
                                 $Condition=$key->Condition;
                                 $Country=$key->Country;
                                 $Picture=$key->Picture;
								 ?>
							
							
							@endforeach
								<?php
									$patients=0;  
									$appointments=0;           
									$billing=0;           
									$reports=0;           
									$covermanagement=0;           
									$documents=0;           
									$doctors=0;           
									$settings=0;           
									$reconciliation=0; 
								?>
								   
							
							@foreach($roles as $key)
							<?php
							    $patients=$key->patients;  
								$appointments=$key->appointments;             
								$billing=$key->billing;             
								$reports=$key->reports;            
								$covermanagement=$key->covermanagement;          
								$documents=$key->documents;            
								$doctors=$key->doctors;             
								$settings=$key->settings;             
								$reconciliation=$key->reconciliation;   
							?>
							
							@endforeach
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="list-unstyled profile-nav">
                                                <li>
                                                    <img src="{{ asset('image/'.$Picture) }}" class="img-responsive pic-bordered" alt="">
                                                    <a href="javascript:;" class="profile-edit"> edit </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Appointments </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Uploads
                                                        <span> 3 </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Number of Visits </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Messages </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-8 profile-info">
                                                    <h1 class="font-green sbold uppercase">{{ $name }}</h1>
                                                    <!--<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat volutpat.
                                                    </p>-->
                                                   <p><b>Condition</b>:{{ $Condition }}</p>
                                                   <p><b>Allergy</b>:None</p>
                                                   <p><b>Preffered Hosptal</b>:</p>
                                                   <p><b>Doctor</b>:_</p>
                                                   <p><b>Mobile</b>:{{ $MobileNo }}</p>
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-map-marker"></i> {{ $Country }} </li>
                                                        <li>
                                                            <i class="fa fa-calendar"></i> {{ date('F j, Y',strtotime($DOB)) }} </li> 
                                                    </ul>
                                                </div>
                                                <!--end col-md-8-->
                                                <div class="col-md-4">
                                                    <div class="portlet sale-summary">
                                                        <div class="portlet-title">
                                                            <div class="caption font-red sbold"> LOGS </div>
                                                            <div class="tools">
                                                                <a class="reload" href="javascript:;" data-original-title="" title=""> </a>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <ul class="list-unstyled">
                                                                <li>
                                                                    <span class="sale-info"> Logins
                                                                        <i class="fa fa-img-up"></i>
                                                                    </span>
                                                                    <span class="sale-num"> 23 </span>
                                                                </li>
                                                                <li>
                                                                    <span class="sale-info">Uploads
                                                                        <i class="fa fa-img-down"></i>
                                                                    </span>
                                                                    <span class="sale-num"> 87 </span>
                                                                </li>
                                                                <li>
                                                                    <span class="sale-info"> TOTAL Appointments </span>
                                                                    <span class="sale-num"> 2377 </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-md-4-->
                                            </div>
                                            <!--end row-->
                                            <div class="tabbable-line tabbable-custom-profile">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_11" data-toggle="tab"> Latest Appointments </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_22" data-toggle="tab"> Feeds </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1_11">
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                        <i class="fa fa-calendar"></i> Date </th> 
																		<th>
                                                                        <i class="fa fa-list-alt"></i> Note </th>
                                                                        <th class="hidden-xs">
                                                                            <i class="fa fa-calendar-times-o"></i> Start Time </th>
                                                                        <th>
                                                                            <i class="fa fa-calendar-times-o"></i> End Time </th>
																	    <th>
                                                                        <i class="fa fa-plus-square"></i> Hosptal </th>
                                                                        <th> </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
																 @foreach($appointment as $key)
                                                                    <tr>
                                                                        <td>
                                                                            <a href="javascript:;"> {{ date('F j, Y',strtotime($key->Appointmentdate)) }} </a>
                                                                        </td>
																		<td>
                                                                            <a href="javascript:;"> {{ $key->Note }} </a>
                                                                        </td>
                                                                        <td class="hidden-xs"> {{ $key->Start }} </td>
                                                                        <td class="hidden-xs"> 
                                                                            {{ $key->End }}
                                                                        </td>
																		<td class="hidden-xs"> 
																		{{ $key->hosptalname }}
                                                                        </td>
                                                                        <td>
                                                                            <a class="btn btn-sm grey-salsa btn-outline" href="javascript:;"> View </a>
                                                                        </td>
                                                                    </tr>
																@endforeach
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--tab-pane-->
                                                    <div class="tab-pane" id="tab_1_22">
                                                        <div class="tab-pane active" id="tab_1_1_1">
                                                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 290px;"><div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1" data-initialized="1" style="overflow: hidden; width: auto; height: 290px;">
                                                                <ul class="feeds">
                                                                    <li>
                                                                        <div class="col1">
                                                                            <div class="cont">
                                                                                <div class="cont-col1">
                                                                                    <div class="label label-success">
                                                                                        <i class="fa fa-bell-o"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="cont-col2">
                                                                                    <div class="desc"> You have 4 pending tasks.
                                                                                        <span class="label label-danger label-sm"> Take action
                                                                                            <i class="fa fa-share"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col2">
                                                                            <div class="date"> Just now </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;">
                                                                            <div class="col1">
                                                                                <div class="cont">
                                                                                    <div class="cont-col1">
                                                                                        <div class="label label-success">
                                                                                            <i class="fa fa-bell-o"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="cont-col2">
                                                                                        <div class="desc"> New version v1.4 just lunched! </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col2">
                                                                                <div class="date"> 20 mins </div>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    
                                                                </ul>
                                                            </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                                        </div>
                                                    </div>
                                                    <!--tab-pane-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--tab_1_2-->
                                <div class="tab-pane" id="tab_1_3">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li class="active">
                                                    <a data-toggle="tab" href="#tab_1-1">
                                                        <i class="fa fa-cog"></i> Personal info </a>
                                                    <span class="after"> </span>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" href="#tab_2-2">
                                                        <i class="fa fa-picture-o"></i>Change Avatar </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" href="#tab_3-3">
                                                        <i class="fa fa-lock"></i> Change Password </a>
                                                </li>
												@if  (Auth::user()->documents==1)
                                                <li>
                                                    <a data-toggle="tab" href="#tab_4-4">
                                                        <i class="fa fa-eye"></i>Roles and Permission </a>
                                                </li>
												@endif
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                                <div id="tab_1-1" class="tab-pane active">
												     @foreach($profile as $key)
                                                    <form role="form" name="profile" method="POST" action="/User/addnew">
														   <div class="form-group row">															 
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
                                                        <div class="form-group">
														 {{ csrf_field() }}
														    <input type="hidden" name="Patientid" value="{{ $key->PatientId}}">
                                                            <label class="control-label">First Name</label>
                                                            <input type="text" placeholder="John" name="FirstName" value="{{ $key->FirstName}}" class="form-control"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Last Name</label>
                                                            <input type="text" placeholder="Doe" name="LastName" value="{{ $key->LastName }}" class="form-control"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Mobile Number</label>
                                                            <input type="text" placeholder="+1 646 580 DEMO (6284)" name="MobileNo" value="{{ $key->MobileNo }}" class="form-control"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Email</label>
                                                            <input type="text" placeholder="johndoe@gmail.com" name="Email" value="{{ $key->Email }}" class="form-control"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Address</label>
                                                            <input type="text" placeholder="Box 17788 Nairabi" name="Address" value="{{ $key->Address }}" class="form-control"> </div>                                                        
                                                        <div class="margiv-top-10">
                                                            <button  type="submit" class="btn green" name="submit"> Save Changes </button>
                                                            <button  class="btn default" type="reset"> Cancel </button>
                                                        </div>
                                                    </form>
													@endforeach
                                                </div>
                                                <div id="tab_2-2" class="tab-pane">
                                                    <p> Maximum size of photo allowed ,5mb size
                                                        </p>
                                                    <form method="POST" action="#" name="photo" role="form">
                                                        <div class="form-group">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="{{ asset('image/'.$Picture) }}" alt=""> </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                        <input type="file" name="..."> </span>
                                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix margin-top-10">
                                                                <span class="label label-danger"> NOTE! </span>
                                                                <span>Remember to click submit after uploading the photo to save the picture </span>
                                                            </div>
                                                        </div>
                                                        <div class="margin-top-10">
                                                            <a href="javascript:;" class="btn green"> Submit </a>
                                                            <a href="javascript:;" class="btn default"> Cancel </a>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="tab_3-3" class="tab-pane">
                                                    <form action="#">
                                                        <div class="form-group">
                                                            <label class="control-label">Current Password</label>
                                                            <input type="password" class="form-control"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">New Password</label>
                                                            <input type="password" class="form-control"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Re-type New Password</label>
                                                            <input type="password" class="form-control"> </div>
                                                        <div class="margin-top-10">
                                                            <a href="javascript:;" class="btn green"> Change Password </a>
                                                            <a href="javascript:;" class="btn default"> Cancel </a>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="tab_4-4" class="tab-pane">
                                                    <form action="/User/updaterights" method="POST">
													 <input type="hidden" name="Patientidr" value="{{ $PatientId }}">
													 {{ csrf_field() }}
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
															<tr>
                                                                <td colspan="2"> 
																		<div class="form-group row">															 
																			 <div class="col-md-12">
																				   @if ($errors->has('failedr'))
																					<div class="alert alert-danger">
																						{{ $errors->first('failedr') }}
																					</div>
																				   @endif
																				   @if ($errors->has('successr'))
																					<div class="alert alert-success">
																						{{ $errors->first('successr') }}
																					</div>
																				   @endif
																			 </div>
																		 </div>																
																</td>
                                                                
                                                            </tr>	
															<tr>
                                                                <td> Allow Patient Management </td>
                                                                <td>
                                                                    <div class="mt-radio-inline">
																	    
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optPatient" @if($patients==1) checked="" @endif value="1"> Yes
                                                                            <span></span>
                                                                        </label>
																		
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optPatient"  @if($patients==0) checked="" @endif value="0"> No
                                                                            <span></span>
                                                                        </label>
																		
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> Allow Doctor Management </td>
                                                                <td>
                                                                    <div class="mt-radio-inline">
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optDoctor"  value="1" @if($doctors==1) checked="" @endif > Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optDoctor" value="0" @if($doctors==0) checked="" @endif > No
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> Allow Appointment Management </td>
                                                                <td>
                                                                    <div class="mt-radio-inline">
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optAppointment" value="1" @if($appointments==1) checked="" @endif > Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optAppointment" value="0" @if($appointments==0) checked="" @endif > No
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td> Allow Billing Summary Creation </td>
                                                                <td>
                                                                    <div class="mt-radio-inline">
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optBilling" value="1" @if($billing==1) checked="" @endif > Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optBilling" value="0" @if($billing==0) checked="" @endif > No
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>   
															<tr>
                                                                <td> Allow Cover Management </td>
                                                                <td>
                                                                    <div class="mt-radio-inline">
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optCover" value="1" @if($covermanagement==1) checked="" @endif > Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optCover" value="0" @if($covermanagement==0) checked="" @endif> No
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
															<tr>
                                                                <td> Allow Invoice/Receipt Uploads </td>
                                                                <td>
                                                                    <div class="mt-radio-inline">
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optInvoivce" value="1" @if($documents==1) checked="" @endif > Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optInvoivce" value="0" @if($documents==0) checked="" @endif > No
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
															<tr>
                                                                <td> Allow Billing and Reconciliations </td>
                                                                <td>
                                                                    <div class="mt-radio-inline">
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optReconciliations" value="1" @if($reconciliation==1) checked="" @endif > Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optReconciliations" value="0" @if($reconciliation==0) checked="" @endif > No
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
															<tr>
                                                                <td> Allow Settings </td>
                                                                <td>
                                                                    <div class="mt-radio-inline">
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optsettings" value="1" @if($settings==1) checked="" @endif > Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optsettings" value="0" @if($settings==0) checked="" @endif > No
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>		
															<tr>
                                                                <td> Allow Reports </td>
                                                                <td>
                                                                    <div class="mt-radio-inline">
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optreports" value="1" @if($reports==1) checked="" @endif > Yes
                                                                            <span></span>
                                                                        </label>
                                                                        <label class="mt-radio">
                                                                            <input type="radio" name="optreports" value="0" @if($reports==0) checked="" @endif > No
                                                                            <span></span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                        <!--end profile-settings-->
                                                        <div class="margin-top-10">
                                                            <button  class="btn green" type="submit"> Save Changes </button>
                                                            <button  class="btn default" type="reset"> Cancel </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-md-9-->
                                    </div>
                                </div>
                                <!--end tab-pane-->
                                
                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
						
				     </div><!-- Chezea hapa ndani buda-->
					      <!-- END CONTENT BODY -->
			   </div>               
@endsection