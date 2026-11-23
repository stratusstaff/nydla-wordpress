<?php
/**
 * Title: Mini-site hero shell
 * Slug: nydla-wordpress/mini-site-hero
 * Categories: nydla
 * Description: Compact hero for future NYDLA.biz / vendor mini-sites. Same visual language.
 * Viewport Width: 1200
 */
?>
<!-- wp:group {"align":"full","className":"nydla-mini-hero","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull nydla-mini-hero">
	<!-- wp:group {"className":"nydla-mini-hero__media","layout":{"type":"default"}} -->
	<div class="wp-block-group nydla-mini-hero__media">
		<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/skyline-hero.svg' ); ?>" alt="" width="1920" height="800"/>
		</figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"nydla-mini-hero__content","layout":{"type":"default"}} -->
	<div class="wp-block-group nydla-mini-hero__content">
		<!-- wp:paragraph {"className":"nydla-eyebrow"} -->
		<p class="nydla-eyebrow">Sponsor mini-site</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":1,"className":"nydla-mini-hero__brand"} -->
		<h1 class="wp-block-heading nydla-mini-hero__brand">Vendor name</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"nydla-mini-hero__text"} -->
		<p class="nydla-mini-hero__text">One-line sponsor intro placeholder for NYDLA.biz pages.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
