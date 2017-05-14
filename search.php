<?php // search results page ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>
<body style="padding-top: 65px;">
	<?php //load navbar from navbar.php
	 get_template_part( 'navbar' ); ?>

	<?php
		global $query_string;

		$query_args = explode("&", $query_string);
		$search_query = array();

		if( strlen($query_string) > 0 ) {
			foreach($query_args as $key => $string) {
				$query_split = explode("=", $string);
				$search_query[$query_split[0]] = urldecode($query_split[1]);
			}
		}
		$search_query['posts_per_page'] = 1;
		$search = new WP_Query($search_query);
	?>
	<div class="container">
		<div class="row author-page-content">
	      <div class="col-md-8 col-md-offset-1">
		    <form class='searchbar-container' role="search" method="get" id="searchform" class="searchform" action="http://thepolitic.org/">
			    <span class="search-icon glyphicon glyphicon-search" aria-hidden="true"></span>
			    <input class='searchbar' value="" name="s" id="s" placeholder="Search articles and authors..." type="text">
			</form>
			<br></br>
	      	<h2 class="author-page-name">Search results for "<?php echo esc_html( get_search_query( false ) ); ?>"</h2>
		    <hr>
		    <div class="author-page-feat">
		    <?php if($search->have_posts()): while ( $search->have_posts() ) : $search->the_post(); $feat_image = get_the_post_thumbnail_url(); ?>
		    	<img class="author-page-feat-image" src="<?php echo $feat_image; ?>">
		    	<a href="<?php the_permalink(); ?>"><h1><?php echo get_the_title(); ?></h1></a>
		    	<h2><? echo get_the_excerpt(); ?></h2>
		    	<div class="author-page-feat-info"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span></div>
			<?php endwhile; ?>
	        <?php endif; ?>
	        </div>
	        <?php $search_query['posts_per_page'] = 30; $search_query['offset'] = 1; $search = new WP_Query($search_query); ?>
		    <?php if($search->have_posts()): while ( $search->have_posts() ) : $search->the_post(); $feat_image = get_the_post_thumbnail_url(); ?>
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
