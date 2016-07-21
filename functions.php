<?php
// add_action('get_header', 'my_filter_head');

// function my_filter_head() {
// 	remove_action('wp_head', '_admin_bar_bump_cb');
// }


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
?>