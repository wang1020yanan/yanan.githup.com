<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=2">
    <title>Beself+</title>
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/nav.css">
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/M-homepage.js"></script>

    <style>
        #content img{
            width: 100%;
        }
    </style>
</head>
<body>
<!--导航栏-->
<?php require "./public/common/mbheader.php"?>

<div id="content" style="margin-bottom: 40px;width: 100%;padding-top: 60px" >
        <?php echo $res->htmlData2?>
</div>
<div id="footer" style="width: 100%;position: fixed;bottom: 0">
    <a href="<?php echo site_url('mobile/getBuyMsg')?>/<?php echo $res->number?>">
        <button style="height: 50px;width: 100%;background: #ff9801;color: #FFF;font-size: 1.3em;border: 0">立&nbsp;即&nbsp;购&nbsp;买</button>
    </a>
</div>
<?php require "./public/common/mbmodal.php"?>
</body>
</html>