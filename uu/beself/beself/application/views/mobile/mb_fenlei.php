
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>产品列表</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1, user-scalable=no">
    <title>homepage</title>
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/page2.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/nav.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/swiper.min.css">
    <script src="<?php echo base_url()?>/public/mobile/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/M-homepage.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/swiper.min.js"></script>
</head>
<body>
<!--导航栏-->
<?php require "./public/common/mbheader.php"?>
<!--&lt;!&ndash;二级导航&ndash;&gt;-->
<!--<div style="margin-top: 56px;height:40px;width:100%;background:#ffffff;position: fixed;font-size: 0.8em">-->
<!--<div class="swiper-container">-->
<!--<div class="swiper-wrapper">-->
<!--<div class="swiper-slide">-->
<!--<div class="m-xl">-->
<!--<a href="#" style="">全部</a>-->
<!--</div>-->
<!--<div class="m-xl">-->
<!--<a href="#">B系列</a>-->
<!--</div>-->
<!--<div class="m-xl">-->
<!--<a href="#">B系列</a>-->
<!--</div>-->
<!--<div class="m-xl">-->
<!--<a href="#">B系列</a>-->
<!--</div>-->
<!--<div class="m-xl">-->
<!--<a href="#">B系列</a>-->
<!--</div>-->
<!--</div>-->
<!--<div class="swiper-slide">-->
<!--<div class="swiper-slide">-->
<!--<div class="m-xl">-->
<!--<a href="#">B系列</a>-->
<!--</div>-->
<!--<div class="m-xl">-->
<!--<a href="#">B系列</a>-->
<!--</div>-->
<!--<div class="m-xl">-->
<!--<a href="#">B系列</a>-->
<!--</div>-->
<!--<div class="m-xl">-->
<!--<a href="#">B系列</a>-->
<!--</div>-->
<!--<div class="m-xl">-->
<!--<a href="#">B系列</a>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<script>-->
<!--var mySwiper = new Swiper('.swiper-container', {-->
<!--autoplay: 50000,-->
<!--})-->
<!--</script>-->
<!--</div>-->
<div class="m-lb">
<!--    <div style="width: 100%">-->
<!--        <img src="--><?php //echo base_url()?><!--/public/image/newyork.jpg" style="width: 100%">-->
<!--    </div>-->
    <?php foreach($res as $vo):?>
    <div class="m-lb-a">
        <a href="<?php echo site_url('mobile/getSingleProduct')?>/<?php echo $vo->number?>">
            <img src="<?php echo base_url()?>/public/uploads/<?php echo $vo->pic2?>">
        </a>
        <p><?php echo $vo->name?></p>
        <p style="color: #ff9801"><?php echo $vo->price?>元</p>
    </div>
    <?php endforeach;?>
    <div style="clear: both"></div>
</div>
<?php require "./public/common/mbmodal.php"?>
</body>
</html>