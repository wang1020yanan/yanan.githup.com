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
    time:0,
    _food:null,
    _foodWrap:[],
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
        this._ui.y=-40;
        this._ui.update();

        this.init();
        return true;
    },
    init:function() {
        winSize=cc.director.getWinSize();
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

        //定时出食物
        this.time += elapsed; //dt 为上一帧到当前帧的时长
        if (this.time >=0.2) {
            //实物
            foods=new foodLogin(this);
            this._foodWrap.push(foods);
            this.time =0;
        }
        //食物移动和删除
        for(var i=0;i<this._foodWrap.length;i++){
            this._foodWrap[i].foodss.x-=Game.foodspeed;
            Game.foodspeed+=0.001;
            if(Game.foodspeed>=25){
                Game.foodspeed=25;
            }
            if(this._foodWrap[i].foodss.x<=-100){
                this.removeChild(this._foodWrap[i].foodss);
                this._foodWrap.splice(i, 1);
            }
            //碰撞检测
            var hero_food_x=this._foodWrap[i].foodss.x-this._hero.x;
            var hero_food_y=this._foodWrap[i].foodss.y-this._hero.y;
            var hf=hero_food_x*hero_food_x+hero_food_y*hero_food_y;
            if(hf<16000){
                console.log(this._foodWrap[i].foodss.state);
                if(this._foodWrap[i].foodss.state=='1'){
                    var move=cc.moveTo(4,cc.p(100,100)).easing(cc.easeOut(4));
                    this._hero.runAction(move);
                }else{
                    this.removeChild(this._foodWrap[i].foodss);
                    this._foodWrap.splice(i, 1);
                    Game.user.score+=2;
                    //console.log( Game.user.score);
                }
            }
        }
    }
});