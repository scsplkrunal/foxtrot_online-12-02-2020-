<?php
class configuration extends db
{
    public function getData($where,$order='',$order_by='',$search='',$start_from='0',$num_rec_per_page='')
    {
            if($where!='')
            {
                $where=$where." and ";                    
            }
            
            if($search!='')
            {
                $where.="( c.from_email like '%".$search."%' or c.total_record_per_page like '%".$search."%' ) and";
            }
            
            if($order=='')
            {
                $order='c.id';
            }
            
            $limit='';
            if($num_rec_per_page!='')
            {
                $limit="LIMIT ".$start_from.",".$num_rec_per_page;
            }
                                 
            $this->sql('SELECT c.id as config_id,c.from_email as config_from_email,c.total_record_per_page as config_total_record_per_page
                        FROM configuration as c
                        WHERE '.$where.' c.`status`=1
                        ORDER BY '.$order.' '.$order_by.' '.$limit);
            return $this->getResult();
    }
    
    public function insertData($data)
    {
            $insert_array=array("from_email"=>$this->re_db_input($data['config_from_email']),"total_record_per_page"=>$this->re_db_input($data['config_record_per_page']),"created_time"=>date('Y-m-d H:i:s'),"created_ip"=>$_SERVER['REMOTE_ADDR']);       
            $this->insert($this->getdatbasename('CONFIGURATION'),$insert_array);            
            return $this->getResult();
    }
    
    public function updateData($data,$where)
    {        
            $update_array=array("from_email"=>$this->re_db_input($data['config_from_email']),"total_record_per_page"=>$this->re_db_input($data['config_record_per_page']),"modified_time"=>date('Y-m-d H:i:s'),"modified_ip"=>$_SERVER['REMOTE_ADDR']);     
            $this->update($this->getdatbasename('CONFIGURATION'),$update_array,$where);
            return $this->getResult();
    }
    
    public function deleteData($data,$where)
    {        
            $update_array=array("status"=>$this->re_db_input($data['status']),"modified_time"=>date('Y-m-d H:i:s'),"modified_ip"=>$_SERVER['REMOTE_ADDR']);            
            $this->update($this->getdatbasename('CONFIGURATION'),$update_array,$where);
            return $this->getResult();
    }       
}
?>