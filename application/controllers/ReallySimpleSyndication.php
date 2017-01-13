<?php

/**
 * 
 * RSS生成控制器
 * @author zhangbailong
 *
 */
class ReallySimpleSyndication extends CI_Controller
{
	/**
	 * 构造函数
	 */
    function __construct()
    {
    	parent::__construct();
    	$this->load->database();
    	$this->load->library('Common');
    }
    
    /**
     * 发布rss订阅xml
     */
    function rss()
    {
       
       $xmlString=$this->createChannelStart().$this->createItem().$this->createChannelEnd();
       header("Content-type:text/xml");
       echo trim($xmlString);
       exit;
    }
    
    /**
     * 创建channel 开头部分
     */
    function createChannelStart()
    {
       $nowtime=date('D, d M Y H:i:s T');
       $xmlString='
       <?xml version="1.0" encoding="UTF-8"?>
       <rss version="2.0">
             <channel>
             <title>LoachBlog|个人笔记 RSS</title>
             <link>http://zhangbailong.com/ReallySimpleSyndication/rss</link>
             <description>loachblog 个人笔记rss</description>
             <language>zh-cn</language>
             <pubDate>'.$nowtime.'</pubDate>
             <lastBuildDate>'.$nowtime.'</lastBuildDate>
             <docs>http://zhangbailong.com</docs>
             <managingEditor>zhangbailong945@outlook.com</managingEditor>
             <webMaster>zhangbailong945@outlook.com</webMaster>
       ';
       
       return $xmlString;
    }
    
    /**
     * 创建channel item文章列表
     */
    function createItem()
    {
        $this->load->model('LoachBlog/Article_Model');     //载入文章model层
    	$data=$this->Article_Model->getRecentToRss(); //执行model方法
    	return $data;
    }
    
    /**
     * 创建rss channel结束格式
     */
    function createChannelEnd()
    {
      $xmlString='
             </channel>
       </rss>
      ';
      return $xmlString;
    }
}