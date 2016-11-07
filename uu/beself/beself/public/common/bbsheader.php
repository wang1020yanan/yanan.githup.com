<!--头部-->
<div class="nav">
    <div class="nav-a">
        <div class="nav-a-a">
            <P><a href="#"><span>
                 <!--<img src="http://www.25to75.com//public/image/mb.svg" style="width: 50px">-->
             </span>BESELF+</a></P>
        </div>
        <div class="nav-a-b">
            <p><a href="<?php echo site_url('bbs/sqone')?>">社区</a></p>
        </div>
        <div class="nav-a-b" style="text-align: center">
            <p><a href="http://www.25to75.com/">商城</a></p>
        </div>
        <div class="nav-a-b">
            <P>
                <?php
                if(empty($username)){
                    echo " <a href='".site_url('user/login')."'>登录</a><span style='font-size: 16px'>|</span><a href=".site_url('user/register')."''>注册</a>";
                }else{
                    echo "<a href='".site_url('user/ucenter')."'>$username</a>";
                }
                ?>

            </P>
        </div>
    </div>
</div>
<div class="tc"></div>