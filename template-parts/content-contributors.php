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

		?>
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

	<div class="contributions">
		<?php
			$types = array(
				'comics',
				'post',
				'reviews'
			);
			foreach($types as $type) {

			
		 
			$args = array(
				'post_type' 	=> $type,
				'numberposts' 	=> -1,
				'post_status' 	=> 'publish',
				'meta_key' 		=> '_cw_contributor',
				'meta_value'	=> $post->ID,
				'orderby'		=> 'date',
				'order'			=> 'ASC'
			);
			$contributors_posts = get_posts($args);

			if($contributors_posts) {
				$ptype = get_post_type_object($type);
				?>
				<h2><?php echo $ptype->labels->name;?></h2>
				<?php
				foreach($contributors_posts as $cpost) {
					?>
					
					<div class="contributor-article">
						<h3>
							<a href="<?php echo get_permalink($cpost->ID);?>">
								<?php echo $cpost->post_title;?>
							</a>
						</h3>
					</div>

					<?php
				}
			}

			}
		?>
	</div>

	<footer class="entry-footer">
		<?php cw_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
