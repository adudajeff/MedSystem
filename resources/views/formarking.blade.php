			@extends('layouts.app')
            @section('title','Invoices for Reconciliation')	
            @section('content')	

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">                 
						<form id="form1" action="/reconcile/updatepaid" method="post" >
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
							<?php
							$i=0;
							?>
							@foreach($billsum as $key)
							    <?php
								    if  ($i==1)
									{
									  break;
									  }
						         $name=$key->FirstName." ".$key->LastName;
								 $invoiceno=$key->invoiceno;
								 $i=$i+1;
								 ?>
							@endforeach
							<div class="row">
								<div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        
									      <span class="caption-subject bold uppercase text-primary">Name:{{ $name }}  Invoiceno:{{ $invoiceno }}</span>                                                     
                                        <button type="submit" class="btn btn-info">Mark as Paid</button>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                         <thead>
                                            <tr >
                                                <th class="all"><input class="checkAll" type="checkbox" name="checkAll"></th>
                                              
                                                <th class="all">Invoiceno</th>
                                                <th class="all">All Names</th> 
												<th class="all">Date and Time </th>												
                                                <th class="all">Amount</th>
												<th class="all">Amount Paid</th> 
                                                <th class="all">Status</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
										    <?php
											 $totalpaid=0;
											 $totalbalance=0;
											  $total=0;
											?>
										    @foreach($billsum as $key)
											   <?php 
											    $total=$total+$key->billamount;
												if ($key->Paymentstatus=='PAID')
												{
												$totalpaid=$totalpaid+$key->billamount;
												}
											   ?>
                                            <tr role="row">
                                                <td><input type="checkbox" name="docid[]" value="{{ $key->billno }}"></td>
                                                <td>{{ $key->billno }}</td>
                                                <td>{{ $key->FirstName." ".$key->LastName }}</td> 
											     <td>{{ date('F j, Y, g:i a',strtotime($key->billdate)) }}</td>
                                                <td>{{ number_format($key->billamount,2) }}</td> 
												<td>@if ($key->Paymentstatus=='PAID') {{ number_format($key->billamount,2) }} @else {{ 0 }} @endif</td>    
                                                <td >@if ($key->Paymentstatus=='PAID') <span class="label label-success"> {{ $key->Paymentstatus }}</span> @else <span class="label label-warning"> {{ 'NOT PAID' }}</span> @endif</td>                     											
                                            </tr>
											 @endforeach
										
                                           <tfoot
                                            <tr>
                                                <th class="all">#</th>                                               
                                                <th class="all"></th>
                                                <th class="all"></th> 
												<th class="all text-primary">All Totals(Ksh.) </th>												
                                                <th class="all">{{ number_format($total,2) }}</th>
                                                <th class="all">{{ number_format($totalpaid,2) }}</th> 												
                                                <th class="all">Balance :{{ number_format($total-$totalpaid,2) }}</th> 
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