			@extends('layouts.app')
            @section('content')	

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">                 
							
							<div class="row">
								<div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">All Uploads Report</span>
									                                                          
                                        
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                         <thead>
                                            <tr>
                                                <th class="all">Docid</th>
                                                <th class="min-phone-l">All Names</th>
                                                <th class="min-tablet">Description</th>                                               
                                                <th class="min-tablet">Doc. Type</th>
												<th class="min-tablet">Hospital</th>
                                                <th class="min-tablet">Invoice No</th>
                                                <th class="min-tablet">Invoice date</th>
                                                <th class="min-tablet">Amount</th>
                                                <th class="all">Date/Time Uploaded</th>                                              
                                                <th class="all">View Invoice</th>
                                               
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										    @foreach($documents as $document)
                                            <tr>
                                                <td>{{ $document->docid }}</td>
                                                <td>{{ $document->FirstName." ".$document->LastName }}</td>
                                                <td>{{ $document->document }}</td>
                                                <td>{{ $document->documenttype }}</td>
                                                <td>{{ $document->hosptalname }}</td>
                                                <td>{{ $document->invoiceno }}</td>
                                                <td>{{ date('F j, Y',strtotime($document->Invoicedate)) }}</td>
                                                <td>{{ number_format($document->Amount,2) }}</td>
                                                <td>{{ date('F j, Y',strtotime($document->datecreated)) }}</td>                                               
                                                <td><a  class="text-success" href="{{ asset('image/'. $document->document ) }}" ><i class="fa fa-download m-r-5"></i> View Document</a></td>                                                                                               											
                                            </tr>
											 @endforeach
                                           <tfoot
                                            <tr>
                                                <th class="all">Docid</th>
                                                <th class="min-phone-l">All Names</th>
                                                <th class="min-tablet">Description</th>                                               
                                                <th class="min-tablet">Doc Type</th>
												 <th class="min-tablet">Hospital</th>
                                                <th class="min-tablet">Invoice No</th>
                                                 <th class="min-tablet">Invoice date</th>
                                                <th class="min-tablet">Amount</th>
                                                <th class="all">Date/Time Uploaded</th>                                              
                                                <th class="all">View Invoice</th>
                                                
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