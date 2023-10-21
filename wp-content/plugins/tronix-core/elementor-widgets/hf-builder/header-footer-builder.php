<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function tronix_register_header_footer_custom_post() {

	// Register Footer Builder Post Type
	register_post_type('tronix_header',
		array(
			'labels'       => array(
				'name'                  => esc_html__('Tronix Headers', 'tronixcore'),
				'singular_name'         => esc_html__('Header', 'tronixcore'),
				'add_new_item'          => esc_html__('Add New Header', 'tronixcore'),
				'all_items'             => esc_html__('All Headers', 'tronixcore'),
				'add_new'               => esc_html__('Add New', 'tronixcore'),
				'edit_item'             => esc_html__('Edit Header', 'tronixcore'),
			),
			'rewrite'      => array(
				'slug'       => 'header',
				'with_front' => true,
			),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'query_var'          => true,
			'has_archive'        => true,
			'menu_icon'    => 'dashicons-editor-kitchensink',
			'show_in_rest'    => false,
			'supports'     => array('title','thumbnail'),
		)
	);

	// Register Footer Builder Post Type
	register_post_type('tronix_footer',
		array(
			'labels'       => array(
				'name'                  => esc_html__('Tronix Footers', 'tronixcore'),
				'singular_name'         => esc_html__('Footer', 'tronixcore'),
				'add_new_item'          => esc_html__('Add New Footer', 'tronixcore'),
				'all_items'             => esc_html__('All Footers', 'tronixcore'),
				'add_new'               => esc_html__('Add New', 'tronixcore'),
				'edit_item'             => esc_html__('Edit Footer', 'tronixcore'),
			),
			'rewrite'      => array(
				'slug'       => 'footer',
				'with_front' => true,
			),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'query_var'          => true,
			'has_archive'        => true,
			'menu_icon'    => 'dashicons-editor-kitchensink',
			'show_in_rest'    => false,
			'supports'     => array('title','thumbnail'),
		)
	);

	
}

add_action( 'init', 'tronix_register_header_footer_custom_post' );


/**
 *  Footer Canvas
 */
function tronix_header_footer_builder_canvas() {
	global $post;

	// Check if its a correct post type/types to apply template
	if ( !in_array( $post->post_type, ['tronix_footer','tronix_header'] ) || !did_action( 'elementor/loaded' ) ) {
		return;
	}
	// Check that a template is not set already
	if ( '' !== $post->page_template ) {
		return;
	}
	// Make sure its not a page for posts
	if ( get_option( 'page_for_posts' ) === $post->ID ) {
		return;
	}

	//Finally set the page template
	$post->page_template = 'elementor_canvas';
	update_post_meta( $post->ID, '_wp_page_template', 'elementor_canvas' );
}

add_action( 'add_meta_boxes', 'tronix_header_footer_builder_canvas', 10 );


add_action( 'elementor/init', function() {
    // Register the 'tronix_header' custom post type
    register_post_type( 'tronix_header', array(
        'labels' => array(
            'name' => __( 'Tronix Headers', 'elementor' ),
            'singular_name' => __( 'Tronix Header', 'elementor' ),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title' ),
    ) );
    // Add Elementor support to the 'tronix_header' custom post type
    add_post_type_support( 'tronix_header', 'elementor' );

    // Register the 'tronix_footer' custom post type
    register_post_type( 'tronix_footer', array(
        'labels' => array(
            'name' => __( 'Tronix Footers', 'elementor' ),
            'singular_name' => __( 'Tronix Footer', 'elementor' ),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title' ),
    ) );
    // Add Elementor support to the 'tronix_footer' custom post type
    add_post_type_support( 'tronix_footer', 'elementor' );
} );
