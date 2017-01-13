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

    <title>
    <?php 
     if(!empty($datetime))
      {
          echo 'LoachBlog 个人笔记|笔记'.$datetime.'';       
      }
      else
      {
      	echo 'LoachBlog 个人笔记|笔记归档';
      }
      ?>
     </title>
    <meta name="description" content="LoachBlog 个人笔记|笔记归档">
    <meta name="keywords" content="LoachBlog,个人笔记,笔记归档">
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
					        <li role="presentation"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/category">笔记分类</a></li>
					        <li role="presentation"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/date">时光轴</a></li>					        
<li role="presentation" class="nav-current"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/archives">笔记归档</a></li>					       
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
                   if(!empty($datetime))
                   {
                   	  echo "<div class='cover tag-cover'>";
                   	  echo " <h3 class='tag-name'>";
                   	  echo $datetime;
                   	  echo "</h3>";
                   	  echo "<div class='post-count'>";
                   	  echo "在 <span class='tagword'><font color='#e67e22'>".$datetime."</font></span>期间，共有<font color='#e67e22'>".$total."</font>篇笔记";
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
				
				<!-- start archive -->
				
				<div class="widget">
					<h4 class="title">笔记归档</h4>
					<div class="content download">
					<?php 
					foreach ($monthList as $li)
	                           {
	                          	   echo "<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>";
	                          	   echo "<div class='panel panel-default'> ";
	                          	   echo " <div class='panel-heading'>";
	                          	   echo "<h4 class='panel-title'>";
	                          	   echo "<a data-toggle='collapse' data-parent='#accordion' href='#collapse".$li['article_created']."' aria-expanded='true' aria-controls='collapse".$li['article_created']."'>".$li['article_created']."年</a>";
	                          	   echo "<right><span class='badge' style='float:right;'>".$li['year_total']."篇</span></right>";
	                          	   echo "</h4>";
	                          	   echo "</div>";
	                          	   echo "<div id='collapse".$li['article_created']."' class='panel-collapse collapse' role='tabpanel'> ";
	                          	   echo "<div class='panel-body'>";
	                          	   echo "<ul class='list-group'>";
	                          	   foreach ($li['mlist'] as $ml)
	                          	   {
		                          	   echo "<li class='list-group-item'>";
		                          	   echo "<span class='badge'>".$ml['month_total']."</span>";
		                          	   echo "<a href='".$submit_Path."LoachBlog/LoachBlog/archives/".$ml['article_year']."'>".$ml['article_month']."月份</a>";
		                          	   echo "</li>";                  	   	
	                          	   }	                          	   
	                          	   echo "</ul>";
	                          	   echo "</div>";
	                          	   echo "</div>";
	                          	   echo "</div> ";
	                          	   echo "</div> ";
	                           }	
	                ?>    
					   
					</div>
				</div>
				<!-- end archive -->		
				
				<!-- start tag cloud widget -->
				<div class="widget">
					<h4 class="title">标签云</h4>
					<div class="content tag-cloud">
						<?php 
                           foreach ($tags as $key=>$tag)
			                  {
			                     echo '<a href="'.$submit_Path.'/LoachBlog/LoachBlog/tag/'.$tag.'">'.$tag.'</a>';
			                  }
			            ?>
                            <a href="<?php echo $submit_Path;?>/LoachBlog/LoachBlog/tags">...</a>
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
			                     echo '<a href="'.$submit_Path.'/LoachBlog/LoachBlog/tag/'.$tag.'">'.$tag.'</a>';
			                  }
			            ?>
                            <a href="<?php echo $submit_Path;?>/LoachBlog/LoachBlog/tags">...</a>
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
