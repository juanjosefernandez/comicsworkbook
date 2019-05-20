<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cw2019
 */

get_header();
?>
<div class="row">
	<?php
		get_sidebar();
	?>

	<div class="col col-md-9">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
		
			<?php if ( have_posts() ) : ?>
		
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->
				<div class="table-contributors">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
		
					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content-archive', get_post_type() );
		
				endwhile;

				?>

				</div>

				<?php
		
				the_posts_navigation();
		
			else :
		
				get_template_part( 'template-parts/content', 'none' );
		
			endif;
			?>
		
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
	<?php get_template_part( 'sidebar-mobile');?>
</div>
<?php
get_footer();
