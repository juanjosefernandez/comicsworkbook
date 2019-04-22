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
	<?php if(!is_home()){?>
		<div class="aside-site-desc">
			<a href="<?php bloginfo('url');?>">
				<img class="site-logo" src="<?php bloginfo('template_url');?>/img/cw_logo_black_small.png" alt="<?php bloginfo('name');?>">
			</a>
			
			<h1 class="site-title"><?php bloginfo('name');?></h1>
			<p class="site-description"><?php 
			$cw_description = get_bloginfo( 'description', 'display' );
			echo $cw_description; /* WPCS: xss ok. */ ?></p>	
		</div>
<?php }?>

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