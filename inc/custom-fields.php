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

add_action( 'cmb2_init', 'cw_reviews_add_metabox' );
function cw_reviews_add_metabox() {

	$prefix = '_cw_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'book_metadata',
		'title'        => __( 'Book / Publication info', 'cw' ),
		'object_types' => array( 'reviews' ),
		'context'      => 'side',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'Book / Publication Title', 'cw' ),
		'id' => $prefix . 'title',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Author', 'cw' ),
		'id' => $prefix . 'author',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Publisher', 'cw' ),
		'id' => $prefix . 'publisher',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Page count', 'cw' ),
		'id' => $prefix . 'pagecount ',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Cost', 'cw' ),
		'id' => $prefix . 'cost',
		'type' => 'text_money',
	) );

	$cmb->add_field( array(
		'name' => __( 'Where to buy', 'cw' ),
		'id' => $prefix . 'buyplace',
		'type' => 'text_url',
	) );

}

add_action( 'cmb2_init', 'cw_contributors_add_metabox' );
function cw_contributors_add_metabox() {

	$prefix = '_cw_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'contributor_metadata',
		'title'        => __( 'Contributor Info', 'cw' ),
		'object_types' => array( 'contributors' ),
		'context'      => 'side',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'Contributor URL', 'cw' ),
		'id' => $prefix . 'contributor_url',
		'type' => 'text_url',
	) );

}