<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url()?>/public/image/lg.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/jiesuan.css" />
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/nav2.css" />
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
                        window.location.href="<?php echo site_url('best/ding')?>/"+msg+"";
                    }
                });
            });
        });
    </script>
</head>
<body>
<!--头部-->
<div class="nv">
    <div class="container nv-a">
        <?php require "./public/common/logo.php"?>
        <div class="zhongjian">
            <h1><span> 我的购物车 </span><span> <?php echo $len?></span></h1>
        </div>
        <?php require "./public/common/user.php"?>
    </div>
</div>
<!--详情-->
<div class="xq" style="height: 900px">
    <div class="container xq-a">
        <div class="xq-cd">
            <div class="cd-a">图片</div>
            <div class="cd-b">商品名称</div>
            <div class="cd-c">尺寸</div>
            <div class="cd-c">单价</div>
            <div class="cd-c">数量</div>
            <div class="cd-c">小计</div>
            <div class="cd-c">操作</div>
        </div>

       <?php foreach($data as $vo):?>
           <input type="hidden" id="number<?php echo $vo['id']?>" value="<?php echo $vo['msg']->number?>">
           <input type="hidden" id="pic<?php echo $vo['id']?>" value="<?php echo $vo['msg']->pic?>">
           <input type="hidden" id="name<?php echo $vo['id']?>" value="<?php echo $vo['msg']->name?>">
           <input type="hidden" id="sizes<?php echo $vo['id']?>" value="<?php echo $vo['sizes']?>">
        <div class="xq-cp" id="xq-cp">
            <div class="cd-d">
                <img src="<?php echo base_url()?>/public/uploads/<?php echo $vo['msg']->pic?>" style="width: 80px;height: 80px">
            </div>
            <div class="cd-e">
                <a href="<?php echo site_url('best/getBuyMsg')?>/<?php echo $vo['msg']->number?>">
                    <?php echo $vo['msg']->name?>
                </a>
            </div>
            <div class="cd-f"><?php echo $vo['sizes']?></div>
            <div class="cd-f" style="color:#ff9801 " >
                <span id="danjia<?php echo $vo['id']?>"><?php echo $vo['msg']->price?></span><span>元</span>
            </div>
            <div class="cd-g">
                <div class="cd-g-a">
                    <a id="jian<?php echo $vo['id']?>" style="cursor:pointer">-</a>
                </div>
                <div style="float: left"><input style="background: #FFF" disabled id="shuliang<?php echo $vo['id']?>" class="shuliang-a" type="text" value="1" /></div>
                <div class="cd-g-b">
                    <a id="jia<?php echo $vo['id']?>" style="cursor:pointer">+</a>
                </div>
            </div>
            <div class="cd-f" style="color:#ff9801 ">
                <span id="zjzj<?php echo $vo['id']?>"><?php echo $vo['msg']->price?></span><span>元</span>
            </div>
            <div class="cd-f">
                <a href="<?php echo site_url('best/delGwc')?>/<?php echo $vo['id']?>">
                    <span style="cursor: pointer">X</span>
                </a>

                <!--此处是删除购物车内容-->
            </div>
        </div>
        <?php endforeach;?>
        <!--<div style="width: 100%;height: 1px;background: #000000">-->
        <!--&lt;!&ndash;此处再加产品&ndash;&gt;-->
        <!--</div>-->
        <div class="xq-zzjs">
            <div class="xq-zzjs-a">
                <a href="<?php echo site_url('welcome/index')?>" style="color:#A8A8A8;text-decoration: none;margin-left: 60px">继续购物>></a>
            </div>
            <div class="xq-zzjs-b">
                <span style="color: #ff9801;font-size: 16px">合计（不含运费）：</span>
                <span id="jsjs" style="font-size: 24px;color: #ff9801">799</span>
                <span style="font-size: 24px;color: #ff9801">元</span>
            </div>
            <div class="xq-zzjs-c">
                <button id="buy">去结算</button>
            </div>
        </div>
    </div>
    <div style="width: 100% ;min-width: 1230px ;height:80px;border-bottom: 1px solid #D8D8D8"></div>
</div>
<?php require "./public/common/bbsfooter.php"?>
</body>
</html>