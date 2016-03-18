<extend name="Public:base" />
<block name="title">用户列表</block>
<block name="main">
<div class="col-md-12">
          <form class="navbar-form navbar-right" action="{:U('User/search')}" method="post">
            <input type="text" class="form-control" name="search" placeholder="Search...">
          </form>
<table class="table table-striped table-hover">
   <thead>
      <tr>
         <th>id</th>
         <th>用户名</th>
         <th>邮箱</th>   
         <th>上次登录时间</th>
         <th>上次登录ip</th>
         <th>用户所属组</th>
         <th>状态</th>   
         <th>操作</th>
      </tr>
   </thead>
   <tbody>
   <foreach name="data" item="vo">
    
      <tr>
         <td>{$vo.id}</td>
         <td>{$vo.username}</td>
         <td>{$vo.email}</td>
         <td><if condition = '$vo["logintime"]'> {$vo['logintime']|date="y-m-d h:m:s",###}</if></td>
         <td>{$vo.loginip}</td>
         <td>
         <if condition = '$vo["username"] == C("RBAC_SUPERADMIN")'>
         超级管理员
         <else/>
         {$vo.roleremark}
         </if>       
         </td>
         <td>{$vo[status]?'登录':'未登录'}</td>
         <td ><input type="button" value="修改" class="btn btn-default" onclick="edite('{:U('User/editUser',array('id'=>$vo['id']))}')">
              <input type="button" value="删除" class="btn btn-default"  onclick="del('{:U('User/delUser',array('id'=>$vo['id']))}')">
         </td>
      </tr>    
    </foreach> 
   </tbody>  
</table>
<nav>
  <ul class="pagination">
  {$show}
  </ul>
</nav>
</div>
</block>