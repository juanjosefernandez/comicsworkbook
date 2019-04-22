<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cw2019
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('archive-item archive-item-post'); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				cw_posted_on();
				cw_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php //cw_post_thumbnail(); ?>

</article><!-- #post-<?php the_ID(); ?> -->
