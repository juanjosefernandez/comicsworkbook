<?php
/* Custom Fields for Comics Workbook
*/


function cw_contributors() {
	$args = array(
		'post_type' => 'contributors',
		'numberposts' => -1
	);
	$contributors = get_posts($args);

	$contributors_array[0] = 'Select contributor';

	if($contributors) {
		foreach($contributors as $contributor) {
			$contributors_array[$contributor->ID] = $contributor->post_title;
		}

		return $contributors_array;
	}

}

add_action( 'cmb2_init', 'cw_cmb2_add_metabox' );
function cw_cmb2_add_metabox() {

	$prefix = '_cw_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'cw',
		'title'        => __( 'Contributor', 'cw' ),
		'object_types' => array( 'page', 'post', 'comics' ),
		'context'      => 'side',
		'priority'     => 'high',
	) );

	$cmb->add_field( array(
		'id' => $prefix . 'contributor',
		'type' => 'select',
		'options' => 'cw_contributors'
		)
	);

}