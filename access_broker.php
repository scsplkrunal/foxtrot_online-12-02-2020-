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
					<?php echo ucfirst('Access Brokers') ?>
				</h2>
			</div>
			<div id="activity_boxes_container_div" class="row text-center">
                <form id="supervisor_log_in_form" class="form-signin mb-0">
                    <div class="server_response_div mt-2">
            			<div class="alert" role="alert"></div>
            		</div>
                    <div class="panel" id="activity_section" style="overflow: hidden;border: 1px solid #dee2e6 !important; padding: 10px !important; margin-bottom: 10px !important;margin-left: 15px;margin-right: 15px;">
        				<label for="broker_selection" style="color: #4d627b;margin-bottom: 0;"><b>&nbsp;Login as Rep:</b></label>
                        <select id="broker_selection" name="broker_selection" class="form-control" placeholder="Select Broker" onchange="get_broker_data(this.value);">
                			<option value="">Select Broker</option>
                            <?php 
                            $brokers = array();
                            if(isset($_SESSION['admin_no']) && $_SESSION['admin_no'] != '')
                            {
                                $brokers=get_all_broker();
                                //$admin = get_admin_data($_SESSION['admin_no']);
                                //$brokers = array_merge($admin,$brokers);
                            }
                            foreach($brokers as $key=>$val){
                                $clearing_no = isset($_SESSION['company_name'])&& $_SESSION['company_name']=='lifemark'?$val['CLEAR_NO3']:$val['CLEAR_NO'];                    
                                $broker_name = strtoupper($val['LNAME']).' '.strtoupper($val['FNAME']).', '.$clearing_no.', '.$val['USERNAME'].', '.$val['WEBPSWD'];
                                if(isset($val['USERNAME']) && $val['USERNAME'] == 'admin')
                                {
                                    $val['REP_NO'] = 'ADM_'.$val['REP_NO'];
                                }
                                ?>
                            <option value="<?php echo $val['REP_NO']?>"><?php echo $broker_name;?></option>
                			<?php } ?>
                	 `  </select>
                        <input name="username_or_email" id="username_or_email" type="hidden" class="form-control" value="">
            			<input name="password" id="password" type="hidden" class="form-control" value="">
            		</div>
                    <input name="class" value="permrep" hidden>
        			<input name="func" value="log_in_by_supervisor" hidden>
        			<input class="btn btn-primary" type="submit" value="Sign in" style="float: left;margin-left: 15px;">
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
function get_broker_data(broker_id){
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                //var data_array = $.parseJSON(data);
                $("#username_or_email").val(data.username);
                $("#password").val(data.password);
            }
        };
        xmlhttp.open("GET", "ajax_supervisor.php?supervisor_broker_id="+broker_id, true);
        xmlhttp.send();
}
</script>