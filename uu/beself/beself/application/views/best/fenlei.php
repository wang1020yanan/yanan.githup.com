<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>产品列表</title>
    <link href="<?php echo base_url()?>/public/image/lg.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/fenlei.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/nav.css" />
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/nav.js"></script>

</head>
<body>
<?php require "./public/common/header.php"?>

<!--填充-->
<div class="tctc"></div>
<!--内容-->
<div class="neir-a" id="cycle">
    <div class="neir-a-a">
        <img src="<?php echo base_url()?>/public/image/<?php echo $series?>.jpg" style="width: 100%">
    </div>
    <div class="container neir-sp cyclee" style="margin-bottom: 40px">
        <?php foreach($res as $vo):?>
        <div class="neir-sp-a">
            <a href="<?php echo site_url('best/getSingleProduct')?>/<?php echo $vo->number?>">
                <img src="<?php echo base_url()?>/public/uploads/<?php echo $vo->pic2?>">
            </a>
            <div style="height: 100px">
                <p style="text-align: center"><b><?php echo $vo->name?></b></p>
                <p style="text-align: center;color: #FF9900"><?php echo $vo->price?>元 </p>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<?php require "./public/common/bbsfooter.php"?>
</body>
</html>