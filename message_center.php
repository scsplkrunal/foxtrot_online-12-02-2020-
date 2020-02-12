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
					<?php echo ucfirst('Message Center') ?>
				</h2>
			</div>
            <form>
			<div class="row">
				<div class="col-md-6">
					<div class="server_response_div mt-2">
						<div class="alert" role="alert"></div>
					</div>
                    <div class="row">
                        <label class="h6">Topic</label><br>
                        <input name="topic" id="topic" type="text" class="form-control" value="" max="25">
                    </div>
                    <div class="row">
                        <label class="h6">Subject</label><br>
                        <input name="subject" id="subject" type="text" class="form-control" value="" max="25">
                    </div>
                    <div class="row">
                        <label class="h6">Message</label><br>
                        <textarea name="message" id="message" class="form-control" maxlength="255"></textarea>
                    </div>
                    <div class="row">
                        <label class="h6">Attachment</label><br>
                        <textarea name="attachment" id="attachment" class="form-control" maxlength="255"></textarea>
                    </div>
					<div style="margin-top: 20px;">
						<a class="statement_toolbar" href="none"><button class="btn btn-sm btn-outline-secondary" type="button">Save</button></a>
					</div>
				</div>
            </div>
            </form>
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