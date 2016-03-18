<extend name="Public:base" />
<block name="title">列表页</block>
<block name="main">
<div class="container">
    <ol class="breadcrumb">
      <li><a href="/">主页</a></li>
      <blog:position/>
    </ol>
  <div class="row">
    <div class="aw-content-wrap clearfix">
      <div class="col-sm-12 col-md-9 aw-main-content">
        <div class="mod-body">
           <div class="aw-common-list">
           <blog:arclist row="10">
             <div class="media">
                <div class="media-left media-middle">
                  <a href="http://acoder.cc/User/center/uid/4.html">
                    <img class="media-object small-user-image" src="{$field.litpic}" alt="{$field.title}" width="180px",height="120px">
                  </a>
                </div>
                <div class="media-body">
                  <h3 class="media-heading"><a href="{$field.arcurl}">{$field.title}</a></h3>
                       <p class="article-digest">{$field.summary}...</p>
                  <ul class="article-tags-ul">
                    <li><span class="glyphicon glyphicon-tag"><a href="{$field.typelink}">{$field.typename}</a></span></li>
                  </ul>
                  <ul class="small-bar-ul">
                    <li id="visit" class="glyphicon glyphicon-eye-open"><span>{$field.click}</span></li>
                    <li id="comment" class="glyphicon glyphicon-comment"><span ><a href="#">4</a></span></li>
                    <li id="time" class="glyphicon glyphicon-time"><span>{$field.time|date="y-m",###}</span></li>
                  </ul>
                </div>
                  <hr>
             </div>
             </blog:arclist>
                <nav class="page">
                   <blog:page row="10"/>
                </nav>
           </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-3 aw-side-bar hidden-xs hidden-sm">

        <div id="comment" class="second-bar-div">        
          <div class="panel panel-default">
            <div class="panel-body">
               <div id="newest-comment-content">  
                <h4 class="glyphicon glyphicon glyphicon-heart">推荐文章</h4>
                <hr class="second-bar-hr">

                <blog:arclist row="5" flag="2">
                 <div class="media second-bar-item">
                  <div class="media-body">                 
                     <small class="small-title second-bar-small newest-comment-small">[{$field.time|date="y-m",###}]</small>
                     <p class="media-heading"><a href="{$field.arcurl}">{$field.title}</a></p>
                  </div>
                </div>
                <hr class="second-third-hr">
                </blog:arclist>

              </div>
            </div>
          </div>
        </div> 

        <div id="comment" class="second-bar-div">        
          <div class="panel panel-default">
            <div class="panel-body">
               <div id="newest-comment-content">  
                <h4 class="glyphicon glyphicon glyphicon-fire">热门文章</h4>
                <hr class="second-bar-hr">

                <blog:arclist row="5" orderby="click desc">
                 <div class="media second-bar-item">
                  <div class="media-body">                 
                     <small class="small-title second-bar-small newest-comment-small">[{$field.time|date="y-m",###}]</small>
                     <p class="media-heading"><a href="{$field.arcurl}">{$field.title} </a></p>
                  </div>
                </div>
                <hr class="second-third-hr">
                </blog:arclist>

              </div>
            </div>
          </div>
        </div> 
        
      </div>
    </div>

  </div>
</div>
</block>