/**
 * Created by yanan on 2016/10/13.
 */
(function(){
    function getQueryString(name) {
        var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
        var r = window.location.search.substr(1).match(reg);
        if (r != null) {
            return unescape(r[2]);
        }
        return null;
    }
    var code=getQueryString("CODE");
    $(function(){
        if(localStorage.islog!=='yes'){
            var nowUrl=window.location.href;
            localStorage.islog='yes';
            var wxUrl='https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxfc09c3333418f5c4&' +
                'redirect_uri='+nowUrl+'&response_type=code&scope=snsapi_userinfo&state=STATE';
            window.location.href=wxUrl;
        }else if(!localStorage.openid){
            $.get('http://wx.uustudy.com.cn/index.php?r=weixin/userinfo',{'code':code},function(data){
                localStorage.openid=data.data.openid;
                localStorage.nickname=data.data.nickname;
                localStorage.headImg=data.data.headimgurl;
                //alert(JSON.stringify(data))
            });
        }
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