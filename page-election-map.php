<?php // custom template for 2016 election map feature ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="<?php echo get_the_excerpt(); ?>">
    <meta property="fb:pages" content="274083159322175" />
    <meta property="og:image" content="<?php echo get_bloginfo('template_directory');?>/election-map/election-map-preview.png">
	<meta property="og:title" content="Yale's Take on the Election, Mapped">
    <link rel="shortcut icon" href="http://thepolitic.org/wp-content/uploads/2016/06/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_bloginfo('template_directory');?>/images/touchicon.png" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <title><?php if (is_front_page()): ?>
        <?php bloginfo('name'); ?> | <?php bloginfo('description') ?>
        <?php else: ?>
            <?php wp_title(''); ?> | <?php bloginfo('name'); ?>
        <?php endif; ?>
    </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
</head>

<body style="padding-top: 65px;">
	<?php //load navbar from navbar.php
	 get_template_part( 'navbar' ); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Yale's Take on the Election, Mapped</h1>
				<h2><i>The Politic</i> asked Yale students from all fifty states to share their impressions of the 2016 presidential election back home. Click on the map to read student reflections and predictions for each state.</h2>
			</div>
		</div>
		<div class="row page-content" >
			<div class="col-md-12">
				<div class="lg-map-wrapper" data-map="<?php echo get_bloginfo('template_directory');?>/election-map/lg-map/usa.js">
					<div id="lg-map"></div>
					<div class="lg-map-text"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="background-color: #ffffffe6;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title" id="myModalLabel">Modal title</h3>
				</div>
				<div class="modal-body">
				</div>
			</div>
		</div>
	</div>
	<?php get_footer(); ?>
	<script src="<?php echo get_bloginfo('template_directory');?>/jquery.csv.min.js"></script>
	<link href="<?php echo get_bloginfo('template_directory');?>/election-map/lg-map/map.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo get_bloginfo('template_directory');?>/election-map/lg-map/raphael.js" type="text/javascript"></script>
	<script src="<?php echo get_bloginfo('template_directory');?>/election-map/lg-map/scale.raphael.js" type="text/javascript"></script>
	<script src="<?php echo get_bloginfo('template_directory');?>/election-map/lg-map/lg-map.js" type="text/javascript"></script>
</body>
</html>
