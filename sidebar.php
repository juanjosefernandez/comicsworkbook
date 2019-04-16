<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cw2019
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col col-md-3">
	<?php if(is_singular('post')){?>
		
		<div class="aside-single-info tax-info">
			<?php cw_entry_footer();?>
		</div>
		
		<div class="aside-single-info author-info">
			<?php echo get_the_author_meta( 'display_name', $post->post_author );?>
		</div>

		<div class="aside-single-info date-info">
			<?php cw_posted_on();?>
		</div>

		<?php 
			}
		?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->