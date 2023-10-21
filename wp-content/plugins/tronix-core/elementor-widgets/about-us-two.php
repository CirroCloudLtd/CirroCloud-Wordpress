<?php namespace Elementor;

class tronix_about_us_two_widget extends Widget_Base {

    public function get_name() {

        return 'tronix_about_two';
    }

    public function get_title() {
        return esc_html__( 'Tronix About Us Two', 'tronixcore' );
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
            'stitle',
            [
                'label' => esc_html__( 'Small Title', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Welcome To Our Company', 'tronixcore' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Affordable Big IT & Technology Solutions', 'tronixcore' ),
                'show_label' => true,
                'dynamic' => [
                   'active' => true,
                ],
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'tronixcore' ),
                'description' => esc_html__( 'Add HTML Tag For Small Title', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1'  => esc_html__( 'H1', 'tronixcore' ),
                    'h2'  => esc_html__( 'H2', 'tronixcore' ),
                    'h3'  => esc_html__( 'H3', 'tronixcore' ),
                    'h4'  => esc_html__( 'H4', 'tronixcore' ),
                    'h5'  => esc_html__( 'H5', 'tronixcore' ),
                    'h6'  => esc_html__( 'H6', 'tronixcore' ),
                    'p'  => esc_html__( 'P', 'tronixcore' ),
                    'span'  => esc_html__( 'span', 'tronixcore' ),
                    'div'  => esc_html__( 'Div', 'tronixcore' ),
                ],
            ]
        );
        $this->add_control(
            'content',
            [
                'label' => esc_html__( 'Description', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'The goal of IT services is to provide efficient and effective technology solutions that help businesses achieve their objectives.', 'tronixcore' ),
                'dynamic' => [
                   'active' => true,
                ],
            ]
        );
        $this->add_control(
			'enable_button_area',
			[
				'label' => esc_html__( 'Enable Button Area', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tronixcore' ),
				'label_off' => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'separator' => 'before',
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
                'condition' => [
                    'enable_button_area' => 'yes',
                ],
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
                    'enable_button_area' => 'yes',
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
                    'enable_button_area' => 'yes',
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
                'condition' => [
                    'enable_button_area' => 'yes',
                ],
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
                'condition' => [
                   'enable_button_area' => 'yes',
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
                    'enable_button_area' => 'yes',
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
                    'enable_button_area' => 'yes',
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
                    'enable_button_area' => 'yes',
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
                    '{{WRAPPER}} .about_content' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
			'content_text_align',
			[
				'label'       => esc_html__('Bottom Content Align', 'tronixcore'),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
                'condition' => [
                    'enable_button_area' => 'yes',
                ],
				'options' => [
					'left' => [
						'title' => __('Left', 'tronixcore'),
						'icon'  => 'eicon-text-align-left',
					],

					'center' => [
						'title' => __('Center', 'tronixcore'),
						'icon'  => 'eicon-text-align-center',
					],

					'right' => [
						'title' => __('Right', 'tronixcore'),
						'icon'  => 'eicon-text-align-right',
					],
				],

				'devices' => ['desktop', 'tablet', 'mobile'],
				'selectors' => [
					'{{WRAPPER}} .about-button-area' => 'justify-content: {{VALUE}};',
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
                    '{{WRAPPER}} .about_content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .about_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

 
        // 
		// ----------------Subtitle Style------------------
        // 

		$this->start_controls_section(
			'subtitle_style_options',
			[
				'label' => esc_html__( 'Subtitle', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_title_typo',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .about-small-stitle',
			]
		);

		$this->add_responsive_control(
			'subtitle_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-small-stitle' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'subtitle_dote_shadow',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-small-stitle:after,{{WRAPPER}} .about-small-stitle:before',
            ]
        );
        $this->add_responsive_control(
			'subtitle_color_before',
			[
				'label'       => esc_html__('Dote Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-small-stitle:before' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .about-small-stitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .about-small-stitle' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .about-title',
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .about-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .about-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .about-des',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-des' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .about-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .about-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .about-button .theme-btns',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .about-button .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-button .theme-btns' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-button .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .about-button .theme-btns' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'label'    => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-button .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .about-button .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .about-button .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .about-button .theme-btns:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .about-button .theme-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-button .theme-btns:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-button .theme-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .about-button .theme-btns:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover',
                'label'    => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-button .theme-btns:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // Video Button Style

               
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
        $this->start_controls_tabs(
            'video_text_tabs'
        );
        $this->start_controls_tab(
            'video_text_taba',
            [
                'label' => __( 'Video Text Style', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'video_text_typos',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-video-btn span',
            ]
        );
        $this->add_responsive_control(
            'video_text_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'video_text_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'videotext_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
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
        $this->start_controls_tabs(
            'video_text_tabs2'
        );
        $this->start_controls_tab(
            'video_text_taba2',
            [
                'label' => __( 'Video Text Style', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'video_text2_typos',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .about-video-btn span',
            ]
        );
        $this->add_responsive_control(
            'video_text2_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-video-btn span' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .about-video-btn span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .about-video-btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
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
        <div class="about-section-wraper">
            <div class="<?php echo esc_attr($container)?>">
                <div class="about_content ">
                    <div class="about-item">
                    <?php if ( ! empty( $settings['stitle'] ) ) :?> <span class="about-small-stitle"> <?php echo esc_html($settings['stitle']); ?> </span><?php endif?>
                    <?php if ( ! empty( $settings['title'] ) ) :?> 
                        <<?php echo esc_attr($settings['title_tag']);?> class="about-title"> <?php echo esc_html($settings['title']); ?> 
                    </<?php echo esc_attr($settings['title_tag']);?>> <?php endif?>
                    <?php if ( ! empty( $settings['content'] ) ) :?> <div class="about-des"> <?php echo esc_html($settings['content']); ?> </div><?php endif?>
                    </div>
                    <?php if($settings['enable_button_area'] == 'yes' ) : ?>
                        
                        <div class="about-button-area">
                        <?php if($settings['enable_button'] == 'yes' ) :
                            if ( ! empty( $settings['button_url']['url'] ) ) {
                                $this->add_link_attributes( 'button_url', $settings['button_url'] );
                            }?>
                                <div class="about-button">
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
								<span><?php echo esc_html($settings['video_button_text']); ?></span>
                            </div>
                            <?php endif?>
                        </div>
                     <?php endif?>
                </div>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new tronix_about_us_two_widget );