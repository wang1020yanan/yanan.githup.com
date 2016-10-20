
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

        /////////////////////////////
        // 3. add your codes below...
        // add a label shows "Hello World"
        // create and initialize a label
        var helloLabel = new cc.LabelTTF("Hello World", "Arial", 38);
        // position the label on the center of the screen
        helloLabel.x = size.width / 2;
        helloLabel.y = size.height / 2 + 200;
        // add the label as a child to this layer
        this.addChild(helloLabel, 5);

        // add "HelloWorld" splash screen"
        this.sprite = new cc.Sprite(res.HelloWorld_png);
        this.sprite.attr({
            x: size.width / 2,
            y: size.height / 2
        });
        this.addChild(this.sprite, 0);

        return true;
    }
});

var HelloWorldScene = cc.Scene.extend({
    onEnter:function () {
        this._super();
        //var layer = new HelloWorldLayer();
        //this.addChild(layer);
        cc.director.runScene(new cc.TransitionFade(.6,new SecondScene()));
    }
});
var SecondScene=cc.Scene.extend({
    onEnter:function(){
        this._super();
        var layer=new cc.LayerGradient(cc.color(255,0,0),cc.color(0,0,255));
        this.addChild(layer);
        //����
        //var layer2=new BallLayer();
        //this.addChild(layer2);

        var layer2=new SimpleLayer();
        this.addChild(layer2);
    }
});

var BallLayer=cc.Layer.extend({
    deltaX:1,
    ball:null,
    frame:0,
    bg:null,

    ctor:function(){
        this._super();
        var size=cc.director.getWinSize();
        var ball=new  cc.Sprite(res.Qiu);
        ball.x=0;
        ball.y=size.height/2;
        this.addChild(ball,1);
        this.ball=ball;

        this.bg=new cc.DrawNode();
        this.addChild(this.bg);
        this.scheduleUpdate();
        return true;
    },
    update:function(){
        var size=cc.director.getWinSize();
        this.ball.x+=this.deltaX;
        if(this.ball.x>=size.width||this.ball.x<=0){
            this.deltaX=this.deltaX*-1;
        }
        this.ball.y=Math.cos(this.frame/20)*50+size.height/2;
        this.bg.drawDot(new cc.Point(this.ball.x,this.ball.y),2,cc.color(255,0,0));
        this.frame++;
    }
});

var SimpleLayer=cc.Layer.extend({
    ctor:function(){
        this._super();

        var size=cc.director.getWinSize();
        var ball=new cc.Sprite(res.Qiu);
        ball.x=size.width/2;
        ball.y=size.height;
        ball.setScale(.5);
        this.addChild(ball,1);
        //var action=cc.moveTo(1,cc.p(size.width,100));
        //var action=cc.scaleTo(1,.5,.5);
        //var action=cc.scaleTo(3,-1,-1);
        //var action=cc.fadeTo(2,0);
        //var action=cc.blink(2,5);
        var action=cc.moveBy(2,5,-(size.height-ball.height/2));
        action.easing(cc.easeIn(2));
        var back=action.clone().reverse();
        back.easing(cc.easeBounceIn());
        //var action1=cc.scaleTo(2,2,2);
        //var squen1=cc.sequence(action,action1);
        //var action2=cc.scaleTo(1,.5,.5);
        //var squen2=cc.sequence(squen1,action2);
        //var repeat=cc.spawn(action,action1);
        ball.runAction(cc.sequence(action,back));
        return true;
    }
});
var ComposeAction=cc.Layer.extend({
    ctor:function(){
        this._super();

        var size=cc.director.getWinSize();
    }
});