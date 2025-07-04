@extends('layouts.default')

@section('title', 'Home Page')
@push("css")
<link rel="stylesheet" href="{{ asset("assets/css/datatables.min.css")}}">
<link rel="stylesheet" href="{{ asset("assets/css/jquery.dataTables.yadcf.css")}}">
<script src="{{ asset("assets/js/popper.min.js")}}"></script>
<style type="text/css">
<!--
.dataTables_filter label,.dataTables_filter input
{
display:none;
}
//-->
</style>

@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-end">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Users</a></li>
		<li class="breadcrumb-item active"><a href="javascript:;">User Report</a></li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">&nbsp;&nbsp; </h1>
	<!-- end page-header -->

	<!-- begin panel -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<h4 class="panel-title">User Report</h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="panel-body">
        <select class="export_format" style="align:center">
                            <option>PDF</option>
                            <option>Print</option>
                            <option>CSV</option>
                            <option>Excel</option>
                            <option>MS-Word</option>
                            <option>TXT</option>
                            </select>
                            <button class="btn btn-sm btn-primary" onclick='ExportReport();'>Export Current View</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="" id="columnFilter"></span>
<table id="userRequestsTable" class="table table-striped table-bordered align-middle text-nowrap" style="width:100%">
<thead>
<tr><th>Name</th><th>Email Address</th><th>Students</th><th>User Management</th><th>Audit Trail</th><th data-orderable="false">Edit</th></tr>
<tr><th></th><th></th>
<th data-orderable="false">
		<span type="button" data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Save"><i class="fa fa-save"></i></span>&nbsp;&nbsp;
		<span type="button" data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Update"><i class="fa fa-edit"></i></span>&nbsp;&nbsp;
		<span type="button" data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Delete"><i class="fa fa-trash"></i></span>&nbsp;&nbsp;
		<span type="button" data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="View"><i class="fa fa-camera"></i></span>&nbsp;&nbsp;
</th>
<th data-orderable="false">
		<span type="button" data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Save"><i class="fa fa-save"></i></span>&nbsp;&nbsp;
		<span type="button" data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Update"><i class="fa fa-edit"></i></span>&nbsp;&nbsp;
		<span type="button" data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Delete"><i class="fa fa-trash"></i></span>&nbsp;&nbsp;
		<span type="button" data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="View"><i class="fa fa-camera"></i></span>&nbsp;&nbsp;
</th>

<th data-orderable="false">
		<span type="button" data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="View"><i class="fa fa-camera"></i></span>&nbsp;&nbsp;
</th>
<th data-orderable="false">
</th>
</tr>
</thead>
<tbody>
@foreach($users as $user)
<tr><td><a href='{{ url("users/".Illuminate\Support\Facades\Crypt::encryptString($user->id)."/edit") }}'>{{ ucwords($user->name)}} </a></td><td><a href='{{ url("users/".Illuminate\Support\Facades\Crypt::encryptString($user->id)."/edit") }}'>{{ strtolower($user->email) }}</a></td>

<td>
@if(Illuminate\Support\Str::contains($user->user_permissions, 'save_student'))
<button id=can_save_student{{$loop->iteration}} value=can_save_student data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Can Save Students" type="button" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button>
@else
<button id=cannot_save_student{{$loop->iteration}} value=cannot_save_student data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Cannot Save Students" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
@endif
@if(Illuminate\Support\Str::contains($user->user_permissions, 'edit_student'))
<button id=can_edit_student{{$loop->iteration}} value=can_edit_student data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Can Edit Student" type="button" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button>
@else
<button id=cannot_edit_student{{$loop->iteration}} value=cannot_edit_student data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Cannot Edit Student" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
@endif
@if(Illuminate\Support\Str::contains($user->user_permissions, 'delete_student'))
<button id=can_delete_student{{$loop->iteration}} value=can_delete_student data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Can Delete Students" type="button" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button>
@else
<button id=cannot_delete_student{{$loop->iteration}} value=can_delete_student data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Cannot Delete Students" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
@endif
@if(Illuminate\Support\Str::contains($user->user_permissions, 'view_student'))
<button id=can_view__student{{$loop->iteration}} value=can_view_braille_student data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Can View Students" type="button" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button></td>
@else
<button id=can_view_student{{$loop->iteration}} value=can_view_student data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Cannot View Students" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button></td>
@endif
</td>
<td>
@if(Illuminate\Support\Str::contains($user->user_permissions, 'save_users'))
<button id=can_save_debrailing_requests{{$loop->iteration}} value=can_save_user data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Can Save User" type="button" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button>
@else
<button id=cannot_save_debrailing_requests{{$loop->iteration}} value=cannot_save_user data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Cannot Save User" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
@endif
@if(Illuminate\Support\Str::contains($user->user_permissions, 'edit_user'))
<button id=can_edit_debrailing_requests{{$loop->iteration}} value=can_edit_user data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Can Edit User" type="button" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button>
@else
<button id=cannot_edit_debrailing_requests{{$loop->iteration}} value=cannot_edit_user data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Cannot Edit User" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
@endif
@if(Illuminate\Support\Str::contains($user->user_permissions, 'delete_user'))
<button id=can_delete_debrailing_requests{{$loop->iteration}} value=can_delete_user data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Can Delete User" type="button" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button>
@else
<button id=cannot_delete_debrailing_requests{{$loop->iteration}} value=can_delete_debrailing_requests data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Cannot Delete User" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button>
@endif
@if(Illuminate\Support\Str::contains($user->user_permissions, 'view_users'))
<button id=can_view_debrailing_requests{{$loop->iteration}} value=can_view_user data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Can View User" type="button" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button></td>
@else
<button id=can_view_debrailing_requests{{$loop->iteration}} value=can_view_user data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Cannot View User" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button></td>
@endif
</td>
<td>
@if(Illuminate\Support\Str::contains($user->user_permissions, 'view_audit_trail'))
<button id=can_view_audit_trail{{$loop->iteration}} value=can_view_audit_trail data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Can View Exam Audit Trail" type="button" class="btn btn-success btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button></td>
@else
<button id=can_view_audit_trail{{$loop->iteration}} value=can_view_audit_trail data-container="body" data-toggle="popover" data-trigger="hover"  data-placement="top" data-content="Cannot View Exam Requests" type="button" class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i></button></td>
@endif

<td><a href={{ url("users/".Illuminate\Support\Facades\Crypt::encryptString($user->id)."/edit") }} type=button class="btn btn-primary btn-block btn-sm">Edit Rights</a></td></tr>
@endforeach
</tbody>
</table>
		</div>
	</div>
	<!-- end panel -->
@endsection
@push('scripts')
<script src="{{ asset("assets/js/jquery.dataTables.min.js") }}"> </script>
<script src="{{ asset("assets/js/jquery.dataTables.yadcf.js") }}"> </script>
<script>
$(document).ready(function() {
//lBfrtlttip
$('[data-toggle="popover"]').popover();
    var oTable=$('#userRequestsTable').DataTable( {
      				"dom": 'lBtlip',
                    "fixedHeader": true,
					"pagingType": "full_numbers",
					"deferRender": true,
					"scrollX": "true;",
					"scrollY": "true",								
					"lengthMenu": [[10, 25, 50, 100,-1], [10, 25, 50, 100,"All"]],
					"buttons": [
					{"extend": 'colvis',"text": 'Show / Hide Columns',"container": '#columnFilter',"postfixButtons": ['colvisRestore']
					}],
					"language": {
			                "infoFiltered": " - filtered from _MAX_ records",
					"processing": "Please wait while users are being retrieved",
					"loadingRecords": "Please wait while users are being retrieved",
					"emptyTable":     "No users are available. Remove any filters applied(if any) or reload the page",
					"info":           "Showing _START_ to _END_ of _TOTAL_ users",
					"infoEmpty":      "No users or info to display",
					"infoFiltered":   "(filtered from _MAX_ total maintenance request entries)",
					"infoPostFix":    "",
					"thousands":      ",",
					"lengthMenu":     "Show _MENU_ entries",
					"search":         "Filter users:",
					"zeroRecords":    "No users matched your search criteria",
					"paginate": {
						     "first":      "First",
						     "last":       "Last",
		         			     "next":       "Next",
						     "previous":   "Previous"
						    },
					"aria": {
					        "sortAscending":  ": activate to sort column ascending",
					        "sortDescending": ": activate to sort column descending"
					},
	
            			}
    } );
	setTimeout(function () {
        oTable.columns.adjust().draw();
    }, 500); // Slight delay to let everything settle

    yadcf.init(oTable,[
	{column_number : 0, filter_type: "text",filter_default_label: "filter by name"},
	{column_number : 1, filter_type: "text",filter_default_label: "filter by email"}
	]
	);
} );
</script>

@endpush