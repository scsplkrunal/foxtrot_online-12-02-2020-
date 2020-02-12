<?php
session_start();

/**
 * The head tag of each html document.
 */
define('HEAD', '
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>FoxTrot Online</title>

	<!-- JQuery -->
	<script src="lib/jquery-3.2.1.js"></script>

	<!-- Bootstrap core CSS and JS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- ChartJS -->
    <!--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

	<!-- Custom CSS and JS -->
	<link href="main_stylesheet.css" rel="stylesheet">
	<script src="main_js.js"></script>
	
	<!-- Datatable -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/png" href="lib/favicon.ico">
    
    
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125789539-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag("js", new Date());
		
		gtag("config", "UA-125789539-1");
	</script>
');

define('EXCEPTION_WARNING_CODE', 0);
define('EXCEPTION_DANGER_CODE', 1);
$GLOBALS['PIE_CHART_COLORS_ARRAY'] = array('rgb(38, 70, 83)','rgb(42, 157, 143)','rgb(233, 196, 106)','rgb(163, 135, 71)','rgb(244, 162, 97)','rgb(231, 111, 81)','rgb(144, 78, 85)','rgb(191, 180, 143)','rgb(132, 122, 87)','rgb(229, 169, 169)','rgb(226, 95, 95)','rgb(158, 218, 229)','rgb(167, 196, 147)','rgb(126, 145, 97)','rgb(50, 50, 50)','rgb(200, 200, 200)');

/*define('PIE_CHART_COLORS_ARRAY', [
	'rgb(38, 70, 83)',
	'rgb(42, 157, 143)',
	'rgb(233, 196, 106)',
	'rgb(244, 162, 97)',
	'rgb(231, 111, 81)',
	'rgb(144, 78, 85)',
	'rgb(191, 180, 143)',
	'rgb(50, 50, 50)',
	'rgb(200, 200, 200)'
]);*/

/**
 * Connect to DB
 * If successful, put connection obj in globals
 * If failed, throw an exception
 * @throws Exception
 */
//global $db_conn;
function db_connect(){
    
	// Create connection
	if(isset($_SESSION['db_host'])){
		
        //$db_conn = new mysqli($_SESSION['db_host'], 'jjixgbv9my802728', 'We3b2!12', $_SESSION['db_name']);
        $db_conn = new mysqli("localhost", 'demo_foxtrot', 'demo_foxtrot', 'demo_foxtrot');
    }
 
	// Check connection
	if(!$db_conn->connect_error){
	    $GLOBALS['db_conn'] = $db_conn;
		
	} else{
		throw new Exception("Connection failed: {$db_conn->connect_errno}, {$db_conn->connect_error}", EXCEPTION_DANGER_CODE);
	}
}

/**
 * Send a query to the DB
 * Return result
 * if failed, throw an exception
 * @param $sql_str
 * @return mysqli_result
 * @throws exception
 */
function db_query($sql_str){
    
    //Check if query sent successfully
	if($result = $GLOBALS['db_conn']->query($sql_str)){
		return $result;

		//If query failed
	} else{
		throw new Exception("Query failed: {$GLOBALS['db_conn']->errno}, {$GLOBALS['db_conn']->error}", EXCEPTION_DANGER_CODE);
	}
}

/**
 * Gets and array with the company name, and changes the constants db_username, db_pass and db_name to the right values.
 * @param $post
 */
function db_choose($post){
	switch($post['company_name']){
		case 'allegheny':
		case 'concorde':
		case 'cue':
		case 'demo':
        case 'dtest':
		case 'dominion':
		case 'liberty':
		case 'lifemark':
		case 'signalsecurities':
        case 'vicuscapital':
        case 'everspire':
		case 'westgroup':
		case 'lafferty':
            $_SESSION['company_name'] = $post['company_name'];
			$_SESSION['db_host']      = 'localhost';
			$_SESSION['db_name']      = 'demo_foxtrot';
            
            if(isset($_SESSION['company_name']) && $_SESSION['company_name'] == 'vicuscapital')
            {
                $_SESSION['advisory'] = 'True';
            }else{
                unset($_SESSION['advisory']);
            }
			/*$_SESSION['company_name'] = $post['company_name'];
			$_SESSION['db_host']      = 'sql5c40n.carrierzone.com';
			$_SESSION['db_name']      = $post['company_name'].'_jjixgbv9my802728';//print_r($_SESSION['db_name']);*/
			break;
		default:
			if(!isset($_SESSION["permrep_obj"])){
				unset($_SESSION['db_name']);
			}
	}
}

/**
 * An object used to return data from the server to the client.
 * Class json_obj
 */
class json_obj{
	public $status;
	public $data_arr;
	public $error_message;
	public $error_level;
}

function show_top_navigation_bar(){
    $company_name = (isset($_SESSION['company_name'])) ? $_SESSION['company_name'] : '';
    if($company_name=='demo')
    {
        $company_name='Your Company Name Here';
    }else{
        $company_name=ucfirst($company_name);
        if($company_name=='Lifemark')
        {
            $company_name = 'LifeMark';
        }
        else if($company_name=='Vicuscapital')
        {
            $company_name = 'Vicus Capital';
        }
    }
    $get_broker_profile = get_broker_profile($_SESSION["permrep_obj"]->REP_NO);
    if(isset($get_broker_profile['image']) && $get_broker_profile['image'] != ''){
        $profile_img = 'upload/'.$get_broker_profile['image'];
    }else{
        $profile_img = 'upload/default.jpg';
    }
	$html_return_str =
	'
    
    <nav class="navbar-dark d-xs-block d-md-none">
		<button class="navbar-toggler" style="position: fixed; top: 7px; right: 7px; z-index: 2000;" type="button">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
	<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">

		<a class="navbar-brand col-sm-4 col-md-2 col-xs-1 mr-0" href="dashboard.php" style="padding-top: 7px; padding-bottom: 7px;max-width: 12.666667%;">
			<img src="lib/logo.png" alt="logo" style="height: 40px; padding: 0;">
			FoxTrot Online
		</a>
        <a class="navbar-brand col-sm-8 col-md-9 col-xs-1 mr-0" href="dashboard.php" style="flex: 0 0 75.333333%;max-width: 75.333333%;">
			<h5>'.$company_name.'</h5>
		</a>
        <div class="dropdown col-sm-8 col-md-9 col-xs-1 mr-0" style="max-width: 12%;">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle" style="text-align:right;font-size: 15px;font-weight:500;color:#fff;float: left;" aria-expanded="true">
            <span class="ic-user pull-left" style="font-size: 1.5em;height: 55px;line-height: 55px;float: left!important;">
                <img class="img-circle img-user media-object" src="'.$profile_img.'" alt="Profile Picture"  style="transform: translateY(11.5px);width: 32px;height: 32px;box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);display: block;border-radius: 50%;vertical-align: middle;border: 0;"/>
                <!--<i class="demo-pli-male"></i>-->
            </span>
            <div class="username hidden-xs" style="float: left;white-space: nowrap;line-height: 55px;margin: 0 5px;pointer-events: none;cursor: none;">'.$_SESSION['permrep_obj']->FNAME.'  <span class="caret"></span></div></a>
            <ul class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default" style="padding: 0;min-width: 20rem;">
              <li class="nav-item" style="width: 100%;float: left;padding: 0 15px;">
				<span class="ic-user pull-left" style="float: left!important;width: auto;">
                    <img class="img-circle img-user media-object" src="'.$profile_img.'" alt="Profile Picture"  style="transform: translateY(11.5px);width: 65px;height: 65px;box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);display: block;border-radius: 50%;vertical-align: middle;border: 0;margin: 0;padding: 0;"/>
                    <a href="#update_profile" data-toggle="modal" style="float: left;width: 100%;color: #007bff;font-size: 13px;margin: 15px 0 0 11px;">Change</a>
                    <!--<i class="demo-pli-male"></i>-->
                </span>
                <div class="username hidden-xs" style="float: left;white-space: nowrap;line-height: 27px;margin: 17px 10px;pointer-events: none;cursor: none;width: 70%;">
                '.$_SESSION['permrep_obj']->FNAME.' '.$_SESSION['permrep_obj']->LNAME.'<br/>
                '.$_SESSION['permrep_obj']->EMAIL.'
                <span class="caret"></span>
                </div>
		      </li>
              <li class="nav-item" style="float: left;width: 100%;border-top: 1px solid rgba(0,0,0,.125);margin: 10px 0 0;padding: 6px;">
				<span id="sign_out_fake_link" class="fake_link nav-link" style="font-size: 15px;text-align: left;">
   	                '.show_sidebar_icon('sign_out').'
                    Sign out
				</span>
		      </li>
            </ul>
        </div>
	</nav>
    <div class="modal fade" id="update_profile" tabindex="-1" role="dialog"
			     aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width: 1000px !important;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Set Profile Picture</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <form id="update_profile_form" class="col-md-12 update_profile dates_form" action="submit_profile_picture.php" method="post" enctype="multipart/form-data">
                    <div class="server_response_div">
						<div class="alert" role="alert"></div>
					</div>
		            <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="image" id="image" class="form-control"/>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6" style="text-align: center;">
                            <input class="btn btn-primary ml-sm-2" type="submit" value="Upload" name="upload" id="upload"/>
                            <input name="class" value="no_class" hidden>
    					    <input name="func" value="change_profile" hidden>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
    <style>
    .dropdown-toggle::after {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: .255em;
        vertical-align: .255em;
        content: "";
        border-top: .3em solid;
        border-right: .3em solid transparent;
        border-bottom: 0;
        border-left: .3em solid transparent;
        top: 27px;
        position: absolute;
    }
    @media screen and (max-width:1599px){

	a.navbar-brand.col-sm-4.col-md-2.col-xs-1.mr-0{
        padding-top: 13px !important;
        padding-bottom: 13px !important;
        max-width: 12.666667% !important;
        font-size: 14px !important;
    }
    .navbar-brand.col-sm-4.col-md-2.col-xs-1.mr-0 img{
	   height:30px !important;
    }
    a.navbar-brand col-sm-8 col-md-9 col-xs-1 mr-0 h5{
        font-size: 14px !important;
    }
	.nav a.navbar-brand.col-sm-8.col-md-9.col-xs-1.mr-0 {
        max-width: 78% !important;
        flex: 0 0 78% !important;
        padding-top: 13px !important;
        padding-bottom: 13px !important;
    }
    }
    </style>';

	return $html_return_str;
}
/*


function show_top_navigation_bar(){
    $company_name = (isset($_SESSION['company_name'])) ? $_SESSION['company_name'] : '';
    if($company_name=='demo')
    {
        $company_name='Your Company Name Here';
    }else{
        $company_name=ucfirst($company_name);
        if($company_name=='Lifemark')
        {
            $company_name = 'LifeMark';
        }
    }
	$html_return_str =
	'
    <style>
    .dropdown-toggle::after {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: .255em;
        vertical-align: .255em;
        content: "";
        border-top: .3em solid;
        border-right: .3em solid transparent;
        border-bottom: 0;
        border-left: .3em solid transparent;
        top: 27px;
        position: absolute;
    }
    </style>
    <nav class="navbar-dark d-xs-block d-md-none">
		<button class="navbar-toggler" style="position: fixed; top: 7px; right: 7px; z-index: 2000;" type="button">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>
	<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">

		<a class="navbar-brand col-sm-4 col-md-2 col-xs-1 mr-0" href="dashboard.php" style="padding-top: 7px; padding-bottom: 7px;max-width: 12.666667%;">
			<img src="lib/logo.png" alt="logo" style="height: 40px; padding: 0;">
			FoxTrot Online
		</a>
        <a class="navbar-brand col-sm-8 col-md-9 col-xs-1 mr-0" href="dashboard.php" style="flex: 0 0 80.333333%;max-width: 80.333333%;">
			<h5>'.$company_name.'</h5>
		</a>
        <div class="dropdown col-sm-8 col-md-9 col-xs-1 mr-0" style="max-width: 7%;">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle" style="text-align:right;font-size: 15px;font-weight:500;color:#fff;float: left;" aria-expanded="true">
            <span class="ic-user pull-left" style="font-size: 1.5em;height: 55px;line-height: 55px;float: left!important;">
                <img class="img-circle img-user media-object" src="default.jpg" alt="Profile Picture"  style="transform: translateY(11.5px);width: 32px;height: 32px;box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);display: block;border-radius: 50%;vertical-align: middle;border: 0;"/>
                <!--<i class="demo-pli-male"></i>-->
            </span>
            <div class="username hidden-xs" style="float: left;white-space: nowrap;line-height: 55px;margin: 0 5px;pointer-events: none;cursor: none;">'.$_SESSION['permrep_obj']->FNAME.'  <span class="caret"></span></div></a>
            <ul class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default" style="padding: 0;min-width: 20rem;">
              <li class="nav-item" style="width: 100%;float: left;padding: 0 15px;">
				<span class="ic-user pull-left" style="float: left!important;width: auto;">
                    <img class="img-circle img-user media-object" src="default.jpg" alt="Profile Picture"  style="transform: translateY(11.5px);width: 65px;height: 65px;box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);display: block;border-radius: 50%;vertical-align: middle;border: 0;margin: 0;padding: 0;"/>
                    <a href="#" style="float: left;width: 100%;color: #007bff;font-size: 13px;margin: 15px 0 0 11px;">Change</a>
                    <!--<i class="demo-pli-male"></i>-->
                </span>
                <div class="username hidden-xs" style="float: left;white-space: nowrap;line-height: 27px;margin: 17px 10px;pointer-events: none;cursor: none;width: 70%;">
                '.$_SESSION['permrep_obj']->FNAME.' '.$_SESSION['permrep_obj']->LNAME.'<br/>
                '.$_SESSION['permrep_obj']->EMAIL.'
                <span class="caret"></span>
                </div>
		      </li>
              <li class="nav-item" style="float: left;width: 100%;border-top: 1px solid rgba(0,0,0,.125);margin: 10px 0 0;padding: 6px;">
				<span id="sign_out_fake_link" class="fake_link nav-link" style="font-size: 15px;text-align: left;">
   	                '.show_sidebar_icon('sign_out').'
                    Sign out
				</span>
		      </li>
            </ul>
        </div>
	</nav>';

	return $html_return_str;
}*/
/**
 * Gets the current page as an argument, and returns an HTML string with the side navigation bar, showing the current page as active.
 * @param $current_page
 * @return string
 */
function show_sidebar($current_page){
	${$current_page."_active"} = 'active';
    $dashboard_active = isset($dashboard_active)?$dashboard_active:'';
    $statements_active = isset($statements_active)?$statements_active:'';
    $activity_active = isset($activity_active)?$activity_active:'';
    $activity2_active = isset($activity2_active)?$activity2_active:'';
    $reports2_active = isset($reports2_active)?$reports2_active:'';
    $reports_active = isset($reports_active)?$reports_active:'';
    $documents_active = isset($documents_active)?$documents_active:'';
    $configuration_active = isset($configuration_active)?$configuration_active:'';
    
	$html_return_str           = '
		<nav class="col-md-2 d-none d-md-block bg-light sidebar" style="max-width: 12.666667%;">
			<ul class="nav flex-column">
                <li class="nav-item">
					<a class="nav-link '.$dashboard_active.'" href="dashboard.php" style="padding: .9rem 1rem;font-size: 15px;">
						'.show_sidebar_icon('home').'
						Dashboard
					</a>
				</li>';
    if(isset($_SESSION['permrep_obj']->USERNAME) && $_SESSION['permrep_obj']->USERNAME == 'admin'){
    $html_return_str.='<li class="nav-item">
					<a class="nav-link '.$configuration_active.'" href="configuration.php" style="padding: .9rem 1rem;font-size: 15px;">
                        '.show_sidebar_icon('setting').'
						Configuration
					</a>
				</li>';
    }else{
    $html_return_str.='
				<li class="nav-item">
					<a class="nav-link '.$statements_active.'" href="statements.php" style="padding: .9rem 1rem;font-size: 15px;">
						'.show_sidebar_icon('paper').'
						Statements
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link '.$activity_active.'" href="activity.php" style="padding: .9rem 1rem;font-size: 15px;">
						'.show_sidebar_icon('bar_chart').'
						Activity
					</a>
				</li>
                <li class="nav-item">
					<a class="nav-link '.$activity2_active.'" href="activity2.php" style="padding: .9rem 1rem;font-size: 15px;">
						'.show_sidebar_icon('bar_chart').'
						Activity2
					</a>
				</li>
                <li class="nav-item">
					<a class="nav-link '.$reports2_active.'" href="reports2.php" style="padding: .9rem 1rem;font-size: 15px;">
                        '.show_sidebar_icon('paper').'
						Reports
					</a>
				</li>
				<!--<li class="nav-item">
					<a class="nav-link '.$reports_active.'" href="reports.php" style="padding: .9rem 1rem;font-size: 15px;">
						'.show_sidebar_icon('pie_chart').'
						 Graphs & Analytics
					</a>
				</li>-->
				<!--
				<li class="nav-item">
					<a class="nav-link '.$documents_active.'" href="documents.php" style="padding: .9rem 1rem;font-size: 15px;">
						'.show_sidebar_icon('document').'
						Documents
					</a>
				</li>
				-->';
    }
	$html_return_str.='<!--<li class="nav-item">
						<span id="sign_out_fake_link" class="fake_link nav-link" style="padding: .9rem 1rem;font-size: 15px;">
							'.show_sidebar_icon('sign_out').'
							Sign out
						</span>
				</li>-->
			</ul>
		</nav>
';

	return $html_return_str;

}

/**
 * Gets an icon as a parameter and returns the HTML string to output the specific icon
 * The HTML is a SVG tag.
 * @param $icon
 * @return string
 */
function show_sidebar_icon($icon){
	switch($icon){
		case 'home':
			return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="sidebar_icon">
					<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
					<polyline points="9 22 9 12 15 12 15 22"></polyline>
				</svg>';
		case 'paper':
			return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="sidebar_icon">
					<path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
					<polyline points="13 2 13 9 20 9"></polyline>
				</svg>';
		case 'bar_chart':
			return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="sidebar_icon">
							<line x1="18" y1="20" x2="18" y2="10"></line>
							<line x1="12" y1="20" x2="12" y2="4"></line>
							<line x1="6" y1="20" x2="6" y2="14"></line>
						</svg>';
		case 'pie_chart':
			return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="sidebar_icon">
								<path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
								<path d="M22 12A10 10 0 0 0 12 2v10z"></path>
							</svg>';
		case 'document':
			return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="sidebar_icon">
								<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
								<polyline points="14 2 14 8 20 8"></polyline>
								<line x1="16" y1="13" x2="8" y2="13"></line>
								<line x1="16" y1="17" x2="8" y2="17"></line>
								<polyline points="10 9 9 9 8 9"></polyline>
							</svg>';
		case 'envelope':
			return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="sidebar_icon">
							<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
							<polyline points="22,6 12,13 2,6"></polyline>
							</svg>';
        case 'setting':
			return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="sidebar_icon"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>';
                            
		case 'sign_out':
			return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="sidebar_icon">
							<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
							<polyline points="16 17 21 12 16 7"/>
							<line x1="21" y1="12" x2="9" y2="12"/>
							</svg>';
		default:
			return false;
	}
}

class statement{
	public $pdf_name;
	public $pdf_url;
	public $year;
	public $month;
	public $payroll_sequence;
	public $concorde_company_number = null;
	public $broker_id;
	public $field_1;
	public $date;

	function __construct($pdf_name = null, $pdf_url = null){
		$this->pdf_name       = $pdf_name;
		$this->pdf_url        = $pdf_url;
		$this->year           = substr($pdf_name, 15, 4);
		$this->month          = date('F', strtotime(substr($pdf_name, 19, 3))); //Replace the 3 letter month with the full month name
		$payroll_sequence_int = ord(substr($pdf_name, 22, 1)) - ord('A') + 1; //Replace the letter with a number
		//		$this->payroll_sequence = number_to_ordinal_word($payroll_sequence_int); //Replace the number with an word
		$this->payroll_sequence = number_to_ordinal_suffix($payroll_sequence_int);
		$this->broker_id        = substr($pdf_name, 23, 5);
		$this->field_1          = substr($pdf_name, 28, 3);
		switch($this->field_1){
			case 'DIR':
				$this->field_1 = 'Direct';
				break;
			default:
				unset($this->field_1);
				break;
		}
		switch($_SESSION['company_name']){
			case 'concorde':
				$this->concorde_company_number = substr($pdf_name, 24, 2);
				$this->broker_id               = substr($pdf_name, 27, 5);
				break;
		}
		//for sorting purposes - payroll sequence is the day of the month
		$this->date = strtotime($payroll_sequence_int.' '.$this->month.' '.$this->year);
	}

	/**
	 * Gets the directory of the PDFs.
	 * Creates an array of objects of all the files.
	 * Sorts the array from most recent to oldest.
	 * Checks which files the user is authorized to see.
	 * Returns the list of statements as a string representing HTML Options objects.
	 * @param $dir
	 * @return string
	 */
	static function statements_list($dir){
	   $html_return_str = '';
		$files_array = scandir($dir);
        $file_obj_array = array();

		//Remove unnecessary array items.
		unset($files_array[array_search('.', $files_array, true)]);
		unset($files_array[array_search('..', $files_array, true)]);
		$files_array = array_values($files_array);

		foreach($files_array as $file){
			if(self::is_authorized($file)){
				$file_obj_array [] = new statement($file, "{$_SESSION['company_name']}/data/$file");
			}
		}
		$file_obj_array = self::sort_pdf_array_by_date($file_obj_array);

		foreach($file_obj_array as $file_obj){
			$option_content = "{$file_obj->year} {$file_obj->month} {$file_obj->payroll_sequence} Payroll";//{$file_obj->field_1} removed from option content-aksha(27-09-2018)
			switch($_SESSION['company_name']){
				case 'concorde':
					if($file_obj->concorde_company_number == 2){
						$option_content .= ' Asset Management';
					}
					break;
			}
			$html_return_str .= "<option value='{$file_obj->pdf_name}'>$option_content</option>";
		}

		$first_file_url = $_SESSION['first_statement_url'] = isset($file_obj_array[0])?$file_obj_array[0]->pdf_url:'nopdfs.pdf';//$file_obj_array[0]->pdf_url;

		return $html_return_str;
	}

	/**
	 * Echoes a javaScript script that changes the button and pdf object to match the first pdf.
	 * @return string
	 */
	static function statement_buttons_pdf_url_changer(){
		return "<script type='text/javascript'>
						$( '.statement_toolbar' ).attr( 'href', '{$_SESSION['first_statement_url']}' );
                        $( '#statement_pdf_object' ).attr( 'src',  '{$_SESSION['first_statement_url']}' );
						/*$( '#statement_pdf_object' ).attr( 'data',  '{$_SESSION['first_statement_url']}#view=Fit' );*/				
					</script>";
	}

	/**
	 * Gets a file object, and returns true/false if the logged in user is authorized to view the file.
	 * @param $file
	 * @return bool
	 */
    static function is_authorized($file){
		$broker_id = substr($file, 23, 5);
        $clear_no3 = str_pad($_SESSION['permrep_obj']->CLEAR_NO3, 5, '0', STR_PAD_LEFT);
        $rep_no = str_pad($_SESSION['permrep_obj']->REP_NO, 5, '0', STR_PAD_LEFT);
		switch($_SESSION['company_name']){
			case 'lifemark':
                //if(stripos($broker_id, $_SESSION['permrep_obj']->CLEAR_NO3) !== FALSE){
                if($broker_id==$clear_no3){
                    return true;
				} else{
					return false;
				}
				/*if($broker_id == $_SESSION['permrep_obj']->CLEAR_NO3){
					return true;
				} else{
					return false;
				}*/
				break;
			case 'concorde':
				$broker_id = substr($file, 27, 5);
				break;
		}
		if($broker_id == $rep_no){//echo '<pre>';print_r($broker_id.'-'.$rep_no);
			return true;
		} else{
			return false;
		}
	}

	/**
	 * Very not efficient sorting.
	 * Gets an array of PDF names, and bubble sorts from newest to oldest.
	 * @param $file_obj_array
	 * @return array
	 */
	static function sort_pdf_array_by_date($file_obj_array){
		for($j = 0; $j < count($file_obj_array); $j++){
			for($i = 0; $i < count($file_obj_array) - 1; $i++){ //Will run on all items except the last one
				if($file_obj_array[$i]->date < $file_obj_array[$i + 1]->date){
					array_splice($file_obj_array, $i + 2, 0, array($file_obj_array[$i]));
					unset($file_obj_array[$i]);
					$file_obj_array = array_values($file_obj_array);
				}
			}
		}

		return $file_obj_array;
	}

}

class permrep{
	public $REP_NO;
	public $CLEAR_NO;
	public $FNAME;
	public $LNAME;
	public $MIDDLE;
	public $SUFFIX;
	public $H_ADDR;
	public $H_CITY;
	public $H_STATE;
	public $H_ZIP;
	public $M_ADDR;
	public $M_ADDR2;
	public $M_CITY;
	public $M_STATE;
	public $M_ZIP;
	public $W_PHONE;
	public $H_PHONE;
	public $FAX;
	public $SOC_SEC;
	public $TAXID;
	public $EMP_DATE;
	public $CRD_NO;
	public $TERM_DATE;
	public $LP_STATES;
	public $MUT_STATES;
	public $SEC_STATES;
	public $VA_STATES;
	public $FA_STATES;
	public $L_STATES;
	public $RIA_STATES;
	public $BRANCH;
	public $BRANCH_NO;
	public $OVERRIDE;
	public $OVER_RATE;
	public $OVERRIDE2;
	public $OVER2_RATE;
	public $OVERRIDE3;
	public $OVER3_RATE;
	public $DOB;
	public $PAYTYPE;
	public $NOTES;
	public $EQUI_ACCT;
	public $COMMBASIS;
	public $FRN_DOM;
	public $SECCALC;
	public $BRANCH1;
	public $BRANCH2;
	public $BRANCH3;
	public $PAY_TOT;
	public $GROSS_TOT;
	public $SEC_CALC;
	public $DEFER_RATE;
	public $DEFER_AMT;
	public $SPL_REP;
	public $SPL_RATE;
	public $SPL_REP2;
	public $SPL2_RATE;
	public $EMAIL;
	public $WEBPSWD;
	public $INSUR;
	public $RIA;
	public $CFP;
	public $CFA;
	public $CLU;
	public $CPA;
	public $CHFA;
	public $SAL_NO;
	public $USERNAME;
	public $ACCESSLEVE;
	public $CUSTOMERID;
	public $EDIT_DATE;
	public $BND_STATES;
	public $OPT_STATES;
    //public $REP_LINK;
	public $OSJMGR;
	public $OSJMGR2;
    //public $CLEAR_NO3;
    public $REP_LINK1;
    public $REP_LINK2;
    public $REP_LINK3;
    public $REP_LINK4;
    public $REP_LINK5;     

	function __construct($post = null){
		//escape user input for protection against sql injection
		foreach($post as $key => $value){
			$post[$key] = mysqli_real_escape_string($GLOBALS['db_conn'], $value);
		}
        if(isset($post['func']) && $post['func']=='log_in_by_supervisor')
        {
            if(isset($post['username_or_email']) && $post['username_or_email']=='admin')
            {
                $post['broker_selection'] = str_replace("ADM_","",$post['broker_selection']);
                $sql_str = "SELECT * FROM admin WHERE REP_NO = '{$post['broker_selection']}' LIMIT 1;";
    		    $result  = db_query($sql_str);
            }
            else
            {
                $sql_str = "SELECT * FROM permrep WHERE REP_NO = '{$post['broker_selection']}' LIMIT 1;";
    		    $result  = db_query($sql_str);
            }
        }
        else
        {
            if(isset($post['username_or_email']) && $post['username_or_email']=='admin')
            {
                $sql_str = "SELECT * FROM admin WHERE BINARY USERNAME = '{$post['username_or_email']}' OR EMAIL = '{$post['username_or_email']}' LIMIT 1;";
    		    $result  = db_query($sql_str);
            }
            else{
                $sql_str = "SELECT * FROM permrep WHERE BINARY USERNAME = '{$post['username_or_email']}' OR EMAIL = '{$post['username_or_email']}' LIMIT 1;";
    		    $result  = db_query($sql_str);
            }
        }        
        if($result->num_rows != 0){ //in case there is an existing permrep with this username or email
			while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
				foreach($this as $attr_name => $attr_value){
					$this->$attr_name = $row[$attr_name];
				}
			}
		} else{
			foreach($this as $attr_name => $attr_value){
				$this->$attr_name = $post[$attr_name];
				$this->USERNAME   = '';
			}
		}
	}

	/**
	 * Logs in the account
	 * @param      $post
	 * @param bool $is_log_in_from_cookies
	 * @return json_obj
	 * @throws Exception
	 */
	function log_in($post, $is_log_in_from_cookies = false){
		if($this->USERNAME == ''){
			throw new Exception("Username not found", EXCEPTION_WARNING_CODE);
		}

		if(!$is_log_in_from_cookies){
			if($this->WEBPSWD != $post['password']){
				throw new Exception("Password is incorrect", EXCEPTION_WARNING_CODE);
			}
		} else{
			if(md5($this->WEBPSWD) != $post['password']){
				throw new Exception("Password is incorrect", EXCEPTION_WARNING_CODE);
			}
		}

		$_SESSION['permrep_obj'] = $this;

                
        $is_branch_manger = is_branch_manager($this->REP_NO);//print_r($is_branch_manger);exit;
        $is_link_broker = is_link_broker($this->REP_NO);
        if($is_branch_manger != '' && $this->BRANCH_NO==$is_branch_manger)
        {
            unset($_SESSION['admin_no']);
            unset($_SESSION['link_broker']);
            $_SESSION['branch_no'] = $is_branch_manger;
            $_SESSION['supervisor_broker'] = $this->REP_NO;
        }
        else if($this->USERNAME == 'admin')
        {
            unset($_SESSION['branch_no']);
            unset($_SESSION['supervisor_broker']);
            unset($_SESSION['link_broker']);
            $_SESSION['admin_no'] = $this->REP_NO;
        }
        else if($is_link_broker == 1)
        {
            unset($_SESSION['branch_no']);
            unset($_SESSION['supervisor_broker']);
            unset($_SESSION['admin_no']);
            $_SESSION['link_broker'] = $this->REP_NO;
        }
        else
        {
            unset($_SESSION['branch_no']);
            unset($_SESSION['supervisor_broker']);
            unset($_SESSION['admin_no']);
            unset($_SESSION['link_broker']);
            //Remember me (put cookies on computer)
    		if(isset($post['remember_me']) && $post['remember_me'] == 'on'){
    			setcookie('foxtrot_online_password', md5($this->WEBPSWD), time() + (86400 * 7), "/");
    			setcookie('foxtrot_online_username', $this->USERNAME, time() + (86400 * 7), "/");
    		}
        }
        //echo 'hii';exit;
        $json_obj         = new json_obj();
        $json_obj->data_arr['is_branch_manager'] = '';
        $json_obj->data_arr['is_admin'] = '';
        if(isset($is_branch_manger) && $this->BRANCH_NO==$is_branch_manger)
        {
            $json_obj->data_arr['is_branch_manager'] = $is_branch_manger;
        }
        else if(isset($_SESSION['admin_no']) && $_SESSION['admin_no'] != '')
        {
            $json_obj->data_arr['is_admin'] = $_SESSION['admin_no'];
        }
        else if(isset($_SESSION['link_broker']) && $_SESSION['link_broker'] != '')
        {
            $json_obj->data_arr['is_link_broker'] = $_SESSION['link_broker'];
        }
		$json_obj->status = true;//print_r($json_obj);exit;

		return $json_obj;
	}
    function log_in_by_supervisor($post, $is_log_in_from_cookies = false){
		if($this->USERNAME == ''){
			throw new Exception("Username or Email doesn't exist", EXCEPTION_WARNING_CODE);
		}

		if(!$is_log_in_from_cookies){
			if($this->WEBPSWD != $post['password']){
				throw new Exception("Password is incorrect", EXCEPTION_WARNING_CODE);
			}
		} else{
			if(md5($this->WEBPSWD) != $post['password']){
				throw new Exception("Password is incorrect", EXCEPTION_WARNING_CODE);
			}
		}

		$_SESSION['permrep_obj'] = $this;//echo '<pre>';print_r($_SESSION['permrep_obj']);exit;

		//Remember me (put cookies on computer)
		if(isset($post['remember_me']) && $post['remember_me'] == 'on'){
			setcookie('foxtrot_online_password', md5($this->WEBPSWD), time() + (86400 * 7), "/");
			setcookie('foxtrot_online_username', $this->USERNAME, time() + (86400 * 7), "/");
		}
        $json_obj         = new json_obj();
        $json_obj->status = true;//print_r($json_obj);exit;

		return $json_obj;
	}
    
	/**
	 * Check if email exists, if so - send a mail to the user with the password.
	 * @return json_obj
	 * @throws Exception
	 */
	function forgot_password(){
		if($this->USERNAME == ''){
			throw new Exception("Email doesn't exist", EXCEPTION_WARNING_CODE);
		}
        $time = date('m/d/Y H:i:s A');
        $fname = ucfirst($this->FNAME);
		//		The message
		$msg = "
        Hello {$fname},\n
        A request was made to be reminded of your password.\n
        Password : {$this->WEBPSWD}\n
        Please contact your broker/dealer with any questions.\n
        $time
        ";

		$headers = "From: FoxTrot Online <system@FoxTrotOnline.com>\n";

		//		Send email
		$flag     = mail($this->EMAIL, "FoxTrot Online Password Recovery", $msg, $headers);
		$json_obj = new json_obj();
		if($flag){
			$json_obj->status = true;

			return $json_obj;
		} else{
			throw new Exception("The mail wasn't sent. Contact administrator.", EXCEPTION_DANGER_CODE);
		}
	}

	/**
	 * Checks if there are saved cookies with the credentials.
	 * If so - return true.
	 * If not - redirect to log in page.
	 */    
	static function is_remembered(){
		if(isset($_COOKIE['foxtrot_online_username']) && isset($_COOKIE['foxtrot_online_password'])){
			$_GET["company_name"] = isset($_GET["company_name"])?addslashes(htmlentities($_GET["company_name"])):'';
			$company_arr          = array('company_name' => $_GET["company_name"]);
			db_choose($company_arr);
			db_connect(); //open DB connection
			$credentials_arr ['username_or_email'] = $_COOKIE['foxtrot_online_username'];
			$credentials_arr ['password']          = $_COOKIE['foxtrot_online_password'];
			$permrep_obj                           = new permrep($credentials_arr);
			$log_in_result                         = $permrep_obj->log_in($credentials_arr, true);
			$GLOBALS['db_conn']->close(); //close DB connection
			if($log_in_result->status == true){
				return true;
			} else{ //in case there was some kind of error logging in
				header("Location: login.php");

				return false;
			}
		}

		return false;
	}
}
function is_branch_manager($rep_no){
    
    if($rep_no != '')
    {
        $sql_str = "SELECT * FROM branches WHERE REP_NO = '{$rep_no}' or REP_NO2 = '{$rep_no}' LIMIT 1;";
    	$result  = db_query($sql_str);
                
    	if($result->num_rows != 0){ //in case there is an existing permrep with this username or email
    		while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
    			$manager_branch_no = isset($row['BRANCH_NO'])?$row['BRANCH_NO']:'';
                return $manager_branch_no;
    		}
    	}
    }
}
function is_link_broker($rep_no){
    
    $is_link_broker = '';
    if($rep_no != '')
    {
        $sql_str = "SELECT * FROM permrep WHERE rep_link1 = '{$rep_no}' or rep_link2 = '{$rep_no}' or rep_link3 = '{$rep_no}' or rep_link4 = '{$rep_no}' or rep_link5 = '{$rep_no}';";
    	$result  = db_query($sql_str);
                
    	if($result->num_rows > 0){ //in case there is an existing permrep with this username or email
    		$is_link_broker = 1;
    	}
    }
    return $is_link_broker;
}
function get_branch_broker($branch_no){
    $return = array();
    
    $sql_str = "SELECT * FROM permrep WHERE BRANCH_NO = '{$branch_no}' ORDER BY LNAME ASC;";
	$result  = db_query($sql_str);
            
	if($result->num_rows != 0){ //in case there is an existing permrep with this username or email
		while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
			array_push($return,$row);
        }
        return $return;
	}
}
function get_all_broker(){
    $return = array();
    
    $sql_str = "SELECT * FROM permrep ORDER BY LNAME ASC;";
	$result  = db_query($sql_str);
            
	if($result->num_rows != 0){ //in case there is an existing permrep with this username or email
		while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
			array_push($return,$row);
        }
        return $return;
	}
}
function get_admin_data($admin_no){
    $return = array();
    
    $sql_str = "SELECT * FROM admin WHERE REP_NO = '{$admin_no}' ORDER BY LNAME ASC;";
	$result  = db_query($sql_str);
            
	if($result->num_rows != 0){ //in case there is an existing permrep with this username or email
		while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
			array_push($return,$row);
        }
        return $return;
	}
}
function get_link_broker($rep_no){
    $return = array();
    
    $sql_str = "SELECT * FROM permrep WHERE rep_link1 = '{$rep_no}' or rep_link2 = '{$rep_no}' or rep_link3 = '{$rep_no}' or rep_link4 = '{$rep_no}' or rep_link5 = '{$rep_no}' or rep_no = '{$rep_no}' ORDER BY LNAME ASC;";
	$result  = db_query($sql_str);
            
	if($result->num_rows != 0){ //in case there is an existing permrep with this username or email
		while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
			array_push($return,$row);
        }
        return $return;
	}
}
/**
 * Gets the chart name as a parameter.
 * Outputs the chart data and labels as javascript variables (arrays) inside a script html tag
 * @param       $chart_name
 * @param array $post
 * @return string
 * @throws exception
 */
function dashboard_top_sponsors($post = array(
	'co_time_period'       => 'Previous 12 Months'
))
{
     
    $where_clause = '';
    switch($post['co_time_period']){
		case 'Year to Date':
			$from_date = strtotime('first day of January '.date('Y'));
			$from_date = date('Y-m-d H:i:s', $from_date);
			$to_date   = date('Y-m-d H:i:s');
			break;
		case  'Month to Date':
			$from_date = strtotime('midnight first day of this month');
			$from_date = date('Y-m-d H:i:s', $from_date);
			$to_date   = date('Y-m-d H:i:s');
			break;
		case  'Previous 12 Months':
			$from_date = strtotime('midnight 12 months ago');
			$from_date = date('Y-m-d H:i:s', $from_date);
			$to_date   = date('Y-m-d H:i:s');
			break;
		case  'Last Year':
			$last_year = date('Y') - 1;
			$from_date = strtotime('midnight first day of January '.$last_year);
			$from_date = date('Y-m-d H:i:s', $from_date);
			$to_date   = strtotime('first day of January '.date('Y'));
			$to_date   = date('Y-m-d H:i:s', $to_date);
			break;
		case  'Last Month':
			$from_date = strtotime('midnight first day of previous month');
			$from_date = date('Y-m-d H:i:s', $from_date);
			$to_date   = strtotime('midnight first day of this month');
			$to_date   = date('Y-m-d H:i:s', $to_date);
			break;
	}
	if(isset($from_date) && isset($to_date)){
		$where_clause          = " AND date >= DATE('$from_date') AND date < DATE('$to_date')";
	}
    $sql_str = "SELECT SUM(t.`comm_rec`) as gross_commission,c.`company` as sponsor
                FROM trades as t
                LEFT JOIN company as c on c.co_no=t.co_no
                WHERE t.co_no != 0 AND t.rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause
                group by t.co_no ORDER BY gross_commission  DESC limit 10";
               
        /*$sql_str = "SELECT MAX(t.comm_rec) as gross_commission
					FROM trades as t
                    WHERE rep_no = {$_SESSION["permrep_obj"]->permRepID}
					$where_clause limit 10;";*/
    $result = db_query($sql_str);
    $html_table_string = "<table class='main-table table table-hover table-striped table-sm'>
						<thead>
    						<tr>
    							<th>Sponsor Name</th>";
                                if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
                                {
                                    $html_table_string.="<th class='text-right'>Gross Fees</th>";
                                }else{
                               	    $html_table_string.="<th class='text-right'>Gross Commission Amount</th>";
        					    } 
    						$html_table_string.="</tr>
						</thead>
						<tbody>";    
     
    if($result->num_rows != 0){
        while($row = $result->fetch_assoc()){
        $html_table_string .= "<tr>
    						<td>{$row['sponsor']}</td>
    						  <td class='text-right'>\${$row['gross_commission']}</td>
    						</tr>";    
        }        
    }
    else
    {
        $html_table_string .= "<tr>
        						 <td colspan='3'>No relevant records were found.</td>
                              </tr>";
	}        


	$html_table_string .= '</tbody>
	</table>';
    $json_obj->data_arr['sponsor_table'] = $html_table_string;
    $json_obj->status                    = true;
    return $json_obj;
    
}  
function pie_chart_data_and_labels($chart_name, $post = array(
	'time_period'       => 'all_dates',
	'choose_date_radio' => 'date',
	'choose_pay_radio'  => 'rep_comm'
)){
    $where_clause = '';
    $reports_table_html = '';
    //$from_date = '';
    //$to_date = '';
	switch($chart_name){
		case 'dashboard_pie_chart':
            $where_clause ='';
			if(isset($post["to_date"]) && $post["to_date"] != null ){
				$where_clause = "AND trades.date_rec <= '{$post["to_date"]}'";
			}
            else
            {
                $to_date = date('Y-m-d');
                $where_clause = "AND trades.date_rec <= '$to_date'";
            }
            if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
            {
                $group_by = ' GROUP BY trades.cli_no order by total_commission desc limit 5 ';
            }else{
                $group_by = ' GROUP BY trades.inv_type';
            }
			$sql_str = "SELECT SUM(comm_rec) AS total_commission, trades.inv_type, prodtype.product, trades.cli_no, clients.fname, clients.lname
					FROM trades
					RIGHT JOIN prodtype ON trades.inv_type = prodtype.inv_type
                    RIGHT JOIN clients ON trades.cli_no = clients.cli_no
					WHERE trades.rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					AND trades.pay_date IS NULL
					AND trades.date_rec IS NOT NULL
					$where_clause
					$group_by;";
			$result  = db_query($sql_str);
			if($result->num_rows != 0){ //If there is a value returned
				while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
					if($row["total_commission"] != 0){
						$pie_chart_data_values [] = $row['total_commission'];
                        if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
                        {
                            $cli_name = '';
                            $fname = isset($row['fname'])?$row['fname']:'';
                            if($fname != '' && $row['lname'] != '')
                            {
                                $cli_name = $fname.', '.$row['lname'];
                            }
                            else{
                                $cli_name = $fname.''.$row['lname'];
                            }
                            $pie_chart_labels []      = $cli_name;
                        }else{
                            $pie_chart_labels []      = $row['product'];
                        }
					}
				}
			} else{
				throw new Exception("No relevant records were found.", EXCEPTION_WARNING_CODE);
			}
			break;
		case 'reports_pie_chart':
            //$from_date = '';
            //$to_date = '';
			switch($post['time_period']){
				case 'all_dates':
					unset($_SESSION['from_date']);
					unset($_SESSION['to_date']);
					break;
				case 'Year to Date':
					$from_date = strtotime('first day of January '.date('Y'));
					$from_date = date('Y-m-d H:i:s', $from_date);
					$to_date   = date('Y-m-d H:i:s');
					break;
				case  'Month to Date':
					$from_date = strtotime('midnight first day of this month');
					$from_date = date('Y-m-d H:i:s', $from_date);
					$to_date   = date('Y-m-d H:i:s');
					break;
				case  'Previous 12 Months':
					$from_date = strtotime('midnight 12 months ago');
					$from_date = date('Y-m-d H:i:s', $from_date);
					$to_date   = date('Y-m-d H:i:s');
					break;
				case  'Last Year':
					$last_year = date('Y') - 1;
					$from_date = strtotime('midnight first day of January '.$last_year);
					$from_date = date('Y-m-d H:i:s', $from_date);
					$to_date   = strtotime('first day of January '.date('Y'));
					$to_date   = date('Y-m-d H:i:s', $to_date);
					break;
				case  'Last Month':
					$from_date = strtotime('midnight first day of previous month');
					$from_date = date('Y-m-d H:i:s', $from_date);
					$to_date   = strtotime('midnight first day of this month');
					$to_date   = date('Y-m-d H:i:s', $to_date);
					break;
				case  'Custom':
					$from_date = date_format(date_create($post['from_date']), 'Y-m-d H:i:s');
					$to_date   = date_format(date_add(date_create($post['to_date']), date_interval_create_from_date_string("23 hours 59 minutes 59 seconds")), 'Y-m-d H:i:s');
					break;
			}
			if(isset($from_date) && isset($to_date)){
				$_SESSION['from_date'] = $from_date;
				$_SESSION['to_date']   = $to_date;
				$where_clause          = "AND {$post['choose_date_radio']} >= DATE('$from_date') AND {$post['choose_date_radio']} < DATE('$to_date')";
			}
            
            if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
            {
                $group_by = ' GROUP BY cli_no';
            }else{
                $group_by = ' GROUP BY inv_type';
            }
			$sql_str = "SELECT SUM({$post['choose_pay_radio']}) AS total_commission, trades.inv_type, prodtype.product, trades.cli_no, clients.fname, clients.lname
					FROM trades
					RIGHT JOIN prodtype ON trades.inv_type = prodtype.inv_type
                    RIGHT JOIN clients ON trades.cli_no = clients.cli_no
					WHERE trades.rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause
					$group_by order by total_commission desc;";
			$result  = db_query($sql_str);
			if($result->num_rows != 0){ //If there is a value returned
				while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
					if($row['total_commission'] != 0){
						$pie_chart_data_values [] = $row['total_commission'];
                        if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
                        {
                            $cli_name = '';
                            $fname = isset($row['fname'])?$row['fname']:'';
                            if($fname != '' && $row['lname'] != '')
                            {
                                $cli_name = $fname.', '.$row['lname'];
                            }
                            else{
                                $cli_name = $fname.''.$row['lname'];
                            }
                            $pie_chart_labels []      = $cli_name;
                        }else{
                            $pie_chart_labels []      = $row['product'];
                        }
					}
                    if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
                    {
                        $cli_name = '';
                        $fname = isset($row['fname'])?$row['fname']:'';
                        if($fname != '' && $row['lname'] != '')
                        {
                            $cli_name = $fname.', '.$row['lname'];
                        }
                        else{
                            $cli_name = $fname.''.$row['lname'];
                        }
                        $table_data [$cli_name] = $row['total_commission'];
                    }else{
                        $table_data [$row['product']] = $row['total_commission'];
                    }
				}
			} else{
				throw new Exception("No relevant records were found.", EXCEPTION_WARNING_CODE);
			}

			$post['from_date']  = isset($from_date)?$from_date:'';
			$post['to_date']    = isset($to_date)?$to_date:'';
			$reports_table_html = reports_table_html($post, $table_data);

			break;
	}

	$pie_chart_data = [
		'datasets' => [
			[
				'data'            => $pie_chart_data_values,
				'backgroundColor' => $GLOBALS['PIE_CHART_COLORS_ARRAY'],
				'borderColor'     => 'rgb(255,255,255)',
				'borderWidth'     => 1
			],
		],
		'labels'   => $pie_chart_labels
	];

	$pie_chart_data = json_encode($pie_chart_data);

	$json_obj                                 = new json_obj();
	$json_obj->data_arr['pie_chart_data']     = $pie_chart_data;
	$json_obj->data_arr['reports_table_html'] = $reports_table_html;
	$json_obj->status                         = true;

	return $json_obj;
}

/**
 * Gets the chart name as a parameter.
 * Outputs the chart data and labels as javascript variables (arrays) inside a script html tag
 * @param $post
 * @return string
 * @throws exception
 */
function line_chart_data_and_labels($post){
    $where_clause = '';
    $flag_monthly = false;
	if($post["time_period"] == 'all_dates'){
		unset($_SESSION['from_date']);
		unset($_SESSION['to_date']);
	} else if($post["time_period"] == 'Previous 12 Months'){
		$from_date = strtotime('midnight 12 months ago');
		$from_date             = date('Y-m-d H:i:s', $from_date);
		$to_date               = date('Y-m-d H:i:s');
		$_SESSION['from_date'] = $from_date;
		$_SESSION['to_date']   = $to_date;
	}
    else if($post["time_period"] == 'Year to Date'){
		$from_date = strtotime('midnight first day of January');
		$from_date             = date('Y-m-d H:i:s', $from_date);
		$to_date               = date('Y-m-d H:i:s');
		$_SESSION['from_date'] = $from_date;
		$_SESSION['to_date']   = $to_date;
	}
    else if($post["time_period"] == 'Month to Date'){
		$from_date = strtotime('midnight first day of this month');
		$from_date             = date('Y-m-d H:i:s', $from_date);
		$to_date               = date('Y-m-d H:i:s');
		$_SESSION['from_date'] = $from_date;
		$_SESSION['to_date']   = $to_date;
	}
    else if($post["time_period"] == 'Last Year'){
        $last_year = date('Y') - 1;
	    $from_date = strtotime('midnight first day of January '.$last_year);
		$from_date             = date('Y-m-d H:i:s', $from_date);
        $to_date   = strtotime('first day of January '.date('Y'));
		$to_date   = date('Y-m-d H:i:s', $to_date);
		$_SESSION['from_date'] = $from_date;
		$_SESSION['to_date']   = $to_date;
	}  
    else if($post["time_period"] == 'Last Month'){
        $from_date = strtotime('midnight first day of previous month');
		$from_date             = date('Y-m-d H:i:s', $from_date);
        $to_date   = strtotime('midnight first day of this month');
		$to_date   = date('Y-m-d H:i:s', $to_date);
		$_SESSION['from_date'] = $from_date;
		$_SESSION['to_date']   = $to_date;
	}   
	if(!isset($post["choose_date_radio"])){
	   if($post['time_period'] == 'Month to Date' || $post['time_period'] == 'Last Month')
       {
            $post["choose_date_radio"] = 'date';
       }else{
            $post["choose_date_radio"] = 'pay_date';
       }
		
	}
	if(!isset($post["choose_pay_radio"])){
		$post["choose_pay_radio"] = 'rep_comm';
	}
	if(isset($_SESSION["from_date"]) && isset($_SESSION["to_date"])){
		$where_clause = "AND {$post["choose_date_radio"]} >= DATE('{$_SESSION["from_date"]}') AND {$post["choose_date_radio"]} < DATE('{$_SESSION["to_date"]}')";
	}
	switch($post['time_period']){
		case 'all_dates':
		case 'Year to Date':
		case 'Previous 12 Months':
		case 'Last Year':
			monthly:
			$sql_str      = "SELECT EXTRACT(YEAR_MONTH FROM {$post["choose_date_radio"]}) as 'date_time', SUM({$post["choose_pay_radio"]}) AS total_commission
        					FROM trades
        					WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
        					$where_clause
        					GROUP BY YEAR({$post["choose_date_radio"]}), MONTH({$post["choose_date_radio"]});";
          			        $flag_monthly = true;
			break;
		case  'Month to Date':
		case  'Last Month':
			daily:
			$sql_str = "SELECT DATE({$post["choose_date_radio"]}) as date_time, SUM({$post["choose_pay_radio"]}) as total_commission
    					FROM trades
    					WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
    					$where_clause
    					GROUP BY DATE({$post["choose_date_radio"]});";
			break;
		case  'Custom':
			$to_date   = DateTime::createFromFormat('Y-m-d', $post['to_date']);
			$from_date = DateTime::createFromFormat('Y-m-d', $post['from_date']);
			$diff      = date_diff($to_date, $from_date);
			if($diff->days > 90){ //check the difference between the dates and refer to the matching sql
				goto monthly;
			} else{
				goto daily;
			}
			break;
		default:
			goto monthly;
			break;
	}

	$result = db_query($sql_str);
    	if($result->num_rows != 0){ //If there is a value returned
		while($row = $result->fetch_assoc()){
			$line_chart_values [] = $row['total_commission'];
			if($flag_monthly == true){
				$year                 = substr($row['date_time'], 0, 4);
				$month                = substr($row['date_time'], 4, 2);
				$month                = date('M', mktime(0, 0, 0, $month));
				$line_chart_labels [] = "$month-$year";
			} else{
				$line_chart_labels [] = $row['date_time'];
			}
		}
	} else{ //if there are no results
		throw new Exception("No relevant records were found.", EXCEPTION_WARNING_CODE);
	}

	$line_chart_data = [
		'datasets' => [
			[
				'data'                 => $line_chart_values,
				'lineTension'          => 0,
				'backgroundColor'      => 'transparent',
				'borderColor'          => '#007bff',
				'borderWidth'          => 4,
				'pointBackgroundColor' => '#007bff'
			],
		],
		'labels'   => $line_chart_labels
	];

	$line_chart_data = json_encode($line_chart_data);

	return $line_chart_data;
}

/**
 * Gets as parameters the charts data and labels
 * Creates the required HTML table as a string.
 * Defines the string as a constant, for later use.
 * @param $post
 * @param $original_table_data
 * @return string
 * @throws exception
 */
function reports_table_html($post, $original_table_data){
    $last_values = array();
    $growth_cell = '';
	switch($post['time_period']){ //find the Last values
		case 'all_dates':
			break;
		case 'Year to Date':
			$last_from_date = date('Y-m-d H:i:s', strtotime("{$post["from_date"]}"));
			$last_to_date   = date('Y-m-d H:i:s', strtotime("{$post["to_date"]}"));
			break;
		case  'Month to Date':
			$last_from_date = date('Y-m-d H:i:s', strtotime("{$post["from_date"]}"));
			$last_to_date   = date('Y-m-d H:i:s', strtotime("{$post["to_date"]}"));
			break;
		case  'Previous 12 Months':
			$last_from_date = date('Y-m-d H:i:s', strtotime("{$post["from_date"]}"));
			$last_to_date   = date('Y-m-d H:i:s', strtotime("{$post["to_date"]}"));
			break;
		case  'Last Year':
			$last_from_date = date('Y-m-d H:i:s', strtotime("{$post["from_date"]}"));
			$last_to_date   = date('Y-m-d H:i:s', strtotime("{$post["to_date"]}"));
			break;
		case  'Last Month':
			$last_from_date = date('Y-m-d H:i:s', strtotime("{$post["from_date"]}"));
			$last_to_date   = date('Y-m-d H:i:s', strtotime("{$post["to_date"]}"));
			break;
		case  'Custom':
			break;
	}

	if(isset($last_from_date) && isset($last_to_date)){
		$where_clause = "AND date >= DATE('$last_from_date') AND date < DATE('$last_to_date')";
        
        if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
        {
            $group_by = ' GROUP BY cli_no';
        }else{
            $group_by = ' GROUP BY inv_type';
        }
        
        $sql_str = "SELECT SUM(rep_comm) AS total_commission, trades.inv_type, prodtype.product, trades.cli_no, clients.fname, clients.lname
					FROM trades
					RIGHT JOIN prodtype ON trades.inv_type = prodtype.inv_type
                    RIGHT JOIN clients ON trades.cli_no = clients.cli_no
					WHERE trades.rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause
					$group_by;";
		/*$sql_str      = "SELECT SUM(rep_comm) AS total_commission, trades.inv_type, prodtype.product
    					FROM trades
    					RIGHT JOIN prodtype ON trades.inv_type = prodtype.inv_type
    					WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
    					$where_clause
    					GROUP BY inv_type;";*/
		$result       = db_query($sql_str);
		if($result->num_rows != 0){ //If there is a value returned
			while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
                if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
                {
                    $cli_name = '';
                    $fname = isset($row['fname'])?$row['fname']:'';
                    if($fname != '' && $row['lname'] != '')
                    {
                        $cli_name = $fname.', '.$row['lname'];
                    }
                    else{
                        $cli_name = $fname.''.$row['lname'];
                    }
                    $last_values [$cli_name] = $row['total_commission'];
                }else{
                    $last_values [$row['product']] = $row['total_commission'];
                }
			}
		}

		foreach($original_table_data as $product => $original_total_commission){
		  if (array_key_exists($product, $last_values)) {
			$table_data [$product] = array(
				$original_table_data[$product],
				($last_values[$product] == null) ? '-' : $last_values[$product]
				//replace null with -
			);
            }
			unset($last_values[$product]); //remove "used" rows
		}

		if(isset($last_values)){
			foreach($last_values as $last_product => $last_value){
				$table_data[$last_product] = array(
					'-',
					$last_value
				);
			}
		}
	}

	$analytics_headers = (isset($last_values)) ? '<th class="text-right">Growth</th>' : '';
	$html_table_string = "<table class='main-table table table-hover table-striped table-sm'>
						<thead>
						<tr>
							<th></th>
							<th>Commission</th>
							<th class='text-right'>Current Period</th>
							<th class='text-right'>Previous Period</th>
							$analytics_headers
						</tr>
						</thead>
						<tbody>";

	$i          = 0;
	$table_data = (isset($table_data)) ? $table_data : $original_table_data;
	foreach($table_data as $product => $values_arr){
		$color = $GLOBALS['PIE_CHART_COLORS_ARRAY'][$i];//print_r($GLOBALS['PIE_CHART_COLORS_ARRAY'][$i]);exit;
		$i++;
		if(isset($last_values)){
			if($values_arr[0] == $values_arr[1]){
				$text_class = 'text-primary';
				$growth     = '0%';
			} elseif($values_arr[0] > $values_arr[1]){ //if the total is bigger than the last
				$text_class = 'text-success';
                if(isset($values_arr[0]) && $values_arr[0] >0 && isset($values_arr[1]) && $values_arr[1] >0){
                    $growth     = round(100 * ($values_arr[0] / $values_arr[1]), 2);//change for devided by zero aksha(27-09-2018)
                }else{
                    $growth = '0';
                }
                if(is_infinite($growth)){
					$growth = '<larger>---</larger>';
				} else{
					$growth = $growth.'%';
				}
			} else{ // if the last is bigger than the total
				$text_class = 'text-danger';
				$growth     = number_format(100 * (($values_arr[0] / $values_arr[1]) - 1), 2).'%';
			}
			$growth_cell = "<td class='text-right $text_class'><b>$growth</b></td>";
		}
		if(!is_array($values_arr)){
			$values_arr = array(
				$values_arr,
				'-'
			);
		}
		$values_arr[0] = number_format(floatval($values_arr[0]), 2);
		$values_arr[1] = number_format(floatval($values_arr[1]), 2);
		if($values_arr[0] == 0 && $values_arr[1] == 0){
			$i--;
			continue;
		}
		$html_table_string .= "<tr>
						<td>
							<ul class='graph_legend'>
								<li style='color: $color;'></li>
							</ul>
						</td>
						<td>$product</td>
						<td class='text-right'>\${$values_arr[0]}</td>
						<td class='text-right'>\${$values_arr[1]}</td>
						$growth_cell
						</tr>";
	}
	$html_table_string .= '</tbody>
				</table>';

	return $html_table_string;
}

/**
 * Returns a string representing the total commissions posted.
 * @param $to_date
 * @return string
 * @throws exception
 */
function dashboard_posted_commissions($to_date = null){
    $where_clause = '';
	if($to_date != null){
		$where_clause = "AND date_rec <= '$to_date'";
	}
    else
    {
        $to_date = date('Y-m-d');
        $where_clause = "AND date_rec <= '$to_date'";
    }
	$sql_str = "SELECT SUM(comm_rec) AS posted_commission
			FROM trades
			WHERE pay_date is NULL
			AND date_rec IS NOT NULL
			$where_clause
			AND rep_no = {$_SESSION['permrep_obj']->REP_NO} LIMIT 1;";
	$result  = db_query($sql_str);
	if($result->num_rows != 0){ //If there is a value returned
		while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
			$posted_commissions = ($row['posted_commission'] != null) ? $row['posted_commission'] : '0';
		}
	}
    if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
    {
        return "Fees Received: \$$posted_commissions";
    }else{
        return "Posted Commissions: \$$posted_commissions";
    }
}

/**
 * Gets an integer as a parameter and transform it to a string (1 => first, 2 => second, etc.)
 * @param $num
 * @return string
 */
function number_to_ordinal_word($num){
	$first_word  = array(
		'eth',
		'First',
		'Second',
		'Third',
		'Fourth',
		'Fifth',
		'Sixth',
		'Seventh',
		'Eighth',
		'Ninth',
		'Tenth',
		'Eleventh',
		'Twelfth',
		'Thirteenth',
		'Fourteenth',
		'Fifteenth',
		'Sixteenth',
		'Seventeenth',
		'Eighteenth',
		'Nineteenth',
		'Twentieth'
	);
	$second_word = array(
		'',
		'',
		'Twenty',
		'Thirty',
		'Forty',
		'Fifty'
	);

	if($num <= 20)
		return $first_word[$num];

	$first_num  = substr($num, -1, 1);
	$second_num = substr($num, -2, 1);

	return $string = str_replace('y-eth', 'ieth', $second_word[$second_num].' '.$first_word[$first_num]);

}

/**
 * Gets a number and returns it with an ordinal suffix
 * @param $number
 * @return string
 */
function number_to_ordinal_suffix($number){
	$ends = array(
		'th',
		'st',
		'nd',
		'rd',
		'th',
		'th',
		'th',
		'th',
		'th',
		'th'
	);
	if((($number % 100) >= 11) && (($number % 100) <= 13))
		return $number.'th'; else
		return $number.$ends[$number % 10];
}
function drill_down_pie_chart($post){
    $where_clause = '';
	switch($post["chart_id"]){ //Choose relevant chart and create SQL
		case 'dashboard_pie_chart':
			$sql_str = "SELECT date,INVEST, CLEARING,comm_rec, rep_comm
					FROM trades
					RIGHT JOIN prodtype ON trades.inv_type = prodtype.inv_type
					WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
						AND pay_date IS NULL
						AND date_rec IS NOT NULL
						AND date_rec < '{$post["dashboard_form_date"]}'
						AND product = '{$post["label"]}'
					ORDER BY date DESC;";
			break;
		case 'dashboard_pie_chart_2':
			$post["date_type"] = 'date';
		case 'reports_pie_chart':
			if(isset($_SESSION["from_date"]) && isset($_SESSION["to_date"])){
				$where_clause = "AND {$post["date_type"]} > '{$_SESSION["from_date"]}' AND {$post["date_type"]} < '{$_SESSION["to_date"]}'";
			}
			$sql_str = "SELECT date, date_rec, comm_rec, rep_comm
					FROM trades
					RIGHT JOIN prodtype ON trades.inv_type = prodtype.inv_type
					WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					AND (comm_rec > 0 OR rep_comm > 0)
					$where_clause
					AND product = '{$post["label"]}'
					ORDER BY date DESC;";
			break;
	}

	//Create html table
	$drill_down_table_html = '<div class="row">
						<div class="col-md-12">
							<table class="main-table table table-hover table-striped table-sm">
								<thead>
								<tr>';
	$result                = db_query($sql_str); //create headers
	$headers               = $result->fetch_fields();
	foreach($headers as $col_obj){
		switch($col_obj->name){
			case 'date':
				$header = 'Trade Date';
				break;
			case 'date_rec':
				$header = 'Date Posted';
				break;
			case 'comm_rec':
				$header = 'Gross Amount';
				break;
			case 'rep_comm':
				$header = 'Net Pay';
				break;
            case 'INVEST':
				$header = 'Product';
				break;
            case 'CLEARING':
				$header = 'Client';
				break;
		}
		if($header == 'Trade Date' || $header == 'Date Posted'){
			$drill_down_table_html .= "<th>$header</th>";
		}
        else if($header == 'Product' || $header == 'Client'){
					
		    $drill_down_table_html .= "<th class='text-left'>$header</th>";
		}  
        else{
			$drill_down_table_html .= "<th class='text-right'>$header</th>";
		}
	}
	$drill_down_table_html .= '   </tr>
						</thead>
						<tbody>';
	if($result->num_rows != 0){ //If there is a value returned
		while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
			$drill_down_table_html .= "<tr>";
			foreach($row as $column_name => $value){
				if($column_name == 'date' || $column_name == 'date_rec'){
					if($value != null && $value != '0000-00-00 00:00:00'){
						$value = date('m/d/Y', strtotime($value));
					} else{
						$value = '-';
					}
					$drill_down_table_html .= "<td>$value</td>";
				} 
                else if($column_name == 'INVEST' || $column_name == 'CLEARING'){
					
					$drill_down_table_html .= "<td>$value</td>";
				} 
                else{
					$value                 = number_format(floatval($value), 2);
					$drill_down_table_html .= "<td class='text-right'>\$$value</td>";
				}
			}
			$drill_down_table_html .= "</tr>";
		}
	}
	$drill_down_table_html .= '</tbody>
					</table>
				</div>
			</div>';

	$json_obj                               = new json_obj();
	$json_obj->data_arr['drill_down_table'] = $drill_down_table_html;
	$json_obj->status                       = true;

	return $json_obj;
}


/**
 * Logs out from the account
 * @return json_obj
 */
function sign_out(){
	setcookie('foxtrot_online_password', md5($_SESSION['permrep_obj']->WEBPSWD), 1, '/');
	setcookie('foxtrot_online_username', $_SESSION['permrep_obj']->USERNAME, 1, '/');
    $company_name = $_SESSION['company_name'];
    
	$json_obj                           = new json_obj();
	$json_obj->status                   = true;
	$json_obj->data_arr['company_name'] = $_SESSION['company_name'];
    
    if(isset($_SESSION['supervisor_broker']) && $_SESSION['supervisor_broker'] != '')
    {
        $supervisor_broker = isset($_SESSION['supervisor_broker'])?$_SESSION['supervisor_broker']:'';
        $is_branch_manger = is_branch_manager($supervisor_broker);
        $json_obj->data_arr['is_branch_manager'] = $is_branch_manger;
    }
    else if(isset($_SESSION['admin_no']) && $_SESSION['admin_no'] != '')
    {
        $admin_no = $_SESSION['admin_no'];
        $json_obj->data_arr['is_admin'] = $_SESSION['admin_no'];
    }
    else if(isset($_SESSION['link_broker']) && $_SESSION['link_broker'] != '')
    {
        $link_broker = $_SESSION['link_broker'];
        $json_obj->data_arr['is_link_broker'] = $_SESSION['link_broker'];
    }
    
    
	unset($_SESSION);
    
    if(isset($is_branch_manger) && $is_branch_manger != '')
    {
        $_SESSION['company_name'] = $company_name;
        $_SESSION['branch_no'] = $is_branch_manger;
        $_SESSION['supervisor_broker'] = $supervisor_broker;
    }
    else if(isset($admin_no) && $admin_no != '')
    {
        $_SESSION['admin_no'] = $admin_no;
    }
    else if(isset($link_broker) && $link_broker != '')
    {
        $_SESSION['link_broker'] = $link_broker;
    }
	return $json_obj;
}

/**
 * Returns an HTML string for a modal with the logos and a script to show the modal.
 */
function logo_html_modal(){
	$modal_html = '
	<div class="modal fade" id="select_company_modal" tabindex="-1" role="dialog" aria-labelledby="select_company_label" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="select_company_label">Select a Company</h5>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
	';

	$logos = scandir('lib/logos');
	unset($logos[array_search('.', $logos, true)]);
	unset($logos[array_search('..', $logos, true)]);
	unset($logos[array_search('foxtrot_online.png', $logos, true)]);
	unset($logos[array_search('demo.png', $logos, true)]);
	foreach($logos as $logo){
		$company_name = pathinfo($logo, PATHINFO_FILENAME);
		$modal_html   .= "<div class='col-md-4 mb-3'><a href='login.php?company_name=$company_name'><img class='logo' src='lib/logos/$logo' alt='logo'></a></div>";
	}

	$modal_html .= '
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$( "#select_company_modal" ).modal( \'show\' );
	</script>
	';

	return $modal_html;
}


/**
 * Gets the dates period as a parameter in the $post array.
 * Gets 2 flags, that determine if needed to create boxes or table or both.
 * Returns an HTML string with the table and boxes data inside the json_obj.
 * @param      $post
 * @param bool $create_boxes_flag
 * @param bool $create_table_flag
 * @return json_obj
 * @throws Exception
 */
/**
 * activity_update()
 * 
 * @param mixed $post
 * @param bool $create_boxes_flag
 * @param bool $create_table_flag
 * @return
 */
  function activity_update2($post, $create_boxes_flag = true, $create_table_flag = true){//echo '<pre>';print_r($post);exit;
	//Activity table:
    $where_clause = ' AND MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())';//defined change by aksha(27-09-2018)
    //$where_clause = ' AND MONTH(date) > 9 AND YEAR(date) = YEAR(CURDATE())';//defined change by aksha(27-09-2018)    
    $table_html_table_header = '';
    $table_html_return_str = '';
    $table_html_return_str1 = '';
    $table_html_return_str2 = '';
    $table_html_return_str3 = '';
    $table_html_return_str4 = '';
    $pdf_title_dates = '';
    $pdf_title_first_line = '';
    $from_date = isset($post['from_date'])?$post['from_date']:'';
    $to_date = isset($post['to_date'])?$post['to_date']:'';
    $boxes_html_return_str = '';
    $all_dates = isset($post['all_dates'])?$post['all_dates']:'';
    $client_subtotal = isset($post['client_subtotal'])?$post['client_subtotal']:'';
    $product_subtotal = isset($post['product_subtotal'])?$post['product_subtotal']:'';
    $sql_str = ''; 
    $total_net_amount_a = '';
    $total_comm_rec_a = '';
    $total_rep_comm_a = '';
    $total_net_amount_b = '';
    $total_comm_rec_b = '';
    $total_rep_comm_b = '';
    $total_net_amount_t = '';
    $total_comm_rec_t = '';
    $total_rep_comm_t = '';
    $total_net_amount_c = '';
    $total_comm_rec_c = '';
    $total_rep_comm_c = '';
    $total_net_amount_ad = '';
    $total_comm_rec_ad = '';
    $total_rep_comm_ad = '';
    $filter_by_client = '';
    $con_query = '';
    $con_query1 = '';
    $con_query2 = '';
    $con_query3 = '';
    $con_query4 = '';
    $additional_fields = '';
    $report_period = isset($post['report_period'])?$post['report_period']:'';
    $custom_from_date = isset($post['custom_from_date'])?$post['custom_from_date']:'';
    $custom_to_date = isset($post['custom_to_date'])?$post['custom_to_date']:'';
    
	if($create_table_flag){
		if($from_date > $to_date){
			throw new Exception("Start date cannot be after the end date.", EXCEPTION_WARNING_CODE);
		}
        
		if(isset($post["from_date"]) && isset($post["to_date"]) && $all_dates != 'on'){
			$where_clause     = "AND date >= '{$from_date}' AND date < '{$to_date}'";
			$export_from_date = date_format(date_create($from_date), 'm/d/Y');
			$export_to_date   = date_format(date_create($to_date), 'm/d/Y');
			$pdf_title_dates  = "$export_from_date to $export_to_date";
		} else{
			$pdf_title_dates = 'All Trades of Current Month';
        }
        
        if(isset($report_period) && $report_period == 'all_dates')
        {
            $where_clause = '';
            $pdf_title_dates = 'All Trades';
        }
        if(isset($post["custom_from_date"]) && isset($post["custom_to_date"]) && $report_period == 'custom'){
			$where_clause     = "AND date >= '{$custom_from_date}' AND date < '{$custom_to_date}'";
			$export_from_date = date_format(date_create($custom_from_date), 'm/d/Y');
			$export_to_date   = date_format(date_create($custom_to_date), 'm/d/Y');
			$pdf_title_dates  = "$export_from_date to $export_to_date";
		}
        if(isset($report_period) && $report_period == 'month_to_date'){
            
            $from_date = strtotime('midnight first day of this month');
			$from_date = date('Y-m-d H:i:s', $from_date);
			$to_date   = date('Y-m-d H:i:s');
            $where_clause     = "AND date >= '{$from_date}' AND date < '{$to_date}'";
			$export_from_date = date_format(date_create($from_date), 'm/d/Y');
			$export_to_date   = date_format(date_create($to_date), 'm/d/Y');
			$pdf_title_dates  = "Month to Date";
		}
        if(isset($report_period) && $report_period == 'year_to_date'){
            
            $from_date = strtotime('first day of January '.date('Y'));
			$from_date = date('Y-m-d H:i:s', $from_date);
			$to_date   = date('Y-m-d H:i:s');
            $where_clause     = "AND date >= '{$from_date}' AND date < '{$to_date}'";
			$export_from_date = date_format(date_create($from_date), 'm/d/Y');
			$export_to_date   = date_format(date_create($to_date), 'm/d/Y');
			$pdf_title_dates  = "Year to Date";
		}
        
        if(isset($client_subtotal) && $client_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'cli_name')
        {
            $filter_by_client = "order by cli_no asc";
            $con_query = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.cli_no=t2.cli_no and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.cli_no=t2.cli_no and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.cli_no=t2.cli_no and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query1 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.cli_no=t2.cli_no and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.cli_no=t2.cli_no and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.cli_no=t2.cli_no and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query2 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.cli_no=t2.cli_no and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.cli_no=t2.cli_no and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.cli_no=t2.cli_no and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query3 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.cli_no=t2.cli_no and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.cli_no=t2.cli_no and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.cli_no=t2.cli_no and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query4 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.cli_no=t2.cli_no and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.cli_no=t2.cli_no and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.cli_no=t2.cli_no and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
        }
        else if(isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'invest')
        {
            $filter_by_client = "order by invest asc";
            $con_query = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.invest=t2.invest and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.invest=t2.invest and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.invest=t2.invest and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query1 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.invest=t2.invest and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.invest=t2.invest and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.invest=t2.invest and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query2 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.invest=t2.invest and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.invest=t2.invest and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.invest=t2.invest and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query3 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.invest=t2.invest and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.invest=t2.invest and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.invest=t2.invest and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query4 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.invest=t2.invest and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.invest=t2.invest and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.invest=t2.invest and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
        }
        else if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'date')
        {
            $filter_by_client = "order by date asc";
            $con_query = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.date=t2.date and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.date=t2.date and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.date=t2.date and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query1 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.date=t2.date and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.date=t2.date and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.date=t2.date and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query2 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.date=t2.date and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.date=t2.date and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.date=t2.date and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query3 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.date=t2.date and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.date=t2.date and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.date=t2.date and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query4 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.date=t2.date and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.date=t2.date and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.date=t2.date and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
        }
        else if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'clearing')
        {
            $filter_by_client = "order by clearing asc";
            $con_query = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.clearing=t2.clearing and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.clearing=t2.clearing and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.clearing=t2.clearing and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query1 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.clearing=t2.clearing and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.clearing=t2.clearing and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.clearing=t2.clearing and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query2 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.clearing=t2.clearing and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.clearing=t2.clearing and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.clearing=t2.clearing and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query3 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.clearing=t2.clearing and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.clearing=t2.clearing and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.clearing=t2.clearing and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query4 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.clearing=t2.clearing and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.clearing=t2.clearing and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.clearing=t2.clearing and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
        }
        else if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'net_amt')
        {
            $filter_by_client = "order by net_amt asc";
            $con_query = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.net_amt=t2.net_amt and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.net_amt=t2.net_amt and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.net_amt=t2.net_amt and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query1 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.net_amt=t2.net_amt and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.net_amt=t2.net_amt and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.net_amt=t2.net_amt and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query2 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.net_amt=t2.net_amt and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.net_amt=t2.net_amt and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.net_amt=t2.net_amt and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query3 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.net_amt=t2.net_amt and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.net_amt=t2.net_amt and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.net_amt=t2.net_amt and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query4 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.net_amt=t2.net_amt and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.net_amt=t2.net_amt and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.net_amt=t2.net_amt and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
        }
        else if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'comm_rec')
        {
            $filter_by_client = "order by comm_rec asc";
            $con_query = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.comm_rec=t2.comm_rec and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.comm_rec=t2.comm_rec and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.comm_rec=t2.comm_rec and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query1 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.comm_rec=t2.comm_rec and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.comm_rec=t2.comm_rec and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.comm_rec=t2.comm_rec and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query2 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.comm_rec=t2.comm_rec and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.comm_rec=t2.comm_rec and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.comm_rec=t2.comm_rec and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query3 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.comm_rec=t2.comm_rec and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.comm_rec=t2.comm_rec and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.comm_rec=t2.comm_rec and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query4 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.comm_rec=t2.comm_rec and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.comm_rec=t2.comm_rec and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.comm_rec=t2.comm_rec and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
        }
        else if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'rep_comm')
        {
            $filter_by_client = "order by rep_comm asc";
            $con_query = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.rep_comm=t2.rep_comm and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.rep_comm=t2.rep_comm and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.rep_comm=t2.rep_comm and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query1 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.rep_comm=t2.rep_comm and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.rep_comm=t2.rep_comm and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.rep_comm=t2.rep_comm and source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query2 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.rep_comm=t2.rep_comm and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.rep_comm=t2.rep_comm and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.rep_comm=t2.rep_comm and source LIKE '%1' and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query3 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.rep_comm=t2.rep_comm and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.rep_comm=t2.rep_comm and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.rep_comm=t2.rep_comm and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query4 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.rep_comm=t2.rep_comm and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.rep_comm=t2.rep_comm and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.rep_comm=t2.rep_comm and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
        }
        /*if(isset($post['date_rec']) && $post['date_rec']=='on')
        {
            $additional_fields = ', date_rec';
        }
        if(isset($post['cli_no']) && $post['cli_no']=='on')
        {
            $additional_fields = ', cli_no';
        }
        if(isset($post['cusip']) && $post['cusip']=='on')
        {
            $additional_fields = ', cusip_no';
        }
        if(isset($post['rep_rate']) && $post['rep_rate']=='on')
        {
            $additional_fields = ', rep_rate';
        }
        if(isset($post['pay_date']) && $post['pay_date']=='on')
        {
            $additional_fields = ', pay_date';
        }*/
        
        $table_html_table_header .= "<tr>";
	         $table_html_table_header .= "<th>DATE</th>";
             if(isset($post['date_rec']) && $post['date_rec']=='on')
             {
                $table_html_table_header .= "<th>DATE RECEIVED</th>";
             }
             $table_html_table_header .= "<th>CLIENT ACCOUNT</th>";
             
             if(isset($post['cli_no']) && $post['cli_no']=='on')
             {
                $table_html_table_header .= "<th>CLIENT#</th>";
             }
             $table_html_table_header .= "<th>CLIENT NAME</th>";
             $table_html_table_header .= "<th>PRODUCT DESCRIPTION</th>";
             if(isset($post['cusip']) && $post['cusip']=='on')
             {
                 $table_html_table_header .= "<th>CUSIP</th>";
             }
             $table_html_table_header .= "<th>PRINCIPAL</th>";
             $table_html_table_header .= "<th>GROSS FEE/COMMISSION AMOUNT</th>";
             if(isset($post['rep_rate']) && $post['rep_rate']=='on')
             {
                 $table_html_table_header .= "<th>PAYOUT RATE</th>";
             }
             $table_html_table_header .= "<th>NET AMOUNT</th>";
             if(isset($post['pay_date']) && $post['pay_date']=='on')
             {
                 $table_html_table_header .= "<th>PAY DATE</th>";
             }
        $table_html_table_header .= "</tr>";

		if($from_date == $to_date && isset($from_date) && isset($post["to_date"]) && isset($post['all_dates'])){
			$from_date = substr_replace($from_date, ' 00:00:00', 10);
			$to_date   = substr_replace($to_date, ' 23:59:59', 10);
		} else{
			$sql_str = "SELECT date, date_rec, clearing, cli_no, cli_name, invest, cusip_no, net_amt, comm_rec, rep_rate, rep_comm, pay_date 
                    $con_query
					FROM trades as t1
					WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
                    
            $sql_str1 = "SELECT date, date_rec, clearing, cli_no, cli_name, invest, cusip_no, net_amt, comm_rec, rep_rate, rep_comm, pay_date 
                    $con_query1
                    FROM trades as t1
					WHERE source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%'
				    AND inv_type!=29 AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
                    
            $sql_str2 = "SELECT date, date_rec, clearing, cli_no, cli_name, invest, cusip_no, net_amt, comm_rec, rep_rate, rep_comm, pay_date 
                    $con_query2
                    FROM trades as t1
					WHERE source LIKE '%1'
				    AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
                    
            $sql_str3 = "SELECT date, date_rec, clearing, cli_no, cli_name, invest, cusip_no, net_amt, comm_rec, rep_rate, rep_comm, pay_date
                    $con_query3
					FROM trades as t1
					WHERE (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%')
				    AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
                    
            $sql_str4 = "SELECT date, date_rec, clearing, cli_no, cli_name, invest, cusip_no, net_amt, comm_rec, rep_rate, rep_comm, pay_date
                    $con_query4
					FROM trades as t1
					WHERE inv_type=29
				    AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
            
		}

		$result = db_query($sql_str);
        $current_value="";
        $previos_value="";
        $client_net_amount = '';
        $client_comm_rec = '';
        $client_rep_comm = '';
        
		if($result->num_rows != 0){
		    $row_count = $result->num_rows;
            $loop_count = 0;
			while($row = $result->fetch_assoc()){
			 
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'cli_name')
                {
                    $current_value=$row['cli_no'];
                }
			    if(isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'invest')
                {
                    $current_value=$row['invest'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'date')
                {
                    $current_value=$row['date'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'clearing')
                {
                    $current_value=$row['clearing'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'net_amt')
                {
                    $current_value=$row['net_amt'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'comm_rec')
                {
                    $current_value=$row['comm_rec'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'rep_comm')
                {
                    $current_value=$row['rep_comm'];
                }
                $loop_count++;
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && ($post['subtotal_by'] == 'cli_name' || $post['subtotal_by'] == 'invest' || $post['subtotal_by'] == 'date' || $post['subtotal_by'] == 'clearing' || $post['subtotal_by'] == 'net_amt' || $post['subtotal_by'] == 'comm_rec' || $post['subtotal_by'] == 'rep_comm'))
                {
                    if($current_value!=$previos_value && $previos_value!="") {
        				$table_html_return_str .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str .= "<td></td>";
                             if(isset($post['date_rec']) && $post['date_rec']=='on')
                             {
                                $table_html_return_str .= "<td></td>";
                             }
                             $table_html_return_str .= "<td></td>";
                             
                             if(isset($post['cli_no']) && $post['cli_no']=='on')
                             {
                                $table_html_return_str .= "<td></td>";
                             }
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";
                             if(isset($post['cusip']) && $post['cusip']=='on')
                             {
                                 $table_html_return_str .= "<td></td>";
                             }
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                             {
                                 $table_html_return_str .= "<td></td>";
                             }
                             $table_html_return_str .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                             if(isset($post['pay_date']) && $post['pay_date']=='on')
                             {
                                 $table_html_return_str .= "<td></td>";
                             }
                        $table_html_return_str .= "</tr>";
                    }
                }
                
				$table_html_return_str .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
					    case 'cli_no':
                            $first5char             = substr($value,0,5);
                            $value                  = str_replace($first5char,"XXXXX",$value);
                            if(isset($post['cli_no']) && $post['cli_no']=='on'){
                            $table_html_return_str .= "<td class='text-left'>$value</td>";
                            }
							break;
						case 'cli_name':
                        case 'invest':
						case 'clearing':
						    $table_html_return_str .= "<td class='text-left'>$value</td>";
                            break;
                        case 'cusip_no':
                            if(isset($post['cusip']) && $post['cusip']=='on'){
					            $table_html_return_str .= "<td class='text-left'>$value</td>";
                            }
							break;
						case 'rep_rate':
                            if(isset($post['rep_rate']) && $post['rep_rate']=='on'){
    							$value                 = number_format(floatval($value) * 100, 2);
    							$table_html_return_str .= "<td class='text-right'>$value%</td>";
                            }
							break;
						case 'net_amt':
                            $total_net_amount_a = $total_net_amount_a+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
                        case 'comm_rec':
                            $total_comm_rec_a = $total_comm_rec_a+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'rep_comm':
                            $total_rep_comm_a = $total_rep_comm_a+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
                            if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str .= "<td>-</td>";
							}
							break;
						case 'date_rec':
                            if(isset($post['date_rec']) && $post['date_rec']=='on'){
                                if($value != null && $value != '0000-00-00 00:00:00'){
    								$value_timestamp = strtotime($value);
    								$value                 = date('m/d/Y', $value_timestamp);
    								$table_html_return_str .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
    							} else{
    								$table_html_return_str .= "<td>-</td>";
    							}
                            }
							break;
						case 'pay_date':
                            if(isset($post['pay_date']) && $post['pay_date']=='on'){
    							if($value != null && $value != '0000-00-00 00:00:00'){
    								$value_timestamp = strtotime($value);
    								$value                 = date('m/d/Y', $value_timestamp);
    								$table_html_return_str .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
    							} else{
    								$table_html_return_str .= "<td>-</td>";
    							}
                            }
							break;
						
					}
				}
                $table_html_return_str .= "</tr>";
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'cli_name')
                {
                    $previos_value=$row['cli_no'];
                }
			    if(isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'invest')
                {
                    $previos_value=$row['invest'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'date')
                {
                    $previos_value=$row['date'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'clearing')
                {
                    $previos_value=$row['clearing'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'net_amt')
                {
                    $previos_value=$row['net_amt'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'comm_rec')
                {
                    $previos_value=$row['comm_rec'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'rep_comm')
                {
                    $previos_value=$row['rep_comm'];
                }
                $client_net_amount = isset($row['total_net_amt'])?$row['total_net_amt']:'0';
                $client_comm_rec = isset($row['total_comm_rec'])?$row['total_comm_rec']:'0';
                $client_rep_comm = isset($row['total_rep_comm'])?$row['total_rep_comm']:'0';
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && ($post['subtotal_by'] == 'cli_name' || $post['subtotal_by'] == 'invest' || $post['subtotal_by'] == 'date' || $post['subtotal_by'] == 'clearing' || $post['subtotal_by'] == 'net_amt' || $post['subtotal_by'] == 'comm_rec' || $post['subtotal_by'] == 'rep_comm'))
                {
                    if($row_count == $loop_count)
                    {
                        $table_html_return_str .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str .= "<td></td>";
                             if(isset($post['date_rec']) && $post['date_rec']=='on')
                             {
                                $table_html_return_str .= "<td></td>";
                             }
                             $table_html_return_str .= "<td></td>";
                             
                             if(isset($post['cli_no']) && $post['cli_no']=='on')
                             {
                                $table_html_return_str .= "<td></td>";
                             }
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";
                             if(isset($post['cusip']) && $post['cusip']=='on')
                             {
                                 $table_html_return_str .= "<td></td>";
                             }
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                             {
                                 $table_html_return_str .= "<td></td>";
                             }
                             $table_html_return_str .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                             if(isset($post['pay_date']) && $post['pay_date']=='on')
                             {
                                 $table_html_return_str .= "<td></td>";
                             }
                        $table_html_return_str .= "</tr>";
                    }
                }
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
            $table_html_return_str .= "<tr>";
			         $formatted_total_net                 = number_format(floatval($total_net_amount_a), 2);
                     $formatted_total_comm_rec                 = number_format(floatval($total_comm_rec_a), 2);
                     $formatted_total_rep_comm                 = number_format(floatval($total_rep_comm_a), 2);
                     $table_html_return_str .= "<td></td>";
                     if(isset($post['date_rec']) && $post['date_rec']=='on')
                     {
                        $table_html_return_str .= "<td></td>";
                     }
                     $table_html_return_str .= "<td></td>";
                     if(isset($post['cli_no']) && $post['cli_no']=='on')
                     {
                        $table_html_return_str .= "<td></td>";
                     }
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     if(isset($post['cusip']) && $post['cusip']=='on')
                     {
                         $table_html_return_str .= "<td></td>";
                     }
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                     if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                     {
                         $table_html_return_str .= "<td></td>";
                     }
                     $table_html_return_str .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
					 if(isset($post['pay_date']) && $post['pay_date']=='on')
                     {
                         $table_html_return_str .= "<td></td>";
                     }
            $table_html_return_str .= "</tr>";
		}
        
        $result = db_query($sql_str1);
        $current_value="";
        $previos_value="";
        $client_net_amount = '';
        $client_comm_rec = '';
        $client_rep_comm = '';
        
		if($result->num_rows != 0){
		    $row_count = $result->num_rows;
            $loop_count = 0;
            while($row = $result->fetch_assoc()){
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'cli_name')
                {
                    $current_value=$row['cli_no'];
                }
			    if(isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'invest')
                {
                    $current_value=$row['invest'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'date')
                {
                    $current_value=$row['date'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'clearing')
                {
                    $current_value=$row['clearing'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'net_amt')
                {
                    $current_value=$row['net_amt'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'comm_rec')
                {
                    $current_value=$row['comm_rec'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'rep_comm')
                {
                    $current_value=$row['rep_comm'];
                }
                $loop_count++;
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && ($post['subtotal_by'] == 'cli_name' || $post['subtotal_by'] == 'invest' || $post['subtotal_by'] == 'date' || $post['subtotal_by'] == 'clearing' || $post['subtotal_by'] == 'net_amt' || $post['subtotal_by'] == 'comm_rec' || $post['subtotal_by'] == 'rep_comm'))
                {
                    if($current_value!=$previos_value && $previos_value!="") {
        				$table_html_return_str1 .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str1 .= "<td></td>";
                             if(isset($post['date_rec']) && $post['date_rec']=='on')
                             {
                                $table_html_return_str1 .= "<td></td>";
                             }
                             $table_html_return_str1 .= "<td></td>";
                             if(isset($post['cli_no']) && $post['cli_no']=='on')
                             {
                                $table_html_return_str1 .= "<td></td>";
                             }
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";
                             if(isset($post['cusip']) && $post['cusip']=='on')
                             {
                                 $table_html_return_str1 .= "<td></td>";
                             }
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                             {
                                 $table_html_return_str1 .= "<td></td>";
                             }
                             $table_html_return_str1 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                             if(isset($post['pay_date']) && $post['pay_date']=='on')
                             {
                                 $table_html_return_str1 .= "<td></td>";
                             }
                        $table_html_return_str1 .= "</tr>";
                    }
                }
				$table_html_return_str1 .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
					    case 'cli_no':
                            $first5char             = substr($value,0,5);
                            $value                  = str_replace($first5char,"XXXXX",$value);
                            if(isset($post['cli_no']) && $post['cli_no']=='on'){
                            $table_html_return_str1 .= "<td class='text-left'>$value</td>";
                            }
							break;
						case 'cli_name':
						case 'invest':
                        case 'clearing':
                            $table_html_return_str1 .= "<td class='text-left'>$value</td>";
                            break;
						case 'cusip_no':
                            if(isset($post['cusip']) && $post['cusip']=='on')
                            {
							    $table_html_return_str1 .= "<td class='text-left'>$value</td>";
                            }
							break;
						case 'rep_rate':
                            if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                            {
    							$value                 = number_format(floatval($value) * 100, 2);
    							$table_html_return_str1 .= "<td class='text-right'>$value%</td>";
                            }
							break;
						case 'net_amt':
                            $total_net_amount_b = $total_net_amount_b+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str1 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
                        case 'comm_rec':
                            $total_comm_rec_b = $total_comm_rec_b+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str1 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'rep_comm':
                            $total_rep_comm_b = $total_rep_comm_b+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str1 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
                            if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str1 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str1 .= "<td>-</td>";
							}
                            break;
						case 'date_rec':
                            if(isset($post['date_rec']) && $post['date_rec']=='on')
                            {
    							if($value != null && $value != '0000-00-00 00:00:00'){
    								$value_timestamp = strtotime($value);
    								$value                 = date('m/d/Y', $value_timestamp);
    								$table_html_return_str1 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
    							} else{
    								$table_html_return_str1 .= "<td>-</td>";
    							}
                            }
                            break;
						case 'pay_date':
                            if(isset($post['pay_date']) && $post['pay_date']=='on')
                            {
    							if($value != null && $value != '0000-00-00 00:00:00'){
    								$value_timestamp = strtotime($value);
    								$value                 = date('m/d/Y', $value_timestamp);
    								$table_html_return_str1 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
    							} else{
    								$table_html_return_str1 .= "<td>-</td>";
    							}
                            }
							break;
						
					}
				}
				$table_html_return_str1 .= "</tr>";
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'cli_name')
                {
                    $previos_value=$row['cli_no'];
                }
			    if(isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'invest')
                {
                    $previos_value=$row['invest'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'date')
                {
                    $previos_value=$row['date'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'clearing')
                {
                    $previos_value=$row['clearing'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'net_amt')
                {
                    $previos_value=$row['net_amt'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'comm_rec')
                {
                    $previos_value=$row['comm_rec'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'rep_comm')
                {
                    $previos_value=$row['rep_comm'];
                }
                $client_net_amount = isset($row['total_net_amt'])?$row['total_net_amt']:'0';
                $client_comm_rec = isset($row['total_comm_rec'])?$row['total_comm_rec']:'0';
                $client_rep_comm = isset($row['total_rep_comm'])?$row['total_rep_comm']:'0';
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && ($post['subtotal_by'] == 'cli_name' || $post['subtotal_by'] == 'invest' || $post['subtotal_by'] == 'date' || $post['subtotal_by'] == 'clearing' || $post['subtotal_by'] == 'net_amt' || $post['subtotal_by'] == 'comm_rec' || $post['subtotal_by'] == 'rep_comm'))
                {
                    if($row_count == $loop_count)
                    {
                        $table_html_return_str1 .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str1 .= "<td></td>";
                             if(isset($post['date_rec']) && $post['date_rec']=='on')
                             {
                                $table_html_return_str1 .= "<td></td>";
                             }
                             $table_html_return_str1 .= "<td></td>";
                             if(isset($post['cli_no']) && $post['cli_no']=='on')
                             {
                                $table_html_return_str1 .= "<td></td>";
                             }
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";
                             if(isset($post['cusip']) && $post['cusip']=='on')
                             {
                                 $table_html_return_str1 .= "<td></td>";
                             }
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                             {
                                 $table_html_return_str1 .= "<td></td>";
                             }
                             $table_html_return_str1 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                             if(isset($post['pay_date']) && $post['pay_date']=='on')
                             {
                                 $table_html_return_str1 .= "<td></td>";
                             }
                        $table_html_return_str1 .= "</tr>";
                    }
                }
                
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
            $table_html_return_str1 .= "<tr>";
			         $formatted_total_net                 = number_format(floatval($total_net_amount_b), 2);
                     $formatted_total_comm_rec                 = number_format(floatval($total_comm_rec_b), 2);
                     $formatted_total_rep_comm                 = number_format(floatval($total_rep_comm_b), 2);
                     $table_html_return_str1 .= "<td></td>";
                     if(isset($post['date_rec']) && $post['date_rec']=='on')
                     {
                        $table_html_return_str1 .= "<td></td>";
                     }
                     $table_html_return_str1 .= "<td></td>";
                     if(isset($post['cli_no']) && $post['cli_no']=='on')
                     {
                        $table_html_return_str1 .= "<td></td>";
                     }
                     $table_html_return_str1 .= "<td></td>";
                     $table_html_return_str1 .= "<td></td>";
                     if(isset($post['cusip']) && $post['cusip']=='on')
                     {
                         $table_html_return_str1 .= "<td></td>";
                     }
                     $table_html_return_str1 .= "<td></td>";
                     $table_html_return_str1 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                     if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                     {
                         $table_html_return_str1 .= "<td></td>";
                     }
                     $table_html_return_str1 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                     if(isset($post['pay_date']) && $post['pay_date']=='on')
                     {
                         $table_html_return_str1 .= "<td></td>";
                     }
			$table_html_return_str1 .= "</tr>";
		}
       
        $result = db_query($sql_str2);
        $current_value="";
        $previos_value="";
        $client_net_amount = '';
        $client_comm_rec = '';
        $client_rep_comm = '';
		if($result->num_rows != 0){
		    $row_count = $result->num_rows;
            $loop_count = 0;
			while($row = $result->fetch_assoc()){
			    
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'cli_name')
                {
                    $current_value=$row['cli_no'];
                }
			    if(isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'invest')
                {
                    $current_value=$row['invest'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'date')
                {
                    $current_value=$row['date'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'clearing')
                {
                    $current_value=$row['clearing'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'net_amt')
                {
                    $current_value=$row['net_amt'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'comm_rec')
                {
                    $current_value=$row['comm_rec'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'rep_comm')
                {
                    $current_value=$row['rep_comm'];
                }
                $loop_count++;
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && ($post['subtotal_by'] == 'cli_name' || $post['subtotal_by'] == 'invest' || $post['subtotal_by'] == 'date' || $post['subtotal_by'] == 'clearing' || $post['subtotal_by'] == 'net_amt' || $post['subtotal_by'] == 'comm_rec' || $post['subtotal_by'] == 'rep_comm'))
                {
                    if($current_value!=$previos_value && $previos_value!="") {
        				$table_html_return_str2 .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str2 .= "<td></td>";
                             if(isset($post['date_rec']) && $post['date_rec']=='on')
                             {
                                $table_html_return_str2 .= "<td></td>";
                             }
                             $table_html_return_str2 .= "<td></td>";
                             if(isset($post['cli_no']) && $post['cli_no']=='on')
                             {
                                $table_html_return_str2 .= "<td></td>";
                             }
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";
                             if(isset($post['cusip']) && $post['cusip']=='on')
                             {
                                 $table_html_return_str2 .= "<td></td>";
                             }
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                             {
                                 $table_html_return_str2 .= "<td></td>";
                             }
                             $table_html_return_str2 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                             if(isset($post['pay_date']) && $post['pay_date']=='on')
                             {
                                 $table_html_return_str2 .= "<td></td>";
                             }
                        $table_html_return_str2 .= "</tr>";
                    }
                } 
				$table_html_return_str2 .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
					    case 'cli_no':
                            $first5char             = substr($value,0,5);
                            $value                  = str_replace($first5char,"XXXXX",$value);
                            if(isset($post['cli_no']) && $post['cli_no']=='on'){
                            $table_html_return_str2 .= "<td class='text-left'>$value</td>";
                            }
							break;
						case 'cli_name':
						case 'invest':
						case 'clearing':
                            $table_html_return_str2 .= "<td class='text-left'>$value</td>";
                            break;
						case 'cusip_no':
                            if(isset($post['cusip']) && $post['cusip']=='on')
                            {
							    $table_html_return_str2 .= "<td class='text-left'>$value</td>";
                            }
							break;
						case 'rep_rate':
                            if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                            {
    							$value                 = number_format(floatval($value) * 100, 2);
    							$table_html_return_str2 .= "<td class='text-right'>$value%</td>";
                            }
							break;
						case 'net_amt':
                            $total_net_amount_c = $total_net_amount_c+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str2 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
                        case 'comm_rec':
                            $total_comm_rec_c = $total_comm_rec_c+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str2 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'rep_comm':
                            $total_rep_comm_c = $total_rep_comm_c+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str2 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
                            if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str2 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str2 .= "<td>-</td>";
							}
                            break;
						case 'date_rec':
                            if(isset($post['date_rec']) && $post['date_rec']=='on')
                             {
                                if($value != null && $value != '0000-00-00 00:00:00'){
    								$value_timestamp = strtotime($value);
    								$value                 = date('m/d/Y', $value_timestamp);
    								$table_html_return_str2 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
    							} else{
    								$table_html_return_str2 .= "<td>-</td>";
    							}
                            }
							break;
						case 'pay_date':
                            if(isset($post['pay_date']) && $post['pay_date']=='on')
                            {
    							if($value != null && $value != '0000-00-00 00:00:00'){
    								$value_timestamp = strtotime($value);
    								$value                 = date('m/d/Y', $value_timestamp);
    								$table_html_return_str2 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
    							} else{
    								$table_html_return_str2 .= "<td>-</td>";
    							}
                            }
							break;
					}
				}
				$table_html_return_str2 .= "</tr>";
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'cli_name')
                {
                    $previos_value=$row['cli_no'];
                }
			    if(isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'invest')
                {
                    $previos_value=$row['invest'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'date')
                {
                    $previos_value=$row['date'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'clearing')
                {
                    $previos_value=$row['clearing'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'net_amt')
                {
                    $previos_value=$row['net_amt'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'comm_rec')
                {
                    $previos_value=$row['comm_rec'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'rep_comm')
                {
                    $previos_value=$row['rep_comm'];
                }
                
                $client_net_amount = isset($row['total_net_amt'])?$row['total_net_amt']:'0';
                $client_comm_rec = isset($row['total_comm_rec'])?$row['total_comm_rec']:'0';
                $client_rep_comm = isset($row['total_rep_comm'])?$row['total_rep_comm']:'0';
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && ($post['subtotal_by'] == 'cli_name' || $post['subtotal_by'] == 'invest' || $post['subtotal_by'] == 'date' || $post['subtotal_by'] == 'clearing' || $post['subtotal_by'] == 'net_amt' || $post['subtotal_by'] == 'comm_rec' || $post['subtotal_by'] == 'rep_comm'))
                {
                    if($row_count == $loop_count)
                    {
                        $table_html_return_str2  .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str2 .= "<td></td>";
                             if(isset($post['date_rec']) && $post['date_rec']=='on')
                             {
                                $table_html_return_str2 .= "<td></td>";
                             }
                             $table_html_return_str2 .= "<td></td>";
                             if(isset($post['cli_no']) && $post['cli_no']=='on')
                             {
                                $table_html_return_str2 .= "<td></td>";
                             }
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";
                             if(isset($post['cusip']) && $post['cusip']=='on')
                             {
                                 $table_html_return_str2 .= "<td></td>";
                             }
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                             {
                                 $table_html_return_str2 .= "<td></td>";
                             }
                             $table_html_return_str2 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                             if(isset($post['pay_date']) && $post['pay_date']=='on')
                             {
                                 $table_html_return_str2 .= "<td></td>";
                             }
                        $table_html_return_str2 .= "</tr>";
                    }
                }
                
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
            $table_html_return_str2 .= "<tr>";
			         $formatted_total_net                 = number_format(floatval($total_net_amount_c), 2);
                     $formatted_total_comm_rec                 = number_format(floatval($total_comm_rec_c), 2);
                     $formatted_total_rep_comm                 = number_format(floatval($total_rep_comm_c), 2);
                     $table_html_return_str2 .= "<td></td>";
                     if(isset($post['date_rec']) && $post['date_rec']=='on')
                     {
                        $table_html_return_str2 .= "<td></td>";
                     }
                     $table_html_return_str2 .= "<td></td>";
                     if(isset($post['cli_no']) && $post['cli_no']=='on')
                     {
                        $table_html_return_str2 .= "<td></td>";
                     }
                     $table_html_return_str2 .= "<td></td>";
                     $table_html_return_str2 .= "<td></td>";
                     if(isset($post['cusip']) && $post['cusip']=='on')
                     {
                         $table_html_return_str2 .= "<td></td>";
                     }
                     $table_html_return_str2 .= "<td></td>";
                     $table_html_return_str2 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                     if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                     {
                         $table_html_return_str2 .= "<td></td>";
                     }
                     $table_html_return_str2 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                     if(isset($post['pay_date']) && $post['pay_date']=='on')
                     {
                         $table_html_return_str2 .= "<td></td>";
                     }
            $table_html_return_str2 .= "</tr>";
		}
        
        $result = db_query($sql_str3);
        $current_value="";
        $previos_value="";
        $client_net_amount = '';
        $client_comm_rec = '';
        $client_rep_comm = '';
		if($result->num_rows != 0){
		    $row_count = $result->num_rows;
            $loop_count = 0;
			while($row = $result->fetch_assoc()){
			    
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'cli_name')
                {
                    $current_value=$row['cli_no'];
                }
			    if(isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'invest')
                {
                    $current_value=$row['invest'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'date')
                {
                    $current_value=$row['date'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'clearing')
                {
                    $current_value=$row['clearing'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'net_amt')
                {
                    $current_value=$row['net_amt'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'comm_rec')
                {
                    $current_value=$row['comm_rec'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'rep_comm')
                {
                    $current_value=$row['rep_comm'];
                }
                $loop_count++;
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && ($post['subtotal_by'] == 'cli_name' || $post['subtotal_by'] == 'invest' || $post['subtotal_by'] == 'date' || $post['subtotal_by'] == 'clearing' || $post['subtotal_by'] == 'net_amt' || $post['subtotal_by'] == 'comm_rec' || $post['subtotal_by'] == 'rep_comm'))
                {
                    if($current_value!=$previos_value && $previos_value!="") {
        				$table_html_return_str3 .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str3 .= "<td></td>";
                             if(isset($post['date_rec']) && $post['date_rec']=='on')
                             {
                                $table_html_return_str3 .= "<td></td>";
                             }
                             $table_html_return_str3 .= "<td></td>";
                             if(isset($post['cli_no']) && $post['cli_no']=='on')
                             {
                                $table_html_return_str3 .= "<td></td>";
                             }
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";
                             if(isset($post['cusip']) && $post['cusip']=='on')
                             {
                                 $table_html_return_str3 .= "<td></td>";
                             }
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                             {
                                 $table_html_return_str3 .= "<td></td>";
                             }
                             $table_html_return_str3 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                             if(isset($post['pay_date']) && $post['pay_date']=='on')
                             {
                                 $table_html_return_str3 .= "<td></td>";
                             }
                        $table_html_return_str3 .= "</tr>";
                    } 
                }
				$table_html_return_str3 .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
					    case 'cli_no':
                            $first5char             = substr($value,0,5);
                            $value                  = str_replace($first5char,"XXXXX",$value);
                            if(isset($post['cli_no']) && $post['cli_no']=='on'){
                            $table_html_return_str3 .= "<td class='text-left'>$value</td>";
                            }
							break;
						case 'cli_name':
						case 'invest':
						case 'clearing':
                            $table_html_return_str3 .= "<td class='text-left'>$value</td>";
							break;
						case 'cusip_no':
                            if(isset($post['cusip']) && $post['cusip']=='on')
                            {
							     $table_html_return_str3 .= "<td class='text-left'>$value</td>";
                            }
							break;
						case 'rep_rate':
                            if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                            {
    							$value                 = number_format(floatval($value) * 100, 2);
    							$table_html_return_str3 .= "<td class='text-right'>$value%</td>";
                            }
							break;
						case 'net_amt':
                            $total_net_amount_t = $total_net_amount_t+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str3 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
                        case 'comm_rec':
                            $total_comm_rec_t = $total_comm_rec_t+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str3 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'rep_comm':
                            $total_rep_comm_t = $total_rep_comm_t+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str3 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
                            if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str3 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str3 .= "<td>-</td>";
							}
                            break;
						case 'date_rec':
                            if(isset($post['date_rec']) && $post['date_rec']=='on')
                            {
    							if($value != null && $value != '0000-00-00 00:00:00'){
    								$value_timestamp = strtotime($value);
    								$value                 = date('m/d/Y', $value_timestamp);
    								$table_html_return_str3 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
    							} else{
    								$table_html_return_str3 .= "<td>-</td>";
    							}
                            }
							break;   
						case 'pay_date':
                            if(isset($post['pay_date']) && $post['pay_date']=='on')
                            {
    							if($value != null && $value != '0000-00-00 00:00:00'){
    								$value_timestamp = strtotime($value);
    								$value                 = date('m/d/Y', $value_timestamp);
    								$table_html_return_str3 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
    							} else{
    								$table_html_return_str3 .= "<td>-</td>";
    							}
                            }
							break;
					}
				}
				$table_html_return_str3 .= "</tr>";
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'cli_name')
                {
                    $previos_value=$row['cli_no'];
                }
			    if(isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'invest')
                {
                    $previos_value=$row['invest'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'date')
                {
                    $previos_value=$row['date'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'clearing')
                {
                    $previos_value=$row['clearing'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'net_amt')
                {
                    $previos_value=$row['net_amt'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'comm_rec')
                {
                    $previos_value=$row['comm_rec'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'rep_comm')
                {
                    $previos_value=$row['rep_comm'];
                }
                $client_net_amount = isset($row['total_net_amt'])?$row['total_net_amt']:'0';
                $client_comm_rec = isset($row['total_comm_rec'])?$row['total_comm_rec']:'0';
                $client_rep_comm = isset($row['total_rep_comm'])?$row['total_rep_comm']:'0';
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && ($post['subtotal_by'] == 'cli_name' || $post['subtotal_by'] == 'invest' || $post['subtotal_by'] == 'date' || $post['subtotal_by'] == 'clearing' || $post['subtotal_by'] == 'net_amt' || $post['subtotal_by'] == 'comm_rec' || $post['subtotal_by'] == 'rep_comm'))
                {
                    if($row_count == $loop_count)
                    {
                        $table_html_return_str3  .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str3 .= "<td></td>";
                             if(isset($post['date_rec']) && $post['date_rec']=='on')
                             {
                                $table_html_return_str3 .= "<td></td>";
                             }
                             $table_html_return_str3 .= "<td></td>";
                             if(isset($post['cli_no']) && $post['cli_no']=='on')
                             {
                                $table_html_return_str3 .= "<td></td>";
                             }
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";
                             if(isset($post['cusip']) && $post['cusip']=='on')
                             {
                                 $table_html_return_str3 .= "<td></td>";
                             }
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                             {
                                 $table_html_return_str3 .= "<td></td>";
                             }
                             $table_html_return_str3 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                             if(isset($post['pay_date']) && $post['pay_date']=='on')
                             {
                                 $table_html_return_str3 .= "<td></td>";
                             }
                        $table_html_return_str3 .= "</tr>";
                    }
              }
                
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
            $table_html_return_str3 .= "<tr>";
			         $formatted_total_net                 = number_format(floatval($total_net_amount_t), 2);
                     $formatted_total_comm_rec                 = number_format(floatval($total_comm_rec_t), 2);
                     $formatted_total_rep_comm                 = number_format(floatval($total_rep_comm_t), 2);
                     $table_html_return_str3 .= "<td></td>";
                     if(isset($post['date_rec']) && $post['date_rec']=='on')
                     {
                        $table_html_return_str3 .= "<td></td>";
                     }
                     $table_html_return_str3 .= "<td></td>";
                     if(isset($post['cli_no']) && $post['cli_no']=='on')
                     {
                        $table_html_return_str3 .= "<td></td>";
                     }
                     $table_html_return_str3 .= "<td></td>";
                     $table_html_return_str3 .= "<td></td>";
                     if(isset($post['cusip']) && $post['cusip']=='on')
                     {
                         $table_html_return_str3 .= "<td></td>";
                     }
                     $table_html_return_str3 .= "<td></td>";
                     $table_html_return_str3 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                     if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                     {
                         $table_html_return_str3 .= "<td></td>";
                     }
                     $table_html_return_str3 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                     if(isset($post['pay_date']) && $post['pay_date']=='on')
                     {
                         $table_html_return_str3 .= "<td></td>";
                     }
            $table_html_return_str3 .= "</tr>";
		}
        
        $result = db_query($sql_str4);
        $current_value="";
        $previos_value="";
        $client_net_amount = '';
        $client_comm_rec = '';
        $client_rep_comm = '';
		if($result->num_rows != 0){
		    $row_count = $result->num_rows;
            $loop_count = 0;
			while($row = $result->fetch_assoc()){
			    
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'cli_name')
                {
                    $current_value=$row['cli_no'];
                }
			    if(isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'invest')
                {
                    $current_value=$row['invest'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'date')
                {
                    $current_value=$row['date'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'clearing')
                {
                    $current_value=$row['clearing'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'net_amt')
                {
                    $current_value=$row['net_amt'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'comm_rec')
                {
                    $current_value=$row['comm_rec'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'rep_comm')
                {
                    $current_value=$row['rep_comm'];
                }
                $loop_count++;
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && ($post['subtotal_by'] == 'cli_name' || $post['subtotal_by'] == 'invest' || $post['subtotal_by'] == 'date' || $post['subtotal_by'] == 'clearing' || $post['subtotal_by'] == 'net_amt' || $post['subtotal_by'] == 'comm_rec' || $post['subtotal_by'] == 'rep_comm'))
                {
                    if($current_value!=$previos_value && $previos_value!="") {
        				$table_html_return_str4 .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str4 .= "<td></td>";
                             if(isset($post['date_rec']) && $post['date_rec']=='on')
                             {
                                $table_html_return_str4 .= "<td></td>";
                             }
                             $table_html_return_str4 .= "<td></td>";
                             if(isset($post['cli_no']) && $post['cli_no']=='on')
                             {
                                $table_html_return_str4 .= "<td></td>";
                             }
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";
                             if(isset($post['cusip']) && $post['cusip']=='on')
                             {
                                 $table_html_return_str4 .= "<td></td>";
                             }
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                             {
                                 $table_html_return_str4 .= "<td></td>";
                             }
                             $table_html_return_str4 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                             if(isset($post['pay_date']) && $post['pay_date']=='on')
                             {
                                 $table_html_return_str4 .= "<td></td>";
                             }
                        $table_html_return_str4 .= "</tr>";
                    } 
                }
				$table_html_return_str4 .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
					    case 'cli_no':
                            $first5char             = substr($value,0,5);
                            $value                  = str_replace($first5char,"XXXXX",$value);
                            if(isset($post['cli_no']) && $post['cli_no']=='on'){
                            $table_html_return_str4 .= "<td class='text-left'>$value</td>";
                            }
							break;
						case 'cli_name':
						case 'invest':
						case 'clearing':
                            $table_html_return_str4 .= "<td class='text-left'>$value</td>";
							break;
						case 'cusip_no':
                            if(isset($post['cusip']) && $post['cusip']=='on')
                            {
							     $table_html_return_str4 .= "<td class='text-left'>$value</td>";
                            }
							break;
						case 'rep_rate':
                            if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                            {
    							$value                 = number_format(floatval($value) * 100, 2);
    							$table_html_return_str4 .= "<td class='text-right'>$value%</td>";
                            }
							break;
					    case 'net_amt':
                            $total_net_amount_ad = $total_net_amount_ad+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str4 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
                        case 'comm_rec':
                            $total_comm_rec_ad = $total_comm_rec_ad+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str4 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'rep_comm':
                            $total_rep_comm_ad = $total_rep_comm_ad+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str4 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
                            if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str4 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str4 .= "<td>-</td>";
							}
                            break;
						case 'date_rec':
                            if(isset($post['date_rec']) && $post['date_rec']=='on')
                            {
    							if($value != null && $value != '0000-00-00 00:00:00'){
    								$value_timestamp = strtotime($value);
    								$value                 = date('m/d/Y', $value_timestamp);
    								$table_html_return_str4 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
    							} else{
    								$table_html_return_str4 .= "<td>-</td>";
    							}
                            }
							break;
						case 'pay_date':
                            if(isset($post['pay_date']) && $post['pay_date']=='on')
                            {
    							if($value != null && $value != '0000-00-00 00:00:00'){
    								$value_timestamp = strtotime($value);
    								$value                 = date('m/d/Y', $value_timestamp);
    								$table_html_return_str4 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
    							} else{
    								$table_html_return_str4 .= "<td>-</td>";
    							}
                            }
							break;
					}
				}
				$table_html_return_str4 .= "</tr>";
                
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'cli_name')
                {
                    $previos_value=$row['cli_no'];
                }
			    if(isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && $post['subtotal_by'] == 'invest')
                {
                    $previos_value=$row['invest'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'date')
                {
                    $previos_value=$row['date'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'clearing')
                {
                    $previos_value=$row['clearing'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'net_amt')
                {
                    $previos_value=$row['net_amt'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'comm_rec')
                {
                    $previos_value=$row['comm_rec'];
                }
                if(isset($post['subtotal_by']) && $post['subtotal_by'] == 'rep_comm')
                {
                    $previos_value=$row['rep_comm'];
                }
                $client_net_amount = isset($row['total_net_amt'])?$row['total_net_amt']:'0';
                $client_comm_rec = isset($row['total_comm_rec'])?$row['total_comm_rec']:'0';
                $client_rep_comm = isset($row['total_rep_comm'])?$row['total_rep_comm']:'0';
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on' || isset($post['subtotal_by']) && ($post['subtotal_by'] == 'cli_name' || $post['subtotal_by'] == 'invest' || $post['subtotal_by'] == 'date' || $post['subtotal_by'] == 'clearing' || $post['subtotal_by'] == 'net_amt' || $post['subtotal_by'] == 'comm_rec' || $post['subtotal_by'] == 'rep_comm'))
                {
                    if($row_count == $loop_count)
                    {
                        $table_html_return_str4  .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str4 .= "<td></td>";
                             if(isset($post['date_rec']) && $post['date_rec']=='on')
                             {
                                $table_html_return_str4 .= "<td></td>";
                             }
                             $table_html_return_str4 .= "<td></td>";
                             if(isset($post['cli_no']) && $post['cli_no']=='on')
                             {
                                $table_html_return_str4 .= "<td></td>";
                             }
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";
                             if(isset($post['cusip']) && $post['cusip']=='on')
                             {
                                 $table_html_return_str4 .= "<td></td>";
                             }
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                             {
                                 $table_html_return_str4 .= "<td></td>";
                             }
                             $table_html_return_str4 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                             if(isset($post['pay_date']) && $post['pay_date']=='on')
                             {
                                 $table_html_return_str4 .= "<td></td>";
                             }
                        $table_html_return_str4 .= "</tr>";
                    }
                }
                
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
            $table_html_return_str4 .= "<tr>";
			         $formatted_total_net                 = number_format(floatval($total_net_amount_ad), 2);
                     $formatted_total_comm_rec                 = number_format(floatval($total_comm_rec_ad), 2);
                     $formatted_total_rep_comm                 = number_format(floatval($total_rep_comm_ad), 2);
                     $table_html_return_str4 .= "<td></td>";
                     if(isset($post['date_rec']) && $post['date_rec']=='on')
                     {
                        $table_html_return_str4 .= "<td></td>";
                     }
                     $table_html_return_str4 .= "<td></td>";
                     if(isset($post['cli_no']) && $post['cli_no']=='on')
                     {
                        $table_html_return_str4 .= "<td></td>";
                     }
                     $table_html_return_str4 .= "<td></td>";
                     $table_html_return_str4 .= "<td></td>";
                     if(isset($post['cusip']) && $post['cusip']=='on')
                     {
                         $table_html_return_str4 .= "<td></td>";
                     }
                     $table_html_return_str4 .= "<td></td>";
                     $table_html_return_str4 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                     if(isset($post['rep_rate']) && $post['rep_rate']=='on')
                     {
                         $table_html_return_str4 .= "<td></td>";
                     }
                     $table_html_return_str4 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
                     if(isset($post['pay_date']) && $post['pay_date']=='on')
                     {
                         $table_html_return_str4 .= "<td></td>";
                     }
            $table_html_return_str4 .= "</tr>";
		}
        
        /*else{
			throw new Exception("No relevant records were found.", EXCEPTION_WARNING_CODE);
		}*/
	}
    //echo $table_html_return_str1;exit;


	//Activity Boxes:
	if($create_boxes_flag){
    
		//All Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
				WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row               = $result->fetch_assoc();
			$all_commissions = floatval($row['total_commission']);
		} else{
			$all_commissions = 0;
		}
        
        //Trail Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission, rep_no
				FROM trades
				WHERE source LIKE '%1'
				AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";//OR source LIKE '%2'
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row               = $result->fetch_assoc();
			$trail_commissions = floatval($row['total_commission']);
		} else{
			$trail_commissions = 0;
		}

		//Clearing Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
				WHERE (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%')
				AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row                  = $result->fetch_assoc();
			$clearing_commissions = floatval($row['total_commission']);
		} else{ 
			$clearing_commissions = 0;
		}

		//Regular_commissions
        /*$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
                WHERE source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%IN%' and source NOT LIKE '%DN%' and source NOT LIKE '%FC%' and source NOT LIKE '%HT%' and source NOT LIKE '%LG%' and source NOT LIKE '%PN%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%'
				AND inv_type!=29 AND rep_no = {$_SESSION["permrep_obj"]->permRepID}
				$where_clause;";*/
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
                WHERE source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%'
				AND inv_type!=29 AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row                 = $result->fetch_assoc();
			$regular_commissions   = floatval($row['total_commission']);
			//$regular_commissions = $total_commissions - $clearing_commissions - $trail_commissions;
		} else{
			$regular_commissions = 0;
		}
        
        //Advisory Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission, rep_no
				FROM trades
				WHERE inv_type=29
				AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row               = $result->fetch_assoc();
			$advisory_commissions = floatval($row['total_commission']);
		} else{
			$advisory_commissions = 0;
		}
        
        
        $all_commissions   = number_format($all_commissions, 2);
		$regular_commissions   = number_format($regular_commissions, 2);
		$trail_commissions     = number_format($trail_commissions, 2);
		$clearing_commissions  = number_format($clearing_commissions, 2);
        $advisory_commissions   = number_format($advisory_commissions, 2);
		$boxes_html_return_str = "
                        <div class='col-md-5'>
                            <div class='row'>
                                <div class='col-sm-6' style='cursor: pointer;' id='all_activity' onclick='open_activity_box(this.id);'>
        							<div class='alert rp_section alert-warning1 rp_active'>
        								<strong>All Activity \$$all_commissions</strong>
        							</div>
        						</div>
                                <div class='col-sm-6' style='cursor: pointer;' id='brokerage_commissions' onclick='open_activity_box(this.id);'>
        							<div class='alert rp_section alert-info'>
        								<strong>Brokerage Commissions \$$regular_commissions</strong>
        							</div>
        						</div>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='row'>
        						<div class='col-sm-12' style='cursor: pointer;' id='trail_commissions' onclick='open_activity_box(this.id);'>
        							<div class='alert rp_section alert-info'>
        								<strong>Trail Commissions \$$trail_commissions</strong>
        							</div>
        						</div>
                            </div>
                        </div>
                        <div class='col-md-5'>
                            <div class='row'>
        						<div class='col-sm-6' style='cursor: pointer;' id='clearing_commissions' onclick='open_activity_box(this.id);'>
        							<div class='alert rp_section alert-info'>
        								<strong>Clearing Commissions \$$clearing_commissions</strong>
        							</div>
        						</div>
                                <div class='col-sm-6' style='cursor: pointer;' id='advisory' onclick='open_activity_box(this.id);'>
        							<div class='alert rp_section alert-info'>
        								<strong>Advisory \$$advisory_commissions</strong>
        							</div>
        						</div>
                            </div>
                        </div>
                        <script>
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
                                $('#brokerage_commissions_section').css('display','block');
                                
                                $('#trail_commissions_section').css('display','none');
                                $('#clearing_commissions_section').css('display','none');
                                $('#advisory_section').css('display','none');
                                $('#activity_section').css('display','none');
                                
                            }
                            else if(id=='trail_commissions')
                            {
                                $('#trail_commissions_section').css('display','block');
                                
                                $('#clearing_commissions_section').css('display','none');
                                $('#advisory_section').css('display','none');
                                $('#activity_section').css('display','none');
                                $('#brokerage_commissions_section').css('display','none');
                                
                            }
                            else if(id=='clearing_commissions')
                            {
                                $('#clearing_commissions_section').css('display','block');
                                
                                $('#advisory_section').css('display','none');
                                $('#activity_section').css('display','none');
                                $('#brokerage_commissions_section').css('display','none');
                                $('#trail_commissions_section').css('display','none');
                                
                            }
                            else if(id=='advisory')
                            {
                                $('#advisory_section').css('display','block');
                                
                                $('#activity_section').css('display','none');
                                $('#brokerage_commissions_section').css('display','none');
                                $('#trail_commissions_section').css('display','none');
                                $('#clearing_commissions_section').css('display','none');
                                
                            }
                            else{
                                
                                $('#activity_section').css('display','block');
                                
                                $('#advisory_section').css('display','none');
                                $('#clearing_commissions_section').css('display','none');
                                $('#trail_commissions_section').css('display','none');
                                $('#brokerage_commissions_section').css('display','none');
                            }
                            
                        }
                        </script>
                        ";
	}
//echo '<pre>';print_r($table_html_return_str4);exit;
	$json_obj                                    = new json_obj();
    $json_obj->data_arr['table_header']        = $table_html_table_header;
	$json_obj->data_arr['activity_table']        = $table_html_return_str;
    $json_obj->data_arr['brokerage_commissions_table']        = $table_html_return_str1;
    $json_obj->data_arr['trail_commissions_table']        = $table_html_return_str2;
    $json_obj->data_arr['clearing_commissions_table']        = $table_html_return_str3;
    $json_obj->data_arr['advisory_table']        = $table_html_return_str4;
	$json_obj->data_arr['activity_boxes']        = $boxes_html_return_str;
	$json_obj->data_arr['pdf_title_first_line']  = $pdf_title_first_line;
	$json_obj->data_arr['pdf_title_second_line'] = $pdf_title_dates;
	$json_obj->status                            = true;

	return $json_obj;
}
 function activity_update($post, $create_boxes_flag = true, $create_table_flag = true){
	//Activity table:
    $where_clause = ' AND MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE())';//defined change by aksha(27-09-2018)
    //$where_clause = ' AND MONTH(date) > 9 AND YEAR(date) = YEAR(CURDATE())';//defined change by aksha(27-09-2018)    
    $table_html_return_str = '';
    $table_html_return_str1 = '';
    $table_html_return_str2 = '';
    $table_html_return_str3 = '';
    $table_html_return_str4 = '';
    $pdf_title_dates = '';
    $pdf_title_first_line = '';
    $from_date = isset($post['from_date'])?$post['from_date']:'';
    $to_date = isset($post['to_date'])?$post['to_date']:'';
    $by_date = isset($post['by_date'])?$post['by_date']:'';
    $by_date_rec = isset($post['by_date_rec'])?$post['by_date_rec']:'';
    $boxes_html_return_str = '';
    $all_dates = isset($post['all_dates'])?$post['all_dates']:'';
    if(isset($post['client_subtotal']))
    {
        $client_subtotal = isset($post['client_subtotal'])?$post['client_subtotal']:'';
    }
    else
    {
        if(isset($post['remove_client_subtotal']) && $post['remove_client_subtotal']=='true')
        {
            $client_subtotal = '';
        }
        else
        {
            if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True' && !isset($post['product_subtotal'])){
                $client_subtotal = 'on';
            }else{
                $client_subtotal = isset($post['client_subtotal'])?$post['client_subtotal']:'';
            }
        }
    }
    //$client_subtotal = isset($post['client_subtotal'])?$post['client_subtotal']:'';
    $product_subtotal = isset($post['product_subtotal'])?$post['product_subtotal']:'';
    $sql_str = ''; 
    $total_net_amount_a = 0;
    $total_comm_rec_a = 0;
    $total_rep_comm_a = 0;
    $total_net_amount_b = 0;
    $total_comm_rec_b = 0;
    $total_rep_comm_b = 0;
    $total_net_amount_t = '';
    $total_comm_rec_t = '';
    $total_rep_comm_t = '';
    $total_net_amount_c = 0;
    $total_comm_rec_c = 0;
    $total_rep_comm_c = 0;
    $total_net_amount_ad = 0;
    $total_comm_rec_ad = 0;
    $total_rep_comm_ad = 0;
    $filter_by_client = '';
    $con_query = '';
    $con_query1 = '';
    $con_query2 = '';
    $con_query3 = '';
    $con_query4 = '';
    $con_direct_query = '';
    
    $get_configuration = get_configuration();
    $trail_commission_display=isset($get_configuration['display_trail_commission'])?$get_configuration['display_trail_commission']:0;
    if(isset($get_configuration['display_trail_commission']) && $get_configuration['display_trail_commission']==1)
    {
        $con_direct_query = " and inv_type!=40 AND inv_type!=41";
    }

	if($create_table_flag){
		if($from_date > $to_date){
			throw new Exception("Start date cannot be after the end date.", EXCEPTION_WARNING_CODE);
		}
        
		if(isset($post["from_date"]) && isset($post["to_date"]) && $all_dates != 'on'){
		    if($by_date == 'on')
            {
			    $where_clause     = "AND date >= '{$from_date}' AND date <= '{$to_date}'";
            }else{
                $where_clause     = "AND date_rec >= '{$from_date}' AND date_rec <= '{$to_date}'";
                
			}
            $export_from_date = date_format(date_create($from_date), 'm/d/Y');
			$export_to_date   = date_format(date_create($to_date), 'm/d/Y');
			$pdf_title_dates  = "$export_from_date to $export_to_date";
		} else{
			$pdf_title_dates = 'All Trades of Current Month';
        }
        
        if(isset($client_subtotal) && $client_subtotal == 'on')
        {
            $filter_by_client = "order by cli_no asc";
            $con_query = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.cli_no=t2.cli_no and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.cli_no=t2.cli_no and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.cli_no=t2.cli_no and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query1 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.cli_no=t2.cli_no $con_direct_query and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.cli_no=t2.cli_no $con_direct_query and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.cli_no=t2.cli_no $con_direct_query and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query2 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.cli_no=t2.cli_no and (inv_type=40 or inv_type=41) and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.cli_no=t2.cli_no and (inv_type=40 or inv_type=41) and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.cli_no=t2.cli_no and (inv_type=40 or inv_type=41) and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query3 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.cli_no=t2.cli_no and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.cli_no=t2.cli_no and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.cli_no=t2.cli_no and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query4 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.cli_no=t2.cli_no and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.cli_no=t2.cli_no and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.cli_no=t2.cli_no and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
        }
        else if(isset($product_subtotal) && $product_subtotal == 'on')
        {
            $filter_by_client = "order by invest asc";
            $con_query = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.invest=t2.invest and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.invest=t2.invest and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.invest=t2.invest and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query1 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.invest=t2.invest $con_direct_query and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.invest=t2.invest $con_direct_query and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.invest=t2.invest $con_direct_query and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%' AND inv_type!=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query2 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.invest=t2.invest and (inv_type=40 or inv_type=41) and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.invest=t2.invest and (inv_type=40 or inv_type=41) and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.invest=t2.invest and (inv_type=40 or inv_type=41) and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query3 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.invest=t2.invest and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.invest=t2.invest and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.invest=t2.invest and (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%') and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
            
            $con_query4 = ", 
            (SELECT sum(net_amt) from trades as  t2 where t1.invest=t2.invest and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_net_amt,
            (SELECT sum(comm_rec) from trades as  t2 where t1.invest=t2.invest and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_comm_rec,
            (SELECT sum(rep_comm) from trades as  t2 where t1.invest=t2.invest and inv_type=29 and rep_no = {$_SESSION["permrep_obj"]->REP_NO} $where_clause) as total_rep_comm";
        }
        else{
            if($by_date == 'on')
            {
			    $filter_by_client = "order by date desc";
            }else{
                $filter_by_client = "order by date_rec desc";
            }
        }
        if($from_date == $to_date && isset($from_date) && isset($post["to_date"]) && isset($post['all_dates'])){
			$from_date = substr_replace($from_date, ' 00:00:00', 10);
			$to_date   = substr_replace($to_date, ' 23:59:59', 10);
		} else{
			$sql_str = "SELECT trade_no,date, date_rec, clearing,cli_no, cli_name, invest, net_amt, comm_rec, rep_rate, rep_comm, pay_date
                    $con_query
					FROM trades as t1
					WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
                    
            $sql_str1 = "SELECT trade_no,date, date_rec, clearing,cli_no, cli_name, invest, net_amt, comm_rec, rep_rate, rep_comm, pay_date
                    $con_query1
                    FROM trades as t1
					WHERE source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%'
				    AND inv_type!=29 $con_direct_query AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
                    
            $sql_str2 = "SELECT trade_no,date, date_rec, clearing,cli_no, cli_name, invest, net_amt, comm_rec, rep_rate, rep_comm, pay_date
                    $con_query2
                    FROM trades as t1
					WHERE (inv_type=40 or inv_type=41)
				    AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
                    
            $sql_str3 = "SELECT trade_no,date, date_rec, clearing,cli_no, cli_name, invest, net_amt, comm_rec, rep_rate, rep_comm, pay_date
                    $con_query3
					FROM trades as t1
					WHERE (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%')
				    AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
                    
            $sql_str4 = "SELECT trade_no,date, date_rec, clearing,cli_no, cli_name, invest, net_amt, comm_rec, rep_rate, rep_comm, pay_date
                    $con_query4
					FROM trades as t1
					WHERE inv_type=29
				    AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
            
		}

		$result = db_query($sql_str);
        $current_value="";
        $previos_value="";
        $client_net_amount = '';
        $client_comm_rec = '';
        $client_rep_comm = '';
        
		if($result->num_rows != 0){
		    $row_count = $result->num_rows;
            $loop_count = 0;
			while($row = $result->fetch_assoc()){
			 
                $current_value=isset($client_subtotal) && $client_subtotal == 'on'?$row['cli_no']:$row['invest'];
                $loop_count++;
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on')
                {
                    if($current_value!=$previos_value && $previos_value!="") {
        				$table_html_return_str .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";                             
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
        					 $table_html_return_str .= "<td></td>";
                        $table_html_return_str .= "</tr>";
                    }
                }
                
				$table_html_return_str .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
					    case 'cli_no':
                            $first5char             = substr($value,0,5);
                            $value                  = str_replace($first5char,"XXXXX",$value);
                            $table_html_return_str .= "<td class='text-left'>$value</td>";
							break;
						case 'cli_name':
                        case 'invest':
                        case 'trade_no':
						case 'clearing':
						case 'cusip_no':
							$table_html_return_str .= "<td class='text-left'>$value</td>";
							break;
						case 'rep_rate':
							$value                 = number_format(floatval($value) * 100, 2);
							$table_html_return_str .= "<td class='text-right'>$value%</td>";
							break;
						case 'net_amt':
                            $total_net_amount_a = $total_net_amount_a+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
                        case 'comm_rec':
                            $total_comm_rec_a = $total_comm_rec_a+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'rep_comm':
                            $total_rep_comm_a = $total_rep_comm_a+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
						case 'date_rec':
						case 'pay_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str .= "<td>-</td>";
							}
							break;
						
					}
				}
                $table_html_return_str .= "</tr>";
                
                $previos_value = isset($client_subtotal) && $client_subtotal == 'on'?$row['cli_no']:$row['invest'];
                $client_net_amount = isset($row['total_net_amt'])?$row['total_net_amt']:'0';
                $client_comm_rec = isset($row['total_comm_rec'])?$row['total_comm_rec']:'0';
                $client_rep_comm = isset($row['total_rep_comm'])?$row['total_rep_comm']:'0';
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on')
                {
                    if($row_count == $loop_count)
                    {
                        $table_html_return_str .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";                             
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             $table_html_return_str .= "<td></td>";
                             $table_html_return_str .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
        					 $table_html_return_str .= "<td></td>";
                        $table_html_return_str .= "</tr>";
                    }
                }
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
            $table_html_return_str .= "<tr>";
			         $formatted_total_net                 = number_format(floatval($total_net_amount_a), 2);
                     $formatted_total_comm_rec                 = number_format(floatval($total_comm_rec_a), 2);
                     $formatted_total_rep_comm                 = number_format(floatval($total_rep_comm_a), 2);
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";                     
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
					 $table_html_return_str .= "<td></td>";
            $table_html_return_str .= "</tr>";
		}
        
        $result = db_query($sql_str1);
        $current_value="";
        $previos_value="";
        $client_net_amount = '';
        $client_comm_rec = '';
        $client_rep_comm = '';
        
		if($result->num_rows != 0){
		    $row_count = $result->num_rows;
            $loop_count = 0;
            while($row = $result->fetch_assoc()){
                
                $current_value=isset($client_subtotal) && $client_subtotal == 'on'?$row['cli_no']:$row['invest'];
                $loop_count++;
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on')
                {
                    if($current_value!=$previos_value && $previos_value!="") {
        				$table_html_return_str1 .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";                             
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
        					 $table_html_return_str1 .= "<td></td>";
                        $table_html_return_str1 .= "</tr>";
                    }
                }
				$table_html_return_str1 .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
					    case 'cli_no':
                            $first5char             = substr($value,0,5);
                            $value                  = str_replace($first5char,"XXXXX",$value);
                            $table_html_return_str1 .= "<td class='text-left'>$value</td>";
							break;
						case 'cli_name':
						case 'invest':
                        case 'trade_no':                        
						case 'clearing':
						case 'cusip_no':
							$table_html_return_str1 .= "<td class='text-left'>$value</td>";
							break;
						case 'rep_rate':
							$value                 = number_format(floatval($value) * 100, 2);
							$table_html_return_str1 .= "<td class='text-right'>$value%</td>";
							break;
						case 'net_amt':
                            $total_net_amount_b = $total_net_amount_b+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str1 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
                        case 'comm_rec':
                            $total_comm_rec_b = $total_comm_rec_b+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str1 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'rep_comm':
                            $total_rep_comm_b = $total_rep_comm_b+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str1 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
						case 'date_rec':
						case 'pay_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str1 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str1 .= "<td>-</td>";
							}
							break;
						
					}
				}
				$table_html_return_str1 .= "</tr>";
                
                $previos_value=isset($client_subtotal) && $client_subtotal == 'on'?$row['cli_no']:$row['invest'];
                $client_net_amount = isset($row['total_net_amt'])?$row['total_net_amt']:'0';
                $client_comm_rec = isset($row['total_comm_rec'])?$row['total_comm_rec']:'0';
                $client_rep_comm = isset($row['total_rep_comm'])?$row['total_rep_comm']:'0';
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on')
                {
                    if($row_count == $loop_count)
                    {
                        $table_html_return_str1 .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";                             
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             $table_html_return_str1 .= "<td></td>";
                             $table_html_return_str1 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
        					 $table_html_return_str1 .= "<td></td>";
                        $table_html_return_str1 .= "</tr>";
                    }
                }
                
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
            $table_html_return_str1 .= "<tr>";
			         $formatted_total_net                 = number_format(floatval($total_net_amount_b), 2);
                     $formatted_total_comm_rec                 = number_format(floatval($total_comm_rec_b), 2);
                     $formatted_total_rep_comm                 = number_format(floatval($total_rep_comm_b), 2);
                     $table_html_return_str1 .= "<td></td>";
                     $table_html_return_str1 .= "<td></td>";
                     $table_html_return_str1 .= "<td></td>";                     
                     $table_html_return_str1 .= "<td></td>";
                     $table_html_return_str1 .= "<td></td>";
                     $table_html_return_str1 .= "<td></td>";
                     $table_html_return_str1 .= "<td></td>";
                     $table_html_return_str1 .= "<td></td>";
                     $table_html_return_str1 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                     $table_html_return_str1 .= "<td></td>";
                     $table_html_return_str1 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
					 $table_html_return_str1 .= "<td></td>";
            $table_html_return_str1 .= "</tr>";
		}
       
        $result = db_query($sql_str2);
        $current_value="";
        $previos_value="";
        $client_net_amount = '';
        $client_comm_rec = '';
        $client_rep_comm = '';
		if($result->num_rows != 0){
		    $row_count = $result->num_rows;
            $loop_count = 0;
			while($row = $result->fetch_assoc()){
			    $current_value=isset($client_subtotal) && $client_subtotal == 'on'?$row['cli_no']:$row['invest'];
                $loop_count++;
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on')
                {
                    if($current_value!=$previos_value && $previos_value!="") {
        				$table_html_return_str2 .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";                             
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
        					 $table_html_return_str2 .= "<td></td>";
                        $table_html_return_str2 .= "</tr>";
                    }
                } 
				$table_html_return_str2 .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
					    case 'cli_no':
                            $first5char             = substr($value,0,5);
                            $value                  = str_replace($first5char,"XXXXX",$value);
                            $table_html_return_str2 .= "<td class='text-left'>$value</td>";
							break;
						case 'cli_name':
						case 'invest':
                        case 'trade_no':                        
						case 'clearing':
						case 'cusip_no':
							$table_html_return_str2 .= "<td class='text-left'>$value</td>";
							break;
						case 'rep_rate':
							$value                 = number_format(floatval($value) * 100, 2);
							$table_html_return_str2 .= "<td class='text-right'>$value%</td>";
							break;
						case 'net_amt':
                            $total_net_amount_c = $total_net_amount_c+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str2 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
                        case 'comm_rec':
                            $total_comm_rec_c = $total_comm_rec_c+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str2 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'rep_comm':
                            $total_rep_comm_c = $total_rep_comm_c+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str2 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
						case 'date_rec':
						case 'pay_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str2 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str2 .= "<td>-</td>";
							}
							break;
					}
				}
				$table_html_return_str2 .= "</tr>";
                
                $previos_value=isset($client_subtotal) && $client_subtotal == 'on'?$row['cli_no']:$row['invest'];
                $client_net_amount = isset($row['total_net_amt'])?$row['total_net_amt']:'0';
                $client_comm_rec = isset($row['total_comm_rec'])?$row['total_comm_rec']:'0';
                $client_rep_comm = isset($row['total_rep_comm'])?$row['total_rep_comm']:'0';
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on')
                {
                    if($row_count == $loop_count)
                    {
                        $table_html_return_str2  .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";                             
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             $table_html_return_str2 .= "<td></td>";
                             $table_html_return_str2 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
        					 $table_html_return_str2 .= "<td></td>";
                        $table_html_return_str2 .= "</tr>";
                    }
                }
                
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
            $table_html_return_str2 .= "<tr>";
			         $formatted_total_net                 = number_format(floatval($total_net_amount_c), 2);
                     $formatted_total_comm_rec                 = number_format(floatval($total_comm_rec_c), 2);
                     $formatted_total_rep_comm                 = number_format(floatval($total_rep_comm_c), 2);
                     $table_html_return_str2 .= "<td></td>";
                     $table_html_return_str2 .= "<td></td>";
                     $table_html_return_str2 .= "<td></td>";                     
                     $table_html_return_str2 .= "<td></td>";
                     $table_html_return_str2 .= "<td></td>";
                     $table_html_return_str2 .= "<td></td>";
                     $table_html_return_str2 .= "<td></td>";
                     $table_html_return_str2 .= "<td></td>";
                     $table_html_return_str2 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                     $table_html_return_str2 .= "<td></td>";
                     $table_html_return_str2 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
					 $table_html_return_str2 .= "<td></td>";
            $table_html_return_str2 .= "</tr>";
		}
        
        $result = db_query($sql_str3);
        $current_value="";
        $previos_value="";
        $client_net_amount = '';
        $client_comm_rec = '';
        $client_rep_comm = '';
		if($result->num_rows != 0){
		    $row_count = $result->num_rows;
            $loop_count = 0;
			while($row = $result->fetch_assoc()){
			    $current_value=isset($client_subtotal) && $client_subtotal == 'on'?$row['cli_no']:$row['invest'];
                $loop_count++;
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on')
                {
                    if($current_value!=$previos_value && $previos_value!="") {
        				$table_html_return_str3 .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";                             
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
        					 $table_html_return_str3 .= "<td></td>";
                        $table_html_return_str3 .= "</tr>";
                    } 
                }
				$table_html_return_str3 .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
					    case 'cli_no':
                            $first5char             = substr($value,0,5);
                            $value                  = str_replace($first5char,"XXXXX",$value);
                            $table_html_return_str3 .= "<td class='text-left'>$value</td>";
							break;
						case 'cli_name':
						case 'invest':
                        case 'trade_no':                        
						case 'clearing':
						case 'cusip_no':
							$table_html_return_str3 .= "<td class='text-left'>$value</td>";
							break;
						case 'rep_rate':
							$value                 = number_format(floatval($value) * 100, 2);
							$table_html_return_str3 .= "<td class='text-right'>$value%</td>";
							break;
						case 'net_amt':
                            $total_net_amount_t = $total_net_amount_t+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str3 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
                        case 'comm_rec':
                            $total_comm_rec_t = $total_comm_rec_t+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str3 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'rep_comm':
                            $total_rep_comm_t = $total_rep_comm_t+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str3 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
						case 'date_rec':
						case 'pay_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str3 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str3 .= "<td>-</td>";
							}
							break;
					}
				}
				$table_html_return_str3 .= "</tr>";
                
                $previos_value=isset($client_subtotal) && $client_subtotal == 'on'?$row['cli_no']:$row['invest'];
                $client_net_amount = isset($row['total_net_amt'])?$row['total_net_amt']:'0';
                $client_comm_rec = isset($row['total_comm_rec'])?$row['total_comm_rec']:'0';
                $client_rep_comm = isset($row['total_rep_comm'])?$row['total_rep_comm']:'0';
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on')
                {
                    if($row_count == $loop_count)
                    {
                        $table_html_return_str3  .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";                             
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             $table_html_return_str3 .= "<td></td>";
                             $table_html_return_str3 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
        					 $table_html_return_str3 .= "<td></td>";
                        $table_html_return_str3 .= "</tr>";
                    }
              }
                
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
            $table_html_return_str3 .= "<tr>";
			         $formatted_total_net                 = number_format(floatval($total_net_amount_t), 2);
                     $formatted_total_comm_rec                 = number_format(floatval($total_comm_rec_t), 2);
                     $formatted_total_rep_comm                 = number_format(floatval($total_rep_comm_t), 2);
                     $table_html_return_str3 .= "<td></td>";
                     $table_html_return_str3 .= "<td></td>";                     
                     $table_html_return_str3 .= "<td></td>";
                     $table_html_return_str3 .= "<td></td>";
                     $table_html_return_str3 .= "<td></td>";
                     $table_html_return_str3 .= "<td></td>";
                     $table_html_return_str3 .= "<td></td>";
                     $table_html_return_str3 .= "<td></td>";
                     $table_html_return_str3 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                     $table_html_return_str3 .= "<td></td>";
                     $table_html_return_str3 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
					 $table_html_return_str3 .= "<td></td>";
            $table_html_return_str3 .= "</tr>";
		}
        
        $result = db_query($sql_str4);
        $current_value="";
        $previos_value="";
        $client_net_amount = '';
        $client_comm_rec = '';
        $client_rep_comm = '';
		if($result->num_rows != 0){
		    $row_count = $result->num_rows;
            $loop_count = 0;
			while($row = $result->fetch_assoc()){
			    $current_value=isset($client_subtotal) && $client_subtotal == 'on'?$row['cli_no']:$row['invest'];
                $loop_count++;
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on')
                {
                    if($current_value!=$previos_value && $previos_value!="") {
        				$table_html_return_str4 .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";                             
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
        					 $table_html_return_str4 .= "<td></td>";
                        $table_html_return_str4 .= "</tr>";
                    } 
                }
				$table_html_return_str4 .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
					    case 'cli_no':
                            $first5char             = substr($value,0,5);
                            $value                  = str_replace($first5char,"XXXXX",$value);
                            $table_html_return_str4 .= "<td class='text-left'>$value</td>";
							break;
						case 'cli_name':
						case 'invest':
                        case 'trade_no':                        
						case 'clearing':
						case 'cusip_no':
							$table_html_return_str4 .= "<td class='text-left'>$value</td>";
							break;
						case 'rep_rate':
							$value                 = number_format(floatval($value) * 100, 2);
							$table_html_return_str4 .= "<td class='text-right'>$value%</td>";
							break;
					    case 'net_amt':
                            $total_net_amount_ad = $total_net_amount_ad+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str4 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
                        case 'comm_rec':
                            $total_comm_rec_ad = $total_comm_rec_ad+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str4 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'rep_comm':
                            $total_rep_comm_ad = $total_rep_comm_ad+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str4 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
						case 'date_rec':
						case 'pay_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str4 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str4 .= "<td>-</td>";
							}
							break;
					}
				}
				$table_html_return_str4 .= "</tr>";
                
                
                $previos_value=isset($client_subtotal) && $client_subtotal == 'on'?$row['cli_no']:$row['invest'];
                $client_net_amount = isset($row['total_net_amt'])?$row['total_net_amt']:'0';
                $client_comm_rec = isset($row['total_comm_rec'])?$row['total_comm_rec']:'0';
                $client_rep_comm = isset($row['total_rep_comm'])?$row['total_rep_comm']:'0';
                
                if(isset($client_subtotal) && $client_subtotal == 'on' || isset($product_subtotal) && $product_subtotal == 'on')
                {
                    if($row_count == $loop_count)
                    {
                        $table_html_return_str4  .= "<tr>";
        			         $formatted_total_net                 = isset($client_net_amount)?number_format(floatval($client_net_amount), 2):'0';
                             $formatted_total_comm_rec            = isset($client_comm_rec)?number_format(floatval($client_comm_rec), 2):'0';
                             $formatted_total_rep_comm            = isset($client_rep_comm)?number_format(floatval($client_rep_comm), 2):'0';
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";                             
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                             $table_html_return_str4 .= "<td></td>";
                             $table_html_return_str4 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
        					 $table_html_return_str4 .= "<td></td>";
                        $table_html_return_str4 .= "</tr>";
                    }
                }
                
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
            $table_html_return_str4 .= "<tr>";
			         $formatted_total_net                 = number_format(floatval($total_net_amount_ad), 2);
                     $formatted_total_comm_rec                 = number_format(floatval($total_comm_rec_ad), 2);
                     $formatted_total_rep_comm                 = number_format(floatval($total_rep_comm_ad), 2);
                     $table_html_return_str4 .= "<td></td>";                     
                     $table_html_return_str4 .= "<td></td>";
                     $table_html_return_str4 .= "<td></td>";
                     $table_html_return_str4 .= "<td></td>";
                     $table_html_return_str4 .= "<td></td>";
                     $table_html_return_str4 .= "<td></td>";
                     $table_html_return_str4 .= "<td></td>";
                     $table_html_return_str4 .= "<td></td>";
                     $table_html_return_str4 .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                     $table_html_return_str4 .= "<td></td>";
                     $table_html_return_str4 .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
					 $table_html_return_str4 .= "<td></td>";
            $table_html_return_str4 .= "</tr>";
		}
        
        /*else{
			throw new Exception("No relevant records were found.", EXCEPTION_WARNING_CODE);
		}*/
	}
    //echo $table_html_return_str1;exit;


	//Activity Boxes:
	if($create_boxes_flag){
    
		//All Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
				WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row               = $result->fetch_assoc();
			$all_commissions = floatval($row['total_commission']);
		} else{
			$all_commissions = 0;
		}
        
        //Trail Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission, rep_no
				FROM trades
				WHERE (inv_type=40 or inv_type=41)
				AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";//OR source LIKE '%2'
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row               = $result->fetch_assoc();
			$trail_commissions = floatval($row['total_commission']);
		} else{
			$trail_commissions = 0;
		}

		//Clearing Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
				WHERE (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%')
				AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row                  = $result->fetch_assoc();
			$clearing_commissions = floatval($row['total_commission']);
		} else{ 
			$clearing_commissions = 0;
		}

		//Regular_commissions
        /*$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
                WHERE source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%IN%' and source NOT LIKE '%DN%' and source NOT LIKE '%FC%' and source NOT LIKE '%HT%' and source NOT LIKE '%LG%' and source NOT LIKE '%PN%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%'
				AND inv_type!=29 AND rep_no = {$_SESSION["permrep_obj"]->permRepID}
				$where_clause;";*/
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
                WHERE source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%'
				AND inv_type!=29 $con_direct_query AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row                 = $result->fetch_assoc();
			$regular_commissions   = floatval($row['total_commission']);
			//$regular_commissions = $total_commissions - $clearing_commissions - $trail_commissions;
		} else{
			$regular_commissions = 0;
		}
        
        //Advisory Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission, rep_no
				FROM trades
				WHERE inv_type=29
				AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row               = $result->fetch_assoc();
			$advisory_commissions = floatval($row['total_commission']);
		} else{
			$advisory_commissions = 0;
		}
        if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
        {
            $default_active_section_advisory = 'alert-warning1 rp_active';
            $default_active_section_all_activity = 'alert-info';
        }
        else
        {
            $default_active_section_advisory = 'alert-info';
            $default_active_section_all_activity = 'alert-warning1 rp_active';
        }
        $all_commissions   = number_format($all_commissions, 2);
		$regular_commissions   = number_format($regular_commissions, 2);
		$trail_commissions     = number_format($trail_commissions, 2);
		$clearing_commissions  = number_format($clearing_commissions, 2);
        $advisory_commissions   = number_format($advisory_commissions, 2);
        if(isset($_SESSION['company_name']) && $_SESSION['company_name']=='vicuscapital')
        {
            $boxes_html_return_str = "
                <div class='col-md-4' style='cursor: pointer;' id='all_activity' onclick='open_activity_box(this.id);'>
                    <div class='alert rp_section $default_active_section_all_activity'>
						<strong>All Activity \$$all_commissions</strong>
					</div>
                </div>
                <div class='col-md-4' style='cursor: pointer;' id='brokerage_commissions' onclick='open_activity_box(this.id);'>
                    <div class='alert rp_section alert-info'>
						<strong>Commissions \$$regular_commissions</strong>
					</div>
                </div>
                <div class='col-md-4' style='cursor: pointer;' id='advisory' onclick='open_activity_box(this.id);'>
                    <div class='alert rp_section $default_active_section_advisory'>
						<strong>Advisory Fees \$$advisory_commissions</strong>
					</div>
                </div>
                <script>
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
                        $('#brokerage_commissions_section').css('display','block');
                        
                        $('#trail_commissions_section').css('display','none');
                        $('#clearing_commissions_section').css('display','none');
                        $('#advisory_section').css('display','none');
                        $('#activity_section').css('display','none');
                        
                    }
                    else if(id=='trail_commissions')
                    {
                        $('#trail_commissions_section').css('display','block');
                        
                        $('#clearing_commissions_section').css('display','none');
                        $('#advisory_section').css('display','none');
                        $('#activity_section').css('display','none');
                        $('#brokerage_commissions_section').css('display','none');
                        
                    }
                    else if(id=='clearing_commissions')
                    {
                        $('#clearing_commissions_section').css('display','block');
                        
                        $('#advisory_section').css('display','none');
                        $('#activity_section').css('display','none');
                        $('#brokerage_commissions_section').css('display','none');
                        $('#trail_commissions_section').css('display','none');
                        
                    }
                    else if(id=='advisory')
                    {
                        $('#advisory_section').css('display','block');
                        
                        $('#activity_section').css('display','none');
                        $('#brokerage_commissions_section').css('display','none');
                        $('#trail_commissions_section').css('display','none');
                        $('#clearing_commissions_section').css('display','none');
                        
                    }
                    else{
                        
                        $('#activity_section').css('display','block');
                        
                        $('#advisory_section').css('display','none');
                        $('#clearing_commissions_section').css('display','none');
                        $('#trail_commissions_section').css('display','none');
                        $('#brokerage_commissions_section').css('display','none');
                    }
                    
                }
                </script>
                ";
        }else{
            if(isset($get_configuration['display_trail_commission']) && $get_configuration['display_trail_commission']==1)
            {
                $boxes_html_return_str = "
                            <div class='col-md-5'>
                                <div class='row'>
                                    <div class='col-sm-6' style='cursor: pointer;' id='all_activity' onclick='open_activity_box(this.id);'>
            							<div class='alert rp_section $default_active_section_all_activity'>
            								<strong>All Activity \$$all_commissions</strong>
            							</div>
            						</div>
                                    <div class='col-sm-6' style='cursor: pointer;' id='brokerage_commissions' onclick='open_activity_box(this.id);'>
            							<div class='alert rp_section alert-info'>
            								<strong>Direct Business \$$regular_commissions</strong>
            							</div>
            						</div>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='row'>
            						<div class='col-sm-12' style='cursor: pointer;' id='trail_commissions' onclick='open_activity_box(this.id);'>
            							<div class='alert rp_section alert-info'>
            								<strong>Trail Commissions \$$trail_commissions</strong>
            							</div>
            						</div>
                                </div>
                            </div>
                            <div class='col-md-5'>
                                <div class='row'>
            						<div class='col-sm-6' style='cursor: pointer;' id='clearing_commissions' onclick='open_activity_box(this.id);'>
            							<div class='alert rp_section alert-info'>
            								<strong>Clearing Commissions \$$clearing_commissions</strong>
            							</div>
            						</div>
                                    <div class='col-sm-6' style='cursor: pointer;' id='advisory' onclick='open_activity_box(this.id);'>
            							<div class='alert rp_section $default_active_section_advisory'>
            								<strong>Advisory \$$advisory_commissions</strong>
            							</div>
            						</div>
                                </div>
                            </div>
                            <script>
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
                                    $('#brokerage_commissions_section').css('display','block');
                                    
                                    $('#trail_commissions_section').css('display','none');
                                    $('#clearing_commissions_section').css('display','none');
                                    $('#advisory_section').css('display','none');
                                    $('#activity_section').css('display','none');
                                    
                                }
                                else if(id=='trail_commissions')
                                {
                                    $('#trail_commissions_section').css('display','block');
                                    
                                    $('#clearing_commissions_section').css('display','none');
                                    $('#advisory_section').css('display','none');
                                    $('#activity_section').css('display','none');
                                    $('#brokerage_commissions_section').css('display','none');
                                    
                                }
                                else if(id=='clearing_commissions')
                                {
                                    $('#clearing_commissions_section').css('display','block');
                                    
                                    $('#advisory_section').css('display','none');
                                    $('#activity_section').css('display','none');
                                    $('#brokerage_commissions_section').css('display','none');
                                    $('#trail_commissions_section').css('display','none');
                                    
                                }
                                else if(id=='advisory')
                                {
                                    $('#advisory_section').css('display','block');
                                    
                                    $('#activity_section').css('display','none');
                                    $('#brokerage_commissions_section').css('display','none');
                                    $('#trail_commissions_section').css('display','none');
                                    $('#clearing_commissions_section').css('display','none');
                                    
                                }
                                else{
                                    
                                    $('#activity_section').css('display','block');
                                    
                                    $('#advisory_section').css('display','none');
                                    $('#clearing_commissions_section').css('display','none');
                                    $('#trail_commissions_section').css('display','none');
                                    $('#brokerage_commissions_section').css('display','none');
                                }
                                
                            }
                            </script>
                            ";
        }else{
            $boxes_html_return_str = "
                            <div class='col-sm-6'>
                                <div class='row'>
                                    <div class='col-sm-6' style='cursor: pointer;' id='all_activity' onclick='open_activity_box(this.id);'>
            							<div class='alert rp_section $default_active_section_all_activity'>
            								<strong>All Activity \$$all_commissions</strong>
            							</div>
            						</div>
                                    <div class='col-sm-6' style='cursor: pointer;' id='brokerage_commissions' onclick='open_activity_box(this.id);'>
            							<div class='alert rp_section alert-info'>
            								<strong>Direct Business \$$regular_commissions</strong>
            							</div>
            						</div>
                                </div>
                            </div>
                            <div class='col-sm-6'>
                                <div class='row'>
            						<div class='col-sm-6' style='cursor: pointer;' id='clearing_commissions' onclick='open_activity_box(this.id);'>
            							<div class='alert rp_section alert-info'>
            								<strong>Clearing Commissions \$$clearing_commissions</strong>
            							</div>
            						</div>
                                    <div class='col-sm-6' style='cursor: pointer;' id='advisory' onclick='open_activity_box(this.id);'>
            							<div class='alert rp_section $default_active_section_advisory'>
            								<strong>Advisory \$$advisory_commissions</strong>
            							</div>
            						</div>
                                </div>
                            </div>
                            <script>
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
                                    $('#brokerage_commissions_section').css('display','block');
                                    
                                    $('#trail_commissions_section').css('display','none');
                                    $('#clearing_commissions_section').css('display','none');
                                    $('#advisory_section').css('display','none');
                                    $('#activity_section').css('display','none');
                                    
                                }
                                else if(id=='trail_commissions')
                                {
                                    $('#trail_commissions_section').css('display','block');
                                    
                                    $('#clearing_commissions_section').css('display','none');
                                    $('#advisory_section').css('display','none');
                                    $('#activity_section').css('display','none');
                                    $('#brokerage_commissions_section').css('display','none');
                                    
                                }
                                else if(id=='clearing_commissions')
                                {
                                    $('#clearing_commissions_section').css('display','block');
                                    
                                    $('#advisory_section').css('display','none');
                                    $('#activity_section').css('display','none');
                                    $('#brokerage_commissions_section').css('display','none');
                                    $('#trail_commissions_section').css('display','none');
                                    
                                }
                                else if(id=='advisory')
                                {
                                    $('#advisory_section').css('display','block');
                                    
                                    $('#activity_section').css('display','none');
                                    $('#brokerage_commissions_section').css('display','none');
                                    $('#trail_commissions_section').css('display','none');
                                    $('#clearing_commissions_section').css('display','none');
                                    
                                }
                                else{
                                    
                                    $('#activity_section').css('display','block');
                                    
                                    $('#advisory_section').css('display','none');
                                    $('#clearing_commissions_section').css('display','none');
                                    $('#trail_commissions_section').css('display','none');
                                    $('#brokerage_commissions_section').css('display','none');
                                }
                                
                            }
                            </script>
                            ";
        }
    }
	}
//echo '<pre>';print_r($table_html_return_str4);exit;
	$json_obj                                    = new json_obj();
	$json_obj->data_arr['activity_table']        = $table_html_return_str;
    $json_obj->data_arr['brokerage_commissions_table']        = $table_html_return_str1;
    $json_obj->data_arr['trail_commissions_table']        = $table_html_return_str2;
    $json_obj->data_arr['clearing_commissions_table']        = $table_html_return_str3;
    $json_obj->data_arr['advisory_table']        = $table_html_return_str4;
	$json_obj->data_arr['activity_boxes']        = $boxes_html_return_str;
	$json_obj->data_arr['pdf_title_first_line']  = $pdf_title_first_line;
	$json_obj->data_arr['pdf_title_second_line'] = $pdf_title_dates;
	$json_obj->status                            = true;

	return $json_obj;
}
 /*function activity_update($post, $create_boxes_flag = true, $create_table_flag = true){
	//Activity table:
    $where_clause = ' AND YEAR(date) = YEAR(CURDATE())';//defined change by aksha(27-09-2018)
    $table_html_return_str = '';
    $table_html_return_str1 = '';
    $table_html_return_str2 = '';
    $table_html_return_str3 = '';
    $table_html_return_str4 = '';
    $pdf_title_dates = '';
    $pdf_title_first_line = '';
    $from_date = isset($post['from_date'])?$post['from_date']:'';
    $to_date = isset($post['to_date'])?$post['to_date']:'';
    $boxes_html_return_str = '';
    $all_dates = isset($post['all_dates'])?$post['all_dates']:'';
    $sql_str = '';

	if($create_table_flag){
		if($from_date > $to_date){
			throw new Exception("Start date cannot be after the end date.", EXCEPTION_WARNING_CODE);
		}

		if(isset($post["from_date"]) && isset($post["to_date"]) && $all_dates != 'on'){
			$where_clause     = "AND date > '{$from_date}' AND date < '{$to_date}'";
			$export_from_date = date_format(date_create($from_date), 'm/d/Y');
			$export_to_date   = date_format(date_create($to_date), 'm/d/Y');
			$pdf_title_dates  = "$export_from_date to $export_to_date";
		} else{
			$pdf_title_dates = 'All Trades of Current Year';
        }

		if($from_date == $to_date && isset($from_date) && isset($post["to_date"]) && isset($post['all_dates'])){
			$from_date = substr_replace($from_date, ' 00:00:00', 10);
			$to_date   = substr_replace($to_date, ' 23:59:59', 10);
		} else{
			$sql_str = "SELECT date, date_rec, clearing, cli_name, invest, cusip_no, net_amt, comm_exp, comm_rec, rep_rate, rep_comm, pay_date
					FROM trades
					WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause;";
                    
            $sql_str1 = "SELECT date, date_rec, clearing, cli_name, invest, cusip_no, net_amt, comm_exp, comm_rec, rep_rate, rep_comm, pay_date
					FROM trades
					WHERE source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%'
				AND inv_type!=29 AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause;";
                    
            $sql_str2 = "SELECT date, date_rec, clearing, cli_name, invest, cusip_no, net_amt, comm_exp, comm_rec, rep_rate, rep_comm, pay_date
					FROM trades
					WHERE source LIKE '%1'
				    AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause;";
                    
            $sql_str3 = "SELECT date, date_rec, clearing, cli_name, invest, cusip_no, net_amt, comm_exp, comm_rec, rep_rate, rep_comm, pay_date
					FROM trades
					WHERE (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%')
				    AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause;";
                    
            $sql_str4 = "SELECT date, date_rec, clearing, cli_name, invest, cusip_no, net_amt, comm_exp, comm_rec, rep_rate, rep_comm, pay_date
					FROM trades
					WHERE inv_type=29
				    AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause;";
            
		}

		$result = db_query($sql_str);
		if($result->num_rows != 0){
			while($row = $result->fetch_assoc()){
				$table_html_return_str .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
						case 'cli_name':
						case 'invest':
						case 'clearing':
						case 'cusip_no':
							$table_html_return_str .= "<td class='text-left'>$value</td>";
							break;
						case 'rep_rate':
							$value                 = number_format(floatval($value) * 100, 2);
							$table_html_return_str .= "<td class='text-right'>$value%</td>";
							break;
						case 'net_amt':
						case 'comm_rec':
						case 'rep_comm':
						case 'comm_exp':
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
						case 'date_rec':
						case 'pay_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str .= "<td>-</td>";
							}
							break;
						default:
							$table_html_return_str .= "<td>$value</td>";
							break;
					}
				}
				$table_html_return_str .= "</tr>";
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
		}
        
        $result = db_query($sql_str1);
		if($result->num_rows != 0){
			while($row = $result->fetch_assoc()){
				$table_html_return_str1 .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
						case 'cli_name':
						case 'invest':
						case 'clearing':
						case 'cusip_no':
							$table_html_return_str1 .= "<td class='text-left'>$value</td>";
							break;
						case 'rep_rate':
							$value                 = number_format(floatval($value) * 100, 2);
							$table_html_return_str1 .= "<td class='text-right'>$value%</td>";
							break;
						case 'net_amt':
						case 'comm_rec':
						case 'rep_comm':
						case 'comm_exp':
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str1 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
						case 'date_rec':
						case 'pay_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str1 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str1 .= "<td>-</td>";
							}
							break;
						default:
							$table_html_return_str1 .= "<td>$value</td>";
							break;
					}
				}
				$table_html_return_str1 .= "</tr>";
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
		}
       
        $result = db_query($sql_str2);
		if($result->num_rows != 0){
			while($row = $result->fetch_assoc()){
				$table_html_return_str2 .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
						case 'cli_name':
						case 'invest':
						case 'clearing':
						case 'cusip_no':
							$table_html_return_str2 .= "<td class='text-left'>$value</td>";
							break;
						case 'rep_rate':
							$value                 = number_format(floatval($value) * 100, 2);
							$table_html_return_str2 .= "<td class='text-right'>$value%</td>";
							break;
						case 'net_amt':
						case 'comm_rec':
						case 'rep_comm':
						case 'comm_exp':
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str2 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
						case 'date_rec':
						case 'pay_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str2 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str2 .= "<td>-</td>";
							}
							break;
						default:
							$table_html_return_str2 .= "<td>$value</td>";
							break;
					}
				}
				$table_html_return_str2 .= "</tr>";
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
		}
        
        $result = db_query($sql_str3);
		if($result->num_rows != 0){
			while($row = $result->fetch_assoc()){
				$table_html_return_str3 .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
						case 'cli_name':
						case 'invest':
						case 'clearing':
						case 'cusip_no':
							$table_html_return_str3 .= "<td class='text-left'>$value</td>";
							break;
						case 'rep_rate':
							$value                 = number_format(floatval($value) * 100, 2);
							$table_html_return_str3 .= "<td class='text-right'>$value%</td>";
							break;
						case 'net_amt':
						case 'comm_rec':
						case 'rep_comm':
						case 'comm_exp':
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str3 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
						case 'date_rec':
						case 'pay_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str3 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str3 .= "<td>-</td>";
							}
							break;
						default:
							$table_html_return_str3 .= "<td>$value</td>";
							break;
					}
				}
				$table_html_return_str3 .= "</tr>";
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
		}
        
        $result = db_query($sql_str4);
		if($result->num_rows != 0){
			while($row = $result->fetch_assoc()){
				$table_html_return_str4 .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
						case 'cli_name':
						case 'invest':
						case 'clearing':
						case 'cusip_no':
							$table_html_return_str4 .= "<td class='text-left'>$value</td>";
							break;
						case 'rep_rate':
							$value                 = number_format(floatval($value) * 100, 2);
							$table_html_return_str4 .= "<td class='text-right'>$value%</td>";
							break;
						case 'net_amt':
						case 'comm_rec':
						case 'rep_comm':
						case 'comm_exp':
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str4 .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
						case 'date_rec':
						case 'pay_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str4 .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str4 .= "<td>-</td>";
							}
							break;
						default:
							$table_html_return_str4 .= "<td>$value</td>";
							break;
					}
				}
				$table_html_return_str4 .= "</tr>";
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
		}
        
        //else{
		//	throw new Exception("No relevant records were found.", EXCEPTION_WARNING_CODE);
		//}
	}
    //echo $table_html_return_str1;exit;


	//Activity Boxes:
	if($create_boxes_flag){
    
		//All Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
				WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row               = $result->fetch_assoc();
			$all_commissions = floatval($row['total_commission']);
		} else{
			$all_commissions = 0;
		}
        
        //Trail Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission, rep_no
				FROM trades
				WHERE source LIKE '%1'
				AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";//OR source LIKE '%2'
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row               = $result->fetch_assoc();
			$trail_commissions = floatval($row['total_commission']);
		} else{
			$trail_commissions = 0;
		}

		//Clearing Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
				WHERE (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%')
				AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row                  = $result->fetch_assoc();
			$clearing_commissions = floatval($row['total_commission']);
		} else{ 
			$clearing_commissions = 0;
		}

		//Regular_commissions
        
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
                WHERE source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%'
				AND inv_type!=29 AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row                 = $result->fetch_assoc();
			$regular_commissions   = floatval($row['total_commission']);
			//$regular_commissions = $total_commissions - $clearing_commissions - $trail_commissions;
		} else{
			$regular_commissions = 0;
		}
        
        //Advisory Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission, rep_no
				FROM trades
				WHERE inv_type=29
				AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row               = $result->fetch_assoc();
			$advisory_commissions = floatval($row['total_commission']);
		} else{
			$advisory_commissions = 0;
		}
        
        
        $all_commissions   = number_format($all_commissions, 2);
		$regular_commissions   = number_format($regular_commissions, 2);
		$trail_commissions     = number_format($trail_commissions, 2);
		$clearing_commissions  = number_format($clearing_commissions, 2);
        $advisory_commissions   = number_format($advisory_commissions, 2);
		$boxes_html_return_str = "
                        <div class='col-md-5'>
                            <div class='row'>
                                <div class='col-sm-6' style='cursor: pointer;' id='all_activity' onclick='open_activity_box(this.id);'>
        							<div class='alert rp_section alert-warning1 rp_active'>
        								<strong>All Activity \$$all_commissions</strong>
        							</div>
        						</div>
                                <div class='col-sm-6' style='cursor: pointer;' id='brokerage_commissions' onclick='open_activity_box(this.id);'>
        							<div class='alert rp_section alert-info'>
        								<strong>Brokerage Commissions \$$regular_commissions</strong>
        							</div>
        						</div>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='row'>
        						<div class='col-sm-12' style='cursor: pointer;' id='trail_commissions' onclick='open_activity_box(this.id);'>
        							<div class='alert rp_section alert-info'>
        								<strong>Trail Commissions \$$trail_commissions</strong>
        							</div>
        						</div>
                            </div>
                        </div>
                        <div class='col-md-5'>
                            <div class='row'>
        						<div class='col-sm-6' style='cursor: pointer;' id='clearing_commissions' onclick='open_activity_box(this.id);'>
        							<div class='alert rp_section alert-info'>
        								<strong>Clearing Commissions \$$clearing_commissions</strong>
        							</div>
        						</div>
                                <div class='col-sm-6' style='cursor: pointer;' id='advisory' onclick='open_activity_box(this.id);'>
        							<div class='alert rp_section alert-info'>
        								<strong>Advisory \$$advisory_commissions</strong>
        							</div>
        						</div>
                            </div>
                        </div>
                        <script>
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
                                $('#brokerage_commissions_section').css('display','block');
                                
                                $('#trail_commissions_section').css('display','none');
                                $('#clearing_commissions_section').css('display','none');
                                $('#advisory_section').css('display','none');
                                $('#activity_section').css('display','none');
                                
                            }
                            else if(id=='trail_commissions')
                            {
                                $('#trail_commissions_section').css('display','block');
                                
                                $('#clearing_commissions_section').css('display','none');
                                $('#advisory_section').css('display','none');
                                $('#activity_section').css('display','none');
                                $('#brokerage_commissions_section').css('display','none');
                                
                            }
                            else if(id=='clearing_commissions')
                            {
                                $('#clearing_commissions_section').css('display','block');
                                
                                $('#advisory_section').css('display','none');
                                $('#activity_section').css('display','none');
                                $('#brokerage_commissions_section').css('display','none');
                                $('#trail_commissions_section').css('display','none');
                                
                            }
                            else if(id=='advisory')
                            {
                                $('#advisory_section').css('display','block');
                                
                                $('#activity_section').css('display','none');
                                $('#brokerage_commissions_section').css('display','none');
                                $('#trail_commissions_section').css('display','none');
                                $('#clearing_commissions_section').css('display','none');
                                
                            }
                            else{
                                
                                $('#activity_section').css('display','block');
                                
                                $('#advisory_section').css('display','none');
                                $('#clearing_commissions_section').css('display','none');
                                $('#trail_commissions_section').css('display','none');
                                $('#brokerage_commissions_section').css('display','none');
                            }
                            
                        }
                        </script>
                        ";
	}
//echo '<pre>';print_r($table_html_return_str4);exit;
	$json_obj                                    = new json_obj();
	$json_obj->data_arr['activity_table']        = $table_html_return_str;
    $json_obj->data_arr['brokerage_commissions_table']        = $table_html_return_str1;
    $json_obj->data_arr['trail_commissions_table']        = $table_html_return_str2;
    $json_obj->data_arr['clearing_commissions_table']        = $table_html_return_str3;
    $json_obj->data_arr['advisory_table']        = $table_html_return_str4;
	$json_obj->data_arr['activity_boxes']        = $boxes_html_return_str;
	$json_obj->data_arr['pdf_title_first_line']  = $pdf_title_first_line;
	$json_obj->data_arr['pdf_title_second_line'] = $pdf_title_dates;
	$json_obj->status                            = true;

	return $json_obj;
}*/
 /*function activity_update($post, $create_boxes_flag = true, $create_table_flag = true){
	//Activity table:
    $where_clause = '';//defined change by aksha(27-09-2018)
    $table_html_return_str = '';
    $pdf_title_dates = '';
    $pdf_title_first_line = '';
    $from_date = isset($post['from_date'])?$post['from_date']:'';
    $to_date = isset($post['to_date'])?$post['to_date']:'';
    $boxes_html_return_str = '';
    $all_dates = isset($post['all_dates'])?$post['all_dates']:'';
    $sql_str = '';

	if($create_table_flag){
		if($from_date > $to_date){
			throw new Exception("Start date cannot be after the end date.", EXCEPTION_WARNING_CODE);
		}

		if(isset($post["from_date"]) && isset($post["to_date"]) && $all_dates != 'on'){
			$where_clause     = "AND date > '{$from_date}' AND date < '{$to_date}'";
			$export_from_date = date_format(date_create($from_date), 'm/d/Y');
			$export_to_date   = date_format(date_create($to_date), 'm/d/Y');
			$pdf_title_dates  = "$export_from_date to $export_to_date";
		} else{
			$pdf_title_dates = 'All Trades';
		}

		if($from_date == $to_date && isset($from_date) && isset($post["to_date"]) && isset($post['all_dates'])){
			$from_date = substr_replace($from_date, ' 00:00:00', 10);
			$to_date   = substr_replace($to_date, ' 23:59:59', 10);
		} else{
			$sql_str = "SELECT date, date_rec, clearing, cli_name, invest, cusip_no, net_amt, comm_exp, comm_rec, rep_rate, rep_comm, pay_date
					FROM trades
					WHERE rep_no = {$_SESSION["permrep_obj"]->permRepID}
					$where_clause;";
		}

		$result = db_query($sql_str);
		if($result->num_rows != 0){
			while($row = $result->fetch_assoc()){
				$table_html_return_str .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
						case 'cli_name':
						case 'invest':
						case 'clearing':
						case 'cusip_no':
							$table_html_return_str .= "<td class='text-left'>$value</td>";
							break;
						case 'rep_rate':
							$value                 = number_format(floatval($value) * 100, 2);
							$table_html_return_str .= "<td class='text-right'>$value%</td>";
							break;
						case 'net_amt':
						case 'comm_rec':
						case 'rep_comm':
						case 'comm_exp':
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
						case 'date_rec':
						case 'pay_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str .= "<td>-</td>";
							}
							break;
						default:
							$table_html_return_str .= "<td>$value</td>";
							break;
					}
				}
				$table_html_return_str .= "</tr>";
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->fname)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->lname));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
		} else{
			throw new Exception("No relevant records were found.", EXCEPTION_WARNING_CODE);
		}
	}

	//Activity Boxes:
	if($create_boxes_flag){
    
		//All Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
				WHERE rep_no = {$_SESSION["permrep_obj"]->permRepID}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row               = $result->fetch_assoc();
			$all_commissions = floatval($row['total_commission']);
		} else{
			$all_commissions = 0;
		}
        
        //Trail Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission, rep_no
				FROM trades
				WHERE source LIKE '%1'
				AND rep_no = {$_SESSION["permrep_obj"]->permRepID}
				$where_clause;";//OR source LIKE '%2'
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row               = $result->fetch_assoc();
			$trail_commissions = floatval($row['total_commission']);
		} else{
			$trail_commissions = 0;
		}

		//Clearing Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
				WHERE (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%')
				AND rep_no = {$_SESSION["permrep_obj"]->permRepID}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row                  = $result->fetch_assoc();
			$clearing_commissions = floatval($row['total_commission']);
		} else{ 
			$clearing_commissions = 0;
		}

		//Regular_commissions
        
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
                WHERE source NOT LIKE '%1' and source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%'
				AND inv_type!=29 AND rep_no = {$_SESSION["permrep_obj"]->permRepID}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row                 = $result->fetch_assoc();
			$total_commissions   = floatval($row['total_commission']);
			$regular_commissions = $total_commissions - $clearing_commissions - $trail_commissions;
		} else{
			$regular_commissions = 0;
		}
        
        //Advisory Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission, rep_no
				FROM trades
				WHERE inv_type=29
				AND rep_no = {$_SESSION["permrep_obj"]->permRepID}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row               = $result->fetch_assoc();
			$advisory_commissions = floatval($row['total_commission']);
		} else{
			$advisory_commissions = 0;
		}
        
        
        $all_commissions   = number_format($all_commissions, 2);
		$regular_commissions   = number_format($regular_commissions, 2);
		$trail_commissions     = number_format($trail_commissions, 2);
		$clearing_commissions  = number_format($clearing_commissions, 2);
        $advisory_commissions   = number_format($advisory_commissions, 2);
		$boxes_html_return_str = "
                        <div class='col-md-5'>
                            <div class='row'>
                                <div class='col-sm-6'>
        							<div class='alert alert-info'>
        								<strong>All Activity \$$all_commissions</strong>
        							</div>
        						</div>
                                <div class='col-sm-6'>
        							<div class='alert alert-info'>
        								<strong>Brokerage Commissions \$$regular_commissions</strong>
        							</div>
        						</div>
                            </div>
                        </div>
                        <div class='col-md-2'>
                            <div class='row'>
        						<div class='col-sm-12'>
        							<div class='alert alert-info'>
        								<strong>Trail Commissions \$$trail_commissions</strong>
        							</div>
        						</div>
                            </div>
                        </div>
                        <div class='col-md-5'>
                            <div class='row'>
        						<div class='col-sm-6'>
        							<div class='alert alert-info'>
        								<strong>Clearing Commissions \$$clearing_commissions</strong>
        							</div>
        						</div>
                                <div class='col-sm-6'>
        							<div class='alert alert-info'>
        								<strong>Advisory \$$advisory_commissions</strong>
        							</div>
        						</div>
                            </div>
                        </div>";
	}

	$json_obj                                    = new json_obj();
	$json_obj->data_arr['activity_table']        = $table_html_return_str;
	$json_obj->data_arr['activity_boxes']        = $boxes_html_return_str;
	$json_obj->data_arr['pdf_title_first_line']  = $pdf_title_first_line;
	$json_obj->data_arr['pdf_title_second_line'] = $pdf_title_dates;
	$json_obj->status                            = true;

	return $json_obj;
}*/
/*function activity_update($post, $create_boxes_flag = true, $create_table_flag = true){
	//Activity table:
    $where_clause = '';//defined change by aksha(27-09-2018)
    $table_html_return_str = '';
    $pdf_title_dates = '';
    $pdf_title_first_line = '';
    $from_date = isset($post['from_date'])?$post['from_date']:'';
    $to_date = isset($post['to_date'])?$post['to_date']:'';
    $boxes_html_return_str = '';
    $all_dates = isset($post['all_dates'])?$post['all_dates']:'';
    $sql_str = '';

	if($create_table_flag){
		if($from_date > $to_date){
			throw new Exception("Start date cannot be after the end date.", EXCEPTION_WARNING_CODE);
		}

		if(isset($post["from_date"]) && isset($post["to_date"]) && $all_dates != 'on'){
			$where_clause     = "AND date > '{$from_date}' AND date < '{$to_date}'";
			$export_from_date = date_format(date_create($from_date), 'm/d/Y');
			$export_to_date   = date_format(date_create($to_date), 'm/d/Y');
			$pdf_title_dates  = "$export_from_date to $export_to_date";
		} else{
			$pdf_title_dates = 'All Trades';
		}

		if($from_date == $to_date && isset($from_date) && isset($post["to_date"]) && isset($post['all_dates'])){
			$from_date = substr_replace($from_date, ' 00:00:00', 10);
			$to_date   = substr_replace($to_date, ' 23:59:59', 10);
		} else{
			$sql_str = "SELECT date, date_rec, clearing, cli_name, invest, cusip_no, net_amt, comm_exp, comm_rec, rep_rate, rep_comm, pay_date
					FROM trades
					WHERE rep_no = {$_SESSION["permrep_obj"]->permRepID}
					$where_clause;";
		}

		$result = db_query($sql_str);
		if($result->num_rows != 0){
			while($row = $result->fetch_assoc()){
				$table_html_return_str .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
						case 'cli_name':
						case 'invest':
						case 'clearing':
						case 'cusip_no':
							$table_html_return_str .= "<td class='text-left'>$value</td>";
							break;
						case 'rep_rate':
							$value                 = number_format(floatval($value) * 100, 2);
							$table_html_return_str .= "<td class='text-right'>$value%</td>";
							break;
						case 'net_amt':
						case 'comm_rec':
						case 'rep_comm':
						case 'comm_exp':
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
						case 'date_rec':
						case 'pay_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str .= "<td>-</td>";
							}
							break;
						default:
							$table_html_return_str .= "<td>$value</td>";
							break;
					}
				}
				$table_html_return_str .= "</tr>";
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->fname)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->lname));
				$pdf_title_first_line  = "Transaction Activity for $broker_name";
			}
		} else{
			throw new Exception("No relevant records were found.", EXCEPTION_WARNING_CODE);
		}
	}

	//Activity Boxes:
	if($create_boxes_flag){
    
		//Trail Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission, rep_no
				FROM trades
				WHERE (source LIKE '%1' OR source LIKE '%2')
				AND rep_no = {$_SESSION["permrep_obj"]->permRepID}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row               = $result->fetch_assoc();
			$trail_commissions = floatval($row['total_commission']);
		} else{
			$trail_commissions = 0;
		}

		//Clearing Commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
				WHERE (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%IN%' OR source LIKE '%DN%' OR source LIKE '%FC%' OR source LIKE '%HT%' OR source LIKE '%LG%' OR source LIKE '%PN%' OR source LIKE '%RE%' OR source LIKE '%SW%')
				AND rep_no = {$_SESSION["permrep_obj"]->permRepID}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row                  = $result->fetch_assoc();
			$clearing_commissions = floatval($row['total_commission']);
		} else{
			$clearing_commissions = 0;
		}

		//Regular_commissions
		$sql_str = "SELECT SUM(comm_rec) as total_commission
				FROM trades
				WHERE rep_no = {$_SESSION["permrep_obj"]->permRepID}
				$where_clause;";
		$result  = db_query($sql_str);
		if($result->num_rows != 0){
			$row                 = $result->fetch_assoc();
			$total_commissions   = floatval($row['total_commission']);
			$regular_commissions = $total_commissions - $clearing_commissions - $trail_commissions;
		} else{
			$regular_commissions = 0;
		}

		$regular_commissions   = number_format($regular_commissions, 2);
		$trail_commissions     = number_format($trail_commissions, 2);
		$clearing_commissions  = number_format($clearing_commissions, 2);
		$boxes_html_return_str = "<div class='col-sm-4'>
							<div class='alert alert-info'>
								<strong>Regular Commissions \$$regular_commissions</strong>
							</div>
						</div>
						<div class='col-sm-4'>
							<div class='alert alert-info'>
								<strong>Trail Commissions \$$trail_commissions</strong>
							</div>
						</div>
						<div class='col-sm-4'>
							<div class='alert alert-info'>
								<strong>Clearing Commissions \$$clearing_commissions</strong>
							</div>
						</div>";
	}

	$json_obj                                    = new json_obj();
	$json_obj->data_arr['activity_table']        = $table_html_return_str;
	$json_obj->data_arr['activity_boxes']        = $boxes_html_return_str;
	$json_obj->data_arr['pdf_title_first_line']  = $pdf_title_first_line;
	$json_obj->data_arr['pdf_title_second_line'] = $pdf_title_dates;
	$json_obj->status                            = true;

	return $json_obj;
}*/
function hold_trades_update($post, $create_boxes_flag = true, $create_table_flag = true){//For report page by aksha(29-09-2018)
	//Activity table:
    $where_clause = '';//defined change by aksha(27-09-2018)
    $table_html_return_str = '';
    $pdf_title_dates = '';
    $pdf_title_first_line = '';
    $from_date = isset($post['trade_reports_from_date'])?$post['trade_reports_from_date']:'';
    $to_date = isset($post['trade_reports_to_date'])?$post['trade_reports_to_date']:'';
    $boxes_html_return_str = '';
    $all_dates = isset($post['trade_reports_all_dates'])?$post['trade_reports_all_dates']:'';
    $sql_str = '';
    $total_net_amount='';
    $total_comm_rec='';
    $total_rep_comm='';
    

	if($create_table_flag){
		if($from_date > $to_date){
			throw new Exception("Start date cannot be after the end date.", EXCEPTION_WARNING_CODE);
		}

		if(isset($post["trade_reports_from_date"]) && isset($post["trade_reports_to_date"]) && $all_dates != 'on'){
			$where_clause     = "AND date >= '{$from_date}' AND date <= '{$to_date}'";
			$export_from_date = date_format(date_create($from_date), 'm/d/Y');
			$export_to_date   = date_format(date_create($to_date), 'm/d/Y');
			$pdf_title_dates  = "$export_from_date to $export_to_date";
		} else{
			$pdf_title_dates = 'All Trades';
		}

		if($from_date == $to_date && isset($from_date) && isset($post["trade_reports_to_date"]) && isset($post['trade_reports_all_dates'])){
			$from_date = substr_replace($from_date, ' 00:00:00', 10);
			$to_date   = substr_replace($to_date, ' 23:59:59', 10);
		} else{
			$sql_str = "SELECT date, date_rec, clearing, cli_name, invest, cusip_no, net_amt, comm_rec, rep_rate, rep_comm, pay_date, HOLDREASON
					FROM trades
					WHERE hold=1 and rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause;";
        }

		$result = db_query($sql_str);
		if($result->num_rows != 0){
			while($row = $result->fetch_assoc()){
				$table_html_return_str .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
						case 'cli_name':
						case 'clearing':
						case 'cusip_no':
							$table_html_return_str .= "<td class='text-left'>$value</td>";
							break;
      	                case 'invest':
							$table_html_return_str .= "<td class='text-left'>$value</td>";
                            break;
						case 'rep_rate':
							$value                 = number_format(floatval($value) * 100, 2);
							$table_html_return_str .= "<td class='text-right'>$value%</td>";
							break;
						case 'net_amt':
                            $total_net_amount = $total_net_amount+$value;
                            $formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'comm_rec':
                            $total_comm_rec = $total_comm_rec+$value;
                            $formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'rep_comm':
						    $total_rep_comm = $total_rep_comm+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'date':
						case 'date_rec':
						case 'pay_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str .= "<td data-order='$value_timestamp' class='text-left'>$value</td>";
							} else{
								$table_html_return_str .= "<td>-</td>";
							}
							break;
						default:
							$table_html_return_str .= "<td>$value</td>";
							break;
					}
				}
				$table_html_return_str .= "</tr>";
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Transaction On Hold for $broker_name";
			}
            $table_html_return_str .= "<tr>";
			         $formatted_total_net                 = number_format(floatval($total_net_amount), 2);
                     $formatted_total_comm_rec                 = number_format(floatval($total_comm_rec), 2);
                     $formatted_total_rep_comm                 = number_format(floatval($total_rep_comm), 2);
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td class='text-right'><b>Total Principal: </b>\$$formatted_total_net</td>";
                     $table_html_return_str .= "<td class='text-right'><b>Total Received: </b>\$$formatted_total_comm_rec</td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td class='text-right'><b>Total Paid: </b>\$$formatted_total_rep_comm</td>";
					 $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
			$table_html_return_str .= "</tr>";
            //print_r($sql_str);exit;
		}
	}
    //print_r($table_html_return_str);exit;

    $json_obj                                    = new json_obj();
	$json_obj->data_arr['trade_reports_table']        = $table_html_return_str;
	$json_obj->data_arr['pdf_title_first_line']  = $pdf_title_first_line;
	$json_obj->data_arr['pdf_title_second_line'] = $pdf_title_dates;
	$json_obj->status                            = true;

	return $json_obj;
}
function ytd_earnings($post, $create_boxes_flag = true, $create_table_flag = true){//For report page by aksha(04-10-2018)
	//Activity table:
    $where_clause = ' AND YEAR(pay_date) = YEAR(CURDATE())';//defined change by aksha(27-09-2018)
    $table_html_return_str = '';
    $pdf_title_dates = '';
    $pdf_title_first_line = '';
    $from_date = isset($post['ytd_earnings_from_date'])?$post['ytd_earnings_from_date']:'';
    $to_date = isset($post['ytd_earnings_to_date'])?$post['ytd_earnings_to_date']:'';
    $boxes_html_return_str = '';
    $all_dates = isset($post['ytd_earnings_all_dates'])?$post['ytd_earnings_all_dates']:'';
    $sql_str = '';
    $total_check_amount = '';
    $total_gross_amount = '';

	if($create_table_flag){
		if($from_date > $to_date){
			throw new Exception("Start date cannot be after the end date.", EXCEPTION_WARNING_CODE);
		}

		if(isset($post["ytd_earnings_from_date"]) && isset($post["ytd_earnings_to_date"]) && $all_dates != 'on'){
			$where_clause     = "AND pay_date >= '{$from_date}' AND pay_date <= '{$to_date}'";
			$export_from_date = date_format(date_create($from_date), 'm/d/Y');
			$export_to_date   = date_format(date_create($to_date), 'm/d/Y');
			$pdf_title_dates  = "$export_from_date to $export_to_date";
		}
        else{
			$pdf_title_dates = 'Current Year Payrolls';
		}
        /*else if($all_dates == 'on'){
            $where_clause = ' AND YEAR(pay_date) = YEAR(CURDATE())';
            $pdf_title_dates = 'Current Year Payrolls';
        }
        else{
			$pdf_title_dates = 'All Payrolls';
		}*/

		if($from_date == $to_date && isset($from_date) && isset($post["ytd_earnings_to_date"]) && isset($post['ytd_earnings_all_dates'])){
			$from_date = substr_replace($from_date, ' 00:00:00', 10);
			$to_date   = substr_replace($to_date, ' 23:59:59', 10);
		} else{
			$sql_str = "SELECT pay_date as payroll_date,CHECK_NO as check_no, frep_gross as gross_amount,pay_total as check_amount 
					FROM `1099`
					WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause;";
        }

		$result = db_query($sql_str);
		if($result->num_rows != 0){
			while($row = $result->fetch_assoc()){
				$table_html_return_str .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
					    case 'payroll_date':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str .= "<td data-order='$value_timestamp' class='text-right'>$value</td>";
							} else{
								$table_html_return_str .= "<td>-</td>";
							}
							break;
						case 'check_amount':
                            $total_check_amount = $total_check_amount+$value;
                            $formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						case 'gross_amount':
                            $total_gross_amount = $total_gross_amount+$value;
							$formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						
						default:
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>$value</td>";
							break;
					}
				}
				$table_html_return_str .= "</tr>";
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Year to Date Earnings for $broker_name";
			}
            $table_html_return_str .= "<tr>";
			         $formatted_total_value                 = number_format(floatval($total_check_amount), 2);
                     $formatted_total_gross                 = number_format(floatval($total_gross_amount), 2);
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td class='text-right'><b>Total Gross Amount: </b>\$$formatted_total_gross</td>";
					 $table_html_return_str .= "<td class='text-right'><b>Total Check Amount: </b>\$$formatted_total_value</td>";
			$table_html_return_str .= "</tr>";
            //print_r($sql_str);exit;
		}
	}
    //print_r($table_html_return_str);exit;

    $json_obj                                    = new json_obj();
	$json_obj->data_arr['ytd_earnings_reports_table']        = $table_html_return_str;
	$json_obj->data_arr['pdf_title_first_line']  = $pdf_title_first_line;
	$json_obj->data_arr['pdf_title_second_line'] = $pdf_title_dates;
	$json_obj->status                            = true;

	return $json_obj;
}
function adjustments($post, $create_boxes_flag = true, $create_table_flag = true){//For report page by aksha(07-02-2019)
	//Adjustments table:
    $where_clause = '';
    $table_html_return_str = '';
    $pdf_title_dates = '';
    $pdf_title_first_line = '';
    $from_date = isset($post['adjustments_from_date'])?$post['adjustments_from_date']:'';
    $to_date = isset($post['adjustments_to_date'])?$post['adjustments_to_date']:'';
    $boxes_html_return_str = '';
    $all_dates = isset($post['adjustments_all_dates'])?$post['adjustments_all_dates']:'';
    $sql_str = '';
    $total_amount = '';

	if($create_table_flag){
		if($from_date > $to_date){
			throw new Exception("Start date cannot be after the end date.", EXCEPTION_WARNING_CODE);
		}

		if(isset($post["adjustments_from_date"]) && isset($post["adjustments_to_date"]) && $all_dates != 'on'){
			$where_clause     = "AND DATE >= '{$from_date}' AND DATE <= '{$to_date}'";
			$export_from_date = date_format(date_create($from_date), 'm/d/Y');
			$export_to_date   = date_format(date_create($to_date), 'm/d/Y');
			$pdf_title_dates  = "$export_from_date to $export_to_date";
		}
        else{
			$pdf_title_dates = 'All Adjustments';
		}

		if($from_date == $to_date && isset($from_date) && isset($post["adjustments_to_date"]) && isset($post['adjustments_all_dates'])){
			$from_date = substr_replace($from_date, ' 00:00:00', 10);
			$to_date   = substr_replace($to_date, ' 23:59:59', 10);
		} else{
			$sql_str = "SELECT DATE,PAY_DATE,ACCOUNT,CATEGORY,DESCRIPT,(NON_1099+ADJUST+ADVANCE) AS total_adjustments
					FROM `adjust`
					WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause;";
        }

		$result = db_query($sql_str);
		if($result->num_rows != 0){
			while($row = $result->fetch_assoc()){
				$table_html_return_str .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
					    case 'DATE':
                        case 'PAY_DATE':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str .= "<td data-order='$value_timestamp' class='text-right'>$value</td>";
							} else{
								$table_html_return_str .= "<td>-</td>";
							}
							break;
						case 'total_adjustments':
                            $total_amount = $total_amount+$value;
                            $formatted_value                 = number_format(floatval($value), 2);
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>\$$formatted_value</td>";
							break;
						default:
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-left'>$value</td>";
							break;
					}
				}
				$table_html_return_str .= "</tr>";
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Adjustments for $broker_name";
			}
            $table_html_return_str .= "<tr>";
			         $formatted_total_value                 = number_format(floatval($total_amount), 2);
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
                     $table_html_return_str .= "<td></td>";
					 $table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'><b>Total Amount: </b>\$$formatted_total_value</td>";
			$table_html_return_str .= "</tr>";
        }
	}
    //print_r($table_html_return_str);exit;

    $json_obj                                    = new json_obj();
	$json_obj->data_arr['adjustments_reports_table']        = $table_html_return_str;
	$json_obj->data_arr['pdf_title_first_line']  = $pdf_title_first_line;
	$json_obj->data_arr['pdf_title_second_line'] = $pdf_title_dates;
	$json_obj->status                            = true;

	return $json_obj;
}
function client_account_list($post, $create_boxes_flag = true, $create_table_flag = true){//For report page by aksha(04-10-2018)
	//Activity table:
    $where_clause = '';//' AND MONTH(LAST_TRADE) = MONTH(CURDATE()) AND YEAR(LAST_TRADE) = YEAR(CURDATE())';//defined change by aksha(27-09-2018)
    $table_html_return_str = '';
    $pdf_title_dates = '';
    $pdf_title_first_line = '';
    $from_date = isset($post['client_account_list_from_date'])?$post['client_account_list_from_date']:'';
    $to_date = isset($post['client_account_list_to_date'])?$post['client_account_list_to_date']:'';
    $boxes_html_return_str = '';
    $all_dates = isset($post['client_account_list_all_dates'])?$post['client_account_list_all_dates']:'';
    $sql_str = '';

	if($create_table_flag){
		if($from_date > $to_date){
			throw new Exception("Start date cannot be after the end date.", EXCEPTION_WARNING_CODE);
		}

		if(isset($post["client_account_list_from_date"]) && isset($post["client_account_list_to_date"]) && $all_dates != 'on'){
			$where_clause     = "AND LAST_TRADE >= '{$from_date}' AND LAST_TRADE <= '{$to_date}'";
			$export_from_date = date_format(date_create($from_date), 'm/d/Y');
			$export_to_date   = date_format(date_create($to_date), 'm/d/Y');
			$pdf_title_dates  = "$export_from_date to $export_to_date";
		} else{
			$pdf_title_dates = 'All Clients Account List of Current Month';
		}

		if($from_date == $to_date && isset($from_date) && isset($post["client_account_list_to_date"]) && isset($post['client_account_list_all_dates'])){
			$from_date = substr_replace($from_date, ' 00:00:00', 10);
			$to_date   = substr_replace($to_date, ' 23:59:59', 10);
		} else{
			$sql_str = "SELECT CONCAT(LNAME, ', ', FNAME) as client_name, CLI_NO as client_no, CONCAT(ADDRESS, ' ', CITY, ', ', STATE, ' ', ZIP) as address, PHONE, DATE as open_date, BIRTH_DATE, LAST_TRADE
					FROM `clients`
					WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause order by open_date desc;";
        }

		$result = db_query($sql_str);
		if($result->num_rows != 0){
			while($row = $result->fetch_assoc()){
				$table_html_return_str .= "<tr>";
				foreach($row as $col => $value){
					switch($col){
					    case 'address':
                            if($value == ' ,  ')
                            {
                                $table_html_return_str .= "<td>-</td>";
                            }else{
                                $table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-left'>$value</td>";
                            }
                            break;
					    case 'client_no':
                            $first5char             = substr($value,0,5);
                            $value                  = str_replace($first5char,"XXXXX",$value);
                            $table_html_return_str .= "<td class='text-left'>$value</td>";
							break;
					    case 'open_date':
					    case 'BIRTH_DATE':
                        case 'LAST_TRADE':
							if($value != null && $value != '0000-00-00 00:00:00'){
								$value_timestamp = strtotime($value);
								$value                 = date('m/d/Y', $value_timestamp);
								$table_html_return_str .= "<td data-order='$value_timestamp' class='text-right'>$value</td>";
							} else{
								$table_html_return_str .= "<td>-</td>";
							}
							break;
                        case 'PHONE':
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-right'>$value</td>";
							break;
						default:
							$table_html_return_str .= "<td data-search='$value' data-order='$value' class='text-left'>$value</td>";
							break;
					}
				}
				$table_html_return_str .= "</tr>";
				$broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
				$pdf_title_first_line  = "Client Account List";
			}
            //print_r($sql_str);exit;
		}
	}
    //print_r($table_html_return_str);exit;

    $json_obj                                    = new json_obj();
	$json_obj->data_arr['client_account_list_table']        = $table_html_return_str;
	$json_obj->data_arr['pdf_title_first_line']  = $pdf_title_first_line;
	$json_obj->data_arr['pdf_title_second_line'] = $pdf_title_dates;
	$json_obj->status                            = true;

	return $json_obj;
}
function current_licensing_header(){//For current licence dynemic category header by aksha(04-10-2018)
	
	    $table_html_return_str = '';
        $table_html_return_str = "<th>STATES</th>";
        $order_by = '';
        
        if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True'){
            $order_by = " order by sort_order asc";
        }
        $sql_str = "SELECT product,abbrev FROM `prodtype` $order_by";
        $result = db_query($sql_str);
        if($result->num_rows != 0){
			while($row = $result->fetch_assoc()){
			     if($row['abbrev'] == 'LP')
                 {
                    $value = isset($row['product'])?$row['product']:'';
			        $table_html_return_str .= "<th>$value</th>";
    			 }
                 else if($row['abbrev'] == 'MF')
                 {
                    $value = isset($row['product'])?$row['product']:'';
			        $table_html_return_str .= "<th>$value</th>";
                 }
                 else if($row['abbrev'] == 'S')
                 {
                    $value = isset($row['product'])?$row['product']:'';
			        $table_html_return_str .= "<th>$value</th>";
                 }
                 else if($row['abbrev'] == 'VA')
                 {
                    $value = isset($row['product'])?$row['product']:'';
			        $table_html_return_str .= "<th>$value</th>";
                 }
                 else if($row['abbrev'] == 'FA')
                 {
                    $value = isset($row['product'])?$row['product']:'';
			        $table_html_return_str .= "<th>$value</th>";
                 }
                 else if($row['abbrev'] == 'L')
                 {
                    $value = isset($row['product'])?$row['product']:'';
			        $table_html_return_str .= "<th>$value</th>";
                 }
                 else if($row['abbrev'] == 'RIA')
                 {
                    $value = isset($row['product'])?$row['product']:'';
			        $table_html_return_str .= "<th>$value</th>";
                 }
            }
            //print_r($sql_str);exit;
		} else{
			throw new Exception("No relevant records were found.", EXCEPTION_WARNING_CODE);
		}
	
    //print_r($table_html_return_str);exit;

    $json_obj                                    = new json_obj();
	$json_obj->data_arr['current_licensing_header']= $table_html_return_str;
	$json_obj->status                            = true;

	return $json_obj;
}
function current_licensing($post, $create_boxes_flag = true, $create_table_flag = true){//For current licensing page by aksha(04-10-2018)
	//Activity table:
    $where_clause = '';//defined change by aksha(04-10-2018)
    $table_html_return_str = '';
    $pdf_title_dates = '';
    $pdf_title_first_line = '';
    $boxes_html_return_str = '';
    $sql_str = '';

	if($create_table_flag){
		
		$sql_str = "SELECT stateid,statename
				FROM states";
        $result = db_query($sql_str);
		if($result->num_rows != 0){
			while($row = $result->fetch_assoc()){
				$table_html_return_str .= "<tr>";
                $state_name = isset($row['statename'])?$row['statename']:'';
                $state_id = isset($row['stateid'])?$row['stateid']:'';
                
                $sql_str_ = "SELECT *
					FROM permrep
					WHERE REP_NO = {$_SESSION["permrep_obj"]->REP_NO}";
				$result_ = db_query($sql_str_);
        		if($result_->num_rows != 0){
        			while($row_ = $result_->fetch_assoc()){
        			 
                     $lp_states = isset($row_['LP_STATES'])?substr($row_['LP_STATES'],$state_id-1,1):'';
                     $mut_states = isset($row_['MUT_STATES'])?substr($row_['MUT_STATES'],$state_id-1,1):'';
                     $sec_states = isset($row_['SEC_STATES'])?substr($row_['SEC_STATES'],$state_id-1,1):'';
                     $va_states = isset($row_['VA_STATES'])?substr($row_['VA_STATES'],$state_id-1,1):'';
                     $fa_states = isset($row_['FA_STATES'])?substr($row_['FA_STATES'],$state_id-1,1):'';
                     $l_states = isset($row_['L_STATES'])?substr($row_['L_STATES'],$state_id-1,1):'';
                     $ria_states = isset($row_['RIA_STATES'])?substr($row_['RIA_STATES'],$state_id-1,1):'';
                     
                     $table_html_return_str .= "<td style='text-left'>$state_name</td>";
                     
                     if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True'){
                         if($ria_states==1)
                         {
                            $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'><img src='check-mark-3-black.png' height='15px;' width='15px;'></td>";
                         }
                         else
                         {
                            $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'></td>";
                         }
                     }
                     if($lp_states==1)
                     {
                        $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'><img src='check-mark-3-black.png' height='15px;' width='15px;'></td>";
                     }
                     else
                     {
                        $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'></td>";
                     }
                     if($mut_states==1)
                     {
                        $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'><img src='check-mark-3-black.png' height='15px;' width='15px;'></td>";
                     }
                     else
                     {
                        $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'></td>";
                     }
                     if($sec_states==1)
                     {
                        $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'><img src='check-mark-3-black.png' height='15px;' width='15px;'></td>";
                     }
                     else
                     {
                        $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'></td>";
                     }
                     if($va_states==1)
                     {
                        $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'><img src='check-mark-3-black.png' height='15px;' width='15px;'></td>";
                     }
                     else
                     {
                        $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'></td>";
                     }
                     if($fa_states==1)
                     {
                        $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'><img src='check-mark-3-black.png' height='15px;' width='15px;'></td>";
                     }
                     else
                     {
                        $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'></td>";
                     }
                     if($l_states==1)
                     {
                        $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'><img src='check-mark-3-black.png' height='15px;' width='15px;'></td>";
                     }
                     else
                     {
                        $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'></td>";
                     }
                     if(!isset($_SESSION['advisory']) || $_SESSION['advisory']!='True'){
                         if($ria_states==1)
                         {
                            $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'><img src='check-mark-3-black.png' height='15px;' width='15px;'></td>";
                         }
                         else
                         {
                            $table_html_return_str .= "<td style='text-align:center;font-size:100%;font-weight:bold;'></td>";
                         }
                     }
        			 
        			}
                }
                $table_html_return_str .= "</tr>";
            }
            $broker_name           = ucfirst(strtolower($_SESSION['permrep_obj']->FNAME)).' '.ucfirst(strtolower($_SESSION['permrep_obj']->LNAME));
            $pdf_title_first_line  = "Current Licencing for $broker_name";
            
		} else{
			throw new Exception("No relevant records were found.", EXCEPTION_WARNING_CODE);
		}
	}

    $json_obj                                    = new json_obj();
	$json_obj->data_arr['current_licensing_reports_table']        = $table_html_return_str;
	$json_obj->data_arr['pdf_title_first_line']  = $pdf_title_first_line;
    //$json_obj->data_arr['pdf_title_second_line'] = $pdf_title_dates;
	$json_obj->status                            = true;

	return $json_obj;
}
function configuration_update($post){
    
    $display_trail_commission = isset($post['display_trail_commission'])?$post['display_trail_commission']:0;
    $display_licenses_report = isset($post['display_licenses_report'])?$post['display_licenses_report']:0;
    
    $qry_trun = "TRUNCATE TABLE `configuration`";
    $re_trun = db_query($qry_trun);
    
    $query = "insert into configuration set display_trail_commission='".$display_trail_commission."',display_licenses_report='".$display_licenses_report."'";
    $result = db_query($query);
    
    $json_obj                                    = new json_obj();
    if($result){
		$json_obj->status = true;

		return $json_obj;
	} else{
		throw new Exception("Something went wrong, Please try again.", EXCEPTION_DANGER_CODE);
	}
}
function get_configuration(){
    $return = array();
    
    $sql_str = "SELECT * FROM configuration;";
	$result  = db_query($sql_str);
            
	if($result->num_rows != 0){ //in case there is an existing permrep with this username or email
		while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
			$return = $row;
        }
        return $return;
	}
}
/**
 * Updates the reports charts and table
 * @param $post
 * @return string
 * @throws exception
 */
function reports_update($post){
	$json_obj                              = pie_chart_data_and_labels('dashboard_pie_chart', $post);
	$json_obj->data_arr['line_chart_data'] = line_chart_data_and_labels($post);

	return $json_obj;
}

/**
 * Gets a date and returns the comm_rec sum to this date.
 * @param $post
 * @return string
 * @throws exception
 */
function dashboard_update($post){
	$json_obj                                = pie_chart_data_and_labels('dashboard_pie_chart', $post);
	$json_obj->data_arr['posted_commission'] = dashboard_posted_commissions($post["to_date"]);

	return $json_obj;
}
function change_profile($file){
    
    $sql_str_ = "SELECT * FROM broker_profile where broker_id='".$_SESSION['permrep_obj']->REP_NO."'";
	$result_  = db_query($sql_str_);
    
    if($result_->num_rows > 0){
        $sql_str = "update broker_profile set image='".$file."' where broker_id='".$_SESSION['permrep_obj']->REP_NO."'";
    	$result  = db_query($sql_str);
    }else{
        $sql_str = "insert into broker_profile set image='".$file."',broker_id='".$_SESSION['permrep_obj']->REP_NO."'";
	    $result  = db_query($sql_str);
    }
    if($result){
		return true;
	} else{
		return false;
	}
}
function get_broker_profile(){
    $return = array();
    
    $sql_str = "SELECT * FROM broker_profile where broker_id='".$_SESSION['permrep_obj']->REP_NO."'";
	$result  = db_query($sql_str);
            
	if($result->num_rows != 0){ //in case there is an existing permrep with this username or email
		while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
			$return = $row;
        }
        return $return;
	}
}
function catch_doc_first_load_exception($e, $container_id){
	$add_class    = ($e->getCode() == 0) ? 'alert-warning' : 'alert-danger';
	$remove_class = ($e->getCode() == 0) ? 'alert-danger' : 'alert-warning';

	echo "<script type='text/javascript'>
			$( document ).ready( function(){
				$( '#$container_id .server_response_div .alert' ).removeClass('$remove_class').addClass( '$add_class' ).text('{$e->getMessage()}').show();
			});
		</script>";
}
