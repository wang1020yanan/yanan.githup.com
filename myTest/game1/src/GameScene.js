/**
 * Created by yanan on 2016/10/21.
 */
var GameScene = cc.Scene.extend({
    _ui:null,
    _gameOverUI:null,
    _background:null,
    _hero:null,
    itemBatchLayer:null,
    _coffeeEffect:null,
    _mushroomEffect:null,
    _windEffect:null,

    _foodManager:null,
    _obstacleManager:null,

    _touchY:0,
    _cameraShake:0,
    ctor:function(){
        this._super();
        var layer = new cc.Layer();
        this.addChild(layer);



        this._background = new GameBackground();
        layer.addChild(this._background);
        //英雄出场
        this._hero = new Hero();
        this.addChild(this._hero);
        this._hero.y=500;
        this._hero.x=-100;

        this.itemBatchLayer = new cc.SpriteBatchNode(res.Texture);
        this.addChild(this.itemBatchLayer);
        //积分
        this._ui = new GameSceneUI();
        this.addChild(this._ui);
        this._ui.update();

        this.init();
        return true;
    },
    init:function() {
        var winSize=cc.director.getWinSize();
        this.scheduleUpdate();
        this._touchY=winSize.height/2;
        this.touch()
    },
    touch:function(){
        if('touches' in cc.sys.capabilities){
            cc.eventManager.addListener({
                event:cc.EventListener.TOUCH_ALL_AT_ONCE,
                onTouchesMoved:this._onTouchMoved.bind(this)
            },this);
        }else{
            cc.eventManager.addListener({
                event:cc.EventListener.MOUSE,
                onMouseMove:this._onMouseMove.bind(this)
            },this);
        }

    },
    _onTouchMoved:function(touches,event){
        this._touchY=touches[0].getLocation().y;
    },
    _onMouseMove:function(event){
         this._touchY=event.getLocationY();
    },
    changeJd:function(){
        var winSize=cc.director.getWinSize();
        this._hero.setRotation((this._touchY-this._hero.y)*(-0.15));

    },
    update:function(elapsed){
        var winSize=cc.director.getWinSize();
        switch (Game.gameState){
            case 0:
                   if(this._hero.x<winSize.width/6){
                       this._hero.x+=((winSize.width/6+10)-this._hero.x)*0.03;
                   }else{
                       Game.gameState=1;
                   }
        }
        this.changeJd();
        this._hero.y -=((this._hero.y) -(this._touchY))*0.1;
    }
});