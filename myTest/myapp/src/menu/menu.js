/**
 * Created by yanan on 2016/5/24.
 */
var MenuScene = cc.Scene.extend({
    onEnter:function () {
        this._super();
        var layer = new MenuLayer();
        this.addChild(layer);
        //cc.director.runScene(new cc.TransitionFade(.6,new SecondScene()));
    }
});
var MenuLayer=cc.Layer.extend({
    ctor:function () {
        this._super();
        var size = cc.winSize;
        //var helloLabel = new cc.LabelTTF("最强大脑", "YAHEI", 38);
        //helloLabel.x = size.width / 2;
        //helloLabel.y = size.height / 2 + 200;
        //this.addChild(helloLabel, 5);
        //标题和背景
        var Title=new  cc.Sprite(res.Title,cc.rect(0,0,320,46));
        Title.x= size.width / 2;
        Title.y=size.height-180;
        Title.setScale(.8);
        this.sprite = new cc.Sprite(res.Bg);
        this.sprite.attr({
            x: size.width / 2,
            y: size.height / 2
        });
        this.addChild(this.sprite, 0);
        this.addChild(Title, 0);
        var action1=cc.scaleTo(.4,1.5,1.5);
        action1.easing(cc.easeIn(2));
        var action2=cc.scaleTo(.4,.8,.8);
        action2.easing(cc.easeOut(2));
        var action3=cc.scaleTo(.3,1,1);
        action1.easing(cc.easeIn(2));
        var action4=cc.scaleTo(.3,.8,.8);
        action2.easing(cc.easeOut(2));
        Title.runAction(cc.sequence(action1,action2,action3,action4));
        //添加按钮
        var newGameNormal = new cc.Sprite(res.Menu, cc.rect(0, 0, 126, 33));
        var newGameSelected = new cc.Sprite(res.Menu, cc.rect(0, 33, 126, 33));
        var newGameDisabled = new cc.Sprite(res.Menu, cc.rect(0, 33 * 2, 126, 33));

        var gameSettingsNormal = new cc.Sprite(res.Menu, cc.rect(126, 0, 126, 33));
        var gameSettingsSelected = new cc.Sprite(res.Menu, cc.rect(126, 33, 126, 33));
        var gameSettingsDisabled = new cc.Sprite(res.Menu, cc.rect(126, 33 * 2, 126, 33));

        var aboutNormal = new cc.Sprite(res.Menu, cc.rect(252, 0, 126, 33));
        var aboutSelected = new cc.Sprite(res.Menu, cc.rect(252, 33, 126, 33));
        var aboutDisabled = new cc.Sprite(res.Menu, cc.rect(252, 33 * 2, 126, 33));

        var newGame = new cc.MenuItemSprite(
            newGameNormal,
            newGameSelected,
            newGameDisabled,
            function(){
                this.flare(this.new);
            }.bind(this)
            //this.flare(this.new),
            //this
        );

        var gameSettings = new cc.MenuItemSprite(
            gameSettingsNormal,
            gameSettingsSelected,
            gameSettingsDisabled,
            this.onSettings,
            this
        );

        var about = new cc.MenuItemSprite(
            aboutNormal,
            aboutSelected,
            aboutDisabled,
            this.onAbout,
            this
        );
        var menu = new cc.Menu(newGame);
        menu.alignItemsVerticallyWithPadding(10);
        menu.x = size.width/2;
        menu.y = 200;
        this.addChild(menu);
        return true;
    },
    flare:function(callback){
        //效果
        var size = cc.winSize;
        var flare=new cc.Sprite(res.Flare);
        //        设置flare 的渲染混合模式
        flare.setBlendFunc(cc.SRC_ALPHA, cc.ONE);
        flare.attr({
            x: -30,
            y: 297,
            visible: true,
            opacity: 0,
            rotation: -120,
            scale: 0.2
        });


//        定义动作
        var opacityAnim = cc.fadeIn(0.5, 255);
        var opacDim = cc.fadeIn(1, 0);
//        函数回调动作
        var onComplete = cc.callFunc(callback);
        var killflare = cc.callFunc(function () {
            this.getParent().removeChild(this,true);
        }, flare);
//        为动作加上easing效果，具体参考tests里面的示例
        var biggerEase = cc.scaleBy(0.7, 1.2, 1.2).easing(cc.easeSineOut());
        var easeMove = cc.moveBy(0.5, cc.p(328, 0)).easing(cc.easeSineOut());
        var rotateEase = cc.rotateBy(2.5, 90).easing(cc.easeExponentialOut());
        var bigger = cc.scaleTo(0.5, 1);
        var seqAction = cc.sequence(opacityAnim, biggerEase, opacDim, killflare, onComplete);
        //        同时执行一组动作
        var action = cc.spawn(seqAction, easeMove, rotateEase, bigger);
        flare.runAction(action);
        this.addChild(flare, 0);
    },
    new:function(){
        cc.director.runScene(new cc.TransitionFade(.6,new StartScene()));
    }
});