<?php
$LoachBlogSrc_Path=base_url()."communal/LoachBlog"; 
$submit_Path=site_url();
$ci_obj = & get_instance(); 
$ci_obj->load->library('Common');
$key='zhangbailongLoachBlog';
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php if(!empty($category)){echo "笔记分类：".$category;}else{echo "LoachBlog个人笔记 | 笔记分类";}?></title>
    <meta name="description" content="LoachBlog笔记分类">
    <meta name="keywords" content=" <?php if(!empty($category)){echo "笔记分类：".$category;}else{echo "LoachBlog,笔记分类";}?>">
    <meta name="HandheldFriendly" content="True">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo $LoachBlogSrc_Path; ?>/favicon.ico">
    <link rel="stylesheet" href="<?php echo $LoachBlogSrc_Path; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $LoachBlogSrc_Path; ?>/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $LoachBlogSrc_Path; ?>/css/screen.css">
    <script type="text/javascript" src="<?php echo $LoachBlogSrc_Path; ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $LoachBlogSrc_Path; ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $LoachBlogSrc_Path;?>/js/jquery.more.js"></script>
    <script type="text/javascript" src="<?php echo $LoachBlogSrc_Path;?>/js/data.js"></script>

    <link rel="canonical" href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/category">
</head>


<body class="home-template">

    <!-- start header -->
    <header class="main-header" style="background-image: url(<?php echo $LoachBlogSrc_Path; ?>/img/headerbg.jpg);" "="">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- start logo -->
                    <a class="branding" href="<?php echo $submit_Path; ?>" title="LoachBlog个人笔记"><img src="<?php echo $LoachBlogSrc_Path; ?>/img/logo.png" alt="LoachBlog"></a>
                    <h1><font color="#ffffff">LoachBlog</font> 个人笔记</h1>
                    <!-- end logo -->
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->

    <!-- start navigation -->
    <nav class="main-navigation">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="navbar-header">
                        <span class="nav-toggle-button collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars"></i>
                        </span>
                    </div>
                    <div class="navbar-collapse collapse" id="main-menu" aria-expanded="false" style="height: 1px;">
                        <ul class="menu">
					        <li role="presentation"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/index">首页</a></li>
					        <li role="presentation" class="nav-current"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/category">笔记分类</a></li>
					        <li role="presentation"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/date">时光轴</a></li>					        
<li role="presentation"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/archives">笔记归档</a></li>					       
 <li role="presentation"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/about">关于我</a></li>
					     </ul>   
		            </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navigation -->


    <!-- start site's main content area -->
    <section class="content-wrap">
        <div class="container">
            <div class="row">
            
              <main class="col-md-8 main-content" id="search">
	            <?php 
                   if(!empty($category))
                   {
                   	  echo "<div class='cover tag-cover'>";
                   	  echo " <h3 class='tag-name'>";
                   	  echo "分类：".$category;
                   	  echo "</h3>";
                   	  echo "<div class='post-count'>";
                   	  echo "共搜索到以  <span class='tagword'><font color='#e67e22'>".$category."</font></span> 分类的, <font color='#e67e22'>".$total."</font> 篇笔记.";
                   	  echo "</div>";
                   	  echo "</div>";
                   }
	            ?>

                <?php 
                  foreach ($list as $li)
                  {
                  	 $article_created=Common::dateWord($li->article_created,time());
                  	 $article_title=$li->article_title;
                  	 $article_text=trim((mb_substr(strip_tags($li->article_text),0,300,'utf-8')));
                  	 $article_id=$li->article_id;
                  	 echo "<article id='".$article_id."' class='post tag-about-ghost tag-release featured'>";
                  	 echo "<div class='featured' title='推荐文章'><i class='fa fa-star'></i></div>";
                  	 echo "<div class='post-head'>";
                  	 echo "<h1 class='post-title'><a href='".$submit_Path."LoachBlog/LoachBlog/article/".$article_id."'>".$article_title."</a></h1>";
                  	 echo "<div class='post-meta'>";
                  	 echo "<span class='author'>作者：<a href=''>loach</a></span>";
                  	 echo "<time class='post-date' datetime='".$article_created."' title='".$article_created."'>".$article_created."</time>";
                  	 echo "</div>";
                  	 echo "</div>";
                  	 echo "<div class='post-content'>";
                  	 echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$article_text."</p>";
                  	 echo "</div>";
                  	 echo "<div class='post-permalink'>";
                  	 echo "<a href='".$submit_Path."LoachBlog/LoachBlog/article/".$article_id."' class='btn btn-default'>阅读全文</a>";
                  	 echo "</div>";
                  	 echo "</article>";
                  }
                ?>
                
				<nav class="page" role="navigation">
				    <?php echo $page; ?>
				</nav>


                </main>

                <aside class="col-md-4 sidebar">
                <!-- start widget -->
                <!-- end widget -->	

				<!-- start tag cloud widget -->
				<div class="widget">
					<h4 class="title">搜索</h4>
					<div class="content community">
						<p><input id="keyword" type="text" /><a href="javascript:void(0);" onclick="dosearch('<?php echo $submit_Path; ?>LoachBlog/LoachBlog/search/','<?php echo $submit_Path; ?>LoachBlog/LoachBlog/search/'+document.getElementById('keyword').value+'/page/',document.getElementById('keyword').value)" class="btn btn-default">搜索</a></p>
					</div>
				</div>
				<!-- end tag cloud widget -->	
				
				<!-- start tag cloud widget -->
				<div class="widget">
					<h4 class="title">笔记分类</h4>
					<div class="content tag-cloud">
						<?php 
                              for($i=0;$i<count($categorys);$i++)
			                  {
			                     echo '<a href="'.$submit_Path.'LoachBlog/LoachBlog/category/'.$categorys[$i]["article_type_name"].'">'.$categorys[$i]["article_type_name"].'(<font color="blue">'.$categorys[$i]["article_count"].'</font>)</a>';
			                  }
			            ?>
					</div>
				</div>
				<!-- end tag cloud widget -->					
				
				<!-- start widget -->
				<div class="widget">
					<h4 class="title">微信订阅号</h4>
					<div class="content download">
						<img src="<?php echo $LoachBlogSrc_Path;?>/img/gzh.png" width="100%" alt="微信订阅号"/>
					</div>
				</div>
				<!-- end widget -->
				
				<!-- start tag cloud widget -->
				<div class="widget">
					<h4 class="title">联系</h4>
					<div class="content community">
						<p><a href="mailto:zhangbailong945@outlook.com" title="zhangbailong945@outlook.com" target="_blank"><i class="fa fa-comments"></i> 留言给我</a></p>
						<p><a href="http://www.weibo.com/u/2734251684?is_all=1" title="loach" target="_blank"><i class="fa fa-weibo"></i> 官方微博</a></p>
					</div>
				</div>
				<!-- end tag cloud widget -->	
				
				
				
				<!-- start widget -->
				<!-- end widget -->	
				
				<!-- start widget -->
				<!-- end widget -->                </aside>

            </div>
        </div>
    </section>

    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="widget">
                        <h4 class="title">最新文章</h4>
                        <div class="content recent-post">
<?php 
                              $i=0; //获取文章次数
			                  foreach ($list as $at)
			                  {
			                    if($i>4)
			                    {
			                    	return;
			                    }
			                    else 
			                    {
			                    	$article_created=Common::dateWord($li->article_created,time());
                  	                $article_id=$li->article_id;
			                    	echo "<div class='recent-single-post'>";
			                    	echo "<a href='".$submit_Path."LoachBlog/LoachBlog/article/".$article_id."' class='post-title'>".$at->article_title."</a>";
			                    	echo "<div class='date'>".$article_created."</div>";
			                    	echo "</div>";
			                    }
			                    
			                  	$i++;
			                  }
			                  ?>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="widget">
                        <h4 class="title">标签云</h4>
                        <div class="content tag-cloud">
                                <?php 
                           foreach ($tags as $key=>$tag)
			                  {
			                     echo '<a href="'.$submit_Path.'LoachBlog/LoachBlog/tag/'.$tag.'">'.$tag.'</a>';
			                  }
			            ?>
                            <a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/tags">...</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="widget">
                        <h4 class="title">合作伙伴</h4>
                        <div class="content tag-cloud friend-links">
                            <a href="#" title="loach微博"  target="_blank">loach微博</a>
                            <a href="#" title="loach邮箱"  target="_blank">loach邮箱</a>
                            <hr>
                            <a href="#" title="虚拟以待"  target="_blank">虚拟以待</a>
                            <a href="#" title="虚拟以待"  target="_blank">虚拟以待</a>
                            <hr>
                            <a href="#" title="虚拟以待"  target="_blank">虚拟以待</a>
                            <a href="#" title="虚拟以待"  target="_blank">虚拟以待</a>
                        </div>
                </div></div>
            </div>
        </div>
    </footer>

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <span>Copyright &copy; <a href="http://www.zhangbailong.com">LoachBlog个人笔记</a></span> | 
                    <span><a href="http://www.miibeian.gov.cn/" target="_blank">粤ICP备16026304号-1</a></span> 
                </div>
            </div>
        </div>
    </div>

   	<div id="shape">
		<div class="shapeColor">
			<div class="shapeFly">
			</div>
		</div>
	</div>
    
<script type="text/javascript">
  var $recentUrl="<?php echo $submit_Path;?>LoachBlog/LoachBlog/getRecentThree";
  var $articleUrl="<?php echo $submit_Path;?>LoachBlog/LoachBlog/article";
  $(function(){
	  getRecentThree($recentUrl,$articleUrl);
  });  
  
</script>
<script type="text/javascript" src="<?php echo $LoachBlogSrc_Path;?>/js/baidu.js"></script>
</body>
</html>
