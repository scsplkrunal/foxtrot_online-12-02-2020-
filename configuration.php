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
				<h2>
					<?php echo ucfirst(basename(__FILE__, '.php')) ?>
				</h2>
			</div>
			<div id="activity_boxes_container_div" class="row text-center">
                <form id="configuration_form" class="col-md-12 dates_form">
                    <div class="server_response_div mt-2">
            			<div class="alert" role="alert"></div>
            		</div>
                    <div class='col-md-12' id='activity'>
                        <div class='alert alert-info' style="text-align: left;">
    						<strong>Dashboard Options </strong>
    					</div>
                    </div>
                    <div class="panel" id="activity_section" style="overflow: hidden;border: 1px solid #dee2e6 !important; padding: 10px !important; margin-bottom: 10px !important;margin-left: 15px;margin-right: 15px;">
        				<?php
                        $get_configuration = get_configuration();
                        $chart_default_selection = get_chart_selection();
			             //print_r($get_configuration);exit;
                        ?>
                        <div class="row">
                        <div class="col-md-6">
                            <label style="float: left;width:20%">Chart Default Selection:</label>
                            <select id="time_periods_select" name="time_period" class="form-control" style="width:80%">
                				<option value="Previous 12 Months" <?php if($chart_default_selection == 'Previous 12 Months'){echo 'selected="selected"';}?>>Previous 12 Months</option>
                                <option value="Year to Date" <?php if($chart_default_selection == 'Year to Date'){echo 'selected="selected"';}?>>Year to Date</option>
                				<option value="Month to Date" <?php if($chart_default_selection == 'Month to Date'){echo 'selected="selected"';}?>>Month to Date</option>
                				<!--<option value="Last Year">Last Year</option>-->
                				<option value="Last Month" <?php if($chart_default_selection == 'Last Month'){echo 'selected="selected"';}?>>Last Month</option>
                                <option value="Year Over Year Gross" <?php if($chart_default_selection == 'Year Over Year Gross'){echo 'selected="selected"';}?>>Year Over Year Gross</option>
                                <option value="Year to Date Gross Comparison" <?php if($chart_default_selection == 'Year to Date Gross Comparison'){echo 'selected="selected"';}?>>Year to Date Gross Comparison</option>
                		 `   </select>                        
                        </div>
                        <div class="col-md-6">
            			</div>
                        </div>
                    </div>
                    <div class='col-md-12' id='activity'>
                        <div class='alert alert-info' style="text-align: left;">
    						<strong>Activity Options </strong>
    					</div>
                    </div>
                    <div class="panel" id="activity_section" style="overflow: hidden;border: 1px solid #dee2e6 !important; padding: 10px !important; margin-bottom: 10px !important;margin-left: 15px;margin-right: 15px;">
        				<?php
                        $get_configuration = get_configuration();//print_r($get_configuration);exit;
                        ?>
                        <div class="custom-control custom-checkbox" style="float: left;">
                			<input type="checkbox" name="display_trail_commission" class="custom-control-input"
                			       id="display_trail_commission_checkbox" value="1" <?php if(isset($get_configuration['display_trail_commission']) && $get_configuration['display_trail_commission']=='1'){ echo 'checked="true"';} ?>/>
                			<label class="custom-control-label" for="display_trail_commission_checkbox">Display Trail Commissions</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
        			</div>
                    <div class='col-md-12' id='report'>
                        <div class='alert alert-info' style="text-align: left;">
    						<strong>Report Options</strong>
    					</div>
                    </div>
                    <div class="panel" id="report_section" style="overflow: hidden;border: 1px solid #dee2e6 !important; padding: 10px !important; margin-bottom: 10px !important;margin-left: 15px;margin-right: 15px;">
        				<div class="custom-control custom-checkbox" style="float: left;"> 
                			<input type="checkbox" name="display_commission_hold_report" class="custom-control-input"
                			       id="display_commission_hold_report_checkbox" value="1" <?php if(isset($get_configuration['display_commission_hold_report']) && $get_configuration['display_commission_hold_report']=='1'){ echo 'checked="true"';} ?>/>
                			<label class="custom-control-label" for="display_commission_hold_report_checkbox">Commissions on Hold</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="custom-control custom-checkbox" style="float: left;"> 
                			<input type="checkbox" name="display_licenses_report" class="custom-control-input"
                			       id="display_licenses_report_checkbox" value="1" <?php if(isset($get_configuration['display_licenses_report']) && $get_configuration['display_licenses_report']=='1'){ echo 'checked="true"';} ?>/>
                			<label class="custom-control-label" for="display_licenses_report_checkbox">Display Licenses Report</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
        			</div>
                    <input class="btn btn-primary" type="submit" value="Apply" style="float: left;margin-left: 15px;">
            		<input name="class" value="no_class" hidden>
            		<input name="func" value="configuration_update" hidden>
    	        </form>                
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
$(document).ready(function(){
    //refresh_table();
});
function refresh_table(){
    $("#report_section").css('display','none');
    $("#activity_section").css('display','block');
}
$('.rp_section').click(function() {
    $('.rp_active').removeClass('alert-warning1')
    $('.rp_active').addClass('alert-info');
    $('.rp_active').removeClass('rp_active')
    $(this).addClass('rp_active');
    $(this).addClass('alert-warning1');
});
function open_activity_box(id){
    if(id == 'activity')
    {
        $('#activity_section').css('display','block');
        
        $('#report_section').css('display','none');
    }
    else if(id=='report')
    {
        $('#report_section').css('display','block');
        
        $('#activity_section').css('display','none');
        
    }
    else{
        
        $('#activity_section').css('display','block');
        
        $('#report_section').css('display','none');
    }
    
}
</script>