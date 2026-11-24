<?php
/**
 * NYDLA WordPress theme functions.
 *
 * @package Nydla_Wordpress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'NYDLA_WP_VERSION', '1.3.3' );
define( 'NYDLA_WP_DIR', get_template_directory() );
define( 'NYDLA_WP_URI', get_template_directory_uri() );

require_once NYDLA_WP_DIR . '/inc/cmsp-placeholder.php';
require_once NYDLA_WP_DIR . '/inc/customizer-partner-carousel.php';

/**
 * Ensure Home (page ID 10) is the static front page once.
 */
function nydla_wp_ensure_front_page() {
	$home_id = (int) get_option( 'page_on_front' );
	$mode    = get_option( 'show_on_front' );
	if ( 'page' === $mode && $home_id > 0 ) {
		return;
	}
	$home = get_page_by_path( 'home' );
	if ( ! $home ) {
		$home = get_post( 10 );
	}
	if ( ! $home || 'page' !== $home->post_type ) {
		return;
	}
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', (int) $home->ID );
}
add_action( 'init', 'nydla_wp_ensure_front_page', 20 );

/**
 * NYDLA brand logo URL — Customizer logo first, then bundled orange mark.
 *
 * @return string
 */
function nydla_wp_brand_logo_url() {
	$custom_id = (int) get_theme_mod( 'custom_logo' );
	if ( $custom_id ) {
		$custom_url = wp_get_attachment_image_url( $custom_id, 'full' );
		if ( $custom_url ) {
			return $custom_url;
		}
	}

	$candidates = array(
		'assets/images/brand/nydla-logo-orange.png',
		'assets/images/brand/nydla-logo.png',
	);

	foreach ( $candidates as $relative ) {
		$path = NYDLA_WP_DIR . '/' . $relative;
		if ( file_exists( $path ) ) {
			return add_query_arg(
				'v',
				(string) filemtime( $path ),
				trailingslashit( NYDLA_WP_URI ) . $relative
			);
		}
	}

	return trailingslashit( NYDLA_WP_URI ) . 'assets/images/brand/nydla-logo.png';
}

/**
 * Theme setup: supports, menus, image sizes.
 */
function nydla_wp_setup() {
	load_theme_textdomain( 'nydla-wordpress', NYDLA_WP_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_editor_style( 'assets/css/main.css' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'nydla-wordpress' ),
			'footer'  => __( 'Footer Navigation', 'nydla-wordpress' ),
		)
	);

	add_image_size( 'nydla-hero', 1920, 1080, true );
	add_image_size( 'nydla-band', 1600, 720, true );
	add_image_size( 'nydla-card', 640, 400, true );
	add_image_size( 'nydla-thumb', 320, 200, true );
}
add_action( 'after_setup_theme', 'nydla_wp_setup' );

/**
 * Enqueue front-end assets.
 */
function nydla_wp_enqueue_assets() {
	$css_path = NYDLA_WP_DIR . '/assets/css/main.css';
	$js_path  = NYDLA_WP_DIR . '/assets/js/main.js';

	wp_enqueue_style(
		'nydla-wp-main',
		NYDLA_WP_URI . '/assets/css/main.css',
		array(),
		file_exists( $css_path ) ? (string) filemtime( $css_path ) : NYDLA_WP_VERSION
	);

	if ( file_exists( $js_path ) && filesize( $js_path ) > 0 ) {
		wp_enqueue_script(
			'nydla-wp-main',
			NYDLA_WP_URI . '/assets/js/main.js',
			array(),
			(string) filemtime( $js_path ),
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'nydla_wp_enqueue_assets' );

/**
 * Content width for embeds / media.
 */
function nydla_wp_content_width() {
	$GLOBALS['content_width'] = 1120;
}
add_action( 'after_setup_theme', 'nydla_wp_content_width', 0 );

/**
 * Fallback primary menu when none is assigned.
 *
 * @param array $args wp_nav_menu args.
 */
function nydla_wp_fallback_menu( $args = array() ) {
	$items = array(
		home_url( '/' )           => __( 'Home', 'nydla-wordpress' ),
		home_url( '/about/' )     => __( 'About', 'nydla-wordpress' ),
		home_url( '/sponsors/' )  => __( 'Sponsors', 'nydla-wordpress' ),
		home_url( '/podcasts/' )  => __( 'Podcasts', 'nydla-wordpress' ),
		home_url( '/events/' )    => __( 'Events', 'nydla-wordpress' ),
		home_url( '/contact/' )   => __( 'Contact', 'nydla-wordpress' ),
	);

	echo '<ul class="site-nav__list">';
	foreach ( $items as $url => $label ) {
		printf(
			'<li><a href="%1$s">%2$s</a></li>',
			esc_url( $url ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}

/**
 * Register block pattern category + patterns.
 */
function nydla_wp_register_patterns() {
	register_block_pattern_category(
		'nydla',
		array(
			'label' => __( 'NYDLA', 'nydla-wordpress' ),
		)
	);

	$patterns = array(
		'home-hero',
		'about-mission',
		'sponsors-grid',
		'podcasts-list',
		'events-list',
		'contact-join-cta',
		'mini-site-hero',
	);

	foreach ( $patterns as $slug ) {
		$file = NYDLA_WP_DIR . '/patterns/' . $slug . '.php';
		if ( ! file_exists( $file ) ) {
			continue;
		}
		// WordPress 6+ auto-registers patterns/*.php with file headers.
		// Explicit register kept as belt-and-suspenders for older hosts.
	}
}
add_action( 'init', 'nydla_wp_register_patterns' );

/**
 * Helper: theme asset URL.
 *
 * @param string $relative Path under theme root.
 * @return string
 */
function nydla_wp_asset( $relative ) {
	return trailingslashit( NYDLA_WP_URI ) . ltrim( $relative, '/' );
}
