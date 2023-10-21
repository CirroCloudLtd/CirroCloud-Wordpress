<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Header Setings
CSF::createSection( $TronixThemeOption, array(
    'id'     => 'Tronix_header_settings',
    'title'  => esc_html__( 'Header Settings', 'tronix' ),
    'icon'   => 'fa fa-header',
    'fields' => array(
		array(
			'id'            => 'site_default_header',
			'type'          => 'select',
			'title'         => esc_html__( 'Select Header', 'tronix' ),
			'placeholder'   => esc_html__( 'Default', 'tronix' ),
			'empty_message' => esc_html__( 'No Header Template Found. You can create header template from tronix Headers > Add New.', 'tronix' ),
			'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'tronix_header',
				'posts_per_page' => - 1,
			),
			'desc'          => esc_html__( 'Select site header from here. Selected template will be used for all pages by default.', 'tronix' ),
		),


		array(
			'type'       => 'notice',
			'id'         => 'site_header_notice',
			'style'      => 'warning',
			'content' => sprintf(
				'%s <a href="%s" target="_blank">%s</a> %s',
				esc_html__('Custom header selected. You can edit/create Header Template in the', 'tronix'),
				admin_url('edit.php?post_type=tronix_header'),
				esc_html__('Tronix Headers', 'tronix'),
				esc_html__('dashboard tab.', 'tronix')
			),
			'dependency' => array(
				'site_default_header',
				'!=',
				'',
			),
		),

		array(
			'id'           => 'header_default_logo',
			'type'         => 'media',
			'title'        => esc_html__( 'Header Logo', 'tronix' ),
			'subtitle'        => esc_html__( 'Add Your Header Logo', 'tronix' ),
			'library'      => 'image',
			'url'          => false,
			'button_title' => esc_html__( 'Upload Logo', 'tronix' ),
			'desc'         => esc_html__( 'Upload logo image', 'tronix' ),
			'dependency'   => array(
				'site_default_header',
				'==',
				'',
			),
		),
		        array(
			'id'           => 'header_mobile_logo',
			'type'         => 'media',
			'title'        => esc_html__( 'Mobile Version Logo', 'tronix' ),
            'subtitle'        => esc_html__( 'Add Your Header Logo For Mobile', 'tronix' ),
			'library'      => 'image',
			'url'          => false,
			'button_title' => esc_html__( 'Upload Logo', 'tronix' ),
			'desc'         => esc_html__( 'Upload logo image', 'tronix' ),
			'dependency'   => array(
				'site_default_header',
				'==',
				'',
			),
		),


		array(
			'id'         => 'logo_image_size',
			'type'       => 'dimensions',
			'title'      => esc_html__( 'Logo Image Size', 'tronix' ),
			'output'     => '.site-branding img',
			'width'      => true,
			'height'     => true,
			'desc'       => esc_html__( 'Select logo image size.', 'tronix' ),
			'dependency' => array(
				'site_default_header',
				'==',
				'',
			),
		),
		//______-------________------________---------
        //__________ HEADER ONE MENU OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Header Menu Options', 'tronix' ),
           'dependency' => array(
				'site_default_header',
				'==',
				'',
			),
        ),
        array(
            'id'         => 'tronix_header_one_group',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Site Header Options', 'tronix' ),
            'subtitle'   => esc_html__( 'Add your Site Header Options here', 'tronix' ),
            'default'  => esc_html__( 'Copyright © 2023. All Rights Reserved.', 'tronix' ),
           'dependency' => array(
				'site_default_header',
				'==',
				'',
			),
            'fields'     => array(
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Parent Menu Options', 'tronix' ),
                ),
                array(
                    'id'       => 'tronix_header_one_menu_color',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Menu Color', 'tronix' ),
                    'subtitle' => esc_html__( 'Nav Menu Normal and Hover Color', 'tronix' ),
                    'output'   => '.main-menu > ul > li > a',
                ),
                array(
                    'id'          => 'tronix_header_one_area_background_color',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Header Area Background Color', 'tronix' ),
                    'subtitle'    => esc_html__( 'Add Color For Header Area Background Color', 'tronix' ),
                    'output'      => '.menu-area',
                    'output_mode' => 'background-color',
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Sub menu Options', 'tronix' ),
                ),
                array(
                    'id'       => 'tronix_header_one_submenu_color',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Text Color', 'tronix' ),
                    'subtitle' => esc_html__( 'Add Color For Sub Menu Text', 'tronix' ),
                    'output'   => '.main-menu ul.sub-menu li a',
                ),
                array(
                    'id'          => 'tronix_header_one_submenu_bgcolor',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'tronix' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub Menu Text', 'tronix' ),
                    'output'      => '.main-menu ul.sub-menu li a',
                    'output_mode' => 'background-color',
                ),
                array(
                    'id'          => 'tronix_header_one_submenu_bgcolor_hover',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Hover Color', 'tronix' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub Menu Text', 'tronix' ),
                    'output'      => '.main-menu ul.sub-menu li a:hover',
                    'output_mode' => 'background-color',
                ),
                array(
                    'id'          => 'tronix_header_one_submenu_border_color',
                    'type'        => 'color',
                    'title'       => esc_html__( 'border Color', 'tronix' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub menu', 'tronix' ),
                    'output'      => '.main-menu ul.sub-menu li',
                    'output_mode' => 'border-color',
                ),
            ),
        ),
	)
) );