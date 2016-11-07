
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<title>Beself</title>

	<!-- Meta tags -->
	<meta charset="utf-8">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
	<meta name="description" content="Premium Responsive Template for Resort and Hotel" />

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url() ?>public/css/base.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>/public/css/skeleton.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>/public/css/flexslider.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>/public/css/jquery.fancybox-1.3.4.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>/public/css/lamoon.css" />


	<!--[if IE 9]>
	<link href="<?php echo base_url()?>/public/css/ie9.css" rel="stylesheet" type="text/css" />
	<![endif]-->

	<!--[if IE 8]>
	<link href="<?php echo base_url()?>/public/css/ie8.css" rel="stylesheet" type="text/css" />
	<![endif]-->

	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons -->
	<link rel="shortcut icon" href="<?php echo base_url()?>/public/images/favicon.ico" />
	<link rel="apple-touch-icon" href="<?php echo base_url()?>/public/images/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>/public/images/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>/public/images/apple-touch-icon-114x114.png" />
</head>
<body>

<!-- Background Image -->
<img src="<?php echo base_url()?>/public/images/bg1.jpg" class="bg" alt="" />

<!-- Root Container -->
<div id="root-container" class="container">
	<div id="wrapper" class="sixteen columns">

		<!-- Banner -->
		<div id="banner">
			<div id="logo">
				<img src="<?php echo base_url()?>/public/images/lamoon-logo.png" alt="" style="width: 100px"/>
			</div>
			<div id="banner-slider" class="flexslider">
				<ul class="slides">
					<li>
						<img src="<?php echo base_url()?>/public/images/banner/1.jpg" alt="" />
						<div class="left black banner-caption">
							<h2>选择beself 做最美的自己</h2>
							<p>
								选择beself 做最美的自己选择beself 做最美的自己
							</p>
						</div>
					</li>
					<li>
						<img src="<?php echo base_url()?>/public/images/banner/2.jpg" alt="" />
						<div class="left white banner-caption">
							<h2>选择beself 做最美的自己</h2>
							<p>
								选择beself 做最美的自己选择beself 做最美的自己选择beself 做最美的自己
							</p>
						</div>
					</li>
					<li>
						<img src="<?php echo base_url()?>/public/images/banner/4.jpg" alt="" />
						<div class="right white banner-caption">
							<h2>选择beself 做最美的自己</h2>
							<p>
								选择beself 做最美的自己选择beself 做最美的自己选择beself 做最美的自己选择beself 做最美的自己
							</p>
						</div>
					</li>
				</ul>
			</div>

		</div>

		<!-- Main Menu -->
		<?php require'./public/commen/mainmenu.php' ?>
		<!-- Content -->
		<div id="content">
			<div id="intro">
				<h1><span>Welcome to Beself+</span></h1>
				<p>
					关于品牌的一段话关于品牌的一段话
					关于品牌的一段话关于品牌的一段话关于品牌的一段话
					关于品牌的一段话关于品牌的一段话关于品牌的一段话
				</p>
				<p>
					<?php
					  if($is == 0){
						  echo'<a href="'.site_url('user/registered').'" class="large gray button">立即注册</a><span>or</span><a href="reservation.html" class="large gray button">立即登录</a>';
					  }else{
						  echo "";
					  }
					?>
				</p>
			</div>
			<!--<div id="highlight" class="container section">-->
			<!--<div class="half column">-->
			<!--<div class="highlight-img">-->
			<!--<img src="images/highlight0.jpg" alt="" />-->
			<!--</div>-->
			<!--</div>-->
			<!--<div class="half column last">-->
			<!--<div class="highlight-content">-->
			<!--<h2 class="nobg">Special Promotion!</h2>-->
			<!--<p>-->
			<!--Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque-->
			<!--laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.-->
			<!--</p>-->
			<!--<p>-->
			<!--<span class="price">Only $299 / night *</span>-->
			<!--</p>-->
			<!--<p>-->
			<!--<a href="#" class="small brown button">Learn more</a>-->
			<!--</p>-->
			<!--</div>-->
			<!--</div>-->
			<!--</div>-->
<!--			推荐三个系列-->
			<div id="feature" class="container section">
				<div class="one-third column">
					<div class="one-third hover">
						<a href="<?php echo site_url('ProductList/seList') ?>/wu/NewYork">
							<div class="readmore">
								<span class="text"><span class="anchor"></span></span>
							</div>
							<p>
								<img src="<?php echo base_url()?>/public/images/a.jpg" alt="" />
							</p></a>
					</div>
					<h3><span>NewYorkϵ系列</span></h3>
					<p>
						关于系列的一句话！
					</p>
				</div>
				<div class="one-third column">
					<div class="one-third hover">
						<a href="<?php echo site_url('ProductList/seList') ?>/wu/Athena">
							<div class="readmore">
								<span class="text"><span class="anchor"></span></span>
							</div>
							<p>
								<img src="<?php echo base_url()?>/public/images/a.jpg" alt="" />
							</p></a>
					</div>
					<h3><span>雅典娜系列</span></h3>
					<p>
						关于系列的一句话！
					</p>
				</div>
				<div class="one-third column">
					<div class="one-third hover">
						<a href="<?php echo site_url('ProductList/seList') ?>/wu/wuji">
							<div class="readmore">
								<span class="text"><span class="anchor"></span></span>
							</div>
							<p>
								<img src="<?php echo base_url()?>/public/images/a.jpg" alt="" />
							</p></a>
					</div>
					<h3><span>无极系列</span></h3>
					<p>
						关于系列的一句话！
					</p>
				</div>
			</div>
<!--           推荐四款产品-->
			<div id="sub" class="container section">
				<div class="one-fourth column">
					<div class="one-fourth hover">
						<a  href="<?php echo site_url('ProductList/single') ?>/BB001">
							<div class="readmore">
								<span class="text"><span class="anchor"></span></span>
							</div>
							<p>
								<img src="<?php echo base_url()?>/public/images/3.jpg" alt="" />
							</p></a>
					</div>
					<p>
						不规则&nbsp;&nbsp;199￥
					</p>
				</div>
				<div class="one-fourth column">
					<div class="one-fourth hover">
						<a href="<?php echo site_url('ProductList/single') ?>/BB001">
							<div class="readmore">
								<span class="text"><span class="anchor"></span></span>
							</div>
							<p>
								<img src="<?php echo base_url()?>/public/images/3.jpg" alt="" />
							</p></a>
					</div>
					<p>
						不规则&nbsp;&nbsp;199￥
					</p>
				</div>
				<div class="one-fourth column">
					<div class="one-fourth hover">
						<a href="<?php echo site_url('ProductList/single') ?>/BB001">
							<div class="readmore">
								<span class="text"><span class="anchor"></span></span>
							</div>
							<p>
								<img src="<?php echo base_url()?>/public/images/3.jpg" alt="" />
							</p></a>
					</div>
					<p>
						不规则&nbsp;&nbsp;199￥
					</p>
				</div>
				<div class="one-fourth column">
					<div class="one-fourth hover">
						<a href="<?php echo site_url('ProductList/single') ?>/BB001">
							<div class="readmore">
								<span class="text"><span class="anchor"></span></span>
							</div>
							<p>
								<img src="<?php echo base_url()?>/public/images/3.jpg" alt="" />
							</p></a>
					</div>
					<p>
						不规则&nbsp;&nbsp;199￥
					</p>
				</div>
			</div>
		</div>

		<!-- Testimonial -->
		<div class="container section">
			<div id="home-testimonial" class="full-width column">
				<blockquote class="full-width">
					<p>
						关于我们的一段话关于我们的一段话关于我们的一段话关于我们的一段话关于我们的一段话
					</p>
					<cite>作者</cite>
				</blockquote>
				<blockquote class="full-width">
					<p>
						关于我们的一段话关于我们的一段话关于我们的一段话关于我们的一段话关于我们的一段话
					</p>
					<cite>作者</cite>
				</blockquote>
				<blockquote class="full-width">
					<p>
						关于我们的一段话关于我们的一段话关于我们的一段话关于我们的一段话关于我们的一段话
					</p>
					<cite>作者</cite>
				</blockquote>
			</div>
		</div>

		<!-- Footer -->
		<?php require'./public/commen/footer.php' ?>
		<!-- Copyright and Social Icons -->
		<?php require'./public/commen/copyright.php' ?>
	</div>
</div>

<!-- JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/superfish.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.cycle.lite.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/lamoon.js"></script>


</body>
</html>
