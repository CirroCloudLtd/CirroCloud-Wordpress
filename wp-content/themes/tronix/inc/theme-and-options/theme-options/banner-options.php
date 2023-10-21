<?php

//Banner Options
CSF::createSection( $TronixThemeOption, array(
    'parent' => 'Tronix_page_options',
    'title'  => esc_html__( 'Banner / Breadcrumb Area', 'tronix' ),
    'icon'   => 'fa fa-flag',
    'fields' => array(
        array(
            'id'                    => 'Tronix_banner_default_options',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'tronix' ),
            'background_gradient'   => true,
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'default'               => array(
                'background-color'              => '',
                'background-gradient-color'     => '',
                'background-gradient-direction' => 'to right',
                'background-size'               => 'cover',
                'background-position'           => 'center center',
                'background-repeat'             => 'no-repeat',
            ),
            'output'                => '.breadcroumb-area',
            'subtitle'              => esc_html__( 'Select banner default properties for all page / post. You can override this settings on individual page / post.', 'tronix' ),
            'desc'                  => esc_html__( 'If you use gradient background color (Second Color) then background image will not working. Gradient background priority is higher then background image', 'tronix' ),
        ),
        array(
            'id'       => 'Tronix_breadcrumb_normal_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Breadcrumb Text Color', 'tronix' ),
            'output'   => '.breadcroumn-contnt .page-title',
            'subtitle' => esc_html__( 'Breadcrumb Text Color', 'tronix' ),
            'desc'     => esc_html__( 'Select breadcrumb text color.', 'tronix' ),
        ),
        array(
            'id'       => 'Tronix_breadcrumb_link_color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Breadcrumb Link Color', 'tronix' ),
            'output'   => array( '.bre-sub span a span' ),
            'subtitle' => esc_html__( 'Breadcrumb Link color', 'tronix' ),
            'desc'     => esc_html__( 'Select breadcrumb link and link hover color.', 'tronix' ),
        ),
        array(
            'id'          => 'Tronix_breadcrumb_spacing',
            'type'        => 'spacing',
            'title'       => esc_html__( 'Breadcrumb Spacing', 'tronix' ),
            'subtitle'    => esc_html__( 'Add Breadcrumb Content Spacing', 'tronix' ),
            'output'      => '.breadcroumb-area',
            'output_mode' => 'padding', // or margin, relative
        ),
        array(
            'id'          => 'Tronix_breadcrumb_select_html',
            'type'        => 'select',
            'title'       => esc_html__( 'HTML Tag', 'tronix' ),
            'subtitle'    => esc_html__( 'Select Title HTML Tag', 'tronix' ),
            'placeholder' => esc_html__( 'Select an option', 'tronix' ),
            'options'     => array(
                'h1' => esc_html__( 'H1', 'tronix' ),
                'h2' => esc_html__( 'H2', 'tronix' ),
                'h3' => esc_html__( 'H3', 'tronix' ),
                'h4' => esc_html__( 'H4', 'tronix' ),
                'h5' => esc_html__( 'H5', 'tronix' ),
                'h6' => esc_html__( 'H6', 'tronix' ),
            ),
            'default'     => 'h2',
        ),
		array(
			'id'       => 'breadcrumb_shape_enable',
			'type'     => 'switcher',
			'title'    => 'If You Need Breadcrumb Shape Yes/No',
			'text_on'  => 'Yes',
			'text_off' => 'No',
			 'default'    => true
		),
    ),
) );