<extend name="Public:base" />
<block name="title">分类列表</block>
<block name="main">
<div class="col-md-12">
<form  id="from"  action="{:U('Category/sortCate')}" method="post">
<table class="table table-striped table-hover">
   <thead>
      <tr>
         <th>id</th>
         <th>名称</th>
         <th>级别</th>   
         <th>排序<a href="" onclick="sort()"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th> 
         <th>操作</th>
      </tr>
   </thead>
   <tbody>
   <foreach name="cate" item="vo">
    
      <tr>
         <td>{$vo.id}</td>
         <td>{$vo.html}{$vo.name}</td>
         <td>{$vo.pid}</td>
         <td>
             <input type="text" name="{$vo.id}" value="{$vo.sort}" class="btn btn-default">
         </td>
         <td>
         <input type="button" value="添加子分类" class="btn btn-default" onclick="edite('{:U('Category/addCate',array('pid'=>$vo['id']))}')">
         <input type="button" value="修改" class="btn btn-default" onclick="edite('{:U('Category/editCate',array('id'=>$vo['id']))}')">
         <input type="button" value="删除" class="btn btn-default"  onclick="del('{:U('Category/delCate',array('id'=>$vo['id']))}')">

         </td>

      </tr>
     
    </foreach> 
   </tbody>  
</table>
</form>
</div>
</block>