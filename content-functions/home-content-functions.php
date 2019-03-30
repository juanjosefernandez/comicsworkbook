<?php

function home_term_list($taxonomy) {
	$terms = get_terms($taxonomy, array(
		'hide_empty' => false, 'number' => 4)
	);
	$output = '<ul class="term-list term-list-' . $taxonomy . '">';

	if($terms) {
		foreach($terms as $term) {
			$output .= '<li>';
			$output .= '<a href="' . get_term_link( $term, $taxonomy ) . '">';
			$output .=  $term->name;
			$output	.= '</a>';
			$output .= '</li>';
		}
	}
	
	$output .= '<li class="term-link">...</li>';
	$output .= '</ul>';

	return $output;
}