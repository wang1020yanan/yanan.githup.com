<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>订单结算页</title>
    <link href="<?php echo base_url()?>/public/image/lg.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/dingdan.css" />
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/nav2.css" />
    <script>
        $(document).ready(function(){
            $("#dwfp").click(
                function(){
                    $("#dwtt").fadeIn(0)
                }
            );
            $("#grfp").click(
                function(){
                    $("#dwtt").fadeOut(0)
                }
            );
            $('#shdztj').click(function(){
                var tradeno = $('#WIDout_trade_no').val();
                var name = $('#shdz-xm').val();
                var telphone = $('#shdz-tel').val();
                var address = $('#shdz-dz').val();
                var fp = $('#dwtt').val();
                var ff=name+"  "+telphone+"  "+address+"  ";
                var telReg = !!telphone.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
                if(name.length < 1){
                    alert("请您输入收货人姓名");
                }else if(telReg==false){
                    alert("您输入的手机号码错误");
                }else if(address.length <10 ){
                    alert("请输入详细的收获地址");
                }else{
                    $.post("<?php echo site_url('best/preAddress')?>",{name:name,telphone:telphone,address:address,tradeno:tradeno,fp:fp},function(msg){
                        if(msg==1){
                            $("#shdz").html(ff);
                            $("#zzshdz").html(ff);
                            $("#myModal").fadeOut(100);
                        }
                    });
                }
            });

            $("#gojs").click(function(){
                var abc = $("#shdz").html();
                if(abc.length < 10){
                    alert("请添加详细的收货地址");
                }else{
                    $("#form2").submit();
                }
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
            <h1><span> 确认订单 </span></h1>
        </div>
        <?php require "./public/common/user.php"?>
    </div>
</div>
<!--详情-->
<div class="dd-shdz">
    <div class="container dd-shdz-tc"> </div>
    <!--收货地址-->
    <div class="container dd-shdz-a">
        <p class="dd-shdz-b">收货地址</p>
        <div class="dd-mt">
            <!--存在地址-->
            <div class="dd-czdz">
                <p id="shdz"></p>
            </div>
            <div class="tjdzank">
                <button class="dd-tjantb" data-toggle="modal" data-target="#myModal">+<span class="glyphicon glyphicon-pencil"></span></button>
                <span class="dd-tjdzbq">添加或编辑收货地址</span>
            </div>
            <!-- 模态框（Modal） -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"
                                    data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                添加地址
                            </h4>
                        </div>
                        <div class="modal-body">
                            <input id="shdz-xm" type="text" placeholder="输入姓名（必填）">
                            <input id="shdz-tel" type="tel" placeholder="输入11位手机号码（必填）">
                            <textarea id="shdz-dz" placeholder="输入详细地址 省/市/区县/街道等（必填）"></textarea>
<!--                            <input id="shdz-bq" type="text" placeholder="地址标签（选填）" >-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">关闭
                            </button>
                            <button id="shdztj" type="button" class="btn btn-primary"  data-dismiss="modal">
                                提交
                            </button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>
        </div>


    </div>
    <div class="container dd-shdz-tc2"><div class="container dd-shdz-tc3"></div></div>
    <!--支付方式-->
    <div class="container dd-zfps">
        <div class="container dd-zfps-a" >
            <div class="dd-zfps-b">
                <p class="dd-zfps-c">支付方式</p>
            </div>
            <div class="dd-zfps-d">
                <p class="dd-zfps-e">微信支付</p>
            </div>
        </div>
    </div>
    <!--配送方式-->
    <div class="container dd-zfps">
        <div class="container dd-zfps-a">
            <div class="dd-zfps-b">
                <p  class="dd-zfps-c">配送方式</p>
            </div>
            <div  class="dd-zfps-d">
                <p class="dd-zfps-e">顺丰快递</p>
            </div>
        </div>
    </div>
    <!--发票-->
    <div class="container dd-zfps">
        <div class="container dd-zfps-a">
            <div class="dd-zfps-b">
                <p class="dd-zfps-c">发票</p>
            </div>
            <div class="dd-fp-gr">
                <input  type="radio" id="grfp" name="fpfp" value="male"/>个人&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input id="dwfp" type="radio" name="fpfp" value="female" />单位
                <input id="dwtt" type="text" placeholder="请输入单位抬头">
            </div>
        </div>
    </div>
    <!--订单商品-->
    <div class="container dd-zfps">
        <div class="container dd-zfps-a">
            <div class="dd-zfps-b">
                <p class="dd-zfps-c">订单商品</p>
            </div>
        </div>
    </div>


    <?php foreach($res as $vo):?>
    <div class="container dd-xq-a">
        <div class="container dd-xq-b">
            <div class="dd-xq-c">
                <img src="<?php echo base_url()?>/public/uploads/<?php echo $vo->pic?>" class="dd-xq-d">
                <span><?php echo $vo->name?>&nbsp; 编号<?php echo $vo->number?> &nbsp; <?php echo $vo->sizes?>尺码</span>
            </div>
            <div class="dd-xq-e">
                <div class="dd-xq-f"><span><?php echo $vo->price?></span><span>元X</span><span><?php echo $vo->num?></span></div>
            </div>
            <div class="dd-xq-e">
                <div class="dd-xq-f"><span>有货</span></div>
            </div>
            <div class="dd-xq-e">
                <div class="dd-xq-g"><span><?php echo ($vo->price)*($vo->num)?></span><span>元</span></div>
            </div>
        </div>
    </div>
    <?php endforeach;?>

    <div class="container dd-js-a" >
        <div class="container dd-js-b">
            <div class="dd-js-d">
                <div><span>金额合计：  </span> <span><?php echo $allmoney?><span>元</span></span></div>
            </div>
            <div class="dd-js-d">
                <div><span>运费金额：  </span> <span>0</span><span>元</span></div>
            </div>
<!--                                       使用红包-->
            <div class="dd-js-d">
                <div><span>红包金额：  </span> <span id="hb">
                        <?php
                        if(empty($hb->hb)){
                            echo -0;
                        }else{
                            echo -100;
                        }
                        ?>
                    </span><span>元</span></div>
            </div>
            
            <div  class="dd-js-e">
                <div><span>应付总额：  </span> <span><?php echo $money?></span> <span>元</span></div>
            </div>
        </div>
    </div>
    <div class="container dd-js-a" >
        <div class="container dd-js-f">
            <div class="dd-js-g">
                <p id="zzshdz"></p>
            </div>
            <div class="dd-js-h">
                <button id="gojs" style="border: none;">去付款</button>
            </div>
        </div>
    </div>
</div>
<div class="dd-db-a"></div>
<?php require "./public/common/bbsfooter.php"?>



<!--支付宝需要的数据（隐藏）-->
<form action="<?php echo base_url()?>/public/zfb/alipayapi.php" method="post" id="form1">
    <!--订单号-->
    <input type="hidden" id="WIDout_trade_no" name="WIDout_trade_no" value="<?php echo $tradeno?>" />
    <!--订单名称-->
    <input type="hidden" name="WIDsubject" value="<?php echo $subject?>" />
    <!--付款金额-->
    <input type='hidden' name='WIDtotal_fee' value="<?php echo $money?>" />

</form>

<!--微信需要的数据（隐藏）-->
<form action="http://www.25to75.com/public/wxpay/beself/native.php" method="post" id="form2">
    <!--订单号-->
    <input type="hidden" name="out_trade_no" value="<?php echo $tradeno?>" />
    <!--订单名称-->
    <input type="hidden" name="subject" value="<?php echo $subject?>" />
    <!--付款金额-->
    <input type='hidden' name='total_fee' value="<?php echo $money?>" />

</form>
<!--结算END-->
</body>
</html>