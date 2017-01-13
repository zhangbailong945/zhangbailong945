<?php
class Article_Model extends CI_Model{
	
  public function __construct()
  {
        $this->load->database();
      
  }

  /**
   * 批量插入tag类型
   * Enter description here ...
   * @param $data
   */
  public function insert_batch($table,$data)
  {
  	
  	return $this->db->insert_batch($table,$data);
  
  }
  
  public function get_articletypeId_last_three($limit)
  {
     $result = array();
     $sql="SELECT article_type_id FROM `article_type` order by article_type_id desc limit $limit";
        $query = $this->db->query($sql);
        if ($query) {
            foreach ($query->result_array() as $row) {
                $result[]= $row['article_type_id'];
            }
        }
        return $result;
  }
  
  /**
   * 后台 获取笔记列表
   * Enter description here ...
   */
  public function getArticleList()
  {
	      $this->db->select('a.article_id as article_id,a.article_title as article_title,a.article_slug as article_slug,a.article_created as article_created,a.article_modified as article_modified,a.article_text as article_text,a.article_order as article_order,a.article_authorId as article_authorId,a.template as template,a.article_type as article_type,a.article_status as article_status,a.aritcle_commentsNum as aritcle_commentsNum,at.article_type_id as article_type_id,at.article_type_name as article_type_name,at.article_type_slug as article_type_slug,at.article_type_category as article_type_category');
	      $this->db->from('articles as a');
	      $this->db->join('relationships as rs','a.article_id=rs.article_id');
	      $this->db->join('article_type as at',"rs.article_type_id=at.article_type_id and at.article_type_category='category'");
	      $this->db->order_by('a.article_id','desc');
	      $query=$this->db->get();
	      return $query->result_array();
  }


}