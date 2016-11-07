<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="<?php echo base_url()?>/public/image/lg.ico" rel="icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
    <title>钻戒抽奖</title>
</head>
<style>
    html{
        width: 100%;
        height: 100%;
    }
    *{
        margin:0;
        padding:0;
        list-style: none;
        border: 0;
    }
    body{
        background-image: url("<?php echo base_url()?>public/image/c.png");
        background-size: 100% 100%;
    }
    .red{
        position: fixed;
        width: 300px;
        height: 300px;
        top: 50%;
        left: 50%;
        margin-left: -150px;
        margin-top: -150px;
    }
    .windows{
        width: 300px;
        height: 200px;
        position: absolute;
        top: 50%;
        margin-top: -100px;
        left: 50%;
        margin-left: -150px;
        border-radius: 15px;
        background: #c7c7c7;
        display: none;
        z-index: 11;
    }
    .close{
        width: 30px;
        height: 30px;
        position: absolute;
        right: -10px;
        top: -10px;
        background: #c7c7c7;
        border-radius: 50%;
        cursor: pointer;
        text-align: center;
        transition:all 0.5s linear;
        -webkit-transition:all 0.5s linear;
        -moz-transition:all 0.5s linear;
        -ms-transition:all 0.5s linear;
        -o-transition:all 0.5s linear;
    }
    .close:hover{
        transform:rotate(180deg);
        -webkit-transform:rotate(180deg);
        -moz-transform:rotate(180deg);
        -ms-transform:rotate(180deg);
        -o-transform:rotate(180deg);
    }

    .close img{
        padding-top: 5px;

    }
    .text{
        text-align: center;
        font-size: 18px;
        font-family: "微软雅黑";
        vertical-align:middle;
        padding-top:60px;
    }
    .red img{
        width: 100%;
        height: 100%;
    }
    .zz{
        position: absolute;
        z-index: 999;
    }
    .zq{
        animation:myfirst 3s  ;
        /*-moz-animation:myfirst 3s; /!* Firefox *!/*/
        /*-webkit-animation:myfirst 3s; /!* Safari and Chrome *!/*/
        /*-o-animation:myfirst 3s; /!* Opera *!/*/
    }
    @keyframes myfirst
    {
        /*0%   {transform:rotate(30deg);}*/
        /*25%  {transform:rotate(90deg);}*/
        /*50%  {transform:rotate(180deg);}*/
        100% {transform:rotate(2880deg);}

    }
</style>
<script type="text/javascript" src="<?php echo base_url()?>public/js/jquery-2.1.4.min.js"></script>
<script>
    $(document).ready(function(){
        $(".zz").click(function(){
//            $(".zz").css("transform","rotate(350deg)");
            $(".zp").addClass('zq');
            setTimeout(
                function(){
                    $(".windows").fadeIn();
                },3300
            );
        });

        $(".close").click(function(){
            $(this).parent().fadeOut();$(".opacity").fadeOut();
            $(".windows").css("display","none");
            setTimeout(
                function(){
                    top.location.href='shou'
                },500
            );

        })
    })
</script>
<body>
<div class="red">
    <img src="<?php echo base_url()?>public/image/zz.png" class="zz">
    <img src="<?php echo base_url()?>public/image/zp.png" class="zp">
</div>
<div class="windows" style="background: #ffffff">
    <div class="text" > <a  >sorry 您没有中奖，再接再厉吧！</a> </div>
    <div class="close"><img src="<?php echo base_url()?>public/image/close.png"/></div>
</div>
</body>
</html>