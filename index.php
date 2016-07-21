<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>
<body>
  <div class="container">
    <!-- Example row of columns -->
    <div class="row front-header">
      <div class="col-md-11 front-carousel">
        <div class="front-carousel-image-container">
        <?php $front_carousel_query = new WP_Query( 'category_name=editors-picks&posts_per_page=4' ); ?>
        <?php if ( $front_carousel_query->have_posts() ) : while ( $front_carousel_query->have_posts() ) : $front_carousel_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>"><img class="front-carousel-image" src="<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $feat_image; ?>"></a>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
      </div>
      <div class="col-md-1 front-sidebar">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
          <img class='front-sidebar-logo' src="<?php echo get_bloginfo('template_directory');?>/images/Logo-01.png">
        </a>
        <ul class="front-sidebar-menu">
          <li class="active">Latest</li>
          <li>Magazine</li>
          <li>Blog</li>
          <li>About</li>
        </ul>
      </div>

      <div class="col-md-4 front-carousel-menu">
        <?php query_posts( 'category_name=editors-picks&posts_per_page=4' ); ?>
        <?php if ( $front_carousel_query->have_posts() ) : while ( $front_carousel_query->have_posts() ) : $front_carousel_query->the_post(); ?>
        <?php
        $subtitle = "";
        $title = get_the_title();
        $colon_split = explode(":", $title);
        $question_split = explode("?", $title);
        $excerpt = get_the_excerpt();
        $excerpt_sentences = preg_split('/[.]/', $excerpt);
        if (count($colon_split) > 1) {
          $title = $colon_split[0];
          $subtitle = $colon_split[1];
        } elseif (count($question_split) > 1) {
          $title = $question_split[0]."?";
          $subtitle = $question_split[1];
        } else {
          $question_split = explode("?", $excerpt);
          $quote_split = explode("\"", $excerpt);
          if (count($question_split) > 1) {
            $subtitle = $question_split[0]."?";
          } else if (count($quote_split) > 1){
            $subtitle = "\"".$quote_split[1]."\"";
          } else {
            $subtitle = $excerpt_sentences[0].".";
          }
        }

        ?>
          <a href="<?php the_permalink(); ?>">
            <div class="front-carousel-item">
              <h4 class="front-article-title"><?php echo $title; ?></h4>
              <p class="article-desc carousel-desc"><?php echo $subtitle; ?></p>
            </div>
          </a>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>

    </div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <a class='category-menu-item-link' role="tab" data-toggle="tab" href="#all"><span class="category-menu-item text-center">
          All
        </span></a>
        <a class='category-menu-item-link' role="tab" data-toggle="tab" href="#local"><span class="category-menu-item text-center">
          Local
        </span></a>
        <a class='category-menu-item-link' role="tab" data-toggle="tab" href="#national"><span class="category-menu-item text-center">
          National
        </span></a>
        <a class='category-menu-item-link' role="tab" data-toggle="tab" href="#international"><span class="category-menu-item text-center">
          International
        </span></a>
        <hr class="category-title-border">
      </div>
      <div class="row">
        <div class="col-md-2 col-md-offset-5 text-center category-title">
          Latest
        </div>
      </div>
    </div>

    <div class="tab-content">
    <div class="row article-list tab-pane fade in active" id="all" role="tabpanel" >
      <div class="col-md-4 text-right">
      <?php query_posts('posts_per_page=5' ); ?>
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
        <?php $query_array = array( 'posts_per_page' => 3 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
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
        <div class="front-magazine"><img src="<?php echo get_bloginfo('template_directory');?>/images/magazine_current.png"><br>
          <b class="front-magazine-intro">NEW ISSUE:</b><br>
          <b class="front-magazine-intro">February 2016</b><br>
          <span class="front-magazine-desc">Read it </span><span class="front-magazine-link">here</span>
        </div>
        <?php $query_array = array( 'posts_per_page' => 3 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); if ( $post->ID == $do_not_duplicate ) continue; $do_not_duplicate[] = $post->ID; ?>
          <div class="article-link">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p class="article-desc"><?php echo get_the_excerpt(); ?></p>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>

    <div class="row article-list tab-pane fade" id="local" role="tabpanel" >
      <div class="col-md-4 text-right">
      <?php query_posts('category_name=local&posts_per_page=5' ); ?>
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
        <?php $query_array = array( 'category_name' => 'local', 'posts_per_page' => 3 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
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
        <div class="front-magazine"><img src="<?php echo get_bloginfo('template_directory');?>/images/magazine_current.png"><br>
          <b class="front-magazine-intro">NEW ISSUE:</b><br>
          <b class="front-magazine-intro">February 2016</b><br>
          <span class="front-magazine-desc">Read it </span><span class="front-magazine-link">here</span>
        </div>
        <?php $query_array = array( 'category_name' => 'local', 'posts_per_page' => 3 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); if ( $post->ID == $do_not_duplicate ) continue; $do_not_duplicate[] = $post->ID; ?>
          <div class="article-link">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p class="article-desc"><?php echo get_the_excerpt(); ?></p>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>

    <div class="row article-list tab-pane fade" id="national" role="tabpanel" >
      <div class="col-md-4 text-right">
      <?php query_posts('category_name=national&posts_per_page=5' ); ?>
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
        <?php $query_array = array( 'category_name' => 'national', 'posts_per_page' => 3 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
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
        <div class="front-magazine"><img src="<?php echo get_bloginfo('template_directory');?>/images/magazine_current.png"><br>
          <b class="front-magazine-intro">NEW ISSUE:</b><br>
          <b class="front-magazine-intro">February 2016</b><br>
          <span class="front-magazine-desc">Read it </span><span class="front-magazine-link">here</span>
        </div>
        <?php $query_array = array( 'category_name' => 'national', 'posts_per_page' => 3 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); if ( $post->ID == $do_not_duplicate ) continue; $do_not_duplicate[] = $post->ID; ?>
          <div class="article-link">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p class="article-desc"><?php echo get_the_excerpt(); ?></p>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>

    <div class="row article-list tab-pane fade" id="international" role="tabpanel">
      <div class="col-md-4 text-right">
      <?php query_posts('category_name=world&posts_per_page=5' ); ?>
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
        <?php $query_array = array( 'category_name' => 'world', 'posts_per_page' => 3 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); if ( $post->ID == $do_not_duplicate ) continue; $do_not_duplicate[] = $post->ID;  $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
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
        <div class="front-magazine"><img src="<?php echo get_bloginfo('template_directory');?>/images/magazine_current.png"><br>
          <b class="front-magazine-intro">NEW ISSUE:</b><br>
          <b class="front-magazine-intro">February 2016</b><br>
          <span class="front-magazine-desc">Read it </span><span class="front-magazine-link">here</span>
        </div>
        <?php $query_array = array( 'category_name' => 'world', 'posts_per_page' => 3 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); if ( $post->ID == $do_not_duplicate ) continue; $do_not_duplicate[] = $post->ID; ?>
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
  </div>
  <?php get_footer(); ?>
  </body>
  </html>
