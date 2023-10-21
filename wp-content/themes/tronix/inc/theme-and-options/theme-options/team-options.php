<?php
//Team Page Options
CSF::createSection($TronixThemeOption, array(
    'title'  => esc_html__('Team Page', 'tronix'),
    'icon'   => 'fa fa-users',
    'fields' => array(
        array(
            'id'       => 'Tronix_team_banner_enable',
            'type'     => 'switcher',
            'title'    => esc_html__('Enable Banner', 'tronix'),
            'default'  => true,
            'text_on'  => esc_html__('Yes', 'tronix'),
            'text_off' => esc_html__('No', 'tronix'),
            'desc'     => esc_html__('Hide / Show Banner.', 'tronix'),
        ),
        array(
            'id'         => 'Tronix_team_title',
            'type'       => 'text',
            'title'      => esc_html__('Banner Title', 'tronix'),
            'default'    => esc_html('Team Details','tronix'),
            'dependency' => array( 'Tronix_team_banner_enable', '==', 'true' ),
            'desc'       => esc_html__('Type team banner title here.', 'tronix'),
        ),
        array(
            'id'         => 'Tronix_team_custom_slug',
            'type'       => 'text',
            'title'      => esc_html__('Custom Slug', 'tronix'),
            'default'    => esc_html('tronix-team','tronix'),
        ),
    )
));