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
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="nav-link active">Latest</span></a>
				<span class="nav-link-divider"></span>
				<a href="http://thepolitic.org/category/politic-blog/"><span class="nav-link">Blog</span></a>
				<span class="nav-link-divider"></span>
				<span class="nav-link">Magazine</span>
				<span class="nav-link-divider"></span>
				<span class="nav-link">About</span>
				<span class="nav-link-divider"></span>
				<span class="nav-article-title"><? echo "‘".single_post_title("", false)."’"; ?></span>
			</div>
		</div>
		<div id="progress" class="navbar-progress"></div>
	</nav>
	<?php if( have_posts() ) the_post(); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<?php if ( has_post_thumbnail() ):?>
					<div class="post-featured-image"><?php the_post_thumbnail(); ?></div>
				<?php endif; ?>
				<h1><? echo "“".single_post_title("", false)."”"; ?></h1>
				<h2><? the_excerpt(); ?></h2>
				<hr class="category-title-border post-divider">
				<div class="author-avatar"><?php echo get_avatar( get_the_author_email(), 68); ?></div>
				<div class="post-info">
					<div class="author-info">By <span class="author-name"><?php the_author(); ?></span></div>
					<div class="post-date"><?php the_time('F, j, Y'); ?></div>
				</div>
				<hr class="category-title-border post-divider">

				<div id="post" class="post-content">
					<?php
					$content = get_the_content();
					$start = wp_trim_words( get_the_content(), 3, "");
					$pos = strpos($content, $start);
					if ($pos !== false) {
						$newstring = str_replace("<span style=\"color: #000000;\">", "<p>", $content);
						$newstring = str_replace("style=\"color: #000000;\"", "", $newstring);
						$newstring = str_replace("</span>", "</p>", $newstring);
						$newstring = str_replace($start, "<span class='post-intro'>".$start." </span>", $newstring);
					}
					echo $newstring;
					?>
				</div>
				<div id="post-end"></div>
			</div>
			<div class="col-md-3">
			</div>
		</div>
		
	</div>
	<?php get_footer(); ?>
</body>
</html>
