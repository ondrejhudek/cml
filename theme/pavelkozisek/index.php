<head>
	<title><?php echo $set_array['title'] ?></title>
	<meta charset="utf-8">
	<meta name="keywords" content="<?php echo $set_array['keywords']; ?>">
	<meta name="description" content="<?php echo $set_array['description']; ?>">
	<meta name="generator" content="CML">
	<meta name="author" content="Pavel Kožíšek">
	<meta name="robots" content="index, follow">

	<link href="<?php echo $path; ?>css/styles.css" rel="stylesheet">

	<script language="javascript" type="text/javascript" src="<?php echo $path; ?>js/jquery.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo $path; ?>js/nivo.slider.js"></script>

	<script type="text/javascript">
	function scrollToTop(){
		jQuery("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	}
	</script>

	<script type="text/javascript"> 
	var $j = jQuery.noConflict(); 
	jQuery(document).ready(function ($){
		$j("#slider").nivoSlider({
			effect: "sliceUpDown",
			slices: 15,
			boxCols: 8,
			boxRows: 4,
			animSpeed: 1000,
			pauseTime: 3000,
			captionOpacity: 1
		});
	});
	</script>
</head>
<body>

	<div class="container">
	
		<div class="sitename">				    	             	   				            
	        <a href="http://www.pavelkozisek.cz"><h1><span><?php echo $content['headline']; ?></span></h1></a>
	    </div>
		
		<div class="title">	
			<img src="<?php echo $path; ?>img/title.png" width="29" height="393" alt="Pavel Kožíšek">
		</div>
		
		<div id="slide-top"></div>
		
		<div id ="slide">
			<div id="slider" class="nivoSlider"> 
				<img src="<?php echo $path; ?>img/slide1.jpg" alt="image1" title="<?php echo $content['slider1'] ?>">
				<img src="<?php echo $path; ?>img/slide2.jpg" alt="image2" title="<?php echo $content['slider2'] ?>">
				<img src="<?php echo $path; ?>img/slide3.jpg" alt="image3" title="<?php echo $content['slider3'] ?>">
			</div>
			<div id="newsflash">
				<p><?php echo $content['header'] ?></p>
			</div>
		</div>

		<div class="wrapper">
			<div class="main">
				<?php readfile($fn); ?>
			</div>
		</div>
		
		<div class="footer">
			<div class="ft_inner">
				<p><?php echo $content['footer'] ?></p>
			</div>
			<div class="top_button">
				<a href="#" onclick="scrollToTop();"><img src="<?php echo $path; ?>img/top.png" width="30" height="30" alt="top"></a>
			</div>
		</div>
	
	</div>

</body>