/**
 * Created by Administrator on 2017/2/17.
 */
$(function(){
    var toos={
        getQueryString:function(name) {
          var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
          var r = window.location.search.substr(1).match(reg);
          if (r != null) {
          return unescape(r[2]);
        }
        return null;
        },
        setCookie:function(name,value) {
          var Days = 30;
          var exp = new Date();
          exp.setTime(exp.getTime() + Days*24*60*60*1000);
          document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
        },
        getCookie:function(name)
        {
            var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
            if(arr=document.cookie.match(reg))
                return unescape(arr[2]);
            else
                return null;
        }
    };
    //if(!localStorage.imgUrl||localStorage.imgUrl==undefined){
    //    var nowUrl = window.location.href;
    //    var wxUrl = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxfe83233bab3955e7&' +
    //        'redirect_uri=' + nowUrl + '&response_type=code&scope=snsapi_userinfo&state=STATE';
    //    if(localStorage.isLog!=='1'){
    //        window.location.href = wxUrl;
    //        localStorage.isLog='1';
    //    }
    //    if(toos.getQueryString('code')!==null){
    //        code=toos.getQueryString('code');
    //        localStorage.code=code;
    //    }else{
    //        window.location.href = wxUrl;
    //    }
    //    $.post('http://api.aixueniao.com/v1/user/login/code',{code:localStorage.code},function(data){
    //        console.log(data);
    //        localStorage.imgUrl=data.data.headImageUrl;
    //    })
    //}

});
function loads(){
    $("body").fadeIn();
}