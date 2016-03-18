<extend name="Public:base" />
<block name="title">添加节点</block>
<block name="main">
<div class="col-md-12">
<div id="error" role="alert">
</div>
<form id="from" action="{:U('Rbac/addNode')}" method="post" class="form-horizontal">

   <div class="form-group">
    <label>{$type}名称:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="角色名称" required>
  </div>
  <div class="form-group">
    <label>{$type}描述:</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="角色描述" required>
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
  <input type="hidden" name="pid" value="{$pid}"/>
  <input type="hidden" name="level" value="{$level}">
  <button type="submit" class="btn btn-default">保存添加</button>
</form>
</div>
</block>