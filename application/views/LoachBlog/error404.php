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
    <title>LoachBlog | 404页面</title>
    <meta name="description" content="404">
    <meta name="keywords" content="404">
    <meta name="HandheldFriendly" content="True">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo $LoachBlogSrc_Path; ?>/favicon.ico">
   <script type="text/javascript" src="<?php echo $LoachBlogSrc_Path;?>/js/baidu.js"></script>
    <link href="<?php echo $LoachBlogSrc_Path;?>/css/404.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 代码 开始 -->
<div class="fullScreen" id="fullScreen">
    <a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/index" class="logo"><img src="<?php echo $LoachBlogSrc_Path;?>/img/homepage-logo.png"></a>
    <img class="rotating" src="<?php echo $LoachBlogSrc_Path;?>/img/spaceman.svg" />
    <div class="pagenotfound-text">
    <h1>你一不小心进入了时空乱流</h1>
    <h2><a href="<?php echo $submit_Path;?>LoachBlog/LoachBlog/index">赶快回家</a></h2>
    </div>
    <canvas id="canvas2d"></canvas>
</div>
<script type="text/javascript" src="<?php echo $LoachBlogSrc_Path;?>/js/jq404.js"></script>
<!-- 代码 结束 -->
<script type="text/javascript" src="<?php echo $LoachBlogSrc_Path;?>/js/baidu.js"></script>
</body>
</html>
