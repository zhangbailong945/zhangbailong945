<?php

/**
 * 文章类型模型层
 * Enter description here ...
 * @author Administrator
 *
 */
class ArticleType_Model extends CI_Model
{
	/**
	 * 获取文章类型集合
	 * Enter description here ...
	 */
	public function getArticleTypeData()
	{
         $data=array();	 
	     $query= $this->db->query("select * from article_type where 1=1 and article_type_category='category'");
		 foreach ($query->result_array() as $row)
		 {
			  $list=array();
	          $list['article_type_id']=$row['article_type_id'];
	          $list['article_type_name']=$row['article_type_name'];
              $data[]=$list;
		 }
         return $data;
	}
	
	/**
	 * 返回值属于【分类】的笔记类型集合
	 * Enter description here ...
	 */
	public function getArticleTypeList()
	{
	   $this->db->select();
	   $this->db->from('article_type');
	   $this->db->where('article_type_category=','category');
	   $query=$this->db->get();
	   return $query->result_array();
	}
	
	public function list_article_type()
	{

	    $data=array();	 
	     $query= $this->db->query("select * from article_type inner join relationships where article_type.article_type_id=relationships.article_type_id and article_type.article_type_category='category'");
		 foreach ($query->result_array() as $row)
		 {
			  $list=array();
	          $list['article_type_id']=$row['article_type_id'];
	          $list['article_type_name']=$row['article_type_name'];
	          $list['article_type_slug']=$row['article_type_slug'];
	          $list['article_type_category']=$row['article_type_category'];
	          $list['article_type_description']=$row['article_type_description'];
	          $list['article_type_count']=$row['article_type_count'];
	          $list['article_type_order']=$row['article_type_order'];
	          $list['article_id']=$row['article_id'];
              $data[]=$list;
		 }
         return $data;
	}
	
	/**
	 * 新增 返回受影响行数 否则false
	 */
	function insert($data)
	{
	   return $this->db->insert('article_type',$data);
	}
	
	/**
	 * 更新某个笔记类型
	 * @param $id  笔记类型ID
	 * @param $data  要修改的笔记类型字段集合
	 */
	function update($id,$data)
	{
	   $this->db->where('article_type_id',$id);
	   return $this->db->update('article_type',$data);
	}
	
	/**
	 * 根据ID 删除笔记类型
	 * @param $id
	 */
	function delete($id)
	{
	   $this->db->where('article_type_id',$id);
	   $this->db->delete('article_type');
	   return $this->db->affected_rows()>0?true:false;
	}
	
	function delete_batch($ids)
	{
	   $this->db->where_in('article_type_id',$ids);
	   $this->db->delete('article_type');
	   return $this->db->affected_rows()>0?true:false;
	}
	
}