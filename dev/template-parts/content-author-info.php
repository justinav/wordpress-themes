<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dev
 */

?>

<div class="post-author">
	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), '120' ); ?>
	</div>
	<div class="author-info">
		<h4>About <?php the_author_posts_link(); ?></h4>
		<p class="author-description"><?php the_author_meta('user_description'); ?></p>
	</div>
</div> <!-- .post-author -->
