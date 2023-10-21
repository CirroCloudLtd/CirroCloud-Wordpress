<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

//
// Set a unique slug-like ID
//
$navmeta = 'Tronix_navmeta';

//
// Create menu options
//
CSF::createNavMenuOptions( $navmeta, array(
    'data_type' => 'serialize',
) );

CSF::createSection( $navmeta, array(
    'fields' => array(

        array(
            'id'    => 'Tronix_nav_megamenu_show',
            'type'  => 'switcher',
            'title' => esc_html__( 'Enable Mega menu', 'tronix' ),
            'label' => esc_html__( 'Enable this options if you need Mega Menu', 'tronix' ),
        ),

        array(
            'id'          => 'Tronix_nav_mmenu_column',
            'type'        => 'select',
            'title'       => esc_html__( 'Select Column', 'tronix' ),
            'subtitle'    => esc_html__( 'Select your Sub Menu Column Section', 'tronix' ),
            'placeholder' => esc_html__( 'Select an option', 'tronix' ),
            'default'     => '4',
            'options'     => array(
                'column_2' => esc_html__( 'Column 2', 'tronix' ),
                'column_3' => esc_html__( 'Column 3', 'tronix' ),
                'column_4' => esc_html__( 'Column 4', 'tronix' ),
                'column_5' => esc_html__( 'Column 5', 'tronix' ),
                'column_6' => esc_html__( 'Column 6', 'tronix' ),
            ),
            'dependency'  => array( 'Tronix_nav_megamenu_show', '==', 'true' ),
        ),
    ),
) );
