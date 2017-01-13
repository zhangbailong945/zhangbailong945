<?php
$LoachBlogSrc_Path="http://www.zhangbailong.com/communal/LoachBlog"; 
$submit_Path="http://www.zhangbailong.com/index.php/";
$ue_Path="http://www.zhangbailong.com/communal/communal/ueditor";

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>消失在宇宙星空中的404页面</title>
    <link href="<?php echo $LoachBlogSrc_Path;?>/css/404.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 代码 开始 -->
<div class="fullScreen" id="fullScreen">
    <a href="http://www.zhangbailong.com/index.php/LoachBlog/LoachBlog/index" class="logo"><img src="<?php echo $LoachBlogSrc_Path;?>/img/homepage-logo.png"></a>
    <img class="rotating" src="<?php echo $LoachBlogSrc_Path;?>/img/spaceman.svg" />
    <div class="pagenotfound-text">
    <h1>你一不小心进入了时空乱流</h1>
    <h2><a href="http://www.zhangbailong.com/index.php/LoachBlog/LoachBlog/index">赶快回家</a></h2>
    </div>
    <canvas id="canvas2d"></canvas>
</div>
<script type="text/javascript" src="<?php echo $LoachBlogSrc_Path;?>/js/jq404.js"></script>
<!-- 代码 结束 -->
</body>
</html>
