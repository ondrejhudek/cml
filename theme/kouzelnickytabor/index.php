<head>
	<title><?php echo $set_array['title'] ?></title>
	<meta charset="utf-8">
	<meta name="keywords" content="<?php echo $set_array['keywords'] ?>">
	<meta name="description" content="<?php echo $set_array['description'] ?>">
	<meta name="generator" content="CML">
	<link href="<?php echo $path; ?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $path; ?>css/styles.css" rel="stylesheet">
</head>
<body>
	<div class="head-top">
		<div class="header">
			<a href="http://www.kouzelnickytabor.cz"><img src="<?php echo $path; ?>img/smajlik.png" alt="Kouzelnický tábor" class="smajlik"></a>

			<div class="custom"><h1><?php echo $content['headline'] ?></h1></div>
			<div class="custom"><h2><?php echo $content['headline2'] ?></h2></div>
			<div class="clearfix"></div>

			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<p><?php echo $content['navbar'] ?></p>
				</div>
			</div>
		</div>
	</div>

	<div class="head-slider">
		<div class="slider-inner">
			<?php echo $content['header'] ?>
		</div>
	</div>

	<div class="content">
		<?php readfile($fn); ?>
	</div>

	<div class="footer">
		<div class="footer-inner">
			<p><?php echo $content['footer'] ?></p>
		</div>
	</div>
</body>