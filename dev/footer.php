<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dev
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<p><a href="#top">^</a></p>
		<small class="site-info">
			<?php printf( esc_html__( 'Theme %1$s by %2$s.', 'dev' ), 'dev', '<a href="http://jusv.co" rel="designer">Justina</a>' ); ?>
		</small><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
