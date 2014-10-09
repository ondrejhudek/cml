<head>
	<title><?php echo $set_array['title'] ?></title>
	<meta charset="utf-8">
	<meta name="keywords" content="<?php echo $set_array['keywords'] ?>">
	<meta name="description" content="<?php echo $set_array['description'] ?>">
	<meta name="generator" content="CML">
	<link href="<?php echo $path; ?>css/styles.css" rel="stylesheet">
</head>
<body>
	<div class="container">

		<div class="header">
			<div class="headline">
				<div class="headline-inner">
					<h1><?php echo $content['headline'] ?></h1>
				</div>
			</div>
		</div>

		<div class="wrapper">
			<div class="content">
				<div class="content-inner">
					<?php readfile($fn); ?>
				</div>
			</div>

			<div class="right">
				<div class="right-top"></div>
				<div class="right-middle">
					<div class="right-inner">
						<?php echo $content['rightBox'] ?>
					</div>
				</div>
				<div class="right-bottom"></div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="footer">
			<p><?php echo $content['footer'] ?></p>
		</div>

	</div>
</body>