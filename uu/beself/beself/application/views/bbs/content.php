<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url()?>/public/image/lg.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/bbs/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/bbs/css/pagetwo.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/public/bbs/bj/css/wangEditor-1.3.11.css">

</head>
<body>
<?php require "./public/common/bbsheader.php"?>
<!--热门板块-->
<div class="bk">
    <div class="bk-a">
        <!--帖子抬头-->
        <div class="bk-a-a">
            <div class="bk-ct-a">
                <div class="bk-ct-aa">
                    <p><span><?php echo $res->styler?></span></p>
                </div>
                <div class="bk-fb">
                    <button><a style="text-decoration: none;color: #FFF" href="<?php echo site_url('bbs/fatie')?>">发表新主题</a></button>
                </div>
            </div>
        </div>
        <!--帖子-->
        <div class="bk-ct">
            <div class="tz-bt">
                <!--标题-->
                <div class="tz-bt-a">
                    <p><?php echo $res->title?></p>
                </div>
                <div class="tz-bt-b">
                    <div class="tz-bt-c"><span class="fby">发表在</span>&nbsp;<span><?php echo $res->styler?></span>&nbsp;<span class="sj"><?php echo $res->timer?></span></div>
                    <div class="tz-bt-d"> <span class="glyphicon glyphicon-sunglasses"></span>  <span><?php echo $nums?></span></div>
                </div>
                <!--内容-->
                <div class="tz-nr" style="table-layout:fixed; word-break: break-all; overflow:hidden;">
                   <?php echo $res->content?>
                </div>
                <!--发表用户-->
                <div class="tz-yh">
                    <div class="tz-yh-a">
                        <?php
                        if(empty($res3->avatar)){
                            echo "<img src='".base_url()."/public/image/avatar.jpg'>";
                        }else{
                            echo "<img src='".base_url()."/public/user/upload/".$res3->avatar."'>";
                        }
                        ?>
                    </div>
                    <div class="tz-yh-b">
                        <input type="text" id="textarea2">
                    </div>
                    <div class="tz-yh-c">
                        <button id="pls">评论</button>
                    </div>
                </div>
            </div>
            <!--评论-->
            <div class="pl">
                <div class="pl-bt">
                    <p>精彩评论&nbsp;<span><?php echo $nums4?></span></p>
                </div>
                <div class="pl-a">
                    <!--评论详情-->
                    <?php foreach($res4 as $vo):?>
                    <div class="pl-b">
                        <div class="pl-yh">
                            <?php
                            if(empty($vo->avatar)){
                                echo "<img src='<?php echo base_url()?>/public/image/avatar.jpg'>";
                            }else{
                                echo "<img src='".base_url()."/public/user/upload/".$vo->avatar."'>";
                            }
                            ?>
                            <span style="color: #A8A8A8;padding: 10px"><?php echo $vo->username?></span>&nbsp;<span>发表于</span>&nbsp;<span style="color: #A8A8A8"><?php echo $vo->timer?></span>
                        </div>
                        <!--评论内容-->
                        <div class="pl-nr">
                            <?php echo $vo->content?>
                        </div>
                    </div>
                    <?php endforeach;?>

                </div>
            </div>
            <!--发表评论-->
            <div class="pl-fb">
                <div class="fb-a">
                    <div class="fb-a-a">
                        <div class="fb-a-a-tx">
                            <?php
                            if(empty($res3->avatar)){
                                echo "<img src='".base_url()."/public/image/avatar.jpg'>";
                            }else{
                                echo "<img src='".base_url()."/public/user/upload/".$res3->avatar."'>";
                            }
                            ?>
                        </div>
                        <!--编辑框-->
                        <div class="fb-sr">
                            <div class="fb-sr-a">
                                <textarea id='textarea1' style='height:300px; width:100%;'></textarea>
                                <button id="pl">发表</button>
                            </div>

                        </div>
                        <div style="clear:both"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--右侧-->
        <div class="tj">
            <!--用户信息展示-->
            <div class="yh-xx">
                <div class="yh-xx-a">
                    <img src="<?php echo base_url()?>/public/user/upload/<?php echo $res->avatar?>" style="width: 80px">
                    <p><?php echo $res->username?></p>
                    <div>潜力级首饰控</div>
                </div>
                <div class="yh-dj" style="padding-top: 20px">
                    <div class="yh-dj-a">
                        <p style="color:#888888 ">
                            <?php
                            if(empty($res3->jf)){
                                echo 0;
                            }else{
                                echo $res3->jf;
                            }
                            ?>
                        </p>
                        <p style="color:#888888 ">积分</p>
                    </div>
                    <div class="yh-dj-a">
                        <p style="color:#888888 ">
                            <?php
                            if(empty($res3->jy)){
                                echo 0;
                            }else{
                                echo $res3->jy;
                            }
                            ?>
                        </p>
                        <p style="color:#888888 ">经验值</p>
                    </div>
                    <div class="yh-dj-a" style="border: none">
                        <p style="color:#888888 ">LV1</p>
                        <p style="color:#888888 ">等级</p>
                    </div>
                </div>
            </div>
            <!--签到-->
            <div class="qd">
                <button id="qiandao">
                    <span class="glyphicon glyphicon-calendar" style="height: 40px"></span>签到
                </button>
                <div class="pm">
                    <p style="margin-top: 15px"><span class="glyphicon glyphicon-user">&nbsp; </span><span><?php echo $nums5?></span></p>
                </div>
            </div>

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
                <div class="hd">
                    <img src="<?php echo base_url()?>/public/bbs/image/c2.jpg">
                    <p>钻戒大放价</p>
                </div>
            </div>
            <!--热点关注-->
            <div class="rddt">
                <div class="rddt-bt">
                    <p>热点关注*</p>
                </div>
                <div class="hd">
                    <img src="<?php echo base_url()?>/public/bbs/image/yx6.png" style="width: 60%">
                    <p>微信公众平台</p>
                </div>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
</div>
<!--底部-->
<?php require "./public/common/footer.php"?>

<script src="<?php echo base_url()?>/public/bbs/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src='<?php echo base_url()?>/public/bbs/bj/js/wangEditor-1.3.11.min.js'></script>
<script src="<?php echo base_url()?>/public/bbs/bj/js/plupload.full.min.js"></script>
<script type="text/javascript">
    $(function(){
        //获取dom节点
        var $uploadContainer = $('#uploadContainer'),
            $fileList = $('#fileList'),
            $btnUpload = $('#btnUpload');

        var editor = $('#textarea1').wangEditor({
            'menuConfig': [
                ['viewSourceCode'],
                ['bold', 'underline', 'italic', 'foreColor', 'backgroundColor', 'strikethrough'],
                ['blockquote', 'fontFamily', 'fontSize', 'setHead', 'list', 'justify'],
                ['createLink', 'unLink', 'insertTable', 'insertExpression'],
                ['insertImage', 'insertVideo', 'insertLocation','insertCode'],
                ['undo', 'redo', 'fullScreen']
            ],
            //重要：传入 uploadImgComponent 参数，值为 $uploadContainer
            uploadImgComponent: $uploadContainer
        });

        //实例化一个上传对象
        var uploader = new plupload.Uploader({
            browse_button: 'btnBrowse',
            url: '<?php echo base_url()?>/public/bbs/upload.php',
            flash_swf_url: '<?php echo base_url()?>/public/bbs/plupload/Moxie.swf',
            sliverlight_xap_url: '<?php echo base_url()?>/public/bbs/plupload/Moxie.xap',
            filters: {
                mime_types: [
                    //只允许上传图片文件 （注意，extensions中，逗号后面不要加空格）
                    { title: "图片文件", extensions: "jpg,gif,png,bmp" }
                ]
            }
        });

        //存储多个图片的url地址
        var urls = [];

        //重要：定义 event 变量，会在下文（触发上传事件时）被赋值
        var event;

        //初始化
        uploader.init();

        //绑定文件添加到队列的事件
        uploader.bind('FilesAdded', function (uploader, files) {
            //显示添加进来的文件名
            $.each(files, function(key, value){
                var fileName = value.name,
                    html = '<li>' + fileName + '</li>';
                $fileList.append(html);
            });
        });

        //单个文件上传之后
        uploader.bind('FileUploaded', function (uploader, file, responseObject) {
            //从服务器返回图片url地址
            var url = responseObject.response;
            //先将url地址存储来，待所有图片都上传完了，再统一处理
            urls.push(url);
        });

        //全部文件上传时候
        uploader.bind('UploadComplete', function (uploader, files) {
            $.each(urls, function (key, value) {
                //重要：调用 editor.command 方法，把每一个图片的url，都插入到编辑器中
                //重要：此处的 event 即上文定义的 event 变量
                editor.command(event, 'insertHTML', "<img src='"+value+"'>");
            });

            //清空url数组
            urls = [];

            //清空显示列表
            $fileList.html('');
        });

        //上传事件
        $btnUpload.click(function(e){
            //重要：将事件参数 e 赋值给 上文定义的 event 变量
            event = e;
            uploader.start();
        });
        $("#pl").click(function(){
            var content = $("#textarea1").val();
            var username = "<?php echo $username?>";
            var id = "<?php echo $res->id?>"
            if(username==null || username==""){
                alert("请先登录");
                window.location.href="<?php echo site_url('user/login')?>";
            }else if(content.length < 10){
                alert("请输入标准的十个字");
            }else{
                $.post("<?php echo site_url('bbs/huifu')?>",{content:content,username:username,id:id},function(msg){
                    if(msg==1){
                        alert("评论成功");
                        window.location.href="<?php echo site_url('bbs/content')?>/"+id+"";
                    }
                })
            }
        });
        $("#pls").click(function(){
            var content = "<p>"+$("#textarea2").val()+"</p>";
            var username = "<?php echo $username?>";
            var id = "<?php echo $res->id?>"
            if(username==null || username==""){
                alert("请先登录");
                window.location.href="<?php echo site_url('user/login')?>";
            }else if(content.length < 10){
                alert("请输入标准的十个字");
            }else{
                $.post("<?php echo site_url('bbs/huifu')?>",{content:content,username:username,id:id},function(msg){
                    if(msg==1){
                        alert("评论成功");
                        window.location.href="<?php echo site_url('bbs/content')?>/"+id+"";
                    }
                })
            }
        });

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
</body>
</html>