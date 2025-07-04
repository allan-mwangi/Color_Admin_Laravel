@extends('layouts.default', [
	'paceTop' => true,
	'appSidebarHide' => true,
	'appHeaderHide' => true,
	'appContentClass' => 'p-0'
])

@section('title', 'Login Page')

@section('content')
	<!-- BEGIN login -->
	<div class="login login-v2 fw-bold">
		<!-- BEGIN login-cover -->
		<div class="login-cover">
			<div class="login-cover-img" style="background-image: url(/assets/img/login-bg/login-bg-17.jpg)" data-id="login-cover-image"></div>
			<div class="login-cover-bg"></div>
		</div>
		<!-- END login-cover -->
		
		<!-- BEGIN login-container -->
		<div class="login-container">
			<!-- BEGIN login-header -->
			<div class="login-header">
				<div class="brand">
					<div class="d-flex align-items-center">
						<span class="logo"></span> <b>Estates &amp; Housing Management System
					</div>
					<small>User Login</small>
				</div>
				<div class="icon">
					<i class="fa fa-lock"></i>
				</div>
			</div>
			<!-- END login-header -->
			
			<!-- BEGIN login-content -->
			<div class="login-content">
								
					<div class="mb-20px">
						<a href="{{ url("/google/auth/redirect")}}" class="btn btn-theme d-block w-100 h-45px btn-lg">Sign in with Corporate Email</a>
					</div>
					<!--<div class="text-gray-500">
						Not a member yet? Click <a href="javascript:;" class="text-white">here</a> to register.
					</div>-->
				
			</div>
			<!-- END login-content -->
		</div>
		<!-- END login-container -->
	</div>
	<!-- END login -->
	
	<!-- BEGIN login-bg -->
	<div class="login-bg-list clearfix">
		<div class="login-bg-list-item active"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="/assets/img/login-bg/login-bg-17.jpg" style="background-image: url(/assets/img/login-bg/login-bg-17.jpg)"></a></div>
		<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="/assets/img/login-bg/login-bg-16.jpg" style="background-image: url(/assets/img/login-bg/login-bg-16.jpg)"></a></div>
		<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="/assets/img/login-bg/login-bg-15.jpg" style="background-image: url(/assets/img/login-bg/login-bg-15.jpg)"></a></div>
		<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="/assets/img/login-bg/login-bg-14.jpg" style="background-image: url(/assets/img/login-bg/login-bg-14.jpg)"></a></div>
		<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="/assets/img/login-bg/login-bg-13.jpg" style="background-image: url(/assets/img/login-bg/login-bg-13.jpg)"></a></div>
		<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="/assets/img/login-bg/login-bg-12.jpg" style="background-image: url(/assets/img/login-bg/login-bg-12.jpg)"></a></div>
	</div>
	<!-- END login-bg -->
@endsection

@push('scripts')
	<script src="{{ asset("assets/js/demo/login-v2.demo.js")}}"></script>
@endpush
