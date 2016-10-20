/**
 * Created by yanan on 2016/5/24.
 */
var Candy =cc.Sprite.extend({
    type:0,
    column:0,
    row:0,
    ctor:function(type,column,row){
        this._super("res/candy/c"+(type)+".jpg");
        this.setScale(.07);
        this.init(type,column,row)
    },
    init:function(type,column,row){
        this.type=type;
        this.column=column;
        this.row=row;
    }
});
Candy.createRandomType=function(column,row){
    return new Candy(parseInt(Math.random()*Constant.CANDY_TYPE_COUNT),column,row);
};