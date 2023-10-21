<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$postvideo = 'Tronix_postmeta_video';

//
// Create a metabox
//
CSF::createMetabox( $postvideo, array(
    'title'        => esc_html('Post Format Video','tronix'),
    'post_type'    => array( 'post' ),
    'post_formats' => 'video',
) );

//
// Create a section
//
CSF::createSection( $postvideo, array(
    'title'  => esc_html__( 'Add Video Link ', 'tronix' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'       => 'Tronix_post_video',
            'type'     => 'text',
            'title'    => esc_html__( 'Video Link', 'tronix' ),
            'subtitle' => esc_html__( 'Add Post Video Link here', 'tronix' ),
            'default'  => 'https://www.youtube.com/watch?v=yfFYBo0jtF0'
        ),
       
    ),
) );