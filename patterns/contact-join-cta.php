<?php
/**
 * Title: Contact / Join CTA band
 * Slug: nydla-wordpress/contact-join-cta
 * Categories: nydla, call-to-action
 * Description: Full-bleed skyline CTA for contact or membership join.
 * Viewport Width: 1400
 */
?>
<!-- wp:group {"align":"full","className":"nydla-cta","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull nydla-cta">
	<!-- wp:group {"className":"nydla-cta__media","layout":{"type":"default"}} -->
	<div class="wp-block-group nydla-cta__media">
		<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/skyline-band.svg' ); ?>" alt="" width="1600" height="480"/>
		</figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"nydla-cta__inner","layout":{"type":"default"}} -->
	<div class="wp-block-group nydla-cta__inner">
		<!-- wp:paragraph {"className":"nydla-eyebrow"} -->
		<p class="nydla-eyebrow">Contact / Join</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"className":"nydla-cta__title"} -->
		<h2 class="wp-block-heading nydla-cta__title">CTA headline</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"nydla-cta__text"} -->
		<p class="nydla-cta__text">Short invitation placeholder. Wire forms later — structure only.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p><a class="nydla-btn nydla-btn--amber" href="#">Join / Contact</a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
