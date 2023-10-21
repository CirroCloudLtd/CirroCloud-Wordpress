<?php
// Create typography section
CSF::createSection( $TronixThemeOption, array(
    'title'  => esc_html__( 'Typography', 'tronix' ),
    'id'     => 'Tronix_typography_options',
    'icon'   => 'fa fa-text-width',
    'fields' => array(

        array(
            'id'           => 'Tronix_body_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Body', 'tronix' ),
            'output'       => 'body',
            'default'      => array(
                'font-family'  => 'Outfit',
                'font-size'    => '16',
                'unit'         => 'px',
                'font-weight'  => '400',
                'extra-styles' => array( '300', '400', '500', '600', '700', '800', '900', '300i', '400i', '500i', '600i', '700i', '800i', '900i' ),
            ),
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set body typography.', 'tronix' ),
        ),

        array(
            'id'           => 'Tronix_h1_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading One', 'tronix' ),
            'output'       => 'h1',
            'extra_styles' => true,
            'default'      => array(
                'font-family' => 'Outfit',
                'unit'        => 'px',
                'font-weight' => '700',
            ),
            'subtitle'     => esc_html__( 'Set heading one typography.', 'tronix' ),
        ),

        array(
            'id'           => 'Tronix_h2_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Two', 'tronix' ),
            'output'       => 'h2',
            'extra_styles' => true,
            'default'      => array(
                'font-family' => 'Outfit',
                'unit'        => 'px',
                'font-weight' => '500',
            ),
            'subtitle'     => esc_html__( 'Set heading two typography.', 'tronix' ),
        ),

        array(
            'id'           => 'Tronix_h3_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Three', 'tronix' ),
            'output'       => 'h3',
            'default'      => array(
                'font-family' => 'Outfit',
                'unit'        => 'px',
                'font-weight' => '500',
            ),
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading three typography.', 'tronix' ),
        ),

        array(
            'id'           => 'Tronix_h4_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Four', 'tronix' ),
            'output'       => 'h4',
            'default'      => array(
                'font-family' => 'Outfit',
                'unit'        => 'px',
                'font-weight' => '500',
            ),
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading four typography.', 'tronix' ),
        ),

        array(
            'id'           => 'Tronix_h5_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Five', 'tronix' ),
            'output'       => 'h5',
            'default'      => array(
                'font-family' => 'Outfit',
                'unit'        => 'px',
                'font-weight' => '500',
            ),
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading five typography.', 'tronix' ),
        ),

        array(
            'id'           => 'Tronix_h6_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Six', 'tronix' ),
            'output'       => 'h6',
            'default'      => array(
                'font-family' => 'Outfit',
                'unit'        => 'px',
                'font-weight' => '500',
            ),
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading six typography.', 'tronix' ),
        ),
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'Header Menu Typography', 'tronix' ),
        ),
        array(
            'id'           => 'Tronix_header_menu_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Header Menu', 'tronix' ),
            'output'       => '.main-navigation ul li a',
            'extra_styles' => true,
            'color'        => false,
            'subtitle'     => esc_html__( 'Set Header Nav Menu typography.', 'tronix' ),
        ),
        array(
            'id'           => 'Tronix_header_smenu_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Header Sub Menu', 'tronix' ),
            'output'       => '.main-navigation ul li ul li a',
            'extra_styles' => true,
            'color'        => false,
            'subtitle'     => esc_html__( 'Set Header Nav Sub Menu typography.', 'tronix' ),
        ),
        array(
            'id'           => 'Tronix_header_megamenu_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Header Mega Menu', 'tronix' ),
            'output'       => '.stellarnav.desktop li.mega li li a',
            'extra_styles' => true,
            'color'        => false,
            'subtitle'     => esc_html__( 'Set Header Nav Mega Menu typography.', 'tronix' ),
        ),
    ),
) );
// End typography section