<?php
/**
 * Customizer: Home Page-1 partner carousel (theme-owned, not CMSP).
 *
 * @package Nydla_Wordpress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Number of partner slides.
 *
 * @return int
 */
function nydla_wp_partner_slide_count() {
	return 3;
}

/**
 * Default slide seed data.
 *
 * @return array<int, array<string, string>>
 */
function nydla_wp_partner_slide_defaults() {
	$skyline = trailingslashit( NYDLA_WP_URI ) . 'assets/images/skyline-hero.svg';
	return array(
		1 => array(
			'title'     => 'GoTo',
			'text'      => 'Seamless modern meetings for teams that teach, train, and lead across time zones.',
			'cta_label' => 'Learn more',
			'cta_url'   => '#',
			'image'     => $skyline,
		),
		2 => array(
			'title'     => 'Featured partner',
			'text'      => 'Add a second Page-1 partner story in Appearance → Customize → Page-1 Partners.',
			'cta_label' => 'Learn more',
			'cta_url'   => '#',
			'image'     => $skyline,
		),
		3 => array(
			'title'     => 'Featured partner',
			'text'      => 'Add a third Page-1 partner story in Appearance → Customize → Page-1 Partners.',
			'cta_label' => 'Learn more',
			'cta_url'   => '#',
			'image'     => $skyline,
		),
	);
}

/**
 * Register Customizer controls for partner slides.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 */
function nydla_wp_customize_partner_carousel( $wp_customize ) {
	$wp_customize->add_section(
		'nydla_partner_carousel',
		array(
			'title'       => __( 'Page-1 Partners', 'nydla-wordpress' ),
			'description' => __( 'Home hero carousel — sold featured-partner placements (title, text, CTA, image). Not the sponsors logo gallery.', 'nydla-wordpress' ),
			'priority'    => 32,
		)
	);

	$defaults = nydla_wp_partner_slide_defaults();

	for ( $i = 1; $i <= nydla_wp_partner_slide_count(); $i++ ) {
		$wp_customize->add_setting(
			"nydla_partner_{$i}_title",
			array(
				'default'           => $defaults[ $i ]['title'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			"nydla_partner_{$i}_title",
			array(
				/* translators: %d: slide number */
				'label'   => sprintf( __( 'Slide %d — title', 'nydla-wordpress' ), $i ),
				'section' => 'nydla_partner_carousel',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			"nydla_partner_{$i}_text",
			array(
				'default'           => $defaults[ $i ]['text'],
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			"nydla_partner_{$i}_text",
			array(
				/* translators: %d: slide number */
				'label'   => sprintf( __( 'Slide %d — text', 'nydla-wordpress' ), $i ),
				'section' => 'nydla_partner_carousel',
				'type'    => 'textarea',
			)
		);

		$wp_customize->add_setting(
			"nydla_partner_{$i}_cta_label",
			array(
				'default'           => $defaults[ $i ]['cta_label'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			"nydla_partner_{$i}_cta_label",
			array(
				/* translators: %d: slide number */
				'label'   => sprintf( __( 'Slide %d — button label', 'nydla-wordpress' ), $i ),
				'section' => 'nydla_partner_carousel',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			"nydla_partner_{$i}_cta_url",
			array(
				'default'           => $defaults[ $i ]['cta_url'],
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			"nydla_partner_{$i}_cta_url",
			array(
				/* translators: %d: slide number */
				'label'   => sprintf( __( 'Slide %d — button URL', 'nydla-wordpress' ), $i ),
				'section' => 'nydla_partner_carousel',
				'type'    => 'url',
			)
		);

		$wp_customize->add_setting(
			"nydla_partner_{$i}_image",
			array(
				'default'           => $defaults[ $i ]['image'],
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				"nydla_partner_{$i}_image",
				array(
					/* translators: %d: slide number */
					'label'   => sprintf( __( 'Slide %d — image', 'nydla-wordpress' ), $i ),
					'section' => 'nydla_partner_carousel',
				)
			)
		);
	}
}
add_action( 'customize_register', 'nydla_wp_customize_partner_carousel' );

/**
 * Collected slides for the front-end carousel.
 *
 * @return array<int, array<string, string>>
 */
function nydla_wp_get_partner_slides() {
	$defaults = nydla_wp_partner_slide_defaults();
	$slides   = array();

	for ( $i = 1; $i <= nydla_wp_partner_slide_count(); $i++ ) {
		$title = trim( (string) get_theme_mod( "nydla_partner_{$i}_title", $defaults[ $i ]['title'] ) );
		if ( '' === $title ) {
			continue;
		}
		$slides[] = array(
			'title'     => $title,
			'text'      => (string) get_theme_mod( "nydla_partner_{$i}_text", $defaults[ $i ]['text'] ),
			'cta_label' => (string) get_theme_mod( "nydla_partner_{$i}_cta_label", $defaults[ $i ]['cta_label'] ),
			'cta_url'   => (string) get_theme_mod( "nydla_partner_{$i}_cta_url", $defaults[ $i ]['cta_url'] ),
			'image'     => (string) get_theme_mod( "nydla_partner_{$i}_image", $defaults[ $i ]['image'] ),
		);
	}

	return $slides;
}
