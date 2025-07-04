@extends('layouts.default')

@section('title', 'Home Page')

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-end">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Users</a></li>
		<li class="breadcrumb-item active"><a href="javascript:;">Add New User</a></li>
	</ol>
    
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">&nbsp;&nbsp;&nbsp;</h1>
	<!-- end page-header -->

	<!-- begin panel -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<h4 class="panel-title">Edit User Details</h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="panel-body">
            
        <form data-parsley-validate="true" method=post action="{{ url("users") }}">
			@csrf
			<div class="form-group row mb-3">
				<label class="col-lg-4 col-form-label form-label" for="fullname">Full Name * :</label>
				<div class="col-lg-8">
					<input class="form-control" type="text" id="full_name" name="full_name" placeholder="Enter the full names of this user" data-parsley-required="true"/>
				</div>
			</div>
			<div class="form-group row mb-3">
				<label class="col-lg-4 col-form-label form-label" for="email">Staff Email * :</label>
				<div class="col-lg-8">
					<input class="form-control" type="text" id="staff_email" name="staff_email" placeholder="Enter the corporate email of this user" data-parsley-required="true" data-parsley-type="email"/>
				</div>
			</div>
			<div class="form-group row mb-3">
				<label class="col-lg-4 col-form-label form-label" for="email">Students * :</label>
				<div class="col-lg-8">
					<input type="checkbox" class="form-check-input" name="save_student"/> Save &nbsp;&nbsp;&nbsp;<input type="checkbox" class="form-check-input" name="edit_student"/> Edit&nbsp;&nbsp;&nbsp;<input type="checkbox" class="form-check-input" name="delete_student"/>Delete&nbsp;&nbsp;&nbsp;<input type="checkbox" class="form-check-input" name="view_student"/> View
				</div>
			</div>				
			<div class="form-group row mb-3">
				<label class="col-lg-4 col-form-label form-label" for="email">Users * :</label>
				<div class="col-lg-8">
					<input type="checkbox" class="form-check-input" name="save_users"/> Save &nbsp;&nbsp;&nbsp;<input type="checkbox" class="form-check-input" name="edit_users"/> Edit&nbsp;&nbsp;&nbsp;<input type="checkbox" class="form-check-input" name="delete_users"/> Delete&nbsp;&nbsp;&nbsp;<input type="checkbox" class="form-check-input" name="view_users"/> View
				</div>
			</div>
			<div class="form-group row mb-3">
				<label class="col-lg-4 col-form-label form-label" for="email">Audit Trail * :</label>
				<div class="col-lg-8">
					<input type="checkbox" class="form-check-input" name="view_audit_trail"/> View
				</div>
			</div>	
					
			<div class="form-group row mb-3">
				<label class="col-lg-4 col-form-label form-label" for="email"> </label>
				<div class="col-lg-8">
					<input type="submit" value="Save" class="btn btn-primary"> &nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="btn btn-secondary" value="Clear">
				</div>
			</div>
		</div>
	</div>
	<!-- end panel -->
@endsection
@push("scripts")
<script src="{{ asset("assets/plugins/parsleyjs/dist/parsley.min.js")}}"></script>
@endpush