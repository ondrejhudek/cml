<head>
	<title><?php echo $set_array['title'] ?></title>
	<meta charset="utf-8">
	<meta name="keywords" content="<?php echo $set_array['keywords']; ?>">
	<meta name="description" content="<?php echo $set_array['description']; ?>">
	<meta name="generator" content="CML">
	<link href="<?php echo $path; ?>css/styles.css" rel="stylesheet">
</head>
<body>

	<div class="container">

		<div class="navbar">
		<?php echo "<!--"; ?>
			<div class="nav-left"></div>
			<div class="nav">
				
			</div>
			<div class="nav-right"></div>
			<div class="clear"></div>
		<?php echo "-->"; ?>
		</div>

		<div class="header">
			<a href="http://www.divadlokouzel.cz"><img src="<?php echo $path; ?>img/logo.png" alt="Divadlo kouzel"></a>
		</div>

		<div class="wrapper">
			<div class="content">
				<div class="headline"><h1><?php echo $content['headline'] ?></h1></div>

				<?php readfile($fn); ?>
			</div>

			<div class="right">
				<div class="inner-right">
					<?php echo $content['rightBox'] ?>
				</div>
			</div>
			<div class="clear"></div>

		</div>

		<div class="footer">
			<p><?php echo $content['footer'] ?></p>
		</div>

	</div>

</body>