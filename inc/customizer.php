<?php
/**
 * NYDLA Theme Customizer — brand, colors, chrome, footer.
 *
 * Page body copy stays in the page editor. CMSP logos stay in the plugin.
 *
 * @package Nydla_Wordpress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme mod helper with default.
 *
 * @param string $key     Mod key.
 * @param mixed  $default Default.
 * @return mixed
 */
function nydla_wp_mod( $key, $default = '' ) {
	return get_theme_mod( $key, $default );
}

/**
 * Register Customizer panels / sections / controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 */
function nydla_wp_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'nydla_theme',
		array(
			'title'       => __( 'NYDLA Theme', 'nydla-wordpress' ),
			'description' => __( 'Look-and-feel for Ann and editors — logo, colors, header, footer. Long page text is edited on each page. Sponsor logos are in NYDLA CMSP.', 'nydla-wordpress' ),
			'priority'    => 28,
		)
	);

	/* ——— Brand & logo ——— */
	$wp_customize->add_section(
		'nydla_brand',
		array(
			'title'    => __( 'Brand & logo', 'nydla-wordpress' ),
			'panel'    => 'nydla_theme',
			'priority' => 10,
		)
	);

	$logo_control = $wp_customize->get_control( 'custom_logo' );
	if ( $logo_control ) {
		$logo_control->section     = 'nydla_brand';
		$logo_control->priority    = 5;
		$logo_control->description = __( 'Upload the header logo. If empty, the bundled NYDLA mark is used.', 'nydla-wordpress' );
	}

	$icon_control = $wp_customize->get_control( 'site_icon' );
	if ( $icon_control ) {
		$icon_control->section     = 'nydla_brand';
		$icon_control->priority    = 6;
		$icon_control->description = __( 'Browser tab favicon (Site Icon).', 'nydla-wordpress' );
	}

	$brand_controls = array(
		'nydla_logo_max_height'  => array(
			'label'   => __( 'Logo max height (px)', 'nydla-wordpress' ),
			'default' => 62,
			'type'    => 'number',
			'input_attrs' => array( 'min' => 28, 'max' => 160, 'step' => 1 ),
		),
		'nydla_logo_max_width'   => array(
			'label'   => __( 'Logo max width (px)', 'nydla-wordpress' ),
			'default' => 352,
			'type'    => 'number',
			'input_attrs' => array( 'min' => 80, 'max' => 640, 'step' => 1 ),
		),
		'nydla_logo_align'       => array(
			'label'   => __( 'Logo placement', 'nydla-wordpress' ),
			'default' => 'center',
			'type'    => 'select',
			'choices' => array(
				'left'   => __( 'Left', 'nydla-wordpress' ),
				'center' => __( 'Center', 'nydla-wordpress' ),
				'right'  => __( 'Right', 'nydla-wordpress' ),
			),
		),
		'nydla_logo_area_pad_y'  => array(
			'label'   => __( 'Logo area vertical padding (px)', 'nydla-wordpress' ),
			'default' => 18,
			'type'    => 'number',
			'input_attrs' => array( 'min' => 4, 'max' => 64, 'step' => 1 ),
		),
		'nydla_show_brand_rule'  => array(
			'label'   => __( 'Show amber line under logo', 'nydla-wordpress' ),
			'default' => true,
			'type'    => 'checkbox',
		),
	);

	foreach ( $brand_controls as $id => $args ) {
		nydla_wp_customize_add_setting_control( $wp_customize, $id, 'nydla_brand', $args );
	}

	$wp_customize->add_setting(
		'nydla_logo_area_bg',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'nydla_logo_area_bg',
			array(
				'label'   => __( 'Logo area background', 'nydla-wordpress' ),
				'section' => 'nydla_brand',
			)
		)
	);

	/* ——— Header & nav ——— */
	$wp_customize->add_section(
		'nydla_header',
		array(
			'title'    => __( 'Header & navigation', 'nydla-wordpress' ),
			'panel'    => 'nydla_theme',
			'priority' => 20,
		)
	);

	$header_colors = array(
		'nydla_header_bg'     => array( 'label' => __( 'Header / nav background', 'nydla-wordpress' ), 'default' => '#ffffff' ),
		'nydla_nav_link'      => array( 'label' => __( 'Nav link color', 'nydla-wordpress' ), 'default' => '#13233a' ),
		'nydla_nav_link_hover'=> array( 'label' => __( 'Nav link hover / active', 'nydla-wordpress' ), 'default' => '#0b1220' ),
		'nydla_nav_underline' => array( 'label' => __( 'Nav underline accent', 'nydla-wordpress' ), 'default' => '#c9852a' ),
		'nydla_header_border' => array( 'label' => __( 'Header bottom border', 'nydla-wordpress' ), 'default' => '#dfe6ef' ),
	);
	foreach ( $header_colors as $id => $args ) {
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $args['default'],
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$id,
				array(
					'label'   => $args['label'],
					'section' => 'nydla_header',
				)
			)
		);
	}

	nydla_wp_customize_add_setting_control(
		$wp_customize,
		'nydla_header_sticky',
		'nydla_header',
		array(
			'label'   => __( 'Sticky header (stays at top while scrolling)', 'nydla-wordpress' ),
			'default' => true,
			'type'    => 'checkbox',
		)
	);

	/* ——— Colors & surfaces ——— */
	$wp_customize->add_section(
		'nydla_colors',
		array(
			'title'       => __( 'Colors & surfaces', 'nydla-wordpress' ),
			'description' => __( 'Brand palette used across the theme.', 'nydla-wordpress' ),
			'panel'       => 'nydla_theme',
			'priority'    => 30,
		)
	);

	$palette = array(
		'nydla_color_ink'    => array( 'label' => __( 'Ink (headings / dark text)', 'nydla-wordpress' ), 'default' => '#0b1220' ),
		'nydla_color_navy'   => array( 'label' => __( 'Navy', 'nydla-wordpress' ), 'default' => '#13233a' ),
		'nydla_color_steel'  => array( 'label' => __( 'Steel (muted text)', 'nydla-wordpress' ), 'default' => '#3a4f6a' ),
		'nydla_color_amber'  => array( 'label' => __( 'Amber / accent', 'nydla-wordpress' ), 'default' => '#c9852a' ),
		'nydla_color_mist'   => array( 'label' => __( 'Mist (light band)', 'nydla-wordpress' ), 'default' => '#e8eef5' ),
		'nydla_color_paper'  => array( 'label' => __( 'Paper (page wash)', 'nydla-wordpress' ), 'default' => '#f7f9fc' ),
		'nydla_color_white'  => array( 'label' => __( 'White', 'nydla-wordpress' ), 'default' => '#ffffff' ),
		'nydla_page_bg'      => array( 'label' => __( 'Page background (fallback flat)', 'nydla-wordpress' ), 'default' => '#f7f9fc' ),
		'nydla_footer_bg'    => array( 'label' => __( 'Footer background', 'nydla-wordpress' ), 'default' => '#0a1422' ),
		'nydla_footer_accent'=> array( 'label' => __( 'Footer top accent line', 'nydla-wordpress' ), 'default' => '#c9852a' ),
	);
	foreach ( $palette as $id => $args ) {
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $args['default'],
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$id,
				array(
					'label'   => $args['label'],
					'section' => 'nydla_colors',
				)
			)
		);
	}

	/* ——— Footer ——— */
	$wp_customize->add_section(
		'nydla_footer',
		array(
			'title'    => __( 'Footer', 'nydla-wordpress' ),
			'panel'    => 'nydla_theme',
			'priority' => 40,
		)
	);

	$footer_text = array(
		'nydla_giving_label'   => array( 'label' => __( 'Giving back label', 'nydla-wordpress' ), 'default' => 'Giving back', 'type' => 'text' ),
		'nydla_giving_1_label' => array( 'label' => __( 'Charity 1 — label', 'nydla-wordpress' ), 'default' => 'Interfaith Food Pantry', 'type' => 'text' ),
		'nydla_giving_1_url'   => array( 'label' => __( 'Charity 1 — URL', 'nydla-wordpress' ), 'default' => home_url( '/' ), 'type' => 'url' ),
		'nydla_giving_2_label' => array( 'label' => __( 'Charity 2 — label', 'nydla-wordpress' ), 'default' => "Alice's Kids", 'type' => 'text' ),
		'nydla_giving_2_url'   => array( 'label' => __( 'Charity 2 — URL', 'nydla-wordpress' ), 'default' => home_url( '/' ), 'type' => 'url' ),
		'nydla_social_label'   => array( 'label' => __( 'Social / Connect label', 'nydla-wordpress' ), 'default' => 'Connect', 'type' => 'text' ),
		'nydla_social_url'     => array( 'label' => __( 'Social / Connect URL', 'nydla-wordpress' ), 'default' => 'https://link.me/thomascapone', 'type' => 'url' ),
		'nydla_footer_copy'    => array( 'label' => __( 'Copyright text (after year)', 'nydla-wordpress' ), 'default' => 'NYDLA', 'type' => 'text' ),
		'nydla_show_giving'    => array( 'label' => __( 'Show Giving back row', 'nydla-wordpress' ), 'default' => true, 'type' => 'checkbox' ),
		'nydla_show_social'    => array( 'label' => __( 'Show Connect link', 'nydla-wordpress' ), 'default' => true, 'type' => 'checkbox' ),
	);
	foreach ( $footer_text as $id => $args ) {
		nydla_wp_customize_add_setting_control( $wp_customize, $id, 'nydla_footer', $args );
	}

	/* Move Page-1 Partners under the panel if already registered. */
	if ( $wp_customize->get_section( 'nydla_partner_carousel' ) ) {
		$wp_customize->get_section( 'nydla_partner_carousel' )->panel    = 'nydla_theme';
		$wp_customize->get_section( 'nydla_partner_carousel' )->priority = 50;
	}
}
add_action( 'customize_register', 'nydla_wp_customize_register', 5 );

/**
 * Add a simple setting + control.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 * @param string               $id           Setting ID.
 * @param string               $section      Section ID.
 * @param array                $args         Control args.
 */
function nydla_wp_customize_add_setting_control( $wp_customize, $id, $section, $args ) {
	$type    = isset( $args['type'] ) ? $args['type'] : 'text';
	$default = isset( $args['default'] ) ? $args['default'] : '';

	$sanitize = 'sanitize_text_field';
	if ( 'url' === $type ) {
		$sanitize = 'esc_url_raw';
		$type     = 'url';
	} elseif ( 'checkbox' === $type ) {
		$sanitize = function ( $v ) {
			return (bool) $v;
		};
	} elseif ( 'number' === $type ) {
		$sanitize = function ( $v ) {
			return (int) $v;
		};
	} elseif ( 'select' === $type ) {
		$choices = isset( $args['choices'] ) ? $args['choices'] : array();
		$sanitize = function ( $v ) use ( $choices, $default ) {
			return array_key_exists( $v, $choices ) ? $v : $default;
		};
	}

	$wp_customize->add_setting(
		$id,
		array(
			'default'           => $default,
			'sanitize_callback' => $sanitize,
			'transport'         => 'refresh',
		)
	);

	$control = array(
		'label'   => $args['label'],
		'section' => $section,
		'type'    => $type,
	);
	if ( ! empty( $args['choices'] ) ) {
		$control['choices'] = $args['choices'];
	}
	if ( ! empty( $args['input_attrs'] ) ) {
		$control['input_attrs'] = $args['input_attrs'];
	}
	$wp_customize->add_control( $id, $control );
}

/**
 * Print CSS variables from Customizer.
 */
function nydla_wp_customizer_css() {
	$ink     = nydla_wp_mod( 'nydla_color_ink', '#0b1220' );
	$navy    = nydla_wp_mod( 'nydla_color_navy', '#13233a' );
	$steel   = nydla_wp_mod( 'nydla_color_steel', '#3a4f6a' );
	$amber   = nydla_wp_mod( 'nydla_color_amber', '#c9852a' );
	$mist    = nydla_wp_mod( 'nydla_color_mist', '#e8eef5' );
	$paper   = nydla_wp_mod( 'nydla_color_paper', '#f7f9fc' );
	$white   = nydla_wp_mod( 'nydla_color_white', '#ffffff' );
	$page_bg = nydla_wp_mod( 'nydla_page_bg', '#f7f9fc' );
	$foot_bg = nydla_wp_mod( 'nydla_footer_bg', '#0a1422' );
	$foot_ac = nydla_wp_mod( 'nydla_footer_accent', '#c9852a' );

	$logo_h   = (int) nydla_wp_mod( 'nydla_logo_max_height', 62 );
	$logo_w   = (int) nydla_wp_mod( 'nydla_logo_max_width', 352 );
	$logo_pad = (int) nydla_wp_mod( 'nydla_logo_area_pad_y', 18 );
	$logo_bg  = nydla_wp_mod( 'nydla_logo_area_bg', '#ffffff' );
	$align    = nydla_wp_mod( 'nydla_logo_align', 'center' );
	$justify  = 'center';
	if ( 'left' === $align ) {
		$justify = 'flex-start';
	} elseif ( 'right' === $align ) {
		$justify = 'flex-end';
	}

	$header_bg = nydla_wp_mod( 'nydla_header_bg', '#ffffff' );
	$nav_link  = nydla_wp_mod( 'nydla_nav_link', '#13233a' );
	$nav_hover = nydla_wp_mod( 'nydla_nav_link_hover', '#0b1220' );
	$nav_under = nydla_wp_mod( 'nydla_nav_underline', '#c9852a' );
	$header_bd = nydla_wp_mod( 'nydla_header_border', '#dfe6ef' );
	$sticky    = (bool) nydla_wp_mod( 'nydla_header_sticky', true );

	$css = ':root{';
	$css .= '--nydla-ink:' . $ink . ';';
	$css .= '--nydla-navy:' . $navy . ';';
	$css .= '--nydla-steel:' . $steel . ';';
	$css .= '--nydla-amber:' . $amber . ';';
	$css .= '--nydla-mist:' . $mist . ';';
	$css .= '--nydla-paper:' . $paper . ';';
	$css .= '--nydla-white:' . $white . ';';
	$css .= '--nydla-page-bg:' . $page_bg . ';';
	$css .= '--nydla-footer-bg:' . $foot_bg . ';';
	$css .= '--nydla-footer-accent:' . $foot_ac . ';';
	$css .= '--nydla-logo-max-h:' . $logo_h . 'px;';
	$css .= '--nydla-logo-max-w:' . $logo_w . 'px;';
	$css .= '--nydla-logo-pad-y:' . $logo_pad . 'px;';
	$css .= '--nydla-logo-area-bg:' . $logo_bg . ';';
	$css .= '--nydla-logo-justify:' . $justify . ';';
	$css .= '--nydla-header-bg:' . $header_bg . ';';
	$css .= '--nydla-nav-link:' . $nav_link . ';';
	$css .= '--nydla-nav-hover:' . $nav_hover . ';';
	$css .= '--nydla-nav-underline:' . $nav_under . ';';
	$css .= '--nydla-header-border:' . $header_bd . ';';
	$css .= '}';

	$css .= 'body{background-color:var(--nydla-page-bg);}';
	$css .= '.site-header{background:var(--nydla-header-bg);border-bottom-color:var(--nydla-header-border);';
	$css .= $sticky ? 'position:sticky;top:0;' : 'position:relative;';
	$css .= '}';
	$css .= '.site-header__brand{background:var(--nydla-logo-area-bg);justify-content:var(--nydla-logo-justify);padding-top:var(--nydla-logo-pad-y);padding-bottom:calc(var(--nydla-logo-pad-y) * 0.45);}';
	$css .= '.site-logo img{width:min(var(--nydla-logo-max-w),80vw);max-height:var(--nydla-logo-max-h);}';
	$css .= '.site-header__nav-row{background:var(--nydla-header-bg);}';
	$css .= '.site-nav__list>li>a{color:var(--nydla-nav-link);}';
	$css .= '.site-nav__list>li>a:hover,.site-nav__list>li>a:focus-visible,.site-nav__list .current-menu-item>a,.site-nav__list .current_page_item>a{color:var(--nydla-nav-hover);border-bottom-color:var(--nydla-nav-underline);}';
	$css .= '.site-header__rule{background:var(--nydla-amber);}';
	$css .= '.site-footer{background:var(--nydla-footer-bg);border-top-color:var(--nydla-footer-accent);}';
	$css .= '.site-footer a:hover,.site-footer a:focus-visible{color:var(--nydla-amber);}';

	if ( ! nydla_wp_mod( 'nydla_show_brand_rule', true ) ) {
		$css .= '.site-header__rule{display:none;}';
	}

	echo '<style id="nydla-customizer-css">' . $css . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
add_action( 'wp_head', 'nydla_wp_customizer_css', 60 );

/**
 * REST: read/update theme mods (editors with edit_theme_options).
 */
function nydla_wp_register_theme_mods_rest() {
	register_rest_route(
		'nydla/v1',
		'/theme-mods',
		array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => 'nydla_wp_rest_get_theme_mods',
				'permission_callback' => static function () {
					return current_user_can( 'edit_theme_options' );
				},
			),
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => 'nydla_wp_rest_set_theme_mods',
				'permission_callback' => static function () {
					return current_user_can( 'edit_theme_options' );
				},
			),
		)
	);
}
add_action( 'rest_api_init', 'nydla_wp_register_theme_mods_rest' );

/**
 * Allowed theme-mod keys for REST updates.
 *
 * @return string[]
 */
function nydla_wp_rest_theme_mod_keys() {
	return array(
		'nydla_logo_max_height',
		'nydla_logo_max_width',
		'nydla_logo_align',
		'nydla_logo_area_pad_y',
		'nydla_logo_area_bg',
		'nydla_show_brand_rule',
		'nydla_header_bg',
		'nydla_nav_link',
		'nydla_nav_link_hover',
		'nydla_nav_underline',
		'nydla_header_border',
		'nydla_header_sticky',
		'nydla_color_ink',
		'nydla_color_navy',
		'nydla_color_steel',
		'nydla_color_amber',
		'nydla_color_mist',
		'nydla_color_paper',
		'nydla_color_white',
		'nydla_page_bg',
		'nydla_footer_bg',
		'nydla_footer_accent',
		'nydla_giving_label',
		'nydla_giving_1_label',
		'nydla_giving_1_url',
		'nydla_giving_2_label',
		'nydla_giving_2_url',
		'nydla_social_label',
		'nydla_social_url',
		'nydla_footer_copy',
		'nydla_show_giving',
		'nydla_show_social',
	);
}

/**
 * GET theme mods.
 *
 * @return WP_REST_Response
 */
function nydla_wp_rest_get_theme_mods() {
	$out = array();
	foreach ( nydla_wp_rest_theme_mod_keys() as $key ) {
		$out[ $key ] = get_theme_mod( $key );
	}
	return rest_ensure_response( $out );
}

/**
 * POST theme mods: JSON object of key => value.
 *
 * @param WP_REST_Request $request Request.
 * @return WP_REST_Response
 */
function nydla_wp_rest_set_theme_mods( WP_REST_Request $request ) {
	$params = $request->get_json_params();
	if ( ! is_array( $params ) ) {
		return new WP_REST_Response( array( 'error' => 'Expected JSON object' ), 400 );
	}
	$allowed = array_flip( nydla_wp_rest_theme_mod_keys() );
	$updated = array();
	foreach ( $params as $key => $value ) {
		if ( ! isset( $allowed[ $key ] ) ) {
			continue;
		}
		set_theme_mod( $key, $value );
		$updated[ $key ] = get_theme_mod( $key );
	}
	return rest_ensure_response(
		array(
			'updated' => $updated,
		)
	);
}
