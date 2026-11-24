<?php
/**
 * Placeholder shortcode for future NYDLA content-management plugin.
 *
 * Usage: [NYDLA-CMSP type="partners"] | events | podcasts
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
			'type'  => 'partners',
			'label' => '',
		),
		$atts,
		'NYDLA-CMSP'
	);

	$type = sanitize_key( $atts['type'] );
	$labels = array(
		'partners' => __( 'Featured partner carousel (Page 1)', 'nydla-wordpress' ),
		'events'   => __( 'Events banners', 'nydla-wordpress' ),
		'podcasts' => __( 'Podcasts gallery', 'nydla-wordpress' ),
	);

	$human = $atts['label'] !== ''
		? $atts['label']
		: ( isset( $labels[ $type ] ) ? $labels[ $type ] : __( 'NYDLA content module', 'nydla-wordpress' ) );

	ob_start();
	?>
	<div class="nydla-cmsp-placeholder" data-nydla-cmsp="<?php echo esc_attr( $type ); ?>" role="note">
		<p class="nydla-cmsp-placeholder__code">[NYDLA-CMSP type="<?php echo esc_attr( $type ); ?>"]</p>
		<p class="nydla-cmsp-placeholder__label"><?php echo esc_html( $human ); ?></p>
		<p class="nydla-cmsp-placeholder__hint"><?php esc_html_e( 'Placeholder for the NYDLA content-management shortcode. Replace when the CMSP plugin is live.', 'nydla-wordpress' ); ?></p>
	</div>
	<?php
	return (string) ob_get_clean();
}
add_shortcode( 'NYDLA-CMSP', 'nydla_wp_cmsp_placeholder_shortcode' );
