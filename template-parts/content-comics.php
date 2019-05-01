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
	</header><!-- .entry-header -->

	<?php //cw_post_thumbnail(); ?>
	<div class="comics-toolbar">
		<a href="<?php echo add_query_arg('layout', 'full', get_permalink());?>" class="btn btn-outline-dark btn-sm">
			Full
		</a>
		<a href="<?php echo add_query_arg('layout', 'paged', get_permalink());?>" class="btn btn-outline-dark btn-sm">
			Paged
		</a>
	</div>
	<div class="comics-content" data-mode="mode-paged">
		<?php $pages = get_post_meta($post->ID, '_cw_pages', true);
				$curpage = isset($_GET['comicpage'])? $_GET['comicpage'] : 0;
				$totalpages = count($pages);
			
				if($_GET['layout'] == 'full'):
					foreach($pages as $page) {
						$pageno = 1;
						?>
						
						<img class="comics-page" src="<?php echo $page;?>" alt="<?php echo $post->post_title;?> - Page <?php echo $pageno;?>" title="<?php echo $post->post_title;?> - Page <?php echo $pageno;?>">

						<?php
						$pageno++;
					}
				//End layout full	
				else: ?>

				<div class="comics-navigator">
					<?php if($curpage < $totalpages -1):?>
						<a href="<?php echo add_query_arg( array( 
															'layout' => 'paged', 
															'comicpage' => $curpage + 1), 
															get_permalink()
															);?>">
					<?php endif;?>
					
					<img src="<?php echo array_values($pages)[$curpage];?>" alt="<?php echo $post->post_title;?> - Page <?php echo $curpage + 1;?>" title="<?php echo $post->post_title;?> - Page <?php echo $curpage + 1;?>">
					
					<?php if($curpage < $totalpages - 1):?>
						</a>
					<?php endif?>

					<?php if($curpage < $totalpages - 1):?>
					<div class="next">
						<a href="<?php echo add_query_arg( array( 
															'layout' => 'paged', 
															'comicpage' => $curpage + 1), 
															get_permalink()
															);?>">
							<i class="fas fa-chevron-right"></i>
						</a>
					</div>
					<?php endif;?>

					<?php if($curpage > 0):?>
					<div class="prev">
						<a href="<?php echo add_query_arg( array( 
															'layout' => 'paged', 
															'comicpage' => $curpage - 1), 
															get_permalink()
															);?>">
							<i class="fas fa-chevron-left"></i>
						</a>
					</div>
					<?php endif;?>
				</div>

				<?php
				endif;
		?>

	</div>

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
