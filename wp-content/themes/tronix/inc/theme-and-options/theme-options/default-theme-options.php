<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
function Tronix_default_theme_options() {
    return array(
        'Tronix_copyright_text'   => wp_kses(
            __( '&copy; Copyright 2023 Tronix All Rights Reserved', 'tronix' ),
            array(
                'a'      => array(
                    'href' => array(),
                ),
                'strong' => array(),
                'small'  => array(),
                'span'   => array(),
            )
        ),

        'Tronix_not_found_text'   => wp_kses(
            __( '<h2> Oops! </h2> <h2> That page can&rsquo;t be found.</h2><p>The page you are looking for is not available or doesn’t belong to this website!</p>', 'tronix' ),
            array(
                'a' => array(
                    'href' => array(),
                ),
                'strong' => array(),
                'small'  => array(),
                'span'   => array(),
                'p'      => array(),
                'h1'     => array(),
                'h2'     => array(),
                'h3'     => array(),
                'h4'     => array(),
                'h5'     => array(),
                'h6'     => array(),
                '<br/>'  => array(),
            )
        ),
        'Tronix_blog_title'       => esc_html__( 'Blog Standard', 'tronix' ),
        'Tronix_error_page_title' => esc_html__( 'Page not found.', 'tronix' ),
    );
}

add_filter( 'csf_welcome_page', '__return_false' );