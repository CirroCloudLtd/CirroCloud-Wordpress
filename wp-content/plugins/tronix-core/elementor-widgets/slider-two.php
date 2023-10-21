<?php namespace Elementor;

class slider_two_widget extends Widget_Base {

    public function get_name() {

        return 'tronix_slider';
    }

    public function get_title() {
        return esc_html__( 'Tronix Slider', 'tronixcore' );
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
            'slider_option',
            [
                'label' => esc_html__( 'Slider', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label'   => esc_html__( 'Background Image', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
         $repeater->add_control(
            'slide_shape_image',
            [
                'label'   => esc_html__( 'Background Image', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_responsive_control(
			'image_background_color',
			[
				'label' => esc_html__( 'Background Opacity', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-item:after' => 'background-color: {{VALUE}}',
				],
			]
		);
        $repeater->add_control(
            'slide_subtitle',
            [
                'label'   => esc_html__( 'Small Title', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::TEXT ,
                'default' => esc_html__( '# IT Solution Company 2023', 'tronixcore' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label'   => esc_html__( 'Title', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( ' Best IT Solutions For Business', 'tronixcore' ),
            ]
        );
        $repeater->add_control(
            'enable_dec',
            [
                'label'        => esc_html__( 'Enable Description', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $repeater->add_control(
            'des',
            [
                'label'   => esc_html__( 'Description', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( ' Description is the pattern of narrative development that aims to make vivid a place, object, character, or group,', 'tronixcore' ),
                'condition' => [
                    'enable_dec' => 'yes',
                ],
                'rows'   =>     10,
            ]
        );
        $repeater->add_control(
            'enable_button',
            [
                'label'        => esc_html__( 'Enable Button ', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater->add_control(
            'button_text',
            [
                'label'     => esc_html__( 'Button ', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => esc_html__( 'Get Started', 'tronixcore' ),
                'condition' => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'button_link',
            [
                'label'       => esc_html__( 'Url', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'tronixcore' ),
                'options'     => ['url', 'is_external', 'nofollow'],
                'label_block' => true,
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                    'custom_attributes' => false,
                ],
                'condition'   => [
                    'enable_button' => 'yes',
                ],
            ]
        );
       
        $repeater->add_control(
            'enable_button_two',
            [
                'label'        => esc_html__( 'Enable Button ', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'   => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'button_text_two',
            [
                'label'     => esc_html__( 'Button ', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => esc_html__( 'Get Started', 'tronixcore' ),
                'condition' => [
                    'enable_button' => 'yes',
                    'enable_button_two' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'button_link_two',
            [
                'label'       => esc_html__( 'Url', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'tronixcore' ),
                'options'     => ['url', 'is_external', 'nofollow'],
                'label_block' => true,
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                    'custom_attributes' => false,
                ],
                'condition'   => [
                    'enable_button' => 'yes',
                    'enable_button_two' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'sliders',
            [
                'label'       => esc_html__( 'Repeater List', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
				'default' => [
					[
						'title' => esc_html__( 'Best IT Solutions For Business', 'tronixcore' ),
						'list_content' => esc_html__( 'One important area of tronixlogy is conservation biology, which focuses on protecting endangered species and tronixsystems. .', 'tronixcore' ),
					],
				],
                'title_field' => '{{{ title }}}',
            ]
        ); 
        $this->end_controls_section();

    //Start settings  options control
        $this->start_controls_section(
            'slider_options',
            [
                'label' => __( 'Slider Options', 'tronixcore' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'tronix_enable_dots',
            [
                'label' => esc_html__( 'Enable Dots Icon', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tronixcore' ),
                'label_off' => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'tronix_slider_autoplay',
            [
                'label' => esc_html__( 'Enable autoplay', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tronixcore' ),
                'label_off' => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'tronix_slider_speed',
            [
                'label' => esc_html__( 'Slider Speed', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 500,
                'max' => 10000,
                'step' => 100,
                'default' => 5000,
            ]
        );
        $this->end_controls_section();

		// ====================================================
                        // Slider Style css
        // ====================================================
        
		$this->start_controls_section(
			'home_slider_options',
			[
				'label' => __( 'Slider Options', 'tronixcore' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_responsive_control(
			'image_background_color',
			[
				'label' => esc_html__( 'Background Opacity', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-item-bg::after' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .slider-item-bg' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .tronix-slider-column' => 'flex:0 0 {{SIZE}}%;max-width: {{SIZE}}%;',
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
					'{{WRAPPER}} .slider-item-bg .row' => 'justify-content: {{VALUE}};text-align: {{VALUE}};',
					'{{WRAPPER}} .slider-content-box' => 'justify-content: {{VALUE}};',
				],

			]
		);
		$this->add_responsive_control(
			'box_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .slider-content-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .slider-content-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		
        // =============================================//
         // ========= SLIDER CONTENT STYLE START ========//
        // =============================================//


       	// Subtitle Style
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
				'selector' => '{{WRAPPER}} .slide-stitle',
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slide-stitle' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .slide-stitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .slide-stitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();


		// Title Style
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
                    {{WRAPPER}} .slide-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slide-title' => 'color: {{VALUE}};',
                    
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
					'{{WRAPPER}} .slide-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .slide-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'hero_options',
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
                'selector' => '{{WRAPPER}} .slide-dec',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-dec' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .slide-dec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .slide-dec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
		// Start One Button section
        $this->start_controls_section(
            'button_CSS_options',
            [
                'label' => esc_html__( 'Button CSS', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
               
            ]
        );
        $this->add_responsive_control(
            'button_CSS_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.one' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_CSS_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.one' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .theme-btns.one',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_ncolor',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.one' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_nbg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.one' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'buttons_Css_nborder',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .theme-btns.one',
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
                    '{{WRAPPER}} .theme-btns.one' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'buttons_Css_nshadow',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .theme-btns.one',
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
                    '{{WRAPPER}} .theme-btns.one:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons__shape_Css_hbg',
            [
                'label' => esc_html__( 'Background Shape Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.one:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hbg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.one:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'buttons_Css_hborder',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .theme-btns.one:hover',
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
                    '{{WRAPPER}} .theme-btns.one:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'buttons_Css_hshadow',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .theme-btns.one:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->start_controls_tabs(
            'buttons_tabs2'
        );
        $this->start_controls_tab(
            'buttons_tabs_normal2',
            [
                'label' => __( 'Normal', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'buttons_Css_typos2',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .settings-button-wrapper .theme-btns.slider-btn-style',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_ncolor2',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .settings-button-wrapper .theme-btns.slider-btn-style' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_nbg2',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .settings-button-wrapper .theme-btns.slider-btn-style' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'buttons_Css_nborder2',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .settings-button-wrapper .theme-btns.slider-btn-style',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_nradisu2',
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
                    '{{WRAPPER}} .settings-button-wrapper .theme-btns.slider-btn-style' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'buttons_Css_nshadow2',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .settings-button-wrapper .theme-btns.slider-btn-style',
            ]
        );
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'buttons_tabs_hover2',
            [
                'label' => __( 'Hover', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hcolor2',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .settings-button-wrapper .theme-btns.slider-btn-style:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons__shape_Css_hbg2',
            [
                'label' => esc_html__( 'Background Shape Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .settings-button-wrapper .theme-btns.slider-btn-style:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hbg2',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .settings-button-wrapper .theme-btns.slider-btn-style:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'buttons_Css_hborder2',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .settings-button-wrapper .theme-btns.slider-btn-style:hover',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hradisu2',
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
                    '{{WRAPPER}} .settings-button-wrapper .theme-btns.slider-btn-style:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'buttons_Css_hshadow2',
                'label' => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .settings-button-wrapper .theme-btns.slider-btn-style:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
        // ========================================================
        // =============== Slider Dote Style Css =================
        // ========================================================


        $this->start_controls_section(
			'slider_dote_css',
			[
				'label' => esc_html__('Dote Style', 'tronixcore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_responsive_control(
			'slider_dote_width',
			[
				'label' => esc_html__( 'Dote Width', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%','px' ],
				'range' => [
                    '%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tronix-slider-wrapper .slick-dots li button' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'slider_dote_height',
			[
				'label' => esc_html__( 'Dote Hieght', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%','px' ],
				'range' => [
                    '%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tronix-slider-wrapper .slick-dots li button' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

    $this->add_group_control(
        \Elementor\Group_Control_Background::get_type(),
        [
            'name' => 'Dote_background',
            'label' => esc_html__( 'Background ', 'tronixcore' ),
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .tronix-slider-wrapper .slick-dots li button',
        ]
    );
    $this->add_responsive_control(
        'active_background_color',
        [
            'label' => esc_html__( 'Active Color', 'tronixcore' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tronix-slider-wrapper .slick-dots li.slick-active button' => 'background-color: {{VALUE}}',
            ],
        ]
    );
    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name'     => 'Dote_border',
            'label'    => esc_html__( 'Border', 'tronixcore' ),
            'selector' => '{{WRAPPER}} .tronix-slider-wrapper .slick-dots li button',
        ]
    );
     $this->add_responsive_control(
        'dote_border_radius',
        [
            'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors'  => [
                '{{WRAPPER}} .tronix-slider-wrapper .slick-dots li button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .tronix-slider-wrapper .slick-dots li button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                '{{WRAPPER}} .tronix-slider-wrapper .slick-dots li button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );
    $this->end_controls_section();
}
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        ob_start();
        $SliderId = rand( 1241, 3256 );
        ?>
            <script>
                (function ($) {
                    "use strict";
                    //Documnet Ready Function
                    $( document ).ready(function() {
                        // slider - active
                        function homeSlider() {
                            var SliderActive = $('#slider<?php echo esc_attr($SliderId)?>');

                            SliderActive.slick({
                                slidesToShow: 1,
								rtl: <?php  echo json_encode( is_rtl() == 'yes' ? true : false);?>,
                                autoplay: <?php echo json_encode( $settings['tronix_slider_autoplay'] == 'yes' ? true : false ); ?>,
                                speed: 1000, // slide speed
                                autoplaySpeed: <?php echo json_encode($settings['tronix_slider_speed']); ?>,
                                dots: true,
                                fade: true,
                                draggable: true,
                                pauseOnHover: false,
                                arrows:false,
                               
                                prevArrow: $(".slider-prev"),
                                nextArrow: $(".slider-next"),
								responsive: [
                                    {
                                        breakpoint: 992,
                                        settings: {
                                            arrows:false
                                        }
                                    },
                                    {
                                        breakpoint: 768,
                                        settings: {
                                            dots: false,
                                            arrows:false
                                        }
                                    }
                                ]
                            });
                            function doAnimations(elements) {
                                var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                                elements.each(function () {
                                    var $this = $(this);
                                    var $animationDelay = $this.data('delay');
                                    var $animationType = 'animated ' + $this.data('animation');
                                    $this.css({
                                        'animation-delay': $animationDelay,
                                        '-webkit-animation-delay': $animationDelay
                                    });
                                    $this.addClass($animationType).one(animationEndEvents, function () {
                                        $this.removeClass($animationType);
                                    });
                                });
                            }

                            SliderActive.on('init', function (e, slick) {
                                var $firstAnimatingElements = $('.slider-item:first-child').find('[data-animation]');
                                doAnimations($firstAnimatingElements);
                            });

                            SliderActive.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
                                var $animatingElements = $('.slider-item[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
                                doAnimations($animatingElements);
                            });
                        }
                        homeSlider();
                    });
                })(jQuery);
			</script>
    <div class="tronix-slider-wrapper">
        <div class="slider-area">
            <div class="slider-items" id="slider<?php echo esc_attr( $SliderId ); ?>">
                <?php foreach ( $settings['sliders'] as $item ) : ?>
                <div class="slider-item">
                    <div class="slider-item-bg" style="background-image:url( <?php echo esc_url(wp_get_attachment_image_url( $item['image']['id'], 'full' )); ?> ) ">
                            <div class="hero-shape1 shape-mockup movingX" data-bottom="165px" data-right="0">
                                <?php echo wp_get_attachment_image( $item['slide_shape_image']['id'], 'full' ); ?>
                            </div>
                        <div class="tronix-table">
                            <div class="tronix-table-cell">
                                <div class="container">
                                    <div class="row">
                                        <div class="tronix-slider-column col-xl-7 col-lg-8 col-md-11">
                                            <div class="slider-content-box">
                                                <?php if(!empty($item['slide_subtitle'])) : ?>
                                                    <div class="slide-stitle" data-animation="fadeInUp" data-delay=".5s"> <?php echo esc_html( $item['slide_subtitle'] );?></div>
                                                <?php endif;?>
                                                <div class="slide-title" data-animation="fadeInUp" data-delay="1s"> <?php echo esc_html( $item['title'] );?> </div>
                                                <?php if( $item["enable_dec"] == 'yes' ): ?>
                                                    <div class="slide-dec" data-animation="fadeInUp" data-delay="1.6s"> <?php echo esc_html( $item['des'] );?> </div>
                                                <?php endif;?>

                                                <?php if( $item["enable_button"] == 'yes' ): ?>
                                                    <div class="settings-button-wrapper" data-animation="fadeInUp" data-delay="1.8s">
                                                        <?php if(!empty($item['button_text'])) :
                                                            $target = $item['button_link']['is_external'] ? ' target="_blank"' : '';
                                                            $nofollow = $item['button_link']['nofollow'] ? ' rel="nofollow"' : '';
                                                        ?>
                                                            <a  href="<?php echo esc_url($item['button_link']['url'])?>" class="theme-btns one" <?php echo  $target . $nofollow?>>  <?php echo esc_html($item['button_text']) ?></a>
                                                                    <!-- button two -->
                                                            <?php if(!empty($item['button_text_two'])) :
                                                                $target = $item['button_link_two']['is_external'] ? ' target="_blank"' : '';
                                                                $nofollow = $item['button_link_two']['nofollow'] ? ' rel="nofollow"' : '';
                                                                ?>
                                                                <a  href="<?php echo esc_url($item['button_link_two']['url'])?>" class="theme-btns slider-btn-style" <?php echo  $target . $nofollow?>>  <?php echo esc_html($item['button_text_two']) ?></a>
                                                            <?php endif;?>
                                                        <?php endif;?>
                                                    </div>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
            </div>
        </div>
        
    </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new slider_two_widget );