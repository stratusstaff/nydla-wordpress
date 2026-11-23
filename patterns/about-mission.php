<?php
/**
 * Title: About / mission band
 * Slug: nydla-wordpress/about-mission
 * Categories: nydla
 * Description: Mission band with skyline visual. Structure only — no real copy dump.
 * Viewport Width: 1200
 */
?>
<!-- wp:group {"align":"wide","className":"nydla-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide nydla-section">
	<!-- wp:group {"className":"nydla-section__inner nydla-mission","layout":{"type":"default"}} -->
	<div class="wp-block-group nydla-section__inner nydla-mission">
		<!-- wp:group {"layout":{"type":"default"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"nydla-eyebrow"} -->
			<p class="nydla-eyebrow">New York Distance Learning Association</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"className":"nydla-mission__title"} -->
			<h2 class="wp-block-heading nydla-mission__title">Living, learning, working in the cloud</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"nydla-lead"} -->
			<p class="nydla-lead">A global forum for corporate, academic, and government leaders — exchanging ideas on digital, distance, and e-learning. Pair with the Journey arc and Three pillars patterns.</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><a class="nydla-btn" href="#">Learn more</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"nydla-mission__visual","layout":{"type":"default"}} -->
		<div class="wp-block-group nydla-mission__visual">
			<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
			<figure class="wp-block-image size-large">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/skyline-band.svg' ); ?>" alt="" width="1600" height="480"/>
			</figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
