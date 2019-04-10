<?php
/**
 * Home Template File
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cw2019
 */

get_header();
?>

	<div id="primary" class="content-area home-section">
		<main id="main" class="site-main">
			
			<div class="row featured-sections">
				<div class="col-sm">
					<h1 class="section-title">Topics</h1>
					<?php echo home_term_list('topics');?>
				</div>
				<div class="col-sm">
					<h1 class="section-title">Themes</h1>
					<?php echo home_term_list('themes');?>
				</div>
				<div class="col-sm">
					<h1 class="section-title">Series</h1>
					<?php echo home_term_list('series');?>
				</div>
			</div>
			
			<section class="home-recent">
				<div class="row row-title">
					<div class="col-sm">
						<h1 class="section-title">Recent</h1>
					</div>
				</div>
				
				<div class="row row-content">
					<div class="col-sm">
						<?php 
							$args = array(
								'post_type' => 'any',
								'numberposts' => 6,
								'post_status' => 'publish'
							);
							$recents = get_posts($args);
							foreach($recents as $recent) {
								$thumbimg = get_post_thumbnail_id( $recent->ID );
								$thumbsrc = wp_get_attachment_image_src( $thumbimg, 'thumbnail' );
								$cats = get_the_category($recent->ID);
								$catstring = array();
								foreach($cats as $cat) {
									$catstring[] = $cat->slug;
								}
								?>
									
									<a href="<?php echo get_permalink($recent->ID);?>" class="recent-article <?php echo implode($catstring, ' ');?>"><img src="<?php echo $thumbsrc[0];?>" alt="<?php echo $recent->post_title;?>"><?php echo $recent->post_title;?></a>

								<?php

							}
						?>
					</div>
				</div>
			</section>

			<section class="home-explore">
			<div class="row row-title">
				<div class="col-sm">
					<h1 class="section-title">Explore</h1>
				</div>
			</div>
			<div class="row row-content">
				<?php 
						$args = array(
							'numberposts' => 5,
							'post_type' => 'comics',
							'post_status' => 'publish'
						);
						$comics = get_posts($args);
						if($comics) {
							foreach($comics as $comic) {
								$imgid = get_post_thumbnail_id( $comic->ID );
								$imgsrc = wp_get_attachment_image_src( $imgid, 'medium' ); 
								?>
									
									<div class="col-sm explore-article">
										<a href="<?php echo get_permalink($comic->ID);?>">
											<img src="<?php echo $imgsrc[0];?>" alt="<?php echo $comic->post_title;?>">
										</a>
									</div>

								<?php
							}
						}
					?>
			</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
