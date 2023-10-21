<?php
//Single Shop Page Options
CSF::createSection($TronixThemeOption, array(
    'parent' => 'Tronix_shop_options',
    'title'  => esc_html__('Single Shop Page', 'tronix'),
    'icon'   => 'fa fa-long-arrow-right',
    'fields' => array(
        array(
            'id'      => 'Tronix_single_shop_layout',
            'type'    => 'select',
            'title'   => esc_html__('Single Shop Layout', 'tronix'),
            'options' => array(
                'grid'          => esc_html__('Full Width', 'tronix'),
                'left-sidebar'  => esc_html__('Left Sidebar', 'tronix'),
                'right-sidebar' => esc_html__('Right Sidebar', 'tronix'),
            ),
            'default' => 'grid',
            'desc'    => esc_html__('Select Single Shop page layout.', 'tronix'),
        ),
        array(
            'id'       => 'Tronix_single_shop_banner_enable',
            'type'     => 'switcher',
            'title'    => esc_html__('Enable Banner', 'tronix'),
            'default'  => true,
            'text_on'  => esc_html__('Yes', 'tronix'),
            'text_off' => esc_html__('No', 'tronix'),
            'desc'     => esc_html__('Hide / Show Banner.', 'tronix'),
        ),
    )
));