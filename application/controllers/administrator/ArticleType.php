<?php


/**
 * 文章类型控制器层
 */

class ArticleType extends CI_Controller{

	 private $where = array();  /*条件*/
     private $limit = array();  /*分页*/
     
      function __construct(){
          parent::__construct();
          $this->load->database();
      }
      
      public function index()
      {
      	  if(isset($_SESSION['username'])&&!empty($_SESSION['username']))
          {
          	$this->load->model('administrator/ArticleType_Model');
          	$list=$this->ArticleType_Model->getArticleTypeList(); //获取文章类型集合
          	$result=array(
          	  'list'=>$list,
          	);
            $this->load->view('AdminLTE/articletypes',$result);
          }
          else 
          {
              redirect('administrator/Login/login');
          } 
      }
      
     /**
      * 获取笔记类型集合ajax
      */
     public function ajaxArticleTypeList()
     {
         $this->load->model('administrator/ArticleType_Model');
         $list=$this->ArticleType_Model->getArticleTypeList();
         $result=array('data'=>$list);
         echo json_encode($result);
      }
      
     /**
      * 单个删除笔记类型ajax
      */
     public function ajaxAritcleTypeDelete_Controller()
     {
         $this->load->model('administrator/ArticleType_Model');
         $id=$this->input->post('id');
         $flag=$this->ArticleType_Model->delete($id);
         if($flag)
         {
             echo 1;
         }
         else
         {
             echo 0;
         }
     }
     
     
     public function articletype_list()
     {
     	  
          if(isset($_SESSION['username'])&&!empty($_SESSION['username']))
          {
              $this->load->library('tablecount'); //导入数据库表自定义类
		        $keyword=$this->input->post('keyword');
		        if(!empty($keyword))
		        {
		        	$this->where['article_type_name']=$keyword;
		        }
		        $total_data = $this->tablecount->get_tablecount('article_type', $this->where); //总条数
		        $pageNum = isset($_POST['pageNum']) ? $_POST['pageNum'] : 1;
		        $pageinfo = page($total_data, $pageNum); //计算分页总数和分页条件
		        //var_dump($pageinfo);
		        $this->load->library('tablelist'); //导入数据库表自定义类
		        $this->limit = $pageinfo['limit'];
		        $data = $pageinfo['pageinfo'];
		        $list=$this->get_list_article_type();		        
		        $data['datalist'] = $this->tablelist->get_tablelist('article_type', $this->where, $this->fields = array(), array(), $this->limit);
		        $this->load->view('administrator/articletypelist', $data);
          }
          else 
          {
              redirect('administrator/Login/login');
          }      
     }
     
     /*文章类型视图*/
     public function articletypeadd_view()
     {
     	if(isset($_SESSION['username'])&&!empty($_SESSION['username']))
          {
          	$this->load->view('administrator/articletypeadd');
          }
          else
          {
            redirect('administrator/Login/login');
          }
     }
     /**
      * 添加文章类型
      * Enter description here ...
      */
     public function articletypeadd_Controller()
     {  
         $data=array('article_type_name'=>$this->input->post('article_type_name'),'article_type_description'=>$this->input->post('article_type_description'),'article_type_slug'=>$this->input->post('article_type_slug'),'article_type_category'=>'category');
         $this->load->model('administrator/ArticleType_Model');
         $row_num=$this->ArticleType_Model->insert($data);
         if($row_num>0)
         {
             echo 1;
         }
         else
         {
             echo 0;
         }

     }
     
     public function articletypeedit_Controller()
     {
         $data=array('article_type_name'=>$this->input->post('article_type_name'),'article_type_description'=>$this->input->post('article_type_description'),'article_type_slug'=>$this->input->post('article_type_slug'),'article_type_category'=>'category');
         $id=$this->input->post('article_type_id');
         $this->load->model('administrator/ArticleType_Model');
         $row_num=$this->ArticleType_Model->update($id,$data);
         if($row_num>0)
         {
             echo 1;
         }
         else
         {
             echo 0;
         }
     }
     
	 public function articletypedeletebatch_Controller()
	    {
	         $ids=$this->input->post('ids');
	         $ids=explode(',',$ids);
	         $this->load->model('administrator/ArticleType_Model');
	         $row_num=$this->ArticleType_Model->delete_batch($ids);
	         if($row_num)
	         {
	             echo 1;
	         }
	         else
	         {
	             echo 0;
	         }
	    }
	    
	    /**
	     * 获取文章类型集合
	     * Enter description here ...
	     */
	    public function getArticleType_data()
	    {
	        $this->load->model('administrator/ArticleType_Model');
	        $data=$this->ArticleType_Model->getArticleTypeData();
	        echo json_encode($data);
	    }
	    
	    /**
	     * 获取文章类型集合
	     * Enter description here ...
	     */
	    public function get_list_article_type()
	    {
	        $this->load->model('administrator/ArticleType_Model');
	        $data=$this->ArticleType_Model->list_article_type();
	        return $data;
	    }

}