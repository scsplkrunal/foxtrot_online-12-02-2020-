<?php
    require_once 'header.php';

    $return = array();
    $rep_no = isset($_GET['supervisor_broker_id'])?$_GET['supervisor_broker_id']:'';
    
    if($rep_no == 'ADM_1')
    {
        $rep_no = str_replace("ADM_","",$rep_no);
        $sql_str = "SELECT * FROM admin WHERE REP_NO = '{$rep_no}' LIMIT 1;";
	    $result  = db_query($sql_str);
    }
    else
    {
        $sql_str = "SELECT * FROM permrep WHERE REP_NO = '{$rep_no}' LIMIT 1;";
    	$result  = db_query($sql_str);
    }
            
	if($result->num_rows != 0){ //in case there is an existing permrep with this username or email
		while($row = $result->fetch_assoc()){ //Fill up all properties from DB data
			$return['username'] = isset($row['USERNAME'])?$row['USERNAME']:'';
            $return['password'] = isset($row['WEBPSWD'])?$row['WEBPSWD']:'';
        }
        echo json_encode($return);exit;
	}
?>