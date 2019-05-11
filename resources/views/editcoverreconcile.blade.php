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
								<i class="fa fa-gift"></i>Reconcile Cover </div>
							<div class="tools">
								<a href="javascript:;" class="collapse"> </a>
								<a href="#portlet-config" data-toggle="modal" class="config"> </a>
								<a href="javascript:;" class="reload"> </a>
								<a href="javascript:;" class="remove"> </a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							 @foreach($covers as $cover)
                            <form id="cover" action="/reconcile/reconcileupdate" method="post" enctype="">
                               <div class="form-body">
							  
								 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
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
								 <div class="form-group row {{ $errors->has('PatientId') ? ' has-error' : '' }}">
										<label class="control-label col-md-3">Select Patient/Staff
											<span class="required" aria-required="true"> * </span>
										</label>
										<div class="col-md-5">
											<select readonly class="form-control input-height"  name="PatientId">
											     <option selected value="{{ $cover->PatientId  }}">{{ $cover->FirstName.' '.$cover->LastName }}</option>
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
											<select  readonly class="form-control input-height" multiple name="coverid">
											     <option selected value="{{ $cover->coverid  }}">{{ $cover->covername  }}</option>
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
											<input readonly type="text" class="form-control input-height" value="{{ number_format($cover->amount,2) }}" name="amount">
											
											   @if ($errors->has('amount'))
												<span class="help-block ">
													{{ $errors->first('amount') }}
												</span>
											   @endif
										</div>
                                </div>

								<div class="form-group row {{ $errors->has('reconamount') ? ' has-error' : '' }}">
										<label class="control-label col-md-3">Reconciliation Amount
											<span class="required" aria-required="true"> * </span>
										</label>
										<div class="col-md-5">
											<input type="text" class="form-control input-height" value="{{ $cover->reconamount }}" name="reconamount">											
											   @if ($errors->has('reconamount'))
												<span class="help-block ">
													{{ $errors->first('reconamount') }}
												</span>
											   @endif
										</div>
                                </div>	
							 
								
													
								 <div class="form-group row ">
								    <label class="control-label col-md-3">
											<span class="required" aria-required="true"> * </span>
								   </label>
									<div class="col-md-5">
										<button type="submit" class="btn btn-info">Reconcile Amount</button>
										
									</div>
								</div>
							  <div>
                            </form>
                         @endforeach
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
	