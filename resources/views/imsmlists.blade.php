			@extends('layouts.app')
            @section('title','IMS LIST')	
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
                                        <span class="caption-subject bold uppercase">IMS list</span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                         <thead>
                                            <tr >
                                                
                                                <th class="all">Docid</th>
                                                <th class="all">All Names</th>
                                                <th class="all">Year of Birth</th>
                                                <th class="all">IMSNO/PASSPORT/ID</th>
                                                <th class="all">Country</th>
												<th class="all">Description</th>                                               
                                                <th class="all">Document Type</th>												
                                                <th class="all">Invoice No</th>
                                                <th class="all">Regional Expense</th>
                                                <th class="all">Amount</th>
                                                <th class="all">Balance</th>
                                                <th class="all">Status</th>
                                                <th class="all">Date Uploaded</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										    @foreach($documents as $document)
                                            <tr role="row">                                                
                                                <td>{{ $document->docid }}</td>
                                                <td>{{ $document->FirstName." ".$document->LastName }}</td>
                                                <td>{{ date('d/m/Y',strtotime($document->DOB)) }}</td>
                                                <td>{{ $document->IMSNO }}</td>
                                                <td>{{ $document->Country }}</td>
                                                <td>{{ $document->document }}</td>
                                                <td>{{ $document->documenttype }}</td>                                                
                                                <td>{{ $document->invoiceno }}</td>
                                                <td>{{ $document->billamount }}</td>
                                                <td>@if ($document->Paymentstatus=='PAID') {{ $document->billamount }} @else {{ 0 }} @endif</td>
                                                <td>@if ($document->Paymentstatus=='PAID') {{ 0 }} @else {{ $document->billamount }} @endif</td>
                                                <td>@if ($document->Paymentstatus=='PAID') <span class="label label-success"> {{ $document->Paymentstatus }}</span> @else <span class="label label-warning"> {{ $document->Paymentstatus }}</span> @endif</td>
                                                <td>{{ date('F j, Y, g:i a',strtotime($document->datecreated)) }}</td>
                                                      											
                                            </tr>
											 @endforeach
                                           <tfoot
                                            <tr>                                                
                                                <th class="all">Docid</th>
                                                <th class="min-phone-l">All Names</th>                                                                                              
                                                <th class="min-tablet">Year of Birth</th>
												<th class="min-tablet">IMSNO/PASSPORT/ID</th>
												<th class="min-tablet">Country</th>												 
                                                <th class="min-tablet">Description</th>                                               
                                                <th class="min-tablet">Document Type</th>												
                                                <th class="min-tablet">Invoice No</th>
                                                <th class="min-tablet">Regional Expense</th>
                                                <th class="min-tablet">Amount</th>
                                                <th class="min-tablet">Balance</th>
												<th class="min-tablet">Status</th>
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