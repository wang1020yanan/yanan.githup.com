/**
 * Created by yanan on 2016/8/22.
 */
function loadImg(arr,callback){
    var result={};
    var iNow=0;
    var per = $("#percents");
    console.log(per);
    for(var i=0;i<arr.length;i++){
        var oImg=new Image();
        var tmp=arr[i].split('.');
        result[tmp[0]]=oImg;
        oImg.onload=function(){
            iNow++;
            var nowPercent=parseInt(iNow/arr.length*100);
            $("#colors").animate({width:nowPercent+'%'},100,function(){
                $("#percents").text(nowPercent+"%");
            });
            console.log(nowPercent);
            if(iNow>=arr.length){
                callback(result);
            }
        };
        oImg.src=arr[i];
    }
}
loadImg(['boy.png','bg1.png','bg2.png',
         'bg3.png',
         'http://photocdn.sohu.com/20160825/Img465865813.jpg',
         'http://img.daimg.com/uploads/allimg/160805/1-160P5002417.jpg',
         'http://bpic.588ku.com/back_pic/00/01/88/75/cdc49f31dbda8b9eac3b481d04542cce.jpg!qianku1198'],function(result){
    console.log(result)
});
$(function(){
    $("#my_btn").click(function(){
        loadImg(['boy.png','bg1.png','bg2.png','bg3.png'],function(result){
            console.log(result)
        });
    });
});

