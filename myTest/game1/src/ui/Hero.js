/**
 * Created by yanan on 2016/10/28.
 */
var Hero=cc.Sprite.extend({
   _animation:null,
    state:0,
    aniz:{
      list:[res.Fly0001,res.Fly0002,res.Fly0003,res.Fly0004,res.Fly0005,res.Fly0006,res.Fly0007,res.Fly0008,res.Fly0009,res.Fly0010
      ,res.Fly0011,res.Fly0012,res.Fly0013,res.Fly0014,res.Fly0015,res.Fly0016,res.Fly0017,res.Fly0018,res.Fly0019,res.Fly0020]
    },
    ctor:function(){
        this._super(res.Fly0001);
        this._animation=new cc.Animation();
        for(var i=0;i<20;i++){
            this._animation.addSpriteFrameWithFile('./'+this.aniz.list[i])
        }
        this._animation.setDelayPerUnit(1/20);
        var action = cc.animate(this._animation).repeatForever();
        this.runAction(action);
        return true;
    },
    update:function(){

    }
});