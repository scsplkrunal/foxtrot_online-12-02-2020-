<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$company_name = isset($_GET['company_name'])?$_GET['company_name']:'';
$company_abbrv = isset($_GET['company_abbr'])?$_GET['company_abbr']:'';

$company_array  = array($company_name);//array('lifemark','dominion','signalsecurities','everspire','lafferty','laramay','cue','silveroak');
$company_abbr   = array($company_abbrv);//array('LM','DI','SS','EV','RF','LA','CUE','SO');

foreach ($company_array as $com_key => $com_val) {
    $company           = $com_val;
    $company_abbr_name = isset($company_abbr[$com_key]) && $company_abbr[$com_key] != '' ? $company_abbr[$com_key] : '';
    $filename          = $company . '/datadrop/' . $company_abbr_name . 'DB.zip'; //print_r($filename);exit;
    
    if (file_exists($filename)) {//echo 'hii';exit;
    /*$rename_flder = rename($company.'/dbf',$company.'/dbf_'.date('d-m-Y_His'));
    if(!is_dir($company.'/dbf/')) {
    mkdir($company.'/dbf/');
    }*/
        $zip = new ZipArchive;
        $res = $zip->open($company.'/datadrop/'.$company_abbr_name.'DB.zip');
        if ($res === TRUE) {
            if (!$zip->extractTo($company.'/db/'))
            {
                echo $company." file extraction failed!";
            }
            else
            {
                echo $company.' file successfully uploaded!';
            }
            $zip->close();
        }
    }
}
?>