<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>后台管理</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/blog/Public/Admin/Css/admin.css">
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>      
    <script type="text/javascript" src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/blog/Public/Admin/Js/admin.js"></script>
    <script language="JavaScript">
    function fleshVerify(){ 
        //重载验证码
        var time = new Date().getTime();
            document.getElementById('verifyImg').src= '/blog/index.php/Admin/login/code/'+time;
    }
    </script>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">后台管理</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo U('index/index');?>">主菜单</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">功能<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户 <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li><a href="#">个人中心</a></li>
            <li><a href="<?php echo U('index/logout');?>">退出</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
<div class="row">
<div class="col-sm-3 col-md-2 sidebar">
<ul id="main-nav" class="main-nav nav nav-tabs nav-stacked">
                    <li>
                        <a href="#systemSetting" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-cog"></i>
                            用户管理                          
                            <span class="pull-right glyphicon glyphicon-chevron-toggle"></span>
                        </a>
                        <ul id="systemSetting" class="nav nav-list secondmenu collapse" >
                            <li><a href="<?php echo U('User/index');?>"><i class="glyphicon glyphicon-Admin"></i>&nbsp;所有用户</a></li>
                            <li><a href="<?php echo U('User/addUser');?>"><i class="glyphicon glyphicon-th-list"></i>&nbsp;添加用户</a></li>                                                  
                        </ul>
                    </li>
                    <li>
                        <a href="#configSetting" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-credit-card"></i>
                            评论 
                            <span class="pull-right glyphicon  glyphicon-chevron-toggle"></span>
                        </a>
                        <ul id="configSetting" class="nav nav-list secondmenu collapse">
                            <li><a href="<?php echo U('Comment/index');?>"><i class="glyphicon glyphicon-globe"></i>&nbsp;全部评论</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#disSetting" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-globe"></i>
                            文章管理
                           <span class="pull-right glyphicon glyphicon-chevron-toggle"></span>
                        </a>
                        <ul id="disSetting" class="nav nav-list secondmenu collapse">
                            <li><a href="<?php echo U('Article/index');?>"><i class="glyphicon glyphicon-th-list"></i>&nbsp;文章列表</a></li>
                            <li><a href="<?php echo U('Article/addArticle');?>"><i class="glyphicon glyphicon-th-list"></i>&nbsp;添加文章</a></li> 
                            <li><a href="<?php echo U('Article/trach');?>"><i class="glyphicon glyphicon-th-list"></i>&nbsp;回收站</a></li>                          
                            <li><a href="<?php echo U('Category/index');?>"><i class="glyphicon glyphicon-text-width"></i>&nbsp;分类列表</a></li>
                            <li><a href="<?php echo U('Category/addCate');?>"><i class="glyphicon glyphicon-text-width"></i>&nbsp;添加分类</a></li>
                            <li><a href="<?php echo U('Attribute/index');?>"><i class="glyphicon glyphicon-text-width"></i>&nbsp;属性列表</a></li>
                            <li><a href="<?php echo U('Attribute/addAttr');?>"><i class="glyphicon glyphicon-text-width"></i>&nbsp;添加属性</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#RbacSetting" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-globe"></i>
                            权限管理
                           <span class="pull-right glyphicon glyphicon-chevron-toggle"></span>
                        </a>
                        <ul id="RbacSetting" class="nav nav-list secondmenu collapse">
                            <li><a href="<?php echo U('Rbac/role');?>"><i class="glyphicon glyphicon-th-list"></i>&nbsp;角色列表</a></li>                         
                            <li><a href="<?php echo U('Rbac/node');?>"><i class="glyphicon glyphicon-text-width"></i>&nbsp;节点列表</a></li>
                            <li><a href="<?php echo U('Rbac/addRole');?>"><i class="glyphicon glyphicon-text-width"></i>&nbsp;添加角色</a></li>
                            <li><a href="<?php echo U('Rbac/addNode');?>"><i class="glyphicon glyphicon-text-width"></i>&nbsp;添加节点</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#dicSetting" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-bold"></i>
                            系统设置
                            <span class="pull-right glyphicon glyphicon-chevron-toggle"></span>
                        </a>
                        <ul id="dicSetting" class="nav nav-list secondmenu collapse">
                            <li><a href="<?php echo U('System/index');?>"><i class="glyphicon glyphicon-text-width"></i>&nbsp;常规设置</a></li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-fire"></i>
                            关于系统
                        </a>
                    </li>

</ul>
</div>



<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header">用户列表</h1>

<div class="col-md-12">
          <form class="navbar-form navbar-right" action="<?php echo U('User/search');?>" method="post">
            <input type="text" class="form-control" name="search" placeholder="Search...">
          </form>
<table class="table table-striped table-hover">
   <thead>
      <tr>
         <th>id</th>
         <th>用户名</th>
         <th>邮箱</th>   
         <th>上次登录时间</th>
         <th>上次登录ip</th>
         <th>用户所属组</th>
         <th>状态</th>   
         <th>操作</th>
      </tr>
   </thead>
   <tbody>
   <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
         <td><?php echo ($vo["id"]); ?></td>
         <td><?php echo ($vo["username"]); ?></td>
         <td><?php echo ($vo["email"]); ?></td>
         <td><?php if($vo["logintime"]): echo (date("y-m-d h:m:s",$vo['logintime'])); endif; ?></td>
         <td><?php echo ($vo["loginip"]); ?></td>
         <td>
         <?php if($vo["username"] == C("RBAC_SUPERADMIN")): ?>超级管理员
         <?php else: ?>
         <?php echo ($vo["roleremark"]); endif; ?>       
         </td>
         <td><?php echo ($vo[status]?'登录':'未登录'); ?></td>
         <td ><input type="button" value="修改" class="btn btn-default" onclick="edite('<?php echo U('User/editUser',array('id'=>$vo['id']));?>')">
              <input type="button" value="删除" class="btn btn-default"  onclick="del('<?php echo U('User/delUser',array('id'=>$vo['id']));?>')">
         </td>
      </tr><?php endforeach; endif; ?> 
   </tbody>  
</table>
<nav>
  <ul class="pagination">
  <?php echo ($show); ?>
  </ul>
</nav>
</div>

</div>
</div>
</div>
</body>
</html>