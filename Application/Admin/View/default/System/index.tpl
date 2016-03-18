<extend name="Public:base" />
<block name="title">常规设置</block>
<block name="main">
<div class="col-md-12">
<div id="error" role="alert">
</div>
<form id="from" action="{:U('System/upconfig')}" method="post" class="form-horizontal">
  <div class="form-group">
    <label>网站名称</label>
    <input type="text" class="form-control" name="webname" placeholder="网站名称" value="{$Think.config.webname}" required>
  </div>
  <div class="form-group">
    <label>关键字</label>
    <input type="text" class="form-control" name="keywords" placeholder="关键字" value="{$Think.config.keywords}" required>
  </div>
  <div class="form-group">
    <label>描述</label>
    <input type="text" class="form-control" name="description" placeholder="描述" value="{$Think.config.description}" required>
  </div>
  <div class="form-group">
    <label>网站域名</label>
    <input type="text" class="form-control" name="basehost" placeholder="网站域名" value="{$Think.config.basehost}" required>
  </div>
  <div class="form-group">
    <label>版权</label>
    <input type="text" class="form-control" name="powerby" placeholder="版权" value="{$Think.config.powerby}" required>
  </div>
   <div class="form-group">
    <label>网站备案号</label>
    <input type="text" class="form-control" name="beian" placeholder="网站备案号" value="{$Think.config.beian}" required>
  </div>
  <div class="form-group">
    <label>模板默认风格</label>
    <input type="text" class="form-control" name="DEFAULT_THEME" placeholder="模板默认风格"  value="{$Think.config.DEFAULT_THEME}" required>
  </div>
  <button type="submit" class="btn btn-default">保存设置</button>
</form>
</div>
</block>