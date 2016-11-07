<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Beself红包</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php echo base_url()?>/public/weixin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/weixin/css/M-homepage.css" />
    <script src="<?php echo base_url()?>/public/weixin/js/jquery-2.1.4.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#lq").click(function(){
                var tel = $('#tel').val();
                var telReg = !!tel.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[0678]|18[0-9]|14[57])[0-9]{8}$/);
                if(telReg==false){
                    alert("请输入正确的手机号");
                }else{
                    $.post("<?php echo site_url('weixin/checkTel')?>",{tel:tel},function(msg){
                        if(msg==0){
                            alert("该手机号码已领取");
                        }else{
                            window.location.href="<?php echo site_url('weixin/hb_3')?>";
                        }
                    });
                }
            });
        });
    </script>
</head>
<body style="background:#0e101d;font-size: 2em">
<div>
    <img src="<?php echo base_url()?>/public/weixin/image/hb2.jpg" style="width: 100%;height: 100%">
</div>
<div style="width: 100%;text-align: center;margin-top: 20px;height:150px;">
    <p style="color: #D8D8D8;font-size: 14px">输入手机号码！红包自动放入账户！</p>
        <input type="tel" id="tel" placeholder="输入手机号码" style="border: none;border-radius: 3px;outline: none;text-align: center;width: 75%;height: 1.8em"><br/>
        <button id="lq" style="margin-top: 15px;background: #A00000;border: none;width: 75%;color: #ffffff;height: 1.8em;border-radius: 3px"><a href=""style="color: #ffffff">领取红包</a></button>
</div>
<div style="width: 100%">
    <img src="<?php echo base_url()?>/public/weixin/image/hb3.jpg" style="width: 100%">
</div>
</body>
</html>