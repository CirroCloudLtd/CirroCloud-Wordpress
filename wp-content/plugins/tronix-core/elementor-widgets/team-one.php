<?php namespace Elementor;

class tronix_Team_Widget extends Widget_Base {

    public function get_name() {

        return 'tronix_Team';
    }

    public function get_title() {
        return esc_html__( 'Tronix Team V1', 'tronixcore' );
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
            'team_options',
            [
                'label' => esc_html__( 'Team Members', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'enable_container',
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
            'orderby',
            [
                'label' => esc_html__( 'Order by', 'tronixcore' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'          => esc_html__('none','tronixcore'),
                    'ID'            => esc_html__('ID','tronixcore'),
                    'date'          => esc_html__('Date','tronixcore'),
                    'name'          => esc_html__('Name','tronixcore'),
                    'title'         => esc_html__('Title','tronixcore'),
                    'comment_count' => esc_html__('Comment count','tronixcore'),
                    'rand'          => esc_html__('Random','tronixcore'),
                ],
            ]
        );
        $this->add_control(
            'order',
            [
                'label'   => esc_html__( 'Order', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'DESE',
                'options' => [
                    'ASC'  => esc_html__( 'ASC', 'tronixcore' ),
                    'DESE' => esc_html__( 'DESE', 'tronixcore' ),
                ],
            ]
        );

        $this->add_control(
            'display_item',
            [
                'label' => esc_html__( 'Display Items', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 100,
                'step' => 1,
                'default' => 3,
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
       
        $this->add_control(
            'pagination',
            [
                'label' => esc_html__( 'Enable Pagination', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tronixcore' ),
                'label_off' => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'enable_slide',
            [
                'label'        => esc_html__( 'Enable Slide', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'item_show',
            [
                'label'     => esc_html__( 'Slide Show', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 6,
                'step'      => 1,
                'default'   => 3,
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'item_scroll',
            [
                'label'     => esc_html__( 'Slide Scroll', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 6,
                'step'      => 1,
                'default'   => 3,
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'dots',
            [
                'label'        => esc_html__( 'Enable Dots', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'no',
                'condition'    => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'speed',
            [
                'label'       => __( 'Speed', 'tronixcore' ),
                'type'        => Controls_Manager::SELECT,
                'show_label'  => true,
                'label_block' => false,
                'options'     => [
                    '200'  => __( '200 m stronixnds', 'tronixcore' ),
                    '300'  => __( '300 m stronixnds', 'tronixcore' ),
                    '400'  => __( '400 m stronixnds', 'tronixcore' ),
                    '500'  => __( '500 m stronixnds', 'tronixcore' ),
                    '600'  => __( '600 m stronixnds', 'tronixcore' ),
                    '700'  => __( '700 m stronixnds', 'tronixcore' ),
                    '800'  => __( '800 m stronixnds', 'tronixcore' ),
                    '900'  => __( '900 m stronixnds', 'tronixcore' ),
                    '1000' => __( '1 stronixnds', 'tronixcore' ),
                    '2000' => __( '2 stronixnds', 'tronixcore' ),
                    '3000' => __( '3 stronixnds', 'tronixcore' ),
                ],
                'default'     => '400',
                'condition'   => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'loop',
            [
                'label'        => esc_html__( 'Enable Loop', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label'        => esc_html__( 'Enable AutoPlay', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'autoplay_speed',
            [
                'label'       => __( 'Autoplay Speed', 'tronixcore' ),
                'type'        => Controls_Manager::SELECT,
                'show_label'  => true,
                'label_block' => false,
                'options'     => [
                    '2000'  => __( '2 stronixnds', 'tronixcore' ),
                    '3000'  => __( '3 stronixnds', 'tronixcore' ),
                    '4000'  => __( '4 stronixnds', 'tronixcore' ),
                    '5000'  => __( '5 stronixnds', 'tronixcore' ),
                    '6000'  => __( '6 stronixnds', 'tronixcore' ),
                    '7000'  => __( '7 stronixnds', 'tronixcore' ),
                    '8000'  => __( '8 stronixnds', 'tronixcore' ),
                    '9000'  => __( '9 stronixnds', 'tronixcore' ),
                    '10000' => __( '10 stronixnds', 'tronixcore' ),
                ],
                'default'     => '4000',
                'condition'   => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'desktop_col',
            [
                'label'     => __( 'Columns On Desktop', 'tronixcore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-xl-4',
                'options'   => [
                    'col-xl-12' => __( '1 Column', 'tronixcore' ),
                    'col-xl-6'  => __( '2 Column', 'tronixcore' ),
                    'col-xl-4'  => __( '3 Column', 'tronixcore' ),
                    'col-xl-3'  => __( '4 Column', 'tronixcore' ),
                    'col-xl-2'  => __( '6 Column', 'tronixcore' ),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'laptop_col',
            [
                'label'     => __( 'Columns for Laptop', 'tronixcore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-lg-4',
                'options'   => [
                    'col-lg-12' => __( '1 Column', 'tronixcore' ),
                    'col-lg-6'  => __( '2 Column', 'tronixcore' ),
                    'col-lg-4'  => __( '3 Column', 'tronixcore' ),
                    'col-lg-3'  => __( '4 Column', 'tronixcore' ),
                    'col-lg-2'  => __( '6 Column', 'tronixcore' ),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'tab_col',
            [
                'label'     => __( 'Columns On Tablet', 'tronixcore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-md-6',
                'options'   => [
                    'col-md-12' => __( '1 Column', 'tronixcore' ),
                    'col-md-6'  => __( '2 Column', 'tronixcore' ),
                    'col-md-4'  => __( '3 Column', 'tronixcore' ),
                    'col-md-3'  => __( '4 Column', 'tronixcore' ),
                    'col-md-2'  => __( '6 Column', 'tronixcore' ),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();
        //  ---------------------------------------------------
        // -------------- Box Style---------------------------
        //  ---------------------------------------------------
        $this->start_controls_section(
            'box_css_options',
            [
                'label' => esc_html__( 'Box', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'box_alignment',
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
                    '{{WRAPPER}} .our-team-one' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .our-team-one',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .our-team-one',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .our-team-one',
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
                'default'    => [
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .our-team-one' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .our-team-one' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .our-team-one' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'image_css',
            [
                'label' => esc_html__( 'Image', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label'      => esc_html__( 'Height', 'tronixcore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 800,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .our-team-one-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_width',
            [
                'label'      => esc_html__( 'Width', 'tronixcore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 800,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .our-team-one-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'object',
            [
                'label'     => esc_html__( 'Object Fit', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'cover',
                'options'   => [
                    'fill'    => esc_html__( 'Fill', 'tronixcore' ),
                    'contain' => esc_html__( 'Contain', 'tronixcore' ),
                    'cover'   => esc_html__( 'Cover', 'tronixcore' ),
                    'ntwo'    => esc_html__( 'Ntwo', 'tronixcore' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .our-team-one-image img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .our-team-one-image',
            ]
        );

        $this->add_responsive_control(
            'image_radius',
            [
                'label'      => esc_html__( 'image Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .our-team-one-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .our-team-one-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .our-team-one-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // 
		// ------------------Title Style--------------------
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
				'selector' => '
                    {{WRAPPER}} .team-one-title',
			]
		);

		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-one-title a' => 'color: {{VALUE}};',
                    
				],
			]
		);
		$this->add_responsive_control(
			'title_color-hover',
			[
				'label'       => esc_html__('Hover Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-one-title a:hover' => 'color: {{VALUE}};',
                    
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
					'{{WRAPPER}} .team-one-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .team-one-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

        // 
		// ----------------Designation Style------------------
        // 

        $this->start_controls_section(
			'deg_options',
			[
				'label' => esc_html__('Designation', 'tronixcore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .team-one-content span',
            ]
        );
        $this->add_responsive_control(
            'designation_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-one-content span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'designation_color_hover',
            [
                'label' => esc_html__( 'Hover Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-team-one:hover .team-one-content span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'designation_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .team-one-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'designation_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .team-one-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //
  		// ----------------Social icon Style Style------------------
        // 

        $this->start_controls_section(
            'social_box_css',
            [
                'label' => esc_html__( 'Social', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'social_icon_tabs'
        );
        $this->start_controls_tab(
            'social_icon_tab_normal',
            [
                'label' => __( 'Normal', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'social_icon_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .our-team-one .team-one-social-link li a',
            ]
        );
        $this->add_responsive_control(
            'social_icon_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-team-one .team-one-social-link li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_bg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-team-one .team-one-social-link li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_width',
            [
                'label' => esc_html__( 'Width', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 130,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .our-team-one .team-one-social-link li a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_height',
            [
                'label' => esc_html__( 'Height', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 130,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .our-team-one .team-one-social-link li a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'social_icon_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .our-team-one .team-one-social-link li a',
            ]
        );
        $this->add_responsive_control(
            'social_icon_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .our-team-one .team-one-social-link li a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'social_icon_shadow',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .our-team-one .team-one-social-link li a',
            ]
        );
        $this->add_responsive_control(
            'social_icon_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .our-team-one .team-one-social-link li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .our-team-one .team-one-social-link li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
                
        $this->start_controls_tab(
            'social_icon_tab_hover',
            [
                'label' => __( 'Hover', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'social_icon_hcolor',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-team-one .team-one-social-link li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_hbg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .our-team-one .team-one-social-link li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'social_icon_hborder',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .our-team-one .team-one-social-link li a:hover',
            ]
        );
        $this->add_responsive_control(
            'social_icon_hradius',
            [
                'label' => esc_html__( 'Border Radius', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .our-team-one .team-one-social-link li a:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'social_icon_hshadow',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .our-team-one .team-one-social-link li a:hover',
            ]
        );
        
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

            //
        //=========== Dote STYLE START===========//
        //

        $this->start_controls_section(
			'dote_style',
			[
				'label' => esc_html__( 'Dote Style', 'tronixcore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'dots' => 'yes',
                ],
			]
		);
        $this->add_responsive_control(
            'dode_background_color',
            [
                'label'     => esc_html__( 'Dote Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'dote_active_color',
            [
                'label'     => esc_html__( 'Active Dote Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li.slick-active button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'dote_border',
				'selector' => '{{WRAPPER}} .slick-dots li',
			]
		);
       
        $this->add_responsive_control(
            'dote_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slick-dots li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .slick-dots li button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
		$this->add_responsive_control(
            'dote_Margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slick-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dote_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slick-dots li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'pagination_css',
            [
                'label' => esc_html__( 'Pagination Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'pagination' => 'yes',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'pagination_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .pagination-area ul li a',
            ]
        );
        $this->add_responsive_control(
            'active_pagination_color',
            [
                'label' => esc_html__( 'Active Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pagination-area ul li a.current' => 'color: {{VALUE}}',

                ],
            ]
        );
        $this->add_control(
			'actiov_note',
			[
				'label' => esc_html__( 'Active Background Color', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_responsive_control(
            'a_pagination_bg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pagination-area ul li a.current' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'pagination_color',
            [
                'label' => esc_html__( 'Normal Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pagination-area ul li a' => 'color: {{VALUE}}',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'pagination_color_hover',
            [
                'label' => esc_html__( 'Normal Hover Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pagination-area ul li a:hover' => 'color: {{VALUE}}',

                ],
            ]
        );
        $this->add_responsive_control(
            'pagination_bg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pagination-area ul li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
			'hover_bg_note',
			[
				'label' => esc_html__( 'Hover Background Color', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_responsive_control(
            'pagination_bg_hover',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pagination-area ul li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
     
        $this->end_controls_section();
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $unique = rand( 1241, 3256 );
        if ( $settings['enable_slide'] == 'yes' ) {
            $column = 'tronix-team-item-box-one';
            $row ='team-slide-wrapper';
            $box ='team-slide';
            echo '
            <script>
			jQuery(document).ready(function($) {
				"use strict";
				$("#team-' . esc_attr( $unique ) . '").slick({
                    slidesToShow: ' . json_encode( $settings['item_show'] ) . ',
                    slidesToScroll: '. json_encode( $settings['item_scroll'] ) .',
                    dots: ' . json_encode( $settings['dots'] == 'yes' ? true : false ) . ',
                    arrows: false,
                    infinite: ' . json_encode( $settings['loop'] == 'yes' ? true : false ) . ',
                    speed: ' . json_encode( $settings['speed'] ) . ',
                    autoplay: ' . json_encode( $settings['autoplay'] == 'yes' ? true : false ) . ',
                    autoplaySpeed: ' . json_encode( $settings['autoplay_speed'] ) . ',
					 rtl: ' . json_encode( is_rtl() == 'yes' ? true : false ) . ',
                    responsive: [
                      {
                        breakpoint: 1400,
                        settings: {
                          slidesToShow: 3,
                          slidesToScroll: 1,
                          infinite: true,
                        }
                      },
                      {
                        breakpoint: 1024,
                        settings: {
                          slidesToShow: 2,
                          slidesToScroll: 2,
                          infinite: true,
                          
                        }
                      },
                      {
                        breakpoint: 768,
                        settings: {
                          slidesToShow: 1,
                          slidesToScroll: 1
                        }
                      },
                    ]
                });
			});
			</script>';
        } else {
            $column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'] . ' col-12';
            $row ='row';
            $box ='team-no-slide';
        }
        if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        if($settings['enable_slide'] == 'yes' ){
            $display_items = -1;
        }else{
            $display_items = $settings['display_item'];
        }
        global $post;
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $p = new \WP_Query(array(
            'posts_per_page' => $display_items,
            'post_type' => 'tronix_team',
            'paged'     => $paged,
            'orderby'     => esc_attr($settings['orderby']),
            'order'     => esc_attr($settings['order']),
        ));
        ob_start();
        ?>
            <div class="tronix-team-one-wrapper">
                <div class="<?php echo esc_attr( $container ); ?>">
                    <div class="row" id="team-<?php echo esc_attr($unique); ?>">
                        <?php while($p->have_posts()) : $p->the_post(); 
                            $unique = get_the_ID();
                            $team_meta = get_post_meta( $unique, 'Tronix_teammeta', true );  
                        ?>
                        <div class="<?php echo esc_attr( $column ); ?>">
                            <div class="our-team-one <?php echo esc_attr( $box ); ?>">
                                <div class="our-team-one-image">
                                    <?php the_post_thumbnail(); ?>
                                    <?php if(!empty($team_meta['Tronix_team_socials'])) : ?>
                                        <div class="our-team-one-social-area">
                                            <ul class="team-one-social-link">
                                                <?php foreach($team_meta['Tronix_team_socials'] as $social ) : ?>
                                                    <li>
                                                        <a href="<?php echo esc_url($social['Tronix_teams_social_url']['url']); ?>" target="<?php echo esc_attr($social['Tronix_teams_social_url']['target']) ?>"> 
                                                            <i class="<?php echo esc_attr($social['Tronix_teams_social_icon']); ?>"></i></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="team-one-content">
                                    <h5 class="team-one-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h5>
                                    <?php if(!empty($team_meta['Tronix_team_stitle'])) : ?>
                                        <span ><?php  echo esc_html($team_meta['Tronix_team_stitle']);?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="team-border">
                                    
                                </div>
                                
                            </div>
                        </div>
                        <?php endwhile; wp_reset_postdata(); wp_reset_query(); ?>
                    </div>
                    <?php if($settings['pagination'] == 'yes' ) { ?>
                        <?php tronixcore_paginate_nav($p); ?>
                    <?php } ?>
                </div>
            </div>
        <?php
        echo ob_get_clean();

    }
}
Plugin::instance()->widgets_manager->register( new tronix_Team_Widget );