<head>
	<title><?php echo $set_array['title'] ?></title>
	<meta charset="utf-8">
	<meta name="keywords" content="<?php echo $set_array['keywords'] ?>">
	<meta name="description" content="<?php echo $set_array['description'] ?>">
	<meta name="generator" content="CML">
	<link href="<?php echo $path; ?>css/styles.css" rel="stylesheet">
</head>
<body>

	<div id="header" class="wrapper">
		<h1><?php echo $content['headline'] ?></h1>
	</div>

	<div id="head-banner">
		<div id="banner-inner" class="wrapper">
			<?php echo $content['header'] ?>
		</div>
	</div>

	<div id="content" class="wrapper">
		<?php readfile($fn); ?>
	</div>

	<div id="footer" class="wrapper">
		<p><?php echo $content['footer'] ?></p>
	</div>

</body>