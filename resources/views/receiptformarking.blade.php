			@extends('layouts.app')
            @section('title','Invoices for Reconciliation')	
            @section('content')	

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">                 
						<form id="form1" action="/reconcile/updateinvoice" method="post" >
						    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
							<div class="row">
								<div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">Invoices for marking</span>
									                                                          
                                        <button type="submit" class="btn btn-info">Mark as Paid</button>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                         <thead>
                                            <tr >
                                                <th class="all"><input class="checkAll" type="checkbox" name="checkAll"></th>
                                                <th class="all">Docid</th>
                                                <th class="min-phone-l">All Names</th>
                                                <th class="min-tablet">Description</th>                                               
                                                <th class="min-tablet">Document Type</th>
												 <th class="min-tablet">Hosptal</th>
                                                <th class="min-tablet">Invoice No</th>
                                                <th class="min-tablet">Paymentstatus</th>
                                                <th class="all">Date Uploaded</th>
                                              
                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										    @foreach($documents as $document)
                                            <tr role="row">
                                                <td><input type="checkbox" name="docid[]" value="{{ $document->docid }}"></td>
                                                <td>{{ $document->docid }}</td>
                                                <td>{{ $document->FirstName." ".$document->LastName }}</td>
                                                <td>{{ $document->document }}</td>
                                                <td>{{ $document->documenttype }}</td>
                                                <td>{{ $document->hosptalname }}</td>
                                                <td>{{ $document->invoiceno }}</td>
                                                <td >@if ($document->Paymentstatus=='PAID') <span class="label label-success"> {{ $document->Paymentstatus }}</span> @else <span class="label label-warning"> {{ $document->Paymentstatus }}</span> @endif</td>
                                                <td>{{ date('F j, Y, g:i a',strtotime($document->datecreated)) }}</td>
                                                      											
                                            </tr>
											 @endforeach
                                           <tfoot
                                            <tr>
                                                <th class="all">#</th>
                                                <th class="all">Docid</th>
                                                <th class="min-phone-l">All Names</th>
                                                <th class="min-tablet">Description</th>                                               
                                                <th class="min-tablet">Document Type</th>
												 <th class="min-tablet">Hosptal</th>
                                                <th class="min-tablet">Invoice No</th>
												<th class="min-tablet">Paymentstatus</th>
                                                <th class="all">Date Uploaded</th>
                                              
                                               
                                                
                                            </tr>
                                        </tfoot>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
						</form>
					</div><!-- Chezea hapa ndani buda-->
					      <!-- END CONTENT BODY -->
			   </div> 
		@endsection