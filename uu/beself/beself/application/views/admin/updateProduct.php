<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>添加产品</title>
    <link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/kindeditor/themes/default/default.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/public/kindeditor/plugins/code/prettify.css" />
    <script charset="utf-8" src="<?php echo base_url()?>/public/kindeditor/kindeditor.js"></script>
    <script charset="utf-8" src="<?php echo base_url()?>/public/kindeditor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="<?php echo base_url()?>/public/kindeditor/plugins/code/prettify.js"></script>
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>/public/js/uploadPreview.js"></script>
    <style>
        body{
            font-weight: bold;
        }
        #editor .col-md-12{
            margin-top: 20px;
        }
        #editor input,select{
            width: 200px;
            height: 30px;
        }
        select{
            margin-left: -5px;
        }
        #imgdiv{
            border: 1px solid #C0C0C0;width: 175px;height: 210px;
            text-align: center;padding: 0;
        }
        #imgdiv2{
            border: 1px solid #C0C0C0;width: 175px;height: 210px;
            text-align: center;padding: 0;
        }
        #imgdiv3,#imgdiv4,#imgdiv5,#imgdiv6,#imgdiv7,#imgdiv8{
            border: 1px solid #C0C0C0;width: 175px;height: 90px;
            text-align: center;padding: 0;
        }

        #imgShow3,#imgShow4,#imgShow5,#imgShow6,#imgShow7,#imgShow8{
            width: 170px;
        }
        #imgdiv img{
            width: 170px;
        }
        #imgdiv2 img{
            width: 170px;
        }
    </style>
    <script>
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="content1"]', {
                cssPath : '<?php echo base_url()?>/public/kindeditor/plugins/code/prettify.css',
                uploadJson : '<?php echo base_url()?>/public/kindeditor/upload_json.php',
                fileManagerJson : '<?php echo base_url()?>/public/kindeditor/file_manager_json.php',
                allowFileManager : true,
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                }
            });
            var editor2 = K.create('textarea[name="content2"]', {
                cssPath : '<?php echo base_url()?>/public/kindeditor/plugins/code/prettify.css',
                uploadJson : '<?php echo base_url()?>/public/kindeditor/upload_json.php',
                fileManagerJson : '<?php echo base_url()?>/public/kindeditor/file_manager_json.php',
                allowFileManager : true,
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });

        window.onload = function () {
            new uploadPreview({ UpBtn: "pic", DivShow: "imgdiv", ImgShow: "imgShow" });
            new uploadPreview({ UpBtn: "pic2", DivShow: "imgdiv2", ImgShow: "imgShow2" });
        }
    </script>
</head>
<body>
<div class="container" id="editor">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6" style="font-weight: bold;font-size: 1.5em">添加产品</div>
            <div class="col-md-6" style="font-weight: bold;text-align: right">
                <a href="<?php echo site_url('admin/products')?>">返回首页</a>
            </div>
        </div>
        <div class="col-md-12" style="border: 2px solid #858585">
            <form name="example" method="post" action="<?php echo site_url('admin/updateProduct')?>/<?php echo $res->number?>" enctype="multipart/form-data">
                <div class="col-md-4" style="padding: 0">
                    <div class="col-md-12"><label>产品编号：<input type="text" name="number" id="number" value="<?php echo $res->number?>" ></label></div>
                    <div class="col-md-12"><label>产品名称：<input type="text" name="name" id="name" value="<?php echo $res->name?>" ></label></div>
                    <div class="col-md-12">
                        <label>
                            产品种类：
                            <select name="types" id="types">
                                <option
                                    <?php
                                    if($res->types=='ring'){
                                        echo "selected";
                                    }
                                    ?>
                                    value="ring">戒指</option>
                                <option
                                    <?php
                                    if($res->types=='necklace'){
                                    echo "selected";
                                    }
                                    ?>
                                    value="necklace">项链
                                </option>
                                <option
                                    <?php
                                    if($res->types=='earring'){
                                        echo "selected";
                                    }
                                    ?>
                                    value="earring">耳饰</option>
                                <option
                                    <?php
                                    if($res->types=='pendant'){
                                        echo "selected";
                                    }
                                    ?>
                                    value="pendant">吊坠</option>
                                <option
                                    <?php
                                    if($res->types=='wristlet'){
                                        echo "selected";
                                    }
                                    ?>
                                    value="wristlet">腕饰</option>
                            </select>
                        </label>
                    </div>
                    <div class="col-md-12"><label>产品系列：<input type="text" name="series" id="series" value="<?php echo $res->series?>" ></label></div>
                    <div class="col-md-12"><label>产品价格：<input type="text" name="price" id="price" value="<?php echo $res->price?>" ></label></div>
                    <div class="col-md-12"><label>产品材质：<input type="text" name="material" id="material" value="<?php echo $res->material?>"></label></div>
                    <div class="col-md-12"><label>产品石料：<input type="text" name="stone" id="stone" value="<?php echo $res->stone?>" ></label></div>
                </div>
                <div class="col-md-8" style="margin-top: 20px">
                    <div class="col-md-6" style="padding: 0">
                        <div class="col-md-4" style="padding: 0">产品购买图：</div>
                        <div class="col-md-8" style="padding: 0"><label><input type="file" name="pic" id="pic" ></label></div>
                        <div class="col-md-8 col-md-offset-4" id="imgdiv">
                            <img src="<?php echo base_url()?>/public/uploads/<?php echo $res->pic?>" id="imgShow" />
                        </div>
                    </div>
                    <div class="col-md-6" style="padding: 0">
                        <div class="col-md-4" style="padding: 0">产品列表图：</div>
                        <div class="col-md-8" style="padding: 0"><label><input type="file" name="pic2" id="pic2" ></label></div>
                        <div class="col-md-8 col-md-offset-4" id="imgdiv2">
                            <img src="<?php echo base_url()?>/public/uploads/<?php echo $res->pic2?>" id="imgShow2" />
                        </div>
                    </div>
                </div>

                <div class="col-md-12"><label>产品详情：</label></div>
                <div class="col-md-12" style="margin-bottom: 50px">
                    <textarea name="content2" style="width:100%;height:400px;visibility:hidden;"><?php echo $res->htmlData2?></textarea>
                </div>

                <div class="col-md-12"><label>产品介绍：</label></div>
                <div class="col-md-12" style="margin-bottom: 50px">
                    <textarea name="content1" style="width:100%;height:400px;visibility:hidden;"><?php echo $res->htmlData?></textarea>
                    <br />
                    <input type="submit" name="button" value="提交内容" /> (提交快捷键: Ctrl + Enter)
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

