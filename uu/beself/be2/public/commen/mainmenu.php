<div id="menu" class="home">
    <ul id="root-menu" class="sf-menu">
        <li>
            <a href="<?php echo base_url() ?>" class="active">首页</a>
        </li>
        <li>
            <a href="<?php echo site_url('ProductList/listFen')?>/ring/wu">戒指</a>
            <ul>
                <li>
                    <a href="<?php echo site_url('ProductList/listFen')?>/ring/NewYork"><span>&nbsp;&nbsp;&nbsp;- </span>NewYork</a>
                </li>
                <li>
                    <a href="<?php echo site_url('ProductList/listFen')?>/ring/Athena"><span>&nbsp;&nbsp;&nbsp;- </span>雅典娜</a>
                </li>
                <li>
                    <a href="<?php echo site_url('ProductList/listFen')?>/ring/wuji"><span>&nbsp;&nbsp;&nbsp;- </span>无极</a>
                </li>
                <li>
                    <a href="<?php echo site_url('ProductList/listFen')?>/ring/xp"><span>&nbsp;&nbsp;&nbsp;- </span>Xπ</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="<?php echo site_url('ProductList/listFen')?>/necklace/wu">项链</a>
            <ul>
                <li>
                    <a href="<?php echo site_url('ProductList/listFen')?>/necklace/NewYork"><span>&nbsp;&nbsp;&nbsp;- </span>NewYork</a>
                </li>
                <li>
                    <a href="<?php echo site_url('ProductList/listFen')?>/necklace/Athena"><span>&nbsp;&nbsp;&nbsp;- </span>雅典娜</a>
                </li>
                <li>
                    <a href="<?php echo site_url('ProductList/listFen')?>/necklace/wuji"><span>&nbsp;&nbsp;&nbsp;- </span>无极</a>
                </li>
            </ul>
        </li>
<!--        <li>-->
<!--            <a href="--><?php //echo site_url('ProductList/listFen')?><!--/necklace/wu">����</a>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <a href="gallery.html"><span>&nbsp;&nbsp;&nbsp;- </span>NewYork</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="gallery-4-columns.html"><span>&nbsp;&nbsp;&nbsp;- </span>�ŵ���</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="gallery-4-columns.html"><span>&nbsp;&nbsp;&nbsp;- </span>�޼�</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </li>-->
        <li>
            <a href="<?php echo site_url('ProductList/listFen')?>/earring/wu">耳饰</a>
            <ul>
                <li>
                    <a href="<?php echo site_url('ProductList/listFen')?>/earring/NewYork"><span>&nbsp;&nbsp;&nbsp;- </span>NewYork</a>
                </li>
                <li>
                    <a href="<?php echo site_url('ProductList/listFen')?>/earring/Athena"><span>&nbsp;&nbsp;&nbsp;- </span>雅典娜</a>
                </li>
                <li>
                    <a href="<?php echo site_url('ProductList/listFen')?>/earring/wuji"><span>&nbsp;&nbsp;&nbsp;- </span>无极</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo site_url('ProductList/listFen')?>/pendant/wu">吊坠</a>
            <ul>
                <li>
                    <a href="<?php echo site_url('ProductList/listFen')?>/pendant/NewYork"><span>&nbsp;&nbsp;&nbsp;- </span>NewYork</a>
                </li>
                <li>
                    <a href="<?php echo site_url('ProductList/listFen')?>/pendant/Athena"><span>&nbsp;&nbsp;&nbsp;- </span>雅典娜</a>
                </li>
                <li>
                    <a href="<?php echo site_url('ProductList/listFen')?>/pendant/wuji"><span>&nbsp;&nbsp;&nbsp;- </span>无极</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;">账户</a>
            <ul>
                <li>
                    <a href="elements/layouts.html"><span>&nbsp;&nbsp;&nbsp;- </span>购物袋</a>
                </li>
                <li>
                    <a href="elements/headings.html"><span>&nbsp;&nbsp;&nbsp;- </span>订单</a>
                </li>
                <li>
                    <a href="<?php
                    if($is == 0){
                        echo site_url('user/login');
                    }else{
                        echo '';
                    }
                    ?>"><span>&nbsp;&nbsp;&nbsp;- </span>
                        <?php
                        if($is == 0 ){
                            echo'登录';
                        }
                        else{
                            echo $uname;
                        }
                        ?>
                    </a>
                </li>
                <li>
                    <a href="<?php
                    if($is == 0){
                        echo site_url('user/registered');
                    }else{
                        echo site_url('user/out');
                    }
                    ?>">

                        <span>&nbsp;&nbsp;&nbsp;- </span>
                        <?php
                        if($is ==0){
                            echo'注册';
                        }else{
                            echo "退出";
                        }
                        ?>
                    </a>
                </li>
                <!--<li>-->
                <!--<a href="elements/blockquotes.html"><span>&nbsp;&nbsp;&nbsp;- </span>Block Quotes</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--<a href="elements/tabs-tables.html"><span>&nbsp;&nbsp;&nbsp;- </span>Tabs and Tables</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--<a href="elements/messageboxes.html"><span>&nbsp;&nbsp;&nbsp;- </span>Message Boxes</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--<a href="javascript:;"><span>&nbsp;&nbsp;&nbsp;- </span>One More Level</a>-->
                <!--<ul>-->
                <!--<li>-->
                <!--<a href="javascript:;"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- </span>Sample Item#1</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--<a href="javascript:;"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- </span>Sample Item#2</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--<a href="javascript:;"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- </span>Sample Item#3</a>-->
                <!--</li>-->
                <!--</ul>-->
                <!--</li>-->
            </ul>
        </li>
        <li>
            <a href="facilities.html">关于我们</a>
        </li>
        <li>
            <a href="contact.html">联系我们</a>
        </li>
        <li>
            <a id="purchase" href="http://www.sucaihuo.com" title="Purchase this template">社区</a>
        </li>
    </ul>
</div>
