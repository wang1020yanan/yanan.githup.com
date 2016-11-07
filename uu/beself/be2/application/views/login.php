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
                    var uname = $('#name').val();
                    var psw = $('#psw1').val();
                    $.post("<?php echo site_url('user/doLogin')?>",{name:uname,psw:psw},function(result){
                        if (result == 0){
                            $("#ts").text( "请输入正确账号") ;
                        }else if(result == 1){
                            $("#ts").text( "密码不正确") ;
                        }else{
                            alert("登陆成功");
                            window.location.href="javascript:history.go(-1)"
                        }
                    })

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
                <h1><span>登录beself账号</span></h1>
            </div>
            <div class="container section" style="text-align: center">
                <div class="one-third column">
                    <h3 class="nobg">温馨提示</h3>
                    <div class="info box">
                        登录享有更多特权哦！
                    </div>
                </div>
                <div class="two-third column last" >

                        <p>
<!--                            <label for="name" class="required label">账号:</label>-->
                            <input id="name" class="validate[required]" type="text" name="uname" placeholder="账号"/>
                        </p>
                        <p>
<!--                            <label for="" class="required label">密码:</label>-->
                            <input id="psw1" class="validate[required]" type="password" name="psw" placeholder="密码"/>
                        </p>
                        <p>
                            <a  id="zhuce" class="medium gray button" style="width: 170px">立即登录</a>
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
