<?php
class Login extends CI_Controller
{	
	/**
	 * 继续父类控制器
	 * Enter description here ...
	 */
	 public function __construct()
	 {
	    parent::__construct();
	    $this->load->library('Authcode');
	 }
	 
     public function index()
     {

       $this->load->view('AdminLTE/login');

     }
	 	 
	 /**
	  * 登录
	  * Enter description here ...
	  */
     public function login()
     {
     	
     	$this->form_validation->set_error_delimiters('<center><div class="cloud" style="width:191px;height:41px;margin-top:5px;text-align:center;">', '</div></center>');
        $this->form_validation->set_rules('username_check', 'username_check', 'callback_username_check'); 
        $this->form_validation->set_rules('userpassword_check', 'userpassword_check', 'callback_userpassword_check');     	
		$this->form_validation->set_rules('username',"管理员账号",'required');
		$this->form_validation->set_rules('userpassword',"管理员密码",'required');
		$bool =  $this->form_validation->run();
		if($bool==FALSE)
		{		  
          $this->load->view('AdminLTE/login');
		}
		else 
		{
			$this->load->model('administrator/Musers');
            $flag=$this->Musers->user_login($this->input->post('username'),$this->input->post('userpassword'));
            if($flag==true)
            {
               //从数据库获取管理员信息
               $data=$this->Musers->get_user($this->input->post('username'),$this->input->post('userpassword'));
               $this->session->set_userdata($data);
               redirect('administrator/Administrator/index');
            }
            else
            {
               $this->form_validation->set_message('username_check', '管理员账号不存在');
               redirect('administrator/Login/index');
            }
		}
     }
     
     /**
       * 后台账号验证控制层
       *@param 管理员账号
       *@return Boolean
       */
     public function username_check()
     {

    	$this->load->model('administrator/Musers');

        $flag=$this->Musers->user_check($this->uri->segment(4));                   
        if ($flag ==true)
        {

            echo "true";
        }
        else
        {    
            echo "false";
        }

     }
     
     /**
       * 后台密码验证控制器层
       *@param 管理员密码
       *@return Boolean
       */
     public function userpassword_check()
     {

    	$this->load->model('administrator/Musers');
        $flag=$this->Musers->password_check($this->uri->segment(4));                   
        if ($flag ==true)
        {

            echo "true";
        }
        else
        {
            echo "false";
        }
     }
     
     public function loginout()
     {
     	unset($_SESSION['username']);
        session_destroy();
        if(!isset($_SESSION['username']))
        {
           redirect('administrator/Login/login');
        }
        else 
        {
           redirect('administrator/Administrator/index');
        }

     }
    
    
    
    
     
     
         
     
}

