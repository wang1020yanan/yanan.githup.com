<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=0.8,maximum-scale=0.8, user-scalable=no">
    <title>登录页面</title>
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/denglu.css" />
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            var screenwidth = window.screen.width;
            if(screenwidth < 768){
                $(".dl").css('margin-top','20%');
            }else{
                $(".dl").css('margin-top','120px');
            }
            $('#dl').click(function(){
                var telphone = $('#telphone').val();
                var password = $('#password').val();
                var telReg = !!telphone.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
                if(telReg==false){
                    alert("请输入正确的手机号码");
                }else if(password.length < 6){
                    alert("密码为6~12位");
                }else{
                    $.post("<?php echo site_url('user/doLogin')?>",{telphone:telphone,password:password},function(msg){
                        if(msg==1){
                            window.location.href="javascript:history.go(-1);";
                        }else{
                            $('#clogin').removeClass('noplay');
                        }
                    });
                }
            });
        });
    </script>
</head>
<body>
<div class="container dl" >
    <!--logo-->
    <div class="logo">
        <div><img src="<?php echo base_url()?>/public/image/mb.svg" style="width: 70px" /></div>
    </div>
    <!--标题-->
    <h2 class="tit-1"><b>给你一个账号，做最美的自己!</b></h2>
    <div class="tab">

    </div>
    <!--表单-->
    <div class="fm">
        <div class="fm-tel">
            <input type="text" id="telphone" name="telphone" placeholder="手机号码">
        </div>
        <div class="fm-pw">
            <input type="password" id="password" name="password" placeholder="密码">
        </div>
        <div id="clogin" class="noplay">用户名或密码错误</div>
        <div class="fm-dl">
            <button id="dl" class="fm-dl-dl"><span>立即登录</span></button>
        </div>
        <div class="fm-wm">
            <a href="<?php echo site_url('user/changePwd')?>">忘记密码？</a>
        </div>
        <div class="fm-lz">
            <a href="<?php echo site_url('user/register')?>">
                <button class="fm-lz-lz"><span>立即注册</span></button>
            </a>
        </div>
    </div>
</div>
</body>
</html>