<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>后台管理</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/Css/login.css">
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>  
    <script type="text/javascript" src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/Js/admin.js"></script>
	<script language="JavaScript">
function fleshVerify(){ 
    //重载验证码
    var time = new Date().getTime();
        document.getElementById('verifyImg').src= '<?php echo U("Login/verify");?>/login/code/'+time;
}
</script>
</head>

<body>
    <div class="container">

      <form id="from" action="<?php echo U("Login/Register");?>" method="post" class="form-signin">
        <h2 class="form-signin-heading">注册用户</h2>
        <label for="inputusername" class="sr-only">用户名</label>
        <input type="text" id="inputusername" name="username" class="form-control" placeholder="用户名" required autofocus>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="密码" required>
        <label for="inputrepassword" class="sr-only">请再次输入密码</label>
        <input type="password" id="inputrepassword" name="repassword" class="form-control" placeholder="请再次输入密码" required>
        <label for="inputreemail" class="sr-only">邮箱</label>
        <input type="email" id="inputemail" name="email" class="form-control" placeholder="邮箱" required>
        <label for="inputverify" class="sr-only">验证码</label>
        <input type="verify" id="inputverify" name="verify" class="form-control" placeholder="验证码" required><br>
        <div><img id="verifyImg" src="<?php echo U("Login/verify");?>" onclick="fleshVerify()"></div><br>
        <div id="error" role="alert">
		</div>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="login()">注册</button>
        <a href="<?php echo U("Login/index");?>" class="btn btn-primary btn-lg btn-block" role="button">返回登录</a>
      </form>
			
    </div> 
</body>
</html>