<?php
class LoachBlog extends CI_Controller
{
	private $where = array();
    private $limit = array();
    function __construct()
    {
    	parent::__construct();
    	$this->load->database();
    	$this->load->library('Common');
    }
    
    function error404()
    {
    	$this->load->view('LoachBlog/error404');
    }
    
    
    /***
     * 显示LoachBlog主页
     */
    function index()
    {
    	$config=array();
    	$config['per_page']=5;
    	$current_page= intval($this->uri->segment(4,0)); //获取当前分页页码数
	    //page还原
	    if(0 == $current_page)
	    {
	      $current_page = 1;
	    }
	    $offset = ($current_page - 1 ) * $config['per_page']; //设置偏移量 限定 数据查询 起始位置（从 $offset 条开始）
	    $this->load->model('LoachBlog/Article_Model');
	    $result = $this->Article_Model->articles($offset,$config['per_page'],$order='article_id desc');
	    $config['base_url']      = base_url().'index.php/LoachBlog/LoachBlog/index';
	    $config['first_link']     ='首页';//首页
	    $config['prev_link']     = '上一页';//上一页
	    $config['next_link']     = '下一页';//下一页
	    $config['last_link']     = '尾页';//尾页
	    $config['full_tag_open'] = '<ul class="pagination">';  
        $config['full_tag_close'] = '</ul>';  
        $config['first_tag_open'] = '<li>';  
        $config['first_tag_close'] = '</li>';  
        $config['prev_tag_open'] = '<li>';  
        $config['prev_tag_close'] = '</li>';  
        $config['next_tag_open'] = '<li>';  
        $config['next_tag_close'] = '</li>';  
        $config['cur_tag_open'] = '<li class="active"><a>';  
        $config['cur_tag_close'] = '</a></li>';  
        $config['last_tag_open'] = '<li>';  
        $config['last_tag_close'] = '</li>';  
        $config['num_tag_open'] = '<li>';  
        $config['num_tag_close'] = '</li>'; 
	    $config['total_rows']     = $result['total'];//总条数
	    $config ['uri_segment'] = 4; 
	    $config['use_page_numbers'] = TRUE;
	    $this->load->library('pagination');//加载ci pagination类
	    $this->pagination->initialize($config);
	    $tags=$this->Article_Model->getSomeTagsModel(10);
	    //获取分类
	    $categorys=$this->Article_Model->getCategorysModel();

	    /***
	     * 这里实现获取客户端IP并统计访问数量，访问相同的IP访问数量不叠加，统计相同IP的总数给该用户。
	     */
	    $count_address='./count.txt'; //不同IP访问量文件地址
	    $ip_address='./ip.txt';       //存放IP
              $counter=file_get_contents($count_address);
		 $counter+=0;
		//判断本IP是否曾经访问过
		$ips=preg_split("/\s+/",file_get_contents($ip_address));
		$ip=Common::get_ip();
		if(!in_array($ip,$ips)){//倘若该IP不在ip文件夹中，就新增加访问数据
		//更新计数器
		 $counter++;
		  if($fp=fopen($count_address,'w')){
		 fputs($fp,$counter);fclose($fp);
		  }
		//更新访问IP
		if($fp=fopen($ip_address,'a')){
		   fputs($fp,"\n$ip");fclose($fp);
		  }
		}
	    $result = array(
	        'list' => $result['list'],
	        'total'  => $result['total'],
	        'current_page' => $current_page,
	        'categorys'=>$categorys,
	        'per_page' => $config['per_page'],
	        'page'  => $this->pagination->create_links(),
	        'tags'=>$tags,
                  'count'=>$counter,
	    );
    	$this->load->view('LoachBlog/index',$result);
    }
    
    /**
     * 显示搜索页
     */
    function search()
    {
    	$config=array();
    	$config['per_page']=5;
    	$current_page= 0; //获取当前分页页码数
    	$config['base_url']=''; //跳转链接
    	$key=Common::unescape(trim($this->uri->segment(4,0)));
    	$keyword=NULL;
    	$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/search/';
    	
        if(!is_numeric($key))
    	{
    		$current_page=intval($this->uri->segment(6));
    		$config ['uri_segment'] = 6; 
    		$keyword=Common::unescape(trim($this->uri->segment(4)));
    		$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/search/'.$keyword.'/page/';
    		
    		
    	}
    	else if(is_numeric($key))
    	{
    		$current_page=intval($this->uri->segment(4));
    		$config ['uri_segment'] = 4; 
    		$current_page=intval($this->uri->segment(4));
    		$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/search/';
    	}
    	else 
    	{
    		$current_page=intval($this->uri->segment(4));
    		$config ['uri_segment'] = 4; 
    		$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/search/';
    	}
    	

	    //page还原
	    if(0 == $current_page)
	    {
	      $current_page = 1;
	    }
	    $offset = ($current_page - 1 ) * $config['per_page']; //设置偏移量 限定 数据查询 起始位置（从 $offset 条开始）
	    $this->load->model('LoachBlog/Article_Model');
	    $result = $this->Article_Model->searchs($offset,$config['per_page'],$order='article_id desc',$keyword);
	    $tags=$this->Article_Model->getSomeTagsModel(10);
	    $config['first_link']     ='首页';//首页
	    $config['prev_link']     = '上一页';//上一页
	    $config['next_link']     = '下一页';//下一页
	    $config['last_link']     = '尾页';//尾页
	    $config['full_tag_open'] = '<ul class="pagination">';  
        $config['full_tag_close'] = '</ul>';  
        $config['first_tag_open'] = '<li>';  
        $config['first_tag_close'] = '</li>';  
        $config['prev_tag_open'] = '<li>';  
        $config['prev_tag_close'] = '</li>';  
        $config['next_tag_open'] = '<li>';  
        $config['next_tag_close'] = '</li>';  
        $config['cur_tag_open'] = '<li class="active"><a>';  
        $config['cur_tag_close'] = '</a></li>';  
        $config['last_tag_open'] = '<li>';  
        $config['last_tag_close'] = '</li>';  
        $config['num_tag_open'] = '<li>';  
        $config['num_tag_close'] = '</li>'; 
	    $config['total_rows']     = $result['total'];//总条数
	    $config['use_page_numbers'] = TRUE;
	    $this->load->library('pagination');//加载ci pagination类
	     $this->pagination->initialize($config);

	    $result = array(
	        'list' => $result['list'],
	        'total'  =>$result['total'],
	        'current_page' => $current_page,
	        'per_page' => $config['per_page'],
	        'page'  => $this->pagination->create_links(),
	        'keyword'=>$keyword,
	        'tags'=>$tags,
	    );
    	$this->load->view('LoachBlog/search',$result);
    }

    /**
     * 文字归档
     */
    function archives()
    {
    	$config=array();
    	$config['per_page']=5;
    	$current_page= 0; //获取当前分页页码数
    	$config['base_url']=''; //跳转链接
    	$key=Common::unescape(trim($this->uri->segment(4,0)));
    	$datetime=NULL;
    	$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/archives/';
    	
        if(!is_numeric($key))
    	{
    		$current_page=intval($this->uri->segment(6));
    		$config ['uri_segment'] = 6; 
    		$datetime=Common::unescape(trim($this->uri->segment(4)));
    		$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/archives/'.$datetime.'/page/';
    		
    		
    	}
    	else if(is_numeric($key))
    	{
    		$current_page=intval($this->uri->segment(4));
    		$config ['uri_segment'] = 4; 
    		$current_page=intval($this->uri->segment(4));
    		$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/archives/';
    	}
    	else 
    	{
    		$current_page=intval($this->uri->segment(4));
    		$config ['uri_segment'] = 4; 
    		$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/archives/';
    	}
    	

	    //page还原
	    if(0 == $current_page)
	    {
	      $current_page = 1;
	    }
	    $offset = ($current_page - 1 ) * $config['per_page']; //设置偏移量 限定 数据查询 起始位置（从 $offset 条开始）
	    $this->load->model('LoachBlog/Article_Model');
	    $result=$this->Article_Model->getArchivesArticles($offset,$config['per_page'],$datetime);
	    $monthList = $this->Article_Model->archives($offset,$config['per_page'],$order='article_id desc',$datetime);
	    $tags=$this->Article_Model->getSomeTagsModel(10);
	    if(!empty($datetime))
	    {
		    $datetimeList=explode('-',$datetime);
		    $datetime=$datetimeList[0].'年'.$datetimeList[1].'月';
	    }
	    $config['first_link']     ='首页';//首页
	    $config['prev_link']     = '上一页';//上一页
	    $config['next_link']     = '下一页';//下一页
	    $config['last_link']     = '尾页';//尾页
	    $config['full_tag_open'] = '<ul class="pagination">';  
        $config['full_tag_close'] = '</ul>';  
        $config['first_tag_open'] = '<li>';  
        $config['first_tag_close'] = '</li>';  
        $config['prev_tag_open'] = '<li>';  
        $config['prev_tag_close'] = '</li>';  
        $config['next_tag_open'] = '<li>';  
        $config['next_tag_close'] = '</li>';  
        $config['cur_tag_open'] = '<li class="active"><a>';  
        $config['cur_tag_close'] = '</a></li>';  
        $config['last_tag_open'] = '<li>';  
        $config['last_tag_close'] = '</li>';  
        $config['num_tag_open'] = '<li>';  
        $config['num_tag_close'] = '</li>'; 
	    $config['total_rows']     =$result['total'];//总条数
	    $config['use_page_numbers'] = TRUE;
	    $this->load->library('pagination');//加载ci pagination类
	     $this->pagination->initialize($config);

	    $result = array(
	        'list' =>$result['list'],
	        'monthList' => $monthList,
	        'total'  =>$result['total'],
	        'current_page' => $current_page,
	        'per_page' => $config['per_page'],
	        'page'  => $this->pagination->create_links(),
	        'datetime'=>$datetime,
	        'tags'=>$tags,
	    );
    	$this->load->view('LoachBlog/archives',$result);
    }
    
    /**
     * 显示时光轴
     */
    function date()
    {
        $this->load->model('LoachBlog/Article_Model');
	    $tags=$this->Article_Model->getSomeTagsModel(10);
    	$result=array(
    	'tags'=>$tags,
    	);
    	$this->load->view('LoachBlog/date',$result);
    }
    
    /**
     *获取博客
     */
    function getBlogs()
    {
    	$array=array();
    	$this->load->library('tablecount'); //导入数据库表自定义类
        $keyword=$this->input->post('keyword');
        $last=$this->input->post('last');
        $amount=$this->input->post('amount');
        $this->load->library('tablequery'); //导入数据库表自定义类
        $sql="select * from articles order by article_id desc limit $last,$amount";
        $articlelist= $this->tablequery->querylist($sql);
        $this->load->model('administrator/ArticleType_Model');
        $articletypelist=$this->ArticleType_Model->list_article_type();
        $LoachBlogSrc_Path=base_url()."communal/LoachBlog"; 
        $data=array();
        foreach ($articlelist as $artilce)
        {
        	foreach ($articletypelist as $articletype)
        	{
        		
        		$list=array();
        		if($artilce['article_id']==$articletype['article_id'])
        		{
        			$list['article_id']=$artilce['article_id'];
        			$list['article_title']=$artilce['article_title'];
        			$list['article_slug']=$artilce['article_slug'];
        			$list['article_created']=Common::dateWord($artilce['article_created'],time());
        			$list['article_modified']=$artilce['article_modified'];
        			$list['article_text']=trim((mb_substr(strip_tags($artilce['article_text']),0,200,'utf-8')));
        			$list['article_order']=$artilce['article_order'];
        			$list['article_authorId']=$artilce['article_authorId'];
        			$list['template']=$artilce['template'];
        			$list['article_type']=$artilce['article_type'];
        			$list['article_status']=$artilce['article_status'];
        			$list['aritcle_commentsNum']=$artilce['aritcle_commentsNum'];
        			$list['article_allowComment']=$artilce['article_allowComment'];
        			$list['article_allowPing']=$artilce['article_allowPing'];
        			$list['article_allowFeed']=$artilce['article_allowFeed'];
        			$list['article_type_id']=$articletype['article_type_id'];
        			$list['article_type_name']=$articletype['article_type_name'];
        			$list['article_type_slug']=$articletype['article_type_slug'];
        			$list['article_type_category']=$articletype['article_type_category'];
        			$list['article_type_description']=$articletype['article_type_description'];
        			$list['article_type_count']=$articletype['article_type_count'];
        			$list['article_type_order']=$articletype['article_type_order'];
        			$list['cd-picture']='<img src="'.$LoachBlogSrc_Path.'/img/cd-icon-note.svg" alt="Picture">';
        			$list['details']='<a class="cd-read-more" href="'.site_url().'LoachBlog/LoachBlog/article/'.$artilce['article_id'].'" target="_blank">阅读详情</a>';
        			$data[]=$list;
        		}
        		
        	}
        }
        
       
        echo json_encode($data);

    }
    
    /**
     * 查看一篇文章
     */
    function article()
    {
    	/*
    	$id=$this->input->post('id');       
    	echo json_encode($data);
    	*/
    	$article_id=$this->uri->segment(4);//获取url路径中文章编号
    	$this->load->model('LoachBlog/Article_Model');
    	$data=$this->Article_Model->getArticleById($article_id);
        $this->load->model('administrator/ArticleType_Model');
        $articletypelist=$this->ArticleType_Model->list_article_type();
    	foreach ($articletypelist as $articletype)
        {
        	if($article_id==$articletype['article_id'])
        		{
        			$data['article_type_id']=$articletype['article_type_id'];
        			$data['article_type_name']=$articletype['article_type_name'];
        		}
        }
        $tags=$this->Article_Model->getArticleTags($article_id);
        $tagstr='';
        foreach ($tags as $tag)
		{
			$tagstr.=$tag['article_type_name'].',';
		}
		$tagstr=substr($tagstr,0,-1);
        $data['articleTags']=$tags;
        $data['tagstr']=$tagstr;
        $data['tags']=$this->Article_Model->getSomeTagsModel(10);
    	$this->load->view('LoachBlog/article',$data);
    	
    }
    
    /**
     * 获取一些标签 显示在页脚和侧边栏
     */
    function getSomeTags()
    {
    	$offset=10;
    	$this->load->model('LoachBlog/Article_Model');
    	$data=$this->Article_Model->getSomeTagsModel($offset);
    	var_dump($data);
    }
    
    /**
     * 返回json
     * 最新的3条笔记list
     */
    function getRecentThree()
    {
    	$data=array();
    	$this->load->model('LoachBlog/Article_Model');     //载入文章model层
    	$data=$this->Article_Model->getRecentThreeModel(); //执行model方法
    	echo json_encode($data);
    }
    
    /**
     * 标签
     */
    function tag()
    {
    	$config=array();
    	$config['per_page']=5;
    	$current_page= 0; //获取当前分页页码数
    	$config['base_url']=''; //跳转链接
    	$tagword=Common::unescape(trim($this->uri->segment(4)));
    	
    	$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/tag/';
    	if(!empty($tagword))
    	{
    		$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/tag/'.$tagword.'/page/';
    		$current_page=intval($this->uri->segment(6));
    	}
    	else {

    		$current_page=intval($this->uri->segment(4));
    		$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/tag/';
    	}
	    //page还原
	    if(0 == $current_page)
	    {
	      $current_page = 1;
	    }
	    $offset = ($current_page - 1 ) * $config['per_page']; //设置偏移量 限定 数据查询 起始位置（从 $offset 条开始）
	    $this->load->model('LoachBlog/Article_Model');
	    $result = $this->Article_Model->getArticleByTagModel($offset,$config['per_page'],$tagword);
	    $tags=$this->Article_Model->getSomeTagsModel(10);
	    $config['first_link']     ='首页';//首页
	    $config['prev_link']     = '上一页';//上一页
	    $config['next_link']     = '下一页';//下一页
	    $config['last_link']     = '尾页';//尾页
	    $config['full_tag_open'] = '<ul class="pagination">';  
        $config['full_tag_close'] = '</ul>';  
        $config['first_tag_open'] = '<li>';  
        $config['first_tag_close'] = '</li>';  
        $config['prev_tag_open'] = '<li>';  
        $config['prev_tag_close'] = '</li>';  
        $config['next_tag_open'] = '<li>';  
        $config['next_tag_close'] = '</li>';  
        $config['cur_tag_open'] = '<li class="active"><a>';  
        $config['cur_tag_close'] = '</a></li>';  
        $config['last_tag_open'] = '<li>';  
        $config['last_tag_close'] = '</li>';  
        $config['num_tag_open'] = '<li>';  
        $config['num_tag_close'] = '</li>'; 
	    $config['total_rows']     =$result['total'];//总条数
	    $config ['uri_segment'] = 6; 
	    $config['use_page_numbers'] = TRUE;
	    $this->load->library('pagination');//加载ci pagination类
	    $this->pagination->initialize($config);
	   
	    $result = array(
	        'list' => $result['list'],
	        'total'  =>$result['total'],
	        'current_page' => $current_page,
	        'per_page' => $config['per_page'],
	        'page'  => $this->pagination->create_links(),
	        'tagword'=>$tagword,
	        'tags'=>$tags,
	    );
    	$this->load->view('LoachBlog/tag',$result);
    }
    
    
    /**
     * 笔记分类
     */
    function category()
    {
        $config=array();
    	$config['per_page']=5;
    	$current_page= 0; //获取当前分页页码数
    	$config['base_url']=''; //跳转链接
    	$category=Common::unescape(trim($this->uri->segment(4,0)));
    	$categoryword=NULL;
    	
    	$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/category/';
    	if(!is_numeric($category))
    	{
    		$current_page=intval($this->uri->segment(6));
    		$config ['uri_segment'] = 6; 
    		$categoryword=Common::unescape(trim($this->uri->segment(4,0)));
    		$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/category/'.$categoryword.'/page/';
    		
    	}
    	else if(is_numeric($category))
    	{
    		$current_page=intval($this->uri->segment(4));
    		$config ['uri_segment'] = 4; 
    		$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/category/';
    	}
    	else 
    	{
    		$current_page=intval($this->uri->segment(4));
    		$config ['uri_segment'] = 4; 
    		$config['base_url'] = base_url().'index.php/LoachBlog/LoachBlog/category/';
    	}


	    //page还原
	    if(0 == $current_page)
	    {
	      $current_page = 1;
	    }
	    $offset = ($current_page - 1 ) * $config['per_page']; //设置偏移量 限定 数据查询 起始位置（从 $offset 条开始）
	    //加入model层
	    $this->load->model('LoachBlog/Article_Model');
	    //根据笔记分类名称，获取笔记
	    $result = $this->Article_Model->getCategoryModel($offset,$config['per_page'],$category);
	    //获取所有的笔记分类名称和ID
	    $categorys=$this->Article_Model->getCategorysModel();
	    //获取最新的10条标签
	    $tags=$this->Article_Model->getSomeTagsModel(10);
	    //根据
	    $config['first_link']     ='首页';//首页
	    $config['prev_link']     = '上一页';//上一页
	    $config['next_link']     = '下一页';//下一页
	    $config['last_link']     = '尾页';//尾页
	    $config['full_tag_open'] = '<ul class="pagination">';  
        $config['full_tag_close'] = '</ul>';  
        $config['first_tag_open'] = '<li>';  
        $config['first_tag_close'] = '</li>';  
        $config['prev_tag_open'] = '<li>';  
        $config['prev_tag_close'] = '</li>';  
        $config['next_tag_open'] = '<li>';  
        $config['next_tag_close'] = '</li>';  
        $config['cur_tag_open'] = '<li class="active"><a>';  
        $config['cur_tag_close'] = '</a></li>';  
        $config['last_tag_open'] = '<li>';  
        $config['last_tag_close'] = '</li>';  
        $config['num_tag_open'] = '<li>';  
        $config['num_tag_close'] = '</li>'; 
	    $config['total_rows']     = $result['total'];//总条数
	    
	    $config['use_page_numbers'] = TRUE;
	    $this->load->library('pagination');//加载ci pagination类
	    $this->pagination->initialize($config);
        
	    $result = array(
	        'list' => $result['list'],
	        'categorys'=>$categorys,
	        'total'  =>$result['total'],
	        'current_page' => $current_page,
	        'per_page' => $config['per_page'],
	        'page'  => $this->pagination->create_links(),
	        'category'=>$categoryword,
	        'tags'=>$tags,
	    );
    	$this->load->view('LoachBlog/category',$result);
    }
    
    /**
     * 关于我
     */
    function about()
    {
    	$this->load->model('LoachBlog/Article_Model');
    	$tags=$this->Article_Model->getSomeTagsModel(10);
    	$result=array(
    	  'tags'=>$tags,
    	);
    	$this->load->view('LoachBlog/about',$result);
    }
    
    /**获取所有不重复的标签
     * 
     */
    function tags()
    {
    	$config=array();
    	$config['per_page']=100;
    	$current_page= intval($this->uri->segment(4,0)); //获取当前分页页码数
	    //page还原
	    if(0 == $current_page)
	    {
	      $current_page = 1;
	    }
	    $offset = ($current_page - 1 ) * $config['per_page']; //设置偏移量 限定 数据查询 起始位置（从 $offset 条开始）
	    $this->load->model('LoachBlog/Article_Model');
	    $result = $this->Article_Model->getAllTagsModel($offset,$config['per_page']);
	    $config['base_url']      = base_url().'index.php/LoachBlog/LoachBlog/tags';
	    $config['first_link']     ='首页';//首页
	    $config['prev_link']     = '上一页';//上一页
	    $config['next_link']     = '下一页';//下一页
	    $config['last_link']     = '尾页';//尾页
	    $config['full_tag_open'] = '<ul class="pagination">';  
        $config['full_tag_close'] = '</ul>';  
        $config['first_tag_open'] = '<li>';  
        $config['first_tag_close'] = '</li>';  
        $config['prev_tag_open'] = '<li>';  
        $config['prev_tag_close'] = '</li>';  
        $config['next_tag_open'] = '<li>';  
        $config['next_tag_close'] = '</li>';  
        $config['cur_tag_open'] = '<li class="active"><a>';  
        $config['cur_tag_close'] = '</a></li>';  
        $config['last_tag_open'] = '<li>';  
        $config['last_tag_close'] = '</li>';  
        $config['num_tag_open'] = '<li>';  
        $config['num_tag_close'] = '</li>'; 
	    $config['total_rows']     = $result['total'];//总条数
	    $config ['uri_segment'] = 4; 
	    $config['use_page_numbers'] = TRUE;
	    $this->load->library('pagination');//加载ci pagination类
	    $this->pagination->initialize($config);
	    $tags=$this->Article_Model->getSomeTagsModel(10);
	    $result = array(
	        'list' => $result['list'],
	        'total'  => $result['total'],
	        'current_page' => $current_page,
	        'per_page' => $config['per_page'],
	        'page'  => $this->pagination->create_links(),
	        'tags'=>$tags,
	    );
    	$this->load->view('LoachBlog/tags',$result);
    }
    
        

}


?>