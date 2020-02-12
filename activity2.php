<?php
require_once 'header.php';
?>

<html lang="en">
<head>
	<?php
	echo HEAD;
	?>
    <style>
    .alert-warning1{
        color: #856404;
        background-color: #fff3cd;
        border-color: #ffeeba;
    }
    </style>
</head>

<body>
<div class='loader'></div>
<!--Top Navigation Bar-->
<?php echo show_top_navigation_bar(); ?>

<!--Content-->
<div class="container-fluid">
	<div class="row">
		<!--Sidebar-->
		<?php echo show_sidebar(basename(__FILE__, '.php')); ?>

		<!--Main Content-->
		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="flex: 0 0 87.333333%;max-width: 87.333333%;">
			<div class="pt-3 pb-2 mb-2 border-bottom">
				<h2 style="display: inline;">
					<?php echo ucfirst(basename(__FILE__, '.php')) ?>
				</h2>
                <input class="btn btn-primary ml-sm-2" type="submit" value="Custom Report" name="custom_report" id="custom_report" data-toggle="modal" data-target="#custom_report_popup" style="display: inline;float:right">
            </div>
			<div id="activity_boxes_container_div" class="row text-center">
				<?php
				$json_obj = activity_update2(['all_dates' => 'on'], true, false);
				echo $json_obj->data_arr['activity_boxes'];
				?>
			</div>
            <!--<div id="activity_section">-->
    			<div class="row">
    				<form id="activity_form" class="col-md-12 dates_form">
    					<div class="server_response_div mt-2">
    						<div class="alert" role="alert"></div>
    					</div>
    					<div class="custom-control custom-checkbox" style="width: 200px;display: inline;">
    						<input type="checkbox" name="all_dates" class="custom-control-input"
    						       id="all_dates_checkbox" checked="true">
    						<label class="custom-control-label" for="all_dates_checkbox">All Trades in Current Month</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="custom-control custom-checkbox" style="width: 200px;display: inline;float:right">
    						<input type="checkbox" name="product_subtotal" class="custom-control-input"
    						       id="product_subtotal_checkbox" onclick="uncheck_otherfilter(this);">
    						<label class="custom-control-label" for="product_subtotal_checkbox">Subtotal by Product</label>
    					</div>
                        <div class="custom-control custom-checkbox" style="width: 200px;display: inline;float:right">
    						<input type="checkbox" name="client_subtotal" class="custom-control-input"
    						       id="client_subtotal_checkbox" onclick="uncheck_otherfilter(this);"/>
    						<label class="custom-control-label" for="client_subtotal_checkbox">Subtotal by Client</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <br />
    					<label>From</label>
    					<input type="date" name="from_date" disabled required><br class="d-xs-block d-sm-none">
    					<label>To</label>
    					<input type="date" name="to_date" disabled required><br class="d-xs-block d-sm-none">
    					<input class="btn btn-primary ml-sm-2" type="submit" value="Apply" onclick="refresh_table_block();">
    					<input name="class" value="no_class" hidden>
    					<input name="func" value="activity_update2" hidden>
    				</form>
    			</div>
                <div class="table-responsive mb-5" style="overflow: hidden" id="activity_section">
    				<table id="activity_table"
    				       class="main-table table table-hover table-striped table-sm text-center"
    				       style="font-size: 0.8rem">
    					<thead>
    					<?php
        				$json_obj = activity_update2(['all_dates' => 'on'], false);
        				echo $json_obj->data_arr['table_header'];
        				?>
    					</thead>
    					<tbody>
    					<?php
    					try{
    						$json_obj = activity_update2(['all_dates' => 'on'], false);
    						echo $json_obj->data_arr['activity_table'];
    						$pdf_title_first_line  = $json_obj->data_arr['pdf_title_first_line'];
    						$pdf_title_second_line = $json_obj->data_arr['pdf_title_second_line'];
    						echo "<script>
    							var pdf_title_first_line = '$pdf_title_first_line';
    							var pdf_title_second_line = '$pdf_title_second_line';
    						</script>";
    					}catch(Exception $e){
    						catch_doc_first_load_exception($e, 'activity_form');
    					}
    					?>
    					</tbody>
    				</table>
    				<script type="text/javascript">
    					$( document ).ready( function(){
    						var currentDate = new Date();
    						var current_minutes = ('0'+ currentDate.getMinutes()).slice(-2);
    						var top_massage = 'Created: ' + (currentDate.getMonth()+1) + '/' + currentDate.getDate() + '/' + currentDate.getFullYear() + ' ' + currentDate.getHours() + ':' + current_minutes;
    						const months_names = ["January", "February", "March", "April", "May", "June",
    							"July", "August", "September", "October", "November", "December"
    						];
    						var file_name = 'Transaction Activity ' + currentDate.getDate() + ' ' + months_names[currentDate.getMonth()] + ' ' + currentDate.getFullYear();
    						var pdf_title = pdf_title_first_line + '\n\r' + pdf_title_second_line;
    						var excel_title = pdf_title_first_line + ' - ' + pdf_title_second_line;
    						$( '#activity_table' ).DataTable( {
    							language: {search: ""},
                                pageLength: 50,
    							info: false,
    							dom: 'Bfrtip',
    							buttons: [
    								{
    									extend: 'excelHtml5',
    									orientation: 'landscape',
    									filename: file_name,
    									messageTop: top_massage,
    									title: excel_title
    								},
    								{
    									extend: 'pdfHtml5',
    									orientation: 'landscape',
    									filename: file_name,
    									messageTop: top_massage,
    									title: pdf_title
    								}
    							],
    							"order": [[ 0, "desc" ]],
    							"scrollX": true
    						} );
    
    						$( '.buttons-html5' ).addClass( 'btn btn-secondary' );
    						$( '#activity_table_filter input' ).addClass( 'form-control' ).attr( "placeholder", "Search" ).css( 'margin', 0 );
    						$( '#activity_table_filter' ).width( 210 ).css( 'float', 'right' );
    						$( '.dt-buttons' ).width( 200 ).css( 'float', 'left' );
    						if( $( document ).width() < 992 ){
    							$( '#activity_table_filter' ).width( '100%' ).addClass( 'text-left mt-2' );
    							$( '#activity_table_filter input' ).width( '100%' );
    						}
    					} );
                        
    				</script>
    			</div>
            <!--</div>-->
            <!--<div id="brokerage_commissions_section" style="display: none;">
                <div class="row">
    				<form id="brokerage_commissions_form" class="col-md-12 dates_form">
    					<div class="server_response_div mt-2">
    						<div class="alert" role="alert"></div>
    					</div>
    					<div class="custom-control custom-checkbox">
    						<input type="checkbox" name="all_dates" class="custom-control-input"
    						       id="all_dates_checkbox" checked>
    						<label class="custom-control-label" for="all_dates_checkbox">All Trade Dates</label>
    					</div>
    					<label>From</label>
    					<input type="date" name="from_date" disabled required><br class="d-xs-block d-sm-none">
    					<label>To</label>
    					<input type="date" name="to_date" disabled required><br class="d-xs-block d-sm-none">
    					<input class="btn btn-primary ml-sm-2" type="submit" value="Apply">
    					<input name="class" value="no_class" hidden>
    					<input name="func" value="brokerage_commissions_update" hidden>
    				</form>
    			</div>-->
    			<div class="table-responsive mb-5" style="overflow: hidden;" id="brokerage_commissions_section">
    				<table id="brokerage_commissions_table"
    				       class="main-table table table-hover table-striped table-sm text-center"
    				       style="font-size: 0.8rem">
    					<thead>
    					<?php
        				$json_obj = activity_update2(['all_dates' => 'on'],false);
        				echo $json_obj->data_arr['table_header'];
        				?>
    					</thead>
    					<tbody>
    					<?php
    					try{
    						$json_obj = activity_update2(['all_dates' => 'on'], false);
    						echo $json_obj->data_arr['brokerage_commissions_table'];
    						$pdf_title_first_line  = $json_obj->data_arr['pdf_title_first_line'];
    						$pdf_title_second_line = $json_obj->data_arr['pdf_title_second_line'];
    						echo "<script>
    							var pdf_title_first_line = '$pdf_title_first_line';
    							var pdf_title_second_line = '$pdf_title_second_line';
    						</script>";
        					}catch(Exception $e){
        						catch_doc_first_load_exception($e, 'activity_form');
        					}
    					?>
    					</tbody>
    				</table>
    				<script type="text/javascript">
    					$( document ).ready( function(){
    						var currentDate = new Date();
    						var current_minutes = ('0'+ currentDate.getMinutes()).slice(-2);
    						var top_massage = 'Created: ' + (currentDate.getMonth()+1) + '/' + currentDate.getDate() + '/' + currentDate.getFullYear() + ' ' + currentDate.getHours() + ':' + current_minutes;
    						const months_names = ["January", "February", "March", "April", "May", "June",
    							"July", "August", "September", "October", "November", "December"
    						];
    						var file_name = 'Transaction Activity ' + currentDate.getDate() + ' ' + months_names[currentDate.getMonth()] + ' ' + currentDate.getFullYear();
    						var pdf_title = pdf_title_first_line + '\n\r' + pdf_title_second_line;
    						var excel_title = pdf_title_first_line + ' - ' + pdf_title_second_line;
    						$( '#brokerage_commissions_table' ).DataTable( {
    							language: {search: ""},
    							pageLength: 50,
    							info: false,
    							dom: 'Bfrtip',
    							buttons: [
    								{
    									extend: 'excelHtml5',
    									orientation: 'landscape',
    									filename: file_name,
    									messageTop: top_massage,
    									title: excel_title
    								},
    								{
    									extend: 'pdfHtml5',
    									orientation: 'landscape',
    									filename: file_name,
    									messageTop: top_massage,
    									title: pdf_title
    								}
    							],
    							"order": [[ 0, "desc" ]],
    							"scrollX": true
    						} );
    
    						$( '.buttons-html5' ).addClass( 'btn btn-secondary' );
    						$( '#brokerage_commissions_table_filter input' ).addClass( 'form-control' ).attr( "placeholder", "Search" ).css( 'margin', 0 );
    						$( '#brokerage_commissions_table_filter' ).width( 210 ).css( 'float', 'right' );
    						$( '.dt-buttons' ).width( 200 ).css( 'float', 'left' );
    						if( $( document ).width() < 992 ){
    							$( '#brokerage_commissions_table_filter' ).width( '100%' ).addClass( 'text-left mt-2' );
    							$( '#brokerage_commissions_table_filter input' ).width( '100%' );
    						}
    					} );
    				</script>
    			</div>
            <!--</div>
            <div id="trail_commissions_section" style="display: none;">
                <div class="row">
    				<form id="trail_commissions_form" class="col-md-12 dates_form">
    					<div class="server_response_div mt-2">
    						<div class="alert" role="alert"></div>
    					</div>
    					<div class="custom-control custom-checkbox">
    						<input type="checkbox" name="all_dates" class="custom-control-input"
    						       id="all_dates_checkbox" checked>
    						<label class="custom-control-label" for="all_dates_checkbox">All Trade Dates</label>
    					</div>
    					<label>From</label>
    					<input type="date" name="from_date" disabled required><br class="d-xs-block d-sm-none">
    					<label>To</label>
    					<input type="date" name="to_date" disabled required><br class="d-xs-block d-sm-none">
    					<input class="btn btn-primary ml-sm-2" type="submit" value="Apply">
    					<input name="class" value="no_class" hidden>
    					<input name="func" value="trail_commissions_update" hidden>
    				</form>
    			</div>-->
    			<div class="table-responsive mb-5" style="overflow: hidden;" id="trail_commissions_section">
    				<table id="trail_commissions_table"
    				       class="main-table table table-hover table-striped table-sm text-center"
    				       style="font-size: 0.8rem">
    					<thead>
    					<?php
        				$json_obj = activity_update2(['all_dates' => 'on'], false);
        				echo $json_obj->data_arr['table_header'];
        				?>
    					</thead>
    					<tbody>
    					<?php
    					try{
    						$json_obj = activity_update2(['all_dates' => 'on'], false);
    						echo $json_obj->data_arr['trail_commissions_table'];
    						$pdf_title_first_line  = $json_obj->data_arr['pdf_title_first_line'];
    						$pdf_title_second_line = $json_obj->data_arr['pdf_title_second_line'];
    						echo "<script>
    							var pdf_title_first_line = '$pdf_title_first_line';
    							var pdf_title_second_line = '$pdf_title_second_line';
    						</script>";
    					}catch(Exception $e){
    						catch_doc_first_load_exception($e, 'activity_form');
    					}
    					?>
    					</tbody>
    				</table>
    				<script type="text/javascript">
    					$( document ).ready( function(){
    						var currentDate = new Date();
    						var current_minutes = ('0'+ currentDate.getMinutes()).slice(-2);
    						var top_massage = 'Created: ' + (currentDate.getMonth()+1) + '/' + currentDate.getDate() + '/' + currentDate.getFullYear() + ' ' + currentDate.getHours() + ':' + current_minutes;
    						const months_names = ["January", "February", "March", "April", "May", "June",
    							"July", "August", "September", "October", "November", "December"
    						];
    						var file_name = 'Transaction Activity ' + currentDate.getDate() + ' ' + months_names[currentDate.getMonth()] + ' ' + currentDate.getFullYear();
    						var pdf_title = pdf_title_first_line + '\n\r' + pdf_title_second_line;
    						var excel_title = pdf_title_first_line + ' - ' + pdf_title_second_line;
    						$( '#trail_commissions_table' ).DataTable( {
    							language: {search: ""},
    							pageLength: 50,
    							info: false,
    							dom: 'Bfrtip',
    							buttons: [
    								{
    									extend: 'excelHtml5',
    									orientation: 'landscape',
    									filename: file_name,
    									messageTop: top_massage,
    									title: excel_title
    								},
    								{
    									extend: 'pdfHtml5',
    									orientation: 'landscape',
    									filename: file_name,
    									messageTop: top_massage,
    									title: pdf_title
    								}
    							],
    							"order": [[ 0, "desc" ]],
    							"scrollX": true
    						} );
    
    						$( '.buttons-html5' ).addClass( 'btn btn-secondary' );
    						$( '#trail_commissions_table_filter input' ).addClass( 'form-control' ).attr( "placeholder", "Search" ).css( 'margin', 0 );
    						$( '#trail_commissions_table_filter' ).width( 210 ).css( 'float', 'right' );
    						$( '.dt-buttons' ).width( 200 ).css( 'float', 'left' );
    						if( $( document ).width() < 992 ){
    							$( '#trail_commissions_table_filter' ).width( '100%' ).addClass( 'text-left mt-2' );
    							$( '#trail_commissions_table_filter input' ).width( '100%' );
    						}
    					} );
    				</script>
    			</div>
            <!--</div>
            <div id="clearing_commissions_section" style="display: none;">
                <div class="row">
    				<form id="clearing_commissions_form" class="col-md-12 dates_form">
    					<div class="server_response_div mt-2">
    						<div class="alert" role="alert"></div>
    					</div>
    					<div class="custom-control custom-checkbox">
    						<input type="checkbox" name="all_dates" class="custom-control-input"
    						       id="all_dates_checkbox" checked>
    						<label class="custom-control-label" for="all_dates_checkbox">All Trade Dates</label>
    					</div>
    					<label>From</label>
    					<input type="date" name="from_date" disabled required><br class="d-xs-block d-sm-none">
    					<label>To</label>
    					<input type="date" name="to_date" disabled required><br class="d-xs-block d-sm-none">
    					<input class="btn btn-primary ml-sm-2" type="submit" value="Apply">
    					<input name="class" value="no_class" hidden>
    					<input name="func" value="clearing_commissions_update" hidden>
    				</form>
    			</div>-->
    			<div class="table-responsive mb-5" style="overflow: hidden;" id="clearing_commissions_section">
    				<table id="clearing_commissions_table"
    				       class="main-table table table-hover table-striped table-sm text-center"
    				       style="font-size: 0.8rem">
    					<thead>
    					<?php
        				$json_obj = activity_update2(['all_dates' => 'on'], false);
        				echo $json_obj->data_arr['table_header'];
        				?>
    					</thead>
    					<tbody>
    					<?php
    					try{
    						$json_obj = activity_update2(['all_dates' => 'on'], false);
    						echo $json_obj->data_arr['clearing_commissions_table'];
    						$pdf_title_first_line  = $json_obj->data_arr['pdf_title_first_line'];
    						$pdf_title_second_line = $json_obj->data_arr['pdf_title_second_line'];
    						echo "<script>
    							var pdf_title_first_line = '$pdf_title_first_line';
    							var pdf_title_second_line = '$pdf_title_second_line';
    						</script>";
    					}catch(Exception $e){
    						catch_doc_first_load_exception($e, 'activity_form');
    					}
    					?>
    					</tbody>
    				</table>
    				<script type="text/javascript">
    					$( document ).ready( function(){
    						var currentDate = new Date();
    						var current_minutes = ('0'+ currentDate.getMinutes()).slice(-2);
    						var top_massage = 'Created: ' + (currentDate.getMonth()+1) + '/' + currentDate.getDate() + '/' + currentDate.getFullYear() + ' ' + currentDate.getHours() + ':' + current_minutes;
    						const months_names = ["January", "February", "March", "April", "May", "June",
    							"July", "August", "September", "October", "November", "December"
    						];
    						var file_name = 'Transaction Activity ' + currentDate.getDate() + ' ' + months_names[currentDate.getMonth()] + ' ' + currentDate.getFullYear();
    						var pdf_title = pdf_title_first_line + '\n\r' + pdf_title_second_line;
    						var excel_title = pdf_title_first_line + ' - ' + pdf_title_second_line;
    						$( '#clearing_commissions_table' ).DataTable( {
    							language: {search: ""},
    							pageLength: 50,
    							info: false,
    							dom: 'Bfrtip',
    							buttons: [
    								{
    									extend: 'excelHtml5',
    									orientation: 'landscape',
    									filename: file_name,
    									messageTop: top_massage,
    									title: excel_title
    								},
    								{
    									extend: 'pdfHtml5',
    									orientation: 'landscape',
    									filename: file_name,
    									messageTop: top_massage,
    									title: pdf_title
    								}
    							],
    							"order": [[ 0, "desc" ]],
    							"scrollX": true
    						} );
    
    						$( '.buttons-html5' ).addClass( 'btn btn-secondary' );
    						$( '#clearing_commissions_table_filter input' ).addClass( 'form-control' ).attr( "placeholder", "Search" ).css( 'margin', 0 );
    						$( '#clearing_commissions_table_filter' ).width( 210 ).css( 'float', 'right' );
    						$( '.dt-buttons' ).width( 200 ).css( 'float', 'left' );
    						if( $( document ).width() < 992 ){
    							$( '#clearing_commissions_table_filter' ).width( '100%' ).addClass( 'text-left mt-2' );
    							$( '#clearing_commissions_table_filter input' ).width( '100%' );
    						}
    					} );
    				</script>
    			</div>
            <!--</div>
            <div id="advisory_section" style="display: none;">
                <div class="row">
    				<form id="advisory_form" class="col-md-12 dates_form">
    					<div class="server_response_div mt-2">
    						<div class="alert" role="alert"></div>
    					</div>
    					<div class="custom-control custom-checkbox">
    						<input type="checkbox" name="all_dates" class="custom-control-input"
    						       id="all_dates_checkbox" checked>
    						<label class="custom-control-label" for="all_dates_checkbox">All Trade Dates</label>
    					</div>
    					<label>From</label>
    					<input type="date" name="from_date" disabled required><br class="d-xs-block d-sm-none">
    					<label>To</label>
    					<input type="date" name="to_date" disabled required><br class="d-xs-block d-sm-none">
    					<input class="btn btn-primary ml-sm-2" type="submit" value="Apply">
    					<input name="class" value="no_class" hidden>
    					<input name="func" value="advisory_update" hidden>
    				</form>
    			</div>-->
    			<div class="table-responsive mb-5" style="overflow: hidden;" id="advisory_section">
    				<table id="advisory_table"
    				       class="main-table table table-hover table-striped table-sm text-center"
    				       style="font-size: 0.8rem">
    					<thead>
    					<?php
        				$json_obj = activity_update2(['all_dates' => 'on'], false);
        				echo $json_obj->data_arr['table_header'];
        				?>
    					</thead>
    					<tbody>
    					<?php
    					try{
    						$json_obj = activity_update2(['all_dates' => 'on'], false);
    						echo $json_obj->data_arr['advisory_table'];
    						$pdf_title_first_line  = $json_obj->data_arr['pdf_title_first_line'];
    						$pdf_title_second_line = $json_obj->data_arr['pdf_title_second_line'];
    						echo "<script>
    							var pdf_title_first_line = '$pdf_title_first_line';
    							var pdf_title_second_line = '$pdf_title_second_line';
    						</script>";
    					}catch(Exception $e){
    						catch_doc_first_load_exception($e, 'activity_form');
    					}
    					?>
    					</tbody>
    				</table>
    				<script type="text/javascript">
    					$( document ).ready( function(){
    						var currentDate = new Date();
    						var current_minutes = ('0'+ currentDate.getMinutes()).slice(-2);
    						var top_massage = 'Created: ' + (currentDate.getMonth()+1) + '/' + currentDate.getDate() + '/' + currentDate.getFullYear() + ' ' + currentDate.getHours() + ':' + current_minutes;
    						const months_names = ["January", "February", "March", "April", "May", "June",
    							"July", "August", "September", "October", "November", "December"
    						];
    						var file_name = 'Transaction Activity ' + currentDate.getDate() + ' ' + months_names[currentDate.getMonth()] + ' ' + currentDate.getFullYear();
    						var pdf_title = pdf_title_first_line + '\n\r' + pdf_title_second_line;
    						var excel_title = pdf_title_first_line + ' - ' + pdf_title_second_line;
    						$( '#advisory_table' ).DataTable( {
    							language: {search: ""},
    							pageLength: 50,
    							info: false,
    							dom: 'Bfrtip',
    							buttons: [
    								{
    									extend: 'excelHtml5',
    									orientation: 'landscape',
    									filename: file_name,
    									messageTop: top_massage,
    									title: excel_title
    								},
    								{
    									extend: 'pdfHtml5',
    									orientation: 'landscape',
    									filename: file_name,
    									messageTop: top_massage,
    									title: pdf_title
    								}
    							],
    							"order": [[ 0, "desc" ]],
    							"scrollX": true
    						} );
    
    						$( '.buttons-html5' ).addClass( 'btn btn-secondary' );
    						$( '#advisory_table_filter input' ).addClass( 'form-control' ).attr( "placeholder", "Search" ).css( 'margin', 0 );
    						$( '#advisory_table_filter' ).width( 210 ).css( 'float', 'right' );
    						$( '.dt-buttons' ).width( 200 ).css( 'float', 'left' );
    						if( $( document ).width() < 992 ){
    							$( '#advisory_table_filter' ).width( '100%' ).addClass( 'text-left mt-2' );
    							$( '#advisory_table_filter input' ).width( '100%' );
    						}
    					} );
    				</script>
    			</div>
            <!--</div>-->
            <!-- Modal -->
			<div class="modal fade" id="custom_report_popup" tabindex="-1" role="dialog"
			     aria-hidden="true">
				<div class="modal-dialog" role="document" style="max-width: 1000px !important;">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Custom Report</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="pt-3 pb-2 mb-2 border-bottom" style="margin-bottom: .0rem!important;">
                                        <h6 class="modal-title">Previously Created Reports</h6>
                                    </div>
                                    <table class="table table-hover">
                                        <thead>
                                          <tr>
                                            <th>Report Name</th>
                                            <th style="text-align: center;">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Report1</td>
                                            <td style="text-align: center;"><input class="btn btn-primary ml-sm-2" type="submit" value="Edit" name="edit" id="edit" style="padding: .110rem .65rem;"><input class="btn btn-primary ml-sm-2" type="submit" value="Run" name="run" id="run" style="padding: .110rem .65rem;"></td>
                                          </tr>
                                          <tr>
                                            <td>Report2</td>
                                            <td style="text-align: center;"><input class="btn btn-primary ml-sm-2" type="submit" value="Edit" name="edit" id="edit" style="padding: .110rem .65rem;"><input class="btn btn-primary ml-sm-2" type="submit" value="Run" name="run" id="run" style="padding: .110rem .65rem;"></td>
                                          </tr>
                                          <tr>
                                            <td>Report3</td>
                                            <td style="text-align: center;"><input class="btn btn-primary ml-sm-2" type="submit" value="Edit" name="edit" id="edit" style="padding: .110rem .65rem;"><input class="btn btn-primary ml-sm-2" type="submit" value="Run" name="run" id="run" style="padding: .110rem .65rem;"></td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <div class="pt-3 pb-2 mb-2 border-bottom">
                                        <h6 class="modal-title">Report Criteria</h6>
                                    </div>
                                    <form id="custom_report_form" class="col-md-12 custom_report_form" method="post" onsubmit="close_popup();">
    					            <div class="row">
                                        <div class="col-md-12">
                                            <label class="label" style="display: inline;"><b>Report Period:</b></label> 
                                            <select class="form-control" name="report_period" id="report_period" style="display: inline;width: 77.9%;" onchange="open_custom_input(this.value);">
                                                <option value="all_dates">All Dates</option>
                                                <option value="custom">Custom</option>
                                                <option value="month_to_date">Month-to-Date</option>
                                                <option value="year_to_date">Year-to-Date</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top: 1%;" id="custom_date_div">
                                        <div class="col-md-6">
                                            <label class="label"><b>From:</b></label>
                                            <input type="date" name="custom_from_date" id="custom_from_date" class="form-control"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label"><b>To:</b></label>
                                            <input type="date" name="custom_to_date" id="custom_to_date" class="form-control"/>
                                        </div>
                                    </div>
                                    <script>
                                    $(document).ready(function(){
                                        $("#custom_date_div").css('display','none');
                                    });
                                    </script>
                                    <!--<div class="row" style="padding-top: 1%;">
                                        <div class="col-md-12">
                                            <label class="label"><b>Include Fields:</b></label>
                                            <div class="custom-control custom-checkbox">
                        						<input type="checkbox" name="trade_date" class="custom-control-input"
                        						       id="trade_date_checkbox"/>
                        						<label class="custom-control-label" for="trade_date_checkbox">Trade Date</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                        						<input type="checkbox" name="client_account" class="custom-control-input"
                        						       id="client_account_checkbox"/>
                        						<label class="custom-control-label" for="client_account_checkbox">Client Account</label>
                                            </div>        
                                            <div class="custom-control custom-checkbox">
                        						<input type="checkbox" name="client_name" class="custom-control-input"
                        						       id="client_name_checkbox"/>
                        						<label class="custom-control-label" for="client_name_checkbox">Client Name</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                        						<input type="checkbox" name="product_description" class="custom-control-input"
                        						       id="product_description_checkbox"/>
                        						<label class="custom-control-label" for="product_description_checkbox">Product Description</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                        						<input type="checkbox" name="principal" class="custom-control-input"
                        						       id="principal_checkbox"/>
                        						<label class="custom-control-label" for="principal_checkbox">Principal</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                        						<input type="checkbox" name="gross_fee" class="custom-control-input"
                        						       id="gross_fee_checkbox"/>
                        						<label class="custom-control-label" for="gross_fee_checkbox">Gross Fee/Commission Amount</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                        						<input type="checkbox" name="net_amount" class="custom-control-input"
                        						       id="net_amount_checkbox"/>
                        						<label class="custom-control-label" for="net_amount_checkbox">Net Amount</label>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="row" style="padding-top: 1%;">
                                        <div class="col-md-12">
                                            <label class="label"><b>Additional Fields:</b></label>
                                            <div class="custom-control custom-checkbox">
                        						<input type="checkbox" name="date_rec" class="custom-control-input"
                        						       id="received_date_checkbox"/>
                        						<label class="custom-control-label" for="received_date_checkbox">Received Date</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                        						<input type="checkbox" name="cli_no" class="custom-control-input"
                        						       id="client_no_checkbox"/>
                        						<label class="custom-control-label" for="client_no_checkbox">Client#</label>
                                            </div>        
                                            <div class="custom-control custom-checkbox">
                        						<input type="checkbox" name="cusip" class="custom-control-input"
                        						       id="cusip_checkbox"/>
                        						<label class="custom-control-label" for="cusip_checkbox">Cusip</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                        						<input type="checkbox" name="rep_rate" class="custom-control-input"
                        						       id="payout_rate_checkbox"/>
                        						<label class="custom-control-label" for="payout_rate_checkbox">Payout Rate</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                        						<input type="checkbox" name="pay_date" class="custom-control-input"
                        						       id="pay_date_checkbox"/>
                        						<label class="custom-control-label" for="pay_date_checkbox">Pay Date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top: 1%;">
                                        <div class="col-md-12">
                                            <label class="label" style="display: inline;"><b>Subtotal:</b></label> 
                                            <select class="form-control" name="subtotal_by" id="subtotal_by" style="display: inline;width: 85.9%;">
                                                <option value="date">Trade Date</option>
                                                <option value="clearing">Client Account</option>
                                                <option value="cli_name">Client Name</option>
                                                <option value="invest">Product Description</option>
                                                <option value="net_amt">Principal</option>
                                                <option value="comm_rec">Gross Fee/Commission Amount</option>
                                                <option value="rep_comm">Net Amount</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top: 1%;">
                                        <div class="col-md-12">
                                            <label class="label" style="display: inline;"><b>Display Columns By:</b></label> 
                                            <select class="form-control" name="display_columns_by" id="display_columns_by" style="display: inline;width: 85.9%;">
                                                <option value="total">Total</option>
                                                <option value="month">Month</option>
                                                <option value="year">Year</option>
                                            </select>
                                        </div>
                                    </div><br />
                                    <div class="row">
                                        <div class="col-md-12" style="text-align: center;">
                                            <input class="btn btn-primary ml-sm-2" type="submit" value="Run Report" name="run" id="run"/>
                                            <input name="class" value="no_class" hidden>
                    					    <input name="func" value="activity_update2" hidden>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
<?php
require_once 'footer.php';
?>
</body>
</html>
<style>
.paginate_button {
    cursor: pointer;
    margin: 2px;
}
.alert-info:focus {
  background: pink;
}
.table{
    width: 100% !important;
}
.check { 
font-family: "Arial Black", Helvetica, sans-serif; 
} 
</style>
<script>
function close_popup(){
    $('.modal').modal('hide');
}
$(document).ready(function(){
    refresh_table();
});
function uncheck_otherfilter(element){
    checkbox_id = $(element).attr('id');
    if($(element). prop("checked") == true)
    {
        if(checkbox_id=='product_subtotal_checkbox')
        {
            uncheck = $("#client_subtotal_checkbox").prop("checked", false);
        }
        else
        {
            uncheck = $("#product_subtotal_checkbox").prop("checked", false);
        }
    }
}
function open_custom_input(value){
    if(value == 'custom')
    {
        $("#custom_date_div").css('display','flex');
    }
    else{
        $("#custom_date_div").css('display','none');
    }
}
function refresh_table_block(){
    $("#activity_section").css('display','block');
        
    $("#advisory_section").css('display','block');
    $("#clearing_commissions_section").css('display','block');
    $("#trail_commissions_section").css('display','block');
    $("#brokerage_commissions_section").css('display','block');
     
}
function refresh_table(){
    $("#activity_section").css('display','block');
        
    $("#advisory_section").css('display','none');
    $("#clearing_commissions_section").css('display','none');
    $("#trail_commissions_section").css('display','none');
    $("#brokerage_commissions_section").css('display','none');
     
}
$('.rp_section').click(function() {
    $('.rp_active').removeClass('alert-warning1')
    $('.rp_active').addClass('alert-info');
    $('.rp_active').removeClass('rp_active')
    $(this).addClass('rp_active');
    $(this).addClass('alert-warning1');
});
function open_activity_box(id){
    if(id == 'brokerage_commissions')
    {
        $("#brokerage_commissions_section").css('display','block');
        
        $("#trail_commissions_section").css('display','none');
        $("#clearing_commissions_section").css('display','none');
        $("#advisory_section").css('display','none');
        $("#activity_section").css('display','none');
        
    }
    else if(id=='trail_commissions')
    {
        $("#trail_commissions_section").css('display','block');
        
        $("#clearing_commissions_section").css('display','none');
        $("#advisory_section").css('display','none');
        $("#activity_section").css('display','none');
        $("#brokerage_commissions_section").css('display','none');
        
    }
    else if(id=='clearing_commissions')
    {
        $("#clearing_commissions_section").css('display','block');
        
        $("#advisory_section").css('display','none');
        $("#activity_section").css('display','none');
        $("#brokerage_commissions_section").css('display','none');
        $("#trail_commissions_section").css('display','none');
        
    }
    else if(id=='advisory')
    {
        $("#advisory_section").css('display','block');
        
        $("#activity_section").css('display','none');
        $("#brokerage_commissions_section").css('display','none');
        $("#trail_commissions_section").css('display','none');
        $("#clearing_commissions_section").css('display','none');
        
    }
    else{
        
        $("#activity_section").css('display','block');
        
        $("#advisory_section").css('display','none');
        $("#clearing_commissions_section").css('display','none');
        $("#trail_commissions_section").css('display','none');
        $("#brokerage_commissions_section").css('display','none');
    }
    
}
</script>