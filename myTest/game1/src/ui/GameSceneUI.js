/**
 * Created by yanan on 2016/10/21.
 */

var GameSceneUI = cc.Layer.extend({

    _lifeText:null,
    _distanceTest:null,
    _scoreText:null,

    ctor:function(){
        this._super();
        //var fnt='res/fonts/font.ftn';
        var winSize=cc.director.getWinSize();

        //生命值
        var lifeLabel=new cc.LabelTTF("LIVES",'arial',36);
        this.addChild(lifeLabel);
        lifeLabel.x=213;
        lifeLabel.y=winSize.height-25;

        this._lifeText=new cc.LabelTTF('0','arial',36);
        this.addChild(this._lifeText);
        this._lifeText.x=213;
        this._lifeText.y=winSize.height-60;

        //distance
        var distanceLabel=new cc.LabelTTF("DISTANCE",'arial',36);
        this.addChild(distanceLabel);
        distanceLabel.x=363;
        distanceLabel.y=winSize.height-25;

        this._distanceText=new cc.LabelTTF('0','arial',36);
        this.addChild(this._distanceText);
        this._distanceText.x=363;
        this._distanceText.y=winSize.height-60;

        //分数
        var scoreLabel=new cc.LabelTTF("分数",'arial',36);
        this.addChild(scoreLabel);
        scoreLabel.x=513;
        scoreLabel.y=winSize.height-25;

        this._scoreText=new cc.LabelTTF('0','arial',36);
        this.addChild(this._scoreText);
        this._scoreText.x=513;
        this._scoreText.y=winSize.height-60;

       //暂停按钮
        var pauseButton=new cc.MenuItemImage(res.Pause,res.Pause,this._pauseResume);
        var menu=new cc.Menu(pauseButton);
        menu.x=80;
        menu.y=winSize.height-45;
        this.addChild(menu);
        return true;
    },
    _pauseResume:function() {
        if(cc.director.isPaused())
            cc.director.resume();
        else
            cc.director.pause();
    },
    update:function(){
        console.log(Game);
        this._lifeText.setString(Game.user.lives);
        this._distanceText.setString(parseInt(Game.user.distance));
        this._scoreText.setString(Game.user.score)
    }

});


