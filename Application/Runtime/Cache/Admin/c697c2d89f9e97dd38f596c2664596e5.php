<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>后台管理</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/Css/admin.css">
    <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>      
    <script type="text/javascript" src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/Js/admin.js"></script>
    <script language="JavaScript">
    function fleshVerify(){ 
        //重载验证码
        var time = new Date().getTime();
            document.getElementById('verifyImg').src= '/index.php/Admin/login/code/'+time;
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
<h1 class="page-header">添加文章</h1>

<script type="text/javascript" src="/Public/uploadify/jquery.uploadify.min.js"></script>
<div class="col-md-12">
<div id="error" role="alert">
</div>
<form id="from" action="<?php echo U('Article/addArticle');?>" method="post" class="form-horizontal">
  <div class="form-group">
    <label for="exampleInputname">所属分类:</label>
    <select name="cid">
	<option value="">==请选择分类==</option>
	<?php if(is_array($cate)): foreach($cate as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["html"]); echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
	</select>
  </div>
    <div class="form-group">
    <label>属性名称:</label>
     <?php if(is_array($attr)): foreach($attr as $key=>$vo): ?><label>
			<input type="checkbox" name="attr[]" value="<?php echo ($vo["id"]); ?>"/>&nbsp;<?php echo ($vo["name"]); ?>&nbsp;&nbsp;
		</label><?php endforeach; endif; ?>
  </div>
   <div class="form-group">
    <label>点击次数</label>
    <input type="text" class="form-control"  name="click" value="100" required>
  </div>
  <div class="form-group">
    <label>文章标题</label>
    <input type="text" class="form-control" name="title" placeholder="文章标题" required>
  </div>
  <div class="form-group">
    <label>缩略图</label> 
    <div class="controls">
        <input type="file" id="upload_picture_cover_id">
        <input type="hidden" name="thumbnail" id="cover_id_cover_id" value="0"/>
        <div class="upload-img-box"></div>
    </div>
                <script type="text/javascript">
                //上传图片
                /* 初始化上传插件 */
                $("#upload_picture_cover_id").uploadify({                     
                      "swf"             : "/Public/uploadify/uploadify.swf",
                      "buttonImage"     : "/Public/uploadify/browse-btn.png",
                      "width"           : 120,
                      "height"          : 30,
                      "fileObjName"     : "download",
                      "uploader"        : "<?php echo U('Article/upload');?>",
                      'removeTimeout'   : 1,
                      'fileTypeExts'    : '*.jpg; *.png; *.gif;',
                      "onUploadSuccess" : function uploadPicturecover_id(file,data){
                        eval('var data ='+data);
                        var src = '';

                          if(data.status){
                            $("#cover_id_cover_id").val(data.id);
                            src = data.url;
                            $("#cover_id_cover_id").parent().find('.upload-img-box').html(
                              '<div class="upload-pre-item"><img src=' + src + '></div>'
                            );
                          }else{      
                                  $('.upload-img-box').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+data.error+'</div>');
                          }
                      },
                      'onFallback' : function() {
                          alert('未检测到兼容版本的Flash.');
                      }
                  });
                </script>          
  </div>
  <div class="form-group">
    <label>摘要</label>
    <input type="text" class="form-control" name="summary" placeholder="摘要">
  </div>
  <div class="form-group">
    <label>文章内容</label>
    <textarea name="content" id="content"></textarea>
  </div>
  <button type="submit" class="btn btn-default">确定</button>
</form>
</div>
<script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>    
<script type="text/javascript" src="/Public/ueditor/ueditor.all.min.js"></script>
<script>
//ueditor配置
    $(function(){
        var ue = UE.getEditor('content',{
        	initialFrameWidth :1500,//设置编辑器宽度
    			initialFrameHeight:300,//设置编辑器高度
    			imageUrl :'<?php echo U('Article/upload');?>',
    			imagePath:"http://",
          serverUrl :'<?php echo U('Article/ueditor');?>'
        });
    })
</script>

</div>
</div>
</div>
</body>
</html>