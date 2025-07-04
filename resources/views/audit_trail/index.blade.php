@extends('layouts.default')
@push('css')
	 <link rel="stylesheet" href="{{ asset("/css/datatables.min.css")}}">
    <link rel="stylesheet" href="{{ asset("/css/jquery.dataTables.yadcf.css")}}">
    <link href="{{ asset("assets/plugins/select2/dist/css/select2.min.css")}}" rel="stylesheet" />

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
//-->
</style>
@endpush
@push('scripts')
	<script src="{{ asset("js/jquery.dataTables.min.js")}}"></script>
	<!--<script src="{{ asset("assets/plugins/datatables.net/js/dataTables.min.js")}}"></script>
	<script src="{{ asset("assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js")}}"></script>
	<script src="{{ asset("assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
	<script src="{{ asset("assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js")}}"></script>
	<script src="{{ asset("js/jquery.dataTables.yadcf.js")}}"></script>
	<script src="{{ asset("js/dataTables.buttons.min.js")}}"></script>
    <script src="{{ asset("js/buttons.colVis.min.js")}}"></script>-->

	<script src="{{ asset("js/dataTables.bootstrap5.min.js")}}"></script>
	<!--<script src="{{ asset("js/dataTables.buttons.min.js")}}"></script>-->
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
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
  var oTable=$('#audit_trail').DataTable({
    "dom": 'lrtlip',
	"autoWidth": "false",
	buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
	columnDefs: [
    	{ width: "15%", targets: 0 },
    	{ width: "10%", targets: 1 },
    	{ width: "30%", targets: 2 },
    	{ width: "30%", targets: 3 },
    	{ width: "15%", targets: 4 }, // Optional but be consistent
  ]
  });

  var buttons = new $.fn.dataTable.Buttons(oTable, {
                buttons: [
                    { extend: 'csv', title: 'Audit_Trail_Report', className: 'csvExport' },
                    { extend: 'excel', title: 'Audit_Trail_Report', className: 'excelExport' },
                    { extend: 'pdf', title: 'Audit_Trail_Report', className: 'pdfExport' },
                    { extend: 'print', title: 'Audit_Trail_Report', className: 'printExport' },
                    { extend: 'copy', title: 'Audit_Trail_Report', className: 'copyExport' }
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

  yadcf.init(oTable,[
	{column_number : 0, filter_type: "text",filter_default_label: "filter by user",filter_delay: 500},
	{column_number : 1, filter_type: "select",filter_default_label: "filter by action",filter_delay: 500},
    	{column_number : 2, filter_type: "select",filter_default_label: "filter by table",filter_delay: 500},
    	{column_number : 3, filter_type: "text",filter_default_label: "filter by old value",filter_delay: 500},
    	{column_number : 4, filter_type: "text",filter_default_label: "filter by new value",filter_delay: 500},
    	{column_number : 5, filter_type: "range_date",date_format: "yyyy-mm-dd",filter_default_label: ["from","to"],filter_delay: 500},
  ],{cumulative_filtering: true}
);

setTimeout(function () {
        oTable.columns.adjust().draw();
    }, 500); // Slight delay to let everything settle
});
</script>
});
@endpush

@section('content')
	<!-- BEGIN breadcrumb -->
	<ol class="breadcrumb float-xl-end">
		<li class="breadcrumb-item"><a href="{{ url("home")}}">Home</a></li>
		<li class="breadcrumb-item active">Audit Trail Report</li>
	</ol>
	<!-- END breadcrumb -->
	<!-- BEGIN page-header -->
	<h1 class="page-header">Audit Trail Report </h1>
	<!-- END page-header -->
	<!-- BEGIN row -->
	<div class="row">
		<!-- BEGIN col-10 -->
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header">
    				<h4 class="chart-title">Audit Trail Report</h4>
  				</div>
                <!--<img class="card-img-top" src="../assets/img/gallery/gallery-7.jpg" alt="Card image cap" />-->
				<div class="card-body" style="overflow-x:auto;">
					<span class="" id="columnFilter"></span><select class="export_format" style="align:center">
			    <option value="">Select Format</option>
                            <option value="pdf">PDF</option>
                            <option value="print">Print</option>
                            <option value="csv">CSV</option>
                            <option value="excel">Excel</option>
                            <option value="copy">Copy to Clipboard</option>
                            </select>
			 <button id=exportReport class="btn btn-sm btn-primary">Export Current View</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
					<table id="audit_trail" width="100%" class="table table-striped table-bordered align-middle">
					<thead><tr><th>User</th><th>Action</th><th>Table</th><th width="30%" class="wrap-text">Old Value</th><th width="30%" class="wrap-text">New Value</th><th>Date</th></tr></thead>
					<tbody>
                    @foreach($audits as $cell)
        			<tr>
                        <td>{{ $cell->user ? $cell->user->name : 'Unknown User' }}</td>
                        <td>{{ $cell->event }}</td>
                        <td>{{ str_replace("App\Models\\","",$cell->auditable_type) }}</td>
			@php
			 $oldValues = json_decode($cell->old_values, true);
			 $newValues = json_decode($cell->new_values, true);
			$changes = [];
			$old_narration="";
			$new_narration="";

			foreach ($newValues as $column => $newValue) 
			{		
		        	$oldValue = $oldValues[$column] ?? 'N/A'; // Handle cases where old value might be missing
			        if ($oldValue !== $newValue) 
				{
			            $changes[$column] = ['old' => $oldValue, 'new' => $newValue];
				    if($column!=="N/A" || empty($column) && $column!=="password")
				    {
				    $old_narration.=$column." was ".$oldValue."\n";
				    $new_narration.=$column." is ".$newValue."\n";
				    }
        			}				
			}
			echo "<td class='.wrap-text'>".$old_narration."</td>";
			echo "<td class='.wrap-text'>".$new_narration."</td>";
			@endphp
                        <td>{{ $cell->created_at }}</td>
                    </tr>
                    @endforeach
					</tbody>
					</table>
				</div>
			</div>
		</div>				
	</div>
	<!-- END row -->
@endsection
