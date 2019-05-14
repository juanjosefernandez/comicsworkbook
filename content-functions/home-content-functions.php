<?php

function home_term_list($taxonomy) {
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
				$output .= '<a href="' . get_term_link( $term, $taxonomy ) . '">';
				$output .=  $term->name;
				$output	.= '</a>';
				$output .= '</li>';
				
				if($key == 3) {
					$output .= '<li class="term-link"><a href="#" class="more-terms" data-taxonomy="' . $taxonomy . '">...</a></li>';	
				}
			}
		}

		

		$output .= '</ul>';

		return $output;
	}
}

function get_homepage_options() {
	$options = get_option('cw_main_options');

	return $options;
}