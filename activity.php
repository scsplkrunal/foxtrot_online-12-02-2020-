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
<?php
$json_obj = activity_update(['all_dates' => 'on'], true, true);
$order_by = $json_obj->data_arr['order_by'];

if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
{ 
    $order_disable = '"order": false,';
}
else if(isset($order_by) && $order_by == 'order by date desc')
{
    $order_disable = '"order": [[ 1, "desc" ]],';
}
else if(isset($order_by) && $order_by == 'order by date_rec desc')
{
    $order_disable = '"order": [[ 2, "desc" ]],';
}
else
{
    $order_disable = '"order": [[ 0, "desc" ]],';
}?>
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
				<h2>
					<?php echo ucfirst(basename(__FILE__, '.php')) ?>
				</h2>
			</div>
			<div id="activity_boxes_container_div" class="row text-center">
				<?php
				$json_obj = activity_update(['all_dates' => 'on'], true, false);
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
    						<label class="custom-control-label" for="all_dates_checkbox">Trades in last 30-days</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="custom-control custom-radio" style="width: 200px;display: inline;">
    						<input type="radio" name="by_date" class="custom-control-input"
    						       id="date" onclick="uncheck_datefilter(this);" />
    						<label class="custom-control-label" for="date">Date</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="custom-control custom-radio" style="width: 200px;display: inline;">
    						<input type="radio" name="by_date_rec" class="custom-control-input"
    						       id="date_rec" onclick="uncheck_datefilter(this);" checked="true"/>
    						<label class="custom-control-label" for="date_rec">Date Received</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="custom-control custom-checkbox" style="width: 200px;display: inline;float:right">
    						<input type="checkbox" name="product_subtotal" class="custom-control-input"
    						       id="product_subtotal_checkbox" onclick="uncheck_otherfilter(this);">
    						<label class="custom-control-label" for="product_subtotal_checkbox">Subtotal by Product</label>
    					</div>
                        <div class="custom-control custom-checkbox" style="width: 200px;display: inline;float:right">
    						<input type="checkbox" name="client_subtotal" class="custom-control-input"
    						       id="client_subtotal_checkbox" onclick="uncheck_otherfilter(this);remove_defaultadvisory_filter(this);" <?php if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True'){ echo 'checked="true"';} ?>/>
    						<label class="custom-control-label" for="client_subtotal_checkbox">Subtotal by Client</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <br />
                        <input type="hidden" name="remove_client_subtotal" id="remove_client_subtotal"/>
    					<label>From</label>
    					<input type="date" name="from_date" disabled required><br class="d-xs-block d-sm-none">
    					<label>To</label>
    					<input type="date" name="to_date" disabled required><br class="d-xs-block d-sm-none">
    					<input class="btn btn-primary ml-sm-2" type="submit" value="Apply" onclick="refresh_table_block();">
    					<input name="class" value="no_class" hidden>
    					<input name="func" value="activity_update" hidden>
    				</form>
    			</div>
                <div class="table-responsive mb-5" style="overflow: hidden" id="activity_section">
    				<table id="activity_table"
    				       class="main-table table table-hover table-striped table-sm text-center"
    				       style="font-size: 0.8rem">
    					<thead>
    					<tr>
                            <th>TRADE NO</th>
    						<th>DATE</th>
    						<th>DATE RECEIVED</th>
    						<th>CLIENT ACCOUNT</th>
                            <th>CLIENT#</th>
    						<th>CLIENT NAME</th>
    						<th>PRODUCT DESCRIPTION</th>
    						<th>PRINCIPAL</th>
    						<?php if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True'){?>
                                <th>GROSS FEE RECEIVED</th>
                            <?php }else{ ?>
                                <th>GROSS FEE/COMMISSION AMOUNT</th>
                            <?php } ?>
    						<th>PAYOUT RATE</th>
    						<th>NET FEE PAID</th>
    						<th>DATE PAID</th>
    					</tr>
    					</thead>
    					<tbody>
    					<?php
    					try{
    						$json_obj = activity_update(['all_dates' => 'on'], false);
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
                                aoColumnDefs: [
                                      { 'bSortable': false, 'aTargets': [ -1 ] }
                                ],
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
    							<?php echo $order_disable; ?>
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
    					<tr>
                            <th>TRADE NO</th>
    						<th>DATE</th>
    						<th>DATE RECEIVED</th>
                            <th>CLIENT ACCOUNT</th>
                            <th>CLIENT#</th>
    						<th>CLIENT NAME</th>
    						<th>PRODUCT DESCRIPTION</th>
    						<th>PRINCIPAL</th>
    						<?php if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True'){?>
                                <th>GROSS FEE RECEIVED</th>
                            <?php }else{ ?>
                                <th>GROSS FEE/COMMISSION AMOUNT</th>
                            <?php } ?>
    						<th>PAYOUT RATE</th>
    						<th>NET FEE PAID</th>
    						<th>DATE PAID</th>
    					</tr>
    					</thead>
    					<tbody>
    					<?php
    					try{
    						$json_obj = activity_update(['all_dates' => 'on'], false);
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
    							<?php echo $order_disable; ?>
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
    					<tr>
                            <th>TRADE NO</th>
    						<th>DATE</th>
    						<th>DATE RECEIVED</th>
                            <th>CLIENT ACCOUNT</th>
                            <th>CLIENT#</th>
    						<th>CLIENT NAME</th>
    						<th>PRODUCT DESCRIPTION</th>
    						<th>PRINCIPAL</th>
    						<?php if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True'){?>
                                <th>GROSS FEE RECEIVED</th>
                            <?php }else{ ?>
                                <th>GROSS FEE/COMMISSION AMOUNT</th>
                            <?php } ?>
    						<th>PAYOUT RATE</th>
    						<th>NET FEE PAID</th>
    						<th>DATE PAID</th>
    					</tr>
    					</thead>
    					<tbody>
    					<?php
    					try{
    						$json_obj = activity_update(['all_dates' => 'on'], false);
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
    							<?php echo $order_disable; ?>
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
    					<tr>
                            <th>TRADE NO</th>
    						<th>DATE</th>
    						<th>DATE RECEIVED</th>
                            <th>CLIENT ACCOUNT</th>
                            <th>CLIENT#</th>
    						<th>CLIENT NAME</th>
    						<th>PRODUCT DESCRIPTION</th>
    						<th>PRINCIPAL</th>
    						<?php if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True'){?>
                                <th>GROSS FEE RECEIVED</th>
                            <?php }else{ ?>
                                <th>GROSS FEE/COMMISSION AMOUNT</th>
                            <?php } ?>
    						<th>PAYOUT RATE</th>
    						<th>NET FEE PAID</th>
    						<th>DATE PAID</th>
    					</tr>
    					</thead>
    					<tbody>
    					<?php
    					try{
    						$json_obj = activity_update(['all_dates' => 'on'], false);
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
    							<?php echo $order_disable; ?>
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
    					<tr>
                            <th>TRADE NO</th>
    						<th>DATE</th>
    						<th>DATE RECEIVED</th>
                            <th>CLIENT ACCOUNT</th>
                            <th>CLIENT#</th>
    						<th>CLIENT NAME</th>
    						<th>PRODUCT DESCRIPTION</th>
    						<th>PRINCIPAL</th>
                            <?php if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True'){?>
                                <th>GROSS FEE RECEIVED</th>
                            <?php }else{ ?>
                                <th>GROSS FEE/COMMISSION AMOUNT</th>
                            <?php } ?>
    						<th>PAYOUT RATE</th>
    						<th>NET FEE PAID</th>
    						<th>DATE PAID</th>
    					</tr>
    					</thead>
    					<tbody>
    					<?php
    					try{
    						$json_obj = activity_update(['all_dates' => 'on'], false);
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
    							<?php echo $order_disable; ?>
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
function uncheck_datefilter(element){
    checkbox_id = $(element).attr('id');
    if($(element). prop("checked") == true)
    {
        if(checkbox_id=='date')
        {
            uncheck = $("#date_rec").prop("checked", false);
        }
        else
        {
            uncheck = $("#date").prop("checked", false);
        }
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
    <?php if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
    {?>
    $("#advisory_section").css('display','block');
    $("#activity_section").css('display','none');
    <?php }else{ ?>
        $("#advisory_section").css('display','none');
        $("#activity_section").css('display','block');
    <?php } ?>
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
function remove_defaultadvisory_filter(element){
    if($(element). prop("checked") == true){
        $("#remove_client_subtotal").val("false");
    }else{
        $("#remove_client_subtotal").val("true");
    }
    
}
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