<extend name="Public:base" />
<block name="title">修改属性</block>
<block name="main">
<div class="col-md-12">
<form id="from" action="{:U('Attribute/editAttr',array('id'=>$attr['id']))}" method="post" class="form-horizontal">
  <div class="form-group">
    <label>属性名称</label>
    <input type="text" class="form-control" name="name" placeholder="属性名称" value="{$attr.name}" required>
  </div>
  <div class="form-group">
    <label>属性符号</label>
    <input type="text" class="form-control" name="flag" placeholder="属性符号" value="{$attr.flag}" required>
  </div>
  <div class="form-group">
    <label>属性颜色</label>
    <input type="text" class="form-control" name="color" placeholder="属性颜色"  value="{$attr.color}" required>
  </div>
  <button type="submit" class="btn btn-default">确定</button>
</form>
</div>
</block>