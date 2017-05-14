<?php /* Template Name: Money in Politics
Template Post Type: post */ 
// custom template for "Voting with Money" article
?> 
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>
<body style="padding-top: 45px;">
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
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if ( has_post_thumbnail() ):?>
					<div class="post-featured-image"><?php the_post_thumbnail(); ?></div>
					<?php $desc = get_post(get_post_thumbnail_id())->post_content; ?>
					<?php if ( $desc != '' ):?>
						<div class="post-featured-image-desc"><?php echo $desc; ?></div>
					<?php endif;?>
				<?php endif; ?>
				<?php $tag_list = ['opinion']; $post_categories = get_the_category(); foreach ( $post_categories as $category ): if (in_array($category->slug, $tag_list)):?>
				<a href="/category/<?php echo $category->slug ?>"><div class="post-tag"><?php echo $category->name ?></div></a>
				<?php break; endif; endforeach; ?>
				<h1><? echo single_post_title("", false); ?></h1>
				<h2><? the_excerpt(); ?></h2>
				<hr class="category-title-border post-divider">
				<div class="author-avatar"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_avatar( get_the_author_email(), 68); ?></a></div>
				<div class="post-info">
					<div class="author-info">By <span class="author-name">
					<?php if ( function_exists( 'coauthors_posts_links' ) ) {
    						coauthors_posts_links(', ', ' and ');
							} else {
   		 						the_author_posts_link();
   		 					} ?></span></div>
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
					<div class="fb-like hidden-xs" data-href="<?php the_permalink() ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
				</div>
				<div id="post" class="post-content">
					<!-- filled in by money-politics.js -->
					<div id="money-data"> 
						<ul class="nav nav-tabs" role="tablist">
						</ul>

						<div class="tab-content">
						</div>
					</div>
					<?php the_content(); // article content ?>
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
	<script src="<?php echo get_bloginfo('template_directory');?>/jquery.csv.min.js"></script>
	<script src="<?php echo get_bloginfo('template_directory');?>/money-politics/money-politics.js"></script>
</body>
</html>
