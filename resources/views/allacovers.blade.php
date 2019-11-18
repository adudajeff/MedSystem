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
								</form>
									<meta name="csrf-token" content="{{ csrf_token() }}">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                         <thead>
                                            <tr>
                                                <th class="all">No</th>
                                                <th class="min-phone-l">First Name</th>                                                
                                                <th class="all">Last Name</th> 
												<th class="all">Cover</th>												
                                                <th class="all">Start Date</th>                                              
                                                <th class="all">Last Date</th>                                              
                                                <th class="all">Expiry Status</th>                                              
                                                <th class="all">Amount</th>                   
                                                <th class="all">Spent Amount</th>                   
                                                <th class="all">Balance</th>                   
                                                <th class="all">Status</th>                   
                                                <th class="all">Edit</th>
                                                <th class="all">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										    @foreach($covers as $key)
                                            <tr>
                                                <td>{{ $key->PatientId }}</td>
                                                <td>{{ $key->FirstName }}</td>
                                                <td>{{ $key->LastName }}</td>                                                
                                                <td>{{ $key->covername }}</td>                                                
                                                <td>{{ date('d/m/Y',strtotime($key->startdate)) }}</td>                                                
                                                <td>{{ date('d/m/Y',strtotime($key->expirydate)) }}</td>                                           
                                                <td>@if (date('Y-m-d',strtotime($key->expirydate))>(date('Y-m-d')))  {{ "Active" }} @else {{ "Expired" }} @endif</td>                                           
                                                <td>  {{ number_format($key->amount,2) }}</td> 
                                                <td>  {{ number_format($key->reconamount,2) }}</td> 
                                                <td>  {{ number_format(($key->amount-$key->reconamount),2) }}</td> 
												<td>  {{ $key->status }}</td>                
                                                <td><a  href="{{ url('covers/loadedits/'. $key->coverid.'/'. $key->PatientId ) }}" ><i class="fa fa-pencil m-r-5"></i> Edit</a></td>
                                                <td><a  href="#" onclick="deleterecord('{{ url('covers/deleterecord/insurancecover/TransId/'.$key->TransId )}}')" class="delete" ><i class="fa fa-trash-o"></i> Delete</a></td>
											
                                            </tr>
											 @endforeach
                                           <tfoot
                                            <tr>
                                                <th class="all">No</th>
                                                <th class="min-phone-l">First Name</th>                                                
                                                <th class="all">Last Name</th> 
												<th class="all">Cover</th>												
                                                <th class="all">Start Date</th>                                              
                                                <th class="all">Last Date</th>												
                                                <th class="all">Expiry Status</th>       											
                                                <th class="all">Amount</th> 
												<th class="all">Spent Amount</th>          											
												<th class="all">Balance</th>          											
                                                <th class="all">Status</th>       											
                                                <th class="none">edit</th>
                                                <th class="none">delete</th>
                                            </tr>
                                        </tfoot>
                                        </tbody>
                                    </table>
									</form>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
					</div><!-- Chezea hapa ndani buda-->
					      <!-- END CONTENT BODY -->
			   </div> 
		@endsection