<?php
/**
 * Title: Podcasts list shell
 * Slug: nydla-wordpress/podcasts-list
 * Categories: nydla
 * Description: Two-column podcast episode list shell with skyline thumbs.
 * Viewport Width: 1200
 */
?>
<!-- wp:group {"align":"wide","className":"nydla-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide nydla-section">
	<!-- wp:group {"className":"nydla-section__inner","layout":{"type":"default"}} -->
	<div class="wp-block-group nydla-section__inner">
		<!-- wp:paragraph {"className":"nydla-eyebrow"} -->
		<p class="nydla-eyebrow">Podcasts</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading -->
		<h2 class="wp-block-heading">Podcasts headline</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"nydla-lead"} -->
		<p class="nydla-lead">Episode list shell. Replace titles and media when content is ready.</p>
		<!-- /wp:paragraph -->

		<!-- wp:columns {"className":"nydla-grid nydla-grid--2"} -->
		<div class="wp-block-columns nydla-grid nydla-grid--2">
			<!-- wp:column {"className":"nydla-slot"} -->
			<div class="wp-block-column nydla-slot">
				<!-- wp:image {"sizeSlug":"medium","linkDestination":"none","className":"nydla-slot__media"} -->
				<figure class="wp-block-image size-medium nydla-slot__media">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/skyline-thumb.svg' ); ?>" alt="" width="640" height="400"/>
				</figure>
				<!-- /wp:image -->
				<!-- wp:heading {"level":3,"className":"nydla-slot__title"} -->
				<h3 class="wp-block-heading nydla-slot__title">Episode title</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"nydla-slot__meta"} -->
				<p class="nydla-slot__meta">Episode meta · duration</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"nydla-slot"} -->
			<div class="wp-block-column nydla-slot">
				<!-- wp:image {"sizeSlug":"medium","linkDestination":"none","className":"nydla-slot__media"} -->
				<figure class="wp-block-image size-medium nydla-slot__media">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/skyline-thumb.svg' ); ?>" alt="" width="640" height="400"/>
				</figure>
				<!-- /wp:image -->
				<!-- wp:heading {"level":3,"className":"nydla-slot__title"} -->
				<h3 class="wp-block-heading nydla-slot__title">Episode title</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"nydla-slot__meta"} -->
				<p class="nydla-slot__meta">Episode meta · duration</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
