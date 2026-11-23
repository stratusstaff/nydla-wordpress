<?php
/**
 * Title: Sponsors grid shell
 * Slug: nydla-wordpress/sponsors-grid
 * Categories: nydla
 * Description: Three-slot sponsors grid with skyline placeholders.
 * Viewport Width: 1200
 */
?>
<!-- wp:group {"align":"wide","className":"nydla-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide nydla-section">
	<!-- wp:group {"className":"nydla-section__inner","layout":{"type":"default"}} -->
	<div class="wp-block-group nydla-section__inner">
		<!-- wp:paragraph {"className":"nydla-eyebrow"} -->
		<p class="nydla-eyebrow">Sponsors</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading -->
		<h2 class="wp-block-heading">Sponsors headline</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"nydla-lead"} -->
		<p class="nydla-lead">Grid shell for sponsor logos or profiles. Swap placeholders later.</p>
		<!-- /wp:paragraph -->

		<!-- wp:columns {"className":"nydla-grid"} -->
		<div class="wp-block-columns nydla-grid">
			<!-- wp:column {"className":"nydla-slot"} -->
			<div class="wp-block-column nydla-slot">
				<!-- wp:image {"sizeSlug":"medium","linkDestination":"none","className":"nydla-slot__media"} -->
				<figure class="wp-block-image size-medium nydla-slot__media">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/skyline-thumb.svg' ); ?>" alt="" width="640" height="400"/>
				</figure>
				<!-- /wp:image -->
				<!-- wp:heading {"level":3,"className":"nydla-slot__title"} -->
				<h3 class="wp-block-heading nydla-slot__title">Sponsor slot</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"nydla-slot__meta"} -->
				<p class="nydla-slot__meta">Tier / category</p>
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
				<h3 class="wp-block-heading nydla-slot__title">Sponsor slot</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"nydla-slot__meta"} -->
				<p class="nydla-slot__meta">Tier / category</p>
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
				<h3 class="wp-block-heading nydla-slot__title">Sponsor slot</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"nydla-slot__meta"} -->
				<p class="nydla-slot__meta">Tier / category</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
