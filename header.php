<?php // header template ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="<?php echo get_the_excerpt(); ?>">
    <meta property="fb:pages" content="274083159322175" />
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
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5422246651794508",
    enable_page_level_ads: true
  });
</script>