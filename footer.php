<?php
/**
 * Theme footer — compact utility strip (Customizer-driven).
 *
 * @package Nydla_Wordpress
 */

$giving_label = (string) nydla_wp_mod( 'nydla_giving_label', __( 'Giving back', 'nydla-wordpress' ) );
$g1_label     = (string) nydla_wp_mod( 'nydla_giving_1_label', __( 'Interfaith Food Pantry', 'nydla-wordpress' ) );
$g1_url       = (string) nydla_wp_mod( 'nydla_giving_1_url', home_url( '/' ) );
$g2_label     = (string) nydla_wp_mod( 'nydla_giving_2_label', __( "Alice's Kids", 'nydla-wordpress' ) );
$g2_url       = (string) nydla_wp_mod( 'nydla_giving_2_url', home_url( '/' ) );
$social_label = (string) nydla_wp_mod( 'nydla_social_label', __( 'Connect', 'nydla-wordpress' ) );
$social_url   = (string) nydla_wp_mod( 'nydla_social_url', 'https://link.me/thomascapone' );
$copy_name    = (string) nydla_wp_mod( 'nydla_footer_copy', get_bloginfo( 'name', 'display' ) );
$show_giving  = (bool) nydla_wp_mod( 'nydla_show_giving', true );
$show_social  = (bool) nydla_wp_mod( 'nydla_show_social', true );
?>
</main>

<footer class="site-footer" role="contentinfo">
	<div class="site-footer__inner">
		<?php if ( $show_giving ) : ?>
			<div class="site-footer__giving">
				<span class="site-footer__giving-label"><?php echo esc_html( $giving_label ); ?></span>
				<?php if ( $g1_label ) : ?>
					<span class="site-footer__sep" aria-hidden="true">|</span>
					<a href="<?php echo esc_url( $g1_url ); ?>"><?php echo esc_html( $g1_label ); ?></a>
				<?php endif; ?>
				<?php if ( $g2_label ) : ?>
					<span class="site-footer__sep" aria-hidden="true">|</span>
					<a href="<?php echo esc_url( $g2_url ); ?>"><?php echo esc_html( $g2_label ); ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="site-footer__end">
			<?php if ( $show_social && $social_url ) : ?>
				<a class="site-footer__social" href="<?php echo esc_url( $social_url ); ?>" rel="noopener noreferrer" target="_blank"><?php echo esc_html( $social_label ); ?></a>
				<span class="site-footer__sep" aria-hidden="true">|</span>
			<?php endif; ?>
			<span class="site-footer__copy">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $copy_name ); ?></span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
