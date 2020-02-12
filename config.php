<?php
	session_start(); 
	define('ENABLE_SSL', false);
    
    require_once('master_config.php');
    
    define('SITE_URL_ADMIN', SITE_URL.'admin/');    
	define('DIR_FS_INCLUDES',DIR_FS.'include/');
    define('DIR_WS_ADMIN', DIR_FS.'admin/');
	define('DIR_WS_TEMPLATES', DIR_FS.'templates/');
    define('DIR_WS_TEMPLATES_ADMIN_CP', DIR_WS_TEMPLATES.'admin/');    
    
    define('DIR_WS_CONTENT', DIR_WS_TEMPLATES.'content/');
	define('DIR_WS_CONTENT_ADMINCP', DIR_WS_TEMPLATES_ADMIN_CP.'content/');    
    
    define('DIR_FS_IMAGE_ADMIN',DIR_WS_ADMIN.'img/');    
    define('DIR_FS_USER',DIR_FS_IMAGE_ADMIN.'user/');
    define('SITE_IMAGE_ADMIN',SITE_URL_ADMIN.'img/');    
    define('SITE_USER',SITE_IMAGE_ADMIN.'user/');
    define('DIR_FS_INCLUDES_CLASS',DIR_FS_INCLUDES.'class/');
    
	require_once(DIR_FS_INCLUDES_CLASS.'db.class.php');    
    require_once(DIR_FS_INCLUDES_CLASS.'master.class.php');    
    require_once(DIR_FS_INCLUDES_CLASS.'admin.class.php');
    require_once(DIR_FS_INCLUDES_CLASS.'email.class.php');
    require_once(DIR_FS_INCLUDES_CLASS.'configuration.class.php');    
    
    $db=new db(DB_SERVER,DB_SERVER_USERNAME,DB_SERVER_PASSWORD,DB_DATABASE);
    require_once("comman_function.php");
    
    $genConfig=getGeneralConfig();
    
    define('RECORDS_PER_PAGE',$genConfig['config_total_record_per_page']);
    define('FROM_EMAIL',$genConfig['config_from_email']);    	
    define('CURRUNT_PAGE',basename($_SERVER['PHP_SELF']));        
    //General page configurations
    $content_config=array();
    if(isset($_GET['getpage']) && $_GET['getpage']!=''){
        $content_config['name']= md5($_SERVER['REQUEST_URI']);
        if(isset($_SESSION['config'])){unset($_SESSION['config']);}           
    }else{
        $content_config['name']= md5(CURRUNT_PAGE);
    }    
    $content_config['filename']=pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
    $content_config['filetitle']=ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME));
    $content_config['url']=CURRUNT_PAGE;
    //order
    $order_by=isset($_SESSION['config'][$content_config['name'].'_order'])?$_SESSION['config'][$content_config['name'].'_order']:'desc';
    $order_name=isset($_SESSION['config'][$content_config['name'].'_sort'])?$_SESSION['config'][$content_config['name'].'_sort']:'';
    
    //search
    $search=isset($_SESSION['config'][$content_config['name'].'_search'])?$_SESSION['config'][$content_config['name'].'_search']:'';
    
    //pagination
    if($search=='')
    {
        $num_rec_per_page=RECORDS_PER_PAGE;    
    }
    else
    {
        $num_rec_per_page=0;
    }    
    $page=isset($_SESSION['config'][$content_config['name'].'_page'])?$_SESSION['config'][$content_config['name'].'_page']:'1';
    $start_from=($page-1)*$num_rec_per_page;
    
    //front settings
    $content=basename($_SERVER['PHP_SELF'],".php");	
?>