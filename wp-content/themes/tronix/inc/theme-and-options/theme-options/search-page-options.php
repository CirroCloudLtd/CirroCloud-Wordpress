<?php
//search Options
CSF::createSection( $TronixThemeOption, array(
    'parent' => 'Tronix_page_options',
    'title'  => esc_html__( 'Search Page', 'tronix' ),
    'icon'   => 'fa fa-search',
    'fields' => array(
        array(
            'id'      => 'Tronix_search_layout',
            'type'    => 'select',
            'title'   => esc_html__( 'Archive Layout', 'tronix' ),
            'options' => array(
                'grid'          => esc_html__( 'Grid Full', 'tronix' ),
                'grid-ls'       => esc_html__( 'Grid With Left Sidebar', 'tronix' ),
                'grid-rs'       => esc_html__( 'Grid With Right Sidebar', 'tronix' ),
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'tronix' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'tronix' ),
            ),
            'default' => 'right-sidebar',
            'desc'    => esc_html__( 'Select blog page layout.', 'tronix' ),
        ),
        array(
            'id'       => 'Tronix_search_banner',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable search Banner', 'tronix' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'tronix' ),
            'text_off' => esc_html__( 'No', 'tronix' ),
            'desc'     => esc_html__( 'Enable or disable search page banner.', 'tronix' ),
        ),
    ),
) );