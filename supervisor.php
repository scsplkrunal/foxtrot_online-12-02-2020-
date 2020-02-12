<?php
require_once 'header.php';
?>
<html lang="en">
<head>
	<?php echo HEAD; ?>
	<link href="login_stylesheet.css" rel="stylesheet">
</head>

<body>
<div class='loader'></div>
<div class="container">
	<div class="row justify-content-center mt-3 d-none d-md-flex">
		<div class="col-3">
			<?php
            $comapny_name = (isset($_SESSION['company_name'])) ? $_SESSION['company_name'] : 'demo';
			echo "<img src='lib/logos/{$comapny_name}.png' alt='logo' class='logo'>";
            $company_name=ucfirst($comapny_name);
            if($company_name=='Lifemark')
            {
                $company_name = 'LifeMark';
            }
            
            if(isset($_SESSION['admin_no']) && $_SESSION['admin_no'] != '')
            {
                $title = $company_name.' Admin';
            }
            else if(isset($_SESSION['supervisor_broker']) && $_SESSION['supervisor_broker'] != '')
            {
                $title = $company_name.' Branch Manager';
            }
            else
            {
                $title = 'Linked Brokers';
            }
			?>
		</div>
	</div>

	<div class="card card-container">
		<h4 class="mb-3" style="text-align: center;"><?php echo $title;?></h4>
		<form id="supervisor_log_in_form" class="form-signin mb-0">
			<div class="server_response_div mt-2">
				<div class="alert" role="alert"></div>
			</div>
            <label for="broker_selection" style="color: #4d627b;margin-bottom: 0;"><b>&nbsp;Login as Rep:</b></label>
            <select id="broker_selection" name="broker_selection" class="form-control" placeholder="Select Broker" onchange="get_broker_data(this.value);">
    			<option value="">Select Broker</option>
                <?php 
                $brokers = array();
                if(isset($_SESSION['branch_no']) && $_SESSION['branch_no'] != ''){
                    $brokers=get_branch_broker($_SESSION['branch_no']);
                }
                else if(isset($_SESSION['admin_no']) && $_SESSION['admin_no'] != '')
                {
                    $brokers=get_all_broker();
                    $admin = get_admin_data($_SESSION['admin_no']);
                    $brokers = array_merge($admin,$brokers);
                }
                else if(isset($_SESSION['link_broker']) && $_SESSION['link_broker'] != '')
                {
                    $brokers = get_link_broker($_SESSION['link_broker']);
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
			
			<input name="class" value="permrep" hidden>
			<input name="func" value="log_in_by_supervisor" hidden>
			<input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" value="Sign in">
		</form><!-- /form -->
        <a href="login.php" class="forgot-password">
			Back to login
		</a>
	</div><!-- /card-container -->
</div><!-- /container -->
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
<?php
require_once 'footer.php';

?>
</body>
</html>