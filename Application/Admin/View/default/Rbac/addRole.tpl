<extend name="Public:base" />
<block name="title">添加角色</block>
<block name="main">
<div class="col-md-12">
<div id="error" role="alert">
</div>
<form id="from" action="{:U('Rbac/addRole')}" method="post" class="form-horizontal">

   <div class="form-group">
    <label>角色名称:</label>
    <input type="text" class="form-control" name="name" placeholder="角色名称" required>
  </div>
  <div class="form-group">
    <label>角色描述:</label>
    <input type="text" class="form-control" name="remark" placeholder="角色描述" required>
  </div>
  <div class="form-group">
    <label>是否开启:</label>
      <label>
         <input type="radio" name="status" value='1'  checked="checked" >&nbsp;开启&nbsp;
         <input type="radio" name="status" value='0' >&nbsp;关闭&nbsp;
      </label>
  </div>
  <button type="submit" class="btn btn-default">提交</button>
</form>
</div>
</block>