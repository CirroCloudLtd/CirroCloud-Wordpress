<?php
//Archive Options
CSF::createSection( $TronixThemeOption, array(
    'parent' => 'Tronix_page_options',
    'title'  => esc_html__( 'Archive Page', 'tronix' ),
    'icon'   => 'fa fa-archive',
    'fields' => array(
        array(
            'id'      => 'Tronix_archive_layout',
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
            'id'       => 'Tronix_archive_banner',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Archive Banner', 'tronix' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'tronix' ),
            'text_off' => esc_html__( 'No', 'tronix' ),
            'desc'     => esc_html__( 'Enable or disable archive page banner.', 'tronix' ),
        ),
        array(
            'id'       => 'Tronix_archive_pagination',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Archive Pagination', 'tronix' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'tronix' ),
            'text_off' => esc_html__( 'No', 'tronix' ),
            'desc'     => esc_html__( 'Enable or disable archive Pagination.', 'tronix' ),
        ),
        array(
            'id'         => 'Tronix_archive_banner_title_static_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Banner Static Title Color', 'tronix' ),
            'output'     => '.page-header .container h2.archive-title',
            'dependency' => array( 'Tronix_archive_banner', '==', true ),
            'desc'       => esc_html__( 'Select banner Static title color.', 'tronix' ),
        ),
        array(
            'id'         => 'Tronix_archive_banner_title_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Banner Title Color', 'tronix' ),
            'output'     => '.archive-title span',
            'dependency' => array( 'Tronix_archive_banner', '==', true ),
            'desc'       => esc_html__( 'Select banner title color.', 'tronix' ),
        ),
    ),
) );