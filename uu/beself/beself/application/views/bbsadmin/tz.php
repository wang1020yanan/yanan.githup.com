<!DOCTYPE html>
<html>
<head>
    <title>帖子列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 Bootstrap -->
    <link href="<?php echo base_url()?>/public/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>

    <style>
        #fy a,strong{
            width: 40px;
            height: 30px;
            border: 1px solid #F0F0F0;
            text-decoration: none;
            line-height: 30px;
            display: block;
            float: left;
            text-align: center;
            margin-left: 3px;
            color: #858585;
        }
        #fy strong{
            border: 1px solid #ff9801;
        }
        #fy div{
            float: right;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <h1>Beself+社区管理</h1>
        </div>
        <div class="col-md-2">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="#">用户管理</a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo site_url('bbsadmin/tz')?>/ring">戒指版块</a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo site_url('bbsadmin/tz')?>/pendant">吊坠版块</a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo site_url('bbsadmin/tz')?>/wristlet">腕饰版块</a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo site_url('bbsadmin/tz')?>/necklace">项链版块</a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo site_url('bbsadmin/tz')?>/earrings">耳饰版块</a>
                </li>
                <li class="list-group-item">
                    <a href="#">批量处理</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>用户名</th>
                    <th>标题</th>
                    <th>板块</th>
                    <th>状态</th>
                    <th>加精</th>
                    <th>置顶</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($res as $vo):?>
                    <tr>
                        <td><?php echo $vo->username?></td>
                        <td><?php echo $vo->title?></td>
                        <td><?php echo $vo->styler?></td>
                        <td>
                            <?php
                            if(empty($vo->jing)){

                            }else{
                                echo "<img src='".base_url()."/public/bbs/image/rt.png'>";
                            }
                            ?>
                        </td>
                        <td><a href="<?php echo site_url('bbsadmin/jing')?>/<?php echo $vo->styler?>/<?php echo $vo->id?>">加精</a></td>
                        <td><a href="<?php echo site_url('bbsadmin/zd')?>/<?php echo $vo->styler?>/<?php echo $vo->id?>">置顶</a></td>
                        <td>
                            <a href="<?php echo site_url('bbsadmin/st')?>/<?php echo $vo->styler?>/<?php echo $vo->id?>">删除</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            <div class="col-md-12" id="fy">
                <?php echo $fenye?>
            </div>

        </div>
    </div>
</div>
</body>
</html>