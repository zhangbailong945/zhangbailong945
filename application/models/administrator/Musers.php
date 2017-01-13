<?php
  class Musers extends  CI_Model
  {
  	
      public function __construct()
      {
        $this->load->database();
      }
      
      /**
       * 用户登录
       * Enter description here ...
       * @param unknown_type $username
       * @param unknown_type $userpassword
       */
      public function user_login($username,$userpassword)
      {
         $flag=false;
         $this->db->where('username',$username);
         $this->db->where('userpassword',$userpassword);
         $query=$this->db->get('users');
         if($query->num_rows()>0)
         {
            $flag=true;
         }
         else 
         {
            $flag=false;
         }
         
         return $flag;
         
      }
      
      public function userList()
      {
         $this->db->select();
         $this->db->from('users');
         $query=$this->db->get();
         return $query->result_array();
      }
      
      /**
       * 获取用户信息
       * @param unknown_type $username
       * @param unknown_type $userpassword
       */
      public function get_user($username,$userpassword)
      {
         $data=array();
         $this->db->where('username',$username);
         $this->db->where('userpassword',$userpassword);
         $query=$this->db->get('users');
         $row=$query->row();
         if(isset($row))
         {
         	$data['id']=$row->id;
            $data['username']=$row->username;
            $data['useremail']=$row->useremail;
            $data['userip']=$row->userip;
         }
         
         return $data;
      }
      
      public function get_users()
      {
	       $data=array();
	 
	       $query= $this->db->query("select * from users");
	
			foreach ($query->result_array() as $row)
			{
				  $data=array();
		          $data['id']=$row['id'];
		          $data['username']=$row['username'];
		          $data['useremail']=$row['useremail'];
		          $data['userip']=$row['userip'];
			}
         echo $data;
         
      }
      
      /**
       * 后台账号验证模型层
       *@param 管理员账号
       *@return Boolean
       */
      public function user_check($username)
      {
         $flag=false;
         $this->db->where('username',$username);
         $query=$this->db->get('users');
         if($query->num_rows()>0)
         {
            $flag=true;
         }
         else 
         {
            $flag=false;
         }
         
         return $flag;
      }
      
      /**
       * 后台密码验证模型层
       *@param 管理员密码
       *@return Boolean
       */
      public function password_check($userpassword)
      {
         $flag=false;
         $this->db->where('userpassword',$userpassword);
         $query=$this->db->get('users');
         if($query->num_rows()>0)
         {
            $flag=true;
         }
         else 
         {
            $flag=false;
         }
         
         return $flag;
      }
      
      public function update_user($id,$userpassword)
      {
          $flag=false;
          $this->db->where('id',$id);
          $this->db->update('users',array('userpassword'=>$userpassword));
          $nums=$this->db->affected_rows();
          if($nums>0)
          {
             $flag=true;
          }         
          return $flag;
      }
      
  }