/**
 * Created by Admin on 2016/3/2.
 */

//删除某个接口
function deleteApi(apiId,divId){
    if(confirm('是否确认删除此接口?')){
        $.post("index.php?act=ajax&op=apiDelete",{id:apiId},function(data){
            if(data == '1'){
                $('#api_'+divId).remove();//删除左侧菜单
                $('#info_api_'+divId).remove();//删除接口详情
            }
        })
    }
}



//编辑某个接口
function editApi(gourl){
    window.location.href=gourl;
}

//返回顶部
function goTop(){
    $('#mainwindow').animate(
        { scrollTop: '0px' }, 200
    );
}

//检测滚动条,显示返回顶部按钮
document.getElementById('mainwindow').onscroll = function () {
    if(document.getElementById('mainwindow').scrollTop > 100){
        document.getElementById('gotop').style.display='block';
    }else{
        document.getElementById('gotop').style.display='none';
    }
};