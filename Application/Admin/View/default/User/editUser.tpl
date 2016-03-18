<extend name="Public:base" />
<block name="title">编辑用户</block>
<block name="main">
<div class="col-md-12">
<div id="error" role="alert">
</div>
<form id="from" action="{:U(user/editUser,array('id'=>$user['id']))}" method="post" class="form-horizontal">
  <div class="form-group">
    <label>用户名</label>
    <input type="text" class="form-control" name="username" placeholder="用户名" value="{$user.username}">
  </div>
  <div class="form-group">
    <label>密码</label>
    <input type="password" class="form-control" name="password" placeholder="密码">
  </div>
  <div class="form-group">
    <label>再次输入密码</label>
    <input type="password" class="form-control"name="repassword" placeholder="再次输入密码">
  </div>
  <div class="form-group">
    <label>邮箱</label>
    <input type="text" class="form-control"  name="email" placeholder="邮箱" value="{$user.email}">
  </div>
  <div class="form-group">
    <label>角色</label>
    <select class="form-control" name="persona">
    <option value="">请选择角色</option>
    <foreach name="role" item="vo">
      <option value="{$vo.id}"   <if condition="$user['roleid'] == $vo['id']">selected="selected"</if>  >{$vo.remark}</option> 
    </foreach>
    </select>
  </div>
  <button type="button" class="btn btn-default" onclick="login()">确定</button>
</form>
</div>
</block>