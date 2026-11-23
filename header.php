<?php
/**
 * Theme header — brand-first stacked chrome (logo above, nav below).
 *
 * @package Nydla_Wordpress
 */

$nydla_logo_url = nydla_wp_brand_logo_url();
$nydla_logo_alt = sprintf(
	/* translators: %s: site name */
	__( '%s — New York Distance Learning Association', 'nydla-wordpress' ),
	get_bloginfo( 'name', 'display' )
);
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'nydla-wordpress' ); ?></a>

<header class="site-header" role="banner">
	<div class="site-header__brand">
		<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img
				src="<?php echo esc_url( $nydla_logo_url ); ?>"
				alt="<?php echo esc_attr( $nydla_logo_alt ); ?>"
				width="1200"
				height="341"
				decoding="async"
				fetchpriority="high"
			>
		</a>
	</div>

	<div class="site-header__nav-row">
		<div class="site-header__nav-inner">
			<button
				class="site-header__toggle"
				type="button"
				aria-controls="site-navigation"
				aria-expanded="false"
				data-nydla-nav-toggle
			>
				<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'nydla-wordpress' ); ?></span>
				<span class="site-header__toggle-bar" aria-hidden="true"></span>
				<span class="site-header__toggle-bar" aria-hidden="true"></span>
				<span class="site-header__toggle-bar" aria-hidden="true"></span>
			</button>

			<nav id="site-navigation" class="site-nav" aria-label="<?php esc_attr_e( 'Primary', 'nydla-wordpress' ); ?>" data-nydla-nav>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'site-nav__list',
						'fallback_cb'    => 'nydla_wp_fallback_menu',
						'depth'          => 2,
					)
				);
				?>
			</nav>
		</div>
	</div>
</header>

<main id="main" class="site-main">
