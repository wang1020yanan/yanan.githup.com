
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>订单详情</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/page8.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/nav.css">
    <script src="<?php echo base_url()?>/public/mobile/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/M-homepage.js"></script>
</head>
<body>
<!--导航栏-->
<?php require "./public/common/mbheader.php"?>
<!--tc-->
<div class="tc"></div>
<?php foreach($data as $vo):?>
<!--订单-->
<div class="dd">
    <!--标题-->
    <div class="dd-bt">
        <div class="dd-a" style="">
            <p class="ddh">订单号：<span><?php echo $vo['tradeno']?></span></p>
            <p><?php echo $vo['times']?> &nbsp;&nbsp;金额:&nbsp;&nbsp;<?php echo $vo['money']?>元</p>
        </div>
        <div class="dd-b">
            <p><?php echo $vo['zt']?></p>
        </div>
    </div>
    <!--订单内产品-->
    <?php foreach($vo['msg'] as $msg):?>
    <div  class="dd-c">
        <div class="dd-d" style="">
            <img src="<?php echo base_url()?>/public/uploads/<?php echo $msg->pic?>" >
        </div>
        <div class="dd-e">
            <p class="dd-f"><?php echo $msg->name?></p>
            <p class="dd-g"><?php echo $msg->sizes?>尺寸&nbsp;&nbsp;<?php echo $msg->price?>元*<?php echo $msg->num?>件</p>
        </div>
    </div>
    <?php endforeach;?>
</div>
<?php endforeach;?>
<?php require "./public/common/mbmodal.php"?>
</body>
</html>