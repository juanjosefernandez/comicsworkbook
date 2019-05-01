<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cw2019
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				cw_posted_on();
				cw_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<div class="review-metadata row">
			<div class="col-md-3">
				<?php the_post_thumbnail( 'medium' );?>
			</div>
			<div class="col-md-9">
			<?php if(get_post_meta( $post->ID, '_cw_title', true )):?>
				<p class="custom-field title"><span class="label">Title:</span> <?php echo get_post_meta($post->ID, '_cw_title', true);?></p>
			<?php endif;?>

			<?php if(get_post_meta( $post->ID, '_cw_author', true )):?>
				<p class="custom-field author"><span class="label">Author:</span> <?php echo get_post_meta($post->ID, '_cw_author', true);?></p>
			<?php endif;?>
			
			<?php if(get_post_meta( $post->ID, '_cw_publisher', true )):?>
				<p class="custom-field publisher"><span class="label">Publisher:</span> <?php echo get_post_meta($post->ID, '_cw_publisher', true);?></p>
			<?php endif;?>

			<?php if(get_post_meta( $post->ID, '_cw_pagecount', true )):?>
				<p class="custom-field pagecount"><span class="label">Page Count:</span> <?php echo get_post_meta($post->ID, '_cw_pagecount', true);?></p>
			<?php endif;?>

			<?php if(get_post_meta( $post->ID, '_cw_cost', true )):?>
				<p class="custom-field cost"><span class="label">Cost:</span> <?php echo get_post_meta($post->ID, '_cw_cost', true);?></p>
			<?php endif;?>

			<?php if(get_post_meta( $post->ID, '_cw_buyplace', true )):?>
				<p class="custom-field buyplace"><span class="label">Where to buy:</span> <?php echo get_post_meta($post->ID, '_cw_buyplace', true);?></p>
			<?php endif;?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<?php //cw_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cw' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cw' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php cw_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
