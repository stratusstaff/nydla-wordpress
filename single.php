<?php
/**
 * Single post template.
 *
 * @package Nydla_Wordpress
 */

get_header();
?>

<div class="content-area">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<p class="entry-meta">
					<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
						<?php echo esc_html( get_the_date() ); ?>
					</time>
				</p>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer class="entry-footer">
				<?php the_post_navigation(); ?>
			</footer>
		</article>
	<?php endwhile; ?>
</div>

<?php
get_footer();
