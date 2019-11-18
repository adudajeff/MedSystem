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
                                        <span class="caption-subject bold uppercase">BILLS SUMMARY RECONCILIATION</span>
									                                                          
                                        
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                         <thead>
                                            <tr>
                                                <th class="all">Invoiceno</th>
                                                <th class="min-phone-l">All Names</th> 
												<th class="all">Date and Time </th>												
                                                <th class="min-tablet">Amount</th>                                               
                                                <th class="min-tablet">View Bill Summary</th>                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										    @foreach($billsum as $key)
                                            <tr>
                                                <td>{{ $key->invoiceno }}</td>
                                                <td>{{ $key->FirstName." ".$key->LastName }}</td> 
											     <td>{{ date('F j, Y, g:i a',strtotime($key->billdate)) }}</td>
                                                <td>{{ number_format($key->amount,2) }}</td>    
                                                <td><a href="/reconcile/loadbillsummaryexpand/{{ $key->invoiceno }}">Reconcile Paid Bill </a></td>                               											
                                            </tr>
											 @endforeach
                                           <tfoot
                                            <tr>
                                                <th class="all">Invoiceno</th>
                                                <th class="min-phone-l">All Names</th> 
												<th class="all">Date and Time</th>
                                                <th class="min-tablet">Amount</th> 
                                                <th class="min-tablet">View Bill Summary</th> 
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