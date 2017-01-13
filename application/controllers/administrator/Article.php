<?php


/**
 * 文章控制器层
 */

class Article extends CI_Controller
{
     private $where = array();  /*条件*/
     private $limit = array();  /*分页*/
     
      function __construct(){
          parent::__construct();
          $this->load->database();
      }
      
     /**
      * 笔记视图
      */
     public function index()
     {
     	if(isset($_SESSION['username'])&&!empty($_SESSION['username']))
          {

	            $this->load->view('AdminLTE/articles');
          }
          else 
          {
              redirect('administrator/Login/login');
          }  
     }
     
     /**
      * 添加笔记视图
      * Enter description here ...
      */
     public function articleadd()
     {
        if(isset($_SESSION['username'])&&!empty($_SESSION['username']))
          {

	            $this->load->view('AdminLTE/articleadd');
          }
          else 
          {
              redirect('administrator/Login/login');
          }  
     }

     public function ajaxArticleList()
     {
         $this->load->model('administrator/Article_Model');
	     $list=$this->Article_Model->getArticleList(); //获取文章类型集合
         $result=array('data'=>$list);
         echo json_encode($result);
     }
     
     public function article_list()
     {
     	  
          if(isset($_SESSION['username'])&&!empty($_SESSION['username']))
          {
              $this->load->library('tablecount'); //导入数据库表自定义类
		        $keyword=$this->input->post('keyword');
		        if(!empty($keyword))
		        {
		        	$this->where['article_title']=$keyword;
		        }
		        $total_data = $this->tablecount->get_tablecount('articles', $this->where); //总条数
		        $pageNum = isset($_POST['pageNum']) ? $_POST['pageNum'] : 1;
		        $pageinfo = page($total_data, $pageNum); //计算分页总数和分页条件
		        //var_dump($pageinfo);
		        $this->load->library('tablelist'); //导入数据库表自定义类
		        $this->limit = $pageinfo['limit'];
		        $data = $pageinfo['pageinfo'];
		        
		        $this->load->model('administrator/ArticleType_Model');
		        $data['categorys']=$this->tablelist->get_tablelist('article_type',array('article_type_category'=>'category'), array(), array(),array());
		        $data['datalist'] = $this->tablelist->get_tablelist('articles', $this->where, $this->fields = array(), array(), $this->limit);

		        $this->load->view('administrator/articlelist', $data);
          }
          else 
          {
              redirect('administrator/Login/login');
          }      
     }
     
     /*文章类型视图*/
     public function articleadd_view()
     {
     	if(isset($_SESSION['username'])&&!empty($_SESSION['username']))
          {
          	$this->load->view('administrator/articleadd');
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
     public function articleadd_Controller()
     {  

     	 $article_type_id=$this->input->post('article_type_id');
         $data=array(
         'article_title'=>$this->input->post('article_title'),
         'article_slug'=>$this->input->post('article_slug'),
         'article_created'=>time(),
         'article_modified'=>time(),
         'article_text'=>$this->input->post('article_text'),
         'article_content_text'=>$this->input->post('article_content_text'),
         'article_order'=>0,
         'article_authorId'=>$_SESSION['id'],
         'template'=>'',
         'article_type'=>'blog',
         'article_status'=>'publish',
         'aritcle_commentsNum'=>$this->input->post('article_authorId'),
         'article_allowComment'=>0,
         'article_allowPing'=>0,
         'article_allowFeed'=>0    
         );
         $slugs=$this->input->post('article_slug');
         
         $this->load->library('tableinsert');
         $return_id=$this->tableinsert->insert_table('articles',$data);
	         if($return_id>0)
	         {   

	             $relationships=array('article_id'=>$return_id,'article_type_id'=>$article_type_id);
	             if($this->tableinsert->insert_table_return_bool('relationships',$relationships)>0&&$this->set_slugs($return_id,$slugs))
	             {

	             	echo 1;

	             }
	             else 
	             {
	                echo 0;

	             }
	         }        
             
           
     }
     
     /**
      * 设置标签
      * Enter description here ...
      * @param unknown_type $articleid
      * @param unknown_type $slugs
      */
     public function set_slugs($articleid,$slugs)
     {  if(strstr($slugs,','))
        {
	     	$slugs=rtrim($slugs,',');
	        $slugs=explode(",",$slugs); //以中文逗号分割为数组
	        $slugs=array_unique($slugs); //去掉重复的字符串
        }
        
        $insert_data=array();
        for ($i = 0; $i <count($slugs); $i++) {
        	$articleTypes=array();
        	$articleTypes['article_type_name']=$slugs[$i];
        	$articleTypes['article_type_slug']=$slugs[$i];
        	$articleTypes['article_type_category']='tag';
        	$articleTypes['article_type_description']=' ';
        	$articleTypes['article_type_count']=1;
        	$articleTypes['article_type_order']=0;        
        	$insert_data[]=$articleTypes;	       	
        }
        
         $this->load->model('administrator/Article_Model');
         $flag_insert_batch=$this->Article_Model->insert_batch('article_type',$insert_data);

         $articleTypesId=array();

         $articleTypesId=$this->Article_Model->get_articletypeId_last_three(count($slugs));
         $articleTypesId=array_reverse($articleTypesId);
          
         $insert_relationship_data=array();
         for ($j = 0; $j <count($articleTypesId); $j++) {
         	$relationship=array();
         	$relationship['article_id']=$articleid;
         	$relationship['article_type_id']=$articleTypesId[$j];
         	$insert_relationship_data[]=$relationship;
         }
         
         $flag_insert_relationship_data=$this->Article_Model->insert_batch('relationships',$insert_relationship_data);
         $flag=false;
         if($flag_insert_batch&&$flag_insert_relationship_data)
         {
            $flag=true;
         }
        
        return $flag;
     
     }
     
	 public function articledelete_Controller($id)
	    {
	        $this->where = array('article_type_id' => dowith_sql(daddslashes(html_escape(strip_tags($id)))));
	        $this->load->library('tabledel'); //导入数据库表自定义类
	        if ($this->tabledel->del('article_type', $this->where) > 0) {
	            $this->return['statusCode'] = '200';
	            $this->return['message'] = '操作成功';
	            $this->return['navTabId'] = 'articletype';
	            $this->return['callbackType'] = '';
	
	        } else {
	            $this->return['statusCode'] = '300';
	            $this->return['message'] = '操作失败';
	            $this->return['callbackType'] = '';
	        }
	        echo json_encode($this->return);
	    }
	    
	    
	      public function useradd_Controller()
	      {
	      
	         $data=array('username'=>$this->input->post('username'),'userpassword'=>$this->input->post('userpassword'),'useremail'=>$this->input->post('useremail'),'userip'=>'192.168.0.1');
	         $this->load->library('tableinsert');
	         if($this->tableinsert->insert_table('users',$data)>0)
	         {
	            $this->return['statusCode'] = '200';
	                $this->return['message'] = '操作成功';
	                $this->return['navTabId'] = 'article';
	                $this->return['callbackType']='closeCurrent';
	                $this->return['forwardUrl'] = site_url().'/administrator/article/article_list';
	         }
	         else
	         {
	                $this->return['statusCode'] = '300';
	                $this->return['message'] = '操作失败';
	         }
	         
	         echo json_encode($this->return);
	      }
      
      

}