
//检测滚动条,显示返回顶部按钮
document.getElementById('mainwindow').onscroll = function () {
    if(document.getElementById('mainwindow').scrollTop > 100){
        document.getElementById('gotop').style.display='block';
    }else{
        document.getElementById('gotop').style.display='none';
    }
};