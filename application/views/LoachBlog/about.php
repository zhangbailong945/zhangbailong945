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

    <title>LoachBlog | 关于我</title>
    <meta name="description" content="关于我">
    <meta name="keywords" content="loach,个人笔记,关于我">
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

    <link rel="canonical" href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/about">
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
					        <li role="presentation"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/index">首页</a></li>
					        <li role="presentation"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/category">笔记分类</a></li>
					        <li role="presentation"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/date">时光轴</a></li>					        
<li role="presentation"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/archives">笔记归档</a></li>					       
 <li role="presentation" class="nav-current"><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/about">关于我</a></li>
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
                <article id="about" class="post tag-about-ghost tag-zhu-shou-han-shu tag-jquery">
                   <header class="post-head">
				        <h1 class="post-title">关于我</h1>
				    </header>				
				    <section class="post-content">
				      <blockquote>				      
				       <p>关于我</p>
				      </blockquote>
							<p>
							    本名：潇洒泥鳅<img width="212" height="200" title="潇洒泥鳅" style="width: 212px; height: 200px; float: left;" alt="me.png" src="<?php echo $LoachBlogSrc_Path;?>/img/author.png" border="0" vspace="0" hspace="0"/>
							</p>
							<p>
							    座右铭：有志者，事竞成；苦心人，天不负。
							</p>
							<p>
							    <br/>
							</p>
							<p>
							    杂记：我是一个懒惰，没点干劲的PHP程序员，写这个laochblog个人笔记是希望自己能在PHP技术上有所提升。希望自己每天写点技术相关的笔记，来时刻鞭策自己那颗颓废且没有上进的心。天天群里吹牛逼，斗图毫无意义，白白浪费大把的光阴。自己敲码的水平渐渐荒废，面向对象的思想已经退步。古人云：学如逆水行舟，不进则退。趁着年轻多撞撞南墙，多走走弯路。切忌原地踏步，止步不前。职位是留给有经验的人，高薪是发给有技术的人。做为一名程序员希望自己持之以恒，急流勇进。
							</p>
							<p>
							    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;路漫漫其修远兮，吾将上下而求索。奋斗，奋斗！勉励，勉励！
							</p>
				    </section>
				
				    <footer class="post-footer clearfix">
				        <div class="pull-left tag-list">
				            <i class="fa fa-folder-open-o"></i>
				            <a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/about">关于我</a>,<a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/about">loach</a>,<a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/about">作者</a>
				        </div>
				    </footer>
				
				   </article>
                   
					<div class="about-author clearfix">
                     <h3>留言</h3>
                             <!-- 多说评论框 start -->
	                        <div class="ds-thread" data-thread-key="about" data-title="关于我" data-url="<?php echo $submit_Path; ?>LoachBlog/LoachBlog/article/about">
	                        	
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
					<h4 class="title">联系</h4>
					<div class="content community">
						<p><a href="mailto:zhangbailong945@outlook.com" title="zhangbailong945@outlook.com" target="_blank"><i class="fa fa-comments"></i> 留言给我</a></p>
						<p><a href="http://www.weibo.com/u/2734251684?is_all=1" title="loach" target="_blank"><i class="fa fa-weibo"></i> 官方微博</a></p>
                                                           <p><a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=vYyPjYqIiYSOiYn9zMyT3tLQ" style="text-decoration:none;"><img src="http://rescdn.qqmail.com/zh_CN/htmledition/images/function/qm_open/ico_mailme_01.png"/></a></p>
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
