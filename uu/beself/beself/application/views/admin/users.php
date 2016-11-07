<!DOCTYPE html>
<html>
<head>
    <title>用户管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 Bootstrap -->
    <link href="<?php echo base_url()?>/public/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>

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
            <li class="list-group-item">
                <p>考虑到用户隐私，这里不给予用户详细信息，只提供当前所有用户总量</p>
            </li>
            <li class="list-group-item">
                <p>用户总量：<?php echo $nums?></p>
            </li>
        </div>
    </div>
</div>
</body>
</html>