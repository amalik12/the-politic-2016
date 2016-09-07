<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>
<body style="padding-top: 42px;">
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
				<a href="http://thepolitic.org/category/politic-blog/"><span class="nav-link <?php $title = single_cat_title("", false); if ($title == "The Politic Blog"): echo "active"; endif;?>">Blog</span></a>
				<span class="nav-link-divider hidden-xs"></span>
				<span class="dropdown">
					<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="nav-link">Magazine</span></a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li><a class="inactive">Current Issue</a></li>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>past-issues">Past Issues</a></li>
					</ul>
				</span>
				<span class="nav-link-divider hidden-xs"></span>
				<span class="dropdown">
					<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="nav-link">About</span></a>
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
		</div>
		<div class="row">
				<div class="col-md-2 col-md-offset-5 col-xs-4 col-xs-offset-4 text-center category-title">
					<?php $title = single_cat_title("", false); if ($title == "The Politic Blog"): $title = "The Blog"; endif; echo $title; ?>
				</div>
		</div>
		
		<div class="row category-carousel">
			<div class="col-md-6 col-md-offset-3">
 				<div id="category-carousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<?php
							$cat = get_category( get_query_var( 'cat' ) );
							$cat_id = $cat->cat_ID;
							$cat_name = $cat->name;
							$slug = $cat->slug;
 		  				?>
						<?php wp_reset_query(); $query_array = array( 'category_name' => $slug.'+editors-picks', 'posts_per_page' => 1 ); query_posts($query_array); ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); $do_not_duplicate[] = $post->ID; ?>
						<div class="item active">
							<a href="<?php the_permalink(); ?>">
							<div class="category-carousel-image-container">
								<img data-holder-rendered="true" src="<?php echo $feat_image; ?>">
							</div>
							<div class="carousel-caption">
								<h4 class="category-carousel-caption"><?php the_title(); ?></h4>
							</div>
							</a>
						</div>
						<?php endwhile; ?>
	        			<?php endif; ?>
						<?php wp_reset_query(); $query_array = array( 'category_name' => $slug.'+editors-picks', 'posts_per_page' => 3, 'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); if ( $post->ID == $do_not_duplicate ) continue; $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
						<div class="item">
							<a href="<?php the_permalink(); ?>">
							<div class="category-carousel-image-container">
								<img data-holder-rendered="true" src="<?php echo $feat_image; ?>">
							</div>
							<div class="carousel-caption">
								<h4 class="category-carousel-caption"><?php the_title(); ?></h4>
							</div>
							</a>
						</div>
						<?php endwhile; ?>
	        			<?php endif; ?>
					</div>
					<a class="left carousel-control" href="#category-carousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#category-carousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>

		<div class="row article-list" >
	      <div class="col-md-4 text-right">
 	      
	      <?php wp_reset_query(); $query_array = array( 'cat' => get_query_var( 'cat' ), 'posts_per_page' => 4 ); query_posts($query_array); ?>
	        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $do_not_duplicate[] = $post->ID; ?>
	          <div class="article-link">
	            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
	            <p class="article-desc"><?php echo get_the_excerpt(); ?></p>
	            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span>
	          </div>
	        <?php endwhile; ?>
	        <?php endif; ?>
	      </div>
	      <div class="col-md-4 text-center">
	        <?php $query_array = array( 'cat' => get_query_var( 'cat' ), 'posts_per_page' => 2 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
	        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); if ( $post->ID == $do_not_duplicate ) continue; $do_not_duplicate[] = $post->ID; $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	          <div class="article-link">
	            <?php if ($feat_image != ''): ?><a href="<?php the_permalink(); ?>"><img class='article-image' src="<?php echo $feat_image; ?>"></a><?php endif; ?>
	            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
	            <p class="article-desc"><?php echo get_the_excerpt(); ?></p>
	            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span>
	          </div>
	        <?php endwhile; ?>
	        <?php endif; ?>
	      </div>
	      <div class="col-md-4 text-left">
	        <?php $query_array = array( 'cat' => get_query_var( 'cat' ), 'posts_per_page' => 4 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
	        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); if ( $post->ID == $do_not_duplicate ) continue; $do_not_duplicate[] = $post->ID;?>
	          <div class="article-link">
	            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
	            <p class="article-desc"><?php echo get_the_excerpt(); ?></p>
	            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span>
	          </div>
	        <?php endwhile; ?>
	        <?php endif; ?>
	      </div>
	    </div>
	</div>
	<?php get_footer(); ?>
</body>
</html>
