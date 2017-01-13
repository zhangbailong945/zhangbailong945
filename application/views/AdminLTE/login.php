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
  <title>LoachBlog后台管理 | 登录</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $AdminLTESrc_Path;?>/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>LoachBlog</b>后台管理</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">登录</p>

    <?php echo form_open('administrator/Login/login', 'id="loginform" onsubmit="return dosubmit();"'); ?>
      <div class="form-group has-feedback">
        <input type="text" name="username" id="username" size="20" class="form-control" placeholder="请输入管理员账号">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="userpassword" id="userpassword" size="20" class="form-control" placeholder="请输入密码">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
       <input type="text" id="authcode_input" class="code" type="text" size="5"  name="authcode_input" id value="<?php echo set_value('authcode_input'); ?>" onblur="ajaxauth();" placeholder="验证码" />
	   <a href="javascript:void(0)"><img id="authcode"src="<?php echo site_url().'administrator/ImgAuthCode/show'; ?>" onclick="refresh('/administrator/ImgAuthCode/show')"/></a>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox">记住密码
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">登入</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
    <center><span id="message_sp"></span></center>
    </div>
    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo $AdminLTESrc_Path;?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $LoachBlogSrc_Path;?>/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo $AdminLTESrc_Path;?>/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });

  /*判断输入框是否为空！*/
  function checkEmpty(str)
  {
      var flag=false;
      if(str=='undefined'||str==''||str==null)
      {
         flag=false;
      }
      else
      {
         flag=true;
      }
      return flag;
  }

  /*刷新验证码*/
  function refresh()
  {

  var url='<?php echo site_url()."administrator/ImgAuthCode/show";?>';
  $('#authcode').attr('src', url);
  }

  /*用户名检查*/
  function check_username()
  {
      var flag=false;
  	var username = $('#username').val();
  	if(checkEmpty(username)==false)
  	{ 
      	$('#message_sp').html("<font color='red'>用户名不能为空！</font>");
      }
  	else
  	{
      	$.ajax({
      	    type: 'POST',
      	    async: false,
      	    url:"<?php echo site_url()."/administrator/Login/username_check/";?>"+username,
      	    dataType: "json",
      	    success: function(data)
      	    {

      	    	if(data)
		              {
			                  flag=true; 
		            	  $('#message_sp').html('');                   
			           }
		              else
		              {
		            	  flag=false;			            	  
		            	  $('#message_sp').html("<font color='red'>用户名不存在！</font>");
			          }
      	   }
      	});
  	}

      return flag;
  }
  
  /*用户名检查*/
  function check_userpassword()
  {
      var flag=false;
  	var userpassword = $('#userpassword').val();	
  	if(checkEmpty(userpassword)==false)
  	{
  		$('#message_sp').html("<font color='red'>密码不能为空！</font>");
      }
  	else
  	{
      	$.ajax({
      	    type: 'POST',
      	    async: false,
      	    url:"<?php echo site_url()."/administrator/Login/userpassword_check/";?>"+userpassword,
      	    dataType: "json",
      	    success: function(data)
      	    {

      	    	if(data)
		              {
      	    		flag=true; 
      	    		 $('#message_sp').html('');            
			           }
		              else
		              {
		            	  flag=false;			            	  
		            	  $('#message_sp').html("<font color='red'>密码不正确！</font>");
		              }
      	   }
      	});
  	}
      return flag;
  }
  
  

  /*验证码检查*/
  function ajaxauth()
  {
      var flag=false;
  	var authcode = $('#authcode_input').val();	
  	if(checkEmpty(authcode)==false)
  	{
  		$('#message_sp').html("<font color='red'>验证码不能为空！</font>");
      }
  	else
  	{
      	$.ajax({
      	    type: 'POST',
      	    async: false,
      	    url:"<?php echo site_url()."/administrator/ImgAuthCode/check/";?>"+authcode,
      	    dataType: "json",
      	    success: function(data)
      	    {

      	    	if(data)
		              {
			              flag=true; 
		            	  $('#message_sp').html('');                   
			           }
		              else
		              {
		            	  flag=false;			            	  
		            	  $('#message_sp').html("<font color='red'>验证码不正确！</font>");
			          }
      	   }
      	});
  	}
      return flag;
  }
  
  /*登录之前验证*/
  function dosubmit()
  {
      var flag=false;
      if(check_username()&&check_userpassword()&&ajaxauth())
        {
      	flag=true;
        }
      else
        {
      	flag=false;                      
        }

     return flag;
  }

</script>  
</body>
</html>

