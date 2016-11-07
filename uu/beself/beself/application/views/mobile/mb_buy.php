
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>单品页</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/page3.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/nav.css">
    <script src="<?php echo base_url()?>/public/mobile/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/swiper.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/M-homepage.js"></script>
</head>
<body>
<!--导航栏-->
<?php require "./public/common/mbheader.php"?>
<!--单品轮播-->
<div style="padding-top: 53px;">
    <img src="<?php echo base_url()?>/public/uploads/<?php echo $res->pic?>" width="100%">
</div>
<!--品名价格-->
<div class="m-pm">
    <form action="<?php echo site_url('mobile/addGwc')?>" method="post">
        <input type="hidden" name="number" id="number" value="<?php echo $res->number?>"  />
        <p><?php echo $res->name?></p>
        <p class="m-jg">￥<?php echo $res->price?></p>
        <div class="m-cc">
            <div class="m-cc-a">
                选择尺寸
            </div>
            <div class="m-cc-b">
                <select name="sizes" id="sizes">
                    <option value="0">均码（除戒指外选择此码）</option>
                    <option value="7">7尺寸</option>
                    <option value="8">8尺寸</option>
                    <option value="9">9尺寸</option>
                    <option value="10">10尺寸</option>
                    <option value="11">11尺寸</option>
                    <option value="12">12尺寸</option>
                    <option value="13">13尺寸</option>
                    <option value="14">14尺寸</option>
                    <option value="15">15尺寸</option>
                    <option value="16">16尺寸</option>
                    <option value="17">17尺寸</option>
                    <option value="18">18尺寸</option>
                    <option value="19">19尺寸</option>
                </select>
            </div>
        </div>
        <div class="m-ljgm">
            <button type="submit">立即购买</button>
        </div>
    </form>
</div>

<div class="m-ms">
    <p class="m-msa">产品描述</p>
    <p class="m-msb">.....................................</p>
    <!--图片-->
    <?php echo $res->htmlData?>
    <img src="<?php echo base_url()?>/public/image/hz.jpg" style="width: 100%;padding-top: 5px">
</div>
<?php require "./public/common/mbmodal.php"?>
</body>
</html>