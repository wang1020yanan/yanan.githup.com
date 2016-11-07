cc.game.onStart = function(){
    cc.view.adjustViewPort(true);
    cc.view.setDesignResolutionSize(813, 1280, cc.ResolutionPolicy.SHOW_ALL);
    cc.view.resizeWithBrowserSize(true);
    //load resources
    function getQueryString(name) {
        var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
        var r = window.location.search.substr(1).match(reg);
        if (r != null) {
            return unescape(r[2]);
        }
        return null;
    }
    cc.LoaderScene.preload(g_resources, function () {
        var url1 = getQueryString('img1');
        //var url2 = getQueryString('img2');
        cc.loader.loadImg('http://chat.uustudy.com.cn/img/icon.png', {isCrossOrigin : false}, function(err,img){
            mImg=img;
        });
        cc.loader.loadImg(url1, {isCrossOrigin : false}, function(err,img){
            fImg=img;
        });
        cc.director.runScene(new MenuScene);
        //goWx();
    }, this);
};
cc.game.run();