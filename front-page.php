<?php
/**
 * Front page shell — structure only; patterns land in Step 3.
 *
 * @package Nydla_Wordpress
 */

get_header();
?>

<div class="front-page content-area">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'front-page__entry' ); ?>>
				<?php if ( get_the_title() ) : ?>
					<header class="entry-header screen-reader-text">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header>
				<?php endif; ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<section class="front-page__placeholder" aria-label="<?php esc_attr_e( 'Home placeholder', 'nydla-wordpress' ); ?>">
			<img
				src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/skyline-hero.svg' ); ?>"
				alt=""
				width="1920"
				height="800"
				decoding="async"
			>
		</section>
	<?php endif; ?>
</div>

<?php
get_footer();
