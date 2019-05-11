@extends('layouts.app')
@section('content')
     <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
         <div class="page-content">
					<div class="row">
                        <div class="col-md-12">
                            <div class="m-heading-1 border-green m-bordered">
                                <h3>Upload your Hosptal Invoices and Discharge Sheet</h3>                                
                            </div>
                            <form id="fileupload1" action="/Uploadreceipt/upload" method="post" enctype="multipart/form-data">
                                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
								 <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
								 <div class="form-group row {{ $errors->has('hosptal') ? ' has-error' : '' }}">
										<label class="control-label col-md-3">Select Hosptal
											<span class="required" aria-required="true"> * </span>
										</label>
										<div class="col-md-5">
											<select class="form-control input-height"  name="hosptal">
											     <option value="{{ old('hosptal') }}">{{ old('hosptal') }}</option>
												@foreach($hosptals as $key)
												   <option value="{{ $key->hosptalid }}">{{ $key->hosptalname }}</option>
												@endforeach
											</select>
											   @if ($errors->has('hosptal'))
												<span class="help-block ">
													{{ $errors->first('hosptal') }}
												</span>
											   @endif
										</div>
                                </div>	 
								<div class="form-group row {{ $errors->has('documenttype') ? ' has-error' : '' }}">
										<label class="control-label col-md-3">Select Document Type
											<span class="required" aria-required="true"> * </span>
										</label>
										<div class="col-md-5">
											<select class="form-control input-height" multiple name="documenttype">
											     <option value="{{ old('documenttype') }}">{{ old('documenttype') }}</option>
												@foreach($documenttypes as $key)
												   <option value="{{ $key->type }}">{{ $key->documenttype }}</option>
												@endforeach
											</select>
											   @if ($errors->has('documenttype'))
												<span class="help-block ">
													{{ $errors->first('documenttype') }}
												</span>
											   @endif
										</div>
                                </div>
								 <div class="form-group row {{ $errors->has('invoiceno') ? ' has-error' : '' }}">
											<label class="control-label col-md-3">Invoice No.
												<span class="required" aria-required="true"> * </span>
											</label>
												<div class="col-md-5">
												<input type="text" name="invoiceno" data-required="1" placeholder="Enter Your Invoice No" class="form-control input-height" value="{{ old('invoiceno') }}"> 
														@if ($errors->has('invoiceno'))
														<span class="help-block ">
															{{ $errors->first('invoiceno') }}
														</span>
														 @endif
												</div>                                                            
								</div>
								
								<div class="form-group row  {{ $errors->has('files') ? ' has-error' : '' }}">
								  <label class="control-label col-md-3">Select Invoice/Bill to upload
											<span class="required" aria-required="true"> * </span>
								  </label>
											<div class="row  fileupload-buttonbar">
												<div class="col-lg-7">
												  
													<!-- The fileinput-button span is used to style the file input field as button -->
													<span class="btn blue 1fileinput-button">
														<i class="fa fa-plus"></i>
														<span> Add files... </span>
													<input type="file" name="files[]" multiple="" value="" > </span>
													    @if ($errors->has('files'))
														<span class="help-block ">
															{{ $errors->first('files') }}
														</span>
														 @endif
													<button type="hidden" class="btn blue start hidden">
														<i class="fa fa-upload"></i>
														<span> Start upload </span>
													</button>
													<button type="hidden" class="btn warning cancel hidden">
														<i class="fa fa-ban-circle"></i>
														<span> Cancel upload </span>
													</button>
													<button type="hidden" class="btn red delete hidden">
														<i class="fa fa-trash"></i>
														<span> Delete </span>
													</button>
													<input type="checkbox" class="toggle hidden">
													<!-- The global file processing state -->
													<span class="fileupload-process"> </span>
												</div>
												<!-- The global progress information -->
												<div class="col-lg-5 fileupload-progress fade">
													<!-- The global progress bar -->
													<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar progress-bar-success" style="width:0%;"> </div>
													</div>
													<!-- The extended global progress information -->
													<div class="progress-extended"> &nbsp; </div>
												</div>
												
											</div>
										      
							    </div>
                                <!-- The table listing the files available for upload/download -->
                                <table role="presentation" class="table table-striped clearfix">
                                    <tbody class="files"> </tbody>
                                </table>
								 <div class="form-group row">
                                                 <label class="control-label col-md-3">
                                                 </label>
                                                 <div class="col-md-5">
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
													
								 <div class="form-group row ">
								    <label class="control-label col-md-3">
											<span class="required" aria-required="true"> * </span>
								   </label>
									<div class="col-md-5">
										<button type="submit" class="btn btn-info">Complete Upload</button>
										
									</div>
								</div>
								
                            </form>
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Notes</h3>
                                </div>
                                <div class="panel-body">
                                    <ul>
                                        <li> The maximum file size for uploads in this demo is
                                            <strong>5 MB</strong> (default file size is unlimited). </li>
                                        <li> Only image files (
                                            <strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction). </li>
                                        <li> Uploaded files will be deleted automatically after
                                            <strong>5 minutes</strong> (demo setting). </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- The blueimp Gallery widget -->
                    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                        <div class="slides"> </div>
                        <h3 class="title"></h3>
                        <a class="prev"> ‹ </a>
                        <a class="next"> › </a>
                        <a class="close white"> </a>
                        <a class="play-pause"> </a>
                        <ol class="indicator"> </ol>
                    </div>
                    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
                    <script id="template-upload" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
                        <tr class="template-upload fade">
                            <td>
                                <span class="preview"></span>
                            </td>
                            <td>
                                <p class="name">{%=file.name%}</p>
                                <strong class="error text-danger label label-danger"></strong>
                            </td>
                            <td>
                                <p class="size">Processing...</p>
                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                </div>
                            </td>
                            <td> {% if (!i && !o.options.autoUpload) { %}
                                <button class="btn blue start" disabled>
                                    <i class="fa fa-upload"></i>
                                    <span>Start</span>
                                </button> {% } %} {% if (!i) { %}
                                <button class="btn red cancel">
                                    <i class="fa fa-ban"></i>
                                    <span>Cancel</span>
                                </button> {% } %} </td>
                        </tr> {% } %} </script>
                    <!-- The template to display files available for download -->
                    <script id="template-download" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
                        <tr class="template-download fade">
                            <td>
                                <span class="preview"> {% if (file.thumbnailUrl) { %}
                                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery>
                                        <img src="{%=file.thumbnailUrl%}">
                                    </a> {% } %} </span>
                            </td>
                            <td>
                                <p class="name"> {% if (file.url) { %}
                                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}
                                    <span>{%=file.name%}</span> {% } %} </p> {% if (file.error) { %}
                                <div>
                                    <span class="label label-danger">Error</span> {%=file.error%}</div> {% } %} </td>
                            <td>
                                <span class="size">{%=o.formatFileSize(file.size)%}</span>
                            </td>
                            <td> {% if (file.deleteUrl) { %}
                                <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
                                    <i class="fa fa-trash-o"></i>
                                    <span>Delete</span>
                                </button>
                                <input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}
                                <button class="btn yellow cancel btn-sm">
                                    <i class="fa fa-ban"></i>
                                    <span>Cancel</span>
                                </button> {% } %} </td>
                        </tr> {% } %} </script>
                    <!-- END PAGE BASE CONTENT -->
					
                </div>
                <!-- END CONTENT BODY -->
            </div>
		  </div><!-- Chezea hapa ndani buda-->
					    
	</div>               
@endsection