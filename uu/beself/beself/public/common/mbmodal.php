<div class="m-ft">
    <p>Copyright © 2015 25to75.com保留所有权利，沪ICP备15005343号-3 </p>
</div>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="m-qx">
                    <span class="glyphicon glyphicon-remove" data-dismiss="modal"></span>
                </div>
                <div class="m-mt-a">
                    <?php
                    if(empty($avatar)){
                        echo "<img src='".base_url()."/public/image/avatar.jpg'>";
                        echo "<p><a href='".site_url('user/login')."'>登录</a></p>";
                    }else{
                        echo "<img src='".base_url()."/public/user/upload/".$avatar."'>";
                        echo "<p>".$username."</p>";
                    }
                    ?>

                </div>
            </div>
            <div class="modal-body">
                <div class="m-cd">
                    <a href="<?php echo site_url('mobile/ddlb')?>">
                        <div class="m-cd-a">
                            <p><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;订单</p>
                        </div>
                        <div class="m-cd-b">
                            <p>&gt;</p>
                        </div>
                    </a>
                </div>
                <div class="m-cd">
<!--                    红包页面入口-->
                    <a href="<?php echo site_url('mobile/getHb')?>">
                        <div class="m-cd-a">
                            <p></span>红包</p>
                        </div>
                        <div class="m-cd-b">
                            <p>&gt;</p>
                        </div>
                    </a>
                </div>
                <div class="m-cd">
                    <a href="<?php echo site_url('mobile/getProducts')?>/ring">
                        <div class="m-cd-a">
                            <p>戒指</p>
                        </div>
                        <div class="m-cd-b">
                            <p>&gt;</p>
                        </div>
                    </a>
                </div>
                <div class="m-cd">
                    <a href="<?php echo site_url('mobile/getProducts')?>/pendant">
                        <div class="m-cd-a">
                            <p>吊坠</p>
                        </div>
                        <div class="m-cd-b">
                            <p>&gt;</p>
                        </div>
                    </a>
                </div>
                <div class="m-cd">
                    <a href="<?php echo site_url('mobile/getProducts')?>/necklace">
                        <div class="m-cd-a">
                            <p>项链</p>
                        </div>
                        <div class="m-cd-b">
                            <p>&gt;</p>
                        </div>
                    </a>
                </div>
<!--                <div class="m-cd">-->
<!--                    <a href="--><?php //echo site_url('mobile/getProducts')?><!--/wristlet">-->
<!--                        <div class="m-cd-a">-->
<!--                            <p>腕饰</p>-->
<!--                        </div>-->
<!--                        <div class="m-cd-b">-->
<!--                            <p>&gt;</p>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
                <div class="m-cd">
                    <a href="<?php echo site_url('mobile/getProducts')?>/earring">
                        <div class="m-cd-a">
                            <p>耳饰</p>
                        </div>
                        <div class="m-cd-b">
                            <p>&gt;</p>
                        </div>
                    </a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>