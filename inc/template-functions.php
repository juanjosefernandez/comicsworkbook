<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cw2019
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cw_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'cw_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cw_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'cw_pingback_header' );


function cw_replace_image_in_dev( $attachment_id, $size = 'thumbnail', $icon = false) {

	return array('http://lorempixel.com/400/200/', 400, 200);

}

if(WP_ENV == 'dev') {
	//add_filter('wp_get_attachment_image_src', 'cw_replace_image_in_dev', 3, 10);	
}

add_action('pre_get_posts', 'alter_query_contributors');

function alter_query_contributors($query) {
	global $wp_query;

	if(is_post_type_archive( 'contributors' )) {
		$query->set('orderby', 'title');
		$query->set('order', 'ASC');
        $query->set('posts_per_page', '0');
		remove_all_actions( '__after_loop' );
	} else {
		return;
	}
}

add_action('pre_get_posts', 'alter_query_comics');

function alter_query_comics($query) {
    global $wp_query;

    if(is_post_type_archive(  'comics' )) {
        $query->set('posts_per_page', 12);
        remove_all_actions( '__after_loop');
    } else {
        return;
    }
}


function cw_get_the_posts_navigation( $args = array() ) {
    $navigation = '';
 
    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
        $args = wp_parse_args(
            $args,
            array(
                'prev_text'          => __( 'Older posts' ),
                'next_text'          => __( 'Newer posts' ),
                'screen_reader_text' => __( 'Posts navigation' ),
            )
        );

        $randargs = array(
        				'post_type' => 'any',
        				'numberposts' => 1,
        				'orderby' => 'rand'
        			);
 
        $next_link = get_previous_posts_link( $args['next_text'] );
        $prev_link = get_next_posts_link( $args['prev_text'] );
 		$random = get_posts($randargs);
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        //var_dump($paged);

 		if($random) {
 			foreach($random as $rand) {
 				$rand_link = '<a href="' . get_permalink($rand->ID) . '">Random</a>';
 			}
 		}

        if ( $prev_link ) {
            $navigation .= '<div class="nav-previous">' . $prev_link . '</div>';
        }

        if ($paged) {
            $navigation .= '<div class="nav-pagenumber">Page ' . $paged . '</div>';
        }

        if ($rand_link) {
        	$navigation .= '<div class="nav-random">' . $rand_link . '</div>';
        }
 
        if ( $next_link ) {
            $navigation .= '<div class="nav-next">' . $next_link . '</div>';
        }
 
        $navigation = _navigation_markup( $navigation, 'posts-navigation', $args['screen_reader_text'] );
    }
 
    return $navigation;
}

function cw_clean_tags($postid, $taxonomy, $prefix, $separator) {
    $terms = get_the_terms( $postid, $taxonomy );
    $termnames = [];
    if($terms) {
        foreach($terms as $term) {
            $termnames[] = $term->name; 
        }
    }
    //var_dump($termnames);
    if($termnames) {
        $output = $prefix . ' ' . implode($separator, $termnames);
        return $output;
    }
}