/**
 * Created by Admin on 2016/3/2.
 */

<!--jquery模糊查询start-->
var $COOKIE_KEY = "<?php echo C('cookie->navbar')?>"; //记录左侧菜单栏的开打与关闭状态的cookie的值
function search(type,obj){
    var $find = $.trim($(obj).val());//得到搜索内容
    if(type == 'cate'){//对接口分类进行搜索操作
        if($find != ''){
            $(".menu").hide();
            //找到符合关键字的对象
            var $keywordobj = $(".keyword:contains('"+$find+"')")
            $keywordobj.each(function(i) {
                var menu_id = $($keywordobj[i]).attr('id');
                $("#info_"+menu_id).show();
            });
        }else{
            $(".menu").show();//在没有搜索内容的情况下,左侧导航菜单 全部 显示
        }
    }else if(type == 'api'){//对接口进行搜索操作
        if($find != ''){
            $(".menu").hide();//左侧导航菜单隐藏
            $(".info_api").hide();
            //找到符合关键字的对象
            var $keywordobj = $(".keyword:contains('"+$find+"')")
            $keywordobj.each(function(i) {
                var menu_id = $($keywordobj[i]).attr('id');
                $("#api_"+menu_id).show();//左侧导航菜单 部份 隐藏
                $("#info_api_"+menu_id).show();//接口详情 部份 隐藏
            });
        }else{
            $(".menu").show();//在没有搜索内容的情况下,左侧导航菜单 全部 显示
            $(".info_api").show();//在没有搜索内容的情况下,接口详情 全部 显示
        }
    }
}

function navbar(obj){
    if($('#mainwindow').hasClass('col-md-9')){
        $(obj).html('&gt;');
        $(obj).css("cursor","e-resize");
        $('#mainwindow').removeClass('col-md-9').addClass('col-md-12');
        $('#navbar').hide();
        $.cookie($COOKIE_KEY, '1');
    }else{
        $(obj).html('&lt;');
        $(obj).css("cursor","w-resize");
        $('#mainwindow').removeClass('col-md-12').addClass('col-md-9');
        $('#navbar').show();
        $.cookie($COOKIE_KEY, '0');
    }
}

<!--jquery模糊查询end-->

//编辑某个接口
function editApi(gourl){
    window.location.href=gourl;
}

//删除某个接口
function deleteApi(apiId,divId){
    if(confirm('是否确认删除此接口?')){
        $.post("index.php?act=ajax&op=apiDelete",{id:apiId},function(data){
            console.log(data);
            console.log('#api_'+divId);
            if(data == '1'){
                $('#api_'+divId).remove();//删除左侧菜单
                $('#info_api_'+divId).remove();//删除接口详情
            }
        })
    }
}

function AutoSave() {
    var des = $("textarea[name='des']").val();
    var re  = $("textarea[name='re']").val();
    var memo= $("textarea[name='memo']").val();
    var _value = des + ";"+ re+";"+memo;
    if (_value==";;"){
        var LastContent = GetCookie('apimanage');

        if (LastContent == ";;") return;
        var text = LastContent.split(";");
        if (des != text[0] || re!=text[1] || memo!=text[2] ){
            if (confirm("加载保存的记录")) {
                $("textarea[name='des']").html(text[0]);
                $("textarea[name='re']").html(text[1]);
                $("textarea[name='memo']").html(text[2]);
                return true;
            }
        }

    } else {
        var expDays = 30;
        var exp = new Date();
        exp.setTime(exp.getTime() + (expDays * 86400000)); // 24*60*60*1000 = 86400000
        var expires = '; expires=' + exp.toGMTString();

        // SetCookie
        document.cookie = "apimanage=" + escape(_value) + expires;
    }
}


/**
 * Created by Admin on 2016/3/2.
 */


//返回顶部
function goTop(){
    $('#mainwindow').animate(
        { scrollTop: '0px' }, 200
    );
}



/**
 *
 *自动保存文字到cookie中
 *http://www.xuebuyuan.com/1323493.html
 *
 */

function getCookieVal(offset) {
    var endstr = document.cookie.indexOf(";", offset);
    if (endstr == -1) endstr = document.cookie.length;
    return unescape(document.cookie.substring(offset, endstr));
}



function GetCookie(name) {
    var arg = name + "=";
    var alen = arg.length;
    var clen = document.cookie.length;
    var i = 0;
    while (i < clen) {
        var j = i + alen;
        if (document.cookie.substring(i, j) == arg) return getCookieVal(j);
        i = document.cookie.indexOf(" ", i) + 1;
        if (i == 0) break;
    }
    return null;
}

function DeleteCookie(name) {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval = GetCookie(name);
    document.cookie = name + "=" + cval + ";expires=" + exp.toGMTString();
}

