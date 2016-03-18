<extend name="Public:base" />
<block name="title">节点列表</block>
<block name="main">
<div class="col-md-12">
   <foreach name="node" item="app">   
   <div class="app">
      <li class="list-group-item list-group-item-success">
      <b>{$app.title}</b>
      [<a href="{:U('Rbac/addNode',array('pid'=>$app['id'],'level'=>2))}">添加控制器</a>]
      [<a href="{:U('Rbac/editNode',array('id'=>$app['id']))}">修改</a>]
      [<a href="{:U('Rbac/delNode',array('id'=>$app['id']))}">删除</a>]
      </li>          
        <div class="action">
        <foreach name="app.child" item="action">
             <li class="list-group-item list-group-item-info col-md-offset-1">          
                 <b>&nbsp;{$action.title}</b>
                  [<a href="{:U('Rbac/addNode',array('pid'=>$action['id'],'level'=>3))}">添加方法</a>]
                  [<a href="{:U('Rbac/editNode',array('id'=>$action['id']))}">修改</a>]
                  [<a href="{:U('Rbac/delNode',array('id'=>$action['id']))}">删除</a>]
               
             </li>            
              <div class="method">
                   <li class="list-group-item col-md-offset-1">
                      <foreach name="action.child" item="method">
                         &nbsp;{$method.title}
                        [<a href="{:U('Rbac/editNode',array('id'=>$method['id']))}">修改</a>]
                        [<a href="{:U('Rbac/delNode',array('id'=>$method['id']))}">删除</a>]&nbsp;&nbsp;
                     </foreach>
                   </li>                  
              </div> 
          </foreach> 
        </div>      
    </div>                
  </foreach>   
</div>
</block>