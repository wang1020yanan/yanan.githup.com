/**
 * Created by yanan on 2016/10/13.
 */
(function(){
    $(function(){
        function getQueryString(name) {
            var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
            var r = window.location.search.substr(1).match(reg);
            if (r != null) {
                return unescape(r[2]);
            }
            return null;
        }
        function setCookie(name,value)
        {
            var Days = 30;
            var exp = new Date();
            exp.setTime(exp.getTime() + Days*24*60*60*1000);
            document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
        }
        function getCookie(name)
        {
            var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
            if(arr=document.cookie.match(reg))
                return unescape(arr[2]);
            else
                return null;
        }
        var mmmcode=getQueryString("code");
        if(getCookie('islogss')!=='qqqqqq'||typeof(localStorage.islog)==undefined){
            var nowUrl=window.location.href;
            setCookie('islogss','qqqqqq');
            var wxUrl='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxfc09c3333418f5c4&' +
                'redirect_uri='+nowUrl+'&response_type=code&scope=snsapi_userinfo&state=STATE';
            window.location.href=wxUrl;
            //alert(code)
        }else if(!localStorage.openid){
            $.get('http://wx.uustudy.com.cn/index.php?r=weixin/userinfo',{'code':mmmcode},function(data){
                localStorage.openid=data.data.openid;
                localStorage.nickname=data.data.nickname;
                localStorage.headImg=data.data.headimgurl;
                //alert(JSON.stringify(data))
            });
        }
        $.get('http://wx.uustudy.com.cn/index.php?r=weixin/userinfo',{'code':mmmcode},function(data){
            localStorage.openid=data.data.openid;
            localStorage.nickname=data.data.nickname;
            localStorage.headImg=data.data.headimgurl;
            //alert(JSON.stringify(data))
        });
    });
})();
function getQueryString(name) {
    var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
    var r = window.location.search.substr(1).match(reg);
    if (r != null) {
        return unescape(r[2]);
    }
    return null;
}


//移动端过滤
var browser={
    versions:function(){
        var u = navigator.userAgent, app = navigator.appVersion;
        return {//移动终端浏览器版本信息
            trident: u.indexOf('Trident') > -1, //IE内核
            presto: u.indexOf('Presto') > -1, //opera内核
            webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
            gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
            mobile: !!u.match(/AppleWebKit.*Mobile.*/)||!!u.match(/AppleWebKit/), //是否为移动终端
            ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
            android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
            iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1, //是否为iPhone或者QQHD浏览器
            iPad: u.indexOf('iPad') > -1, //是否iPad
            webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部
        };
    }(),
    language:(navigator.browserLanguage || navigator.language).toLowerCase()
};
function is_weixin() {
    var ua = navigator.userAgent.toLowerCase();      if(ua.match(/MicroMessenger/i)=="micromessenger") {          return true;      } else {          return false;      }
}
$(function(){
    var u = navigator.userAgent;
    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
    if(!is_weixin()){
       window.location.href='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxfc09c3333418f5c4&redirect_uri=http://wx.uustudy.com.cn/understand/index.html?fOpenid=oJmAJwfB2aa7JSbGIoYG_3Bl6Fck&response_type=code&scope=snsapi_userinfo&state=STATE&connect_redirect=1#wechat_redirect'
    }
});