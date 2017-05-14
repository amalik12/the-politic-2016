<!-- generic non-post pages -->
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
		<div class="row page-content" >
		  <?php while ( have_posts() ) : the_post(); ?> 
	      <?php the_content(); ?>
	      <?php endwhile; ?>
	    </div>
	</div>
	<?php get_footer(); ?>
</body>
</html>
