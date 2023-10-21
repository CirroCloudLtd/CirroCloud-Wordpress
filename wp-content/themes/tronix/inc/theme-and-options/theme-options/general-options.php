<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
CSF::createSection( $TronixThemeOption, array(
    'title'  => esc_html__( 'General', 'tronix' ),
    'icon'   => 'fa fa-cogs',
    'fields' => array(
        array(
            'type'    => 'notice',
            'style'   => 'success',
            'content' => esc_html__( 'Preloader Options', 'tronix' ),
        ),
        array(
            'id'       => 'Tronix_enable_preloader',
            'type'     => 'switcher',
            'default'  => true,
            'title'    => esc_html__( 'Preloader', 'tronix' ),
            'subtitle' => esc_html__( 'Select Site Preloader. Default Enable', 'tronix' ),
        ),
        array(
            'id'          => 'Tronix_preloader_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Preloader color One', 'tronix' ),
            'dependency'  => array( 'Tronix_enable_preloader', '==', 'true' ),
            'output'      => '.theme-loader:before',
            'output_mode' => 'border-color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        array(
            'id'          => 'Tronix_preloader2_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Preloader color Two', 'tronix' ),
            'dependency'  => array( 'Tronix_enable_preloader', '==', 'true' ),
            'output'      => '.theme-loader:after',
            'output_mode' => 'border-color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        array(
            'id'          => 'Tronix_preloader3_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Preloader Full Width Background', 'tronix' ),
            'dependency'  => array( 'Tronix_enable_preloader', '==', 'true' ),
            'output'      => '.preloader-area',
            'output_mode' => 'background-color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        array(
            'type'    => 'notice',
            'style'   => 'success',
            'content' => esc_html__( 'Comment Options', 'tronix' ),
        ),
        array(
            'id'       => 'Tronix_enable_page_cmt',
            'type'     => 'switcher',
            'default'  => true,
            'title'    => esc_html__( 'Enable Comment for page', 'tronix' ),
            'subtitle' => esc_html__( 'Enable Comment section on Page', 'tronix' ),
        ),
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'Top To Bottom Button Settings', 'tronix' ),
        ),
        array(
            'id'       => 'Tronix_enable_top_to_bottom',
            'type'     => 'switcher',
            'default'  => true,
            'title'    => esc_html__( 'Enable Top To Bottom Icon', 'tronix' ),
            'subtitle' => esc_html__( 'Enable Top To Bottom Icon', 'tronix' ),
        ),
        array(
            'id'         => 'Tronix_enable_ttb_icon',
            'type'       => 'icon',
            'title'      => esc_html__( 'Select Icon', 'tronix' ),
            'default'    => 'bi bi-arrow-up',
            'dependency' => array( 'Tronix_enable_top_to_bottom', '==', 'true' ),
        ),
        array(
            'id'          => 'Tronix_enable_ttb_bgi',
            'type'        => 'color',
            'title'       => esc_html__( 'Icon Color', 'tronix' ),
            'subtitle'    => esc_html__( 'Add Color for Top To bottom icon', 'tronix' ),
            'dependency'  => array( 'Tronix_enable_top_to_bottom', '==', 'true' ),
            'output'      => 'div#back-top',
            'output_mode' => 'color',
        ),
        array(
            'id'          => 'Tronix_enable_ttb_bg',
            'type'        => 'color',
            'title'       => esc_html__( 'Background Color', 'tronix' ),
            'subtitle'    => esc_html__( 'Add Background Color for Top To bottom icon', 'tronix' ),
            'dependency'  => array( 'Tronix_enable_top_to_bottom', '==', 'true' ),
            'output'      => 'div#back-top',
            'output_mode' => 'background-color',
        ),
    ),
) );