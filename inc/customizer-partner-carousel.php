<?php
/**
 * Customizer: Home Page-1 partner carousel (theme-owned, not CMSP).
 * Editors can use 1–10 slides.
 *
 * @package Nydla_Wordpress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hard max slides in Customizer.
 *
 * @return int
 */
function nydla_wp_partner_slide_max() {
	return 10;
}

/**
 * Active slide count (1–10).
 *
 * @return int
 */
function nydla_wp_partner_slide_count() {
	$count = (int) get_theme_mod( 'nydla_partner_slide_count', 3 );
	if ( $count < 1 ) {
		$count = 1;
	}
	if ( $count > nydla_wp_partner_slide_max() ) {
		$count = nydla_wp_partner_slide_max();
	}
	return $count;
}

/**
 * Default slide seed data (slots 1–10).
 *
 * @return array<int, array<string, string>>
 */
function nydla_wp_partner_slide_defaults() {
	$skyline = trailingslashit( NYDLA_WP_URI ) . 'assets/images/skyline-hero.svg';
	$defaults = array(
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

	for ( $i = 4; $i <= nydla_wp_partner_slide_max(); $i++ ) {
		$defaults[ $i ] = array(
			'title'     => sprintf(
				/* translators: %d: slide number */
				__( 'Featured partner %d', 'nydla-wordpress' ),
				$i
			),
			'text'      => __( 'Add this partner story in Appearance → Customize → Page-1 Partners.', 'nydla-wordpress' ),
			'cta_label' => __( 'Learn more', 'nydla-wordpress' ),
			'cta_url'   => '#',
			'image'     => $skyline,
		);
	}

	return $defaults;
}

/**
 * Whether slide controls for index N should show (N <= active count).
 *
 * @param WP_Customize_Control $control Control.
 * @return bool
 */
function nydla_wp_partner_slide_active( $control ) {
	$id = $control->id;
	if ( ! preg_match( '/nydla_partner_(\d+)_/', $id, $m ) ) {
		return true;
	}
	$index = (int) $m[1];
	return $index <= nydla_wp_partner_slide_count();
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
			'description' => __( 'Home hero carousel — sold featured-partner placements. Set how many slides (1–10), then edit each. Not the sponsors logo gallery.', 'nydla-wordpress' ),
			'panel'       => 'nydla_theme',
			'priority'    => 50,
		)
	);

	$wp_customize->add_setting(
		'nydla_partner_slide_count',
		array(
			'default'           => 3,
			'sanitize_callback' => static function ( $value ) {
				$n = (int) $value;
				if ( $n < 1 ) {
					$n = 1;
				}
				if ( $n > nydla_wp_partner_slide_max() ) {
					$n = nydla_wp_partner_slide_max();
				}
				return $n;
			},
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'nydla_partner_slide_count',
		array(
			'label'       => __( 'Number of slides', 'nydla-wordpress' ),
			'description' => __( 'Use 1 for a single hero. Maximum 10. Raise the number to add a slide; lower it to hide extras (their content is kept if you raise again).', 'nydla-wordpress' ),
			'section'     => 'nydla_partner_carousel',
			'type'        => 'number',
			'priority'    => 1,
			'input_attrs' => array(
				'min'  => 1,
				'max'  => nydla_wp_partner_slide_max(),
				'step' => 1,
			),
		)
	);

	$defaults = nydla_wp_partner_slide_defaults();

	for ( $i = 1; $i <= nydla_wp_partner_slide_max(); $i++ ) {
		$active = array( 'active_callback' => 'nydla_wp_partner_slide_active' );

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
			array_merge(
				array(
					/* translators: %d: slide number */
					'label'    => sprintf( __( 'Slide %d — title', 'nydla-wordpress' ), $i ),
					'section'  => 'nydla_partner_carousel',
					'type'     => 'text',
					'priority' => 10 + ( $i * 10 ),
				),
				$active
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
			array_merge(
				array(
					/* translators: %d: slide number */
					'label'    => sprintf( __( 'Slide %d — text', 'nydla-wordpress' ), $i ),
					'section'  => 'nydla_partner_carousel',
					'type'     => 'textarea',
					'priority' => 11 + ( $i * 10 ),
				),
				$active
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
			array_merge(
				array(
					/* translators: %d: slide number */
					'label'    => sprintf( __( 'Slide %d — button label', 'nydla-wordpress' ), $i ),
					'section'  => 'nydla_partner_carousel',
					'type'     => 'text',
					'priority' => 12 + ( $i * 10 ),
				),
				$active
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
			array_merge(
				array(
					/* translators: %d: slide number */
					'label'    => sprintf( __( 'Slide %d — button URL', 'nydla-wordpress' ), $i ),
					'section'  => 'nydla_partner_carousel',
					'type'     => 'url',
					'priority' => 13 + ( $i * 10 ),
				),
				$active
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
				array_merge(
					array(
						/* translators: %d: slide number */
						'label'    => sprintf( __( 'Slide %d — image', 'nydla-wordpress' ), $i ),
						'section'  => 'nydla_partner_carousel',
						'priority' => 14 + ( $i * 10 ),
					),
					$active
				)
			)
		);
	}
}
add_action( 'customize_register', 'nydla_wp_customize_partner_carousel', 10 );

/**
 * Collected slides for the front-end carousel.
 *
 * @return array<int, array<string, string>>
 */
function nydla_wp_get_partner_slides() {
	$defaults = nydla_wp_partner_slide_defaults();
	$slides   = array();
	$count    = nydla_wp_partner_slide_count();

	for ( $i = 1; $i <= $count; $i++ ) {
		$def   = isset( $defaults[ $i ] ) ? $defaults[ $i ] : $defaults[1];
		$title = trim( (string) get_theme_mod( "nydla_partner_{$i}_title", $def['title'] ) );
		if ( '' === $title ) {
			continue;
		}
		$slides[] = array(
			'title'     => $title,
			'text'      => (string) get_theme_mod( "nydla_partner_{$i}_text", $def['text'] ),
			'cta_label' => (string) get_theme_mod( "nydla_partner_{$i}_cta_label", $def['cta_label'] ),
			'cta_url'   => (string) get_theme_mod( "nydla_partner_{$i}_cta_url", $def['cta_url'] ),
			'image'     => (string) get_theme_mod( "nydla_partner_{$i}_image", $def['image'] ),
		);
	}

	return $slides;
}
