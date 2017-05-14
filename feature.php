<?php /* Template Name: Feature
Template Post Type: post*/ 
// used for the refugee feature article
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>
<body style="padding-top: 42px;">
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<?php //load navbar from navbar.php
	 get_template_part( 'navbar' ); ?>
	 
	<?php if( have_posts() ) the_post(); ?>
<!-- 	<div class="ad-top">
		<div class="container">
			<div class="row">
				<div class="col-md-9"><div class="adbox wide"></div></div>
			</div>
		</div>
	</div> -->
	<div class="feature-header col-md-12">
				<video class="feature-header-video" src="http://thepolitic.org/wp-content/themes/the_politic_2016/videos/refugee-header.mp4" loop="true" autoplay="" muted="true"></video>
				<h1 class="feature-header-title text-uppercase"><?php $subtitle = ""; $title = single_post_title("", false); $colon_split = explode(":", $title); $question_split = explode("?", $title);
					if (count($colon_split) > 1) { //use the subtitle as the description
		              $title = $colon_split[0];
		              $subtitle = $colon_split[1];
		            } elseif (count($question_split) > 1 and $question_split[1] != ""){
		              $title = $question_split[0]."?";
		              $subtitle = $question_split[1];
		            }
		            echo $title
				 ?></h1>
				<h2 class="feature-header-subtitle text-uppercase"><?php echo $subtitle ?></h2>
				<h3 class="feature-header-author">By <span class="text-uppercase"><?php if ( function_exists( 'coauthors_posts_links' ) ) { coauthors_posts_links(', ', ' and ');
					} else { the_author_posts_link(); } ?></span></h3>
	</div>
	<div class="feature-desc"><div class="container"><? the_excerpt(); ?></div></div>
	<div class="container">
		<div class="row">
			<div class="post-container col-md-9" style="border: none;">
				<div class="social-links">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>', 'newwindow', 'width=600, height=450'); return false;" >
						<img src="<?php echo get_bloginfo('template_directory');?>/images/facebook.png">
					</a>
					<a href="https://twitter.com/intent/tweet?url=<?php the_permalink() ?>&text=<?php echo single_post_title("", false) ?>&original_referer=<?php the_permalink() ?>" onclick="window.open('https://twitter.com/intent/tweet?url=<?php the_permalink() ?>&text=<?php echo single_post_title("", false) ?>&original_referer=<?php the_permalink() ?>', 'newwindow', 'width=600, height=450'); return false;" >
						<img src="<?php echo get_bloginfo('template_directory');?>/images/twitter.png">
					</a>
					<a href="https://plus.google.com/share?url=<?php the_permalink() ?>" onclick="window.open('https://plus.google.com/share?url=<?php the_permalink() ?>', 'newwindow', 'width=600, height=450'); return false;"><img src="<?php echo get_bloginfo('template_directory');?>/images/google-plus.png"></a>
					<div class="fb-like hidden-xs" data-href="<?php the_permalink() ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
				</div>
				<div id="post" class="post-content">
					<?php
					the_content();
					?>
				</div>
				<div id="post-end"></div>
				<?php comments_template(); ?>
			</div>
			<div class="col-md-3 post-sidebar">
<!-- 				<div class="adbox square"></div>
				<div class="adbox tall"></div> -->
			</div>
		</div>
		
	</div>
	<?php get_footer(); ?>
	<script type="text/javascript" src="http://thepolitic.org/wp-content/themes/the_politic_2016/feature/refugee-flowchart.js"></script>
</body>
</html>
