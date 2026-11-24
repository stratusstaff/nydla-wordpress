<?php
/**
 * Theme footer — lean curated map.
 *
 * @package Nydla_Wordpress
 */
?>
</main>

<footer class="site-footer" role="contentinfo">
	<div class="site-footer__top">
		<nav class="site-footer__col" aria-label="<?php esc_attr_e( 'Explore', 'nydla-wordpress' ); ?>">
			<h3><?php esc_html_e( 'Explore', 'nydla-wordpress' ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'nydla-wordpress' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/sponsors/' ) ); ?>"><?php esc_html_e( 'Sponsors', 'nydla-wordpress' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/podcasts/' ) ); ?>"><?php esc_html_e( 'Podcasts', 'nydla-wordpress' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/events/' ) ); ?>"><?php esc_html_e( 'Events', 'nydla-wordpress' ); ?></a></li>
			</ul>
		</nav>

		<nav class="site-footer__col" aria-label="<?php esc_attr_e( 'Get involved', 'nydla-wordpress' ); ?>">
			<h3><?php esc_html_e( 'Get involved', 'nydla-wordpress' ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'nydla-wordpress' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/sponsorship-plans/' ) ); ?>"><?php esc_html_e( 'Sponsorship Plans', 'nydla-wordpress' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Membership', 'nydla-wordpress' ); ?></a></li>
			</ul>
		</nav>
	</div>

	<div class="site-footer__charity">
		<div class="site-footer__charity-inner">
			<span class="site-footer__giving-label"><?php esc_html_e( 'Giving back', 'nydla-wordpress' ); ?></span>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Interfaith Food Pantry', 'nydla-wordpress' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( "Alice's Kids", 'nydla-wordpress' ); ?></a>
			<a class="site-footer__social" href="https://link.me/thomascapone" rel="noopener noreferrer" target="_blank"><?php esc_html_e( 'Connect', 'nydla-wordpress' ); ?></a>
		</div>
	</div>

	<div class="site-footer__meta">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
