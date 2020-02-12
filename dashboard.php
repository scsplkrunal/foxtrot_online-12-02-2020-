<?php
require_once 'header.php';
?>

<html lang="en">
<head>
	<?php
	echo HEAD;
	?>
</head>
<?php 
$chart_default_selection = get_chart_selection();
?>
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
				<h2>Dashboard</h2>
			</div>
			<div class="card" style="margin-bottom: 0.75rem">
				<div class="card-header">
                    <?php if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
                    {?>
                        <h4 class="card-title mb-0">Gross Fees Received Payroll-To-Date</h4>
                    <?php }else{?>
                        <h4 class="card-title mb-0">Gross Commissions Received Payroll-To-Date</h4>
                    <?php } ?>
				</div>
				<div class="card-body">
					<h5 class="card-subtitle mb-2" id="posted_commission_heading">
						<?php
						echo dashboard_posted_commissions();
						?>
					</h5>
					<form id="dashboard_form" class="dates_form mb-0">
						<div class="server_response_div">
							<div class="alert" role="alert"></div>
						</div>
                        <?php 
                        if(isset($_GET['profile']) && $_GET['profile']=='1')
                        {?>
                            <script>
                            $( ".server_response_div .alert" ).removeClass( 'alert-warning alert-danger' ).addClass( 'alert-success' ).text( 'Profile updated successfully.' ).show();
                            window.setTimeout(function() {
            					$(".alert-success, .alert-danger, .alert-warning").slideUp();
            				}, 4000);
                            </script>
                        <?php }?>
                        <?php
                        if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
                        {?>
                            <label>Activity through Payroll Cutoff Date:</label>
					    <?php }else{ ?>
                            <label>Transactions through Payroll Cutoff Date:</label>
					    <?php } ?>
						<input type="date" name="to_date" required>
						<script type="text/javascript">
							var now = new Date();
							var day = ("0" + now.getDate()).slice( -2 );
							var month = ("0" + (now.getMonth() + 1)).slice( -2 );
							var today = now.getFullYear() + "-" + (month) + "-" + (day);
							$( "#dashboard_form input[type=date]" ).val( today );
						</script>
						<input class="btn btn-primary ml-sm-2" type="submit" value="Refresh" required>
						<input name="class" value="no_class" hidden>
						<input name="func" value="dashboard_update" hidden>
					</form>
				</div>
			</div>
			<div class="card-deck mb-3">
				<div class="card">
					<div class="card-header">
                        <?php if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
                        {?>
                            <h4 class="card-title mb-0">Gross Fees By Top 5 Clients</h4>
                        <?php }else{?>
                            <h4 class="card-title mb-0">Gross Commissions By Product Category</h4>
                        <?php } ?>
					</div>
					<div class="card-body" style="height: 300px;">
						<?php
						try{
							$json_obj       = pie_chart_data_and_labels('dashboard_pie_chart');
							$pie_chart_data = $json_obj->data_arr['pie_chart_data'];
							echo "<script type='text/javascript'>
									var pie_chart_data = $pie_chart_data;
								</script>";
						}catch(Exception $e){
							catch_doc_first_load_exception($e, 'dashboard_form');
						}

						?>
						<canvas id="dashboard_pie_chart"></canvas>
						<script type="text/javascript" chart_id="dashboard_pie_chart" src="pie_chart_no_data.js"
						        ></script>
						<script type="text/javascript">
                            var pie_charts_arr = [];
							pie_charts_arr.push( pie_chart );
							pie_charts_arr[0].data = pie_chart_data;
							pie_charts_arr[0].options.title = {
								display: true,
								fontSize: 14,
								text: "Payroll To Date"
							};
							pie_charts_arr[0].update();
						</script>
					</div>
					<div class="card-footer text-muted">
						Click on chart for details
					</div>
				</div>
				<div class="card d-none d-lg-block">
					<div class="card-header">
                        <?php if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
                        {?>
                            <h4 class="card-title mb-0">Most Recent Statement</h4>
                        <?php }else{?>
                       	    <h4 class="card-title mb-0">Commission Statement</h4>
					    <?php } ?>
					</div>
					<div class="card-body">
						<!--<object id="statement_pdf_object" data="none" type="application/pdf" height="260px"  width="100%"></object>-->
                        <iframe class="col-md-9" id="statement_pdf_object" type="application/pdf" height="260px" width="100%" frameborder="0" scrolling="no" style="max-width: 100%;">
                        </iframe>
						<?php
						$x = statement::statements_list("{$_SESSION['company_name']}/data"); //x doesn't matter, initial the function for $_SESSION['first_statement_url']
						echo statement::statement_buttons_pdf_url_changer();
						?>
					</div>
					<div class="card-footer text-muted">
						Hover mouse to download or print
					</div>
				</div>

			</div>
			<div class="card-deck mb-5 pb-2">
				<div class="card">
					<div class="card-header">
                        <?php if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
                        {?>
                            <h4 class="card-title mb-0">Net Fees by Month</h4>
                        <?php }else{?>
                       	    <h4 class="card-title mb-0">Commissions Received by Firm</h4>
					    <?php } ?>
					</div>
					<div class="card-body" id="net_commission_graph">
						<form id="dashboard_time_period_form" class="dates_form col-md-12">
							<div class="server_response_div">
								<div class="alert" role="alert"></div>
							</div>
							<label>Date:</label>
							<select id="time_periods_select" name="time_period" class="mr-2">
								<option value="Previous 12 Months" <?php if($chart_default_selection == 'Previous 12 Months'){echo 'selected="selected"';}?>>Previous 12 Months</option>
                                <option value="Year to Date" <?php if($chart_default_selection == 'Year to Date'){echo 'selected="selected"';}?>>Year to Date</option>
								<option value="Month to Date" <?php if($chart_default_selection == 'Month to Date'){echo 'selected="selected"';}?>>Month to Date</option>
								<!--<option value="Last Year">Last Year</option>-->
								<option value="Last Month" <?php if($chart_default_selection == 'Last Month'){echo 'selected="selected"';}?>>Last Month</option>
                                <option value="Year Over Year Gross" <?php if($chart_default_selection == 'Year Over Year Gross'){echo 'selected="selected"';}?>>Year Over Year Gross</option>
                                <option value="Year to Date Gross Comparison" <?php if($chart_default_selection == 'Year to Date Gross Comparison'){echo 'selected="selected"';}?>>Year to Date Gross Comparison</option>
 						 `   </select>
							<input name="choose_date_radio" value="date" hidden>
							<input name="choose_pay_radio" value="rep_comm" hidden>
							<input name="class" value="no_class" hidden>
							<input name="func" value="reports_update" hidden>
						</form>
						<?php
    						try{
    							$chart_data = json_decode(line_chart_data_and_labels(['time_period' => $chart_default_selection]),true);
                                $chart_type = $chart_data['chart_type'];                                
                                $line_chart_data = json_encode($chart_data['chart_data']);
                                if(isset($chart_default_selection) && ($chart_default_selection=='Year to Date Gross Comparison' || $chart_default_selection=='Year Over Year Gross'))
                                {
                                    echo "<script type='text/javascript'>
    									var chart_title = 'Commissions Received by Firm';
                                    </script>";
                                }
                                else
                                {
                                    echo "<script type='text/javascript'>
    									var chart_title = 'Net Commission';
                                    </script>";
                                }
    							echo "<script type='text/javascript'>
    									var line_chart_data = $line_chart_data;
                                    </script>";
    						}catch(Exception $e){
    							catch_doc_first_load_exception($e, 'dashboard_time_period_form');
    						}
						?>
						    <canvas id="dashboard_bar_chart" style="<?php if(isset($chart_type) && $chart_type == 'line' && $chart_default_selection!='Year to Date Gross Comparison'){echo "display:none;";}?>"></canvas>
                            <script type="text/javascript" src="bar_chart_no_data.js"
    						        chart_id="dashboard_bar_chart">
                            </script>
                            <script type="text/javascript">
    							bar_chart.data = line_chart_data;
    							bar_chart.options.title = {
    								display: true,
    								fontSize: 14,
    								text: chart_title
    							};
    							bar_chart.update();
    						</script>
                            <canvas id="dashboard_line_chart" style="<?php if(isset($chart_type) && $chart_type == 'bar' && $chart_default_selection=='Year to Date Gross Comparison'){echo "display:none;";}?>"></canvas>
                            <script type="text/javascript" src="line_chart_no_data.js"
    						        chart_id="dashboard_line_chart">
                            </script>
    						<script type="text/javascript">
    							line_chart.data = line_chart_data;
    							line_chart.options.title = {
    								display: true,
    								fontSize: 14,
    								text: chart_title
    							};
    							line_chart.update();
    						</script>
                    </div>
					<div class="card-footer text-muted">
						Choose from the list to change the time period
					</div>
				</div>
				<div class="card">
					<div class="card-header">
                        <?php if(isset($_SESSION['advisory']) && $_SESSION['advisory']=='True')
                        {?>
                            <h4 class="card-title mb-0">Top 10 Products</h4>
                        <?php }else{?>
                        	<h4 class="card-title mb-0">Top 10 Vendors</h4>
					    <?php } ?>
					</div>
					<div class="card-body">
                    
                        <!--change by vishva 12/11/2018  2:55PM-->
                        
                        <form id="co_dashboard_time_period_form" class="dates_form col-md-12">
							<div class="server_response_div">
								<div class="alert" role="alert"></div>
							</div>
							<label>Date:</label>
							<select id="co_time_periods_select" name="co_time_period" class="mr-2">
								<option value="Previous 12 Months" <?php if($chart_default_selection == 'Previous 12 Months'){echo 'selected="selected"';}?>>Previous 12 Months</option>
                                <option value="Year to Date" <?php if($chart_default_selection == 'Year to Date'){echo 'selected="selected"';}?>>Year to Date</option>
								<option value="Month to Date" <?php if($chart_default_selection == 'Month to Date'){echo 'selected="selected"';}?>>Month to Date</option>
								<!--<option value="Last Year">Last Year</option>-->
								<option value="Last Month" <?php if($chart_default_selection == 'Last Month'){echo 'selected="selected"';}?>>Last Month</option>
 						 `  </select>
							<input name="choose_date_radio" value="date" hidden>
							<input name="choose_pay_radio" value="rep_comm" hidden>
							<input name="class" value="no_class" hidden>
							<input name="func" value="dashboard_top_sponsors" hidden>
						</form>
                    
						<div style="min-height: 300px" id="sponsor_table" class="table-responsive">
							<?php
                                 try
                                    {
                                     $json_obj = dashboard_top_sponsors(['co_time_period' => $chart_default_selection]);
                                     echo $json_obj->data_arr['sponsor_table'];
			                        }
                                catch(Exception $e)
                                    {
                						catch_doc_first_load_exception($e, 'co_dashboard_time_period_form');
                					}
        					?>
						</div>
					</div>
					<div class="card-footer text-muted">
						Top sponsers on gross commission
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="drill_down_pie_chart_modal" tabindex="-1" role="dialog"
			     aria-hidden="true">
				<div class="modal-dialog" role="document" style="max-width: 1000px !important;">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title pie_chart_modal_title" id="forgot_password_modal_title">Trades list</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div id="drill_down_table_div" class="modal-body"></div>
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