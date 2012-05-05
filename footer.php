<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Portforwardpodcast
 * @since Portforwardpodcast 1.0
 */
?>
	
	</div><!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'portforwardpodcast_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'portforwardpodcast' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'portforwardpodcast' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'portforwardpodcast' ), 'portforwardpodcast', '<a href="http://Dsyko.com/" rel="designer">Dsyko</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>