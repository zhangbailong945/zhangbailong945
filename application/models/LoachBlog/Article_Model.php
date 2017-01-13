<?php

class Article_Model extends CI_Model
{
	
	 function __construct()
	 {
	    parent::__construct();
	    $this->load->library('Common');
	 }
      /**
       * 查看一篇文章
       * Enter description here ...
       * @param $id  文章编号
       */
	  function getArticleById($id)
	  {
         $data=array();	 
	     $this->db->where('article_id',$id);
         $query=$this->db->get('articles');
         $row=$query->row();
         $plist=$this->getAticlePrevious($id);
         $nlist=$this->getAtitlceNext($id);
                  
	     if(isset($row))
		 {
		$data['article_id']=$row->article_id;
	          $data['article_title']=$row->article_title;
	          $data['article_slug']=$row->article_slug;
	          $data['article_created']=$row->article_created;
	          $data['article_modified']=$row->article_modified;
	          $data['article_text']=$row->article_text;
	          $data['article_order']=$row->article_order;
	          $data['article_authorId']=$row->article_authorId;
	          $data['template']=$row->template;
	          $data['article_type']=$row->article_type;
	          $data['article_status']=$row->article_status;
	          $data['aritcle_commentsNum']=$row->aritcle_commentsNum;
	          $data['article_allowComment']=$row->article_allowComment;
	          $data['article_allowPing']=$row->article_allowPing;
	          $data['article_allowFeed']=$row->article_allowFeed;          

		 }
		 if(count($plist)>0)
		 {
		 	$data['article_pid']=$plist['article_id'];
		 	$data['article_ptitle']=$plist['article_title'];
		 }
		 
	    if(count($nlist)>0)
		 {
		 	$data['article_nid']=$nlist['article_id'];
		 	$data['article_ntitle']=$nlist['article_title'];
		 }

		 
         return $data;
	  }
	  
	  /**
	   * 获取某篇文章的上一篇
	   * Enter description here ...
	   * @param unknown_type $id
	   */
	  function getAticlePrevious($id){
	  	 $data=array();
	     $sql="select * from articles where 1=1 and article_id<".$id." order by article_id";
	     $query=$this->db->query($sql);
	     $row=$query->row();
		 if(isset($row))
			 {
			 	  $data['article_id']=$row->article_id;
		          $data['article_title']=$row->article_title;
		          $data['article_slug']=$row->article_slug;
		          $data['article_created']=$row->article_created;
		          $data['article_modified']=$row->article_modified;
		          $data['article_text']=$row->article_text;
		          $data['article_order']=$row->article_order;
		          $data['article_authorId']=$row->article_authorId;
		          $data['template']=$row->template;
		          $data['article_type']=$row->article_type;
		          $data['article_status']=$row->article_status;
		          $data['aritcle_commentsNum']=$row->aritcle_commentsNum;
		          $data['article_allowComment']=$row->article_allowComment;
		          $data['article_allowPing']=$row->article_allowPing;
		          $data['article_allowFeed']=$row->article_allowFeed;
	
			 }
		 return $data;
	  }
	  
	  /**
	   * 获取某篇文章的下一篇
	   * Enter description here ...
	   * @param $id
	   */
       function getAtitlceNext($id){
	  	 $data=array();
	     $sql="select * from articles where 1=1 and article_id>".$id." order by article_id";
	     $query=$this->db->query($sql);
	     $row=$query->row();
		 if(isset($row))
			 {
			 	  $data['article_id']=$row->article_id;
		          $data['article_title']=$row->article_title;
		          $data['article_slug']=$row->article_slug;
		          $data['article_created']=$row->article_created;
		          $data['article_modified']=$row->article_modified;
		          $data['article_text']=$row->article_text;
		          $data['article_order']=$row->article_order;
		          $data['article_authorId']=$row->article_authorId;
		          $data['template']=$row->template;
		          $data['article_type']=$row->article_type;
		          $data['article_status']=$row->article_status;
		          $data['aritcle_commentsNum']=$row->aritcle_commentsNum;
		          $data['article_allowComment']=$row->article_allowComment;
		          $data['article_allowPing']=$row->article_allowPing;
		          $data['article_allowFeed']=$row->article_allowFeed;
	
			 }
		 return $data;
	  }
	  
	  
	  function articles($offset,$num,$order='article_id desc')
	  {
	        $query = $this->db->query( "SELECT * FROM `articles` WHERE 1=1 order by {$order} limit {$offset},{$num}");
		    return array(
		        'total' => $this->db->count_all('articles'),
		        'list' => $query->result(),
		    );
	  }
	  

	  
      function searchs($offset,$num,$order='article_id desc',$keyword)
	  {
	  	   if(!is_numeric($keyword))
	  	   {
	        $query = $this->db->query( "SELECT * FROM `articles` WHERE 1=1 and article_title like '%{$keyword}%' or article_text like '%{$keyword}%' order by {$order} limit {$offset},{$num}");
		    return array(
		        'list' => $query->result(),
		        'total'=>$this->searchCount($keyword),
		    );
	  	   }
	  	   else
	  	   {
	  	     $query = $this->db->query( "SELECT * FROM `articles` WHERE 1=1");
		      return array(
		        'list' => $query->result(),
		        'total'=>$this->db->count_all('articles'),
		    );
	  	   }
	  }
	  
	  function searchCount($keyword)
	  {
	  	 $query=$this->db->query( "SELECT * FROM `articles` WHERE 1=1 and article_title like '%{$keyword}%' or article_text like '%{$keyword}%'");
	  	 return count($query->result_array());
	  }
	  
	  /**
	   * 获取一篇的文章的所有标签
	   */
	  function getArticleTags($id){
	  	 $data=array();
	     $sql="select rs.article_id as article_id,at.article_type_id as article_type_id,at.article_type_name as article_type_name from relationships as rs inner join article_type as at where 1=1 and rs.article_type_id=at.article_type_id and at.article_type_category='tag' and rs.article_id=".$id."";
	     $query=$this->db->query($sql);
	     if($query)
	     {
	         foreach ($query->result_array() as $row) {
	         	$tags=array();
                $tags['article_id']= $row['article_id'];
                $tags['article_type_id']= $row['article_type_id'];
                $tags['article_type_name']= $row['article_type_name'];
                $data[]=$tags;
            }
            
	     }
	     
	     return $data;
	     
	  }
	  
	  /**
	   * 
	   * 返回最新的3条笔记
	   */
	  function getRecentThreeModel()
	  {
	  	  $data=array();
	  	  $this->db->select('article_id,article_title,article_created');
		  $this->db->order_by("article_id", "desc");
		  $this->db->limit(3);
		  $query = $this->db->get('articles');
		  foreach ($query->result_array() as $row)
		  {
			  $list=array();
	          $list['article_id']=$row['article_id'];
	          $list['article_title']=$row['article_title'];
	          $list['article_created']=Common::dateWord($row['article_created'],time());
              $data[]=$list;
		  }
         return $data;
	  }
             
            function getRecentToRss()
	  {
	     $xmlString='';
	     $this->db->select('article_id,article_title,article_created,article_text');
	     $this->db->order_by('article_id','desc');
	     $this->db->limit(10);
	     $query=$this->db->get('articles');
	     foreach ($query->result_array() as $row)
	     {
	        $xmlString.='
	        <item>
	          <title>'.$row["article_title"].'</title>
              <link>http://zhangbailong.com/LoachBlog/LoachBlog/article/'.$row["article_id"].'</link>
              <description>'.htmlspecialchars($row["article_text"]).'</description>
              <pubDate>'.date("D, d M Y H:i:s T",$row["article_created"]).'</pubDate>
	        </item>
	        ';
	     }
	     
	     return $xmlString;
	  }
	  
	  /**
	   * 获取一些tags
	   * @param $offset 获取多少个tag 
	   */
	  function getSomeTagsModel($offset)
	  {
	      $data=array();
	      $this->db->select('article_type_slug');
	      $this->db->from('articles');
	      $this->db->join('relationships','articles.article_id=relationships.article_id');
	      $this->db->join('article_type','article_type.article_type_id=relationships.article_type_id and article_type.article_type_category="tag"');
	      $this->db->order_by('articles.article_id','desc');
	      $this->db->limit($offset);
	      $this->db->distinct();
	      $query=$this->db->get();
	      foreach ($query->result_array() as $row)
		  {
	              $data[]=$row['article_type_slug'];
		  }
         return $data;
	      
	  }
	  
	  
	  function getAllTagsModel($offset,$perpage)
	  {
	  	  $data=array();
	      $this->db->select('article_type_slug');
	      $this->db->from('articles');
	      $this->db->join('relationships','articles.article_id=relationships.article_id');
	      $this->db->join('article_type','article_type.article_type_id=relationships.article_type_id and article_type.article_type_category="tag"');
	      $this->db->order_by('articles.article_id','desc');
	      $this->db->limit($perpage,$offset);
	      $this->db->distinct();
	      $query=$this->db->get();
	      	      foreach ($query->result_array() as $row)
		  {
	          $data[]=$row['article_type_slug'];
		  }
	      return array(
		        'total' =>$this->getAllTagsCountModel(),
		        'list' =>$data,
		    );
	  }
	  
	  function getAllTagsCountModel()
	  {
	      $this->db->select('article_type_slug');
	      $this->db->from('articles');
	      $this->db->join('relationships','articles.article_id=relationships.article_id');
	      $this->db->join('article_type','article_type.article_type_id=relationships.article_type_id and article_type.article_type_category="tag"');
	      $this->db->order_by('articles.article_id','desc');
	      $query=$this->db->get();
	      return count($query->result_array());
	  }
	  
      /**
	   * 获取一些tags
	   * @param $offset 获取多少个tag 
	   */
	  function getArticleByTagModel($offset,$perpage,$tagword)
	  {
	      $data=array();
	      $this->db->select();
	      $this->db->from('articles');
	      $this->db->join('relationships','articles.article_id=relationships.article_id');
	      $this->db->join('article_type',"article_type.article_type_id=relationships.article_type_id and article_type.article_type_category='tag' and article_type.article_type_slug='{$tagword}'");
	      $this->db->order_by('articles.article_id','desc');
	      $this->db->limit($perpage,$offset);	      
	      $query=$this->db->get();
          return array(
		        'total' =>$this->getArticleByTagCount($tagword),
		        'list' => $query->result(),
		    );
	      
	  }
	  
	  /**
	   * 标签是$tagword 共有多少条
	   * @param $tagword
	   */
	  function getArticleByTagCount($tagword)
	  {
	      $sql='SELECT * FROM  `articles` JOIN  `relationships` ON  `articles`.`article_id` =  `relationships`.`article_id` JOIN  `article_type` ON  `article_type`.`article_type_id` =  `relationships`.`article_type_id` AND `article_type`.`article_type_category` =  "tag" AND  `article_type`.`article_type_slug` =  "'.$tagword.'" ORDER BY  `articles`.`article_id` DESC';
	      $query=$this->db->query($sql);	      
	      return count($query->result_array());
	  }
	  
      /**
       * 通过分类名称获取文章
       * 
       * @param $offset   偏移量
       * @param $perpage  显示数量
       * @param $category  分类名称
       */
	  function getCategoryModel($offset,$perpage,$category)
	  {
	      $this->db->select();
	      $this->db->from('articles');
	      $this->db->join('relationships','articles.article_id=relationships.article_id');	      
	      
	      if(!is_numeric($category))
	      {
	        $this->db->join('article_type',"article_type.article_type_id=relationships.article_type_id and article_type.article_type_category='category' and article_type.article_type_name='{$category}'");   
            $this->db->order_by('articles.article_id','desc');
	        $this->db->limit($perpage,$offset);	     	      
		    $query=$this->db->get();	      
	        return array(
			        'total' =>$this->getCategoryCountModel($category),
			        'list' => $query->result(),
			    );
	      }
	      else 
	      {
	        $this->db->join('article_type',"article_type.article_type_id=relationships.article_type_id and article_type.article_type_category='category'"); 
	        $this->db->order_by('articles.article_id','desc');
	        $this->db->limit($perpage,$offset);	     	      
	        $query=$this->db->get();	      
	          return array(
			        'total' =>$this->getCategoryCountModel2(),
			        'list' => $query->result(),
			    );
	      }
	      
	  }
	  	  
	  /**
	   * 获取所有分类的文章总数
	   */
	  function getCategoryCountModel($category)
	  {
	  	  $sql='SELECT * FROM  `articles` JOIN  `relationships` ON  `articles`.`article_id` =  `relationships`.`article_id` JOIN  `article_type` ON  `article_type`.`article_type_id` =  `relationships`.`article_type_id` AND `article_type`.`article_type_category` =  "category" AND  `article_type`.`article_type_name` =  "'.$category.'" ORDER BY  `articles`.`article_id` DESC';
	      $query=$this->db->query($sql);	  	      
	      return count($query->result_array());
	  }
	  
/**
	   * 获取所有分类的文章总数
	   */
	  function getCategoryCountModel2()
	  {

	  	  $sql='SELECT * FROM  `articles` JOIN  `relationships` ON  `articles`.`article_id` =  `relationships`.`article_id` JOIN  `article_type` ON  `article_type`.`article_type_id` =  `relationships`.`article_type_id` AND `article_type`.`article_type_category` =  "category" ORDER BY  `articles`.`article_id` DESC';
	      $query=$this->db->query($sql);	  	      
	      return count($query->result_array());
	  }
	  
	  /**
	   * 获取所有的笔记分类名称和总数
	   * Enter description here ...
	   */
	  function getCategorysModel()
	  {
	  	 $data=array();
	     $this->db->select();
	     $this->db->from('article_type');
	     $this->db->where('article_type_category','category');
	     $this->db->order_by('article_type_id','asc');
	     
	     $query=$this->db->get();
	     
	     
	     foreach ($query->result_array() as $row)
		  {
		  	  $list=array();
	          $list['article_type_name']=$row['article_type_name'];
	          $list['article_count']=$this->getCategorysCountModel($row['article_type_name']);
	          $data[]=$list;
		  }
         return $data;
	    
	  }
	  
	  /**
	   * 返回某个笔记类的总文章数
	   */
	  function getCategorysCountModel($category)
	  {
	      $sql='SELECT * FROM  `articles` JOIN  `relationships` ON  `articles`.`article_id` =  `relationships`.`article_id` JOIN  `article_type` ON  `article_type`.`article_type_id` =  `relationships`.`article_type_id` AND `article_type`.`article_type_category` =  "category" AND  `article_type`.`article_type_name` =  "'.$category.'" ORDER BY  `articles`.`article_id` DESC';
	      $query=$this->db->query($sql);	  
	      return count($query->result_array());
	  }
	  
           /**
	   * 获取某个年月的所有文字
	   * Enter description here ...
	   * @param $offset    偏移
	   * @param $perpage   每页显示页数
	   * @param $datetime  年月
	   */
	  function getArchivesArticles($offset,$perpage,$datetime)
	  {
	     $data=array();
	      $this->db->select();
	      $this->db->from('articles');
          $this->db->like('FROM_UNIXTIME(article_created, "%Y-%m")',$datetime,'after');
$this->db->order_by('article_created','desc');
	      $this->db->limit($perpage,$offset);
	      
	      $query=$this->db->get();
          return array(
		        'total' =>$this->getArchivesArticlesCount($datetime),
		        'list' => $query->result(),
		    );
	  }
	  
	  /**
	   * 
	   * 获取某个年月的笔记总数
	   * @param $datetime xxx年xx月
	   */
	  function getArchivesArticlesCount($datetime)
	  {
	      $this->db->select();
	      $this->db->from('articles');
          $this->db->like('FROM_UNIXTIME(article_created, "%Y-%m")',$datetime,'after');    
	      $query=$this->db->get();
	      return count($query->result_array());
	  }

	  /**
	   * 返回文章通过年
	   */
	  function archives()
	  {
	  	   $data=array();
	       $this->db->select('FROM_UNIXTIME(article_created, "%Y") as article_created,count(*) as year_total');
	       $this->db->from('articles');
	       $this->db->group_by('FROM_UNIXTIME(article_created, "%Y")');
	       $this->db->order_by('article_created','desc');	      
	       $query=$this->db->get();
	        foreach ($query->result_array() as $row)
		  {
		  	  $list=array();
	          $list['article_created']=$row['article_created'];
	          $list['year_total']=$row['year_total'];
	          $list['mlist']=$this->getArchivesByMonth($row['article_created']);
	          $data[]=$list;
		  }
		  
         return $data;
	       
	  }
	  
	  /**
	   * 取出某年的所有月份
	   * Enter description here ...
	   */
	  function getArchivesByMonth($year)
	  {
	  	   $this->db->select('FROM_UNIXTIME(article_created, "%Y-%m") as article_year,FROM_UNIXTIME(article_created, "%m") as article_month,count(*) as month_total');
	       $this->db->from('articles');
	       $this->db->like('FROM_UNIXTIME(article_created, "%Y-%m")',$year,'after');
	       $this->db->group_by('FROM_UNIXTIME(article_created, "%m")');
	       $this->db->order_by('article_created','desc');	  
	       $query=$this->db->get();
	       return $query->result_array();
	  }


}