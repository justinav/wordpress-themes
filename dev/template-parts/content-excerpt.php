<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dev
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<small class="entry-meta">
			<?php dev_posted_on(); ?>
		</small><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_post_thumbnail();

			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'dev' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dev' ),
				'after'  => '</div>',
			) );
		?>

		<a href="<?php the_permalink(); ?>" class="read-more">Read More <span>&rsaquo;</span></a>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php dev_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
