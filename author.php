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
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="nav-link">Latest</span></a>
				<span class="nav-link-divider"></span>
				<a href="http://thepolitic.org/category/politic-blog/"><span class="nav-link active">Blog</span></a>
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
			</div>
		</div>
		<div class="navbar-progress"></div>
	</nav>

	<?php 
		$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<hr class="category-title-border">
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-5 text-center category-title">
					Author
				</div>
			</div>
		</div>
		
	
		<div class="row author-page-content">
	      <div class="col-md-8">
	      	<h2 class="author-page-name"><?php echo $curauth->display_name; ?></h2>
		    <div class="author-page-avatar"><?php echo get_avatar( $curauth->user_email, 150); ?></div>
		    <h4 class="author-page-bio"><?php echo $curauth->description; ?></h4>
		    <hr>
		    <div class="author-page-feat">
		    <?php $query_array = array( 'author' => $curauth->ID, 'posts_per_page' => 1 ); $author_posts = get_posts($query_array); ?>
		    <?php if($author_posts): foreach ( $author_posts as $post ) : setup_postdata( $post ); $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		    	<img class="author-page-feat-image" src="<?php echo $feat_image; ?>">
		    	<a href="<?php the_permalink(); ?>"><h1><?php echo "“".get_the_title()."”"; ?></h1></a>
		    	<h2><? echo get_the_excerpt(); ?></h2>
		    	<div class="author-page-feat-info"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span></div>
			<?php endforeach; ?>
	        <?php endif; ?>
	        </div>
	        <?php $query_array = array( 'author' => $curauth->ID, 'offset'=> 1, 'posts_per_page' => 6 ); $author_posts = get_posts($query_array); ?>
		    <?php if($author_posts): foreach ( $author_posts as $post ) : setup_postdata( $post ); $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		    	<div class="author-page-article">
			    	<img class="author-page-article-image" src="<?php echo $feat_image; ?>">
			    	<div class="author-page-article-info">
				    	<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
		           		<p class="article-desc"><?php echo get_the_excerpt(); ?></p>
		            	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span>
	            	</div>
		    	</div>
			<?php endforeach; ?>
	        <?php endif; ?>
 	      </div>
		</div>
	</div>
	<?php get_footer(); ?>
</body>
</html>
