<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dev
 */

?>

<article id="post-<?php the_ID(); ?>" class="table" <?php post_class(); ?>>
	<?php if ( 'post' === get_post_type() ) : ?>
	<div class="cell">
		<small class="entry-meta">
			<?php dev_posted_on(); ?>
		</small><!-- .entry-meta -->
	</div>
	<?php endif; ?>

	<div class="cell">		
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</div>
</article><!-- #post-## -->
