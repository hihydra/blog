<extend name="Public:base" />
<block name="title">修改文章</block>
<block name="main">
<script type="text/javascript" src="__PUBLIC__/uploadify/jquery.uploadify.min.js"></script>
<div class="col-md-12">
<div id="error" role="alert">
</div>
<form id="from" action="{:U('Article/editArticle',array('id'=>$article['id']))}" method="post" class="form-horizontal">
  <div class="form-group">
    <label for="exampleInputname">所属分类:</label>
    <select name="cid">
	<option value="">==请选择分类==</option>
	<foreach name="cate" item="vo">
		<option value="{$vo.id}" <if condition="$vo['id'] == $article['cateid']">selected="selected"</if>>{$vo.html}{$vo.name}</option>
	</foreach>
	</select>
  </div>
    <div class="form-group">
    <label>属性名称:</label>
  <foreach name="attr" item="vo">
		<label>
			<input type="checkbox" name="attr[]" value="{$vo.id}" 
        <foreach name="article.attr" item="attr">
          <if condition="$vo['id'] == $attr['id']">
            checked='checked' 
          </if>
        </foreach>
      />&nbsp;{$vo.name}&nbsp;&nbsp;
		</label>
	</foreach>
  </div>
   <div class="form-group">
    <label>点击次数</label>
    <input type="text" class="form-control"  name="click" value="{$article.click}" required>
  </div>
  <div class="form-group">
    <label>文章标题</label>
    <input type="text" class="form-control" name="title" placeholder="文章标题" value="{$article.title}" required>
  </div>
    <div class="form-group">
    <label>缩略图</label> 
    <div class="controls">
        <input type="file" id="upload_picture_cover_id">
        <input type="hidden" name="thumbnail" id="cover_id_cover_id" value="{$article.pictureid}"/>
        <div class="upload-img-box">
        <if condition="$article['thumbnail']">
          <div class="upload-pre-item"><img src="{$article.picturepath}"/></div>
        </if>  
        </div>
    </div>
                <script type="text/javascript">
                //上传图片
                /* 初始化上传插件 */
                $("#upload_picture_cover_id").uploadify({                     
                      "swf"             : "__PUBLIC__/uploadify/uploadify.swf",
                      "buttonImage"     : "__PUBLIC__/uploadify/browse-btn.png",
                      "width"           : 120,
                      "height"          : 30,
                      "fileObjName"     : "download",
                      "uploader"        : "{:U('Article/upload')}",
                      'removeTimeout'   : 1,
                      'fileTypeExts'    : '*.jpg; *.png; *.gif;',
                      "onUploadSuccess" : function uploadPicturecover_id(file,data){
                        eval('var data ='+data);
                        var src = '';

                          if(data.status){
                            $("#cover_id_cover_id").val(data.id);
                            src = data.url;
                            $("#cover_id_cover_id").parent().find('.upload-img-box').html(
                              '<div class="upload-pre-item"><img src="' + src + '></div>'
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
    <input type="text" class="form-control" name="summary" placeholder="摘要" value="{$article.summary}">
  </div>
  <div class="form-group">
    <label>文章内容</label>
    <textarea name="content" id="content">{$article.content}</textarea>
  </div>
  <button type="submit" class="btn btn-default">确定</button>
</form>
</div>
<js href="__PUBLIC__/ueditor/ueditor.config.js" />    
<js href="__PUBLIC__/ueditor/ueditor.all.min.js" />
<script>
    $(function(){
        var ue = UE.getEditor('content',{
        	initialFrameWidth :1500,//设置编辑器宽度
			initialFrameHeight:300,//设置编辑器高度
			imageUrl :'{:U('Article/upload')}',
			imagePath:"http://",
            serverUrl :'{:U('Article/ueditor')}'
        });
    })
</script>
</block>