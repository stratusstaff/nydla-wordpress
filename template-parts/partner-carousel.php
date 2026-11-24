<?php
/**
 * Home Page-1 partner carousel (Customizer-driven).
 *
 * @package Nydla_Wordpress
 */

$slides = nydla_wp_get_partner_slides();
if ( empty( $slides ) ) {
	return;
}
?>
<section class="nydla-bleed nydla-carousel" data-nydla-carousel aria-roledescription="carousel" aria-label="<?php esc_attr_e( 'Featured partners', 'nydla-wordpress' ); ?>">
	<div class="nydla-carousel__track" data-nydla-carousel-track>
		<?php foreach ( $slides as $index => $slide ) : ?>
			<article
				class="nydla-carousel__slide"
				data-nydla-carousel-slide
				aria-hidden="<?php echo 0 === $index ? 'false' : 'true'; ?>"
			>
				<div class="nydla-carousel__media">
					<img
						src="<?php echo esc_url( $slide['image'] ); ?>"
						alt=""
						width="1920"
						height="800"
						decoding="async"
						<?php echo 0 === $index ? 'fetchpriority="high"' : 'loading="lazy"'; ?>
					>
				</div>
				<div class="nydla-carousel__copy">
					<p class="nydla-eyebrow"><?php esc_html_e( 'Featured on NYDLA', 'nydla-wordpress' ); ?></p>
					<h2 class="nydla-carousel__brand"><?php echo esc_html( $slide['title'] ); ?></h2>
					<?php if ( $slide['text'] ) : ?>
						<p class="nydla-carousel__text"><?php echo esc_html( $slide['text'] ); ?></p>
					<?php endif; ?>
					<?php if ( $slide['cta_label'] && $slide['cta_url'] ) : ?>
						<p>
							<a class="nydla-btn nydla-btn--amber" href="<?php echo esc_url( $slide['cta_url'] ); ?>">
								<?php echo esc_html( $slide['cta_label'] ); ?>
							</a>
						</p>
					<?php endif; ?>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
	<div class="nydla-carousel__controls">
		<div class="nydla-carousel__dots" data-nydla-carousel-dots aria-label="<?php esc_attr_e( 'Slides', 'nydla-wordpress' ); ?>"></div>
		<button type="button" class="nydla-carousel__btn" data-nydla-carousel-prev aria-label="<?php esc_attr_e( 'Previous', 'nydla-wordpress' ); ?>">‹</button>
		<button type="button" class="nydla-carousel__btn" data-nydla-carousel-next aria-label="<?php esc_attr_e( 'Next', 'nydla-wordpress' ); ?>">›</button>
	</div>
</section>
