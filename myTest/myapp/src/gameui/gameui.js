/**
 * Created by yanan on 2016/5/24.
 */
var GameUI=cc.Layer.extend({
    levelText:null,
    scoreText:null,
    stepText:null,
    ctor:function(gameLayer){
        this._super();
        this.gameLayer=gameLayer;
        this._initInfoPanel();

    },
    _initInfoPanel:function(){
        var size=cc.director.getWinSize();
        //管卡
        var levelLabel =new cc.Sprite(res.Lv,cc.rect(0,0,209,87));
        levelLabel.x=35;
        levelLabel.setScale(.3);
        levelLabel.y=size.height-20;
        //this.addChild(levelLabel);
        var levelText2=new cc.LabelTTF("LEVEL","arial",12);
        levelText2.x=28;
        levelText2.y=size.height-20;
        levelText2.setColor(cc.color(255,255,255));
        //this.addChild(levelText2);
        var levelText=new cc.LabelTTF("11","arial",12);
        levelText.x=53;
        levelText.y=size.height-20;
        levelText.setColor(cc.color(255,255,255));
        //this.addChild(levelText);
        this.levelText=levelText;
        //分数
        var scoreLabel =new cc.Sprite(res.Lv,cc.rect(0,0,209,87));
        scoreLabel.x=size.width/2-80;
        scoreLabel.setScale(.7);
        scoreLabel.y=size.height-40;
        this.addChild(scoreLabel);
        var scoreText2=new cc.LabelTTF("SCORE","arial",12);
        scoreText2.x=size.width/2-6-100;
        scoreText2.y=size.height-40;
        this.addChild(scoreText2);
        var scoreText=new cc.LabelTTF("11","arial",16);
        scoreText.setColor(cc.color(255,76,137,255));
        scoreText.x=size.width/2+20-80;
        scoreText.y=size.height-40;
        scoreText.setColor(cc.color(255,76,137));
        this.addChild(scoreText);
        this.scoreText=scoreText;
        //时间
        var stepLabel =new cc.Sprite(res.Lv,cc.rect(0,0,209,87));
        stepLabel.x=size.width-65-20;
        stepLabel.setScale(.7);
        stepLabel.y=size.height-40;
        this.addChild(stepLabel);
        var stepText2=new cc.LabelTTF("TIMES","arial",12);
        stepText2.x=size.width-75-40;
        stepText2.y=size.height-40;
        stepText2.setColor(cc.color(255,255,255));
        this.addChild(stepText2);
        var stepText=new cc.LabelTTF("10","arial",16);
        stepText.x=size.width-47-20;
        stepText.y=size.height-40;
        stepText.setColor(cc.color(255,255,255));
        this.addChild(stepText);
        this.stepText=stepText;
        //this.update();
    },
    update:function(){
        this.levelText.setString(""+(this.gameLayer.level+1));
        this.scoreText.setString(""+(this.gameLayer.score));
        this.stepText.setString(""+(this.gameLayer.limitStep-gameLayer.step))
    }
});