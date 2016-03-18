<extend name="Public:base" />
<block name="title">编辑角色</block>
<block name="main">
<div class="col-md-12">
<div id="error" role="alert">
</div>
<form id="from" action="{:U('Rbac/editRole',array('id'=>$role['id']))}" method="post" class="form-horizontal">
   <div class="form-group">
    <label>角色名称:</label>
    <input type="text" class="form-control" name="name" placeholder="角色名称" value="{$role.name}" required>
  </div>
  <div class="form-group">
    <label>角色描述:</label>
    <input type="text" class="form-control" name="remark" placeholder="角色描述"  value="{$role.remark}" required>
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