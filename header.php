<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://thepolitic.org/wp-content/uploads/2016/06/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_bloginfo('template_directory');?>/images/touchicon.png" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <title><?php if (is_front_page()): ?>
        <?php bloginfo('name'); ?> | <?php bloginfo('description') ?>
        <?php else: ?>
            <?php wp_title(''); ?> | <?php bloginfo('name'); ?>
        <?php endif; ?>
    </title>

    <!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
</head>