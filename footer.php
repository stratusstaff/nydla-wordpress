<?php
/**
 * Theme footer — curated map (not a mega-nav dump).
 *
 * @package Nydla_Wordpress
 */
?>
</main>

<footer class="site-footer" role="contentinfo">
	<div class="site-footer__top">
		<div class="site-footer__brand">
			<p class="site-footer__name"><?php bloginfo( 'name' ); ?></p>
			<p class="site-footer__tagline"><?php esc_html_e( 'New York Distance Learning Association', 'nydla-wordpress' ); ?></p>
			<a class="nydla-btn nydla-btn--amber" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
				<?php esc_html_e( 'Contact / Join', 'nydla-wordpress' ); ?>
			</a>
			<p class="site-footer__email">
				<a href="mailto:info@NYDLA.org">info@NYDLA.org</a>
			</p>
		</div>

		<nav class="site-footer__col" aria-label="<?php esc_attr_e( 'Explore', 'nydla-wordpress' ); ?>">
			<h3><?php esc_html_e( 'Explore', 'nydla-wordpress' ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'nydla-wordpress' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/sponsors/' ) ); ?>"><?php esc_html_e( 'Sponsors', 'nydla-wordpress' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/podcasts/' ) ); ?>"><?php esc_html_e( 'Podcasts', 'nydla-wordpress' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/events/' ) ); ?>"><?php esc_html_e( 'Events', 'nydla-wordpress' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'nydla-wordpress' ); ?></a></li>
			</ul>
		</nav>

		<nav class="site-footer__col" aria-label="<?php esc_attr_e( 'Get involved', 'nydla-wordpress' ); ?>">
			<h3><?php esc_html_e( 'Get involved', 'nydla-wordpress' ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Membership', 'nydla-wordpress' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/sponsorship-plans/' ) ); ?>"><?php esc_html_e( 'Sponsorship Plans', 'nydla-wordpress' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Newsletter', 'nydla-wordpress' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Shop', 'nydla-wordpress' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'From the CEO', 'nydla-wordpress' ); ?></a></li>
			</ul>
		</nav>
	</div>

	<div class="site-footer__charity">
		<div class="site-footer__charity-inner">
			<span class="site-footer__giving-label"><?php esc_html_e( 'Giving back', 'nydla-wordpress' ); ?></span>
			<a href="https://nydla.org/" rel="noopener noreferrer"><?php esc_html_e( 'Interfaith Food Pantry', 'nydla-wordpress' ); ?></a>
			<a href="https://nydla.org/" rel="noopener noreferrer"><?php esc_html_e( 'Alice’s Kids', 'nydla-wordpress' ); ?></a>
			<span class="site-footer__social">Facebook · LinkedIn · Twitter/X</span>
		</div>
	</div>

	<div class="site-footer__meta">
		<p>
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
			<?php bloginfo( 'name' ); ?>
			— <?php esc_html_e( 'New York Distance Learning Association', 'nydla-wordpress' ); ?>
		</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
