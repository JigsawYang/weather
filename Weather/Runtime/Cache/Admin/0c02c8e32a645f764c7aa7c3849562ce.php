<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
    <title>sdk - 后台</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/Public/front/images/favicon.ico" />
    <!--[if lt IE 9]>
    <script src='/Public/admin/javascripts/html5shiv.js' type='text/javascript'></script>
    <![endif]-->
    <link href='/Public/admin/stylesheets/bootstrap/bootstrap.css' media='all' rel='stylesheet' type='text/css' />
    <link href='/Public/admin/stylesheets/bootstrap/bootstrap-responsive.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / jquery ui -->
    <link href='/Public/admin/stylesheets/jquery_ui/jquery-ui-1.10.0.custom.css' media='all' rel='stylesheet' type='text/css' />
    <link href='/Public/admin/stylesheets/jquery_ui/jquery.ui.1.10.0.ie.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / mention -->
    <link href='/Public/admin/stylesheets/plugins/mention/mention.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / tabdrop (responsive tabs) -->
    <!-- <link href='/Public/admin/stylesheets/plugins/tabdrop/tabdrop.css' media='all' rel='stylesheet' type='text/css' /> -->
    <!-- / datatables -->
    <link href='/Public/admin/stylesheets/plugins/datatables/bootstrap-datatable.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / flatty theme -->
    <link href='/Public/admin/stylesheets/light-theme.css' id='color-settings-body-color' media='all' rel='stylesheet' type='text/css' />
    <!-- / demo -->
    <link href='/Public/admin/stylesheets/demo.css' media='all' rel='stylesheet' type='text/css' />
    <!--RBAC列表显示-->
	<link href='/Public/admin/stylesheets/node.css' media='all' rel='stylesheet' type='text/css' />
	    <!-- / 右上角弹出的提示框 -->
    <link href='/Public/admin/stylesheets/plugins/jgrowl/jquery.jgrowl.min.css' media='all' rel='stylesheet' type='text/css' />
      <script>
        var FILE_SERVER_URL = '<?php echo C('FILE_SERVER.url');?>';
      </script>
      <script src='/Public/admin/javascripts/jquery/jquery.min.js' type='text/javascript'></script>


</head>
<body class='contrast-blue sign-in contrast-background' onkeydown="keyDown(event)">
<div id='wrapper'>
  <div class='application'>
    <div class='application-content'>
      <a href="<?php echo U('/');?>"><div class='icon-bolt'></div>
        <span>包头市现代气象农业服务系统</span>
      </a>
    </div>
  </div>
  <div class='controls'>
    <div class='caret'></div>
    <div class='form-wrapper'>
      <h1 class='text-center'>登录</h1>
      <form id="loginForm" accept-charset="UTF-8" action="<?php echo U('/admin/login');?>" method="post" />
      <div class='row-fluid'>
        <div class='span12 icon-over-input'>
          <input class="span12" id="username" data-rule-required="true" name="username" placeholder="用户名" type="text" onclick="$('#usernameAttention').html('');$('#loginButton').attr('style', '').html('登录')" />
          <i class='icon-user muted'></i>
        </div>
        <p id="usernameAttention"></p>
      </div>
      <div class='row-fluid'>
        <div class='span12 icon-over-input'>
          <input class="span12" id="password" data-rule-required="true" name="password" placeholder="密码" type="password" onclick="$('#passwordAttention').html('');$('#loginButton').attr('style', '').html('登录')" />
          <i class='icon-lock muted'></i>
        </div>
        <p id="passwordAttention"></p>
      </div>
      <div id="loginButton" class="btn btn-block" onclick="login()">登录</div>
      </form>
    </div>
  </div>
</div>
<!-- / jquery -->
<script src='/Public/admin/javascripts/jquery/jquery.min.js' type='text/javascript'></script>
<script src='/Public/admin/javascripts/jquery/jquery.form.js' type='text/javascript'></script>

<script type="text/javascript">
  function keyDown(evt) {
    e = evt || window.event; //处理浏览器兼容性问题
    if (e.keyCode==13) {  //回车键的键值为13
      $('#loginButton').click();  //调用登录按钮的登录事件
    }
  }

  function login() {
    var username = $('#username').val();
    var password = $('#password').val();

    if ('' == username) {
      $('#usernameAttention').attr('style', 'color:red').html('请输入用户名');
      return false;
    } else if ('' == password) {
      $('#passwordAttention').attr('style', 'color:red').html('请输入密码');
      return false;
    }

    $('#loginForm').ajaxSubmit(function(e){
      e = eval('(' + e + ')');
      if ('false' == e.res) {
        $('#loginButton').attr('style', 'background:#FF0000').html(e.des);
        return false;
      }
      location = e.url;
    })
  }
</script>
</body>
</html>