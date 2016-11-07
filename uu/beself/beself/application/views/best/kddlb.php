<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url()?>/public/image/lg.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/ddlb.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/nav2.css" />
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>
</head>
<body>

<!--头部-->
<div class="nv">
    <div class="container nv-a">
        <?php require "./public/common/logo.php"?>
        <div class="zhongjian">
            <h1><span> 订单列表 </span></h1>
        </div>
        <?php require "./public/common/user.php"?>
    </div>
</div>
<!--订单标题和详情-->
<div class="bg">
    <div class="container content" style="font-size: 2em;text-align: center;padding-top: 60px">
        <a href="<?php echo site_url('welcome/index')?>">
            对不起，您还没有订单，我要马上购物。
        </a>
    </div>
    <div class="ddlb-dbtc"></div>
    <?php require "./public/common/bbsfooter.php"?>
</div>
</body>
</html>