<?php
/**
 * Theme footer — one compact strip.
 *
 * @package Nydla_Wordpress
 */
?>
</main>

<footer class="site-footer" role="contentinfo">
	<div class="site-footer__inner">
		<nav class="site-footer__nav" aria-label="<?php esc_attr_e( 'Footer', 'nydla-wordpress' ); ?>">
			<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'nydla-wordpress' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/sponsors/' ) ); ?>"><?php esc_html_e( 'Sponsors', 'nydla-wordpress' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/podcasts/' ) ); ?>"><?php esc_html_e( 'Podcasts', 'nydla-wordpress' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/events/' ) ); ?>"><?php esc_html_e( 'Events', 'nydla-wordpress' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'nydla-wordpress' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/sponsorship-plans/' ) ); ?>"><?php esc_html_e( 'Sponsorship Plans', 'nydla-wordpress' ); ?></a>
		</nav>

		<div class="site-footer__giving">
			<span class="site-footer__giving-label"><?php esc_html_e( 'Giving back', 'nydla-wordpress' ); ?></span>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Interfaith Food Pantry', 'nydla-wordpress' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( "Alice's Kids", 'nydla-wordpress' ); ?></a>
		</div>

		<div class="site-footer__end">
			<a class="site-footer__social" href="https://link.me/thomascapone" rel="noopener noreferrer" target="_blank"><?php esc_html_e( 'Connect', 'nydla-wordpress' ); ?></a>
			<span class="site-footer__copy">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
