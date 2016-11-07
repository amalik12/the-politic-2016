<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>
<body style="padding-top: 65px;">
	<nav class="navbar navbar-default navbar-fixed-top" role='navigation'>
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
				<span class="nav-link-divider hidden-xs"></span>
				<a href="http://thepolitic.org/category/politic-blog/"><span class="nav-link">Blog</span></a>
				<span class="nav-link-divider hidden-xs"></span>
				<span class="dropdown">
					<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="nav-link <?php $title = trim(wp_title('', false)); if ($title == "The Magazine" || $title == "Past Issues"): echo "active"; endif;?>">Magazine</span></a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>magazine/">Current Issue</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>past-issues">Past Issues</a></li>
					</ul>
				</span>
				<span class="nav-link-divider hidden-xs"></span>
				<span class="dropdown">
					<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="nav-link <?php $title = trim(wp_title('', false)); if ($title != "The Magazine" && $title != "Past Issues"): echo "active"; endif;?>">About</span></a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>our-team">Masthead</a></li>
            			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>our-sponsors">Our Sponsors</a></li>
					</ul>
				</span>
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
				<div class="col-md-2 col-md-offset-5 col-xs-4 col-xs-offset-4 text-center category-title">
					<?php echo trim(wp_title('', false)); ?>
				</div>
			</div>
		</div>
		<div class="row" >
		  <div class="col-md-4 col-md-offset-4">
		  	<img class='magazine-image' src="<?php echo get_bloginfo('template_directory');?>/images/issue1-2016.jpg">
		  </div>
	    </div>
		<div class="row page-content" >
			<div class="col-md-4 col-md-offset-4 text-center">
				<?php $args = array(
	    			'post_type' => 'post',
	    			'posts_per_page' => 1,
	    			'post_status' => 'publish',
	    			'category_name' => '2016-2017-issue-i+cover'
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
	    			'category_name' => '2016-2017-issue-i',
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
