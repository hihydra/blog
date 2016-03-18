<extend name="Public:base" />
<block name="title">配置权限</block>
<block name="main">
<div class="col-md-12">
<form action="{:U('Rbac/access')}" method="post">
 <foreach name="node" item="app"> 
   <div class="app">    
        <li class="list-group-item list-group-item-success">
          <b>{$app.title}</b>
          <input type="checkbox" name="access[]" value="{$app.id}_1" level="1" <if condition="$app['access']">checked='checked'</if>/>
        </li>     
        <foreach name="app.child" item="action">     
          <div class="action">         
            <li class="list-group-item list-group-item-info col-md-offset-1">              
              <b>&nbsp;{$action.title}</b>
              <input type="checkbox" name="access[]" value="{$action.id}_2" level="2" <if condition="$action['access']">checked='checked'</if>/>&nbsp;               
            </li>
          <div class="method">
           <li class="list-group-item col-md-offset-1">
              <foreach name="action.child" item="method">
               &nbsp;{$method.title}
               <input type="checkbox" name="access[]" value="{$method.id}_3" level="3" <if condition="$method['access']">checked='checked'</if>/>&nbsp;
             </foreach>
           </li>                  
          </div>             
          </div>    
        </foreach>   
    </div>                
 </foreach> 
<input type="hidden" name="rid" value="{$rid}">
<button type="submit" class="btn btn-lg btn-primary col-md-offset-5">提交</button>
</form>   
</div>
<script type="text/javascript">
  $(function(){
    $('input[level=1]').click(function(){
      var inputs = $(this).parents('.app').find('input');
      $(this).prop('checked')?inputs.prop('checked','checked'):inputs.prop("checked", false);
    });
   $('input[level=2]').click(function(){
      var inputs = $(this).parents('.action').find('input');
      $(this).prop('checked')?inputs.prop('checked','checked'):inputs.prop("checked", false);
    });
  });
</script>
</block>