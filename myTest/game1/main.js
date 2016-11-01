cc.game.onStart = function(){
    cc.view.adjustViewPort(true);
    cc.view.setDesignResolutionSize(813, 1280, cc.ResolutionPolicy.SHOW_ALL);
    cc.view.resizeWithBrowserSize(true);
    //load resources

    cc.LoaderScene.preload(g_resources, function () {
        cc.director.runScene(new MenuScene);
    }, this);
};
cc.game.run();