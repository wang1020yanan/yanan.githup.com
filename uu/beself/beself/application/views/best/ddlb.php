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
    <script>
        $(document).ready(function(){
            var screenwidth = window.screen.width;
            if(screenwidth < 1000){
                window.location.href="<?php echo site_url('mobile/ddlb')?>";
            }
        });
    </script>
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
<div class="container content">
    <div class="col-md-12 xxa">
        <div class="col-md-4">订单详情</div>
        <div class="col-md-4">收货地址</div>
        <div class="col-md-2">总计</div>
        <div class="col-md-2">状态</div>
    </div>
    <!--订单-->
    <?php foreach($data as $vo):?>
        <div class="col-md-12 xxb" style="padding-left: 40px;color: #585858">
            <!--日期-->
            <span class=""><?php echo $vo['times']?>&nbsp;&nbsp;&nbsp;</span>
            <span class="">订单号:</span>
            <span class=""><?php echo $vo['tradeno']?></span>
        </div>


        <!--左产品-->
        <div class="col-md-4 cd-left" style="color: #989898;padding-left: 40px">
            <?php foreach($vo['msg'] as $msg):?>
                <div class="col-md-5 cd-image">
                    <img src="<?php echo base_url()?>/public/uploads/<?php echo $msg->pic?>" >
                </div>
                <div class="col-md-5" >
                    <span>
                        <a style="color: #ff9801" href="<?php echo site_url('best/getBuyMsg')?>/<?php echo $msg->number?>">
                            <?php echo $msg->name?>&nbsp;&nbsp;&nbsp;<small><?php echo $msg->sizes?>尺寸</small>
                        </a>
                    </span>
                </div>
                <div class="col-md-2">
                    <span>X</span><span><?php echo $msg->num?></span>
                </div>
            <?php endforeach;?>
        </div>

        <!--右金额-->
        <div class="col-md-8 cd-right" style="color: #989898">
            <div class="col-md-6">
                <span><?php echo $vo['address']?></span>
            </div>
            <div  class="col-md-3">
                <span style="color: #ff9801"><?php echo $vo['money']?></span><span>元</span>
            </div>
            <div class="col-md-3">
                <span><?php echo $vo['zt']?></span>
            </div>
        </div>

    <?php endforeach;?>

</div>
    <div class="ddlb-dbtc"></div>
    <?php require "./public/common/bbsfooter.php"?>
</div>
</body>
</html>