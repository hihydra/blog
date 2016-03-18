<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>文章页</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.css">
  <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>  
  <script type="text/javascript" src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css">
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
            <?php $_channel = M("cate")->limit(4)->select();$_channel = Lib\Category::unlimitedForLayer($_channel); if(is_array($_channel)): $i = 0; $__LIST__ = $_channel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i; $field["typelink"]="/category/".$field["slug"]."/";?><li><a href="<?php echo ($field["typelink"]); ?>"><?php echo ($field["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/Public/Home/images/defaultUserImage.png" class="img-circle nav-user-small-img">Dropdown <span class="caret"></span></a>
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


<div class="container">
    <ol class="breadcrumb">
      <li><a href="/">主页</a></li>
      <?php $_position = D("Cate")->Position();echo $_position ?>
    </ol>
  <div class="row">

    <div class="aw-content-wrap clearfix">
      <div class="col-sm-12 col-md-9 aw-main-content">
        <div class="mod-body">
           <div class="aw-common-list">
            

           <?php $_article = D("Article")->getArticleArc();extract($_article); ?><div class="media">
                <div class="media-body text-center">
                  <h2><?php echo ($title); ?></h2>
                  <ul>
                    <li class="glyphicon glyphicon-eye-open"><span><?php echo ($click); ?></span></li>
                    <li class="glyphicon glyphicon-time"><span><?php echo (date("y-m",$time)); ?></span></li>
                    <li class="glyphicon glyphicon-user"><span>网站编辑</span></li>
                  </ul>
<div class="article-content">
      <p><?php echo ($content); ?></p>    </div>
                </div>
                    <span class='article-line-text '>
      此文章为转载，原文链接为：<a href='#' >http://www.vaikan.com/linux-fun-linux-spotted-in-real-life/</a>    </span>
          <hr><br>
    <h5 class="label label-primary">相关文章</h5>
    <ol class='similarArticleUl'>
      <li><h5><a href='http://acoder.cc/Article/view/aid/279.html'>Linux平台 CentOS 7搭建LAMP环境</a></h5></li><li><h5><a href='http://acoder.cc/Article/view/aid/293.html'>Linux命令行与shell脚本编程大全第2版].布卢姆.pdf</a></h5></li><li><h5><a href='http://acoder.cc/Article/view/aid/295.html'>linux/unix设计思想 (甘卡兹).pdf.zip </a></h5></li><li><h5><a href='http://acoder.cc/Article/view/aid/296.html'>[Linux命令行完全技术宝典].张栋.pdf.zip</a></h5></li><li><h5><a href='http://acoder.cc/Article/view/aid/298.html'>浅析 Linux 初始化 init 系统，第 1 部分: sysvinit</a></h5></li><li><h5><a href='http://acoder.cc/Article/view/aid/300.html'>英特尔和Linux不得不说的故事</a></h5></li>    </ol>
                  <hr>
             </div> 


           </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-3 aw-side-bar hidden-xs hidden-sm">

        <div id="comment" class="second-bar-div">        
          <div class="panel panel-default">
            <div class="panel-body">
               <div id="newest-comment-content">  
                <h4 class="glyphicon glyphicon glyphicon-heart">推荐文章</h4>
                <hr class="second-bar-hr">
                 <?php $field = array("id","title","summary","click","cid","thumbnail","time");$where = D("cate")->getCateWhere(I("get.slug"));$where["del"] = 0;$_arclist = D("Article")->relation(true)->where(array("id"=>array("in",arrayToString(M("article_attr")->field("bid")->where("aid=2")->select()))))->where($where)->field($field)->page(!empty($_GET["p"])?$_GET["p"]:1,5)->order("time desc")->select(); if(is_array($_arclist)): $i = 0; $__LIST__ = $_arclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;$field["thumbnail"]?$field["litpic"]=$field["picturepath"]:$field["litpic"]="/Uploads/defaultpic/".rand(1,100).".jpg";$field["arcurl"]="/".$field["slug"]."/".$field["id"].".html";$field["typelink"]="/category/".$field["slug"]."/";$field["title"] = mb_substr($field["title"], 0, 30);?><div class="media second-bar-item">
                  <div class="media-body">                 
                     <small class="small-title second-bar-small newest-comment-small">[<?php echo (date("y-m",$field["time"])); ?>]</small>
                     <p class="media-heading"><a href="<?php echo ($field["typelink"]); ?>"><?php echo ($field["title"]); ?></a></p>
                  </div>
                </div>
                <hr class="second-third-hr"><?php endforeach; endif; else: echo "" ;endif; ?>
              </div>
            </div>
          </div>
        </div> 
        
        <div id="comment" class="second-bar-div">        
          <div class="panel panel-default">
            <div class="panel-body">
               <div id="newest-comment-content">  
                <h4 class="glyphicon glyphicon glyphicon-fire">热门文章</h4>
                <hr class="second-bar-hr">

                <?php $field = array("id","title","summary","click","cid","thumbnail","time");$where = D("cate")->getCateWhere(I("get.slug"));$where["del"] = 0;$_arclist = D("Article")->relation(true)->where($where)->field($field)->page(!empty($_GET["p"])?$_GET["p"]:1,5)->order("click desc")->select(); if(is_array($_arclist)): $i = 0; $__LIST__ = $_arclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;$field["thumbnail"]?$field["litpic"]=$field["picturepath"]:$field["litpic"]="/Uploads/defaultpic/".rand(1,100).".jpg";$field["arcurl"]="/".$field["slug"]."/".$field["id"].".html";$field["typelink"]="/category/".$field["slug"]."/";$field["title"] = mb_substr($field["title"], 0, 30);?><div class="media second-bar-item">
                  <div class="media-body">                 
                     <small class="small-title second-bar-small newest-comment-small">[<?php echo (date("y-m",$field["time"])); ?>]</small>
                     <p class="media-heading"><a href="<?php echo ($field["arcurl"]); ?>"><?php echo ($field["title"]); ?> </a></p>
                  </div>
                </div>
                <hr class="second-third-hr"><?php endforeach; endif; else: echo "" ;endif; ?>

              </div>
            </div>
          </div>
        </div> 
        
      </div>
    </div>

  </div>
</div>

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