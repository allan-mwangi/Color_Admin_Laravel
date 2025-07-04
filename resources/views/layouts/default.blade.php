<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('includes.head')
</head>
@php
	$bodyClass = (!empty($appBoxedLayout)) ? 'boxed-layout ' : '';
	$bodyClass .= (!empty($paceTop)) ? 'pace-top ' : $bodyClass;
	$bodyClass .= (!empty($bodyClass)) ? $bodyClass . ' ' : $bodyClass;
	$appSidebarHide = (!empty($appSidebarHide)) ? $appSidebarHide : '';
	$appHeaderHide = (!empty($appHeaderHide)) ? $appHeaderHide : '';
	$appSidebarTwo = (!empty($appSidebarTwo)) ? $appSidebarTwo : '';
	$appSidebarSearch = (!empty($appSidebarSearch)) ? $appSidebarSearch : '';
	$appTopMenu = (!empty($appTopMenu)) ? $appTopMenu : '';
	
	$appClass = (!empty($appTopMenu)) ? 'app-with-top-menu ' : '';
	$appClass .= (!empty($appHeaderHide)) ? 'app-without-header ' : ' app-header-fixed ';
	$appClass .= (!empty($appSidebarEnd)) ? 'app-with-end-sidebar ' : '';
	$appClass .= (!empty($appSidebarWide)) ? 'app-with-wide-sidebar ' : '';
	$appClass .= (!empty($appSidebarHide)) ? 'app-without-sidebar ' : '';
	$appClass .= (!empty($appSidebarMinified)) ? 'app-sidebar-minified ' : '';
	$appClass .= (!empty($appSidebarTwo)) ? 'app-with-two-sidebar app-sidebar-end-toggled ' : '';
	$appClass .= (!empty($appSidebarHover)) ? 'app-with-hover-sidebar ' : '';
	$appClass .= (!empty($appContentFullHeight)) ? 'app-content-full-height ' : '';
	
	$appContentClass = (!empty($appContentClass)) ? $appContentClass : '';
@endphp
<body class="{{ $bodyClass }}">
	@include('includes.component.page-loader')
	
	<div id="app" class="app app-sidebar-fixed {{ $appClass }}">
		
		@includeWhen(!$appHeaderHide, 'includes.header')
		
		@includeWhen($appTopMenu, 'includes.top-menu')
		
		@includeWhen(!$appSidebarHide, 'includes.sidebar')
		
		@includeWhen($appSidebarTwo, 'includes.sidebar-right')
		
		<div id="content" class="app-content {{ $appContentClass }}">
@if ($errors->any())
		        @foreach ($errors->all() as $error)            		
				<div class="alert alert-danger alert-dismissible fade show">
				  {{ $error }}
  				<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div>            
				@endforeach
      	@endif
      
                          @if(Session::has('alert-success') or Session::has('alert-info'))
				@foreach (['success', 'info'] as $msg)
					@if(Session::get('alert-' . $msg)!="")
				            	  <div class="alert alert-success alert-dismissible fade show">
								  {{ Session::get('alert-' . $msg) }}
  								<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
								</div>
				        @endif
				@endforeach
      			@endif

		 	@if(Session::has('alert-danger') or Session::has('alert-danger'))
				@foreach (['danger', 'info'] as $msg)
					@if(Session::get('alert-' . $msg)!="")
					<div class="alert alert-danger alert-dismissible fade show">
  						{{ Session::get('alert-' . $msg) }}
  					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
					</div>

		        		@endif
				@endforeach
			@endif

			@yield('content')
		</div>
		
		@include('includes.component.scroll-top-btn')
		
		
	</div>
	
	@yield('outside-content')
	
	@include('includes.page-js')
</body>
</html>