<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>注册页面</title>
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
                    $.post("<?php echo site_url('admin/checkTel')?>",{tel:tel},function(result){
                        if(result==0){
                            alert('该手机号码没有访问权限');
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
                var telReg = !!telphone.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);

                if(telReg==false){
                    $('#ctel').removeClass('none');
                }else if(yzm != yz || yzm.length==0){
                    $('#cyz').removeClass('none');
                }else{
                    $.post("<?php echo site_url('admin/checkAdmin')?>",{telphone:telphone,pwd:pwd},function(msg){
                        if(msg==1){
                            alert('验证成功');
                            window.location.href="<?php echo site_url('admin/products')?>";
                        }else{
                            alert("验证失败");
                        }
                    });
                }
            });
        });
    </script>
</head>
<body>
<!--标题和表单-->
<div class="container tit" style="margin-top: 100px">
    <div class="container tit-a" >
        <div class="tit-a-a">
            <span><b>Beself控制台</b></span>
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
        </div>
        <div class="lz">
            <input type="button" id="dlll" value="登录">
        </div>
    </div>
</div>
</body>
</html>