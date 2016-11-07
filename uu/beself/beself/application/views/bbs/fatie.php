<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="<?php echo base_url()?>/public/image/lg.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/bbs/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/bbs/css/pagethree.css" />
    <script src="<?php echo base_url()?>/public/bbs/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/bbs/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/public/bbs/bj/css/wangEditor-1.3.11.css">

    <script>
        $(document).ready(function(){
            $("#send").click(function(){
                var title = $("#title").val();
                var styler = $("#styler").val();
                var content = $("#textarea1").val();
                if(title.length < 6 || title.length > 30){
                    alert("标题长度限制在6到20个字之间");
                }else if(styler=="选择版块"){
                    alert("请先发帖版块");
                }else if(content.length < 10){
                    alert("禁止水贴，不能小于10个字");
                }else{
                    $.post("<?php echo site_url('bbs/dosend')?>",{title:title,styler:styler,content:content},function(msg){
                        if(msg==0){
                            alert("请先登录");
                            window.location.href="<?php echo site_url('user/login')?>";
                        }else{
                            alert("发帖成功");
                            window.location.href="<?php echo site_url('bbs/sqone')?>/"+styler+"";
                        }
                    });
                }
            });
        });


    </script>
</head>
<body>
<?php require "./public/common/bbsheader.php"?>
<!--发表框-->
<div class="fb-zt">
    <div class="zt-aa">
        <div class="zt-bt">
            <p>发表新主题</p>
        </div>
        <div class="zt-bb" >
            <div class="zt-bb-a">
                <input type="text" id="title" placeholder="请输入标题">
            </div>
            <div class="zt-cc">
                <select id="styler">
                    <option selected>选择版块</option>
                    <option value="ring">戒指</option>
                    <option value="pendant">吊坠</option>
                    <option value="necklace">项链</option>
                    <option value="wristlet">腕饰</option>
                    <option value="earrings">耳饰</option>
                </select>
            </div>
            <div style="clear:both"></div>
        </div>
        <div style="width: 90%;margin: 20px auto">
            <div id="uploadContainer">
                <input type="button" value="选择文件" id="btnBrowse"/>
                <input type="button" value="上传文件" id="btnUpload">
                <ul id="fileList"></ul>
            </div>

            <textarea id='textarea1' style='height:500px; width:100%;'></textarea>
        </div>
        <button class="fb-an" id="send">发表帖子</button>
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
            flash_swf_url: 'plupload/Moxie.swf',
            sliverlight_xap_url: 'plupload/Moxie.xap',
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
    });
</script>
</body>
</html>