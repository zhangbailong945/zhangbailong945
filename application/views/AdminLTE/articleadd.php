<?php 
$LoachBlogSrc_Path=base_url()."communal/LoachBlog"; 
$AdminLTESrc_Path=base_url()."communal/AdminLTE";
$ue_Path=base_url()."communal/ueditor"; 
$submit_Path=site_url();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LoachBlog | 后台管理中心</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo $LoachBlogSrc_Path;?>/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $AdminLTESrc_Path;?>/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $AdminLTESrc_Path;?>/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $AdminLTESrc_Path;?>/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo $AdminLTESrc_Path;?>/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo $AdminLTESrc_Path;?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo $AdminLTESrc_Path;?>/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $AdminLTESrc_Path;?>/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo $AdminLTESrc_Path;?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
  <link rel="stylesheet" href="<?php echo $AdminLTESrc_Path;?>/plugins/datatables/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo $AdminLTESrc_Path;?>/plugins/bootstrapValidator/bootstrapValidator.min.css">
  <link rel="stylesheet" href="<?php echo $AdminLTESrc_Path;?>/plugins/layer/skin/layer.css">
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>LoachBlog</b>后台管理中心</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">导航</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">你有4条消息！</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo $AdminLTESrc_Path;?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo $AdminLTESrc_Path;?>/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">阅读全部</a></li>
            </ul>
          </li>
          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">你有10条通知</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">阅读全部</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">你有9个任务！</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="#">阅读全部</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $AdminLTESrc_Path;?>/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $AdminLTESrc_Path;?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  laoch - Web Developer
                  <small>2016-10-6</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">个人详情</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">退出管理</a>
                </div>
              </li>
            </ul>
          </li>
          <!--右侧栏 开关按钮  Control Sidebar Toggle Button 
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
          -->
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">主菜单</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>用户管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $submit_Path;?>administrator/Users/index"><i class="fa fa-circle-o"></i>用户列表</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>笔记类型管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo $submit_Path;?>administrator/ArticleType/index"><i class="fa fa-circle-o"></i>笔记类型列表</a></li>
          </ul>
        </li>
        
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>笔记管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo $submit_Path;?>administrator/Article/index"><i class="fa fa-circle-o"></i>笔记列表</a></li>
            <li class="active"><a href="<?php echo $submit_Path;?>administrator/Article/articleadd"><i class="fa fa-circle-o"></i>撰写笔记</a></li>
          </ul>
        </li>
        
       </ul> 
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
                      笔记
        <small>管理</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>主页</a></li>
        <li class="active">撰写笔记</li>
      </ol>
    </section>
    
    <!-- Main Content -->

    <section id="list" class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">撰写笔记</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              

		             <form class="form-horizontal" id="articletypeaddForm">
			             <div class="form-group">
                                <label class="col-lg-3 control-label">笔记标题：</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" id="article_title" name="article_title" />
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-lg-3 control-label">笔记类型：</label>
                                <div class="col-lg-5">
                               <select name="article_type_id" id="article_type_id" style="width:100px">
                                  <option value="">请选择</option>
								</select>
                                </div>
                        </div>
                        
			            <div class="form-group">
			                <label class="col-lg-3 control-label" for="inputNote">笔记内容：</label>
			                <div class="col-lg-5">
			                <script id="editor" type="text/plain"></script>
			                </div>
			            </div>
			            <div class="form-group">
			              <label class="col-lg-3 control-label" for="inputNote"></label>
			                <div class="col-lg-5" id="editor_content">
			                
			                </div>
			            </div>
			            
			            <div class="form-group">
			                <label class="col-lg-3 control-label" for="inputNote">笔记标签：</label>
			                <div class="col-lg-5">
                            <input type="text" class="form-control" id="article_slug" name="article_slug" />
			                </div>
			            </div>
			            
			            
			        </form>
		         <div class="modal-footer">
                    <button class="btn btn-primary" id="btnSave">保存</button>
                    <button class="btn btn-primary" id="btnSet">重置</button>
		         </div>

              
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
		
    </section>

    <!-- End Main Content -->
    

   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar 右侧栏-->
  <aside class="control-sidebar control-sidebar-dark">
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo $AdminLTESrc_Path;?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $LoachBlogSrc_Path;?>/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- DataTables -->
<script src="<?php echo $AdminLTESrc_Path;?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo $AdminLTESrc_Path;?>/plugins/datatables/dataTables.bootstrap.js"></script>

<!-- SlimScroll -->
<script src="<?php echo $AdminLTESrc_Path;?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $AdminLTESrc_Path;?>/plugins/fastclick/fastclick.js"></script>
<!-- Slimscroll -->
<script src="<?php echo $AdminLTESrc_Path;?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $AdminLTESrc_Path;?>/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->

<script src="<?php echo $AdminLTESrc_Path;?>/plugins/bootstrapValidator/bootstrapValidator.min.js"></script>
<script src="<?php echo $AdminLTESrc_Path;?>/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $AdminLTESrc_Path;?>/js/demo.js"></script>
<script src="<?php echo $AdminLTESrc_Path;?>/plugins/layer/layer.js"></script>
<!-- UEIDTOR -->
<script type="text/javascript" charset="utf-8" src="<?php echo $ue_Path; ?>/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo $ue_Path; ?>/ueditor.all.min.js"> </script>

<script>


  var ue = UE.getEditor('editor');
  getArticleType();
  $(function(){
	$('#articletypeaddForm').bootstrapValidator({
	        message: 'This value is not valid',
	        feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        }, 
            fields: {  
	        	article_title:{  
                message: '笔记标题没有验证',
                validators: {
                    notEmpty: {
                        message: '笔记标题不能为空。'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: '笔记标题必须超过3-30个字符。'
                    }
                }
            },
            article_type_id:{  
                message: '笔记类型没有验证',
                validators: {
                    notEmpty: {
                        message: '请选择笔记类型！'
                    }
                }
            },
            article_slug:{  
                message: '笔记标签还没有验证',
                validators: {
                    notEmpty: {
                        message: '笔记标签不能为空！'
                    },
                    regexp: {
                        regexp:/[A-Za-z0-9,]+$/,
                        message: '笔记标签必须以半角逗号结尾！'
                    }
            
                }

            }
            
	      }
	});

	$("#btnSave").click(_addFun);
	$("#btnSet").click(resetFrom);
  });

  /**
  *获取笔记类型 赋值给select
  */
  function getArticleType()
  {
  	$.ajax({
  	    type: 'POST',
  	    async: false,
  	    url:"<?php echo site_url()."/administrator/ArticleType/getArticleType_data/";?>",
  	    dataType: "json",
  	    success: function(data)
  	    {
  	    	//$('#articletype_combox').html('');
  	    	if(data)
                {
  	              var html='';
                    for(var i=0;i<data.length;i++)
                    {
                         html+='<option value='+data[i].article_type_id+'>'+data[i].article_type_name+'</option>';
                    }
                    $('#article_type_id').append(html);
  	          }
                else
                {
              	  $('#article_type_id').append('<option>暂无笔记类型,请去笔记列表页进行添加.</option>');
  	          }
  	   }
  	});
  }

  /**
  *去掉前后 空格
  */
  function trim(str) {
	  return str.replace(/(^\s+)|(\s+$)/g, "");
	  }

  

  /**
  * 添加数据
  * @private
  */
  function _addFun() 
  {

	   $('#articletypeaddForm').data('bootstrapValidator').validate(); 
       if(!$('#articletypeaddForm').data('bootstrapValidator').isValid()&&ue.hasContents()){  
           return ;  
       } 
  	 if(ue.hasContents())
	 {
  	   $('#editor_content').html("");
	   var jsonData ={
			      'article_title': $("#article_title").val(),
			      'article_type_id': $("#article_type_id").val(),
			      'article_slug': trim($("#article_slug").val()),
			      'article_text': ue.getContent(),
			      'article_content_text': ue.getContentTxt()
			      
	   };
	  $.ajax({
	      url: "<?php echo site_url()."administrator/Article/articleadd_Controller";?>",
	      data: jsonData,
	      type: "post",
	      success: function (backdata) {
	          if (backdata == 1) {
	              $("#myModal").modal("hide");
	              layer.msg('操作成功！', {icon: 1});
	              resetFrom();
	              oTable.fnReloadAjax(oTable.fnSettings());
	          } else if (backdata == 0) {
	        	  layer.msg('操作失败！', {icon: 2});
	          } else {
	        	  layer.msg('防止数据不断增长，会影响速度，请先删掉一些数据再做测试',{icon: 3});
	          }
	      }, error: function (error) {
	          console.log(error);
	      }
	  });
	 }
	 else
	 {

		 $('#editor_content').html("<font color='red'>笔记内容不能空！</font>");
	 }
    
  }

  
   /**
   * 重置表单
   */
   function resetFrom() {
   $('#articletypeaddForm').each(function (index) {
       $('#articletypeaddForm')[index].reset();
       ue.setContent('');
   });
   }

  
</script>
</body>
</html>
