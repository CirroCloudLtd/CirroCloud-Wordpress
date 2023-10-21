<?php
namespace Elementor;

class footer_four_widget extends Widget_Base {

    public function get_name() {

        return 'footer_four';
    }

    public function get_title() {
        return esc_html__( 'Tronix Footer template Four ', 'tronixcore' );
    }

    public function get_icon() {

        return 'eicon-shape';
    }

    public function get_categories() {
        return ['tronix_footer_template'];
    }
	protected function register_controls() {
        //Content tab start
		$this->start_controls_section(
			'widget_area_enable',
			[
				'label' => esc_html__( 'Widget Area', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'edit_widget_from_appearance',
			[
				'label'     => esc_html__( 'Edit Widget From Appearance?', 'tronixcore' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'tronixcore' ),
				'label_off' => esc_html__( 'No', 'tronixcore' ),
				'default'   => 'no',
				'description'   => esc_html__( 'If this option is enable then you can add / remove / edit widgets from Appearance -> Widgets -> Footer Widgets. If Disable you can only edit widgets 				  from here.', 'tronixcore' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'widgetbackground',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .footer-widget-area',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'footer_list',
			[
				'label' => esc_html__( 'About Widget', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'edit_widget_from_appearance!' => 'yes',
				],
			]
		);

        $this->add_control(
			'about_widget_title',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'About Us', 'tronixcore' ),
                'label_block'   => true,
			]
		);
        $this->add_control(
			'about_widget_des',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'An IT consultancy can help you assess your technology needs and develop a technology strategy that aligns with your business', 'tronixcore' ),
			]
		);
        $this->add_control(
			'social_options',
			[
				'label' => esc_html__( 'Social Control ', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'tronix_about_social_icon',
            [
                'label' => esc_html__( 'Icon', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'solid',
                ], 
            ]
        );
        $repeater->add_control(
            'tronix_social_icon_link',
            [
                'label' => __( 'Link', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'tronixcore' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'tronix_social_icon_list',
            [
                'label'   => esc_html__( 'Icons List', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'tronix_about_social_icon' => '',
                    ],
                ],
            ]
        );

		$this->end_controls_section();


        $this->start_controls_section(
			'footer_link_widget',
			[
				'label' => esc_html__( 'Quick Links Widget', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'edit_widget_from_appearance!' => 'yes',
				],
			]
		);
        $this->add_control(
			'link_widget_title',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Quick Links', 'tronixcore' ),
                'label_block'   => true,
			]
		);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'link_title',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'link', 'tronixcore' ),
                'label_block'   => true,
			]
		);
        $repeater->add_control(
            'link_url',
            [
                'label' => __( 'Link', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'tronixcore' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'tronix_link_list',
            [
                'label'   => esc_html__( 'Link List', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'link_title' => esc_html__( 'Explore', 'tronixcore' ),
                    ],
                    [
                        'link_title' => esc_html__( 'Meet Our Team', 'tronixcore' ),
                    ],
                    [
                        'link_title' => esc_html__( 'News & Media', 'tronixcore' ),
                    ],
                    [
                        'link_title' => esc_html__( 'Our Project', 'tronixcore' ),
                    ],
                    [
                        'link_title' => esc_html__( 'Contact', 'tronixcore' ),
                    ],
                ],
            ]
        );
		$this->end_controls_section();

		
		$this->start_controls_section(
			'footer_link_widget2',
			[
				'label' => esc_html__( 'Services List Widget', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'edit_widget_from_appearance!' => 'yes',
				],
			]
		);
        $this->add_control(
			'link_widget_title2',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Services', 'tronixcore' ),
                'label_block'   => true,
			]
		);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'link_title2',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
			]
		);
        $repeater->add_control(
            'link_url2',
            [
                'label' => __( 'Link', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'tronixcore' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'tronix_link_list2',
            [
                'label'   => esc_html__( 'Service List', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'link_title2' => esc_html__( 'Cyber Security', 'tronixcore' ),
                    ],
                    [
                        'link_title2' => esc_html__( ' IT Management', 'tronixcore' ),
                    ],
                    [
                        'link_title2' => esc_html__( ' QA & Testing', 'tronixcore' ),
                    ],
                    [
                        'link_title2' => esc_html__( ' Infrastructure Plan', 'tronixcore' ),
                    ],
                    [
                        'link_title2' => esc_html__( 'IT Consultant', 'tronixcore' ),
                    ],
                ],
            ]
        );
		$this->end_controls_section();
// ----------------------------------------------
		$this->start_controls_section(
			'newslatter_widget',
			[
				'label' => esc_html__( 'Newslatter Widget', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'edit_widget_from_appearance!' => 'yes',
				],
			]
		);
		$this->add_control(
			'newslatter_widget_title',
			[
				'label' => esc_html__( 'Newslatter Title', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Get In Touch', 'tronixcore' ),
                'label_block'   => true,
			]
		);
		$this->add_control(
            'newslatter_des',
            [
                'label'   => esc_html__( 'Description ', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Curabitur aliquet quam posuere blandit ellentesque insdorci ipsum id orci porta dapibus', 'tronixcore' ),
                'label_block'   => true,
            ]
        );
        $this->add_control(
			'newslatter_form',
			[
				'label' => esc_html__( 'Shoer Code', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'Copyright_option',
			[
				'label' => esc_html__( 'Copyright', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'Copyright',
			[
				'label'       => __( 'Copyright Text', 'tronixcore' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => 'Copyright © 2023. All Rights Reserved.',
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		// --------------
		//-------------- Footer Style Start -----------------
		// --------------
		$this->start_controls_section(
            'footer_box_css',
            [
                'label' => esc_html__( 'Footer Box Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'footer_box_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .footer-four-wrapper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'footer_box_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .footer-four-content-wrp',
            ]
        );
        $this->add_responsive_control(
            'footer_box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-content-wrp' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_box_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-content-wrp' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
     
        // --------------
		// ----------------Footer About Widget Style------------------
        // --------------

		$this->start_controls_section(
			'about_style_options',
			[
				'label' => esc_html__( 'About Wiget Style', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'about_style_tabs'
		);
		
		$this->start_controls_tab(
			'about_normal_tab',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'about_title_typo',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .footer-four-about-widget-info .footer-one-widget-title',
			]
		);
		$this->add_responsive_control(
			'about_title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-four-about-widget-info .footer-one-widget-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'about_title_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-four-about-widget-info .footer-one-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'about_title_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-four-about-widget-info .footer-one-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'about_des_normal_tab',
			[
				'label' => esc_html__( 'Description', 'tronixcore' ),
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'about_dec_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .footer-four-widget-des',
            ]
        );
        $this->add_responsive_control(
            'about_dec_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-four-widget-des' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'about_dec_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-four-widget-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'about_dec_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-four-widget-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();

		// ------- Social Icon Style
		$this->add_control(
			'social_media_heading',
			[
				'label' => esc_html__( 'Social Icon Style', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->start_controls_tabs(
            'tronix_social_icon_tabs'
        );
        $this->start_controls_tab(
            'tronix_social_icon_tabs_normal',
            [
                'label' => __( 'Icon Normal', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-one-social-widget ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_bg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-one-social-widget ul li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_width',
            [
                'label' => esc_html__( 'Width', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-one-social-widget ul li a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_height',
            [
                'label' => esc_html__( 'Height', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-one-social-widget ul li a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tronix_social_icon_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .footer-one-social-widget ul li a',
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_radius',
            [
                'label' => esc_html__( 'Radius', 'tronixcore' ),
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
                    '{{WRAPPER}} .footer-one-social-widget ul li a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'tronix_social_icon_shadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .footer-one-social-widget ul li a',
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-social-icon-box ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-one-social-widget ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'tronix_social_icon_tabs_hover',
            [
                'label' => __( 'Icon Hover', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_hcolor',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-one-social-widget ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_hcolorbg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-one-social-widget ul li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tronix_social_icon_hborder',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .footer-one-social-widget ul li a:hover',
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_hradius',
            [
                'label' => esc_html__( 'Radius', 'tronixcore' ),
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
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-one-social-widget ul li a:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'tronix_social_icon_hshadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .footer-one-social-widget ul li a:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
		$this->end_controls_section();
    
		// -----------------
		// ------------------ Link Widget Style Start ------------=
		// ------------------

		$this->start_controls_section(
			'link_style_options',
			[
				'label' => esc_html__( 'Link Wiget Style', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'link_style_tabs'
		);
		
		$this->start_controls_tab(
			'link_normal_tab',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_title_typo',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .footer-four-menu-widget .footer-one-widget-title',
			]
		);
		$this->add_responsive_control(
			'link_title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-four-menu-widget .footer-one-widget-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'link_title_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-four-menu-widget .footer-one-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'link_title_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-four-menu-widget .footer-one-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'link_list_normal_tab',
			[
				'label' => esc_html__( 'List Style', 'tronixcore' ),
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_list_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .footer-one-link-menu ul li a',
            ]
        );
        $this->add_responsive_control(
            'link_list_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-one-link-menu ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_responsive_control(
            'link_list_color_hover',
            [
                'label' => esc_html__( 'Hover Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-one-link-menu ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_list_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-one-link-menu ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_list_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-one-link-menu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// -----------------
		// ------------------ Link Two Widget Style Start ------------=
		// ------------------

		$this->start_controls_section(
			'link_style_options2',
			[
				'label' => esc_html__( 'Service Link Wiget Style', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'link_style_tabs2'
		);
		
		$this->start_controls_tab(
			'link_normal_tab2',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'link_title_typo2',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .footer-four-service-list-widget .footer-one-widget-title',
			]
		);
		$this->add_responsive_control(
			'link_title_color2',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-four-service-list-widget .footer-one-widget-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'link_title_margin2',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-four-service-list-widget .footer-one-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'link_title_padding2',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-four-service-list-widget .footer-one-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'link_list_normal_tab2',
			[
				'label' => esc_html__( 'List Style', 'tronixcore' ),
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_list_typo2',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .footer-one-service-list ul li a',
            ]
        );
        $this->add_responsive_control(
            'link_list_color2',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-one-service-list ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_responsive_control(
            'link_list_color_hover2',
            [
                'label' => esc_html__( 'Hover Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-one-service-list ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_list_margin2',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-one-service-list ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_list_padding2',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-one-service-list ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

			// -----------------
		// ------------------ Recent Post  Widget Style Start ------------=
		// ------------------

		$this->start_controls_section(
			'newslatter_widget_style',
			[
				'label' => esc_html__( 'Newslatter Wiget Style', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'newslatter_title_tabs'
		);

		$this->start_controls_tab(
			'newslatter_normal_tab',
			[
				'label' => esc_html__( 'Newslatter Title', 'tronixcore' ),
			]
		);
		$this->add_control(
			'newslatter_section_title',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'newslatter_title_typo',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .footer-footer_four_newslatter  .footer-four-widget-title',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'newslatter_title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-footer_four_newslatter  .footer-four-widget-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'newslatter_title_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-footer_four_newslatter  .footer-four-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'newslatter_title_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-footer_four_newslatter  .footer-four-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
        $this->start_controls_tab(
			'newslatter_des_style',
			[
				'label' => esc_html__( 'Descripiton', 'tronixcore' ),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'newslatter_des_typo',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .footer-footer_four_newslatter  .footer-four-news-des',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'newslatter_des_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-footer_four_newslatter  .footer-four-news-des' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'newslatter_des_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-footer_four_newslatter  .footer-four-news-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'newslatter_des_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-footer_four_newslatter  .footer-four-news-des' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
		// Image Tab -----------
		$this->start_controls_tabs(
			'form_style_tabs'
		);
		
		$this->start_controls_tab(
			'form_normal_tab',
			[
				'label' => esc_html__( 'Newslatter Form', 'tronixcore' ),
			]
		);
        $this->add_control(
            'tronix_ctf7_input_height',
            [
                'label'      => __( 'Width', 'tronixcore' ),
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
                    '{{WRAPPER}} .footer-newslatter-area input[type="email"]' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'tronix_ctf7_input_width',
            [
                'label'      => __( 'Width', 'tronixcore' ),
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
                    '{{WRAPPER}} .footer-newslatter-area input[type="email"]' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'tronix_ctf7_input_bg',
            [
                'label'     => __( 'Background Color', 'tronixcore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-newslatter-area input[type="email"]' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'tronix_ctf7_input_typography',
                'selector' => '{{WRAPPER}} .footer-newslatter-area input[type="email"]',
            ]
        );
        $this->add_control(
            'tronix_ctf7_input_text_color',
            [
                'label'     => __( 'Text Color', 'tronixcore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-newslatter-area input[type="email"]' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'tronix_ctf7_input_placeholder_color',
            [
                'label'     => __( 'Placeholder Color', 'tronixcore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-newslatter-area input[type="email"]::-webkit-input-placeholder'  => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'tronix_ctf7_input_border',
                'label'    => __( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .footer-newslatter-area input[type="email"]',
            ]
        );
        $this->add_responsive_control(
            'tronix_ctf7_input_border_radius',
            [
                'label'     => __( 'Border Radius', 'tronixcore' ),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .footer-newslatter-area input[type="email"]' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'tronix_ctf7_input_padding',
            [
                'label'      => __( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-newslatter-area input[type="email"]'   => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
        $this->add_responsive_control(
            'tronix_ctf7_input_margin',
            [
                'label'      => __( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-newslatter-area'   => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->start_controls_tabs(
			'button_style_tabs'
		);
		
		$this->start_controls_tab(
			'button_style_tab',
			[
				'label' => esc_html__( 'Button Style', 'tronixcore' ),
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography',
                'selector' => '{{WRAPPER}} .tronix-newslatter-button input[type="submit"]',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .tronix-newslatter-button input[type="submit"]',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover',
                'label'    => esc_html__( 'Background Hover Color', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .tronix-newslatter-button input[type="submit"]:hover',
            ]
        );
        $this->add_responsive_control(
            'button_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-newslatter-button input[type="submit"]' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-newslatter-button input[type="submit"]:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-newslatter-button input[type="submit"]',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-newslatter-button input[type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'label'    => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-newslatter-button input[type="submit"]',
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-newslatter-button input[type="submit"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-newslatter-button input[type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tabs();
		$this->end_controls_section();


	
		 // 
		// ----------------Copyright Style------------------
        // 

		$this->start_controls_section(
			'Copyright_style_options',
			[
				'label' => esc_html__( 'Copyright Section', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->start_controls_tabs(
            'copyright_section_section_tabs'
        );
        $this->start_controls_tab(
            'copyright_section_normal_tab',
            [
                'label' => esc_html__( 'Box Style', 'tronixcore' ),
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
					'{{WRAPPER}} .footer-four-copyright-section' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .footer-four-copyright-section',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .footer-four-copyright-section',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-copyright-section' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .footer-four-copyright-section',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-copyright-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-four-copyright-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->start_controls_tabs(
            'copyright_section_logo_tabs'
        );
        $this->start_controls_tab(
            'copyright_section_logo_tab',
            [
                'label' => esc_html__( 'Logo Style', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
			'max_Image_height',
			[
				'label' => esc_html__( 'Max Height', 'tronixcore' ),
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
                'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .footer-four-logo-are > img' => 'max-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'Image_height',
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
                'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .footer-four-logo-are > img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'Image_width',
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
					'{{WRAPPER}} .footer-four-logo-are > img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'object',
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
                    '{{WRAPPER}} .footer-four-logo-are > img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tronix_image_border',
				'selector' => '{{WRAPPER}} .footer-four-logo-are > img',
			]
		);
		 $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-four-logo-are > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->start_controls_tabs(
            'copyright_section_text_tabs'
        );
        $this->start_controls_tab(
            'copyright_section_text_tab',
            [
                'label' => esc_html__( 'Copyright Text', 'tronixcore' ),
            ]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'Copyright_typo',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .footer-one-copyright-text',
			]
		);
		$this->add_responsive_control(
			'Copyright_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-one-copyright-text' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'Copyright_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .footer-one-copyright_area',
            ]
        );
		$this->add_responsive_control(
			'Copyright_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-one-copyright_area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'Copyright_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-one-copyright_area' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		?>
        <div class="footer-four-wrapper">
		    <?php if ( $settings['edit_widget_from_appearance'] != 'yes' ) { ?>
                <div class="footer-four-content-wrp">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                <div class="footer-four-about-widget-info style-four">
                                    <h5 class="footer-one-widget-title footer-four-widget-title"> <?php echo esc_html( $settings['about_widget_title'] ); ?> </h5>
                                    <div class="footer-four-widget-des">  <?php echo esc_html( $settings['about_widget_des'] ); ?> </div>
                                    <div class="footer-one-social-widget footer-four-social">
                                        <ul>
                                            <?php foreach($settings['tronix_social_icon_list'] as $social_icon):
                                                $url      = $social_icon['tronix_social_icon_link']['url'];
                                                $target   = $social_icon['tronix_social_icon_link']['is_external'] ? ' target="_blank"' : '';
                                                $nofollow = $social_icon['tronix_social_icon_link']['nofollow'] ? ' rel="nofollow"' : '';
                                                ?>	
                                                <li>
                                                    <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow;?> >  
                                                        <?php \Elementor\Icons_Manager::render_icon( $social_icon['tronix_about_social_icon'], ['aria-hidden' => 'true'] );?>
                                                    </a>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-12 footer-four-col">
                                <div class="footer-four-menu-widget ">
                                    <h5 class="footer-one-widget-title footer-four-widget-title"> <?php echo esc_html( $settings['link_widget_title'] ); ?></h5>
                                    <div class="footer-one-link-menu four">
                                        <ul>
                                            <?php foreach($settings['tronix_link_list'] as $link_list):
                                                $url      = $link_list['link_url']['url'];
                                                $target   = $link_list['link_url']['is_external'] ? ' target="_blank"' : '';
                                                $nofollow = $link_list['link_url']['nofollow'] ? ' rel="nofollow"' : '';
                                                ?>	
                                                <li>
                                                    <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow;?> >
                                                        <?php echo esc_html( $link_list['link_title'] ); ?>
                                                    </a>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-12 footer-four-col">
                                <div class="footer-four-service-list-widget">
                                    <h5 class="footer-one-widget-title footer-four-widget-title"><?php echo esc_html( $settings['link_widget_title2'] ); ?></h5>
                                    <div class="footer-one-service-list four">
                                        <ul>
                                            <?php foreach($settings['tronix_link_list2'] as $link_list2):
                                                $url      = $link_list2['link_url2']['url'];
                                                $target   = $link_list2['link_url2']['is_external'] ? ' target="_blank"' : '';
                                                $nofollow = $link_list2['link_url2']['nofollow'] ? ' rel="nofollow"' : '';
                                                ?>	
                                                <li>
                                                    <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow;?> >
                                                        <?php echo esc_html( $link_list2['link_title2'] ); ?>
                                                    </a>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                <div class="footer-footer_four_newslatter ">
                                    <h5 class="footer-one-widget-title footer-four-widget-title"><?php echo esc_html( $settings['newslatter_widget_title'] ); ?></h5>
                                    <div class="footer-four-news-des">  <?php echo esc_html( $settings['newslatter_des'] ); ?> </div>
                                    <form class="footer-four-newsletter-form">
                                        <?php echo do_shortcode( $settings['newslatter_form'] );?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                    <?php if(  is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) && $settings['edit_widget_from_appearance'] == 'yes' ) : ?>
                        <div class="footer-widget-area">
                            <div class="container">
                                <div class="row">
                                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                            <?php dynamic_sidebar( 'footer-1' ); ?>
                                        </div><!-- .widget-area -->
                                    <?php endif; ?>
                    
                                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                            <?php dynamic_sidebar( 'footer-2' ); ?>
                                        </div><!-- .widget-area -->
                                    <?php endif; ?>	
                    
                                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                            <?php dynamic_sidebar( 'footer-3' ); ?>
                                        </div><!-- .widget-area -->
                                    <?php endif; ?>
                    
                                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                            <?php dynamic_sidebar( 'footer-4' ); ?>
                                        </div><!-- .widget-area -->
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif;
                };
			?>
            <div class="footer-four-copyright_area">
                <div class="container">
                    <div class="footer-four-copyright-section">
                        <div class="footer-four-logo-are">
                            <?php echo wp_get_attachment_image( $settings['image']['id'], 'full' ); ?>
                        </div>
                        <div class="footer-four-copyright-text">
                            <?php echo $settings['Copyright'];?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


	<?php

	}
}

Plugin::instance()->widgets_manager->register( new footer_four_widget );