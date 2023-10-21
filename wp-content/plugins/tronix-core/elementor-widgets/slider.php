<?php namespace Elementor;

class hero_banner_Widget extends Widget_Base {

    public function get_name() {

        return 'tronixcore_hero_banner';
    }

    public function get_title() {
        return esc_html__( 'Tronix Hero Banner', 'tronixcore' );
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
			'slider_content',
			[
				'label' => esc_html__( 'Hero Section', 'tronixcore' ),
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
			'slide_image',
			[
				'label' => __( 'Slide Background Image', 'tronixcore' ),
				'type' => Controls_Manager::MEDIA,
				'label_block' => true,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'slide_subtitle',
			[
				'label'       => __( 'Subtitle', 'tronixcore' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 5,
				'default'     => esc_html__( 'Welcome To Our Company'),
			]
		);

		$this->add_control(
			'slide_title',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Clear Thinking Makes'),
				'label_block' => true,
                'rows'        => 5,
			]
		);
		
        $this->add_control(
			'bold_title',
			[
				'label' => esc_html__( 'Bold Title', 'tronixcore' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'tronixcore' ),
                'description' => esc_html__( 'Add HTML Tag For Small Title', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h1',
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
                'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 10,
                'default' => esc_html__( 'The website design should be user-friendly, easy to navigate, and aesthetically pleasing. It should be optimized for fast loading times, and the layout should be consistent across all pages.', 'tronixcore' ),
                'dynamic' => [
                   'active' => true,
                ],
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
                'separator' => 'before',
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'tronixcore' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Discover More',
				'placeholder' => __( 'Type button text here.', 'tronixcore' ),
                'condition' => [
                    'enable_button' => 'yes',
                ],
			]
		);

		$this->add_control(
			'button_text_link',
			[
				'label' => __( 'Button URL', 'tronixcore' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'tronixcore' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
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
                'separator' => 'before',
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
                    'enable_video_button' => 'yes',
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
        $this->add_control(
			'more_options',
			[
				'label' => esc_html__( 'Slider Future Image  Options', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'enable_sape_image',
			[
				'label' => esc_html__( 'Enable Future Image', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tronixcore' ),
				'label_off' => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        $this->add_control(
			'tronix_shape_image',
			[
				'label' => esc_html__( 'Choose Image', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'condition' => [
                    'enable_sape_image' => 'yes',
                ],
			]
		);

		$this->end_controls_section();

		//Start settings  options control
		$this->start_controls_section(
			'home_slider_options',
			[
				'label' => __( 'Hero Option Options', 'tronixcore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_responsive_control(
			'image_background_color',
			[
				'label' => esc_html__( 'Background Opacity', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tronix-single-slide-item::after' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'slider_height',
			[
				'label' => __( 'Slider Height (px)', 'tronixcore' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 300,
						'max' => 1200,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'selectors' => [
					'{{WRAPPER}} .tronix-single-slide-item' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'content_width',
			[
				'label' => __( 'Content Column Width (%)', 'tronixcore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],

				'selectors' => [
					'{{WRAPPER}} .tronix-settings-content-column' => 'flex:0 0 {{SIZE}}%;max-width: {{SIZE}}%;',
				],
			]
		);

		$this->add_responsive_control(
			'content_text_align',
			[
				'label'       => esc_html__('Content Align', 'tronixcore'),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,

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
					'{{WRAPPER}} .tronix-single-slide-item .row' => 'justify-content: {{VALUE}};text-align: {{VALUE}};',
					'{{WRAPPER}} .tronix-single-slide-item .settings-button-wrapper' => 'justify-content: {{VALUE}};',
				],

			]
		);
        $this->add_responsive_control(
            'hero_section_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-single-slide-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();
		//Slider  options control end

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
				'selector' => '{{WRAPPER}} .slide-subtitle',
			]
		);

		$this->add_responsive_control(
			'subtitle_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slide-subtitle' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_responsive_control(
			'subtitle_color_before',
			[
				'label'       => esc_html__('After Dote Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slide-subtitle:before' => 'background-color: {{VALUE}};',
				],
			]
		);
 		$this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'subtitle__shadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .slide-subtitle:before',
            ]
        );
		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .slide-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .slide-subtitle' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => ' {{WRAPPER}} .tronix-slide-title',
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tronix-slide-title ' => 'color: {{VALUE}};',
                    
				],
			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'bold_title_typo',
				'label' => __( 'Blod Title Typography', 'tronixcore' ),
				'selector' => ' {{WRAPPER}} .tronix-slide-title span',
			]
		);
        $this->add_responsive_control(
			'bold_title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tronix-slide-title span' => 'color: {{VALUE}};',
                    
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
					'{{WRAPPER}} .tronix-slide-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tronix-slide-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'label' => esc_html__(' Description', 'tronixcore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'dec_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-slide-dec',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-slide-dec' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .tronix-slide-dec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-slide-dec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // 
		//----------------- Start Button section
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
        $this->add_responsive_control(
            'button_margin_style',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding_style',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'buttons_tabs'
        );
        $this->start_controls_tab(
            'buttons_tabs_normal',
            [
                'label' => __( 'Normal', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'buttons_Css_typos',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_ncolor',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_nbg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'buttons_Css_nborder',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_nradisu',
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
                'default' => [
                    'unit' => 'px',
                    
                ],
                'selectors' => [
                    '{{WRAPPER}} .theme-btns' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'buttons_Css_nshadow',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .theme-btns',
            ]
        );
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'buttons_tabs_hover',
            [
                'label' => __( 'Hover', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hcolor',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hbg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'buttons_Css_hborder',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .theme-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hradisu',
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
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .theme-btns:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'buttons_Css_hshadow',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .theme-btns:hover',
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
					'{{WRAPPER}} .hero-video-btn .play-btn' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .hero-video-btn .play-btn' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'video_btn_typos',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .hero-video-btn .play-btn',
            ]
        );
        $this->add_responsive_control(
            'video_btn_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-video-btn .play-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'video_btn_bg_color',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .hero-video-btn .play-btn',
			]
		);
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'video_btn_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .hero-video-btn .play-btn:before',
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
                    '{{WRAPPER}} .hero-video-btn .play-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .hero-video-btn .play-btn:before' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'video_btn_shadow',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .hero-video-btn .play-btn',
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
                    '{{WRAPPER}} .hero-video-btn .play-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'video_btn_bg_color_hover',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .hero-video-btn .play-btn:hover',
			]
		);
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'video_btn_border_hover',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .hero-video-btn .play-btn:before:hover',
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
                    '{{WRAPPER}} .hero-video-btn .play-btn:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'video_btn_shadow_hover',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .hero-video-btn .play-btn:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control(
            'margin_video_btn',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .hero-video-btn .play-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .hero-video-btn .play-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .hero-video-btn span',
            ]
        );
        $this->add_responsive_control(
            'video_text_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-video-btn span' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .hero-video-btn span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .hero-video-btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // 
		// ----------------tronix image Style------------------
        // 

        $this->start_controls_section(
            'tronix_image_css',
            [
                'label' => esc_html__( 'Tronix image', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'tronix_image_css_aligment',
            [
                'label' => __( 'Alignment', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'tronixcore' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'tronixcore' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'tronixcore' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tronix-hero-image-wrapper' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_image_css_shape1_width',
            [
                'label' => esc_html__( 'Width', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
               'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .tronix-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_image_css_shape1_height',
            [
                'label' => esc_html__( 'Height', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
               'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors' => [
                    '{{WRAPPER}} .tronix-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_object_fit',
            [
                'label' => esc_html__( 'Object Fit', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'fill'  => esc_html__( 'Fill', 'tronixcore' ),
                    'contain' => esc_html__( 'Contain', 'tronixcore' ),
                    'cover' => esc_html__( 'Cover', 'tronixcore' ),
                    'none' => esc_html__( 'None', 'tronixcore' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-image img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
		 $this->add_control(
			'background_shape_style',
			[
				'label' => esc_html__( 'Background Shape Style', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
			);
			$this->start_controls_tabs(
				'background_shape_one_tabs'
			);
				$this->start_controls_tab(
					'background_shape_one_tab',
					[
						'label' => esc_html__( 'Shape One', 'tronixcore' ),
					]
				);
		              $this->add_responsive_control(
                        'shape_one_color',
                        [
                            'label' => esc_html__( 'Color', 'tronixcore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tronix-image::before' => 'border-color: {{VALUE}}',
                            ],
                        ]
                    );
                   $this->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'shape_one_bg',
							'label' => esc_html__( 'Background', 'tronixcore' ),
							'types' => [ 'classic', 'gradient', 'video' ],
							'selector' => '{{WRAPPER}} .tronix-image::before',
						]
					);
					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'shape_one_border',
							'label' => esc_html__( 'Border', 'tronixcore' ),
							'selector' => '{{WRAPPER}} .tronix-image::before',
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'shape_one_shadow',
							'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
							'selector' => '{{WRAPPER}} .tronix-image::before',
						]
					);
				$this->end_controls_tab();
		
				$this->start_controls_tab(
					'background_shape_two_tab',
					[
						'label' => esc_html__( 'Shape Two', 'tronixcore' ),
					]
				);
				$this->add_responsive_control(
                        'shape_two_color',
                        [
                            'label' => esc_html__( 'Color', 'tronixcore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tronix-image::after' => 'border-color: {{VALUE}}',
                            ],
                        ]
                    );
                   $this->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'shape_two_bg',
							'label' => esc_html__( 'Background', 'tronixcore' ),
							'types' => [ 'classic', 'gradient', 'video' ],
							'selector' => '{{WRAPPER}} .tronix-image::after',
						]
					);
					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'shape_two_border',
							'label' => esc_html__( 'Border', 'tronixcore' ),
							'selector' => '{{WRAPPER}} .tronix-image::after',
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'shape_two_shadow',
							'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
							'selector' => '{{WRAPPER}} .tronix-image::after',
						]
					);
				$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->add_responsive_control(
            'video_text2_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-hero-image-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'videotext2_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-hero-image-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
	}

	//Render In HTML
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
		?>
        <div class="tronix-slider-banner-wrapper">
            <div class="tronix-single-slide-item tronix-cover-bg" style="background-image: url(<?php echo esc_url($settings['slide_image']['url'])?>)">
                <div class="tronix-table">
                    <div class="tronix-table-cell">
                        <div class="<?php echo esc_attr($container)?>">
                            <div class="row">
                                <div class="tronix-settings-content-column col-xl-6 col-lg-6 col-md-12">
                                    <div class="tronix-settings-content-box">
                                        <?php if(!empty($settings['slide_subtitle'])) :?> 
                                            <span class="slide-subtitle" > <?php echo esc_html($settings['slide_subtitle']);?></span>
                                        <?php endif;?>
                                        <?php if(!empty($settings['slide_title'])) :?> 
                                            <<?php echo esc_attr($settings['title_tag']);?> class="tronix-slide-title" > <?php echo esc_html($settings['slide_title']);?>
												<?php if(!empty($settings['bold_title'])) : ?> <span><?php echo esc_html($settings['bold_title']);?></span>  <?php endif;?>
                                            </<?php echo esc_attr($settings['title_tag']);?>>
                                        <?php endif;?>
                                        <?php if(!empty($settings['content'])) :?>
                                            <div class="tronix-slide-dec" > <?php echo esc_html($settings['content']) ;?> </div>
                                        <?php endif;?>

                                        <div class="settings-button-wrapper">
                                            <?php if(!empty($settings['enable_button'])) :
                                                if ( ! empty( $settings['button_text_link']['url'] ) ) {
                                                    $this->add_link_attributes( 'button_text_link', $settings['button_text_link'] );
                                                }
                                            ?>
                                                <div class="hero-button">
                                                    <a  <?php echo $this->get_render_attribute_string( 'button_text_link' ); ?> class="theme-btns"> <?php echo esc_html($settings['button_text']) ?></a>
                                                </div>
                                            <?php endif;?>
                                            <?php if(!empty($settings['enable_video_button'])) :
												if ( ! empty( $settings['video_link']['url'] ) ) {
												$this->add_link_attributes( 'video_link', $settings['video_link'] );
											 	} ?>
                                                    <div class="hero-video-btn">
                                                        <?php if($settings['video_button_select'] == 'one' ) : ?>
                                                            <a <?php echo $this->get_render_attribute_string( 'video_link' ); ?> class="play-btn" id="video-btn-<?php echo esc_attr( $unique_id ); ?>">
                                                                <?php \Elementor\Icons_Manager::render_icon( $settings['video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                            </a>
                                                        <?php endif;?>
                                                        <!-- Video Btn -->
                                                        <?php if($settings['video_button_select'] == 'two' ) : ?>
                                                            <a <?php echo $this->get_render_attribute_string( 'video_link' ); ?> class="play-btn-two" id="video-btn-<?php echo esc_attr( $unique_id ); ?>">
                                                                <?php \Elementor\Icons_Manager::render_icon( $settings['video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                            </a>
                                                        <?php endif;?>
                                                        <span><?php echo esc_html($settings['video_button_text']); ?></span>
                                                    </div>
                                                
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                                <?php if($settings['enable_sape_image'] == 'yes' ) : ?>
                                    <div class="col-xl-6 col-lg-6 col-md-12">
										<?php if(!empty($settings['tronix_shape_image'])) :?>
											<div class="tronix-hero-image-wrapper">
												<div class="tronix-image">
													<?php  echo wp_get_attachment_image( $settings['tronix_shape_image']['id'], 'full' ); ?>
												</div>
											</div>
										<?php endif; ?>
                                    </div> 
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php
	}
}
Plugin::instance()->widgets_manager->register( new hero_banner_Widget );
