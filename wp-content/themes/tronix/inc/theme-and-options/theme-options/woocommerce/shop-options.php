<?php
//shop Page Options
CSF::createSection( $TronixThemeOption, array(
    'parent' => 'Tronix_shop_options',
    'title'  => esc_html__( 'Shop Page', 'tronix' ),
    'icon'   => 'fa fa-long-arrow-right',
    'fields' => array(
        array(
            'id'      => 'Tronix_shop_layout',
            'type'    => 'select',
            'title'   => esc_html__( 'shop Layout', 'tronix' ),
            'options' => array(
                'grid'          => esc_html__( 'Grid Full', 'tronix' ),
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'tronix' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'tronix' ),
            ),
            'default' => 'right-sidebar',
            'desc'    => esc_html__( 'Select shop page layout.', 'tronix' ),
        ),
        array(
            'id'       => 'Tronix_shop_banner_enable',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Banner', 'tronix' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'tronix' ),
            'text_off' => esc_html__( 'No', 'tronix' ),
            'desc'     => esc_html__( 'Hide / Show Banner.', 'tronix' ),
        ),
		
		array(
            'id'      => 'Tronix_shop_item',
            'type'    => 'number',
            'title'   => esc_html__( 'Display Item', 'tronix' ),
			'subtitle'   => esc_html__( 'Display your Woocommerce product', 'tronix' ),
            'default' => 8,
        ),
    ),
) );