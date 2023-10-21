<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$Tronixmetabox = 'Tronix_metabox';

//
// Create a metabox
//
CSF::createMetabox( $Tronixmetabox, array(
    'title'        => 'Metabox Options',
    'post_type'    => array( 'page', 'post', 'tronix_portfolio', 'tronix_team' ),
    'show_restore' => true,
) );

// Create layout section
CSF::createSection( $Tronixmetabox, array(
	'title'  => esc_html__( 'Header Settings ', 'tronix' ),
	'icon'   => 'fa fa-header',
	'fields' => array(

		array(
			'id'      => 'header_style_meta',
			'type'    => 'select',
			'title'         => esc_html__( 'Select Header', 'tronix' ),
            'subtitle'         => esc_html__( 'Select Your Header, we are used Theme Default Header', 'tronix' ),
			'placeholder'   => esc_html__( 'Default', 'tronix' ),
			'empty_message' => esc_html__( 'No header template found. You can create header template from tronix Headers > Add New.', 'tronix' ),
			'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'tronix_header',
				'posts_per_page' => -1,
			),
			'desc'    => esc_html__('Select header for this page', 'tronix'),
		),
	)
) );

// Create layout section
CSF::createSection( $Tronixmetabox, array(
    'title'  => esc_html__( 'Layout', 'tronix' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'          => 'Tronix_layout_meta',
            'type'        => 'select',
            'title'       => esc_html__( 'Layout', 'tronix' ),
            'options'     => array(
                'default'       => esc_html__( 'Default', 'tronix' ),
                'full-width'    => esc_html__( 'Full Width', 'tronix' ),
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'tronix' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'tronix' ),
            ),
            'default' => 'default',
            'desc'        => esc_html__( 'Select layout', 'tronix' ),
        ),
        array(
            'id'         => 'Tronix_sidebar_meta',
            'type'       => 'select',
            'title'      => esc_html__( 'Sidebar', 'tronix' ),
            'options'    => 'Tronix_sidebars',
            'dependency' => array( 'Tronix_layout_meta', 'any', 'left-sidebar,right-sidebar' ),
            'desc'       => esc_html__( 'Select sidebar you want to show with this page.', 'tronix' ),
        ),
        array(
            'id'       => 'Tronix_meta_page_navbar',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Pagination', 'tronix' ),
            'subtitle' => esc_html__( 'This Options only for Default page', 'tronix' ),
            'default'  => true,
        ),
        array(
            'id'          => 'Tronix_meta_page_spacing',
            'type'        => 'spacing',
            'title'       => esc_html__( 'Padding', 'tronix' ),
            'subtitle'    => esc_html__( 'Add Page Padding If you need', 'tronix' ),
            'output'      => '.site-main.content-area',
            'output_mode' => 'padding',
        ),
    ),
) );

// Create a section
CSF::createSection( $Tronixmetabox, array(
    'title'  => esc_html__( 'Banner / Breadcrumb Area', 'tronix' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'       => 'Tronix_meta_enable_banner',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Banner', 'tronix' ),
            'text_on'  => esc_html__( 'Yes', 'tronix' ),
            'text_off' => esc_html__( 'No', 'tronix' ),
            'default'  => true,
            'desc'     => esc_html__( 'Enable or disable banner.', 'tronix' ),
        ),
        array(
            'id'                    => 'Tronix_meta_banner_options',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'tronix' ),
            'background_gradient'   => true,
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'default'               => array(
                'background-color'              => '',
                'background-gradient-color'     => '',
                'background-gradient-direction' => '',
                'background-size'               => '',
                'background-position'           => '',
                'background-repeat'             => 'no-repeat',
            ),
            'dependency'            => array( 'Tronix_meta_enable_banner', '==', true ),
            'output'                => '.breadcroumb-area',
            'desc'                  => esc_html__( 'If you use gradient background color (Second Color) then background image will not working. Gradient background priority is higher then background image', 'tronix' ),
        ),
        array(
            'id'         => 'Tronix_meta_banner_title_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Banner Title Color', 'tronix' ),
            'output'     => '.breadcroumn-contnt .brea-title',
            'dependency' => array( 'Tronix_meta_enable_banner', '==', true ),
            'desc'       => esc_html__( 'Select banner title color.', 'tronix' ),
        ),

        array(
            'id'         => 'Tronix_meta_breadcrumb_normal_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Breadcrumb Text Color', 'tronix' ),
            'output'     => '.bre-sub span',
            'subtitle'   => esc_html__( 'Breadcrumb Text Color', 'tronix' ),
            'dependency' => array( 'Tronix_meta_enable_banner', '==', true ),
            'desc'       => esc_html__( 'Select breadcrumb text color.', 'tronix' ),
        ),

        array(
            'id'         => 'Tronix_meta_breadcrumb_link_color',
            'type'       => 'link_color',
            'title'      => esc_html__( 'Breadcrumb Link Color', 'tronix' ),
            'output'     => array( '.bre-sub span a' ),
            'subtitle'   => esc_html__( 'Breadcrumb Link color', 'tronix' ),
            'dependency' => array( 'Tronix_meta_enable_banner', '==', true ),
            'desc'       => esc_html__( 'Select breadcrumb link and link hover color.', 'tronix' ),
        ),

    ),
) );

// Create Footer section
CSF::createSection( $Tronixmetabox, array(
	'title'  => esc_html__('Footer Settings ', 'tronix'),
	'icon'   => 'fa fa-wordpress',
	'fields' => array(

		array(
			'id'      => 'footer_style_meta',
			'type'    => 'select',
			'title'         => esc_html__( 'Select Footer', 'tronix' ),
            'subtitle'         => esc_html__( 'Select Your Footer, we are used Theme Default Footer', 'tronix' ),
			'placeholder'   => esc_html__( 'Default', 'tronix' ),
			'empty_message' => esc_html__( 'No Footer Template Found. You can create footer template from Tronix Footers > Add New.', 'tronix' ),
			'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'tronix_footer',
				'posts_per_page' => -1,
			),
			'desc'    => esc_html__('Select footer for this page', 'tronix'),
		),
	)
));