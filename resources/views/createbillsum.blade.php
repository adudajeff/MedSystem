			@extends('layouts.app')
            @section('content')	

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">                 
							
				<div class="row">
					 <div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Bill Creation form </div>
							<div class="tools">
								<a href="javascript:;" class="collapse"> </a>
								<a href="#portlet-config" data-toggle="modal" class="config"> </a>
								<a href="javascript:;" class="reload"> </a>
								<a href="javascript:;" class="remove"> </a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
						  
                                <form action="/Uploadreceipt/addnewsum" id="form_sample_1" class="form-horizontal" method="post">
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
										<div class="form-group row">
										    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                            
											<div class="col-md-12">
											        <input type="hidden" value="{{ $invoiceno }}" name="invoiceno">
													<div class="form-group row {{ $errors->has('billno') ? ' has-error' : '' }}">
														<label class="control-label col-md-3">Bill No
															<span class="required" aria-required="true">*</span>
														</label>
														<div class="col-md-9">
															<input type="text" name="billno" value="{{ old('billno') }}" data-required="1" placeholder="Enter Bill No on the Invoice" class="form-control input-height" > 
																	@if ($errors->has('billno'))
																	<span class="help-block help-block-error">
																		{{ $errors->first('billno') }}
																	</span>
																	 @endif
															</div>
																   
													  </div>
											  </div>
											
										</div>
										<div class="form-group row">
										    
											  	<div class="col-md-12">
											       
													<div class="form-group row {{ $errors->has('billdetail') ? ' has-error' : '' }}">
														<label class="control-label col-md-3">Bill Detail
															<span class="required" aria-required="true">*</span>
														</label>
														<div class="col-md-9">
															<input type="text" name="billdetail" value="{{ old('billdetail') }}" data-required="1" placeholder="Enter Bill Details" class="form-control input-height" > 
																	@if ($errors->has('billdetail'))
																	<span class="help-block help-block-error">
																		{{ $errors->first('billdetail') }}
																	</span>
																	 @endif
															</div>
																   
													  </div>
											  </div>
										</div>
										<div class="form-group row">
											  <div class="col-md-12">
													  <div class="form-group row {{ $errors->has('billamount') ? ' has-error' : '' }}">
														<label class="control-label col-md-3">Bill Amount
															<span class="required" aria-required="true">*</span>
														</label>
															<div class="col-md-9">
															<input type="text" name="billamount" data-required="1" placeholder="Enter Bill Amount" class="form-control input-height" value="{{ 0.00 }}"> 
																	@if ($errors->has('billamount'))
																	<span class="help-block ">
																		{{ $errors->first('billamount') }}
																	</span>
																	 @endif
															</div>
																	
													 </div>
                                             </div> 
											  												
											 </div>
											 <div class="form-group row">
										
											  <div class="col-md-12">
													 <div class="form-group row {{ $errors->has('billdate') ? ' has-error' : '' }} ">
														<label class="control-label col-md-3">Bill Date
															<span class="required" aria-required="true">*</span>
														</label>
														<div class="col-md-9">
															 <div class="input-group input-medium date date-picker " data-date="{{ date('d-m-Y') }}" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
																		<input name="billdate" class="form-control input-height" size="16" placeholder="Bill Date" type="text" value="@if ((old('billdate'))>"")  {{ old('billdate') }} @else {{ date('Y-m-d') }} @endif ">
																		<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
																																
															</div>
																		@if ($errors->has('billdate'))
																		<span class="help-block ">
																			{{ $errors->first('billdate') }}
																		</span>
																		 @endif     
															<input type="hidden" id="dtp_input2" value="">
														</div>
													</div> 
                                                 </div>													
											 </div>
										
											<div class="form-actions">
													
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-info">Create Bill Item</button>
                                                    <a href="/Uploadreceipt/printsum/{{ $invoiceno }}" target="_blank"><button type="button" class="btn btn-default">Print Bills Summary</button></a>
                                                </div>
                                            	</div>
                                        	</div>
										</div>
                                    </form>                      
						
						     <!-- END FORM-->
                         </div>
					  </div>
								<div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject  uppercase">All Bill Detail For Invoice NO: <b>{{ $invoiceno }}</b> Name:<b>{{ $pname }}</b></span>									                                                          
                                       
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                         <thead>
                                            <tr>
                                                <th class="all">#</th>                                               
                                                <th class="all">Bill Id</th>                                               
                                                <th class="min-phone-l">Bill Details</th>
                                                <th class="min-tablet">Bill Amount</th>
                                                <th class="min-tablet">Invoice No</th>
                                                <th class="all">Bill Date</th>                                                                                             
                                                <th class="all">Remove</th>                                                                                             
                                            </tr>
                                        </thead>
                                        <tbody>
										    @foreach($allbills as $key)
                                            <tr>
                                                <td> <label><input type="checkbox" value=""></label></td>                                               
                                                <td> {{ $key->id }}</td>                                               
                                                <td>{{ $key->billdetail }}</td>
                                                <td>{{ $key->billamount }}</td>
                                                <td>{{ $key->invoiceno }}</td>
                                                <td>{{ date('F j, Y',strtotime($key->billdate)) }}</td>
                                                <td><a  href="{{ url('Uploadreceipt/deletesum/' . $key->invoiceno.'/'. $key->id )}}"  ><i class="fa fa-trash-o"></i> Delete</a></td>
                                                									
                                            </tr>
											 @endforeach
                                           <tfoot
                                            <tr>
                                                <th class="all">#</th>                                               
                                                <th class="all">Bill Id</th>                                               
                                                <th class="min-phone-l">Bill Details</th>
                                                <th class="min-tablet">Bill Amount</th>
                                                <th class="min-tablet">Invoice No</th>
                                                <th class="all">Bill Date</th>  
                                                 <th class="all">Remove</th>                                                      
                                            </tr>
                                        </tfoot>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
					</div><!-- Chezea hapa ndani buda-->
					      <!-- END CONTENT BODY -->
			   </div> 
		@endsection