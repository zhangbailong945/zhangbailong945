<?php
class Administrator extends CI_Controller
{
	/**
	 * 构造函数
	 */
    public function __construct()
    {
       parent::__construct();
       $this->load->database();
    }
    
    public function index()
    {
          if(isset($_SESSION['username'])&&!empty($_SESSION['username']))
          {

              $this->load->view('AdminLTE/index');
          }
          else 
          {
              redirect('administrator/Login/login');
          }    
    }

}