<?php

if ( !function_exists( 'Tronix_options' ) ) {
    function Tronix_options( $option = '', $default = null ) {
        $defaults = tronix_default_theme_options();
        $options = get_option( 'Tronix_Theme_Option' );
        $default = ( !isset( $default ) && isset( $defaults[$option] ) ) ? $defaults[$option] : $default;
        return ( isset( $options[$option] ) ) ? $options[$option] : $default;
    }
}
add_action( 'init', 'tronixcore_custom_post_type' );
function tronixcore_custom_post_type() {
    register_post_type( 'tronix_project',
        array(
            'labels'       => array(
                'name'          => esc_html__( 'Project', 'tronixcore' ),
                'singular_name' => esc_html__( 'Project', 'tronixcore' ),
            ),
            'show_in_rest' => true,
            'supports'     => array( 'title', 'thumbnail', 'page-attributes', 'editor', 'excerpt' ),
            'menu_icon'    => esc_attr__( 'dashicons-image-filter', 'tronixcore' ),
            'public'       => true,
            'rewrite'      => array(
                'slug'       => tronix_options( 'tronix_project_custom_slug' ),
                'with_front' => true,
            ),
        )
    );
    register_post_type( 'tronix_team',
        array(
            'labels'       => array(
                'name'          => esc_html__( 'Team', 'tronixcore' ),
                'singular_name' => esc_html__( 'Team', 'tronixcore' ),
            ),
            'show_in_rest' => true,
            'supports'     => array( 'title', 'thumbnail', 'page-attributes', 'editor', 'excerpt' ),
            'menu_icon'    => esc_attr__( 'dashicons-admin-users', 'tronixcore' ),
            'public'       => true,
            'rewrite'      => array(
                'slug'       => tronix_options( 'tronix_team_custom_slug' ),
                'with_front' => true,
            ),
        )
    );
}
/*** Custom taxonomy ***/
add_action( 'init', 'tronixcore_custom_post_taxonomy' );
function tronixcore_custom_post_taxonomy() {
    register_taxonomy(
        'tronix_project_cat',
        'tronix_project',
        array(
            'label'             => esc_html__( 'Project Category', 'tronixcore' ),
            'query_var'         => true,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_in_rest'      => true,
            'show_tagcloud'     => true,
            'rewrite'           => array(
                'slug'       => ''.tronix_options( 'tronix_project_custom_slug' ).'-category',
                'with_front' => true,
            ),
        )
    );

}