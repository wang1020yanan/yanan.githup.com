/**
 * Created by GaoYang on 2015/9/1.
 */
function settime(val,timer) {
    if (timer == 0) {
        val.removeAttribute("disabled");
        val.value="获取";
        timer = 60;
        return;
    } else {
        val.setAttribute("disabled", true);
        val.value=timer;
        timer--;
    }
    setTimeout(function() {
        settime(val,timer)
    },1000)
}

$(document).ready(function(){
    $('#dl').click(function(){
        settime(this,60);
    });

    $('#telphone').click(function(){
        $('#ctel').addClass('none');
    });
    $('#yz').click(function(){
        $('#cyz').addClass('none');
    });
    $('#pwd2').click(function(){
        $('#cpwd2').addClass('none');
    });
    $('#pwd').click(function(){
        $('#cpwd').addClass('none');
    });
});