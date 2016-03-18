<extend name="Public:base" />
<block name="title">编辑节点</block>
<block name="main">
<div class="col-md-12">
<div id="error" role="alert">
</div>
<form id="from" action="{:U('Rbac/editNode',array('id'=>$node['id']))}" method="post" class="form-horizontal">
   <div class="form-group">
    <label>{$type}名称:</label>
    <input type="text" class="form-control" name="name" placeholder="角色名称"  value="{$node.name}" required>
  </div>
  <div class="form-group">
    <label>{$type}描述:</label>
    <input type="text" class="form-control" name="title" placeholder="角色描述" value="{$node.title}" required>
  </div>
  <div class="form-group">
    <label>是否开启:</label>
      <label>
         <input type="radio" name="status" value='1'  checked="checked" >&nbsp;开启&nbsp;
         <input type="radio" name="status" value='0' >&nbsp;关闭&nbsp;
      </label>
  </div>
  <div class="form-group">
    <label>排序:</label>
    <input type="text" class="form-control" id="sort" name="sort" value="1">
  </div>
  <input type="hidden" name="pid" value="{$node.pid}"/>
  <input type="hidden" name="level" value="{$node.level}">
  <button type="submit" class="btn btn-default">确定</button>
</form>
</div>
</block>