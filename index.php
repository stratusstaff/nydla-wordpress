<?php
/**
 * Main fallback template.
 *
 * @package Nydla_Wordpress
 */

get_header();
?>

<div class="content-area">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>

		<?php the_posts_navigation(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Nothing found.', 'nydla-wordpress' ); ?></p>
	<?php endif; ?>
</div>

<?php
get_footer();
