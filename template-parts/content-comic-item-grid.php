<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cw2019
 */

?>
<?php
	$thumb = get_post_thumbnail_id( $post->ID );
	$thumbsrc = wp_get_attachment_image_src( $thumb, 'medium' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('comic-item-grid col-md-4'); ?>>
	
	<a style="background-image:url(<?php echo $thumbsrc[0];?>);" title="<?php echo the_title();?>" href="<?php echo get_permalink();?>">
		<h1><?php the_title();?></h1>
	</a>

</article><!-- #post-<?php the_ID(); ?> -->
