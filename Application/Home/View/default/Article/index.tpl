<extend name="Public:base" />
<block name="title">文章页</block>
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
            

           <blog:article>
             <div class="media">
                <div class="media-body text-center">
                  <h2>{$title}</h2>
                  <ul>
                    <li class="glyphicon glyphicon-eye-open"><span>{$click}</span></li>
                    <li class="glyphicon glyphicon-time"><span>{$time|date="y-m",###}</span></li>
                    <li class="glyphicon glyphicon-user"><span>网站编辑</span></li>
                  </ul>
<div class="article-content">
      <p>{$content}</p>    </div>
                </div>
                    <span class='article-line-text '>
          <hr><br>
          </blog:article> 
    	<h5 class="label label-primary">相关文章</h5>
     	 <ol class='similarArticleUl'>
	   	  <blog:arclist row="5" flag="3">
	      		<li><h5><a href="{$field.typelink}">{$field.title}</a></h5></li>
	      </blog:arclist>
       	</ol>
                  <hr>
             </div>
          


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
                     <p class="media-heading"><a href="{$field.typelink}">{$field.title}</a></p>
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