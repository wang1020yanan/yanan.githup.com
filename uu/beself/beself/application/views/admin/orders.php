<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>订单列表</title>
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/ddlb.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/nav2.css" />
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>

    <style>
        #fy a,strong{
            width: 40px;
            height: 30px;
            border: 1px solid #F0F0F0;
            text-decoration: none;
            line-height: 30px;
            display: block;
            float: left;
            text-align: center;
            margin-left: 3px;
            color: #858585;
        }
        #fy strong{
            border: 1px solid #ff9801;
        }
        #fy div{
            float: right;
            padding: 10px;
        }
    </style>
</head>
<body>

<!--头部-->
<div class="nv">
    <div class="container nv-a">
        <div class="zhongjian">
            <h1><span> 订单列表 </span>&nbsp;&nbsp;&nbsp;订单数量：<?php echo $len?></h1>
        </div>
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
            <div class="col-md-12 xxb">
                <!--日期-->
                <span class=""><?php echo $vo['times']?>&nbsp;&nbsp;&nbsp;</span>
                <span class="">订单号:</span>
                <span class=""><?php echo $vo['tradeno']?></span>
            </div>


            <!--左产品-->
            <div class="col-md-4 cd-left">
                <?php foreach($vo['msg'] as $msg):?>
                    <div class="col-md-5 cd-image">
                        <img src="<?php echo base_url()?>/public/uploads/<?php echo $msg->pic?>" >
                    </div>
                    <div class="col-md-5">
                    <span>
                        <a href="<?php echo site_url('best/getBuyMsg')?>/<?php echo $msg->number?>">
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
            <div class="col-md-8 cd-right">
                <div class="col-md-6">
                    <span><?php echo $vo['address']?></span>
                </div>
                <div  class="col-md-3">
                    <span><?php echo $vo['money']?></span><span>元</span>
                </div>
                <div class="col-md-3">
                    <span>
                        <?php
                        if($vo['zt']=="已付款"){
                           echo "已付款&nbsp;||&nbsp;";
                            echo "<a href='".site_url('admin/uporder')."/".$vo['tradeno']."'>确认</a>";
                        }else{
                            echo "<span style='color: red'>已发货</span>";
                        }
                        ?>
                    </span>
                </div>
            </div>

        <?php endforeach;?>
        <!--分页-->
        <div class="fyrq" id="fy">
            <?php echo $fy?>
        </div>
    </div>
    <div class="ddlb-dbtc"></div>
    <?php require "./public/common/bbsfooter.php"?>
</div>
</body>
</html>
