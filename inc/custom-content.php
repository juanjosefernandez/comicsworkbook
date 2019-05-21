<?php

function cptui_register_my_cpts() {

	/**
	 * Post Type: Comics.
	 */

	$labels = array(
		"name" => __( "Comics", "twentynineteen" ),
		"singular_name" => __( "Comic", "twentynineteen" ),
	);

	$args = array(
		"label" => __( "Comics", "twentynineteen" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "comics", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "comics", $args );

	/**
	 * Post Type: Contributors.
	 */

	$labels = array(
		"name" => __( "Contributors", "twentynineteen" ),
		"singular_name" => __( "Contributor", "twentynineteen" ),
	);

	$args = array(
		"label" => __( "Contributors", "twentynineteen" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "contributors", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "contributors", $args );

	$labels = array(
		"name" => __( "Reviews", "twentynineteen" ),
		"singular_name" => __( "Review", "twentynineteen" ),
	);

	$args = array(
		"label" => __( "Reviews", "twentynineteen" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "Reviews", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array("category")
	);

	register_post_type( "reviews", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Themes.
	 */

	$labels = array(
		"name" => __( "Themes", "twentynineteen" ),
		"singular_name" => __( "Theme", "twentynineteen" ),
	);

	$args = array(
		"label" => __( "Themes", "twentynineteen" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'themes_tax', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "themes_tax",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "themes_tax", array( "post" ), $args );

	/**
	 * Taxonomy: Media.
	 */

	$labels = array(
		"name" => __( "Media", "twentynineteen" ),
		"singular_name" => __( "Medium", "twentynineteen" ),
	);

	$args = array(
		"label" => __( "Media", "twentynineteen" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'medium', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "medium",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "medium", array( "comics" ), $args );

	/**
	 * Taxonomy: Series.
	 */

	$labels = array(
		"name" => __( "Series", "twentynineteen" ),
		"singular_name" => __( "Series", "twentynineteen" ),
	);

	$args = array(
		"label" => __( "Series", "twentynineteen" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'series', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "series",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "series", array( "comics" ), $args );

	/**
	 * Taxonomy: Creators.
	 */

	$labels = array(
		"name" => __( "Creators", "twentynineteen" ),
		"singular_name" => __( "Creator", "twentynineteen" ),
	);

	$args = array(
		"label" => __( "Creators", "twentynineteen" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'creator', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "creator",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "creator", array( "comics" ), $args );

	/**
	 * Taxonomy: Topics.
	 */

	$labels = array(
		"name" => __( "Topics", "twentynineteen" ),
		"singular_name" => __( "Topic", "twentynineteen" ),
	);

	$args = array(
		"label" => __( "Topics", "twentynineteen" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'topics', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "topics",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "topics", array( "post" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes' );
