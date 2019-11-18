			@extends('layouts.app')
			@section('title', 'AAR Lists')
            @section('content')	

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">                 
							
							<div class="row">
								<div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">AAR Lists</span>
									                                                          
                                        <a href="/covers/assignnewcover"> <label class="btn btn-transparent blue btn-outline btn-circle btn-sm active"><i class="fa fa-plus"></i>Add Record </label>  </a>             
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                         <thead>
                                            <tr>
                                                <th class="all">No</th>
                                                <th class="all">Names</th> 
												<th class="all">AAR No</th>												
												<th class="all">Cover</th>												
                                                <th class="all">Start Date</th>                                              
                                                <th class="all">Last Date</th>                                              
                                                <th class="all">Expiry Date</th>                                              
                                                <th class="all">Expiry Status</th>                                              
                                                <th class="all">Amount</th>                   
                                                <th class="all">Used Amount</th>                   
                                                <th class="all">Balance</th>                   
                                                <th class="all">Status</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
										    @foreach($covers as $key)
												@if ($key->covername=="AAR")
												
                                            <tr>
                                                <td>{{ $key->PatientId }}</td>
                                                <td>{{ $key->FirstName." ".$key->LastName }}</td>
                                                <td>{{ $key->AARno }}</td>                                                
                                                <td>{{ $key->covername }}</td>                                                
                                                <td>{{ date('d/m/Y',strtotime($key->startdate)) }}</td>                                                
                                                <td>{{ date('d/m/Y',strtotime($key->expirydate)) }}</td>                                           
                                                <td>{{ date('d/m/Y',strtotime($key->expirydate)) }}</td>                                           
                                                <td>@if (date('Y-m-d',strtotime($key->expirydate))>(date('Y-m-d')))  {{ "Active" }} @else {{ "Expired" }} @endif</td>                                           
                                                <td>  {{ number_format($key->amount,2) }}</td> 
                                                <td>  {{ number_format($key->reconamount,2) }}</td> 
                                                <td>  {{ number_format(($key->amount-$key->reconamount),2) }}</td> 
												<td>  {{ $key->status }}</td> 
                                            </tr>
												@endif
											 @endforeach
                                           <tfoot
                                            <tr>
                                                <th class="all">No</th>
                                                <th class="min-phone-l">Names</th> 
												<th class="all">AAR No</th>												
												<th class="all">Cover</th>												
                                                <th class="all">Start Date</th>                                              
                                                <th class="all">Last Date</th>												
                                                <th class="all">Expiry Date</th>												
                                                <th class="all">Expiry Status</th>       											
                                                <th class="all">Amount</th> 
												<th class="all">Used Amount</th>          											
												<th class="all">Balance</th>          											
                                                <th class="all">Status</th>
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