<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// footer Style
CSF::createSection( $TronixThemeOption, array(
    'title'  => esc_html__( 'Footer Options', 'tronix' ),
    'id'     => 'Tronix_footer_options',
    'icon'   => 'fa fa-footer',
    'fields' => array(
        array(
			'id'            => 'site_default_footer',
			'type'          => 'select',
			'title'         => esc_html__( 'Select Footer', 'tronix' ),
			'placeholder'   => esc_html__( 'Default', 'tronix' ),
			'empty_message' => esc_html__( 'No footer Template Found. You can create footer template from Tronix Footers > Add New.', 'tronix' ),
			'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'tronix_footer',
				'posts_per_page' => - 1,
			),
			'desc'          => esc_html__( 'Select site footer from here. Selected template will be used for all pages by default.', 'tronix' ),
		),


		array(
			'type'       => 'notice',
			'id'         => 'site_footer_notice',
			'style'      => 'warning',
			'content' => sprintf(
				'%s <a href="%s" target="_blank">%s</a> %s',
				esc_html__('Custom footer selected. You can edit/create footer Template in the', 'tronix'),
				admin_url('edit.php?post_type=tronix_footer'),
				esc_html__('Tronix Footers', 'tronix'),
				esc_html__('dashboard tab.', 'tronix')
			),
			'dependency' => array(
				'site_default_footer',
				'!=',
				'',
			),
		),
		// **********************************************
		//         ____ COPYRIGHT SECTION ____ 
		// **********************************************
		array(
            'type'    => 'heading',
            'style'   => 'info',
            'content' => esc_html__( 'CopyRight Section', 'tronix' ),
			'dependency' => array(
				'site_default_footer',
				'==',
				'',
			),
        ),
        array(
            'id'            => 'tronix_copyright_text',
            'type'          => 'wp_editor',
            'title'         => esc_html__( 'Copyright Text', 'tronix' ),
            'subtitle'      => esc_html__( 'Site copyright text', 'tronix' ),
            'desc'          => esc_html__( 'Type site copyright text here.', 'tronix' ),
            'tinymce'       => true,
            'quicktags'     => true,
            'media_buttons' => false,
            'height'        => '100px',
			'dependency' => array(
				'site_default_footer',
				'==',
				'',
			),
        ),
		// __ Color Option Footer Copyright Area
		array(
            'id'         => 'tronix_footer_copyright_options',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Footer Copyright CSS Options', 'tronix' ),
            'subtitle'   => esc_html__( 'Add your color for footer Copyright area', 'tronix' ),
            'dependency' => array(
				'site_default_footer',
				'==',
				'',
			),
            'fields'     => array(
                array(
                    'id'                  => 'tronix_copyright_background_color',
                    'type'                => 'background',
                    'title'               => esc_html__( 'Copyright Background Color', 'tronix' ),
                    'subtitle'            => esc_html__( 'Add Your copyright Background image/color/Gradient Here', 'tronix' ),
                    'background_gradient' => true,
                    'background_origin'   => true,
                    'output'              => ' .footer-copyright-wrapper',
                ),
                array(
                    'id'               => 'tronix_copyright_text_color',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Copyright Text', 'tronix' ),
                    'subtitle'         => esc_html__( 'Add Color for Copyright Text  ', 'tronix' ),
                    'output'           => ' .footer-copyright-wrapper',
                    'output_important' => true,
                ),
                array(
                    'id'               => 'tronix_copyrightr_text_link_color',
                    'type'             => 'link_color',
                    'title'            => esc_html__( 'Copyright Text Link Color', 'tronix' ),
                    'subtitle'         => esc_html__( 'Add color for Footer Link Color', 'tronix' ),
                    'output'           => ' .footer-copyright-wrapper a',
                    'output_important' => true,
                ),
            ),
        ),
    ),
) );



        

       
