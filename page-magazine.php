<?php // magazine "current issue" page ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>
<body style="padding-top: 65px;">
	<?php //load navbar from navbar.php
	 get_template_part( 'navbar' ); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<hr class="category-title-border">
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-5 col-xs-4 col-xs-offset-4 text-center category-title">
					<?php echo trim(wp_title('', false)); ?>
				</div>
			</div>
		</div>
		<div class="row" >
		  <div class="col-md-4 col-md-offset-4">
		  	<?php // replace these with links to the current issue PDF and a picture of the current issue cover ?>
		  	<a href="https://issuu.com/theyalepolitic/docs/issue6pdf">
		  		<img class='magazine-image' src="<?php echo get_bloginfo('template_directory');?>/images/issue6-2017.png">
		  	</a>
		  </div>
	    </div>
		<div class="row page-content" >
			<div class="col-md-4 col-md-offset-4 text-center">
				<?php $args = array(
	    			'post_type' => 'post',
	    			'posts_per_page' => 1,
	    			'post_status' => 'publish',
	    			// change this to the current issue category, tag the cover story as "Cover Story"
	    			'category_name' => '2016-2017-issue-vi+cover'
				);?>
		        <?php $mag_query = new WP_Query( $args ); ?>
		        <?php if($mag_query->have_posts()): while ( $mag_query->have_posts() ) : $mag_query->the_post(); $do_not_duplicate[] = $post->ID;?> 
		    		<div class="mag-page-article cover">
		    			<h4 class="mag-cover-header text-uppercase">Cover</h4>
		    			<a href="<?php the_permalink(); ?>"><h4 class="mag-article-title text-uppercase"><?php the_title(); ?></h4></a>
		    			<span class="mag-author"><?php the_author_posts_link(); ?></span>
		    		</div>
				<?php endwhile; ?>
				<?php endif; ?>

				<?php $args = array(
	    			'post_type' => 'post',
	    			'posts_per_page' => 30,
	    			'post_status' => 'publish',
	    			// change this to the current issue category
	    			'category_name' => '2016-2017-issue-vi',
	    			'post__not_in' => $do_not_duplicate
				);?>
		        <?php $mag_query = new WP_Query( $args ); ?>
		        <?php if($mag_query->have_posts()): while ( $mag_query->have_posts() ) : $mag_query->the_post(); ?> 
		    		<div class="mag-page-article">
		    			<a href="<?php the_permalink(); ?>"><h4 class="mag-article-title text-uppercase"><?php the_title(); ?></h4></a>
		    			<span class="mag-author"><?php the_author_posts_link(); ?></span>
		    		</div>
				<?php endwhile; ?>
				<?php endif; ?>
	      </div>
	    </div>
	</div>
	<?php get_footer(); ?>
</body>
</html>
