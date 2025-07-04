@extends('layouts.default')

@section('title', 'Home Page')

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-end">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Sample Page</a></li>
		<li class="breadcrumb-item active"><a href="javascript:;">Sub Page</a></li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">How to Configure Color Admin in a new Laravel Project</h1>
	<!-- end page-header -->

<!-- BEGIN row -->
	<div class="row">
		<!-- BEGIN col-10 -->
		<div class="col-xl-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
				    <h4 class="panel-title"></h4>
				    <div class="panel-heading-btn">
				    <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
				    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
				    <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
				 </div>
			</div>
			<div class="panel-body">
			    <p>1. Copy this folder to a new location or server where you wish to develop from.</p>
			    <p>2. Update the dependencies by executing the command 'composer update' in the terminal in the path of the system's root location <b>e.g. /var/www/html/color_admin_laravel/.</b>
			    <br>The assumption is that <b>composer</b> is installed and available for global use in the terminal</p>
			    <p>3. Install UI dependencies by running the following commands in the terminal in this sequence <b>'npm install'</b> then <b>'npm run dev'</b> Ensure that the current path is in the root of your project <b>  e.g. /var/www/html/color_admin_laravel/.</b>
			    <br>The assumption is that <b>node and npm</b> is installed and available for global use in the terminal</p>			    
			    <p>4. Configure the database settings in the '.env' file</p>
			    <p>5. Configure the <b>'sign in with google credentials'</b>  in the <b>'oauth_credentials'</b> file in the config folder</p>
			    <p>6. Enter the name of your system in the app.php file in config folder. Update the 'name' property to the name of your system</p>
			    <p>7. Configure the database settings in the '.env' file</p>
			    <p>8. You can now proceed to do further application development. The users and audit trail are already configured and ready for use. <br>You need to make further changes to all models for audit trail to work in other models
			</div>
		</div>	
		<!-- END col-10 -->
	</div>
	</div>
	<!-- END row -->
@endsection