<?php

class ImgAuthCode extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
	}

	/**
	 * 显示图片
	 *
	 */
	function show()
	{
                    $this->load->library('Authcode');
		$this->authcode->show();
	}

	/**
	 * js调用显示图片
	 *
	 */
	function show_script()
	{
                    $this->load->library('Authcode');
		$this->authcode->showScript();
	}
	
	/**
	 * ajax验证
	 *
	 */
	function check()
	{
                    $this->load->library('Authcode');
		if ($this->authcode->check($this->uri->segment(4))) {
			echo "true";
		} else {
			echo "false";
		}		
	}
}
