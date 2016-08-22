<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>
<body style="padding-top: 45px;">
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
				<span class="dropdown">
					<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="nav-link">Magazine</span></a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li><a class="inactive">Current Issue</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>past-issues">Past Issues</a></li>
					</ul>
				</span>
				<span class="nav-link-divider"></span>
				<span class="nav-link">About</span>
				<span class="nav-link-divider"></span>
				<span class="nav-article-title"><? echo "‘".single_post_title("", false)."’"; ?></span>
			</div>
		</div>
		<div id="progress" class="navbar-progress"></div>
	</nav>
	<?php if( have_posts() ) the_post(); ?>
	<div class="ad-top">
		<div class="container">
			<div class="row">
				<div class="col-md-9"><div class="adbox wide"></div></div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="post-container col-md-9">
				<?php if ( has_post_thumbnail() ):?>
					<div class="post-featured-image"><?php the_post_thumbnail(); ?></div>
				<?php endif; ?>
				<h1><? echo "“".single_post_title("", false)."”"; ?></h1>
				<h2><? the_excerpt(); ?></h2>
				<hr class="category-title-border post-divider">
				<div class="author-avatar"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_email(), 68); ?></a></div>
				<div class="post-info">
					<div class="author-info">By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="author-name"><?php the_author(); ?></span></a></div>
					<div class="post-date"><?php the_time('F j, Y'); ?></div>
				</div>
				<hr class="category-title-border post-divider">
				<div class="social-links">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>', 'newwindow', 'width=600, height=450'); return false;" >
						<img src="<?php echo get_bloginfo('template_directory');?>/images/facebook.png">
					</a>
					<a href="https://twitter.com/intent/tweet?url=<?php the_permalink() ?>&text=<?php echo single_post_title("", false) ?>&original_referer=<?php the_permalink() ?>" onclick="window.open('https://twitter.com/intent/tweet?url=<?php the_permalink() ?>&text=<?php echo single_post_title("", false) ?>&original_referer=<?php the_permalink() ?>', 'newwindow', 'width=600, height=450'); return false;" >
						<img src="<?php echo get_bloginfo('template_directory');?>/images/twitter.png">
					</a>
					<a href="https://plus.google.com/share?url=<?php the_permalink() ?>" onclick="window.open('https://plus.google.com/share?url=<?php the_permalink() ?>', 'newwindow', 'width=600, height=450'); return false;"><img src="<?php echo get_bloginfo('template_directory');?>/images/google-plus.png"></a>
				</div>
				<div id="post" class="post-content">
					<?php
					// $content = get_the_content();
					// $start = wp_trim_words( get_the_content(), 3, "");
					// $pos = strpos($content, $start);
					// if ($pos !== false) {
					// 	$newstring = str_replace("<span style=\"color: #000000;\">", "<p>", $content);
					// 	$newstring = str_replace("style=\"color: #000000;\"", "", $newstring);
					// 	$newstring = str_replace("</span>", "</p>", $newstring);
					// 	$newstring = str_replace($start, "<span class='post-intro'>".$start." </span>", $newstring);
					// }
					the_content();
					?>
				</div>
				<div id="post-end"></div>
				<?php comments_template(); ?>
			</div>
			<div class="col-md-3 post-sidebar">
				<div class="adbox square"></div>
				<div class="adbox tall"></div>
			</div>
		</div>
		
	</div>
	<?php get_footer(); ?>
</body>
</html>