@extends('layouts.default', [
	'paceTop' => true,
	'appSidebarHide' => true,
	'appHeaderHide' => true,
	'appContentClass' => 'p-0'
])

@section('title', '404 Error Page')

@section('content')
	<!-- BEGIN error -->
	<div class="error">
		<div class="error-code">404</div>
		<div class="error-content">
			<div class="error-message">We couldn't find it...</div>
			<div class="error-desc mb-4">
				The page you're looking for doesn't exist. <br />
				Perhaps, there pages will help find what you're looking for.
			</div>
			<div>
				<a href="/" class="btn btn-success px-3">Go Home</a>
			</div>
		</div>
	</div>
	<!-- END error -->
@endsection
        
