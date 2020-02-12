<?php
{
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
			$where_clause     = "AND date >= '{$from_date}' AND date < '{$to_date}'";
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
        
        

		if($from_date == $to_date && isset($from_date) && isset($post["to_date"]) && isset($post['all_dates'])){
			$from_date = substr_replace($from_date, ' 00:00:00', 10);
			$to_date   = substr_replace($to_date, ' 23:59:59', 10);
		} else{
			$sql_str = "SELECT date, date_rec, clearing,cli_no, cli_name, invest, net_amt, comm_rec, rep_rate, rep_comm, pay_date
                    $con_query
					FROM trades as t1
					WHERE rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
                    
            $sql_str1 = "SELECT date, date_rec, clearing,cli_no, cli_name, invest, net_amt, comm_rec, rep_rate, rep_comm, pay_date
                    $con_query1
                    FROM trades as t1
					WHERE source NOT LIKE '%PE%' and source NOT LIKE '%NF%' and source NOT LIKE '%BT%' and source NOT LIKE '%DN%' and source NOT LIKE '%RJ%' and source NOT LIKE '%HT%' and source NOT LIKE '%RE%' and source NOT LIKE '%SW%'
				    AND inv_type!=29 $con_direct_query AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
                    
            $sql_str2 = "SELECT date, date_rec, clearing,cli_no, cli_name, invest, net_amt, comm_rec, rep_rate, rep_comm, pay_date
                    $con_query2
                    FROM trades as t1
					WHERE (inv_type=40 or inv_type=41)
				    AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
                    
            $sql_str3 = "SELECT date, date_rec, clearing,cli_no, cli_name, invest, net_amt, comm_rec, rep_rate, rep_comm, pay_date
                    $con_query3
					FROM trades as t1
					WHERE (source LIKE '%PE%' OR source LIKE '%NF%' OR source LIKE '%BT%' OR source LIKE '%DN%' OR source LIKE '%RJ%' OR source LIKE '%HT%' OR source LIKE '%RE%' OR source LIKE '%SW%')
				    AND rep_no = {$_SESSION["permrep_obj"]->REP_NO}
					$where_clause $filter_by_client;";
                    
            $sql_str4 = "SELECT date, date_rec, clearing,cli_no, cli_name, invest, net_amt, comm_rec, rep_rate, rep_comm, pay_date
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

?>