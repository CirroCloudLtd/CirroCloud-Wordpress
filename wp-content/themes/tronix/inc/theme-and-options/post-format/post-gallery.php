<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$postgallery = 'Tronix_postmeta_gallery';

//
// Create a metabox
//
CSF::createMetabox( $postgallery, array(
    'title'        => esc_html('Post Format image Gallery','tronix'),
    'post_type'    => array( 'post' ),
    'post_formats' => 'gallery',
) );

//
// Create a section
//
CSF::createSection( $postgallery, array(
    'title'  => esc_html__( 'Add Gallery Image', 'tronix' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'          => 'Tronix_post_gallery',
            'type'        => 'gallery',
            'title'       => esc_html('Gallery','tronix'),
            'add_title'   => esc_html('Add Image','tronix'),
            'edit_title'  => esc_html('Edit Image','tronix'),
            'clear_title' => esc_html('Remove Image','tronix'),
        ),
    ),
) );