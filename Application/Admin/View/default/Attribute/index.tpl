<extend name="Public:base" />
<block name="title">属性列表</block>
<block name="main">
<div class="col-md-12">
<table class="table table-striped table-hover">
   <thead>
      <tr>
         <th>id</th>
         <th>名称</th>
         <th>符号</th> 
         <th>颜色</th>  
         <th>操作</th>
      </tr>
   </thead>
   <tbody>
   <foreach name="attr" item="vo">
    
      <tr>
         <td>{$vo.id}</td>
         <td>{$vo.name}</td>
         <td>{$vo.flag}</td>
         <td>
          <div style="width:50px;height:20px;background:{$vo.color}"></div>
         </td>
         <td>
         <input type="button" value="修改" class="btn btn-default" onclick="edite('{:U('Attribute/editAttr',array('id'=>$vo['id']))}')">
         <input type="button" value="删除" class="btn btn-default"  onclick="del('{:U('Attribute/delAttr',array('id'=>$vo['id']))}')">

         </td>

      </tr>
     
    </foreach> 
   </tbody>  
</table>
</div>
</block>