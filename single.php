<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cw2019
 */

get_header();
if(get_post_type( ) != 'comics'):
	$iscomic = false;
	$cols = 'col-md-9';
else:
	$iscomic = true;
	$cols = 'col-md-12';
endif;
?>
<div class="row">

	<?php
	if(!$iscomic):
		get_sidebar();
	endif;
	?>
	
	<div class="col <?php echo $cols;?>">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>


</div>

<?php
get_footer();
