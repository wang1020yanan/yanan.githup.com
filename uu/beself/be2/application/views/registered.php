<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <title>Photo Gallery - Lamoon</title>

    <!-- Meta tags -->
    <meta charset="utf-8">
    <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
    <meta name="description" content="Premium Responsive Template for Resort and Hotel" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/base.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/skeleton.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/flexslider.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/jquery.nailthumb.1.1.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/isotope.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/jquery.fancybox-1.3.4.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/lamoon.css" />


    <!--[if IE 9]>
    <link href="<?php echo base_url()?>/public/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->

    <!--[if IE 8]>
    <link href="<?php echo base_url()?>/public/css/ie8.css" rel="stylesheet" type="text/css" />
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery-1.7.2.min.js"></script>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>/public/images/favicon.ico" />
    <link rel="apple-touch-icon" href="<?php echo base_url()?>/public/images/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>/public/images/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>/public/images/apple-touch-icon-114x114.png" />
    <script>
        $(document).ready(function(){
            $("#zhuce").click(function(){
                var name = $('#name').val();
                var isName = name.match(/[A-z]/);
                var psw1 = $('#psw1').val();
                var psw2 = $('#psw2').val();
                if(name.length<4||name.length>15){
                   $("#ts").text( "账号长度应该在4-15个字符之间") ;
                }else if(!isName){
                    $("#ts").text( "账号必须以字母开头") ;
                }else if(psw1.length<6){
                    $("#ts").text( "密码不能小于六位") ;
                }else if(psw1!==psw2){
                    $("#ts").text( "两次密码输入不同") ;
                }
                else{
                    $.post("<?php echo site_url('user/checkName') ?>",{name:name,psw:psw1},function(result){
                        if (result ==1){
                            $("#ts").text( "该账号已注册") ;
                        }else{
                            $("#ts").text( "") ;
                            alert('注册成功！');
                            window.location.href="javascript:history.go(-1);";
                        }
                    })
                }
            })
        })
    </script>
</head>
<body>

<!-- Background Image -->
<img src="<?php echo base_url()?>/public/images/bg1.jpg" class="bg" alt="" />

<!-- Root Container -->
<div id="root-container" class="container">
    <div id="wrapper" class="sixteen columns">
        <!-- Banner -->
        <div id="sub-banner">
            <div id="logo">
                <img src="<?php echo base_url()?>/public/images/lamoon-logo.png" alt="" />
            </div>
            <img src="<?php echo base_url()?>/public/images/banner/sub-banner4.jpg" alt="" />
        </div>


        <!-- Content -->
        <div id="content">
            <div id="intro">
                <!--				产品信息-->
                <h1><span>注册beself账号</span></h1>
            </div>
            <div class="container section" style="text-align: center">
                <div class="one-third column">
                    <h3 class="nobg">温馨提示</h3>
                    <div class="info box">
                        账号应该以字母开头且不小于6位；密码不小于6位！注册账号登录后享有更多特权哦！赶快注册吧！
                    </div>
                </div>
                <div class="two-third column last" >

                        <p>
<!--                            <label for="name" class="required label">账号:</label>-->
                            <input id="name" class="validate[required]" type="text" name="name" placeholder="账号"/>
                        </p>
                        <p>
<!--                            <label for="" class="required label">密码:</label>-->
                            <input id="psw1" class="validate[required]" type="password" name="psw1" placeholder="密码"/>
                        </p>
                        <p>
<!--                            <label for="" class="required label">再次输入密码:</label>-->
                            <input id="psw2" class="validate[required]" type="password" name="psw2" placeholder="再次输入密码"/>
                        </p>
                        <p>
                            <a  id="zhuce" class="medium gray button" style="width: 170px">立即注册</a>
                        </p>
                        <div id="ts" style="color: red;text-align: center">*</div>


                    <!--                    <div id="success" class="success box">-->
<!--                        Thank you. We have received your reservation info and will contact you back shortly.-->
<!--                    </div>-->
<!--                    <div id="error" class="error box">-->
<!--                        Something went wrong, please try again later. We truly apologize for the inconvenience.-->
<!--                    </div>-->
                </div>
            </div>

        </div>

        <!-- Footer -->
        <?php require('./public/commen/footer.php') ?>
        <!-- Copyright and Social Icons -->
        <?php require('./public/commen/copyright.php') ?>


    </div>
</div>

<!-- JavaScript Files -->

<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/superfish.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.cycle.lite.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.nailthumb.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.isotope.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/lamoon.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/lamoon-gallery.js"></script>

</body>
</html>
