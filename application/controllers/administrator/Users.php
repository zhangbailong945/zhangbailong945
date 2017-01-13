<?php
class Users extends CI_Controller
{
	/**
	 * 构造函数
	 */
	public function __construct()
	{
	   parent::__construct();
	   $this->load->database();
	}
	
	/**
	 * 显示用户列表
	 */
	public function index()
	{
	   $this->load->model('administrator/Musers');
	   $list=$this->Musers->userList();
	   $result=array(
	     'list'=>$list,
	   );		   
	   $this->load->view('AdminLTE/users',$result);
	}
	
	
}