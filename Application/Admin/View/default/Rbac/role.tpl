<extend name="Public:base" />
<block name="title">角色列表</block>
<block name="main">
<div class="col-md-12">
<table class="table table-striped table-hover">
   <thead>
      <tr>
         <th>id</th>
         <th>名称</th>
         <th>描述</th> 
         <th>状态</th>
         <th>操作</th>
      </tr>
   </thead>
   <tbody>
   <foreach name="role" item="vo">
    
      <tr>
         <td>{$vo.id}</td>
         <td>{$vo.name}</td>
         <td>{$vo.remark}</td>
         <td>{$vo[status]?开启:关闭}</td>
         <td>
         <input type="button" value="配置权限" class="btn btn-default" onclick="edite('{:U('Rbac/access',array('rid'=>$vo['id']))}')">
         <input type="button" value="编辑角色" class="btn btn-default"  onclick="edite('{:U('Rbac/editRole',array('id'=>$vo['id']))}')">

         </td>

      </tr>
     
    </foreach> 
   </tbody>  
</table>
</div>
</block>