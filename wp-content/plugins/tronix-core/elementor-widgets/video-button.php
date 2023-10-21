<?php namespace Elementor;

class video_button_widget extends Widget_Base {

    public function get_name() {

        return 'video_button';
    }

    public function get_title() {
        return esc_html__( 'Tronix Video Button', 'tronixcore' );
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
            'tronixcore_about_options',
            [
                'label' => esc_html__( 'About Content', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'enable_container',
			[
				'label' => esc_html__( 'Enable Container', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tronixcore' ),
				'label_off' => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
       
        $this->add_control(
			'enable_button',
			[
				'label' => esc_html__( 'Enable Button', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tronixcore' ),
				'label_off' => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Read More', 'tronixcore' ),
                'show_label' => true,
                'label_block' => true,
                'dynamic' => [
                   'active' => true,
                ],
                'condition' => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $this->add_control(
			'button_url',
			[
				'label' => esc_html__( 'Button Url', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'tronixcore' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
				'label_block' => true,
                'condition' => [
                    'enable_button' => 'yes',
                ],
			]
		);
        $this->add_control(
			'enable_video_button',
			[
				'label' => esc_html__( 'Enable Video Button', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tronixcore' ),
				'label_off' => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'video_button_select',
			[
				'label' => esc_html__( 'Video Button Select', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one' => esc_html__( 'One', 'tronixcore' ),
					'two' => esc_html__( 'Two', 'tronixcore' ),
				],
			]
		);
        $this->add_control(
            'video_button_text',
            [
                'label' => esc_html__( 'Text', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Watch Video', 'tronixcore' ),
                'label_block' => true,
                'dynamic' => [
                   'active' => true,
                ],
                'condition' => [
                    'enable_video_button' => 'yes',
                ],
            ]
        );
        $this->add_control(
			'video_icon',
			[
				'label' => esc_html__( 'Icon', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-play',
                    'library' => 'fa-solid',
				],
                'condition' => [
                    'enable_video_button' => 'yes',
                ],
			]
		);
        $this->add_control(
            'video_link',
            [
                'label' => __( 'Link', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'label_block' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'enable_video_button' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();
       
        $this->start_controls_section(
            'box_css_options',
            [
                'label' => esc_html__( 'Box', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'align',
            [
                'label' => __( 'Alignment', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'tronixcore' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'tronixcore' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'tronixcore' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .video-button-area' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .video-button-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .video-button-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //
        //------------Button Style css--------------------
        //

        $this->start_controls_section(
            'button_CSS_options',
            [
                'label' => esc_html__( 'Button CSS', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_button' => 'yes',
                ],
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
                'name'     => 'border_text_typography',
                'selector' => '{{WRAPPER}} .button-style-one .theme-btns',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .button-style-one .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-style-one .theme-btns' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .button-style-one .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .button-style-one .theme-btns' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'label'    => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .button-style-one .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .button-style-one .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .button-style-one .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography_hover',
                'selector' => '{{WRAPPER}} .button-style-one .theme-btns:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .button-style-one .theme-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button-style-one .theme-btns:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .button-style-one .theme-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .button-style-one .theme-btns:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover',
                'label'    => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .button-style-one .theme-btns:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

               
        // 
		// ----------------Video Button Style------------------
        // 

        $this->start_controls_section(
			'video_button_style',
			[
				'label' => esc_html__( 'Video Button Style', 'tronixcore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_video_button' => 'yes',
					'video_button_select' => 'one',
                ],
			]
		);
        $this->start_controls_tabs(
            'video_buttons_tabs'
        );
        $this->start_controls_tab(
            'video_button_normal_taba',
            [
                'label' => __( 'Normal', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
			'icon_height',
			[
				'label' => esc_html__( 'Height', 'tronixcore' ),
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
					'{{WRAPPER}} .about-video-btn .play-btn' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__( 'Width', 'tronixcore' ),
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
					'{{WRAPPER}} .about-video-btn .play-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'video_btn_typos',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-video-btn .play-btn',
            ]
        );
        $this->add_responsive_control(
            'video_btn_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn .play-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'video_btn_bg_color',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .about-video-btn .play-btn',
			]
		);
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'video_btn_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-video-btn .play-btn:before',
            ]
        );
        $this->add_responsive_control(
            'video_btn_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn .play-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .about-video-btn .play-btn:before' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'video_btn_shadow',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-video-btn .play-btn',
            ]
        );
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'video_btn_hover',
            [
                'label' => __( 'Hover', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'video_btn_color_hover',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn .play-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'video_btn_bg_color_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .about-video-btn .play-btn:hover',
			]
		);
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'video_btn_border_hover',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-video-btn .play-btn:before:hover',
            ]
        );
        $this->add_responsive_control(
            'video_btn_radius_hover',
            [
                'label' => esc_html__( 'Border Radius', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn .play-btn:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'video_btn_shadow_hover',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-video-btn .play-btn:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control(
            'margin_video_button',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn .play-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'video_btn_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn .play-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
		
		// 		Video Button Two Style
		// 		
		
		  $this->start_controls_section(
			'video_button2_style',
			[
				'label' => esc_html__( 'Video Button Style', 'tronixcore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'video_button_select' => 'two',
					'enable_video_button' => 'yes',
                ],
			]
		);
        $this->start_controls_tabs(
            'video_btn2_tabs'
        );
        $this->start_controls_tab(
            'video_btn2_normal_taba',
            [
                'label' => __( 'Normal', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
			'video_btn2_icon_height',
			[
				'label' => esc_html__( 'Height', 'tronixcore' ),
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
					'{{WRAPPER}} .about-video-btn .play-btn-two' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'video_btn2_icon_width',
			[
				'label' => esc_html__( 'Width', 'tronixcore' ),
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
					'{{WRAPPER}} .about-video-btn .play-btn-two' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'video_btn2_video_btn_typos',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-video-btn .play-btn-two',
            ]
        );
        $this->add_responsive_control(
            'video_btn2_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn .play-btn-two' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'video_btn2_bg_color',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .about-video-btn .play-btn-two',
			]
		);
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'video_btn2_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-video-btn .play-btn-two',
            ]
        );
        $this->add_responsive_control(
            'video_btn2_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn .play-btn-two' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'video_btn2_shadow',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-video-btn .play-btn-two',
            ]
        );
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'video_btn2_hover',
            [
                'label' => __( 'Hover', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'video_btn2_color_hover',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn .play-btn-two:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'video_btn2_bg_color_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .about-video-btn .play-btn-two:hover',
			]
		);
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'video_btn2_border_hover',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-video-btn .play-btn-two:hover',
            ]
        );
        $this->add_responsive_control(
            'video_btn2_radius_hover',
            [
                'label' => esc_html__( 'Border Radius', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn .play-btn-two:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'video_btn2_shadow_hover',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-video-btn .play-btn-two:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control(
            'video_btn_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn .play-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'padding_video_btn',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn .play-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'title_style_options',
			[
				'label' => esc_html__( 'video Title', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'video_text2_typos',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .video-button-area .about-video-btn span',
            ]
        );
        $this->add_responsive_control(
            'video_text2_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .video-button-area .about-video-btn span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'video_text2_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .video-button-area .about-video-btn span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'video_text2_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .video-button-area .about-video-btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
       
        $unique_id = rand( 1241, 3256 );
        echo '<script>
        jQuery(document).ready(function($) {
            "use strict";
            $("#video-btn-' . $unique_id . '").magnificPopup({
                disableOn: 700,
                type: "iframe",
                mainClass: "mfp-fade",
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        });
        </script>';
        if( $settings['enable_container'] == 'yes' ){
            $container = 'container';
        }else{
            $container = 'container-fluid';
        }
        ob_start();
        ?>
        <div class="video-button-area">
            <div class="<?php echo esc_attr($container)?>">
                <?php if($settings['enable_button'] == 'yes' ) :
                if ( ! empty( $settings['button_url']['url'] ) ) {
                    $this->add_link_attributes( 'button_url', $settings['button_url'] );
                }?>
                    <div class="button-style-one">
                        <a <?php echo $this->get_render_attribute_string( 'button_url' ); ?> class=" theme-btns"><?php echo esc_html($settings['button_text']); ?></a>
                    </div>
                <?php endif?>
                <?php if($settings['enable_video_button'] == 'yes' ) : ?>
                    <div class="about-video-btn">
                        <?php if($settings['video_button_select'] == 'one' ) : ?>
                            <a href="<?php echo esc_url( $settings['video_link']['url'] ); ?>" class="play-btn" id="video-btn-<?php echo esc_attr( $unique_id ); ?>">
                                <?php \Elementor\Icons_Manager::render_icon( $settings['video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </a>
                            <?php endif;?>
                            <!-- Video Btn -->
                        <?php if($settings['video_button_select'] == 'two' ) : 
                            if ( ! empty( $settings['video_link']['url'] ) ) {
                                $this->add_link_attributes( 'video_link', $settings['video_link'] );
                            }?>
                            <a <?php echo $this->get_render_attribute_string( 'video_link' ); ?> class="play-btn-two" id="video-btn-<?php echo esc_attr( $unique_id ); ?>">
                                <?php \Elementor\Icons_Manager::render_icon( $settings['video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </a>
                        <?php endif;?>
                        <?php if ( ! empty( $settings['video_button_text'] ) ) :?>
                            <span><?php echo esc_html($settings['video_button_text']); ?></span>
                        <?php endif;?>
                    </div>
                <?php endif?>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new video_button_widget );