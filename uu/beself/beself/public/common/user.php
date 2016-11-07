<div class="zh">
        <?php
        if($username!="" || $username!=null){
            echo "<a href='".site_url('user/ucenter')."'>".$username."</a>";
            echo "&nbsp;&nbsp;|&nbsp;&nbsp;<a href='".site_url('best/ddlb')."'>我的订单</a>";
        }else{
            echo "<a href='".site_url('user/login')."'>登录</a>";
            echo "&nbsp;&nbsp;|&nbsp;&nbsp;<a href='".site_url('user/register')."'>注册</a>";
        }
        ?>
</div>