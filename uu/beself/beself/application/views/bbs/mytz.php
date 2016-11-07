<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url()?>/public/image/lg.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/bbs/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/bbs/css/mytz.css" />
    <script src="<?php echo base_url()?>/public/bbs/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/bbs/js/bootstrap.min.js"></script>
</head>
<body>
<?php require "./public/common/bbsheader.php"?>
<!--热门板块-->
<div class="bk">
    <div class="bk-a">
        <div class="bk-a-a">
            <div class="bk-a-b">
                我的帖子
            </div>
        </div>
        <!--版块内容-->
        <div class="bk-ct">

            <?php foreach($res as $vo):?>
            <div class="bk-zt">
                <div class="bk-zt-tx">
                    <img src="<?php echo base_url()?>/public/user/upload/<?php echo $vo->avatar?>">
                </div>
                <div class="bk-zt-ct">
                    <div class="ct-a">
                        <a href="<?php echo site_url('bbs/content')?>/<?php echo $vo->id?>"><?php echo $vo->title?></a>
                    </div>
                    <div class="ct-yh">
                        <div class="ct-yhm">
                            <a href="#">版块&nbsp;<span><?php echo $vo->styler?></span></a>
                            <a>&nbsp;&nbsp;<?php echo $vo->timer?></a>
                        </div>
                        <div class="ct-ydl">
                            <a href="<?php echo site_url('bbs/st')?>/<?php echo $vo->id?>"><span style="cursor: pointer">删除</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>

        </div>
    </div>

</div>
<?php require "./public/common/footer.php"?>
</body>
</html>