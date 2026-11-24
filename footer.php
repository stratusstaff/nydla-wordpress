<?php
/**
 * Theme footer — compact utility strip (not a second nav).
 *
 * @package Nydla_Wordpress
 */
?>
</main>

<footer class="site-footer" role="contentinfo">
	<div class="site-footer__inner">
		<div class="site-footer__giving">
			<span class="site-footer__giving-label"><?php esc_html_e( 'Giving back', 'nydla-wordpress' ); ?></span>
			<span class="site-footer__sep" aria-hidden="true">|</span>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Interfaith Food Pantry', 'nydla-wordpress' ); ?></a>
			<span class="site-footer__sep" aria-hidden="true">|</span>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( "Alice's Kids", 'nydla-wordpress' ); ?></a>
		</div>

		<div class="site-footer__end">
			<a class="site-footer__social" href="https://link.me/thomascapone" rel="noopener noreferrer" target="_blank"><?php esc_html_e( 'Connect', 'nydla-wordpress' ); ?></a>
			<span class="site-footer__sep" aria-hidden="true">|</span>
			<span class="site-footer__copy">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
