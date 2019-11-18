			@extends('layouts.app')
			@section('title', 'All Insurance Covers')
            @section('content')	

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">                 
							
							<div class="row">
								<div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">All Assigned Covers</span>
									                                                          
                                        <a href="/covers/assignnewcover"> <label class="btn btn-transparent blue btn-outline btn-circle btn-sm active"><i class="fa fa-plus"></i>Add Record </label>  </a>             
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                         <thead>
                                            <tr>
                                                <th class="all">No</th>
                                                <th class="all">IMSNO</th>                                                
                                                <th class="all">First Name</th>                                                
                                                <th class="all">Last Name</th> 
												<th class="all">Cover</th>												
                                                <th class="all">Start Date</th>                                              
                                                <th class="all">Last Date</th>                                              
                                                <th class="all">Expiry Status</th>                                              
                                                <th class="all">amount</th>                   
                                                <th class="all">Status</th>                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										    @foreach($covers as $key)
                                            <tr>
                                                <td>{{ $key->PatientId }}</td>
                                                <td>{{ $key->IMSNO }}</td>
                                                <td>{{ $key->FirstName }}</td>
                                                <td>{{ $key->LastName }}</td>                                                
                                                <td>{{ $key->covername }}</td>                                                
                                                <td>{{ date('d/m/Y',strtotime($key->startdate)) }}</td>                                                
                                                <td>{{ date('d/m/Y',strtotime($key->expirydate)) }}</td>                                           
                                                <td>@if (date('Y-m-d',strtotime($key->expirydate))>(date('Y-m-d')))  {{ "Active" }} @else {{ "Expired" }} @endif</td>                                           
                                                <td>  {{ number_format($key->amount,2) }}</td> 
												<td>  {{ $key->status }}</td> 
                                            </tr>
											 @endforeach
                                           <tfoot
                                            <tr>
                                                <th class="all">No</th>
                                                <th class="ALL">IMSNO</th>                                                
                                                <th class="ALL">First Name</th>                                                
                                                <th class="all">Last Name</th> 
												<th class="all">Cover</th>												
                                                <th class="all">Start Date</th>                                              
                                                <th class="all">Last Date</th>												
                                                <th class="all">Expiry Status</th>       											
                                                <th class="all">Amount</th>       											
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