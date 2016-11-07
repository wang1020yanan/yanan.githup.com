/**
 * Created by yanan on 2016/10/28.
 */
var Hero=cc.Sprite.extend({
    _animation:null,
    state:0,
    aniz:{
        list:[
            "res/graphics/small_images/fly_0001.png",
    "res/graphics/small_images/fly_0002.png",
    "res/graphics/small_images/fly_0003.png",
    "res/graphics/small_images/fly_0004.png",
    "res/graphics/small_images/fly_0005.png",
    "res/graphics/small_images/fly_0006.png",
    "res/graphics/small_images/fly_0007.png",
    "res/graphics/small_images/fly_0008.png",
    "res/graphics/small_images/fly_0009.png",
    "res/graphics/small_images/fly_0010.png",
    "res/graphics/small_images/fly_0011.png",
    "res/graphics/small_images/fly_0012.png",
    "res/graphics/small_images/fly_0013.png",
    "res/graphics/small_images/fly_0014.png",
    "res/graphics/small_images/fly_0015.png",
    "res/graphics/small_images/fly_0016.png",
    "res/graphics/small_images/fly_0017.png",
    "res/graphics/small_images/fly_0018.png",
    "res/graphics/small_images/fly_0019.png",
    "res/graphics/small_images/fly_0020.png"
        ]
    },
    ctor:function(){

        var self = this;

        if(mImg){
            this._super(mImg);
            //var imgO=new cc.Sprite(mImg);
            //imgO.x=120;
            //imgO.y=50;
            //imgO.scale=0.4;
            //this.addChild(imgO);
            //
            //this._animation=new cc.Animation();
            //for(var i=0;i<20;i++){
            //    this._animation.addSpriteFrameWithFile('./'+this.aniz.list[i])
            //}
            //this._animation.setDelayPerUnit(1/20);
            //var action = cc.animate(this._animation).repeatForever();
            //this.runAction(action);
            return true;
        }
    },
    update:function(){

    }
});