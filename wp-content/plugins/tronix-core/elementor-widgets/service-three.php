<?php namespace Elementor;

class tronix_service_three_widget extends Widget_Base {

    public function get_name() {

        return 'tronix_service_three';
    }

    public function get_title() {
        return esc_html__( 'Tronix Service V3', 'tronixcore' );
    }

    public function get_icon() {

        return 'eicon-shape';
    }

    public function get_categories() {
        return ['tronixcore'];
    }

    protected function register_controls() {

        //Content tab start
        $this->start_controls_section(
            'icon_box_options',
            [
                'label' => esc_html__( 'Icon Box', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'icon',
            [
                'label'   => esc_html__( 'Icon', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fab fa-laravel',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'icon_attr',
            [
                'label'   => esc_html__( 'Attrribute', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '01', 'tronixcore' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label'   => esc_html__( 'Title', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Medicine Help', 'tronixcore' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 15,
				'default' => esc_html__( 'Extensible for web iterate process before meta services impact with olisticly enable client.', 'tronixcore' ),
			]
		);
        $repeater->add_control(
            'enable_link',
            [
                'label'        => esc_html__( 'Enable Link', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label'         => __( 'Link', 'tronixcore' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => __( 'https://your-link.com', 'tronixcore' ),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'condition' => [
                    'enable_link' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'list',
            [
                'label'       => esc_html__( 'List', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'title' => esc_html__( 'Medicine Help', 'tronixcore' ),
                        'description' => esc_html__( 'Extensible for web iterate process before meta services impact with olisticly enable client.', 'tronixcore' ),
                    ],
                    [
                        'title' => esc_html__( 'We Build and Create', 'tronixcore' ),
                        'description' => esc_html__( 'Extensible for web iterate process before meta services impact with olisticly enable client.', 'tronixcore' ),
                    ],
                    [
                        'title' => esc_html__( 'Water Delivery', 'tronixcore' ),
                        'description' => esc_html__( 'Extensible for web iterate process before meta services impact with olisticly enable client.', 'tronixcore' ),
                    ],
                    [
                        'title' => esc_html__( 'We Care About', 'tronixcore' ),
                        'description' => esc_html__( 'Extensible for web iterate process before meta services impact with olisticly enable client.', 'tronixcore' ),
                    ],
                    
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label'   => __( 'Select Title Tag', 'tronixcore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'h5',
                'options' => [
                    'h1'   => __( 'H1', 'tronixcore' ),
                    'h2'   => __( 'H2', 'tronixcore' ),
                    'h3'   => __( 'H3', 'tronixcore' ),
                    'h4'   => __( 'H4', 'tronixcore' ),
                    'h5'   => __( 'H5', 'tronixcore' ),
                    'h6'   => __( 'H6', 'tronixcore' ),
                    'span' => __( 'Span', 'tronixcore' ),
                    'p'    => __( 'P', 'tronixcore' ),
                    'div'  => __( 'Div', 'tronixcore' ),
                ],
            ]
        );
        $this->add_control(
            'container',
            [
                'label'        => esc_html__( 'Enable Container', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'desktop_col',
            [
                'label'   => __( 'Columns On Desktop', 'tronixcore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-xl-3',
                'options' => [
                    'col-xl-12' => __( '1 Column', 'tronixcore' ),
                    'col-xl-6'  => __( '2 Column', 'tronixcore' ),
                    'col-xl-4'  => __( '3 Column', 'tronixcore' ),
                    'col-xl-3'  => __( '4 Column', 'tronixcore' ),
                    'col-xl-2'  => __( '6 Column', 'tronixcore' ),
                ],
            ]
        );
        $this->add_control(
            'laptop_col',
            [
                'label'   => __( 'Columns for Laptop', 'tronixcore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-lg-3',
                'options' => [
                    'col-lg-12' => __( '1 Column', 'tronixcore' ),
                    'col-lg-6'  => __( '2 Column', 'tronixcore' ),
                    'col-lg-4'  => __( '3 Column', 'tronixcore' ),
                    'col-lg-3'  => __( '4 Column', 'tronixcore' ),
                    'col-lg-2'  => __( '6 Column', 'tronixcore' ),
                ],
            ]
        );

        $this->add_control(
            'tab_col',
            [
                'label'   => __( 'Columns On Tablet', 'tronixcore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-md-6',
                'options' => [
                    'col-md-12' => __( '1 Column', 'tronixcore' ),
                    'col-md-6'  => __( '2 Column', 'tronixcore' ),
                    'col-md-4'  => __( '3 Column', 'tronixcore' ),
                    'col-md-3'  => __( '4 Column', 'tronixcore' ),
                    'col-md-2'  => __( '6 Column', 'tronixcore' ),
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'box_css',
            [
                'label' => esc_html__( 'Box', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'box_tabs'
        );
        $this->start_controls_tab(
            'box_tab_normal',
            [
                'label' => __( 'Normal', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'alignment',
            [
                'label'     => __( 'Alignment', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'    => [
                        'title' => __( 'Left', 'tronixcore' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center'  => [
                        'title' => __( 'Center', 'tronixcore' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'   => [
                        'title' => __( 'Right', 'tronixcore' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'center',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .tronix-service-three-item' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .tronix-service-three-item',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-service-three-item',
            ]
        );

        $this->add_responsive_control(
            'box_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-item' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-service-three-item',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'box_tab_hover',
            [
                'label' => __( 'Hover', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_hbg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .tronix-service-three-item:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_hborder',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-service-three-item:hover',
            ]
        );

        $this->add_responsive_control(
            'box_hradius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-item:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_hshadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-service-three-item:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // ========================================================
        // ================= Icon Style Start =====================
        // ========================================================

        $this->start_controls_section(
            'icon_css',
            [
                'label' => __( 'Icon Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'icon_tabs'
        );
        $this->start_controls_tab(
            'icon_tab_normal',
            [
                'label' => __( 'Normal', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'icon_size',
            [
                'label'      => esc_html__( 'Icon Size', 'tronixcore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-icon ' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_width',
            [
                'label'      => esc_html__( 'Width', 'tronixcore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-icon ' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_height',
            [
                'label'      => esc_html__( 'Height', 'tronixcore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-icon ' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-service-three-icon ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .tronix-service-three-icon ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__( 'icon Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-service-three-icon ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-service-three-icon ',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-icon ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-icon ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-icon ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'svg_size_note',
            [
                'label' => __( 'SVG Icon Size', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'icon_svg_width',
            [
                'label' => esc_html__( 'SVG With', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-service-three-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_svg_height',
            [
                'label' => esc_html__( 'SVG Height', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-service-three-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'icon_tab_hover',
            [
                'label' => __( 'Hover', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'icon_hcolor',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-service-three-icon:hover ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_hbg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .tronix-service-three-icon:hover ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_hshadow',
                'label'    => esc_html__( 'icon Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-service-three-icon:hover ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_hborder',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-service-three-icon:hover ',
            ]
        );
        $this->add_responsive_control(
            'icon_hradius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-icon:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // 
		// ----------------Attribute Style------------------
        // 

        $this->start_controls_section(
			'attribute_style_options',
			[
				'label' => esc_html__( 'Attribute', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		); 
        $this->add_responsive_control(
            'attr_width',
            [
                'label' => esc_html__( 'SVG With', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-service-three-icon-attr' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'attr_height',
            [
                'label' => esc_html__( 'SVG Height', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-service-three-icon-attr' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'attr_typo',
                'label'    => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-service-three-icon-attr',
            ]
        );
        $this->add_responsive_control(
            'attr_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-service-three-icon-attr' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'attr_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .tronix-service-three-icon-attr',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'attr_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-service-three-icon-attr ',
            ]
        );
        $this->add_responsive_control(
            'attr_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-icon-attr ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'attr_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-icon-attr' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'attr_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-service-three-icon-attr' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


           // 
		// ----------------Title Style------------------
        // 

		$this->start_controls_section(
			'title_style_options',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .tronix-service-title',
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tronix-service-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .tronix-service-title a' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_responsive_control(
			'title_color_hover',
			[
				'label'       => esc_html__('Hover Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tronix-service-title a:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tronix-service-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .tronix-service-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

        // 
		// ----------------Description Style------------------
        // 

        $this->start_controls_section(
			'des_options',
			[
				'label' => esc_html__('Description', 'tronixcore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'dec_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .service-three-des',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-three-des' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'dec_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-three-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dec_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .service-three-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();







    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
        if ( $settings['container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
        ?>
            <div class="tronix-service-three-wrapper">
                <div class="<?php echo esc_attr( $container ); ?>">
                        <div class="row">
                            <?php foreach ( $settings['list'] as $item ): ?>
                            <div class="<?php echo esc_attr( $column ); ?> col-12">
                                <div class="tronix-service-three-item">
                                    <div class="tronix-service-three-icon">
                                        <?php \Elementor\Icons_Manager::render_icon( $item['icon'], ['aria-hidden' => 'true'] );?>
                                        <span class="tronix-service-three-icon-attr"> <?php echo esc_html( $item['icon_attr'] ); ?></span>
                                    </div>
                                    <<?php echo esc_attr( $settings['title_tag'] ); ?> class="tronix-service-title">
                                        <?php if ( $item['enable_link'] == 'yes' ):
                                            $url      = $item['link']['url'];
                                            $target   = $item['link']['is_external'] ? ' target="_blank"' : '';
                                            $nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
                                            ?>
                                            <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow;?>>
                                        <?php endif;?>
                                            <?php if ( !empty( $item['title'] ) ): ?>
                                                    <?php echo esc_html( $item['title'] ); ?>
                                            <?php endif;?>
                                        <?php if ( $item['enable_link'] == 'yes' ) : ?> </a> <?php endif?>
                                    </<?php echo esc_attr( $settings['title_tag'] ); ?>>
                                        <?php if ( !empty( $item['description'] ) ): ?>
                                            <div class="service-three-des">  <?php echo esc_html( $item['description'] ); ?></div>
                                        <?php endif;?>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
            </div>
        <?php
        echo ob_get_clean();

    }
}
Plugin::instance()->widgets_manager->register( new tronix_service_three_widget );