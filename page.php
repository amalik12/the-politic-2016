<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>
<body style="padding-top: 65px;">
	<nav class="navbar navbar-fixed-top">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_bloginfo('template_directory');?>/images/Logo-small-01.png"></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<div class="navbar-links navbar-left">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="nav-link">Latest</span></a>
				<span class="nav-link-divider"></span>
				<a href="http://thepolitic.org/category/politic-blog/"><span class="nav-link">Blog</span></a>
				<span class="nav-link-divider"></span>
				<span class="dropdown">
					<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="nav-link <?php $title = trim(wp_title('', false)); if ($title == "The Magazine" || $title == "Past Issues"): echo "active"; else: echo $title; endif;?>">Magazine</span></a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li><a class="inactive">Current Issue</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>past-issues">Past Issues</a></li>
					</ul>
				</span>
				<span class="nav-link-divider"></span>
				<span class="nav-link <?php $title = trim(wp_title('', false)); if ($title != "The Magazine" && $title != "Past Issues"): echo "active"; endif;?>">About</span>
			</div>
		</div>
		<div class="navbar-progress"></div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<hr class="category-title-border">
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-5 text-center category-title">
					<?php echo trim(wp_title('', false)); ?>
				</div>
			</div>
		</div>
		

		<div class="row page-content" >
		  <?php while ( have_posts() ) : the_post(); ?> 
	      <?php the_content(); ?>
	      <?php endwhile; ?>
	    </div>
	</div>
	<?php get_footer(); ?>
</body>
</html>
