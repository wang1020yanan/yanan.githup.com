/**
 * Created by yanan on 2016/1/12.
 */
//设备判断
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
    var isios=u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
   if(isAndroid){
	    window.location.href="http://app.qq.com/#id=detail&appid=1104820173"   
   }else{
       //window.location.href="http://www.baidu.com";
       $("body").fadeIn(0);
       window.location.href="https://itunes.apple.com/cn/app/you-you-jia-jiao/id1044036646?mt=8";
       //alert("ios")
   }
});
$(document).ready(function(){
    var screenwidth = window.screen.width;
    if(screenwidth > 1000){
        //window.location.href="http://www.uustudy.com.cn/index/";
    }

});