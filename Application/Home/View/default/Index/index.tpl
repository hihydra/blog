<extend name="Public:base" />
<block name="title">{$Think.config.webname}</block>
<block name="main">
<div class="container">
  <div class="row">
    <div id="content-top">
      <div id="carousel-example-generic" class="carousel slide"  data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="__Home__/images/opera-big.jpg" alt="...">
          </div>
          <div class="item">
            <img src="__Home__/images/safari-big.jpg" alt="...">
          </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div id="headlines">
        <div id="hogest-article-content">
          <ul class="list-group">
            <h4  class="list-group-item active glyphicon glyphicon-flag">头条</h4>
            <blog:arclist titlelen="30" row="2" flag="2">
            <li class="list-group-item second-bar-article-ul"> 
               <h5 class="media-heading"><a href="{$field.arcurl}">{$field.title}</a></h5>
               <small>[{$field.time|date="y-m",###}]</small>    
            </li>
            </blog:arclist>
        </div> 
      </div> 
    </div>

    <div class="aw-content-wrap clearfix">
      <div class="col-sm-12 col-md-9 aw-main-content">
       <hr>
        <div class="mod-body">
           <div class="aw-common-list">
           <blog:arclist titlelen="30" row="10">
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

                <blog:arclist flag="2" row="5">
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

                <blog:arclist  orderby="click desc" row="5">
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

        <div id="newest-comment" class="second-bar-div">        
          <div class="panel panel-default">
            <div class="panel-body">
               <div id="newest-comment-content">  
                <h4 class="glyphicon glyphicon-comment">最近评论</h4>
                <hr class="second-bar-hr">
                 <div class="media second-bar-item">
                  <div class="media-left media-top">
                      <a href="#">
                      <img class="media-object  newest-comment-small-user-image" src="__Home__/images/defaultUserImage.png">
                    </a>
                  </div>
                  <div class="media-body">                 
                     <small class="small-title second-bar-small newest-comment-small">@未登陆用户:</small>
                     <p class="media-heading"><a href="http://acoder.cc/Article/view/aid/468/#comment-start"> 正解 </a></p>
                  </div>
                </div>
                <hr class="second-third-hr">
                 <div class="media second-bar-item">
                  <div class="media-left media-top">
                      <a href="#">
                      <img class="media-object  newest-comment-small-user-image" src="__Home__/images/defaultUserImage.png">
                    </a>
                  </div>
                  <div class="media-body">                 
                     <small class="small-title second-bar-small newest-comment-small">@未登陆用户:</small>
                     <p class="media-heading"><a href="http://acoder.cc/Article/view/aid/468/#comment-start"> 正解 </a></p>
                  </div>
                </div>
                <hr class="second-third-hr">
                 <div class="media second-bar-item">
                  <div class="media-left media-top">
                      <a href="#">
                      <img class="media-object  newest-comment-small-user-image" src="__Home__/images/defaultUserImage.png">
                    </a>
                  </div>
                  <div class="media-body">                 
                     <small class="small-title second-bar-small newest-comment-small">@未登陆用户:</small>
                     <p class="media-heading"><a href="http://acoder.cc/Article/view/aid/468/#comment-start"> 正解 </a></p>
                  </div>
                </div>
                <hr class="second-third-hr">


              </div>
            </div>
          </div>
        </div> 
<!--友情链接-->
        <div id="newest-comment" class="second-bar-div">        
          <div class="panel panel-default">
            <div class="panel-body">
               <div id="newest-comment-content">  
                <h4 class="glyphicon glyphicon-comment glyphicon glyphicon-link">友情链接</h4>
                <hr class="second-bar-hr">
                 <div class="media second-bar-item">
                  <div class="media-body">                 
                     <p class="media-heading"><a href="#">正解 </a></p>
                  </div>
                </div>
                <hr class="second-third-hr">
                 <div class="media second-bar-item">
                  <div class="media-body">                 
                     <p class="media-heading"><a href="#">正解 </a></p>
                  </div>
                </div>
                <hr class="second-third-hr">
                 <div class="media second-bar-item">
                  <div class="media-body">                 
                     <p class="media-heading"><a href="#">正解 </a></p>
                  </div>
                </div>
                <hr class="second-third-hr">
              </div>
            </div>
          </div>
        </div> 
<!--友情链接-->
      </div>
    </div>
  </div>
</div>
</block>		