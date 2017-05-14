<?php /* Template Name: Past Issues */ ?>
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
					Past Issues
				</div>
			</div>
		</div>
		<div class="row page-content" >
		  <?php while ( have_posts() ) : the_post(); ?> 
	      <?php the_content(); // Issuu article embeds added in Wordpress ?> 
	      <?php endwhile; ?>
	    </div>
	    <div class="row">
	    	<div class="col-md-6 col-md-offset-3 text-center">
	    		<?php // highlighted page number depends on "order" page attribute in Wordpress ?> 
	    		<span class="pagination-page <?php if ($post->menu_order == 0): echo "active"; endif;?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>past-issues">1</a></span>
	    		<span class="pagination-page <?php if ($post->menu_order == 1): echo "active"; endif;?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>past-issues-page-2">2</a></span>
	    		<span class="pagination-page <?php if ($post->menu_order == 2): echo "active"; endif;?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>past-issues-page-3">3</a></span>
	    		<span class="pagination-page <?php if ($post->menu_order == 3): echo "active"; endif;?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>past-issues-page-4">4</a></span>
	    		<span class="pagination-page <?php if ($post->menu_order == 4): echo "active"; endif;?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>past-issues-page-5">5</a></span>
	    		<span class="pagination-page <?php if ($post->menu_order == 5): echo "active"; endif;?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>past-issues-page-6">6</a></span>
	    	</div>	    	
	    </div>
	</div>
	<?php get_footer(); ?>
</body>
</html>
