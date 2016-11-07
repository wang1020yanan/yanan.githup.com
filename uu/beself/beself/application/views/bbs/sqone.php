<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Beself+社区</title>
    <link href="<?php echo base_url()?>/public/image/lg.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/bbs/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/bbs/css/pageone.css" />
    <script src="<?php echo base_url()?>/public/bbs/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/bbs/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#qiandao").click(function(){
                $.post("<?php echo site_url('bbs/qiandao')?>",{},function(msg){
                    if(msg==0){
                        alert("请先登录");
                        window.location.href="<?php echo site_url('user/login')?>";
                    }else if(msg==1){
                        alert("已签到");
                    }else{
                        alert("签到成功");
                    }
                });
            });
        });
    </script>
</head>
<body>
<?php require "./public/common/bbsheader.php"?>
<!--热门板块-->
<div class="bk">
    <div class="bk-a">
        <div class="bk-a-a">
            <div class="bk-a-b">
                热门版块：
            </div>
            <div class="bk-a-b">
                <a href="<?php echo site_url('bbs/sqone')?>/ring">戒指</a>
            </div>
            <div class="bk-a-b">
                <a href="<?php echo site_url('bbs/sqone')?>/pendant">吊坠</a>
            </div>
            <div class="bk-a-b">
                <a href="<?php echo site_url('bbs/sqone')?>/necklace">项链</a>
            </div>
            <div class="bk-a-b">
                <a href="<?php echo site_url('bbs/sqone')?>/wristlet">腕饰</a>
            </div>
            <div class="bk-a-b">
                <a href="<?php echo site_url('bbs/sqone')?>/earrings">耳饰</a>
            </div>
        </div>
        <!--版块内容-->
        <div class="bk-ct">
            <div class="bk-ct-a">
                <div class="bk-ct-aa">
                    <p><span>版块</span>&nbsp;<span><?php echo $abc?></span></p>
                </div>
                <div class="bk-fb">
                    <button>
                        <a style="text-decoration: none;color: #FFF" href="<?php echo site_url('bbs/fatie')?>">发表新主题</a>
                    </button>
                </div>
            </div>
            <!--新主题-->
            <?php foreach($ress as $vo):?>
            <div class="bk-zt">
                <div class="bk-zt-tx">
                    <img src="<?php echo base_url()?>/public/user/upload/<?php echo $vo['res']->avatar?>">
                </div>
                <div class="bk-zt-ct">
                    <div class="ct-a">
                        <a href="<?php echo site_url('bbs/content')?>/<?php echo $vo['res']->id?>"><?php echo $vo['res']->title?></a>
                        <?php
                        if(empty($vo['res']->jing)){
                        }else{
                            echo "<img src='".base_url()."/public/bbs/image/rt.png'>";
                        }
                        ?>
                    </div>
                    <div class="ct-yh">
                        <div class="ct-yhm">
                            <a href="#"><?php echo $vo['res']->username?></a>
                            <a><?php echo $vo['res']->timer?></a>
                        </div>
                        <div class="ct-ydl">
                            <span class="glyphicon glyphicon-sunglasses"></span>  <span><?php echo $vo['nums']?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>

            <!--分页-->
            <div class="fyrq" id="fy">
                <?php echo $fenye?>
            </div>
        </div>
        <!--右侧-->
        <div class="tj">
            <div class="bkan">
                <div class="rmbk-bt">
                    <p>版块推荐</p>
                </div>
                <button class="bta"><a href="<?php echo site_url('bbs/sqone')?>/ring">戒指</a></button>
                <button class="btb"><a href="<?php echo site_url('bbs/sqone')?>/pendant">吊坠</a></button>
                <button class="bta"><a href="<?php echo site_url('bbs/sqone')?>/necklace">项链</a></button>
                <button class="btb"><a href="<?php echo site_url('bbs/sqone')?>/wristlet">腕饰</a></button>
                <button class="bta"><a href="<?php echo site_url('bbs/sqone')?>/earrings">耳饰</a></button>
            </div>
            <div class="qd">
                <button id="qiandao">
                    <span class="glyphicon glyphicon-calendar"></span>签到
                </button>
                <div class="pm">
                    <p style="margin-top: 20px"><span class="glyphicon glyphicon-user">&nbsp; </span><span><?php echo $nums5?></span></p>
                </div>
            </div>
            <!--热点动态-->
            <div class="rddt">
                <div class="rddt-bt">
                    <p>热点动态*</p>
                </div>
                <div class="hd">
                    <img src="<?php echo base_url()?>/public/bbs/image/c2.jpg">
                    <p>钻戒大放价</p>
                </div>
                <div class="hd">
                    <img src="<?php echo base_url()?>/public/bbs/image/c2.jpg">
                    <p>钻戒大放价</p>
                </div>
                <!--<div class="hd">-->
                <!--<img src="image/c2.jpg">-->
                <!--<p>钻戒大放价</p>-->
                <!--</div>-->
            </div>
            <!--热点动态-->
            <div class="rddt">
                <div class="rddt-bt">
                    <p>热点关注*</p>
                </div>
                <div class="hd">
                    <img src="<?php echo base_url()?>/public/bbs/image/yx6.png" style="width: 60%">
                    <p>微信公众平台</p>
                </div>
                <!--<div class="hd">-->
                <!--<img src="image/c2.jpg">-->
                <!--<p>钻戒大放价</p>-->
                <!--</div>-->
                <!--<div class="hd">-->
                <!--<img src="image/c2.jpg">-->
                <!--<p>钻戒大放价</p>-->
                <!--</div>-->
            </div>
        </div>
    </div>

</div>
<!--底部-->
<?php require "./public/common/footer.php"?>
</body>
</html>