<?php
/**
 * Theme footer.
 *
 * @package Nydla_Wordpress
 */
?>
</main>

<footer class="site-footer" role="contentinfo">
	<div class="site-footer__inner">
		<div class="site-footer__brand">
			<p class="site-footer__name"><?php bloginfo( 'name' ); ?></p>
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description ) :
				?>
				<p class="site-footer__tagline"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>
		</div>

		<nav class="site-footer__nav" aria-label="<?php esc_attr_e( 'Footer', 'nydla-wordpress' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'container'      => false,
					'menu_class'     => 'site-footer__list',
					'fallback_cb'    => false,
					'depth'          => 1,
				)
			);
			?>
		</nav>

		<div class="site-footer__cta">
			<p class="site-footer__cta-label"><?php esc_html_e( 'Get involved', 'nydla-wordpress' ); ?></p>
			<a class="nydla-btn nydla-btn--amber" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
				<?php esc_html_e( 'Contact / Join', 'nydla-wordpress' ); ?>
			</a>
		</div>
	</div>

	<div class="site-footer__meta">
		<p>
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
			<?php bloginfo( 'name' ); ?>
		</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
