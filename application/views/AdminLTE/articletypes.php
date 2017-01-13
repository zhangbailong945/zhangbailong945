<?php 
$LoachBlogSrc_Path=base_url()."communal/LoachBlog"; 
$AdminLTESrc_Path=base_url()."communal/AdminLTE";
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
        
        <li class="treeview active">
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
        
       <li class="treeview">
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
                      笔记类型
        <small>管理</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>主页</a></li>
        <li class="active">笔记类型管理</li>
      </ol>
    </section>
    
    <!-- Main Content -->

    <section id="list" class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">笔记类型列表</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="articletypelist" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover">
                <thead>
                <tr><th colspan="7" class="myBtnBox"></th></tr>
                <tr>
                  <th><input type="checkbox" name="select_all" value="1" id="checkall"></th>
                  <th>笔记分类名称</th>
                  <th>笔记分类标签</th>
                  <th>笔记分类描述</th>
                  <th>笔记分类总数</th>
                  <th>笔记分类排序</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
               


                </tbody>
              </table>
            </div>
                  <?php 
                    /*
                    foreach ($list as $li)
                    {
                    	echo '<tr>';
                    	echo '<th style="width:15px"><input type="checkbox" name="checkList" value="'.$li["article_type_id"].'"></th>';
                    	echo '<td>'.$li["article_type_id"].'</td>';
                    	echo '<td>'.$li["article_type_name"].'</td>';
                    	echo '<td>'.$li["article_type_slug"].'</td>';
                    	echo '<td>'.$li["article_type_description"].'</td>';
                    	echo '<td>'.$li["article_type_count"].'</td>';
                    	echo '<td>'.$li["article_type_order"].'</td>';
                    	echo '</tr>';
                    }
                    */
                  ?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
		<!-- 模态框（Modal） -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
		   aria-labelledby="myModalLabel" aria-hidden="true">
		   <div class="modal-dialog">
		      <div class="modal-content">
		         <div class="modal-header">
		            <button type="button" class="close" 
		               data-dismiss="modal" aria-hidden="true">
		                  &times;
		            </button>
		            <h4 class="modal-title" id="myModalLabel">
		                               新增笔记类型
		            </h4>
		         </div>
		         <div class="modal-body col-lg-8 col-lg-offset-2">
		             <form class="form-horizontal" id="articletypeaddForm">
			            <input type="hidden" id="article_type_id"/>
			             <div class="form-group">
                                <label class="col-lg-3 control-label">笔记类型名称：</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" id="article_type_name" name="article_type_name" />
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <label class="col-lg-3 control-label">笔记类型缩略：</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" id="article_type_slug" name="article_type_slug" />
                                </div>
                        </div>
                        
			            <div class="form-group">
			                <label class="col-lg-3 control-label" for="inputNote">笔记类型描述 ：</label>
			                <div class="col-lg-5">
			                <textarea id="article_type_description" name="article_type_description" cols="30" rows="4"></textarea>
			                </div>
			            </div>
			        </form>
		         </div>
		         <div class="modal-footer">
                    <button class="btn btn-primary" id="btnSave">确定</button>
                    <button class="btn btn-primary" id="btnEdit">保存</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		         </div>
		         </div>
		      </div><!-- /.modal-content -->
		</div><!-- /.modal -->

		
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

<script>

  var oTable;
  $(function(){
	$('#articletypeaddForm').bootstrapValidator({
	        message: 'This value is not valid',
	        feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        }, 
            fields: {  
	            article_type_name:{  
                message: '笔记类型名称没有验证',
                validators: {
                    notEmpty: {
                        message: '笔记类型名称不能为空。'
                    },
                    stringLength: {
                        min: 3,
                        max: 20,
                        message: '笔记类型名称必须超过3-10个字符。'
                    }
                }
            },
            article_type_slug:{  
                message: '笔记类型缩略没有验证',
                validators: {
                    notEmpty: {
                        message: '笔记类型缩略不能为空。'
                    },
                    stringLength: {
                        min: 3,
                        max: 20,
                        message: '笔记类型缩略必须超过3-10个字符。'
                    }
                }
            }
            
	      }
	});
	
	initModal();
	oTable = initTable();
	$("#btnSave").click(_addFun);
	$("#btnEdit").click(_editFunAjax);
	$("#deleteFun").click(_deleteList);
	
	$('#checkall').on('click', function(){
		      // Get all rows with search applied
		      var rows = oTable.rows({ 'search': 'applied' }).nodes();
		      // Check/uncheck checkboxes for all rows in the table
		      $('input[type="checkbox"]', rows).prop('checked', this.checked);
	});

	$('#articletypelist tbody').on('change', 'input[type="checkbox"]', function(){
	      // If checkbox is not checked
	      if(!this.checked){
	         var el = $('#checkall').get(0);
	         // If "Select all" control is checked and has 'indeterminate' property
	         if(el && el.checked && ('indeterminate' in el)){
	            // Set visual state of "Select all" control 
	            // as 'indeterminate'
	            el.indeterminate = true;
	         }
	      }
	   });
		

  });

  /*
  *初始化 笔记类型 table
  */
  function initTable()
  {
		var table=$('#articletypelist').DataTable({
		       'ajax':'<?php echo $submit_Path;?>administrator/ArticleType/ajaxArticleTypeList',
		       'columnDefs': [{
		           'targets':0,
		           'searchable': false,
		           'orderable': false,
		           'className': 'dt-body-center',
		           'data':'article_type_id',
		           'render': function (data, type, full, meta){
		               return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
		           }
		        }],
		       'columns':[
		                  {'data':'article_type_id'},
		                  {'data':'article_type_name'},
		                  {'data':'article_type_slug'},
		                  {'data':'article_type_description'},
		                  {'data':'article_type_count'},
		                  {'data':'article_type_order'},
		                  {
		                      "data": "article_type_id",
		                      "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {		                          
		                          $(nTd).html("<a href='javascript:void(0);' " +
		                          "onclick='_editFun(\"" + oData.article_type_id + "\",\"" + oData.article_type_name + "\",\"" + oData.article_type_slug + "\",\"" + oData.article_type_description + "\")'>编辑</a>&nbsp;&nbsp;")
		                              .append("<a href='javascript:void(0);' onclick='_deleteFun(" + sData + ")'>删除</a>");
		                      }
		                  },
		        ],
		        'language':{
		        'order': [[1, 'asc']],
		        "info":           "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
		        "infoEmpty":      "显示第 0 至 0 项结果，共 0 项",
		        "infoFiltered":   "(由 _MAX_ 项结果过滤)",
		        "infoPostFix":    "",
		        "thousands":      ",",
		        "lengthMenu":     "显示 _MENU_ 项结果",
		        "loadingRecords": "载入中...",
		        "processing":     "处理中...",
		        "search":         "搜索:",
		        "zeroRecords":    "没有匹配结果",
		        "paginate": {
		            "first":      "首页",
		            "last":       "尾页",
		            "next":       "下一页",
		            "previous":   "上一页"
		        },
		        "aria": {
		            "sortAscending":  ": 以升序排列此列",
		            "sortDescending": ": 以降序排列此列"
		          }
		        },
		        "fnCreatedRow": function (nRow, aData, iDataIndex) {
		            //add selected class
		            $(nRow).click(function () {
		                if ($(this).hasClass('row_selected')) {
		                    $(this).removeClass('row_selected');
		                } else {
		                    oTable.$('tr.row_selected').removeClass('row_selected');
		                    $(this).addClass('row_selected');
		                }
		            });
		        },
		        "fnInitComplete": function (oSettings, json) {
		            $('<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="addFun">新增</button>' + '&nbsp;' +
		            '<button href="#" class="btn btn-primary" id="editFun">修改</button> ' + '&nbsp;' +
		            '<button href="#" class="btn btn-danger" id="deleteFun">删除</button>' + '&nbsp;').appendTo($('.myBtnBox'));
		            $("#deleteFun").click(_deleteList);
		            $("#editFun").click(_multipleselect);
		            $("#addFun").click(_initize);
		        }
		    });
	    return table;
  }

  

  /**
  * 添加数据
  * @private
  */
  function _addFun() 
  {
	 
	   $('#articletypeaddForm').data('bootstrapValidator').validate(); 
       if(!$('#articletypeaddForm').data('bootstrapValidator').isValid()){  
           return ;  
       } 
	   var jsonData ={
			      'article_type_name': $("#article_type_name").val(),
			      'article_type_slug': $("#article_type_slug").val(),
			      'article_type_description': $("#article_type_description").val()
	   };
	  $.ajax({
	      url: "<?php echo $submit_Path;?>administrator/ArticleType/articletypeadd_Controller",
	      data: jsonData,
	      type: "post",
	      success: function (backdata) {
	          if (backdata == 1) {
	              $("#myModal").modal("hide");
	              layer.msg('操作成功！', {icon: 1});
	              resetFrom();
	              oTable.fnReloadAjax(oTable.fnSettings());
	          } else if (backdata == 0) {
	        	  layer.msg('操作成功！', {icon: 2});
	          } else {
	        	  layer.msg('防止数据不断增长，会影响速度，请先删掉一些数据再做测试',{icon: 3});
	          }
	      }, error: function (error) {
	          console.log(error);
	      }
	  });
    
  }

  /**
   * 删除
   * @param id
   * @private
   */
   function _deleteFun(id) {

	   layer.confirm('你要删除这个笔记类型吗？', {
		   btn: ['确定','取消'] //按钮
		 }, function(){
			 $.ajax({
			      url: "<?php echo $submit_Path?>administrator/ArticleType/ajaxAritcleTypeDelete_Controller",
			      data: {"id": id},
			      type: "post",
			      success: function (backdata) {
			          if (backdata==1) {
			        	  layer.msg('操作成功！', {icon: 1});
			              oTable.fnReloadAjax(oTable.fnSettings());
			          } else {
			        	  layer.msg('操作失败！', {icon: 2});
			          }
			      }, error: function (error) {
			          console.log(error);
			      }
			  });
		 }, 
		 function()
		 {
		 }
		 );
   }
   /**
   * 编辑数据带出值
   * @param id
   * @param name
   * @param job
   * @param note
   * @private
   */
   function _editFun(id,name,slug,description) {
   $("#article_type_id").val(id);
   $("#article_type_name").val(name);
   $("#article_type_slug").val(slug);
   $("#article_type_description").val(description);
   $("#btnSave").hide();
   $("#btnEdit").show();
   $("#myModal").modal("show");

   }
    
  /**
  * 编辑数据
  * @private
  */
  function _editFunAjax() {
	  
		   $('#articletypeaddForm').data('bootstrapValidator').validate(); 
	       if(!$('#articletypeaddForm').data('bootstrapValidator').isValid()){  
	           return ;  
	       } 
		  var jsonData ={
				  'article_type_id': $("#article_type_id").val(),
			      'article_type_name': $("#article_type_name").val(),
			      'article_type_slug': $("#article_type_slug").val(),
			      'article_type_description': $("#article_type_description").val()
		   };
		
		  $.ajax({
		      url: "<?php echo $submit_Path;?>administrator/ArticleType/articletypeedit_Controller",
		      data: jsonData,
		      type: "post",
		      success: function (backdata) {
		          if (backdata == 1) {
		              $("#myModal").modal("hide");
		              layer.msg('操作成功！', {icon: 1});
		              resetFrom();
		              oTable.fnReloadAjax(oTable.fnSettings());
		          } else if (backdata == 0) {
		        	  layer.msg('操作成功！', {icon: 2});
		          } else {
		        	  layer.msg('防止数据不断增长，会影响速度，请先删掉一些数据再做测试',{icon: 3});
		          }
		      }, error: function (error) {
		          console.log(error);
		      }
		  });

  }
   
  /**
  * 赋值
  * @private
  */
  function _multipleselect() {
	  alert(oTable.$('tr.row_selected').get(0));
	  if (oTable.$('tr.row_selected').get(0)) {
		    $("#btnEdit").show();
		    
		    var selected = oTable.fnGetData(oTable,oTable.$('tr.row_selected').get(0));
		    $("#article_type_id").val(selected.article_type_id);
		    $("#article_type_name").val(selected.article_type_name);
		    $("#article_type_slug").val(selected.article_type_slug);
		    $("#article_type_description").val(selected.article_type_description);
		 
		    $("#myModal").modal("show");
		    $("#btnSave").hide();
		} else {
		    alert('请点击选择一条记录后操作。');
		}
  }
   
  /**
  * 批量删除
  * 未做
  * @private
  */
  function _deleteList() {

	  var str = '';
	  $("input[name='id[]']:checked").each(function (i, o) {
	      str += $(this).val();
	      str += ",";
	  });
	  if (str.length > 0) {
	      var ids = str.substr(0, str.length - 1);

		  layer.confirm('你确定要删除这几条数据吗？', {
			  btn: ['确定','取消'] //按钮
			}, function(){
				var jsonData ={
						  'ids':ids
				   };
				
				  $.ajax({
				      url: "<?php echo $submit_Path;?>administrator/ArticleType/articletypedeletebatch_Controller",
				      data: jsonData,
				      type: "post",
				      success: function (backdata) {
				          if (backdata == 1) {
				              $("#myModal").modal("hide");
				              layer.msg('删除成功！', {icon: 1});
				              resetFrom();
				              oTable.fnReloadAjax(oTable.fnSettings());
				          } else if (backdata == 0) {
				        	  layer.msg('删除失败！', {icon: 2});
				          } else {
				        	  layer.msg('防止数据不断增长，会影响速度，请先删掉一些数据再做测试',{icon:0});
				          }
				      }, error: function (error) {
				          console.log(error);
				      }
				  });
			}, function(){
			});
	  } else {
	      layer.msg('至少选择一条记录操作！');
	  }
  }

  /**
   * 初始化
   * @private
   */
   function _initize() 
   {
	   resetFrom();
	   $("#btnEdit").hide();
	   $("#btnSave").show();
   }

   /**
   * 重置表单
   */
   function resetFrom() {
   $('#articletypeaddForm').each(function (index) {
       $('#articletypeaddForm')[index].reset();
   });
   }
   
   /**
   * 初始化弹出层
   */
   function initModal() {
   $('#myModal').on('show', function () {
       $('#list', document).addClass('modal-open');
       $('<div class="modal-backdrop fade in"></div>').appendTo($('#list', document));
   });
   $('#myModal').on('hide', function () {
       $('#list', document).removeClass('modal-open');
       $('div.modal-backdrop').remove();
   });
   }
  
</script>
</body>
</html>
