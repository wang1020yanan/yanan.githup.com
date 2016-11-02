/**
 * Created by yanan on 2016/11/2.
 */
var Food=cc.Sprite.extend({
    FoodType:{
        list:['res.g1','res.g2','res.g3','res.b1','res.b2']
    },
    state:0,
    ctor:function(){
        this.scheduleUpdate(); //开启每帧调用，对应update
        if(Math.random()<=0.3){
            var fItem=res.g1;
        }else if(Math.random()>=0.8){
            var fItem=res.b1;
            this.state=1;
        } else{
            var fItem=res.g2;
        }
        this._super(fItem)
    }
});