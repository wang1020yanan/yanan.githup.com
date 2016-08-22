/**
 * Created by yanan on 2016/8/22.
 */
function loadImg(arr,callback){
    var result={};
    var iNow=0;
    var per = document.getElementById("percent");
    console.log(per);
    for(var i=0;i<arr.length;i++){
        var oImg=new Image();
        var tmp=arr[i].split('.');
        result[tmp[0]]=oImg;
        oImg.onload=function(){
            iNow++;
            var nowPercent=iNow/arr.length*100;
            per.innerHTML=nowPercent+"%";
            //console.log(nowPercent);
            if(iNow>=arr.length){
                callback(result);
            }
        };
        oImg.src=arr[i];
    }
}
loadImg(['boy.png','bg1.png','bg2.png','bg3.png'],function(result){
    console.log(result)
});
