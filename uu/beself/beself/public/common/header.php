<nav>
    <div class="container">
            <div class="col-md-12">
                <div class="nav-logo">
                    <a href="<?php echo site_url('welcome/index')?>">
                        <img src="<?php echo base_url()?>/public/image/mb.svg" style="width: 50px" />
                    </a>
                </div>

                <div class="nav-a">
                    <span id="yone-1">戒指</span>
                </div>
                <div class="nav-a">
                    <span id="yone-2">项链</span>
                </div>
                <div class="nav-a">
                    <span id="yone-3">腕饰</span>
                </div>
                <div class="nav-a">
                    <span id="yone-4">耳饰</span>
                </div>
                <div class="nav-a">
                    <span id="yone-5">吊坠</span>
                </div>
                <div class="nav-a">
                    <span><a class="ssq" href="<?php echo site_url('bbs/sqone')?>" style="text-decoration: none">社区</a></span>
                </div>
                <div class="nav-a mmm">
                    <img src="<?php echo base_url()?>/public/image/search.svg" style="height: 1.7em;cursor: pointer" id="search" />
                </div>
                <div class="nav-a mmm">
                    <a data-toggle="collapse" href="#collapseOne" >
                        <img src="<?php echo base_url()?>/public/image/gw.svg" style="height: 1.7em" />
                    </a>
                    <div id="collapseOne" class="panel-collapse collapse" style="margin-top: 15px">

                        <div class="col-md-12">
                                   <!--                            尖角-->
                            <span style="width: 0;height: 0;position: absolute;border: 13px solid transparent;border-bottom-color: black;left: 65px;top: -26px;opacity:0.5;display: block"></span>
                            <a href="<?php echo site_url('best/gwc')?>">购物袋</a>
                        </div>
                        <div class="col-md-12">
                            <a href="<?php echo site_url('best/ddlb')?>">订单</a>
                        </div>
                        <div class="col-md-12">
                            账户
                            <a href="<?php echo site_url('user/ucenter')?>">
                                <?php if($username!="" || $username!=null) {echo "：".$username; } ?>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <?php
                            if($username!="" || $username!=null){
                                echo "<a href='".site_url('welcome/tuichu')."'>退出</a>";
                            }else{
                                echo "<a href='".site_url('user/login')."'>登陆</a>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="nav-b">
                    <div class="col-md-10">
                        <form action="<?php echo site_url('best/search')?>" method="post">
                        <img src="<?php echo base_url()?>/public/image/search.svg" style="height: 1.7em" />
                        <input type="search" name="search" id="sou" placeholder="搜索：改变世界" />
                        </form>
                    </div>
                    <div class="col-md-2">
                        <span id="xx" style="cursor: pointer">X</span>
                    </div>
                </div>
            </div>

    </div>
</nav>

<div class="menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="y-1">
                <div class="col-md-2">
                    <div class="col-md-12">
                        <a class="xlm" href="<?php echo site_url('best/getProducts')?>/ring/NewYork">New &nbsp; York</a>
                    </div>
					<div class="col-md-12">
                        <a class="xlm" href="<?php echo site_url('best/getProducts')?>/ring/Athena">雅典娜</a>
                    </div>
                    <div class="col-md-12">
                        <a class="xlm" href="<?php echo site_url('best/getProducts')?>/ring/wuji">无极</a>
                    </div>
                    <div class="col-md-12">
                        <a class="xlm" href="<?php echo site_url('best/getProducts')?>/ring/xp">Xπ</a>
                    </div>
                </div>
<!--                右侧产品展示-->
                <div class="col-md-10">
                    <div class="col-md-4" style="text-align: center">
                        <a href="http://www.25to75.com/best/getSingleProduct/BB035">
                            <img src="http://www.25to75.com//public/uploads/5633477bca1f11.jpg" style="height: 178px">
                        </a>
                    </div>
                    <div class="col-md-4" style="text-align: center">
                        <a href="http://www.25to75.com/best/getSingleProduct/BB029">
                            <img src="http://www.25to75.com//public/uploads/56321c46be6661.jpg" style="height: 178px">
                        </a>
                    </div>
                    <div class="col-md-4" style="text-align: center">
                        <a href="http://www.25to75.com/best/getSingleProduct/BB039">
                            <img src="http://www.25to75.com//public/uploads/563735fcc52951.jpg" style="height: 178px">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="y-2">
                <div class="col-md-2">
                    <div class="col-md-12">
                        <a class="xlm" href="<?php echo site_url('best/getProducts')?>/necklace/NewYork">New &nbsp; York</a>
                    </div>
                    <div class="col-md-12">
                        <a class="xlm" href="<?php echo site_url('best/getProducts')?>/necklace/Athena">雅典娜</a>
                    </div>
                    <div class="col-md-12">
                        <a class="xlm" href="<?php echo site_url('best/getProducts')?>/necklace/wuji">无极</a>
                    </div>
                </div>
                <div class="col-md-10">
<!--                    右侧产品展示-->
                        <div class="col-md-4" style="text-align: center">
                            <a href="http://www.25to75.com/best/getSingleProduct/NN001">
                                <img src="http://www.25to75.com//public/uploads/562de09833db51.jpg" style="height: 178px">
                            </a>
                        </div>
                        <div class="col-md-4" style="text-align: center">
                            <a href="http://www.25to75.com/best/getSingleProduct/NN016">
                                <img src="http://www.25to75.com//public/uploads/562dd8737b9601.jpg" style="height: 178px">
                            </a>
                        </div>
                        <div class="col-md-4" style="text-align: center">
                            <a href="http://www.25to75.com/best/getSingleProduct/NN017">
                                <img src="http://www.25to75.com//public/uploads/563345b1d62dd1.jpg" style="height: 178px">
                            </a>
                        </div>
                </div>
            </div>
            <div class="col-md-12" id="y-3">
                <div class="col-md-2">

                </div>
                <div class="col-md-10"></div>
            </div>
            <div class="col-md-12" id="y-4">
                <div class="col-md-2">
                    <div class="col-md-12">
                        <a class="xlm" href="<?php echo site_url('best/getProducts')?>/earring/wuji">无极</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <!--                右侧产品展示-->
                        <div class="col-md-4" style="text-align: center">
                            <a href="http://www.25to75.com/best/getSingleProduct/EE001">
                                <img src="http://www.25to75.com//public/uploads/5636396e084e11.jpg" style="height: 178px">
                            </a>
                        </div>
                </div>
            </div>
            <div class="col-md-12" id="y-5">
                <div class="col-md-2">
                    <div class="col-md-12">
                        <a class="xlm" href="<?php echo site_url('best/getProducts')?>/pendant/wuji">无极</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <!--                右侧产品展示-->
                    <div class="col-md-4" style="text-align: center">
                        <a href="http://www.25to75.com/best/getSingleProduct/NN018">
                            <img src="http://www.25to75.com//public/uploads/5636385b59c691.jpg" style="height: 178px">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>