<?php
$LoachBlogSrc_Path=base_url()."communal/LoachBlog"; 
$submit_Path=site_url();
$ue_Path=base_url()."communal/ueditor";
$ci_obj = & get_instance(); 
$ci_obj->load->library('Common');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $article_title; ?></title>
    <meta name="description" content="<?php echo $article_title; ?>">
    <meta name="keywords" content="<?php if(!empty($tagstr)){echo $tagstr;}else{echo $article_title;}?>">
    <meta name="HandheldFriendly" content="True">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo $LoachBlogSrc_Path; ?>/favicon.ico">
    <link rel="stylesheet" href="<?php echo $LoachBlogSrc_Path; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $LoachBlogSrc_Path; ?>/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $LoachBlogSrc_Path; ?>/css/screen.css">
    <script type="text/javascript" src="<?php echo $LoachBlogSrc_Path; ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $LoachBlogSrc_Path; ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $LoachBlogSrc_Path;?>/js/jquery.more.js"></script>
    <link href="<?php echo $ue_Path; ?>/third-party/SyntaxHighlighter/shCoreDefault.css" rel="stylesheet" type="text/css" />   
    <script type="text/javascript" src="<?php echo $ue_Path; ?>/third-party/SyntaxHighlighter/shCore.js"></script> 
    <script type="text/javascript" src="<?php echo $LoachBlogSrc_Path;?>/js/md5.js"></script>
    <script type="text/javascript" src="<?php echo $LoachBlogSrc_Path;?>/js/data.js"></script>

    <script type="text/javascript">       
         SyntaxHighlighter.all();  //编程语言高亮
   </script>
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
					        <li class="nav-current" role="presentation"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/index">首页</a></li>
					        <li role="presentation"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/category">笔记分类</a></li>
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
              <main class="col-md-8 main-content">
                <article id="91" class="post tag-about-ghost tag-zhu-shou-han-shu tag-jquery">
					    <header class="post-head">
					        <h1 class="post-title"><?php echo $article_title; ?></h1>
					        <section class="post-meta">
					            <span class="author">作者：<a href="#">loach</a></span>
					            <time class="post-date" datetime="<?php echo Common::dateWord($article_created,time());?>" title="<?php echo Common::dateWord($article_created,time());?>"><?php echo Common::dateWord($article_created,time());?></time>
					            <span class="author">分类：<a href="<?php echo $submit_Path.'LoachBlog/LoachBlog/category/'.$article_type_name; ?>"><?php echo $article_type_name?></a></span>
					        </section>
					    </header>
					
					
					    <section class="post-content">
                        <?php echo $article_text; ?>
					    </section>
					
					    <footer class="post-footer clearfix">
					        <div class="pull-left tag-cloud">
					            <i class="fa fa-folder-open-o"></i>
					            <?php 
								   if(count($articleTags)>0)
								   {
									   foreach ($articleTags as $tag){
									   	   echo "<a class='article_tag' href='".$submit_Path."LoachBlog/LoachBlog/tag/".$tag['article_type_name']."'>".$tag['article_type_name']."</a>";
									   }
								   }
								   else 
								   {
								   	  echo "<b style='color:#DDDDDD'>暂无标签</b>";
								   }
								  
								?>							            
					        </div>
<!-- 分享插件百度 开始-->

<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"0","bdPos":"left","bdTop":"100"},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<!-- 分享插件百度结束-->			
					    </footer>
					
					</article>
					
					<div class="prev-next-wrap clearfix">
					    <?php 
					       if(!empty($article_pid))
					       {
					       	  echo "<a class='btn btn-default' href='".$submit_Path."LoachBlog/LoachBlog/article/".$article_pid."'><i class='fa fa-angle-left fa-fw'></i>".$article_ptitle."</a>";
					       }
					    ?>					    
					    &nbsp;
					    <?php 
					       if(!empty($article_nid))
					       {
					       	  echo "<a class='btn btn-default' href='".$submit_Path."LoachBlog/LoachBlog/article/".$article_nid."'><i class='fa fa-angle-right fa-fw'></i>".$article_ntitle."</a>";
					       }
					    ?>	
					</div>

					<div class="about-author clearfix">
                     <h3>留言</h3>
                             <!-- 多说评论框 start -->
	                        <div class="ds-thread" data-thread-key="<?php echo $article_id; ?>" data-title="<?php echo $article_title; ?>" data-url="<?php echo $submit_Path; ?>LoachBlog/LoachBlog/article/<?php echo $article_id;?>">
	                        	
	                        </div>
							<!-- 多说评论框 end -->
							<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
							<script type="text/javascript">
							var duoshuoQuery = {short_name:"zhangbailong"};
								(function() {
									var ds = document.createElement('script');
									ds.type = 'text/javascript';ds.async = true;
									ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
									ds.charset = 'UTF-8';
									(document.getElementsByTagName('head')[0] 
									 || document.getElementsByTagName('body')[0]).appendChild(ds);
								})();
								</script>
							<!-- 多说公共JS代码 end -->
							</div>
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
				<!-- end tag cloud widget -->	
				
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
				<div class="widget">
					<h4 class="title">微信订阅号</h4>
					<div class="content download">
						<img src="<?php echo $LoachBlogSrc_Path;?>/img/gzh.png" width="100%" alt="微信订阅号"/>
					</div>
				</div>
				<!-- end widget -->
				

				
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
                        
                               
                                <div class="recent-single-post">
                                    <a href="#" class="post-title">程序员的一生</a>
                                    <div class="date">2016年7月26日</div>
                                </div>
                                <div class="recent-single-post">
                                    <a href="#" class="post-title">一个安静的程序员</a>
                                    <div class="date">2016年4月28日</div>
                                </div>
                                <div class="recent-single-post">
                                    <a href="#" class="post-title">奋斗的程序员</a>
                                    <div class="date">2016年3月23日</div>
                                </div>
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
