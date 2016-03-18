<!DOCTYPE html>
<html>
<head>
	<title><block name="title">首页</block></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.css">
  <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>  
  <script type="text/javascript" src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="__Home__/css/index.css">
</head>
<body>
<!-- 导航开始-->
  <header id="navigation" >
    <nav class="navbar navbar-default">
      <div class="container-fluid" id="nav" >
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h1><a class="navbar-brand" href="#">网站名称</a></h1>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/">主页</a></li>
            <blog:channel row="4">
            <li><a href="{$field.typelink}">{$field.name}</a></li>
            </blog:channel>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="__Home__/images/defaultUserImage.png" class="img-circle nav-user-small-img">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </header>
<!-- 导航结束--> 

<block name="main">

</block>
<footer id="footer">
  <div class="content-user">
    <div class="col-md-12 text-center">
      <ul>
        <li>
          网站版权
        </li>
      </ul>
    </div>
  </div>
</footer>
</body>
</html>