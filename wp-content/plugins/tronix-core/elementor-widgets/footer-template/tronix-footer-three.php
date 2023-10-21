<?php
namespace Elementor;

class tronix_footer_three_widget extends Widget_Base {

    public function get_name() {

        return 'tronix_footer_three';
    }

    public function get_title() {
        return esc_html__( 'Tronix Footer template Three ', 'tronixcore' );
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
                        'tronix_social_icon_link' => '',
                        'tronix_social_icons_latel' => '',
                    ],
                ],
            ]
        );

		$this->end_controls_section();


        $this->start_controls_section(
			'footer_link_widget',
			[
				'label' => esc_html__( 'link Widget', 'tronixcore' ),
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
				'default' => esc_html__( 'link', 'tronixcore' ),
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
                'label'   => esc_html__( 'Icons List', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'link_title' => esc_html__( 'Explore', 'tronixcore' ),
                    ],
                ],
            ]
        );
		$this->end_controls_section();

		
		$this->start_controls_section(
			'footer_link_widget2',
			[
				'label' => esc_html__( 'link Widget Two', 'tronixcore' ),
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
				'default' => esc_html__( 'Explore', 'tronixcore' ),
                'label_block'   => true,
			]
		);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'link_title2',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'link', 'tronixcore' ),
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
                'label'   => esc_html__( 'Icons List', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'link_title' => esc_html__( 'Explore', 'tronixcore' ),
                    ],
                ],
            ]
        );
		$this->end_controls_section();
// ----------------------------------------------
		$this->start_controls_section(
			'latest-post',
			[
				'label' => esc_html__( 'Latest Post', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'edit_widget_from_appearance!' => 'yes',
				],
			]
		);
		$this->add_control(
			'recent_post_widget_title',
			[
				'label' => esc_html__( 'Recent Post', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Recent Posts', 'tronixcore' ),
                'label_block'   => true,
			]
		);
		$this->add_control(
            'title_lanth',
            [
                'label'   => esc_html__( 'Title Lanth ', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 20,
                'step'    => 1,
                'default' => 7,
            ]
        );
		$this->add_control(
            'item_show',
            [
                'label'   => esc_html__( 'Display Item', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
                'default' => 3,
            ]
        );
		$this->add_control(
            'order',
            [
                'label'   => esc_html__( 'Order By', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC'  => esc_html__( 'ASC', 'tronixcore' ),
                    'DESE' => esc_html__( 'DESE', 'tronixcore' ),
                ],
            ]
        );
		$this->add_control(
            'orderby',
            [
                'label'   => esc_html__( 'Order by', 'tronixcore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'          => esc_html__( 'None', 'tronixcore' ),
                    'ID'            => esc_html__( 'ID', 'tronixcore' ),
                    'date'          => esc_html__( 'Date', 'tronixcore' ),
                    'name'          => esc_html__( 'Name', 'tronixcore' ),
                    'title'         => esc_html__( 'Title', 'tronixcore' ),
                    'comment_count' => esc_html__( 'Comment count', 'tronixcore' ),
                    'rand'          => esc_html__( 'Random', 'tronixcore' ),
                ],
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
                'selector' => '{{WRAPPER}} .footer-two-wrapper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'footer_box_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .footer-two-content-wrp',
            ]
        );
        $this->add_responsive_control(
            'footer_box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-two-content-wrp' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-two-content-wrp' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .footer-one-about-widget-info .footer-one-widget-title',
			]
		);
		$this->add_responsive_control(
			'about_title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-one-about-widget-info .footer-one-widget-title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .footer-one-about-widget-info .footer-one-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .footer-one-about-widget-info .footer-one-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .footer-one-widget-des',
            ]
        );
        $this->add_responsive_control(
            'about_dec_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-one-widget-des' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .footer-one-widget-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-one-widget-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .footer-one-menu-widget .footer-one-widget-title',
			]
		);
		$this->add_responsive_control(
			'link_title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-one-menu-widget .footer-one-widget-title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .footer-one-menu-widget .footer-one-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .footer-one-menu-widget .footer-one-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .footer-one-service-list-widget .footer-one-widget-title',
			]
		);
		$this->add_responsive_control(
			'link_title_color2',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-one-service-list-widget .footer-one-widget-title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .footer-one-service-list-widget .footer-one-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .footer-one-service-list-widget .footer-one-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'recent_post_widget',
			[
				'label' => esc_html__( 'Recent Post Wiget Style', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'recent_post_section_title_tabs'
		);

		$this->start_controls_tab(
			'recent_post_section__normal_tab',
			[
				'label' => esc_html__( 'Section Title', 'tronixcore' ),
			]
		);
		$this->add_control(
			'recent_post_section_title',
			[
				'label' => esc_html__( 'Recent Post Section Title', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'recent_post_section_title_typo',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .footer-one-recent-post-widget .footer-one-widget-title',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'recent_post_section_title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-one-recent-post-widget .footer-one-widget-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'recent_post_section_title_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-one-recent-post-widget .footer-one-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'recent_post_section_title_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-one-recent-post-widget .footer-one-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
		// Image Tab -----------
		$this->start_controls_tabs(
			'image_style_tabs'
		);
		
		$this->start_controls_tab(
			'image_normal_tab',
			[
				'label' => esc_html__( 'Image', 'tronixcore' ),
			]
		);
		 $this->add_responsive_control(
			'Image_height',
			[
				'label' => esc_html__( 'image Height', 'tronixcore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .footer-one-post-thum-widget .foote-latest-post-imgage img > img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'image_width',
			[
				'label' => esc_html__( 'Image Width', 'tronixcore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .footer-one-post-thum-widget .foote-latest-post-imgage img > img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
            'image_border_radius',
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
                    '{{WRAPPER}} .footer-one-post-thum-widget .foote-latest-post-imgage img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-one-post-thum-widget .foote-latest-post-imgage img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-one-post-thum-widget .foote-latest-post-imgage img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
		// Post Title
		$this->start_controls_tabs(
			'recent_post_title_tabs'
		);
		
		$this->start_controls_tab(
			'recent_post_title_tab',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'recent_post_title_typo',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .footer-one-latest-post-title a',
			]
		);
		$this->add_responsive_control(
			'recent_post_title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-one-latest-post-title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'recent_post_title_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-one-latest-post-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'recent_post_title_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .footer-one-latest-post-title a' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		// post Date
		$this->start_controls_tabs(
			'recent_post_date_tabs'
		);
		
		$this->start_controls_tab(
			'recent_post_date_tab',
			[
				'label' => esc_html__( 'Date ', 'tronixcore' ),
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'date_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .footer-one-date',
            ]
        );
        $this->add_responsive_control(
            'date_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-one-date' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'date_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-one-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'date_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .footer-one-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();


	
		 // 
		// ----------------Copyright Style------------------
        // 

		$this->start_controls_section(
			'Copyright_style_options',
			[
				'label' => esc_html__( 'Copyright', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
		$this->end_controls_section();

	}

	//Render
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
        <div class="footer-two-wrapper">
		 <?php if ( $settings['edit_widget_from_appearance'] != 'yes' ) { ?>
			<div class="footer-two-content-wrp">
				<div class="container">
					<div class="row">
						<div class="col-xl-3 col-lg-6 col-md-6 col-12 two three">
							<div class="footer-one-about-widget-info">
								<h5 class="footer-one-widget-title"> <?php echo esc_html( $settings['about_widget_title'] ); ?> </h5>
								<div class="footer-one-widget-des">  <?php echo esc_html( $settings['about_widget_des'] ); ?> </div>
								<div class="footer-one-social-widget">
									<ul>
										<?php foreach($settings['tronix_social_icon_list'] as $social_icon):
											$url      = $social_icon['tronix_social_icon_link']['url'];
											$target   = $social_icon['tronix_social_icon_link']['is_external'] ? ' target="_blank"' : '';
											$nofollow = $social_icon['tronix_social_icon_link']['nofollow'] ? ' rel="nofollow"' : '';
											?>	
											<li>
												<a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow;?> >  <?php \Elementor\Icons_Manager::render_icon( $social_icon['tronix_about_social_icon'], ['aria-hidden' => 'true'] );?></a>
											</li>
										<?php endforeach ?>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-6 col-12 two three">
							<div class="footer-one-menu-widget ">
								<h5 class="footer-one-widget-title"> <?php echo esc_html( $settings['link_widget_title'] ); ?></h5>
								<div class="footer-one-link-menu">
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
						<div class="col-xl-3 col-lg-6 col-md-6 col-12 two three">
							<div class="footer-one-service-list-widget">
								<h5 class="footer-one-widget-title"><?php echo esc_html( $settings['link_widget_title2'] ); ?></h5>
								<div class="footer-one-service-list">
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
						<div class="col-xl-3 col-lg-6 col-md-6 col-12 two three">
							<div class="footer-one-recent-post-widget ">
								<h5 class="footer-one-widget-title"><?php echo esc_html( $settings['recent_post_widget_title'] ); ?></h5>
								<div class="footer-one-recent-post">
									<ul>
										<?php
											$p = new \WP_Query( array(
												'posts_per_page' =>  $settings['item_show'],
												'post_type'      => 'post',
												'orderby'        => esc_attr( $settings['orderby'] ),
												'order'          => esc_attr( $settings['order'] ),
											) );
											while ( $p->have_posts() ): $p->the_post(); ?>
											<li>
												<div class="footer-one-post-thum-widget">
													<?php if ( has_post_thumbnail() ): ?>
														<div class="foote-latest-post-imgage"> <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );?> </div>
													<?php endif;?>
													<div class="footer-post-date-title-wrp">
														<div class="footer-one-date"><i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?> </div>
														<div class="footer-one-latest-post-title"> <a href="<?php echo the_permalink(); ?>"> <?php echo wp_trim_words( get_the_title(), $settings['title_lanth'] ); ?> </a> </div>
													</div>
												</div>
											</li>
										<?php endwhile; ?>
									</ul>
								</div>
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
        </div>

        <div class="footer-one-copyright_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-one-copyright-text">
                        <?php echo $settings['Copyright'];?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php

	}
}

Plugin::instance()->widgets_manager->register( new tronix_footer_three_widget );