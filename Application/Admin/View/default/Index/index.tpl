<extend name="Public:base" />
<block name="title">主菜单</block>
<block name="main">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-0">
<div class="row">

<div class="col-md-6" >
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">最新文章</h3>
</div>
<div class="list-group">
<foreach name="latestarc" item="vo">
<a href="{:U('Article/editArticle',array('id'=>$vo['id']))}" class="list-group-item"><span class="badge pull-right">{$vo.click}</span>{$vo.title}</a>
</foreach>
</div>
</div>
</div>

<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">最近评论</h3>
</div>
<div class="panel-body">
<ul class="nav nav-pills nav-stacked" role="tablist">
<li role="presentation">
<a href="#" class="alert alert-info">
<span class="badge pull-right">42</span>
订单审批
</a>
</li>
<li role="presentation">
<a href="#" class="alert alert-info">
<span class="badge pull-right">20</span>
收款确认
</a>
</li>
<li role="presentation">
<a href="#" class="alert alert-info">
<span class="badge pull-right">10</span>
付款确认
</a>
</li>
</ul>
</div>
</div>
</div>

</div>
<div class="row">
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">在线用户</h3>
</div>
<div class="panel-body">
<table class="table table-striped">
<thead>
<tr>
<th>id</th>
<th>用户名</th>
<th>上次登录时间</th>
<th>上次登录ip</th>
</tr>
</thead>
<tbody>
<foreach name="onuser" item="vo">
<tr>
<td>{$vo.id}</td>
<td>{$vo.username}</td>
<td>{$vo.logintime|date="y-m-d h:m:s",###}</td>
<td>{$vo.loginip}</td>
</tr>
</foreach>
</tbody>
</table>
<p><a class="btn btn-primary" href="{:U('User/index')}" role="button">查看详细&raquo;</a></p>
</div>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">概览</h3>
</div>
<div class="panel-body">
<ul class="nav nav-pills nav-stacked" role="tablist">
<li class="alert alert-info">
<span class="badge pull-right">{$countarc}</span>
文章数量
</li>
<li class="alert alert-info">
<span class="badge pull-right">{$countuser}</span>
用户数量
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</block>