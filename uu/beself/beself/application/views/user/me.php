<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/me.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/nav2.css" />
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url()?>/public/user/scripts/css/jquery.jcrop.css" type="text/css"/>

    <script src="<?php echo base_url()?>/public/user/scripts/jquery.ajaxfileupload.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>/public/user/scripts/jquery.jcrop.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>/public/user/scripts/avatarCutter.js" type="text/javascript"></script>

    <script>
        $(document).ready(function(){
            $("#tijiao").click(function(){
                var nicheng = $("#nicheng").val();
                if(nicheng < 2){
                    alert("昵称不能少于2个字");
                }else{
                    $.post("<?php echo site_url('user/nicheng')?>",{nicheng:nicheng},function(msg){
                        if(msg==-0){
                            alert("该昵称已存在，请重新修改");
                        }else{
                            alert("修改成功");
                            window.location.href="<?php echo site_url('user/ucenter')?>";
                        }
                    });
                }
            });
            $('#wdhb').click(function(){
                 $('.zhanghu-yc').hide(0);
                $('#us-hb').show(0);
            })
        });
    </script>
</head>
<body>
<!--头部-->
<div class="nv">
    <div class="container nv-a">
        <?php require "./public/common/logo.php"?>
        <div class="zhongjian">
            <h1><span> 我的账户 </span></h1>
        </div>
        <?php require "./public/common/user.php"?>
    </div>
</div>

<!--账户-->
<div class="zhanghu-x">
    <div class="container zhanghu-b">
          <span>
              <a href="http://www.25to75.com">首页</a>
              <span>/个人中心</span>
          </span>
    </div>
    <div class="container zhanghu-c" >
        <div class="zhanghu-cd">
            <div class="zhanghu-cd1"><span><b>个人中心</b></span></div>
            <div class="zhanghu-cd1"><a href="<?php echo site_url('best/ddlb')?>">我的订单</a></div>
            <div class="zhanghu-cd1"><a href="#">F码</a></div>
            <div class="zhanghu-cd1"><a href="<?php echo site_url('user/changePwd')?>">修改密码</a></div>
            <div class="zhanghu-cd1" data-toggle="modal" data-target="#myModal"><a href="#">修改头像</a></div>
            <div class="zhanghu-cd1"><a href="<?php echo site_url('bbs/mytz')?>">我的帖子</a></div>
            <div class="zhanghu-cd1"><a href="#" id="wdhb">我的红包</a></div>
        </div>
        <div class="zhanghu-xx">

            <div class="zhanghu-tp zhanghu-yc">
                <div class="zhanghu-tp-tp" id="tx">
                    <img class="zhanghu-tp-a" src="<?php echo base_url()?>/public/user/upload/<?php echo $avatar?>">
                    <p class="zhanghu-xm"><span id="grzxxm"></span><small></small></p>
                </div>
                <div class="zhanghu-tp-zh">
                    <p class="grzh-bdsj"><span class="aaa">手机:&nbsp;  </span><span id="grzxdh" class="bbb"><?php echo $res->telphone?></span></p><br/>
                    <p><span class="aaa">昵称: &nbsp; </span><span class="bbb"><?php echo $res->username?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="xg" data-toggle="modal" data-target=".bs-example-modal-sm">修改</span></p><br/>
                    <p><span class="aaa">经验: &nbsp; </span><span class="bbb"><?php echo $res->jy?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="aaa">积分:&nbsp;  </span><span class="bbb"><?php echo $res->jf?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="aaa">等级:&nbsp;  </span><span class="bbb">LV1</span></p><br/>
                </div>
            </div>



            <div class="zhanghu-dd zhanghu-yc" >
                <div class="zhanghu-dd-dd">
                    <img src="<?php echo base_url()?>/public/image/daizhifu.png">
                    <p class="grzx-dzf">我的购物车：<span style="color: #ff9801"><?php echo $len2?></span></p>
                    <a href="<?php echo site_url('best/gwc')?>">查看我的购物车>></a>
                </div>
                <div class="zhanghu-dd-dd">
                    <img src="<?php echo base_url()?>/public/image/daishouhuo.png">
                    <p class="grzx-dsh">我买到的Beself：<span style="color: #ff9801"><?php echo $len?></span></p>
                    <a href="<?php echo site_url('best/ddlb')?>">查看我的Beself>></a>
                </div>
            </div>
            <!--            红包列表-->
            <div class="hb"id="us-hb">
                <h4>我的红包：</h4>
<!--                红包图片-->
                <div class="row">
                    <div class="col-md-4">
                        <?php
                        if(empty($hb->hb)){
                            echo "";
                        }else{
                            echo " <img src='".base_url()."/public/image/huodong/hbb.jpg'>";
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container dbtc">
    </div>
    <?php require "./public/common/footer.php"?>
    <!-- 模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:800px">
            <div class="modal-content">
                <div class="modal-body" style="text-align: center">
                    <div style="width: 700px;height: 500px;border: 1px solid #858585;margin-left: 35px">
                        <a class="file">选择图片<input type="file" id="file1" name="file1" /></a>

                        <div style="overflow:hidden;margin-top: 20px;margin-left: 20px;width: 700px" id="div_avatar">

                            <div style="width:400px;height:400px;overflow:hidden;float:left" id="picture_original">
                                <img alt="" src="" />
                            </div>
                            <div style="float: left;margin-left: 16px">
                                <div id="picture_200" style="margin-top: 20px;border-radius: 50%"></div>
                                <div>
                                    <input type="button" value="裁剪上传" id="btnCrop" style="margin-left: 20px;margin-top: 100px;width: 200px;height: 40px;background: green"/>
                                </div>

                            </div>

                            <input type="hidden" id="x1" name="x1" value="0" />
                            <input type="hidden" id="y1" name="y1" value="0" />
                            <input type="hidden" id="cw" name="cw" value="0" />
                            <input type="hidden" id="ch" name="ch" value="0" />
                            <input type="hidden" id="username" value="<?php echo $username?>" />
                            <input type="hidden" id="imgsrc" name="imgsrc" />
                        </div>

                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    <!-- 模态框（Modal） -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="margin-top: 100px">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">修改昵称</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                            <input type="text" class="form-control" id="nicheng" placeholder="请输入昵称">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="tijiao">提交</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>