/**
 * Created by yanan on 2016/10/21.
 */
var GameBackground = cc.Layer.extend({

    _bg1:null,
    _bg2:null,
    _bg3:null,
    _bg4:null,

    speed:5,

    ctor:function () {
        this._super();
        this.scheduleUpdate();

        var buildParallaxBackground = function(texture){
            var layer = new cc.Layer();
            var bg1 = new cc.Sprite(texture);
            bg1.x = bg1.width/2;
            bg1.y = bg1.height/2;
            layer.addChild(bg1);
            var bg2 = new cc.Sprite(texture);
            bg2.x = bg2.width/2 + bg2.width;
            bg2.y = bg2.height/2;
            layer.addChild(bg2);
            return layer;
        };

        //sky
        this._bg1 = buildParallaxBackground(res.BgLayer);
        this._bg1.scaleY=2;
        this._bg1.scaleX=2;
        this._bg1.x=0;
        this._bg1.y=400;
        this.addChild(this._bg1);

        //hill
        this._bg2 = buildParallaxBackground(res.BgLayer2);
        this._bg2.scaleX=0.7125;
        this._bg2.x=0;
        //this._bg2.y=400;
        this.addChild(this._bg2);

        //buildings
        this._bg3 = buildParallaxBackground(res.BgLayer3);
        this._bg3.scaleX=0.79395;
        this._bg3.x=-30;
        this.addChild(this._bg3);

        //trees
        this._bg4 = buildParallaxBackground(res.BgLayer4);
        this._bg4.scaleX=0.79395;
        this._bg4.x=-30;

        this.addChild(this._bg4);

        return true;
    },

    update:function(dt) {
        var winSize = cc.director.getWinSize();
        this._bg1.x -= Math.ceil(this.speed * 0.02);
        if (this._bg1.x < -parseInt(winSize.width))
            this._bg1.x = 0;

        this._bg2.x -= Math.ceil(this.speed * 0.2);
        if (this._bg2.x < -parseInt(winSize.width))
            this._bg2.x = 0;

        this._bg3.x -= Math.ceil(this.speed * 0.7);
        if (this._bg3.x < -parseInt(winSize.width))
            this._bg3.x=0;

        this._bg4.x -= Math.ceil(this.speed * 1);
        if (this._bg4.x < -parseInt(winSize.width))
            this._bg4.x=0;
    }
});
