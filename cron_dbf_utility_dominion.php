<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/** Run company zip files to maintain sequence for scheduled task for multiple times run - Modified By:aksha Modified Date:10-01-2020 **/
$output = '';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'https://foxtrotonlineportal.com/foxtrot_online/cron_extract_db_zip.php?company_name=dominion&company_abbr=DI');
$output = curl_exec($ch);
curl_close($ch);  

if($output != '')
{
    $company_array  = array('dominion'); //array('lifemark','allegheny','concorde','cue','demo','dominion','liberty','signalsecurities','vicuscapital','everspire','westgroup','lafferty');
    $company_abbr   = array('DI'); //array('Lm','ALG','CON','CUE','DEMO','DOM','LIB','SSR','VC','ES','WSG','LFT');
    $table          = array(
        // 'test',
        '1099FTO',
        'PermrepFTO',
        'BranchesFTO',
        'ClearingFTO',
        'ClientsFTO',
        'CompanyFTO',
        'ProdTypeFTO',
        'tradesFTO',
        'AdjustFTO'
    );
    $table_original = array(
        // 'test',
        '1099',
        'permrep',
        'branches',
        'clearing',
        'clients',
        'company',
        'prodtype',
        'trades',
        'adjust'
    );
    
    // $table = array('PermrepFTO','ProdTypeFTO','tradesFTO');
    // $table_original = array('permrep','prodtype','trades');
    
    foreach ($company_array as $com_key => $com_val) {
        $company           = $com_val;
        $company_abbr_name = isset($company_abbr[$com_key]) && $company_abbr[$com_key] != '' ? $company_abbr[$com_key] : '';
        
        $db     = $company . '_jjixgbv9my802728';
    
        $mysqli = new mysqli('localhost', 'jjixgbv9my802728', 'We3b2!12', $db);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
    
        $mysqli->multi_query(file_get_contents( __DIR__ . '/db_structure/' . $company . '_structure.sql'));
    
        $mysqli->close();
        
        foreach ($table as $tbl_key => $tbl_val) {
            
            $tbl = isset($table_original[$tbl_key]) ? $table_original[$tbl_key] : '';
            
            
            // $db     = $company . '_jjixgbv9my802728';
    
        $mysqli = new mysqli('localhost', 'jjixgbv9my802728', 'We3b2!12', $db);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
            
            // Path to dbase file
            
            $db_filename = __DIR__ . DIRECTORY_SEPARATOR . $company . "/db/" . $tbl_val . ".DBF";
            
            if (file_exists($db_filename)) {
                $db_path = $db_filename;
                
                // Open dbase file
                $dbh = dbase_open($db_path, 0);
                
                // if (!$dbh) {
                //     continue;
                // }
    
                if(!$dbh){
                    echo ("Error opening $e $db_path");exit;
                }
                
                
                // Get column information
                $column_info = dbase_get_header_info($dbh); //echo '<pre>';print_r($column_info);exit;
                set_time_limit(0); // I added unlimited time limit here, because the records I imported were in the hundreds of thousands.
                
                // This is part 2 of the code
                import_dbf($db, $tbl, $column_info, $db_path, $mysqli);
                $mysqli->close();
                echo "Tables imported successfully.";
            } else {
                die("Error! You have not selected correct path for the table.");
            }
        }
    }
}

function import_dbf($db, $table, $column_info, $dbf_file, $mysqli)
{
    //global $conn;
    global $mysqli;
    if (!$dbf = dbase_open($dbf_file, 0)) {
        die("Could not open $dbf_file for import.");
    }
    $num_rec    = dbase_numrecords($dbf);
    $num_fields = dbase_numfields($dbf);
    $fields     = array();
    $queries_tmp = array();
    
    for ($i = 1; $i <= $num_rec; $i++) {
        $row = @dbase_get_record_with_names($dbf, $i);
        
        // if ($db == 'dtest_jjixgbv9my802728' && $table == 'permrep') {
        //     $row['REP_NO_tmp']   = $row['REP_NO'];
        //     $row['CLEAR_NO_tmp'] = $row['CLEAR_NO'];
            
        //     $row['REP_NO']   = $row['CLEAR_NO_tmp'];
        //     $row['CLEAR_NO'] = $row['REP_NO_tmp'];
            
        //     unset($row['REP_NO_tmp']);
        //     unset($row['CLEAR_NO_tmp']);
        // }
        
        if (!empty($row)) {

            $q = "insert into $db.$table (";

            foreach ($row as $key => $val) {

                if ($key == 'deleted') {
                    continue;
                }
                $q .= "`" . trim($key) . "`,"; // Code modified to trim out whitespaces
                
            }
            $q = substr($q, 0, -1);
            $q .= ')';
            $q .= " values (";

            $column_number = 0;

            foreach ($row as $key => $val) {
                if ($key == 'deleted') {
                    continue;
                }

                if (!empty($column_info[$column_number]) && $column_info[$column_number]['name'] == $key) {
                    if ($column_info[$column_number]['type'] == 'date') {
                        if($val != '        ')
                        {
                            $val = substr($val, 0, 4) . '-' . substr($val, 4, 2) . '-' . substr($val, 6, 2);
                        }else
                        {
                            $val = '';
                        }
                    }
                }
                if(isset($column_info[$column_number]['type']) && $column_info[$column_number]['type'] == 'date' && $val == '')
                {
                    $q .= "NULL,"; 
                }
                else
                {
                    $q .= "'" . addslashes(trim($val)) . "',"; // Code modified to trim out whitespaces
                }
                $column_number++;
            }

        }
        
        // if (isset($extra_col_val)){ $q .= "'$extra_col_val',"; }
        $q = substr($q, 0, -1);
        $q .= ')';

        //if the query failed - go ahead and print a bunch of debug info
        if (!$result = $mysqli->query($q)) {
            print(mysqli_error($mysqli) . " SQL: $q\n");
            // var_dump($q); die;
            print (substr_count($q, ',') + 1) . " Fields total.";
            
            $problem_q = explode(',', $q);
            $q1        = "desc $db.$table"; //print_r($q1);exit;
            //$result1 = mysql_query($q1, $conn);
            $result1   = $mysqli->query($q1);
            $columns   = array();
            
            $i = 1;
            if ($result1->num_rows != 0) {
                while ($row1 = $result1->fetch_assoc()) {
                    $columns[$i] = $row1['Field'];
                    $i++;
                }
            }
            $i = 1;
            foreach ($problem_q as $pq) {
                print "$i column: {$columns[$i]} data: $pq\n";
                $i++;
            }
            die();
        }
    }
}
?>