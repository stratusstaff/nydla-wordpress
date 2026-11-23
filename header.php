<?php
/**
 * Theme header.
 *
 * @package Nydla_Wordpress
 */
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
	<div class="site-header__inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<div class="site-branding__logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php endif; ?>

			<div class="site-branding__text">
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php bloginfo( 'name' ); ?>
				</a>
				<?php
				$nydla_tagline = get_bloginfo( 'description', 'display' );
				if ( $nydla_tagline ) :
					?>
					<p class="site-tagline"><?php echo esc_html( $nydla_tagline ); ?></p>
				<?php endif; ?>
			</div>
		</div>

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
</header>

<main id="main" class="site-main">
