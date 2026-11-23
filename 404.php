<?php
/**
 * 404 template.
 *
 * @package Nydla_Wordpress
 */

get_header();
?>

<div class="content-area error-404">
	<header class="entry-header">
		<h1 class="entry-title"><?php esc_html_e( 'Page not found', 'nydla-wordpress' ); ?></h1>
	</header>
	<div class="entry-content">
		<p><?php esc_html_e( 'That page does not exist or has moved.', 'nydla-wordpress' ); ?></p>
		<p>
			<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php esc_html_e( 'Back to home', 'nydla-wordpress' ); ?>
			</a>
		</p>
		<figure class="error-404__visual">
			<img
				src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/skyline-band.svg' ); ?>"
				alt=""
				width="1600"
				height="480"
				decoding="async"
			>
		</figure>
	</div>
</div>

<?php
get_footer();
