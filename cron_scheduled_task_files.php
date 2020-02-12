<?php
$company_array = array('lifemark','dominion','signalsecurities','everspire','lafferty','laramay','cue');
$company_abbr = array('LM','DI','SS','EV','RF','LA','CUE');

foreach($company_array as $com_key=>$com_val)
{
    $company = $com_val;
    $company_abbr_name = isset($company_abbr[$com_key]) && $company_abbr[$com_key] != ''?$company_abbr[$com_key]:'';
    $pdfzip = $company.'/datadrop/'.$company_abbr_name.'PDF.zip';//print_r($filename);exit;
    $dbzip = $company.'/datadrop/'.$company_abbr_name.'DB.zip';//print_r($filename);exit;

    if (!file_exists($pdfzip)) {
        
        echo $company.'\'s pdf zip not available in folder!';echo '<br/>';
    }
    else
    {
        $file_updated_on = date('d/m/Y',filemtime($pdfzip));
        if($file_updated_on!=date('d/m/Y'))
        {
                echo $company.'\'s pdf zip file not updated!';echo '<br/>';    
        }
    }
    if(!file_exists($dbzip))
    {
        echo $company.'\'s db zip not available in folder!';echo '<br/>';
    }    
    else
    {
        $file_updated_on = date('d/m/Y',filemtime($dbzip));
        if($file_updated_on!=date('d/m/Y'))
        {
                echo $company.'\'s db zip file not updated!';echo '<br/>';    
        }
    }
}
?>