			@extends('layouts.app')
			@section('title', 'All Hospital')
            @section('content')	

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">                 
							
							<div class="row">
								<div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">All Hospital</span>
									                                                          
                                        <a href="/Hospitals/newhospital"> <label class="btn btn-transparent blue btn-outline btn-circle btn-sm active"><i class="fa fa-plus"></i>Add Record </label>  </a>             
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
								   </form>
									<meta name="csrf-token" content="{{ csrf_token() }}">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                         <thead>
                                            <tr>
                                                <th class="all">ID</th>												                                               
                                                <th class="min-phone-l">Hospital Name</th>                                                                                             
                                                <th class="all">MobileNo</th>                                               
                                                <th class="desktop">Email</th>                                                
                                                <th class="all">Edit</th>
                                                <th class="all">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										    @foreach($hospital as $key)
                                            <tr>
                                                <td>{{ $key->hosptalid }}</td>												                           												
                                                <td>{{ $key->hosptalname }}</td>                                                
                                                <td>{{ $key->mobile }}</td>                                                
                                                <td>{{ $key->email }}</td>                                               
                                                <td><a  href="{{ url('Hospitals/loadedits/' . $key->hosptalid )}}" ><i class="fa fa-pencil m-r-5"></i> Edit</a></td>
                                                <td>
												  
												  <a  href="#" onclick="deleterecord('{{ url('Hospitals/deleterecord/hosptal/hosptalid/'.$key->hosptalid )}}')" class="delete" ><i class="fa fa-trash-o"></i> Delete</a>
												 
												</td>
											
                                            </tr>
											 @endforeach
                                           <tfoot
                                            <tr>
                                                 <th class="all">ID</th>												                                               
                                                <th class="min-phone-l">Doctor Name</th>                                                                                             
                                                <th class="all">MobileNo</th>                                               
                                                <th class="desktop">Email</th>                                                
                                                <th class="all">Edit</th>
                                                <th class="all">Delete</th>
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