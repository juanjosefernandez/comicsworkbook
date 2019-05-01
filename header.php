<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cw2019
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="masthead" class="site-header">
	<div class="container header-container">
			<?php if(is_home() || is_singular('comics')):
				$logo = (is_home())? 'cw_logo_white_small.png' : 'cw_logo_black_small.png';
			?>
				<div class="site-branding row">
					<a href="<?php bloginfo('url');?>" class="col-md-2">
						<img class="site-logo" src="<?php echo get_bloginfo('template_url') . '/img/' . $logo;?>" alt="<?php bloginfo('name');?>">
					</a>
					<div class="col-md-10">
						<h1 class="site-title"><?php bloginfo('name');?></h1>
						<p class="site-description"><?php 
						$cw_description = get_bloginfo( 'description', 'display' );
						echo $cw_description; /* WPCS: xss ok. */ ?></p>
					</div>
				</div>
			<?php endif;?>

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'cw' ); ?></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->

			<?php
			if(is_home()):
				
				if ( $cw_description || is_customize_preview() ) :
					?>
					
				<?php endif; else:

			endif; ?>
			</div>
		</header><!-- #masthead -->
	
	<div id="page" class="site container">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'cw' ); ?></a>



		<div id="content" class="site-content">
