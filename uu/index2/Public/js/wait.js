/**
 * Created by yanan on 2016/2/1.
 */
/**
 * Created by yanan on 2016/2/1.
 */
$(document).ready(function(){
        var i=3;
        setInterval(function(){
            $(".time").text(i);
            i-=1;
            if(i==-1){
                //跳转到积分商城首页
                window.location.href="http://www.uustudy.com.cn/index/home/mall/mall/"
            }
        },1000)

});
