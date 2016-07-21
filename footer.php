<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 */
?>
<footer>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		<img src="<?php echo get_bloginfo('template_directory');?>/images/Logo-small-white.png">
	</a>
	<div class="footer-links">
		<div class="footer-link-row"><a class="footer-link" href="#">Masthead</a><a class="footer-link" href="#">Contact Us</a></div>
		<div class="footer-link-row"><a class="footer-link" href="#">Advertise</a><a class="footer-link" href="#">Subscribe</a></div>
		<div class="footer-link-row"><a class="footer-link" href="#">Events</a><a class="footer-link" href="#">Archives</a></div>
		<div class="footer-copyright">&copy; 2016 The Politic</div>
	</div>
	
</footer>
<?php wp_footer(); ?>