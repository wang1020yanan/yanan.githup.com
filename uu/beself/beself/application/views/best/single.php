<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>产品详情页</title>
    <link href="<?php echo base_url()?>/public/image/lg.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/nav.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/style.css">

    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/swiper.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/nav.js"></script>
    <script src="<?php echo base_url()?>/public/js/style.js"></script>

    <style>
        button{
            background: #FFF;
        }
    </style>
    
</head>
<body>
<?php require "./public/common/header.php"?>

<div class="menu2" style="background:rgba(8,8,8,0.7)">
    <div class="container">
        <div class="row" style="padding-top: 30px">
            <div class="col-md-5" ><a href="http://www.25to75.com/" style="font-size:1.5em;font-weight: bold;color: #ff9801;text-decoration: none">Beself+</a></div>
            <div class="col-md-1" style="text-align: right;">
                <a href="<?php echo site_url('best/js')?>/gy/<?php echo $res->number?>">
                    <p class="btn">产品工艺</p>
                </a>
            </div>
            <div class="col-md-1" style="text-align: right;">
                <a href="<?php echo site_url('best/js')?>/pk/<?php echo $res->number?>">
                    <p class="btn">产品PK</p>
                </a>
            </div>
            <div class="col-md-1" style="text-align: right;">
                <a href="<?php echo site_url('best/js')?>/cz/<?php echo $res->number?>">
                    <p class="btn">产品材质</p>
                </a>
            </div>
            <div class="col-md-1" style="text-align: right;">
                <a href="<?php echo site_url('best/js')?>/sh/<?php echo $res->number?>">
                    <p class="btn">产品售后</p>
                </a>
            </div>
            <div class="col-md-1" style="text-align: right;">
                <a href="<?php echo site_url('best/js')?>/by/<?php echo $res->number?>">
                    <p class="btn">产品保养</p>
                </a>
            </div>
            <div class="col-md-1" style="text-align: right;">
                <a href="<?php echo site_url('best/js')?>/gs/<?php echo $res->number?>">
                    <p class="btn"">品牌故事</p>
                </a>
            </div>
            <div class="col-md-1" style="text-align: right;">
                <a href="<?php echo site_url('best/getBuyMsg')?>/<?php echo $res->number?>">
                    <button class="btn" style="background: #ff9801;color: #FFF">立即购买</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12" id="c1" style="margin-bottom: 40px" >
<div class="col-md-12" >
    <?php echo $res->htmlData2?>
</div>
</div>
<!--     <div style="">--><?php //require "./public/common/bbsfooter.php"?><!--</div>-->
<div style="width: 100%;height: 40px;background: white"></div>
<br/>
<div style="width: 100%;min-width: 1230px;background: black;position:absolute;top: 6200px;padding-bottom: 40px;z-index: 100">
    <div style="width: 1230px;text-align: left;margin: auto">
        <p style="padding-top: 40px;color: white">Copyright&nbsp;&copy;&nbsp;2015&nbsp;25to75.com保留所有权利，沪ICP备15005343号-3
           <span style="float: right;padding-right: 20px">
            <span> <a style="color:#ff9801;" href="http://www.25to75.com/best/js/gs/NN018">关于我们</a></span>
            &nbsp;&nbsp;&nbsp;&nbsp;  <span> <a style="color:#ff9801;" href="http://www.25to75.com/best/js/lx/NN018">联系我们</a></span>
           </span>
        </p>
    </div>
</div>


</div>
</body>
</html>