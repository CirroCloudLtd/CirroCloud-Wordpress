<?php namespace Elementor;

class tronix_priceing_widget extends Widget_Base {

	public function get_name() {

		return 'tronix_priceing_table';
	}

	public function get_title() {
		return esc_html__( 'tronix priceing table', 'tronixcore' );
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
			'priceing_table_options',
			[
				'label' => esc_html__( 'tronix priceing_table', 'tronixcore' ),
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
					'value'   => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);
		$repeater->add_control(
			'number',
			[
				'label'   => esc_html__( 'Number', 'tronixcore' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '$39', 'tronixcore' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$repeater->add_control(
			'title',
			[
				'label'   => esc_html__( 'Title', 'tronixcore' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Great for large business', 'tronixcore' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$repeater->add_control(
            'item_list',
            [
                'label' => esc_html__( 'Item List', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'show_label' => true,
				'default' => __( '<ul>
                <li>Design & Marketing</li>
                <li>Project Management</li>
                <li>Business Solution</li>
                <li>Digital Product Design</li>
           </ul>', 'tronixcore' ),
                'dynamic' => [
                   'active' => true,
                ],
            ]
        );
        
        
        
		$repeater->add_control(
			'enable_button',
			[
				'label' => esc_html__( 'Enable Button', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tronixcore' ),
				'label_off' => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'separator' => 'before',
			]
		);
        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Choose Plan', 'tronixcore' ),
                'label_block' => true,
                'show_label' => true,
                'dynamic' => [
                   'active' => true,
                ],
                'condition' => [
                    'enable_button' => 'yes',
                ],
               
            ]
        );
		$repeater->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Link', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'priceing_tables',
			[
				'label'       => esc_html__( 'priceing_table List', 'tronixcore' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title'  => esc_html__( 'Great for large business', 'tronixcore' ),
						'number' => esc_html__( '$39', 'tronixcore' ),
						'button_text' => esc_html__( 'Choose Plan', 'tronixcore' ),
					],
					[
						'title'  => esc_html__( 'Great for large business', 'tronixcore' ),
						'number' => esc_html__( '$39', 'tronixcore' ),
						'button_text' => esc_html__( 'Choose Plan', 'tronixcore' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		$this->add_control(
			'container_full',
			[
				'label'        => esc_html__( 'Enable Container', 'tronixcore' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'tronixcore' ),
				'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default'      => 'no',
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

	// *********************************************************
	//                Box Style Css
	// *********************************************************

        $this->start_controls_section(
            'priceing_box',
            [
                'label' => esc_html__( 'Content Box', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'priceing_section_tabs'
        );
        $this->start_controls_tab(
            'priceing_section_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
			'box_align',
			[
				'label' => esc_html__( 'Alignment', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'tronixcore' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'tronixcore' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'tronixcore' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .tronix-priceing_table-box' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .tronix-priceing_table-box',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-priceing_table-box',
            ]
        );
        $this->add_responsive_control(
            'priceing_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-priceing_table-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-priceing_table-box',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-priceing_table-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-priceing_table-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'box_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds_hover',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .tronix-priceing_table-box:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow_hover',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-priceing_table-box:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border_hover',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-priceing_table-box:hover',
            ]
        );

        $this->add_responsive_control(
            'border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-priceing_table-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

		 // *********************************************************
        //                Icon Style Css
        // *********************************************************

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
                    '{{WRAPPER}} .priceing-left-site .pricing-icon ' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .priceing-left-site .pricing-icon ' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .priceing-left-site .pricing-icon ' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .priceing-left-site .pricing-icon ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .priceing-left-site .pricing-icon:after ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__( 'icon Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .priceing-left-site .pricing-icon ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .priceing-left-site .pricing-icon ',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .priceing-left-site .pricing-icon ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .priceing-left-site .pricing-icon ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .priceing-left-site .pricing-icon ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'label' => esc_html__( 'SVG Wigth', 'tronixcore' ),
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
                    '{{WRAPPER}} .priceing-left-site .pricing-icon  svg' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .priceing-left-site .pricing-icon  svg' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .priceing-left-site .pricing-icon ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_hbg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .priceing-left-site .pricing-icon ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_hshadow',
                'label'    => esc_html__( 'icon Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .priceing-left-site .pricing-icon ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_hborder',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .priceing-left-site .pricing-icon ',
            ]
        );
        $this->add_responsive_control(
            'icon_hradius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .priceing-left-site .pricing-icon ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

		$this->start_controls_section(
			'priceing_table_number',
			[
				'label' => esc_html__( 'Priceing Number', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'number_color',
			[
				'label'     => esc_html__( 'Number Color', 'tronixcore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'number_title_typo',
				'label'    => esc_html__( 'Title Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .price-title',
			]
		);
		$this->add_responsive_control(
			'number_margin',
			[
				'label'      => esc_html__( 'Number Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .price-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'number_padding',
			[
				'label'      => esc_html__( 'Number Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .price-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'priceing_table_title',
			[
				'label' => esc_html__( 'Title CSS', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'tronixcore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price-des' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typo',
				'label'    => esc_html__( 'Title Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .price-des',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Title Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .price-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Title Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .price-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();


                // Listing Style Css
    
        
		$this->start_controls_section(
			'priceing_style_section',
			[
				'label' => esc_html__( 'Listing Style', 'tronixcore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'priceing_list_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .priceing-list ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'priceing_list_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .priceing-list ul' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'style_icon_tab',
			[
				'label' => esc_html__( 'icon', 'tronixcore' ),
			]
		);
        $this->add_responsive_control(
            'width_icon',
            [
                'label' => esc_html__( 'Width', 'tronixcore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 150,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .priceing-list ul li:after' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'height_icon',
            [
                'label' => esc_html__( 'Height', 'tronixcore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 150,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .priceing-list ul li:after' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'priceing_icon_typo',
                'selector' => '{{WRAPPER}} .priceing-list ul li:after',
            ]
        );
        $this->add_responsive_control(
            'priceing_icon_color',
            [
                'label'     => esc_html__( 'Icon Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .priceing-list ul li:after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'priceing_icon_bg',
                'label'    => esc_html__( 'Icon Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .priceing-list ul li:after',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'priceing_icon_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .priceing-list ul li:after',
            ]
        );
        $this->add_responsive_control(
            'priceing_icon_border_redius',
            [
                'label'      => esc_html__( 'Border Redius', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .priceing-list ul li:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'priceing_icon_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .priceing-list ul li:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'priceing_icon_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .priceing-list ul li:after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
			'style_text_tab',
			[
				'label' => esc_html__( 'Text', 'tronixcore' ),
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'priceing_title_typo',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .priceing-list ul li',
			]
		);
		$this->add_responsive_control(
			'priceing_title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .priceing-list ul li' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'priceing_title_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .priceing-list ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'priceing_title_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .priceing-list ul li' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();


		//
        //------------Button Style css--------------------
        //

        $this->start_controls_section(
            'button_CSS_options',
            [
                'label' => esc_html__( 'Button CSS', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'button_content_tabs'
        );
        $this->start_controls_tab(
            'button_normal',
            [
                'label' => __( 'Normal', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_text_typography',
                'selector' => '{{WRAPPER}} .priceing-btn .theme-btns',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .priceing-btn .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .priceing-btn .theme-btns' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .priceing-btn .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .priceing-btn .theme-btns' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'label'    => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .priceing-btn .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .priceing-btn .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .priceing-btn .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover',
            [
                'label' => __( 'Hover', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .priceing-btn .theme-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .priceing-btn .theme-btns:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .priceing-btn .theme-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .priceing-btn .theme-btns:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover',
                'label'    => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .priceing-btn .theme-btns:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        


       
	}
	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		$count_id = rand( 120, 12314 );
		$column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
		if ( $settings['container_full'] == 'yes' ) {
			$container = 'container-fluid';
		} else {
			$container = 'container';
		}
		ob_start();
		?>
        <div class="tronix-priceing_table-wrapper ">
                <div class="<?php echo esc_attr( $container ); ?>">
                    <div class="row">
                        <?php foreach ( $settings['priceing_tables'] as $item ): ?>
                        <div class="col-xl-6 col-lg-6  col-12">
                            <div class="tronix-priceing_table-box">
                                <div class="priceing-left-site">
                                    <div class="pricing-icon ">
                                        <?php \Elementor\Icons_Manager::render_icon( $item['icon'], ['aria-hidden' => 'true'] );?>
                                    </div>
                                    <h2 class="price-title">  <?php echo esc_html( $item['number'] ); ?> </h2>
                                    <span class="price-des"><?php echo esc_html( $item['title'] ); ?></span>
                                </div>
                                <div class="priceing-list">
                                    <?php echo wp_kses_post($item['item_list']); ?> 
                                        <?php if( $item['enable_button'] == 'yes' ):
                                            $burl      = $item['button_link']['url'];
                                            $btarget   = $item['button_link']['is_external'] ? ' target="_blank"' : '';
                                            $bnofollow = $item['button_link']['nofollow'] ? ' rel="nofollow"' : '';
                                        ?>
                                    
                                        <div class="priceing-btn">
                                            <a href="<?php echo esc_url($burl); ?>" class="theme-btns"> <?php echo esc_html( $item['button_text'] ); ?> </a>
                                        </div>
									<?php endif;?>
                                </div>
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
Plugin::instance()->widgets_manager->register( new tronix_priceing_widget );