<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title><?php echo (C("webname")); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.css">
  <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>  
  <script type="text/javascript" src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/blog/Public/Home/css/index.css">
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/blog/Public/Home/images/defaultUserImage.png" class="img-circle nav-user-small-img">Dropdown <span class="caret"></span></a>
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
  <div class="row">
    <div id="content-top">
      <div id="carousel-example-generic" class="carousel slide"  data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="/blog/Public/Home/images/opera-big.jpg" alt="...">
          </div>
          <div class="item">
            <img src="/blog/Public/Home/images/safari-big.jpg" alt="...">
          </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div id="headlines">
        <div id="hogest-article-content">
          <ul class="list-group">
            <h4  class="list-group-item active glyphicon glyphicon-flag">头条</h4>
            <?php $field = array("id","title","summary","click","cid","thumbnail","time");$where["del"] = 0;$_arclist = D("Article")->relation(true)->where(array("id"=>array("in",arrayToString(M("article_attr")->field("bid")->where("aid=2")->select()))))->where($where)->field($field)->page(!empty($_GET["p"])?$_GET["p"]:1,2)->order("time desc")->select(); if(is_array($_arclist)): $i = 0; $__LIST__ = $_arclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;$field["thumbnail"]?$field["litpic"]=$field["picturepath"]:$field["litpic"]="/Uploads/defaultpic/".rand(1,100).".jpg";$field["arcurl"]="/".$field["slug"]."/".$field["id"].".html";$field["typelink"]="/category/".$field["slug"]."/";$field["title"] = mb_substr($field["title"], 0, 30);?><li class="list-group-item second-bar-article-ul"> 
               <h5 class="media-heading"><a href="<?php echo ($field["arcurl"]); ?>"><?php echo ($field["title"]); ?></a></h5>
               <small>[<?php echo (date("y-m",$field["time"])); ?>]</small>    
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </div> 
      </div> 
    </div>

    <div class="aw-content-wrap clearfix">
      <div class="col-sm-12 col-md-9 aw-main-content">
       <hr>
        <div class="mod-body">
           <div class="aw-common-list">
           <?php $field = array("id","title","summary","click","cid","thumbnail","time");$where["del"] = 0;$_arclist = D("Article")->relation(true)->where($where)->field($field)->page(!empty($_GET["p"])?$_GET["p"]:1,10)->order("time desc")->select(); if(is_array($_arclist)): $i = 0; $__LIST__ = $_arclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;$field["thumbnail"]?$field["litpic"]=$field["picturepath"]:$field["litpic"]="/Uploads/defaultpic/".rand(1,100).".jpg";$field["arcurl"]="/".$field["slug"]."/".$field["id"].".html";$field["typelink"]="/category/".$field["slug"]."/";$field["title"] = mb_substr($field["title"], 0, 30);?><div class="media">
                <div class="media-left media-middle">
                  <a href="http://acoder.cc/User/center/uid/4.html">
                    <img class="media-object small-user-image" src="<?php echo ($field["litpic"]); ?>" alt="<?php echo ($field["title"]); ?>" width="180px",height="120px">
                  </a>
                </div>
                <div class="media-body">
                  <h3 class="media-heading"><a href="<?php echo ($field["arcurl"]); ?>"><?php echo ($field["title"]); ?></a></h3>
                       <p class="article-digest"><?php echo ($field["summary"]); ?>...</p>
                  <ul class="article-tags-ul">
                    <li><span class="glyphicon glyphicon-tag"><a href="<?php echo ($field["typelink"]); ?>"><?php echo ($field["typename"]); ?></a></span></li>
                  </ul>
                  <ul class="small-bar-ul">
                    <li id="visit" class="glyphicon glyphicon-eye-open"><span><?php echo ($field["click"]); ?></span></li>
                    <li id="comment" class="glyphicon glyphicon-comment"><span ><a href="#">4</a></span></li>
                    <li id="time" class="glyphicon glyphicon-time"><span><?php echo (date("y-m",$field["time"])); ?></span></li>
                  </ul>
                </div>
                  <hr>
             </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <nav class="page">
                   <?php $_page = D("Cate")->getCatePage($slug,10);echo $_page; ?>
                </nav>
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

                <?php $field = array("id","title","summary","click","cid","thumbnail","time");$where["del"] = 0;$_arclist = D("Article")->relation(true)->where(array("id"=>array("in",arrayToString(M("article_attr")->field("bid")->where("aid=2")->select()))))->where($where)->field($field)->page(!empty($_GET["p"])?$_GET["p"]:1,5)->order("time desc")->select(); if(is_array($_arclist)): $i = 0; $__LIST__ = $_arclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;$field["thumbnail"]?$field["litpic"]=$field["picturepath"]:$field["litpic"]="/Uploads/defaultpic/".rand(1,100).".jpg";$field["arcurl"]="/".$field["slug"]."/".$field["id"].".html";$field["typelink"]="/category/".$field["slug"]."/";$field["title"] = mb_substr($field["title"], 0, 30);?><div class="media second-bar-item">
                  <div class="media-body">                 
                     <small class="small-title second-bar-small newest-comment-small">[<?php echo (date("y-m",$field["time"])); ?>]</small>
                     <p class="media-heading"><a href="<?php echo ($field["arcurl"]); ?>"><?php echo ($field["title"]); ?></a></p>
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

                <?php $field = array("id","title","summary","click","cid","thumbnail","time");$where["del"] = 0;$_arclist = D("Article")->relation(true)->where($where)->field($field)->page(!empty($_GET["p"])?$_GET["p"]:1,5)->order("click desc")->select(); if(is_array($_arclist)): $i = 0; $__LIST__ = $_arclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;$field["thumbnail"]?$field["litpic"]=$field["picturepath"]:$field["litpic"]="/Uploads/defaultpic/".rand(1,100).".jpg";$field["arcurl"]="/".$field["slug"]."/".$field["id"].".html";$field["typelink"]="/category/".$field["slug"]."/";$field["title"] = mb_substr($field["title"], 0, 30);?><div class="media second-bar-item">
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

        <div id="newest-comment" class="second-bar-div">        
          <div class="panel panel-default">
            <div class="panel-body">
               <div id="newest-comment-content">  
                <h4 class="glyphicon glyphicon-comment">最近评论</h4>
                <hr class="second-bar-hr">
                 <div class="media second-bar-item">
                  <div class="media-left media-top">
                      <a href="#">
                      <img class="media-object  newest-comment-small-user-image" src="/blog/Public/Home/images/defaultUserImage.png">
                    </a>
                  </div>
                  <div class="media-body">                 
                     <small class="small-title second-bar-small newest-comment-small">@未登陆用户:</small>
                     <p class="media-heading"><a href="http://acoder.cc/Article/view/aid/468/#comment-start"> 正解 </a></p>
                  </div>
                </div>
                <hr class="second-third-hr">
                 <div class="media second-bar-item">
                  <div class="media-left media-top">
                      <a href="#">
                      <img class="media-object  newest-comment-small-user-image" src="/blog/Public/Home/images/defaultUserImage.png">
                    </a>
                  </div>
                  <div class="media-body">                 
                     <small class="small-title second-bar-small newest-comment-small">@未登陆用户:</small>
                     <p class="media-heading"><a href="http://acoder.cc/Article/view/aid/468/#comment-start"> 正解 </a></p>
                  </div>
                </div>
                <hr class="second-third-hr">
                 <div class="media second-bar-item">
                  <div class="media-left media-top">
                      <a href="#">
                      <img class="media-object  newest-comment-small-user-image" src="/blog/Public/Home/images/defaultUserImage.png">
                    </a>
                  </div>
                  <div class="media-body">                 
                     <small class="small-title second-bar-small newest-comment-small">@未登陆用户:</small>
                     <p class="media-heading"><a href="http://acoder.cc/Article/view/aid/468/#comment-start"> 正解 </a></p>
                  </div>
                </div>
                <hr class="second-third-hr">


              </div>
            </div>
          </div>
        </div> 
<!--友情链接-->
        <div id="newest-comment" class="second-bar-div">        
          <div class="panel panel-default">
            <div class="panel-body">
               <div id="newest-comment-content">  
                <h4 class="glyphicon glyphicon-comment glyphicon glyphicon-link">友情链接</h4>
                <hr class="second-bar-hr">
                 <div class="media second-bar-item">
                  <div class="media-body">                 
                     <p class="media-heading"><a href="#">正解 </a></p>
                  </div>
                </div>
                <hr class="second-third-hr">
                 <div class="media second-bar-item">
                  <div class="media-body">                 
                     <p class="media-heading"><a href="#">正解 </a></p>
                  </div>
                </div>
                <hr class="second-third-hr">
                 <div class="media second-bar-item">
                  <div class="media-body">                 
                     <p class="media-heading"><a href="#">正解 </a></p>
                  </div>
                </div>
                <hr class="second-third-hr">
              </div>
            </div>
          </div>
        </div> 
<!--友情链接-->
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