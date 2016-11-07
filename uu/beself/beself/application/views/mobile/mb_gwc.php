<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>购物车</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/page6.css" />
    <script src="<?php echo base_url()?>/public/mobile/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/public/mobile/js/M-homepage.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>/public/mobile/css/nav.css">
    <script>
        /**
         * Created by Administrator on 2015/8/31.
         */

        $(document).ready(function(){
            var allmoney = 0;
            <?php foreach($data as $da):?>
            var price<?php echo  $da['id']?> = $("#danjia<?php echo  $da['id']?>").html();
            allmoney = (allmoney)+parseFloat(price<?php echo  $da['id']?>);
            $("#jsjs").html(allmoney);

            //增加数量
            $("#jia<?php echo  $da['id']?>").click(function(){
                var num<?php echo  $da['id']?> = $("#shuliang<?php echo  $da['id']?>").val();
                var allnum<?php echo  $da['id']?> = ++(num<?php echo  $da['id']?>);

                $("#shuliang<?php echo  $da['id']?>").attr("value",allnum<?php echo  $da['id']?>);
                var money<?php echo  $da['id']?> = (allnum<?php echo  $da['id']?>)*(price<?php echo  $da['id']?>);
                $("#zjzj<?php echo  $da['id']?>").html(money<?php echo  $da['id']?>);

                allmoney = allmoney+parseFloat(price<?php echo  $da['id']?>);
                $("#jsjs").html(allmoney);
            });

            //减少数量
            $("#jian<?php echo  $da['id']?>").click(function(){
                var num<?php echo  $da['id']?> = $("#shuliang<?php echo  $da['id']?>").val();
                var allnum<?php echo  $da['id']?> = --(num<?php echo  $da['id']?>);

                //购物车产品数量不能小于1
                if(allnum<?php echo  $da['id']?><1){
                    allnum<?php echo  $da['id']?>=1;
                }else{
                    allmoney = allmoney-parseFloat(price<?php echo  $da['id']?>);
                }

                $("#shuliang<?php echo  $da['id']?>").attr("value",allnum<?php echo  $da['id']?>);
                var money<?php echo  $da['id']?> = (allnum<?php echo  $da['id']?>)*(price<?php echo  $da['id']?>);
                $("#zjzj<?php echo  $da['id']?>").html(money<?php echo  $da['id']?>);

                $("#jsjs").html(allmoney);
            });
            <?php endforeach;?>



            //结算，获取购物车信息
            $("#buy").click(function(){
                var len = <?php echo count($data)?>;
                var arr = new Array(len);

                <?php foreach($data as $dat):?>
                var bnumber<?php echo $dat['id']?> = $("#number<?php echo $dat['id']?>").val();
                var bpic<?php echo $dat['id']?> = $("#pic<?php echo $dat['id']?>").val();
                var bname<?php echo $dat['id']?> = $("#name<?php echo $dat['id']?>").val();
                var bsizes<?php echo $dat['id']?> = $("#sizes<?php echo $dat['id']?>").val();
                var bnum<?php echo $dat['id']?> = $("#shuliang<?php echo $dat['id']?>").val();
                var bprice<?php echo  $da['id']?> = $("#danjia<?php echo  $da['id']?>").html();
                var bmoney = $("#jsjs").html();

                var be<?php echo $dat['id']?> = new Array(6);
                be<?php echo $dat['id']?>[0] = bnumber<?php echo $dat['id']?>;
                be<?php echo $dat['id']?>[1] = bpic<?php echo $dat['id']?>;
                be<?php echo $dat['id']?>[2] = bname<?php echo $dat['id']?>;
                be<?php echo $dat['id']?>[3] = bnum<?php echo $dat['id']?>;
                be<?php echo $dat['id']?>[4] = bsizes<?php echo $dat['id']?>;
                be<?php echo $dat['id']?>[5] = bmoney;
                be<?php echo $dat['id']?>[6] = bprice<?php echo  $da['id']?>;
                arr[len-1] = be<?php echo $dat['id']?>;
                len--;

                <?php endforeach;?>

                $.post("<?php echo site_url('best/preOrders')?>",{arr:arr},function(msg){
                    if(msg==0){
                        alert("请先登录");
                        window.location.href="<?php echo site_url('user/login')?>";
                    }else{
                        window.location.href="<?php echo site_url('mobile/ding')?>/"+msg+"";
                    }
                });
            });
        });
    </script>
</head>
<body>
<!--导航栏-->
<?php require "./public/common/mbheader.php"?>
<!--购物车产品-->
<div style="width: 100%;padding-top:3.6em;margin-bottom: 4em">
    <?php foreach($data as $vo):?>
        <input type="hidden" id="number<?php echo $vo['id']?>" value="<?php echo $vo['msg']->number?>">
        <input type="hidden" id="pic<?php echo $vo['id']?>" value="<?php echo $vo['msg']->pic?>">
        <input type="hidden" id="name<?php echo $vo['id']?>" value="<?php echo $vo['msg']->name?>">
        <input type="hidden" id="sizes<?php echo $vo['id']?>" value="<?php echo $vo['sizes']?>">
    <!--单产品-->
    <div class="m-dp">
        <div class="m-dp-a">
            <img src="<?php echo base_url()?>/public/uploads/<?php echo $vo['msg']->pic?>" >
        </div>
        <div class="m-dp-b">
            <div class="m-dp-c">
                <p><a href="<?php echo site_url('best/getBuyMsg')?>/<?php echo $vo['msg']->number?>">
                        <?php echo $vo['msg']->name?>
                    </a>
                </p>
            </div>
            <div class="m-dp-d">
                <span class="cc"><?php echo $vo['sizes']?>尺寸&nbsp &nbsp</span>  <span class="jg">￥</span><span class="jg" id="danjia<?php echo $vo['id']?>"><?php echo $vo['msg']->price?></span>
            </div>
            <div class="m-dp-e">
                <div class="cd-g">
                    <div class="sl">
                        数量
                    </div>
                    <div class="cd-g-a">
                        <a id="jian<?php echo $vo['id']?>" style="cursor:pointer">-</a>
                    </div>
                    <div style="float: left"><input id="shuliang<?php echo $vo['id']?>" disabled class="shuliang-a" type="text" value="1" style="height: 1.6em"/></div>
                    <div class="cd-g-b">
                        <a id="jia<?php echo $vo['id']?>">+</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-dp-f">
            <a href="<?php echo site_url('mobile/delGwc')?>/<?php echo $vo['id']?>">
                <p class="glyphicon glyphicon-remove-circle remove"></p>
            </a>
        </div>
    </div>
    <?php endforeach;?>
</div>
<!--底部固定-->
<nav class="navbar navbar-fixed-bottom">
    <div class="db-a">
        <span class="db-b">合计：</span><span  class="db-c">￥</span><span class="db-c" id="jsjs">799</span>
    </div>
    <a href="#">
        <div class="db-e">
            <span id="buy">结算</span>
        </div>
    </a>
</nav>

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="m-qx">
                    <span class="glyphicon glyphicon-remove" data-dismiss="modal"></span>
                </div>
                <div class="m-mt-a">
                    <?php
                    if(empty($avatar)){
                        echo "<img src='".base_url()."/public/image/avatar.jpg'>";
                        echo "<p><a href='".site_url('user/login')."'>登录</a></p>";
                    }else{
                        echo "<img src='".base_url()."/public/user/upload/".$avatar."'>";
                        echo "<p>".$username."</p>";
                    }
                    ?>
                </div>
            </div>
            <div class="modal-body">
                <div class="m-cd">
                    <a href="">
                        <div class="m-cd-a">
                            <p>订单</p>
                        </div>
                        <div class="m-cd-b">
                            <p>&gt;</p>
                        </div>
                    </a>
                </div>
                <div class="m-cd">
                    <a href="<?php echo site_url('mobile/getProducts')?>/ring">
                        <div class="m-cd-a">
                            <p>戒指</p>
                        </div>
                        <div class="m-cd-b">
                            <p>&gt;</p>
                        </div>
                    </a>
                </div>
                <div class="m-cd">
                    <a href="<?php echo site_url('mobile/getProducts')?>/pendant">
                        <div class="m-cd-a">
                            <p>吊坠</p>
                        </div>
                        <div class="m-cd-b">
                            <p>&gt;</p>
                        </div>
                    </a>
                </div>
                <div class="m-cd">
                    <a href="<?php echo site_url('mobile/getProducts')?>/necklace">
                        <div class="m-cd-a">
                            <p>项链</p>
                        </div>
                        <div class="m-cd-b">
                            <p>&gt;</p>
                        </div>
                    </a>
                </div>
                <div class="m-cd">
                    <a href="<?php echo site_url('mobile/getProducts')?>/wristlet">
                        <div class="m-cd-a">
                            <p>腕饰</p>
                        </div>
                        <div class="m-cd-b">
                            <p>&gt;</p>
                        </div>
                    </a>
                </div>
                <div class="m-cd">
                    <a href="<?php echo site_url('mobile/getProducts')?>/earrings">
                        <div class="m-cd-a">
                            <p>耳饰</p>
                        </div>
                        <div class="m-cd-b">
                            <p>&gt;</p>
                        </div>
                    </a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
</body>
</html>