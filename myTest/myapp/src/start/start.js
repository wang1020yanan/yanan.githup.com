/**
 * Created by yanan on 2016/5/24.
 */
var StartScene=cc.Scene.extend({
    onEnter:function () {
        this._super();
        var size=cc.winSize;
        var startBg=new cc.Sprite(res.StartBg);
        this.addChild(startBg);
        startBg.x=size.width/2;
        startBg.y=size.height/2;

        var wraps=new cc.Sprite(res.Wrap);
        wraps.setScale(1.56,4.57);
        wraps.x=size.width/2;
        wraps.y=size.height/2;
        this.addChild(wraps);
        var ui=new GameUI();
        uiT=ui;
        this.addChild(ui);
        var layer=new GameLayer();
        this.layer=layer;
        this.addChild(layer);
        ui.levelText.setString(layer.level);
        ui.scoreText.setString(layer.score);
        ui.stepText.setString('10S ');
        //var layer = new MenuLayer();
        //this.addChild(layer);
        //cc.director.runScene(new cc.TransitionFade(.6,new SecondScene()));
    }
});
var OverScene=cc.Scene.extend({
    onEnter:function(){
        this._super();
        var size=cc.winSize;
        var startBg=new cc.Sprite(res.StartBg);
        this.addChild(startBg);
        startBg.x=size.width/2;
        startBg.y=size.height/2;
        var layer=new OverLayer();
        this.addChild(layer);
    }
});
var OverLayer=cc.Layer.extend({
    ctor:function(){
        this._super();
        var size=cc.winSize;
        var scoreLabel =new cc.Sprite(res.Lv,cc.rect(0,0,209,87));
        scoreLabel.x=size.width/2;
        scoreLabel.setScale(1.5,4);
        scoreLabel.y=size.height/2+60;
        this.addChild(scoreLabel);
        var scoreText2=new cc.LabelTTF("你在十秒内撸了"+SCORE+"分","arial",18);
        scoreText2.x=size.width/2;
        scoreText2.y=size.height/2+80;
        this.addChild(scoreText2);
            if(SCORE<100||!SCORE){
                WD="青铜"
            }else if(SCORE<200){
                WD="白银"
            }else if(SCORE<300){
                WD="黄金"
            }
            else{
                WD="钻石"
            }
        var scoreText3=new cc.LabelTTF("手速相当于"+WD+"级别","arial",18);
        scoreText3.x=size.width/2;
        scoreText3.y=size.height/2+40;
        this.addChild(scoreText3);
    }
});
var GameLayer=cc.Layer.extend({
       wrap:null,
       ui:null,
    score:0,
    level:0,
    steps:0,
    limitStep:0,
    targetScore:0,
    ctor:function(){
        this._super();
        this._init();
        if("touches" in cc.sys.capabilities){
            cc.eventManager.addListener({
                event:cc.EventListener.TOUCH_ONE_BY_ONE,
                onTouchBegan:this._onTouchBegan.bind(this)
            },this.wrap);
        }else{
            cc.eventManager.addListener({
                event:cc.EventListener.MOUSE,
                onMouseDown:this._onMouseDown.bind(this)
            },this.wrap);
        }
        var x=10;
        var This=this;
        var timer=setInterval(function(){
            x-=1;
            uiT.stepText.setString(x+"S");
            if(x<=1){
                uiT.stepText.setString(0+"S");
                This._gameOver();
                clearInterval(timer);
            }
        },1000);
    },
    _onTouchBegan:function(touch,event){
      var column=Math.floor((touch.getLocation().x-this.wrap.x)/Constant.CANDY_WIDTH) ;
      var row=Math.floor((touch.getLocation().y-this.wrap.y)/Constant.CANDY_WIDTH) ;
      this._popCandy(column,row);return true;
    },
    _onMouseDown:function(event){
        var column=Math.floor((event.getLocation().x-this.wrap.x)/Constant.CANDY_WIDTH) ;
        var row=Math.floor((event.getLocation().y-this.wrap.y)/Constant.CANDY_WIDTH) ;
        this._popCandy(column,row);return true;
    },
    _popCandy:function(column,row) {
        //if (this.moving)
        //    return;
        var joinCandys=[this.map[column][row]];
        var index=0;
        var pushIntoCandys=function(ele){
            if(joinCandys.indexOf(ele)<0){
                joinCandys.push(ele);
            }
        };
        while(index<joinCandys.length){
            var candy=joinCandys[index];
            if(this._checkCandyExist(candy.column-1,candy.row)&&this.map[candy.column-1][candy.row].type==candy.type){
                pushIntoCandys(this.map[candy.column-1][candy.row]);
            }
            if(this._checkCandyExist(candy.column+1,candy.row)&&this.map[candy.column+1][candy.row].type==candy.type){
                pushIntoCandys(this.map[candy.column+1][candy.row]);
            }
            if(this._checkCandyExist(candy.column,candy.row+1)&&this.map[candy.column][candy.row+1].type==candy.type){
                pushIntoCandys(this.map[candy.column][candy.row+1]);
            }
            if(this._checkCandyExist(candy.column,candy.row-1)&&this.map[candy.column][candy.row-1].type==candy.type){
                pushIntoCandys(this.map[candy.column][candy.row-1]);
            }
            index++;
        }
        if(joinCandys.length<=1)
            return;
        this.steps++;
        this.moving=true;
          for(var i=0;i<joinCandys.length;i++){
              var candy=joinCandys[i];
              var action1=cc.scaleBy(0.5, 2, 2).easing(cc.easeSineOut());
              var action2=cc.scaleBy(0.7, 8, 8).easing(cc.easeSineOut());
              var action3=cc.moveTo(.7, cc.p(160, 200)).easing(cc.easeSineOut());
              var action4=cc.rotateBy(.5, 360).easing(cc.easeExponentialOut());
              var action5=cc.fadeTo(.7,1).easing(cc.easeExponentialOut());
              var action = cc.sequence(action1,action3,action4,action2,action3);
              var a3=cc.spawn(action4,action1);
              var a2=cc.spawn(action4,action3,action2,action5);
              var a1=cc.sequence(a3,a2);
              candy.runAction(a1);
              var This=this;
              setTimeout(function(){
                  for(var j=0;j<joinCandys.length;j++){
                      This.wrap.removeChild(joinCandys[j]);
                      This._generateNewCandy();
                  }
              },1000);
              this.map[candy.column][candy.row]=2;
          }
        this.score+=joinCandys.length*joinCandys.length;
        SCORE=this.score;
        console.log(this.score);
       uiT.scoreText.setString(this.score);
        //this._checkSucceedOrFail();
    },
    _generateNewCandy:function(){
       var maxTime=0;
        for(var i=0;i<10;i++){
            var missCount=0;
            for(var j=0;j<this.map[i].length;j++){
                var candy=this.map[i][j];
                if(candy==2){
                    var candy=Candy.createRandomType(i,j);
                    this.wrap.addChild(candy);
                    candy.x=i*Constant.CANDY_WIDTH+Constant.CANDY_WIDTH/2;
                    candy.y=j*Constant.CANDY_WIDTH+Constant.CANDY_WIDTH/2;
                    this.map[i][candy.row]=candy;
                    missCount++;
                }else{
                    //var fallLength=missCount;
                    //if(fallLength>0){
                    //    var duration =Math.sqrt(2*fallLength/Constant.FALL_ACCELERATION);
                    //
                    //}
                }
            }

        }
    },
    _checkCandyExist:function(column,row){
        if(column<=9&&column>=0&&row<=9&&row>=0&&this.map[column][row]!==2){
            return true;
        }else{
            return false;
        }
    },
    _gameOver:function(){
        cc.director.runScene(new cc.TransitionFade(.3,new OverScene()));
    },
    _init:function(){
        this._super();
        var size=cc.winSize;
        var clippingPanel=new cc.ClippingNode();
        this.addChild(clippingPanel,2);
        this.wrap=new cc.Layer();
        this.wrap.x=(size.width-Constant.CANDY_WIDTH*Constant.MAP_SIZE)/2;
        this.wrap.y=(size.height-Constant.CANDY_WIDTH*Constant.MAP_SIZE)/2;
        clippingPanel.addChild(this.wrap,1);
        var stencil=new cc.DrawNode();
        stencil.drawRect(
            cc.p(this.wrap.x,this.wrap.y),
            cc.p(
                this.wrap.x+Constant.CANDY_WIDTH*Constant.MAP_SIZE,
                this.wrap.y+Constant.CANDY_WIDTH*Constant.MAP_SIZE
            ),
            cc.color(0,0,0),1,cc.color(0,0,0)
        );
        clippingPanel.stencil=stencil;
        this.steps=0;
        this.level=0;
        this.score=0;
        this.limitStep=30;
        this.targetScore=100;
        this.map=[];
        for(var i=0;i<Constant.MAP_SIZE;i++){
            var column=[];
            for(var j=0;j<Constant.MAP_SIZE;j++){
                var candy=Candy.createRandomType(i,j);
                //console.log(this.wrap);
                this.wrap.addChild(candy);
                candy.x=i*Constant.CANDY_WIDTH+Constant.CANDY_WIDTH/2;
                candy.y=j*Constant.CANDY_WIDTH+Constant.CANDY_WIDTH/2;
                column.push(candy);
            }
            this.map.push(column);
        }
    }
});

//var WrapsLayer=cc.Layer.extend({
//    ctor:function(){
//        this._super();
//        var size=cc.winSize;
//
//    }
//});