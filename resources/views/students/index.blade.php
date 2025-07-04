@extends('layouts.default')
@push('css')
	 <link rel="stylesheet" href="{{ asset("/css/datatables.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/css/jquery.dataTables.yadcf.css")}}">
    <link href="{{ asset("assets/plugins/select2/dist/css/select2.min.css")}}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap5.css" rel="stylesheet" />

	<style type="text/css">
	<!--
	#booking_requests_filter label, #booking_requests_filter input
	{
	display:none;
	}
.wrap-text {
    white-space: normal !important;
    word-wrap: break-word;
    max-width: 150px; /* Adjust as needed */
}
.dt-button-collection .dt-button.buttons-columnVisibility {
    background: none !important;
    background-color: transparent !important;
    box-shadow: none !important;
    border: none !important;
    padding: 0.25em 1em !important;
    margin: 0 !important;
    text-align: left !important;
}
.dt-button-collection .buttons-columnVisibility:before,
.dt-button-collection .buttons-columnVisibility.active span:before {
    display:block;
    position:absolute;
    top:1.2em;
    left:0;
    width:12px;
    height:12px;
    box-sizing:border-box;
}
.dt-button-collection .buttons-columnVisibility:before {
    content:' ';
    margin-top:-8px;
    margin-left:10px;
    border:1px solid black;
    border-radius:3px;
}
.dt-button-collection .buttons-columnVisibility.active span:before {
    font-family: 'Arial' !important;
    content:'\2714';
    margin-top: -15px;
    margin-left: 12px;
    text-align: center;
    text-shadow: 1px 1px #fff, -1px -1px #fff, 1px -1px #fff, -1px 1px #fff;
}
.dt-button-collection .buttons-columnVisibility span {
    margin-left:17px;    
    float:right;    
}

.dt-down-arrow
{
float:none;
display:none;
}
.dt-button, .buttons-collection, .buttons-colvis span
{
	float:right;
	margin-left:30px;
}

//-->
</style>
@endpush
@push('scripts')
	<script src="{{ asset("js/jquery.dataTables.min.js")}}"></script>
	<!--<script src="{{ asset("assets/plugins/datatables.net/js/dataTables.min.js")}}"></script>
	<script src="{{ asset("js/dataTables.buttons.min.js")}}"></script>
	<script src="{{ asset("assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js")}}"></script>
	<script src="{{ asset("assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
	<script src="{{ asset("assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js")}}"></script>
	<script src="{{ asset("assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js")}}"></script>
	<script src="{{ asset("assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js")}}"></script>
	<script src="{{ asset("assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js")}}"></script>
	<script src="{{ asset("assets/plugins/datatables.net-buttons/js/buttons.html5.min.js")}}"></script>
	<script src="{{ asset("assets/plugins/datatables.net-buttons/js/buttons.print.min.js")}}"></script>
	<script src="{{ asset("assets/plugins/pdfmake/build/pdfmake.min.js")}}"></script>
	<script src="{{ asset("assets/plugins/pdfmake/build/vfs_fonts.js")}}"></script>
	<script src="{{ asset("assets/plugins/jszip/dist/jszip.min.js")}}"></script>-->
	<script src="{{ asset("js/dataTables.bootstrap5.min.js")}}"></script>
	<!--<script src="{{ asset("js/dataTables.buttons.min.js")}}"></script>-->
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="{{ asset("js/jquery.dataTables.yadcf.js")}}"></script>
	<script>
$(document).ready(function() {
/*
		var org_buildButton = $.fn.DataTable.Buttons.prototype._buildButton;
		  $.fn.DataTable.Buttons.prototype._buildButton = function(config, collectionButton) {
		  var button = org_buildButton.apply(this, arguments);
		  $(document).one('init.dt', function(e, settings, json) {
	          if (config.container && $(config.container).length) {
         	  $(button.inserter[0]).detach().appendTo(config.container)
        	  }
		  })    
		    return button;
 		}
		*/
var oTable=$('#booking_requests').DataTable({
"dom": "ltlip",
"scrollY":"300px",
"scrollX":true,
"autowidth":"true",
"columnDefs": [
            { "className": "wrap-text", "targets": [0] } // Change index to target your column
	],
buttons: ['copy', 'csv', 'excel', 'pdf', 'print','colvis'], 	
  });

var buttons = new $.fn.dataTable.Buttons(oTable, {
                buttons: [
                    { extend: 'csv', title: 'Boardroom_Bookings_Report', className: 'csvExport' },
                    { extend: 'excel', title: 'Boardroom_Bookings_Report', className: 'excelExport' },
                    { extend: 'pdf', title: 'Boardroom_Bookings_Report', className: 'pdfExport' },
                    { extend: 'print', title: 'Boardroom_Bookings_Report', className: 'printExport' },
                    { extend: 'copy', title: 'Boardroom_Bookings_Report', className: 'copyExport' },
		    { extend: 'colvis',text: 'Show / Hide Columns',postfixButtons: ['colvisRestore']}
                ]
            });
$('#exportReport').click(function(){
var format=$(".export_format").val();
if(format=="")
{
alert("Please select a format");
}
else
{
oTable.button('.' + format + 'Export').trigger();
}
});

console.log("DataTables version is "+$.fn.dataTable.version);
yadcf.init(oTable,[
	{column_number : 0, filter_type: "text",filter_default_label: "filter by full name",filter_delay: 500},
	{column_number : 1, filter_type: "text",filter_default_label: "filter by reg no",filter_delay: 500},
	{column_number : 2, filter_type: "text",filter_default_label: "filter by mobile no",filter_delay: 500},
	{column_number : 3, filter_type: "text",filter_default_label: "filter by email",filter_delay: 500},
  ],{cumulative_filtering: true}
);

setTimeout(function () {
        oTable.columns.adjust().draw();
    }, 500); // Slight delay to let everything settle

});
</script>
@endpush

@section('content')
	<!-- BEGIN breadcrumb -->
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ url("home")}}">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Students</a></li>
		<li class="breadcrumb-item active">Student Report</li>
	</ol>
	<!-- END breadcrumb -->
	<!-- BEGIN page-header -->
	<h1 class="page-header"> </h1>
	<!-- END page-header -->
	<!-- BEGIN row -->
	<div class="row">
		<!-- BEGIN col-10 -->
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
    				<h4 class="chart-title">Student Report</h4>
  				</div>
                <!--<img class="card-img-top" src="../assets/img/gallery/gallery-7.jpg" alt="Card image cap" />-->
				<div class="card-body">
			 <select class="export_format" style="align:center">
			    <option value="">Select Format</option>
                            <option value="pdf">PDF</option>
                            <option value="print">Print</option>
                            <option value="csv">CSV</option>
                            <option value="excel">Excel</option>
                            <option value="copy">Copy to Clipboard</option>
                            </select>
			 <button id=exportReport class="btn btn-sm btn-primary">Export Current View</button>&nbsp;&nbsp;<span class="" id="columnFilter"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
					<table id="booking_requests" width="100%" class="table table-striped table-bordered align-middle">
					<thead><tr><th class="wrap-text">Full Name</th><th>Registration No.</th><th>Mobile No</th><th>Email</th><th>Edit</th><th>Delete</th></tr></thead>
					<tbody>
     				@foreach($students as $student)
        			<tr>            
                			<td>{{ $student->full_name}}</td>
					<td>{{ $student->reg_no }}</td>
					<td>{{ $student->mobile_number}}</td>
					<td>{{ $student->email}}</td>
					<td><a href="{{ url("students/".Illuminate\Support\Facades\Crypt::encryptString($student->reg_no)."/edit")}}" type='button' class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                				<i class="fa fa-lg fa-fw fa-pen"></i></a> 
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
<form action="{{ url("students/".Illuminate\Support\Facades\Crypt::encryptString($student->reg_no))}}" method="POST">
        {{ csrf_field() }}
	{{ method_field('DELETE') }}
       <button type=submit style="border-width:0px"><i class="fa fa-trash" aria-hidden="true" style='font-size:24px;color:#ff0000;'></i></button>
</form></td></tr>
            					
    	@endforeach
					</tbody>
					</table>
				</div>
			</div>
		</div>				
	</div>
	<!-- END row -->
@endsection