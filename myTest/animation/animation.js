/**
 * Created by yanan on 2016/8/22.
 */
var STATE_INITIAL=0;
var STATE_START=1;
var STATE_STOP=2;
function Animation(){
    this.taskQueue=[];
    this.index=0;
    this.state=STATE_INITIAL;
}
Animation.prototype.loadImg=function(imgList){

};
Animation.prototype.changePosition=function(ele,position,imageUrl){

};
Animation.prototype.changeSrc=function(ele,imageUrl){

};
Animation.prototype.then=function(callback){

};