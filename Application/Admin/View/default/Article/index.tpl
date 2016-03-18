<extend name="Public:base" />
<block name="title">
<if condition='ACTION_NAME eq "trach"'>回收站<else/>文章列表</if></block>
<block name="main">
<div class="col-md-12">
<div id="error" role="alert">
</div>
<if condition='ACTION_NAME eq "trach"'>
      <input type="button" value="清空回收站" class="btn btn-default pull-right"  onclick="del('{:U('Article/emptyTrach')}')">
<else/>          
    <form class="navbar-form navbar-right" action="{:U('Article/search')}" method="post">
         <input type="text" class="form-control" name="search" placeholder="Search...">
    </form>
</if>
<div id="table">
    <table class="table table-striped table-hover">
       <thead>
          <tr>
             <th>id</th>
             <th>标题</th>
             <th>分类</th>
             <th>点击</th>
             <th>时间</th>     
             <th>操作</th>
             <th>选择</th>
          </tr>
       </thead>
       <tbody>
       <foreach name="article.list" item="vo">
        
          <tr>
             <td>{$vo.id}</td>
             <td>{$vo.title}
             <foreach name="vo.attr" item="value">
             <strong style="color:{$value.color};padding:0 5px">[{$value.name}]</strong>
             </foreach>
             </td>
             <td>{$vo.catename}</td>
             <td>{$vo.click}</td>
             <td>{$vo.time|date='y-m-d H:i',###}</td>
             <td>
             <if condition='ACTION_NAME eq "trach"'>
                <input type="button" value="还原" class="btn btn-default" onclick="urlJump('{:U('Article/toTrach',array('id'=>$vo['id'],'type' =>0))}')">
                <input type="button" value="彻底删除" class="btn btn-default"  onclick="empty('{:U('Article/delete',array('id'=>$vo['id']))}')">
              <else/>  
                <input type="button" value="修改" class="btn btn-default" onclick="urlJump('{:U('Article/editArticle',array('id'=>$vo['id']))}')">
                <input type="button" value="删除" class="btn btn-default" onclick="recycle('{:U('Article/toTrach',array('id'=>$vo['id'], 'type' =>1))}')">
             </if>
             </td>
             <td><input type="checkbox" value="{$vo.id}"></input></td>  
          </tr>
         
        </foreach> 
       </tbody>  
    </table>
</div>
<div id="function">
    <if condition='ACTION_NAME eq "trach"'>
    <a class="btn btn-default" href="" role="button" onclick="getValue('{:U('Article/toTrach')}',0);return false">还原</a>
    <a class="btn btn-default" href="" role="button" onclick="getValue('{:U('Article/delete')}');return false">彻底删除</a>    
    <else/>
    <a class="btn btn-default" href="" role="button" onclick="getValue('{:U('Article/toTrach')}',1);return false">删除</a> 
    <div class="btn-group">
      <button type="button" class="btn btn-default">筛选</button>
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu">
      <foreach name="cate" item="vo">
        <li><a href="" onclick="urlJump('{:U('Article/screen',array('cid'=>$vo['id']))}');return false">{$vo.name}</a></li>
      </foreach> 
      <li role="separator" class="divider"></li>
      <li><a href="{:U('Article/index')}">全部</a></li> 
      </ul>
    </div>
    <div class="btn-group">
      <button type="button" class="btn btn-default">移动到</button>
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu">
      <foreach name="cate" item="vo">
        <li><a href="#" onclick="getValue('{:U('Article/move')}',{$vo.id});return false">{$vo.name}</a></li>
      </foreach>
      </ul>
    </div>
    <div class="btn-group">
      <button type="button" class="btn btn-default">增加属性</button>
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu">
      <foreach name="attr" item="vo">
        <li><a href="" onclick="urlJump('{:U('Article/addProperty',array('aid'=>$vo['aid']))}');return false">{$vo.name}</a></li>
      </foreach> 
      </ul>
    </div>
    <div class="btn-group">
      <button type="button" class="btn btn-default">删除属性</button>
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu">
      <foreach name="attr" item="vo">
        <li><a href="" onclick="urlJump('{:U('Article/screen',array('cid'=>$vo['id']))}');return false">{$vo.name}</a></li>
      </foreach> 
      </ul>
    </div>
    </if>
    <div class="btn-group pull-right" role="group">
      <button type="button" class="btn btn-default" onclick="selectAll()">全选</button>
      <button type="button" class="btn btn-default" onclick="unSelect()">全不选</button>
      <button type="button" class="btn btn-default" onclick="reverse()">反选</button>
    </div>
</div>
<nav>
  <ul class="pagination">
  {$article.page}
  </ul>
</nav>
</div>
</block>