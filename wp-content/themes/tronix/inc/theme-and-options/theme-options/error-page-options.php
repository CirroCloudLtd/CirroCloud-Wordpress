<?php
CSF::createSection( $TronixThemeOption, array(
    'parent' => 'Tronix_page_options',
    'title'  => esc_html__( 'Error 404', 'tronix' ),
    'icon'   => 'fa fa-exclamation-triangle',
    'fields' => array(

        array(
            'id'       => 'Tronix_error_page_banner',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Error Banner', 'tronix' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'tronix' ),
            'text_off' => esc_html__( 'No', 'tronix' ),
            'desc'     => esc_html__( 'Enable or disable search page banner.', 'tronix' ),
        ),
        array(
            'id'         => 'Tronix_error_page_title',
            'type'       => 'text',
            'title'      => esc_html__( 'Banner Title', 'tronix' ),
            'desc'       => esc_html__( 'Type Banner Title Here.', 'tronix' ),
            'dependency' => array( 'Tronix_error_page_banner', '==', 'true' ),
        ),
        array(
            'id'           => 'Tronix_error_image',
            'type'         => 'media',
            'title'        => esc_html__( 'Error Image', 'tronix' ),
            'library'      => 'image',
            'button_title' => esc_html__( 'Upload Image', 'tronix' ),
            'desc'         => esc_html__( 'Upload error page image', 'tronix' ),
        ),
        array(
            'id'            => 'Tronix_not_found_text',
            'type'          => 'wp_editor',
            'title'         => esc_html__( 'Not Found Text', 'tronix' ),
            'tinymce'       => true,
            'quicktags'     => true,
            'media_buttons' => false,
            'height'        => '150px',
            'desc'          => esc_html__( 'Type not found text here.', 'tronix' ),
        ),

        array(
            'id'       => 'Tronix_go_back_home',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Go Back Home Button', 'tronix' ),
            'text_on'  => esc_html__( 'Yes', 'tronix' ),
            'text_off' => esc_html__( 'No', 'tronix' ),
            'desc'     => esc_html__( 'Enable or disable go back home button.', 'tronix' ),
            'default'  => true,
        ),
        array(
            'id'         => 'Tronix_error_page_button_text',
            'type'       => 'text',
            'dependency' => array( 'Tronix_go_back_home', '==', 'true' ),
            'title'      => esc_html__( 'Bottom Text', 'tronix' ),
            'desc'       => esc_html__( 'Type Banner Title Here.', 'tronix' ),
            'default'    => esc_html__( 'Go Back Home', 'tronix' ),
        ),
    ),
) );