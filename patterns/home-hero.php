<?php
/**
 * Title: Home hero (skyline)
 * Slug: nydla-wordpress/home-hero
 * Categories: nydla, featured
 * Description: Full-bleed skyline hero with brand-first composition. Structure only.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"align":"full","className":"nydla-hero","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull nydla-hero">
	<!-- wp:group {"className":"nydla-hero__media","layout":{"type":"default"}} -->
	<div class="wp-block-group nydla-hero__media">
		<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/skyline-hero.svg' ); ?>" alt="" width="1920" height="800"/>
		</figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"nydla-hero__content","layout":{"type":"default"}} -->
	<div class="wp-block-group nydla-hero__content">
		<!-- wp:paragraph {"className":"nydla-eyebrow"} -->
		<p class="nydla-eyebrow">New York Distance Learning Association</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":1,"className":"nydla-hero__brand"} -->
		<h1 class="wp-block-heading nydla-hero__brand">NYDLA</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"nydla-hero__text"} -->
		<p class="nydla-hero__text">One short supporting sentence goes here.</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"nydla-hero__actions","layout":{"type":"flex","flexWrap":"wrap"}} -->
		<div class="wp-block-group nydla-hero__actions">
			<!-- wp:paragraph -->
			<p><a class="nydla-btn" href="#">Primary CTA</a></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph -->
			<p><a class="nydla-btn nydla-btn--ghost" href="#">Secondary</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
