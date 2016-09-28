<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 */
?>
<footer>
<div class="container">
<div class="row">
<div class="col-md-12">

	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		<img src="<?php echo get_bloginfo('template_directory');?>/images/Logo-small-white.png">
	</a>
	<span class="footer-links">
		<a class="footer-link" href="<?php echo esc_url( home_url( '/' ) ); ?>our-team">Masthead</a>
		<a class="footer-link" href="<?php echo esc_url( home_url( '/' ) ); ?>contact">Contact Us</a>
		<a class="footer-link" href="http://www.payit2.com/collect-page/13590">Subscribe</a>
		<a class="footer-link" href="<?php echo esc_url( home_url( '/' ) ); ?>advertise">Advertise</a><!-- <a class="footer-link" href="#">Subscribe</a>
 -->		<!-- <a class="footer-link" href="#">Events</a><a class="footer-link" href="#">Archives</a> -->
		<span class="footer-copyright">&copy; <?php echo date('Y'); ?> The Politic</span>
	</span>
	
</div>
</div>
</div>
</footer>
<?php wp_footer(); ?>