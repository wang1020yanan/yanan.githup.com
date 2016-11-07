<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Beself+</title>
	<link href="<?php echo base_url()?>/public/image/lg.ico" rel="icon" type="image/x-icon" />
	<meta name="baidu-site-verification" content="BRpug9CWDi" /><meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta name="keywords" content="Beself+ 珠宝，首饰，吊坠，戒指，上海巴钽珠宝有限公司" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta name="description" content="Beself+ 做自己！不将就！珠宝、首饰、吊坠、戒指官方网站均有销售--上海巴钽珠宝有限公司" />
	<link rel="stylesheet" href="<?php echo base_url()?>/public/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>/public/css/nav.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>/public/css/swiper.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>/public/css/sy.css">
	<script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo base_url()?>/public/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>/public/js/swiper.min.js"></script>
	<script src="<?php echo base_url()?>/public/js/nav.js"></script>

	<script>
		$(document).ready(function(){
			var screenwidth = window.screen.width;
			if(screenwidth < 1000){
				window.location.href="<?php echo site_url('mobile/mb_1')?>";
			}
			var mySwiper = new Swiper('#ss',{
				effect:'fade',
				loop: true,
				autoplay: 3000,
				pagination : '.swiper-pagination',
				paginationClickable :true
			});

			//用户发表留言，验证是否已登陆
			$('.lyb-tj').click(function(){
				var content = $('#message').val();
				if(content.length < 15 || content.length > 150){
					alert("留言内容字数限制在15到150");
				}else{
					$.post("<?php echo site_url('welcome/giveMsg')?>",{content:content},function(msg){
						if(msg==1){
							alert("发布成功");
							window.location.href="<?php echo site_url('welcome/index')?>";
						}else{
							alert("请先登录");
							window.location.href="<?php echo site_url('user/login')?>";
						}
					});
				}

			});
		});
	</script>

</head>
<body>
<?php require "./public/common/header.php"?>
<img src="<?php echo base_url()?>/public/image/acc.jpg" alt="Beself+" style="display: none">
<!--轮播-->
<div class="container-fluid" id="cycle" style="padding: 0;padding-top: 50px;min-width: 1230px;">
	<div class="swiper-container" id="ss" style="min-width: 1230px;">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<img src="<?php echo base_url()?>/public/image/6.jpg" alt="Beself+">
			</div>
			<div class="swiper-slide">
				<img src="<?php echo base_url()?>/public/image/5.jpg" alt="Beself+">
			</div>
			<div class="swiper-slide">
				<img src="<?php echo base_url()?>/public/image/1.jpg" alt="Beself+">
			</div>
			<div class="swiper-slide">
				<img src="<?php echo base_url()?>/public/image/2.jpg" alt="Beself+">
			</div>
			<div class="swiper-slide">
				<a href="<?php echo site_url('huod/hd_1')?>">
					<img src="<?php echo base_url()?>/public/image/3.jpg" alt="Beself+">
				</a>
			</div>
			<div class="swiper-slide">
					<img src="<?php echo base_url()?>/public/image/4.jpg">
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
</div>

<div class="container ctt" style="width: 1230px;min-width: 1230px">
	<div class="ctt-a" style="margin:40px 10px 20px 0">
			<img src="<?php echo base_url()?>/public/image/rt/1.jpg">
	</div>
	<div class="ctt-a" style="margin: 40px 10px 20px 0">
		<a href="<?php echo site_url('best/getSingleProduct/BB014')?>">
			<img src="<?php echo base_url()?>/public/image/rt/2.jpg">
		</a>
	</div>
	<div class="ctt-a" style="margin: 40px 10px 20px 0">
		<a href="<?php echo site_url('best/getSingleProduct/BB001')?>">
			<img src="<?php echo base_url()?>/public/image/rt/3.jpg"></div>
		</a>
	<div class="ctt-a" style="margin: 40px 10px 20px 0">
		<a href="<?php echo site_url('best/getSingleProduct/BB014')?>">
			<img src="<?php echo base_url()?>/public/image/rt/4.jpg">
		</a>
	</div>
</div>
<div class="container ctt" style="width: 1230px;min-width: 1230px">
	<div class="ctt-a" style="margin:0px 10px 40px 0"><img src="<?php echo base_url()?>/public/image/rt/5.jpg"></div>
	<div class="ctt-a" style="margin:0px 10px 40px 0">
		<a href="<?php echo site_url('best/getSingleProduct/BB013')?>">
			<img src="<?php echo base_url()?>/public/image/rt/6.jpg">
		</a>
	</div>
	<div class="ctt-a" style="margin: 0px 10px 40px 0">
		<a href="<?php echo site_url('best/getSingleProduct/BB020')?>">
			<img src="<?php echo base_url()?>/public/image/rt/7.jpg">
		</a>
	</div>
	<div class="ctt-a" style="margin: 0px 10px 40px 0">
		<a href="<?php echo site_url('best/getSingleProduct/BB018')?>">
			<img src="<?php echo base_url()?>/public/image/rt/8.jpg">
		</a>
	</div>
</div>
<?php require "./public/common/bbsfooter.php"?>
</body>
</html>