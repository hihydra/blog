<extend name="Public:base" />
<block name="title">修改分类</block>
<block name="main">
<div class="col-md-12">
<div id="error" role="alert">
</div>
<form id="from" action="{:U('Category/editCate',array('id'=>$cate['id']))}" method="post" class="form-horizontal">
  <div class="form-group">
    <label>分类名称</label>
    <input type="text" class="form-control" name="name" placeholder="分类名称" value="{$cate.name}" required>
  </div>
  <div class="form-group">
    <label>别名</label>
    <input type="text" class="form-control" name="slug" placeholder="别名" value="{$cate.slug}" required>
  </div>
  <div class="form-group">
    <label>分类排序</label>
    <input type="text" class="form-control" name="sort" value="{$cate.sort}" required>
  </div>
  <input type="hidden" name="pid" value='{$cate.pid}'>
  <button type="submit" class="btn btn-default">确定</button>
</form>
</div>
</block>