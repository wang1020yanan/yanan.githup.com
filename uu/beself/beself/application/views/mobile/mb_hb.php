
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>红包页</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/page9.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/nav.css">
    <script src="<?php echo base_url()?>/public/mobile/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/swiper.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/M-homepage.js"></script>
</head>
<body>
<!--导航栏-->
<?php require "./public/common/mbheader.php"?>
<!--红包-->
<div class="col-sm-12" id="hb">我的红包：</div>
<div class="row" style="min-height: 500px">
    <div class="col-sm-7" style="text-align: center">
        <?php
        if(empty($hb->hb)){
            echo "";
        }else{
            echo " <img src='".base_url()."/public/image/huodong/hbb.jpg'>";
        }
        ?>
    </div>
</div>
<?php require "./public/common/mbmodal.php"?>
</body>
</html>