@extends('layouts.default')

@section('title', 'Home Page')

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-end">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Students</a></li>
		<li class="breadcrumb-item active"><a href="javascript:;">Register Student </a></li>
	</ol>
    
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">&nbsp;&nbsp;&nbsp;</h1>
	<!-- end page-header -->

	<!-- begin panel -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<h4 class="panel-title">Register Student Particulars</h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="panel-body">            
        	<form method="post" action="{{ url("students") }}" data-parsley-validate="true">
			@csrf
			<div class="form-group row mb-3">
				<label class="col-lg-4 col-form-label form-label" for="fullname">Full Name * :</label>
				<div class="col-lg-8">
					<input class="form-control" type="text" id="full_name" name="full_name" placeholder="Enter the full name of the student" data-parsley-required="true" />
				</div>
			</div>
			<div class="form-group row mb-3">
				<label class="col-lg-4 col-form-label form-label" for="regno">Full Registration No: * :</label>
				<div class="col-lg-8">
					<input type="text" data-parsley-required="true"  class="form-control" name=reg_no placeholder="Enter the full registration number of the student" />
				</div>
			</div><div class="form-group row mb-3">
				<label class="col-lg-4 col-form-label form-label" for="mobile_number">Mobile Number * :</label>
				<div class="col-lg-8">
					<input type="text" data-parsley-required="true" data-parsley-type="digits" class="form-control" name=mobile_number placeholder="Enter the student's mobile number" />
				</div>
			</div>
			<div class="form-group row mb-3">
				<label class="col-lg-4 col-form-label form-label" for="email">Email * :</label>
				<div class="col-lg-8">
					<input data-parsley-required="true" data-parsley-type="email" class="form-control" name=email placeholder="Enter the student's full corporate email" />
				</div>
			</div>
			
			<div class="form-group row mb-3">
				<label class="col-lg-4 col-form-label form-label"> </label>
				<div class="col-lg-8">
					<input type="submit" value="Save" class="btn btn-primary"> &nbsp;&nbsp;&nbsp;&nbsp;
					<input type="reset" value="Clear" class="btn btn-secondary">
				</div>
			</div>
		</form>
		</div>
	</div>
	<!-- end panel -->
@endsection
@push("scripts")
<script src="{{ asset("assets/plugins/parsleyjs/dist/parsley.min.js")}}"></script>
@endpush