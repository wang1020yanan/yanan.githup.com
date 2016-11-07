<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url()?>/public/image/lg.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/jiesuan.css" />
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/nav2.css" />
</head>
<body>
<!--头部-->
<div class="nv">
    <div class="container nv-a">
        <?php require "./public/common/logo.php"?>
        <div class="zhongjian">
            <h1><span> 我的购物车 </span><span><?php echo $len?></span></h1>
        </div>
        <?php include "./public/common/user.php"?>
    </div>
</div>
<!--详情-->
<div class="xq">
    <div class="container xq-a" style="font-size: 2em;text-align: center;padding-top: 88px">
        <a style="color: " href="<?php echo site_url('welcome/index')?>">您的购物车空空也，我要立马去购物</a>
    </div>
    <div style="width: 100% ;min-width: 1230px ;height:80px;border-bottom: 1px solid #D8D8D8"></div>
    <?php require "./public/common/bbsfooter.php"?>
</div>
</body>
</html>