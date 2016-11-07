
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<title>Photo Gallery - Lamoon</title>

	<!-- Meta tags -->
	<meta charset="utf-8">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
	<meta name="description" content="Premium Responsive Template for Resort and Hotel" />

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url()?>/public/css/base.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>/public/css/skeleton.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>/public/css/flexslider.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>/public/css/jquery.nailthumb.1.1.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>/public/css/isotope.css" />
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
		<div id="sub-banner">
			<div id="logo">
				<img src="<?php echo base_url()?>/public/images/lamoon-logo.png" alt="" />
			</div>
			<img src="<?php echo base_url()?>/public/images/banner/sub-banner4.jpg" alt="" />
		</div>

		<!-- Main Menu -->
		<?php require('./public/commen/mainmenu.php') ?>
		<!-- Content -->
		<div id="content">
			<div id="intro">
<!--				产品信息-->
				<h1><span><?php echo $single->name ?>&nbsp;<?php echo $single->price ?>￥</span></h1>
			</div>
<!--			产品尺寸选择-->
			<div class="container section">
				<div class="one-third column">
					<img src="<?php echo base_url()?>/public/uploads/<?php echo $single->pic2 ?>" alt="" style="width: 260px;height: 170px"/>
				</div>
				<div class="two-third column last">
					<h3 class="nobg"><?php echo $single->name ?>&nbsp;<?php echo $single->number ?></h3>
					<p>
						一段描述产品的话一段描述产品的话一段描述产品的话一段描述一段描述产品的话一段描述产品的话一段描述产品的话
						一段描述产品的话一段描述产品的话产品的话一段描述产品的话一段描述产品的话一段描述产品的话一段描述产品的话
					</p>
					<p>
						<select name="country" id="country" class="validate[required]">
							<option value="">- 选择尺寸 -</option>
							<option value="">- 13 -</option>
							<option value="">- 14 -</option>
							<option value="">- 15 -</option>
							<option value="">- 16-</option>
							<option value="">- 17 -</option>
							<option value="">- 18 -</option>
							<option value="">- 19 -</option>
						</select>
						&nbsp;
						<a href="" class="small steel-blue button">立即购买</a>
					</p>
				</div>
			</div>

			<div class="container section">
				&nbsp这里是产品海报图
				<?php echo $single->htmlData?>
			</div>
		</div>

		<!-- Footer -->
		<?php require('./public/commen/footer.php') ?>
		<!-- Copyright and Social Icons -->
		<?php require('./public/commen/copyright.php') ?>


	</div>
</div>

<!-- JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/superfish.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.cycle.lite.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.nailthumb.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.isotope.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/lamoon.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/public/scripts/lamoon-gallery.js"></script>

</body>
</html>





