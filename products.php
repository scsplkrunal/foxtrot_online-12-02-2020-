<?php
    require_once('include/config.php');
    $api_url='http://erp.deliciousfoodsindia.com/';
     $cat_id=isset($_GET['cat_id'])?$_GET['cat_id']:0;
     $user_id=1;
    
    $instance = new master();
    $product_categories = $instance->getData_all("category_master","is_delete=0","sort_order","ASC");
    $category_id = isset($_GET['category_id'])?$_GET['category_id']:'';
    
    $products_categorywise = array();
    
    if(isset($_GET['category_id']) && $_GET['category_id'] != '')
    {
        $product_category = $instance->getData_all("category_master","is_delete=0 and id=".$_GET['category_id'],"sort_order","ASC");
        
        $erp_categories = explode(',',$product_category[0]['erp_category_id']);        
        
        foreach($erp_categories as $erp_cat_key=>$erp_cat_val){
            
            $url=$api_url.'Delicious_Handler.asmx/Get_All_Products_on_Type?user_id='.$user_id.'&cat_id='.$erp_cat_val;
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            $output=curl_exec($ch);
            $array = json_decode($output);
            curl_close($ch);
            $xml_type = new SimpleXMLElement($output);     
            $cateory_prducts_array =  xml2array($xml_type);
            array_push($products_categorywise,$cateory_prducts_array);
        }
    }
    else{
            $url=$api_url.'Delicious_Handler.asmx/Get_All_Products_on_Type?user_id='.$user_id.'&cat_id=0';
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            $output=curl_exec($ch);
            $array = json_decode($output);
            curl_close($ch);
            $xml_type = new SimpleXMLElement($output);     
            $cateory_prducts_array =  xml2array($xml_type);
            array_push($products_categorywise,$cateory_prducts_array);
    }
    if(isset($_GET['action']) && $_GET['action']=='new_arrival')
    {
        //for product type
        $url=$api_url.'Delicious_Handler.asmx/Get_All_Product_Type?user_id='.$user_id;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $output=curl_exec($ch);
        $array = json_decode($output);
        curl_close($ch);
        $xml = new SimpleXMLElement($output);
        
        //for product based on type
        $url=$api_url.'Delicious_Handler.asmx/Get_New_arrival_products?user_id='.$user_id.'&cat_id='.$cat_id;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $output=curl_exec($ch);
        $array = json_decode($output);
        curl_close($ch);
        $xml_type = new SimpleXMLElement($output);
        $cateory_prducts_array =  xml2array($xml_type);
        array_push($products_categorywise,$cateory_prducts_array);
    } 
        if(isset($_GET['category_id']) && $_GET['category_id'] != '')
        {
            if(isset($category_id) && $category_id!=''){$con = '?category_id='.$category_id;}else{$con='';}
        }
        else{
            if(isset($cat_id) && $cat_id!=''){$con = '?cat_id='.$cat_id;}else{$con='';}
        }
        
        
        if(isset($_GET['action']) && $_GET['action']='new_arrival'){$con1 = '?action=new_arrival&cat_id='.$cat_id;}else{$con1='';}
        $paging_link = SITE_URL.'products'.$con.''.$con1;
        $current_page = isset($_GET['page'])?trim(intval($_GET['page'])):1;
        
    
    
    $title = "Products";
    require_once(DIR_TEMPLATE_FILE);
?>