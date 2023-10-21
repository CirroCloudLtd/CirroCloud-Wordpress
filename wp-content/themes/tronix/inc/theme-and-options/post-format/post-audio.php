<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$postaudio = 'Tronix_postmeta_audio';

//
// Create a metabox
//
CSF::createMetabox( $postaudio, array(
    'title'        => esc_html('Post Format Audio','tronix'),
    'post_type'    => array( 'post' ),
    'post_formats' => 'audio',
) );

//
// Create a section
//
CSF::createSection( $postaudio, array(
    'title'  => esc_html__( 'Add Audio Link ', 'tronix' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'       => 'Tronix_post_audio',
            'type'  => 'code_editor',
			'settings' => array(
				'theme'  => 'monokai',
				'mode'   => 'htmlmixed',
			),
            'title'    => esc_html__( 'Audio Link', 'tronix' ),
            'subtitle' => esc_html__( 'Add Post Audio Link here', 'tronix' ),
            'default'  => '<iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/805851493&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>'
        ),
    ),
) );