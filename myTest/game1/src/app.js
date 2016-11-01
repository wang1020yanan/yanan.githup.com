
var HelloWorldLayer = cc.Layer.extend({
    sprite:null,
    ctor:function () {
        //////////////////////////////
        // 1. super init first
        this._super();

        /////////////////////////////
        // 2. add a menu item with "X" image, which is clicked to quit the program
        //    you may modify it.
        // ask the window size
        var size = cc.winSize;

        // add a "close" icon to exit the progress. it's an autorelease object
        var closeItem = new cc.MenuItemImage(
            res.CloseNormal_png,
            res.CloseSelected_png,
            function () {
                cc.log("Menu is clicked!");
            }, this);
        closeItem.attr({
            x: size.width - 20,
            y: 20,
            anchorX: 0.5,
            anchorY: 0.5
        });

        var menu = new cc.Menu(closeItem);
        menu.x = 0;
        menu.y = 0;
        this.addChild(menu, 1);

        /////////////////////////////
        // 3. add your codes below...
        // add a label shows "Hello World"
        // create and initialize a label
        var helloLabel = new cc.LabelTTF("Hello World", "Arial", 38);
        // position the label on the center of the screen
        helloLabel.x = size.width / 2;
        helloLabel.y = 0;
        // add the label as a child to this layer
        this.addChild(helloLabel, 5);

        // add "HelloWorld" splash screen"
        this.sprite = new cc.Sprite(res.HelloWorld_png);
        this.sprite.attr({
            x: size.width / 2,
            y: size.height / 2,
            scale: 0.5,
            rotation: 180
        });
        this.addChild(this.sprite, 0);

        this.sprite.runAction(
            cc.sequence(
                cc.rotateTo(2, 0),
                cc.scaleTo(2, 1, 1)
            )
        );
        helloLabel.runAction(
            cc.spawn(
                cc.moveBy(2.5, cc.p(0, size.height - 40)),
                cc.tintTo(2.5,255,125,0)
            )
        );
        return true;
    }
});

//菜单场景
var MenuScene = cc.Scene.extend({
    ctor:function(){
        this._super();
        var layer=new cc.Layer();
        this.addChild(layer);
        var winSize=cc.director.getWinSize();
        //菜单背景
        var bgWelcome=new cc.Sprite(res.BgWelcome_jpg);
        bgWelcome.x=winSize.width/2;
        bgWelcome.y=winSize.height/2;
        bgWelcome.scale=1.3;
        layer.addChild(bgWelcome);
        //菜单标题
        var title=new cc.Sprite(res.TitleWelcome_png);
        title.attr({x:winSize.width/2,y:1000});
        layer.addChild(title);
        //菜单英雄
        this._hero=new cc.Sprite(res.HeroWelcome_png);
        this._hero.attr({x:0,y:500});
        this._hero.scale=2;
        layer.addChild(this._hero);
        //菜单按钮
        this._playBtn=new cc.MenuItemImage(res.PlayBtn_png,res.PlayBtn_png,this._play);
        this._playBtn.attr({x:winSize.width/2,y:450});
        this._aboutBtn=new cc.MenuItemImage(res.AboutBtn_png,res.AboutBtn_png,this._play);
        this._aboutBtn.attr({x:winSize.width/2,y:350});
        //new一个声音按钮
        //var soundButton=new SoundButton();
        //soundButton.attr({x:45,y:winSize.height-45});
        //按钮组
        var menu= new cc.Menu(this._playBtn,this._aboutBtn);
        layer.addChild(menu);
        menu.x=menu.y=0;
        //英雄动画
        var move=cc.moveTo(2,cc.p(winSize.width/2,800)).easing(cc.easeOut(2));
        this._hero.runAction(move);
        //进入游戏


    },
    _play:function() {
        //Sound.playCoffee();
        cc.director.runScene(new GameScene());
    },
});

