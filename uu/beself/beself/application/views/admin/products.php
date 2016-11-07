<!DOCTYPE html>
<html>
<head>
    <title>产品列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 Bootstrap -->
    <link href="<?php echo base_url()?>/public/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>
<base target="_blank" />
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
            <h1>Beself+后台控制管理</h1>
        </div>
        <div class="col-md-2">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="<?php echo site_url('admin/countUsers')?>">用户管理</a>
                    </li>
                    <li class="list-group-item">
                        <a href="<?php echo site_url('admin/orders')?>">订单管理</a>
                    </li>
                    <li class="list-group-item">
                        <a href="<?php echo site_url('admin/products')?>">产品管理</a>
                    </li>
                    <li class="list-group-item">
                        <a href="<?php echo site_url('admin/addproduct')?>">产品添加</a>
                    </li>
                </ul>
        </div>
        <div class="col-md-10">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>名称</th>
                    <th>系列</th>
                    <th>种类</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($res as $vo):?>
                <tr>
                    <td><?php echo $vo->number?></td>
                    <td><?php echo $vo->name?></td>
                    <td><?php echo $vo->series?></td>
                    <td><?php echo $vo->types?></td>
                    <td>
                        <a href="<?php echo site_url('admin/productMsg')?>/<?php echo $vo->number?>">编辑</a>|
                        <a href="<?php echo site_url('admin/delProduct')?>/<?php echo $vo->id?>">删除</a>&nbsp;&nbsp;
                    </td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            <!--分页-->
            <div class="fyrq" id="fy">
                <?php echo $fy?>
            </div>
        </div>
    </div>
</div>
</body>
</html>