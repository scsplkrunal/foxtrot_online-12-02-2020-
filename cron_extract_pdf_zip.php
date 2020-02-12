<?php
$company_array = array('lifemark','dominion','signalsecurities','everspire','lafferty','laramay','cue','silveroak','emerson_equity','johnstone');
$company_abbr = array('LM','DI','SS','EV','RF','LA','CUE','SO','EE','JBS');

foreach($company_array as $com_key=>$com_val)
{
    $company = $com_val;
    $company_abbr_name = isset($company_abbr[$com_key]) && $company_abbr[$com_key] != ''?$company_abbr[$com_key]:'';
    $filename = $company.'/datadrop/'.$company_abbr_name.'PDF.zip';//print_r($filename);exit;

    if (file_exists($filename)) {//echo 'hii';exit;
        /*$rename_flder = rename($company.'/data',$company.'/data_'.date('d-m-Y_His'));
        if(!is_dir($company.'/data/')) {
            mkdir($company.'/data/');
        }*/
        $zip = new ZipArchive;
        $res = $zip->open($company.'/datadrop/'.$company_abbr_name.'PDF.zip');
        if ($res === TRUE) {
            
          if($company == 'signalsecurities')
          {
              if ($zip->setPassword("2n16r5ta98s7e321c3z2168se21v32x1d6321ve6r5t987321va8er7a51d3"))
              {
                    if (!$zip->extractTo($company.'/data/'))
                    {
                        echo $company." file extraction failed (wrong password?)";
                    }
                    else
                    {
                        echo $company.' file successfully uploaded!';
                    }
              }
          }
          else{
            
            if (!$zip->extractTo($company.'/data/'))
            {
                echo $company." file extraction failed!";
            }
            else
            {
                echo $company.' file successfully uploaded!';
            }
            
          }
          $zip->close();
                    
        } else {
          echo $company.' failed to open zip file.';
        }
    }
    else
    {
        echo $company.' zip file not available.';
    }
}
?>