$(function(){

        /* 定位左边菜单 */
        url = window.location.pathname + window.location.search;
        url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
        $("#main-nav").find("a[href='" + url + "']").parent().parent().addClass("nav nav-list secondmenu collapse in");

}); 
/*登录注册提交*/
function login(){
    var $action = $('#from').attr('action');
    var $parms = $('#from').serialize();
    
    $.post($action,$parms,function(data){               
            if (data.status == 1) {
                window.location = data.url;
            }else if(data.status == 0){
                $('#error').addClass('alert alert-danger');
                $('#error').html('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+data.error);
            }else{
                $('#error').addClass('alert alert-danger');
                $('#error').html('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+data);
            }                                        
    });
}
/*编辑提交*/
function edite(url){
	window.location=url;
}
/*删除提交*/
function del(url){
    if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
        window.location=url;
    }
}
/*删除文章提交*/
function recycle(url){
    if(window.confirm("您确定要删除吗？删除之后会移到回收站！！！")){
        window.location=url;
    }
}
/*清空文章回收站提交*/
function empty(url){
    if(window.confirm("您确定要清空回收站吗？清空回收站后不可以恢复哦！！！")){
        window.location=url;
    }
}
/*分类排序*/
function sort(){
    var $action = $('#from').attr('action');
    var $parms = $('#from').serialize();
    
    $.post($action,$parms);
               
} 
//全选  
function selectAll(){
     $("#table :checkbox").prop("checked",'true');  
}
//全不选 
function unSelect(){ 
     $("#table :checkbox").prop("checked", false);
}   
//反选  
function reverse(){ 
     $("#table :checkbox").each(function () {   
          $(this).prop("checked", !$(this).prop("checked"));   
     }); 
    allchk(); 
}
//批量操作
function getValue(url,type){
    var valArr = new Array; 
    $("#table :checked").each(function(i){
        if ($(this).prop('checked')){ 
            valArr[i] = $(this).val();
        }
    }); 
    var vals = valArr.join(','); 
    $.post(url,{id:vals,type:type},function(data){
           if (data.status == 1) {
                window.location = data.url;
            }else{
                $('#error').addClass('alert alert-danger');
                $('#error').html('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+'失败');             
            }

    });
}
//url跳转
function urlJump(url){
    window.location=url;
}
//上传提交
function getfile(){
    var $action = $('#file').attr('action');
    var $parms = $('#file').serialize();

      $.ajaxFileUpload({
        url:$action,            //需要链接到服务器地址
        secureuri:false,
        fileElementId:'fileimg',                //文件选择框的id属性
        dataType: 'json',                      //服务器返回的格式，可以是json
        success : function (data, status){
            if(typeof(data.error) != 'undefined'){
                if(data.error != ''){
                    alert(data.error);
                }else{
                    alert(data.info);
                }
            }
        },
        error: function(data, status, e){
            alert(e);
        }
    });
    

              
}
