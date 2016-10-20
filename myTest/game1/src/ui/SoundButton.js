/**
 * Created by yanan on 2016/10/20.
 */
var SoundButton=cc.MenuItemToggle.extend({
   ctor:function(){
       var sprite=new cc.Sprite(res.Sound0000);
       var animation=new cc.Animation();
       animation.addSpriteFrame(cc.spriteFrameCache.getSpriteFrame(res.Sound0000));
       animation.addSpriteFrame(cc.spriteFrameCache.getSpriteFrame(res.Sound0001));
       animation.addSpriteFrame(cc.spriteFrameCache.getSpriteFrame(res.Sound0002));
       animation.setDelayPerUnit(1/3);
       var action=cc.animate(animation).repeatForever();
       sprite.runAction(action);

       this._super(
           new cc.MenuItemSprite(sprite,0,0),
           new cc.MenuItemImage(res.SoundOff)
       );
       this.setCallback(this._soundOnOff,this);
   },

    _soundOnOff:function(){
        Sound.toggle();
    }
});