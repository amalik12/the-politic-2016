<!-- Template for individual author pages -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>

<body style="padding-top: 65px;">
	<?php //load navbar from navbar.php
	 get_template_part( 'navbar' ); ?>
	<?php 
		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<hr class="category-title-border">
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-5 col-xs-4 col-xs-offset-4 text-center category-title">
					Author
				</div>
			</div>
		</div>
		
	
		<div class="row author-page-content">
	      <div class="col-md-8 col-md-offset-1">
	      	<h2 class="author-page-name"><?php echo $curauth->display_name; ?></h2>
		    <div class="author-page-avatar"><?php echo get_avatar( $curauth->user_email, 150); ?></div>
		    <h4 class="author-page-bio"><?php echo $curauth->description; ?></h4>
		    <hr>
		    <div class="author-page-feat">
		    	        <?php $args = array(
    			'post_type' => 'post',
    			'posts_per_page' => 1,
    			'post_status' => 'publish',
    		'author_name' => $curauth->user_login,
			);?>
	        <?php $author_query = new WP_Query( $args ); ?>
		    <?php if($author_query->have_posts()): while ( $author_query->have_posts() ) : $author_query->the_post(); $feat_image = get_the_post_thumbnail_url(); ?>
		    	<img class="author-page-feat-image" src="<?php echo $feat_image; ?>">
		    	<a href="<?php the_permalink(); ?>"><h1><?php echo get_the_title(); ?></h1></a>
		    	<h2><? echo get_the_excerpt(); ?></h2>
		    	<div class="author-page-feat-info"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span></div>
			<?php endwhile; ?>
	        <?php endif; ?>
	        </div>
	        <?php $args = array(
    			'post_type' => 'post',
    			'posts_per_page' => 30,
    			'offset' => 1,
    			'post_status' => 'publish',
    		'author_name' => $curauth->user_login,
			);?>
	        <?php $author_query = new WP_Query( $args ); ?>
		    <?php if($author_query->have_posts()): while ( $author_query->have_posts() ) : $author_query->the_post(); $feat_image = get_the_post_thumbnail_url(); ?>
		    	<div class="author-page-article">

			    	<img class="author-page-article-image <?php if(!has_post_thumbnail()):?>invisible<?php endif ?>" src="<?php echo $feat_image; ?>">
			    	<div class="author-page-article-info">
				    	<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
		           		<p class="article-desc"><?php echo get_the_excerpt(); ?></p>
		            	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span>
	            	</div>
		    	</div>
			<?php endwhile; ?>
	        <?php endif; ?>
 	      </div>
		</div>
	</div>
	<?php get_footer(); ?>
</body>
</html>
