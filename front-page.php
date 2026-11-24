<?php
/**
 * Front page — Customizer partner carousel, then page content.
 *
 * @package Nydla_Wordpress
 */

get_header();
?>

<div class="front-page">
	<?php get_template_part( 'template-parts/partner', 'carousel' ); ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'front-page__entry' ); ?>>
				<header class="entry-header screen-reader-text">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

<?php
get_footer();
