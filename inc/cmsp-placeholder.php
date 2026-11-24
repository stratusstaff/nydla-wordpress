<?php
/**
 * Placeholder shortcode for future NYDLA content-management plugin (sponsors / events / podcasts).
 *
 * Usage: [NYDLA-CMSP type="sponsors"] | events | podcasts
 * Not used for the Home Page-1 partner carousel (that is theme Customizer).
 *
 * @package Nydla_Wordpress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render a visible placeholder until the CMSP plugin ships.
 *
 * @param array|string $atts Shortcode attributes.
 * @return string
 */
function nydla_wp_cmsp_placeholder_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'type'  => 'sponsors',
			'label' => '',
		),
		$atts,
		'NYDLA-CMSP'
	);

	$type = sanitize_key( $atts['type'] );
	$labels = array(
		'sponsors' => __( 'Our sponsors — logo gallery', 'nydla-wordpress' ),
		'events'   => __( 'Events banners', 'nydla-wordpress' ),
		'podcasts' => __( 'Podcasts gallery', 'nydla-wordpress' ),
	);

	if ( 'partners' === $type ) {
		$type = 'sponsors';
	}

	$human = $atts['label'] !== ''
		? $atts['label']
		: ( isset( $labels[ $type ] ) ? $labels[ $type ] : __( 'NYDLA content module', 'nydla-wordpress' ) );

	ob_start();
	?>
	<div class="nydla-cmsp-placeholder" data-nydla-cmsp="<?php echo esc_attr( $type ); ?>" role="note">
		<p class="nydla-cmsp-placeholder__label"><?php echo esc_html( $human ); ?></p>
		<?php if ( 'sponsors' === $type ) : ?>
			<ul class="nydla-cmsp-placeholder__grid" aria-hidden="true">
				<?php for ( $i = 0; $i < 8; $i++ ) : ?>
					<li class="nydla-cmsp-placeholder__slot"><?php esc_html_e( 'Logo', 'nydla-wordpress' ); ?></li>
				<?php endfor; ?>
			</ul>
			<p class="nydla-cmsp-placeholder__hint"><?php esc_html_e( 'Sponsor logos will appear here when the NYDLA CMSP plugin is live. Shortcode: [NYDLA-CMSP type="sponsors"]', 'nydla-wordpress' ); ?></p>
		<?php else : ?>
			<p class="nydla-cmsp-placeholder__code">[NYDLA-CMSP type="<?php echo esc_attr( $type ); ?>"]</p>
			<p class="nydla-cmsp-placeholder__hint"><?php esc_html_e( 'Placeholder for the NYDLA content-management plugin.', 'nydla-wordpress' ); ?></p>
		<?php endif; ?>
	</div>
	<?php
	return (string) ob_get_clean();
}
add_shortcode( 'NYDLA-CMSP', 'nydla_wp_cmsp_placeholder_shortcode' );
