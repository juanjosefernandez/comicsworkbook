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

			<?php 
				$locations = get_nav_menu_locations();
				$menu_id = $locations['featured-content'];
				$menuitems = wp_get_nav_menu_items( $menu_id );
				$item_left = $menuitems[0]->object_id;
				$imgleftthid = get_post_thumbnail_id($item_left);
				$image_left = wp_get_attachment_image_src($imgleftthid, 'large');

				$item_right = $menuitems[1]->object_id;
				$imgrightthid = get_post_thumbnail_id($item_right);
				$image_right = wp_get_attachment_image_src($imgrightthid, 'large');
			?>
			<div class="row">
				<div class="col-sm">
					<h1 class="section-title">Featured</h1>
				</div>
			</div>
			<div class="row featured-contents">
				<div class="col-sm">
				
					<h1>
						<a href="<?php echo get_permalink($item_left);?>">
							<?php echo get_the_title($item_left);?>		
						</a>
					</h1>

					<a href="<?php echo get_permalink($item_left);?>">
						<img src="<?php echo $image_left[0];?>" alt="<?php echo get_the_title($item_left);?>">
					</a>

				</div>

				<div class="col-sm">
					

					<h1>
						<a href="<?php echo get_permalink($item_right);?>">
							<?php echo get_the_title($item_right);?>		
						</a>
					</h1>

					<img src="<?php echo $image_right[0];?>" alt="<?php echo get_the_title($item_right);?>">
					
				</div>
			</div>
			
			<div class="row featured-sections">
				<div class="col-sm">
					<h1 class="section-title">Topics</h1>
					<?php echo home_term_list('topics');?>
				</div>
				<div class="col-sm">
					<h1 class="section-title">Themes</h1>
					<?php echo home_term_list('themes');?>
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
									
									<a href="<?php echo get_permalink($recent->ID);?>" class="recent-article <?php echo implode($catstring, ' ');?>">
										<?php if(has_post_thumbnail( $recent->ID )):?>
											<img src="<?php echo $thumbsrc[0];?>" alt="<?php echo $recent->post_title;?>">
										<?php endif;?>
											<?php echo $recent->post_title;?></a>

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
							'numberposts' => 8,
							'post_type' => 'comics',
							'post_status' => 'publish'
						);
						$comics = get_posts($args);
						if($comics) {
							foreach($comics as $comic) {
								$imgid = get_post_thumbnail_id( $comic->ID );
								$imgsrc = wp_get_attachment_image_src( $imgid, 'medium' ); 
								?>
									<article class="comic-item-grid col-md-3">
										<a style="background-image:url(<?php echo $imgsrc[0];?>);" href="<?php echo get_permalink($comic->ID);?>">
											<div class="comics-info">
												<h1><?php echo $comic->post_title;?></h1>
												<p><?php echo cw_clean_tags($comic->ID, 'creator', 'by ', ', ');?></p>
												<p><?php echo cw_clean_tags($comic->ID, 'series', 'Series: ', ', ');?></p>
											</div>
										</a>
									</article>

								<?php
							}
						}
					?>
			</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
