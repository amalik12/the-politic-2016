<?php
add_action('get_header', 'my_filter_head');

function my_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

function custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url(' . get_template_directory_uri() . '/images/Logo-small-01.png) !important; }
    </style>';
}
add_action('login_head', 'custom_login_logo');

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
	wp_register_script( 'main-script', get_template_directory_uri() . '/main.js', array( 'jquery' ));
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
	wp_enqueue_script( 'main-script' );
}


add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

function add_article_meta() {

    if (is_single()){
        global $post;
        $author = get_the_author_meta('display_name', $post->post_author);
        $title = $post->post_title;
        $image  = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
        echo "<meta name=\"author\" content=\"$author\">";
        echo "<meta property=\"og:type\" content=\"article\">";
        echo "<meta property=\"og:title\" content=\"$title\">";
        echo "<meta property=\"og:image\" content=\"$image\">";
    }
}

add_action( 'wp_enqueue_scripts', 'add_article_meta' );

add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

add_action('wp_footer', 'add_googleanalytics');
function add_googleanalytics() { ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86119609-1', 'auto');
  ga('send', 'pageview');

</script>
<?php }

?>
