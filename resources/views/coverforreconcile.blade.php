			@extends('layouts.app')
			@section('title', 'All  Covers for Reconciliations')
            @section('content')	

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">                 
							
							<div class="row">
								<div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">All  Covers for Reconciliations</span>
									                                                          
                                        <a href="/covers/assignnewcover"> <label class="btn btn-transparent blue btn-outline btn-circle btn-sm active"><i class="fa fa-plus"></i>Add Record </label>  </a>             
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                         <thead>
                                            <tr>
                                                <th class="all">S.No</th>
                                                <th class="min-phone-l"> Name</th>
												<th class="all">Cover</th>												
                                                <th class="all">Start Date</th>                                              
                                                <th class="all">Last Date</th>
												<th class="all">Cover Amount</th>
												<th class="all">Rec.Amount</th>
                                                <th class="all">Expiry Status</th>           
                                                <th class="all">Payment Status</th>												
                                                <th class="all">Reconcile</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										    @foreach($covers as $key)
                                            <tr>
                                                <td>{{ $key->PatientId }}</td>
                                                <td>{{ $key->FirstName.' '.$key->LastName }}</td>                                                                                           
                                                <td>{{ $key->covername }}</td>                                                
                                                <td>{{ date('d/m/Y',strtotime($key->startdate)) }}</td>                                                
                                                <td>{{ date('d/m/Y',strtotime($key->expirydate)) }}</td>                                           
                                                <td>{{ number_format($key->amount,2) }}</td>                                           
                                                <td>{{ number_format($key->reconamount,2) }}</td>                                           
                                                <td>@if (date('Y-m-d',strtotime($key->expirydate))>(date('Y-m-d')))  <span class="label label-success"> {{ "Active" }} </span> @else <span class="label label-warning"> {{ "Expired" }} </span> @endif</td>                                           
                                                <td>@if ($key->status=='PAID') <span class="label label-success"> {{ $key->status }}</span> @else <span class="label label-warning"> {{ $key->status }}</span> @endif </td>                
                                                <td><a  href="{{ url('reconcile/loadreconcile/'. $key->coverid.'/'. $key->PatientId ) }}" ><i class="fa fa-pencil m-r-5"></i> Reconcile</a></td>
                                                
											
                                            </tr>
											 @endforeach
                                           <tfoot
                                            <tr>
                                                <th class="all">S.No</th>
                                                <th class="min-phone-l">First Name</th> 
												<th class="all">Cover</th>												
                                                <th class="all">Start Date</th>                                              
                                                <th class="all">Last Date</th>	
												<th class="all">Cover Amount</th>
												<th class="all">Rec.Amount</th>
                                                <th class="all">Expiry Status</th>			
                                                <th class="all">Payment Status</th>												
                                                <th class="all">Reconcile</th>                                                
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