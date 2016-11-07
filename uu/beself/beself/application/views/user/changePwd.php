<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>修改密码</title>
    <meta name="viewport" content="initial-scale=0.9,maximum-scale=0.9, user-scalable=no">
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/zhuce.css" />
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/zhuce.js"></script>

    <script>
        $(document).ready(function(){
            $('#dl').click(function(){
                var tel = $('#telphone').val();
                var telReg = !!tel.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
                if(telReg==false){
                    alert("请输入正确的手机号码");
                }else{
                    settime(this,60);
                    $.post("<?php echo site_url('user/checkChange')?>",{tel:tel},function(result){
                        if(result==0){
                            alert('该手机号码未注册');
                        }else{
                            $('#yzm').val(result);
                            alert("验证码已发送");

                        }
                    });
                }
            });
            $('#dlll').click(function(){
                var telphone = $('#telphone').val();
                var yzm = $('#yzm').val();
                var yz = $('#yz').val();
                var pwd = $('#pwd').val();
                var pwd2 = $('#pwd2').val();
                var telReg = !!telphone.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);

                if(telReg==false){
                    $('#ctel').removeClass('none');
                }else if(yzm != yz || yzm.length==0){
                    $('#cyz').removeClass('none');
                }else if(pwd.length < 6){
                    $('#cpwd').removeClass('none');
                }else if(pwd != pwd2){
                    $('#cpwd2').removeClass('none');
                }else{
                    $.post("<?php echo site_url('user/doChange')?>",{telphone:telphone,pwd:pwd},function(msg){
                        if(msg==1){
                            alert('修改成功');
                            window.location.href="javascript:history.go(-1);";
                        }else{
                            alert('你输入的手机号码错误');
                        }
                    });
                }
            });
        });
    </script>
</head>
<body>

<!--标题和表单-->
<div class="container tit" style="margin-top: 0">
    <div class="container tit-a">
        <div class="tit-a-a">
            <span><b>修改密码</b></span>
        </div>
    </div>
    <div class="container fm">
        <div class="fm-tel">
            <input type="tel" name="telphone" id="telphone" placeholder="请输入手机号码">
            <div class="ck none" id="ctel">!请输入正确的手机号</div>
        </div>
        <div class="fm-yz">
            <div>
                <input type="hidden" name="yzm" id="yzm" value="" />
                <input class="fm-yz-yz" type="text" id="yz" name="yz" placeholder="请输入验证码">
                <input class="fm-yz-fs" type="button" value="获取" id="dl">
                <div class="ck none" id="cyz" style="margin-top: 0">!验证码错误</div>
            </div>

        </div>
        <div class="pw">
            <input type="password" id="pwd" name="pwd" placeholder="请输入密码">
            <div class="ck none" id="cpwd">!密码安全性太低</div>
        </div>
        <div class="pw2">
            <input type="password" id="pwd2" name="pwd2" placeholder="请再次输入密码">
            <div class="ck none" id="cpwd2">!您输入的两次密码不同</div>
        </div>
        <div class="lz">
            <input type="button" id="dlll" value="提交保存">
        </div>
    </div>
</div>

</body>
</html>