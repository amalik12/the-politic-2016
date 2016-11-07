<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>
<body>
  <nav class="navbar navbar-default navbar-fixed-top visible-xs" role='navigation'>
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
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="nav-link active">Latest</span></a>
        <span class="nav-link-divider hidden-xs"></span>
        <a href="http://thepolitic.org/category/politic-blog/"><span class="nav-link">Blog</span></a>
        <span class="nav-link-divider hidden-xs"></span>
        <span class="dropdown">
          <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="nav-link">Magazine</span></a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>magazine/">Current Issue</a></li>
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
    <span class="navbar-links" >
      <span class="nav-link-divider hidden-xs hidden-sm"></span>
      <span class="nav-article-title hidden-xs hidden-sm"><? echo single_post_title("", false); ?></span>
    </span>
    
    <div id="progress" class="navbar-progress"></div>
  </nav>
  <div class="container">
    <!-- Example row of columns -->
    <div class="row front-header">
      <div class="col-md-1 mobile-nav visible-sm text-center">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <img class='front-sidebar-logo' src="<?php echo get_bloginfo('template_directory');?>/images/Logo-01.png">
          </a>
          <ul class="front-sidebar-menu">
            <a href="#latest-articles"><li class="active visible-sm-inline">Latest</li></a>
            <span class="dropdown">
              <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><li class="visible-sm-inline">Magazine</li></a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>magazine/">Current Issue</a></li>
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>past-issues">Past Issues</a></li>
              </ul>
            </span>
            <a href="http://thepolitic.org/category/politic-blog/"><li class="visible-sm-inline">Blog</li></a>
        <span class="dropdown">
          <a data-toggle="dropdown" href="#" aria-expanded="false"  aria-haspopup="true" aria-expanded="false"><li class="visible-sm-inline">About</li>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>our-team">Masthead</a></li>
              <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>our-sponsors">Our Sponsors</a></li>
            </ul>
        </span>
          </ul>
        </div>
      <div class="col-md-11 front-carousel">
        <div class="front-carousel-image-container">
        <?php $front_carousel_query = new WP_Query( 'category_name=editors-picks&posts_per_page=4' ); ?>
        <?php if ( $front_carousel_query->have_posts() ) : while ( $front_carousel_query->have_posts() ) : $front_carousel_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>"><img class="front-carousel-image" src="<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $feat_image; ?>"></a>
        <?php endwhile; ?>
        <?php endif; ?>
          <a class="mobile-carousel-item" href="">
          <div class="front-carousel-item-mobile visible-sm visible-xs">
              <h4 class="front-article-title">Title</h4>
              <p class="article-desc carousel-desc">Subtitle</p>
          </div>
          </a>
        </div>
      </div>
      <div class="col-md-4 front-carousel-menu">
        <div class="collapse" id="carouselMenuSpacer">collapse</div>
        <div class="collapse" id="carouselMenuSpacer1">collapse</div>
        <?php query_posts( 'category_name=editors-picks&posts_per_page=4' ); ?>
        <?php if ( $front_carousel_query->have_posts() ) : while ( $front_carousel_query->have_posts() ) : $front_carousel_query->the_post(); ?>
        <?php
        $subtitle = "";
        $title = get_the_title();
        $colon_split = explode(":", $title);
        
        $question_split = explode("?", $title);
        $excerpt = get_the_excerpt();
        $excerpt_sentences = preg_split('/[.]/', $excerpt);
        if (count($colon_split) > 1) { //use the subtitle as the description
          $title = $colon_split[0];
          $subtitle = $colon_split[1];
        } elseif (count($question_split) > 1 and $question_split[1] != ""){
          $title = $question_split[0]."?";
          $subtitle = $question_split[1];
        } else {
          //use the article excerpt as the description
          $question_split = explode("?", $excerpt);
          $quote_split = explode("\"", $excerpt);
          $exclamation_split = explode("!", $excerpt);
          //separate the first sentence of the excerpt to use as the description, depending on its type of punctuation
          if (count($question_split) > 1) {
            $subtitle = $question_split[0]."?";
          } else if (count($quote_split) > 1){
            $subtitle = "\"".$quote_split[1]."\"";
          } elseif (count($exclamation_split) > 1) {
            $subtitle = $exclamation_split[0]."!";
          }  else {
            $subtitle = $excerpt_sentences[0].".";
          }
        }
        ?>
          <a href="<?php the_permalink(); ?>">
            <div class="front-carousel-item hidden-sm hidden-xs">
              <h4 class="front-article-title"><?php echo $title; ?></h4>
              <p class="article-desc carousel-desc"><?php echo $subtitle; ?></p>
            </div>
          </a>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <div class="col-md-1 front-sidebar hidden-sm hidden-xs">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
          <img class='front-sidebar-logo' src="<?php echo get_bloginfo('template_directory');?>/images/Logo-01.png">
        </a>
        <ul class="front-sidebar-menu">
          <a id='latest-link' href="#latest-articles"><li class="active">Latest</li></a>
          <a id='magazine-link' data-toggle="collapse" href="#magCollapse" aria-expanded="false" aria-controls="magCollapse"><li>Magazine</li></a>
          <div class="collapse" id="magCollapse">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>magazine/"><li>Current Issue</li></a>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>past-issues"><li>Past Issues</li></a>
          </div>
          <a href="http://thepolitic.org/category/politic-blog/"><li>Blog</li></a>
          <a id='about-link' data-toggle="collapse" href="#aboutCollapse" aria-expanded="false" aria-controls="aboutCollapse"><li>About</li></a>
          <div class="collapse" id="aboutCollapse">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>our-team"><li>Masthead</li></a>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>our-sponsors"><li>Our Sponsors</li></a>
          </div>
        </ul>
      </div>
    </div>
    <div class="row"><a href="/election-map"><img style="width: 100%; margin-bottom: 50px;" src="<?php echo get_bloginfo('template_directory');?>/ads/election-map-promo.png"></a></div>
    <div id='latest-articles' class="row">
      <div class="col-md-6 col-md-offset-3 text-center">
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
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-5 col-xs-4 col-xs-offset-4 text-center category-title">
          Latest
        </div>
      </div>

    <div class="tab-content">
    <div class="row article-list tab-pane fade in active" id="all" role="tabpanel" >
      <div class="col-md-4 text-right">
      <a href="http://history.yale.edu/"><img class="square" src="<?php echo get_bloginfo('template_directory');?>/ads/HIST.jpg"></a>
      <?php query_posts('posts_per_page=5' ); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $do_not_duplicate[] = $post->ID; ?>
          <div class="article-link">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p class="article-desc"><?php echo get_the_excerpt(); ?></p>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span>
          </div>
        <?php endwhile; ?>
        <?php endif; ?><a class="ad-vertical-1-link" href="http://judaicstudies.yale.edu/"><img class="tall ad-vertical-1" src="<?php echo get_bloginfo('template_directory');?>/ads/JDST-01.jpg"></a>
        <!-- <img class="tall" src="<?php echo get_bloginfo('template_directory');?>/ads/WGSS_250x550.jpg"> -->
      </div>
      <div class="col-md-4 text-center">
        <?php $query_array = array( 'posts_per_page' => 5 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
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
<!--         <div class="front-magazine"><img src="<?php echo get_bloginfo('template_directory');?>/images/magazine_current.png"><br>
          <b class="front-magazine-intro">NEW ISSUE:</b><br>
          <b class="front-magazine-intro">February 2016</b><br>
          <span class="front-magazine-desc">Read it </span><span class="front-magazine-link">here</span>
        </div> -->
        <form class='searchbar-container' role="search" method="get" id="searchform" class="searchform" action="http://thepolitic.org/">
            <div>
              <span class="search-icon glyphicon glyphicon-search" aria-hidden="true"></span>
              <input class='searchbar' value="" name="s" id="s" placeholder="Search..." type="text">
            </div>
        </form>
        <a class="ad-vertical-2-link" href="http://wgss.yale.edu/"><img class="tall ad-vertical-2" src="<?php echo get_bloginfo('template_directory');?>/ads/WGSS_250x550.jpg"></a>
        <?php $query_array = array( 'posts_per_page' => 6 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
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
      <a href="http://history.yale.edu/"><img class="square" src="<?php echo get_bloginfo('template_directory');?>/ads/HIST.jpg"></a>
      <?php query_posts('category_name=local&posts_per_page=5' ); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $do_not_duplicate[] = $post->ID; ?>
          <div class="article-link">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p class="article-desc"><?php echo get_the_excerpt(); ?></p>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <a class="ad-vertical-1-link" href="http://judaicstudies.yale.edu/"><img class="tall ad-vertical-1" src="<?php echo get_bloginfo('template_directory');?>/ads/JDST-01.jpg"></a>
      </div>
      <div class="col-md-4 text-center">
        <?php $query_array = array( 'category_name' => 'local', 'posts_per_page' => 5 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
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
<!--         <div class="front-magazine"><img src="<?php echo get_bloginfo('template_directory');?>/images/magazine_current.png"><br>
          <b class="front-magazine-intro">NEW ISSUE:</b><br>
          <b class="front-magazine-intro">February 2016</b><br>
          <span class="front-magazine-desc">Read it </span><span class="front-magazine-link">here</span>
        </div> -->
        <a class="ad-vertical-2-link" href="http://wgss.yale.edu/"><img class="tall ad-vertical-2" src="<?php echo get_bloginfo('template_directory');?>/ads/WGSS_250x550.jpg"></a>
        <?php $query_array = array( 'category_name' => 'local', 'posts_per_page' => 6 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
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
      <a href="http://history.yale.edu/"><img class="square" src="<?php echo get_bloginfo('template_directory');?>/ads/HIST.jpg"></a>
      <?php query_posts('category_name=national&posts_per_page=5' ); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $do_not_duplicate[] = $post->ID; ?>
          <div class="article-link">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p class="article-desc"><?php echo get_the_excerpt(); ?></p>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <a class="ad-vertical-1-link" href="http://judaicstudies.yale.edu/"><img class="tall ad-vertical-1" src="<?php echo get_bloginfo('template_directory');?>/ads/JDST-01.jpg"></a>
      </div>

      <div class="col-md-4 text-center">
        <?php $query_array = array( 'category_name' => 'national', 'posts_per_page' => 5 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
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
        <a class="ad-vertical-2-link" href="http://wgss.yale.edu/"><img class="tall ad-vertical-2" src="<?php echo get_bloginfo('template_directory');?>/ads/WGSS_250x550.jpg"></a>
        <?php $query_array = array( 'category_name' => 'national', 'posts_per_page' => 6 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
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
      <a href="http://history.yale.edu/"><img class="square" src="<?php echo get_bloginfo('template_directory');?>/ads/HIST.jpg"></a>
      <?php query_posts('category_name=world&posts_per_page=5' ); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $do_not_duplicate[] = $post->ID; ?>
          <div class="article-link">
            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
            <p class="article-desc"><?php echo get_the_excerpt(); ?></p>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span class="article-author"><?php the_author(); ?></span></a><span class="article-date"> | <?php the_time('n.j.Y'); ?></span>
          </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <a class="ad-vertical-1-link" href="http://judaicstudies.yale.edu/"><img class="tall ad-vertical-1" src="<?php echo get_bloginfo('template_directory');?>/ads/JDST-01.jpg"></a>
      </div>
      <div class="col-md-4 text-center">
        <?php $query_array = array( 'category_name' => 'world', 'posts_per_page' => 5 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
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
        <a class="ad-vertical-2-link" href="http://wgss.yale.edu/"><img class="tall ad-vertical-2" src="<?php echo get_bloginfo('template_directory');?>/ads/WGSS_250x550.jpg"></a>
        <?php $query_array = array( 'category_name' => 'world', 'posts_per_page' => 6 ,'post__not_in' => $do_not_duplicate ); query_posts($query_array); ?>
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
