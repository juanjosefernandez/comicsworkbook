<?php

function home_term_list($taxonomy) {
	$home_options = get_homepage_options();

	if(taxonomy_exists( $taxonomy )) {
		$terms = get_terms($taxonomy, array(
			'hide_empty' => false, 'number' => 0)
		);
		$output = '<ul class="term-list term-list-' . $taxonomy . '">';

		if($terms) {
			foreach($terms as $key=>$term) {
				if($key > 3) {
					$class = 'hidden term-' . $key;
				} else {
					$class = 'term' . $key;
				}

				$output .= '<li class="' . $class . '">';
				$output .= '<a style="color:' . $home_options['txt_color']. '" href="' . get_term_link( $term, $taxonomy ) . '">';
				$output .=  $term->name;
				$output	.= '</a>';
				$output .= '</li>';
			}
		}

		
		$output .= '<li class="term-link"><a style="color:' . $home_options['txt_color']. '" href="#" class="more-terms" data-taxonomy="' . $taxonomy . '">...</a></li>';
		$output .= '</ul>';

		return $output;
	}
}

function get_homepage_options() {
	$options = get_option('cw_main_options');

	return $options;
}