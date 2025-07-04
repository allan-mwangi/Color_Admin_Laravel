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
						<!--<span class="logo"></span> <b>User Login</b>-->
					</div>
					<!--<small>Restricted to Staff and Student Emails only</small>-->
				</div>				
			</div>
			<!-- END login-header -->
			
			<!-- BEGIN login-content -->
			<div class="login-content">
				<form action="/" method="POST">
					@csrf
					<!--<div class="form-floating mb-20px">
						<input type="text" class="form-control fs-13px h-45px border-0" placeholder="Email Address" id="emailAddress" />
						<label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Email Address</label>
					</div>
					<div class="form-floating mb-20px">
						<input type="password" class="form-control fs-13px h-45px border-0" placeholder="Password" />
						<label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Password</label>
					</div>
					<div class="form-check mb-20px">
						<input class="form-check-input border-0" type="checkbox" value="1" id="rememberMe" />
						<label class="form-check-label fs-13px text-gray-500" for="rememberMe">
							Remember Me
						</label>
					</div>
					-->
					<div class="card">
					<!--<img class="card-img-top" src="/assets/img/gallery/gallery-7.jpg" alt="Card image cap" />-->
					<div class="card-body">
						<br/>
						<h4 class="card-title" style="text-align:center">User Login</h4>
							<div class="card-title">
							<br/>
						<a href="{{ url("/google/auth/redirect") }}" class="btn btn-theme d-block w-100 h-45px btn-lg">Sign in with your Corporate Email</a>
					</div>
						<p class="card-text text-gray">Restricted to Staff and Student Emails only</p>
					</div>
					<br/>
				</div>
					<!--<div class="mb-20px">
						<a href="{{ url("/google/auth/redirect") }}" class="btn btn-theme d-block w-100 h-45px btn-lg">Sign in with your Corporate Email</a>
					</div>-->
					<!--<div class="text-gray-500">
						Not a member yet? Click <a href="javascript:;" class="text-white">here</a> to register.
					</div>-->
				</form>
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
	<script src="/assets/js/demo/login-v2.demo.js"></script>
@endpush
