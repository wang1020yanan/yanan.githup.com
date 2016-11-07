/**
 * Created by yanan on 2016/11/2.
 */
var foodLogin=function(that){
    that._food=new Food();

    that.addChild(that._food);
    that._food.x=winSize.width+100;
    that._food.y=(Math.random())*(winSize.height);
    if(that._food.state==1){
        if(that._food.height>150){
            that._food.scale=0.6
        }
    }
    this.foodss=that._food;
};