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
                                        <span class="caption-subject bold uppercase">All Uploaded photos</span>
									                                                          
                                        <a href="/Uploadreceipt/newpost"> <label class="btn btn-transparent blue btn-outline btn-circle btn-sm active"><i class="fa fa-plus"></i>Upload </label>  </a>             
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
                                                <th class="min-tablet">Document Type</th>
												 <th class="min-tablet">Hosptal</th>
                                                <th class="min-tablet">Invoice No</th>
                                                <th class="all">Date and Time Uploaded</th>
                                              
                                                <th class="all">View Invoice</th>
                                                <th class="all">Create Bill Summary</th>
                                               
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
                                                <td>{{ date('F j, Y, g:i a',strtotime($document->datecreated)) }}</td>
                                                
                                                <td><a  class="text-success" href="{{ asset('image/'. $document->document ) }}" ><i class="fa fa-download m-r-5"></i> View Invoice</a></td>
                                                <td><a class="text-danger" href="{{ url('Uploadreceipt/billsum/' . $document->invoiceno )}}" ><i class="fa fa-plus m-r-5"></i> Generate Bill</a></td>
                                               											
                                            </tr>
											 @endforeach
                                           <tfoot
                                            <tr>
                                                <th class="all">Docid</th>
                                                <th class="min-phone-l">All Names</th>
                                                <th class="min-tablet">Description</th>                                               
                                                <th class="min-tablet">Document Type</th>
												 <th class="min-tablet">Hosptal</th>
                                                <th class="min-tablet">Invoice No</th>
                                                <th class="all">Date and Time Uploaded</th>
                                              
                                                <th class="all">View Invoice</th>
                                                <th class="all">Create Bill Summary</th>
                                                
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