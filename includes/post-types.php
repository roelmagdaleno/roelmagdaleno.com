<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', 'rmr_create_post_types' );

/**
 * Create custom post types for custom content
 * that needs to exist in its own url or category.
 *
 * @since 0.1.7
 * @since 0.2.6 Add categories for Snippets.
 */
function rmr_create_post_types() {
	$post_types = array(
		'hub'      => array(
			'labels'       => array(
				'name'          => 'Hubs',
				'singular_name' => 'Hub',
			),
			'public'       => true,
			'hierarchical' => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-book',
			'rewrite'      => array( 'slug' => 'hub' ),
			'supports'     => array(
				'title',
				'editor',
				'revisions',
				'thumbnail',
				'page-attributes',
				'custom-fields',
				'comments',
			),
		),
		'snippets' => array(
			'labels'       => array(
				'name'          => 'Snippets',
				'singular_name' => 'Snippet',
			),
			'public'       => true,
			'hierarchical' => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-editor-code',
			'rewrite'      => array( 'slug' => 'snippets' ),
			'taxonomies'   => array( 'category' ),
			'supports'     => array(
				'title',
				'editor',
				'revisions',
				'thumbnail',
				'page-attributes',
				'excerpt',
				'comments',
			),
		),
	);

	foreach ( $post_types as $post_type => $data ) {
		register_post_type( $post_type, $data );
	}
}
