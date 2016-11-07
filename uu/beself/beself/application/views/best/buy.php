<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url()?>/public/image/lg.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/goumai.css" />

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
            <h1><span> </span></h1>
        </div>
        <?php require "./public/common/user.php"?>
    </div>
</div>
<!--产品-->
<div class="ct">
    <div class="container ct-ct">
        <div class="ct-img">
            <img src="<?php echo base_url()?>/public/uploads/<?php echo $res->pic?>">
        </div>
        <div class="ct-xx">
            <form action="<?php echo site_url('best/addGwc')?>" method="post">
                <input type="hidden" name="number" id="number" value="<?php echo $res->number?>"  />
                <!--产品标题和价格-->
                <div class="ct-biaoti">
                    <span class="ct-biaoti-a"><?php echo $res->name?></span>
                    <span class="ct-biaoti-b"><?php echo $res->price?>元</span>
                    <span class="ct-biaoti-c"><a href="<?php echo site_url('best/getSingleProduct')?>/<?php echo $res->number?>">深入了解产品></a></span>
                </div>
                <!--产品编号-->
                <div class="ct-cc">
                    <p>1.编号: <span class="ct-cc-sp2"><?php echo $res->number?></span></p>
                </div>
                <!--产品尺寸-->
                <div class="ct-cc">
                    <p>
                        2.选择尺寸:
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
                    </p>
                </div>
                <!--产品服务-->
                <div class="ct-cc">
                    <p>3.服务:<span class="ct-cc-sp"><a href="http://www.25to75.com/best/js/sh/NN001" style="color: red">终身售后保养</a></span></p>
                </div>
                <!--立即购买-->
                <div class="ct-cc-cc">
                    <button type="submit">立即购买</button>
                </div>
            </form>
        </div>
    </div>
    <!--分割线-->
    <div class="fengexian1"></div>
    <!--产品大图-->
    <div class="container cpdt" style="margin-bottom: 40px">
        <?php echo $res->htmlData?>
        <img src="<?php echo base_url()?>/public/image/hz.jpg" style="width: 100%;padding-top: 5px">
    </div>

    <?php require "./public/common/bbsfooter.php"?>
</div>
</body>
</html>