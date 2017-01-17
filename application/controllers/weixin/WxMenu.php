<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WxMenu
 *
 * @author Loach
 */
class WxMenu extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    function Menulist()
    {
        if(isset($_SESSION['username'])&&!empty($_SESSION['username']))
          {

	            $this->load->view('AdminLTE/wx_menu');
          }
          else 
          {
              redirect('administrator/Login/login');
          }  
    }
    
    function ajaxMenuList()
    {
        
    }
    
}
