<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Access_Token_Model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @return boolean
     */
    function checkAccessToken()
    {
        $now_time=time();
        $sql="SELECT * FROM `wx_access_token` WHERE ".$now_time.">(`update_date`+7200)";
        $query=$this->db->query($sql);
        $result=$query->result_array();
        if(count($result)>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    /**
     * 查询公众号的配置信息
     * @return MIX
     */
    function getAccessToken()
    {
        $sql="SELECT `id`, `token`, `app_id`, `app_secret`, `access_token`, `create_date`, `update_date`, `update_count`, `status` FROM `wx_access_token` limit 1";
        $query=$this->db->query($sql);
        $object=$query->first_row();
        if(!empty($object))
        {
            return $object;
        }
        else
        {
            return false;
        }
    }
    
    function setAccessToken($access_token,$object)
    {
        $data=array('access_token'=>$access_token,'update_date'=>time(),'update_count'=>$object->update_count+1);
        $this->db->where('id',1);
        $this->db->update('wx_access_token',$data);
    }
    
    
    
}
