<?php
namespace Elementor;

class tronix_footer_two_widget extends Widget_Base {

    public function get_name() {

        return 'tronix_footer_two';
    }

    public function get_title() {
        return esc_html__( 'Tronix Footer template Two ', 'tronixcore' );
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
            'tronixcore_about_options',
            [
                'label' => esc_html__( 'Footer Top About Content', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'enable_footer_top',
			[
				'label' => esc_html__( 'Enable Footer Top', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tronixcore' ),
				'label_off' => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        $this->add_control(
            'Contact_form',
            [
                'label' => esc_html__( 'Contat Form Short Code', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'enable_footer_top' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'stitle',
            [
                'label' => esc_html__( 'Small Title', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Have Any Question?', 'tronixcore' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'enable_footer_top' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'footer_about_title',
            [
                'label' => esc_html__( 'Title', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Let’s Discuss About Something', 'tronixcore' ),
                'show_label' => true,
                'dynamic' => [
                   'active' => true,
                ],
                'condition' => [
                    'enable_footer_top' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'footer_about_content',
            [
                'label' => esc_html__( 'Description', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'At our IT solution company, we are committed to providing exceptional customer service and support. If you are experiencing technical difficulties or need assistance with one of our services,', 'tronixcore' ),
                'dynamic' => [
                   'active' => true,
                ],
                'condition' => [
                    'enable_footer_top' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'tronix_social_icons_title',
            [
                'label' => esc_html__( 'Title', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Follow Us:', 'tronixcore' ),
				 'condition' => [
                    'enable_footer_top' => 'yes',
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'social_icon_label',
			[
				'label' => esc_html__( 'Label', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Facebook' , 'tronixcore' ),
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'tronix_social_icon',
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
			'tronix_icon_link',
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
			'tronix_icon',
			[
				'label' => esc_html__( 'Repeater List', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'condition' => [
                    'enable_footer_top' => 'yes',
                ],
				'default' => [
					[
						'social_icon_label' => esc_html__( 'Facebook', 'tronixcore' ),
					],
					[
						'social_icon_label' => esc_html__( 'Instagram', 'tronixcore' ),
					],
				],
			]
		);

        $this->add_control(
			'google_map_link_title',
			[
				'label' => esc_html__( 'Google Map Link', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Get Google Map Directions', 'tronixcore' ),
                'condition' => [
                    'enable_footer_top' => 'yes',
                ],
                
			]
		);
        $this->add_control(
			'google_map_link',
			[
				'label' => esc_html__( 'Map Link', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
                'condition' => [
                    'enable_footer_top' => 'yes',
                ],
			]
		);
        $this->end_controls_section();

    // 
    //     footer Teo Bottom Area Content 
    // 

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
            'footer_top_about_content_css',
            [
                'label' => esc_html__( 'Footer Top About Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
			$this->start_controls_tabs(
				'footer_top_about_content_tabs'
			);
			
				$this->start_controls_tab(
					'footer_top_about_subtitle_tab',
					[
						'label' => esc_html__( 'Sub Title', 'textdomain' ),
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
				$this->end_controls_tab();
				$this->start_controls_tab(
					'footer_top_about_title_tab',
					[
						'label' => esc_html__( 'Title', 'textdomain' ),
					]
				);
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' => 'title_typo',
						'label' => __( 'Typography', 'tronixcore' ),
						'selector' => '{{WRAPPER}} .footer-two-about-title',
					]
				);
				$this->add_responsive_control(
					'title_color',
					[
						'label'       => esc_html__('Color', 'tronixcore'),
						'type'        => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .footer-two-about-title' => 'color: {{VALUE}};',
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
							'{{WRAPPER}} .footer-two-about-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .footer-two-about-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->end_controls_tab();
				$this->start_controls_tab(
					'footer_top_about_des_tab',
					[
						'label' => esc_html__( 'Description', 'textdomain' ),
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'dec_typo',
						'label' => esc_html__( 'Typography', 'tronixcore' ),
						'selector' => '{{WRAPPER}} .footer-two-about-des',
					]
				);
				$this->add_responsive_control(
					'dec_color',
					[
						'label' => esc_html__( 'Color', 'tronixcore' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .footer-two-about-des' => 'color: {{VALUE}}',
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
							'{{WRAPPER}} .footer-two-about-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .footer-two-about-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->end_controls_tab();
			
			$this->end_controls_tabs();
		$this->end_controls_section();
		$this->start_controls_section(
            'footer_social_icon_CSS_options',
            [
                'label' => esc_html__( 'Social Icon CSS', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'footer_social_icon_CSS_align',
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
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tronix-social-icon-box' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->start_controls_tabs(
            'footer_top_social_icon_tabs'
        );
        $this->start_controls_tab(
            'tronix_social_icon_tabs_title',
            [
                'label' => __( 'Title', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'footer_top_social_icon_title_c',
            [
                'label' => esc_html__( 'Title Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-icon-label' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'footer_top_social_icon_title_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .social-icon-label',
            ]
        );
        $this->add_responsive_control(
            'footer_top_social_icon_title_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .social-icon-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_top_social_icon_title_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .social-icon-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'footer_top_social_icon_tabs_normal',
            [
                'label' => __( 'Icon Normal', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'footer_top_social_icon_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-social-icon-box ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_top_social_icon_colorbg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-social-icon-box ul li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_top_social_icon_width',
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
                    '{{WRAPPER}} .tronix-social-icon-box ul li a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_top_social_icon_height',
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
                    '{{WRAPPER}} .tronix-social-icon-box ul li a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'footer_top_social_icon_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-social-icon-box ul li a',
            ]
        );
        $this->add_responsive_control(
            'footer_top_social_icon_radius',
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
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-social-icon-box ul li a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'footer_top_social_icon_shadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-social-icon-box ul li a',
            ]
        );
        $this->add_responsive_control(
            'footer_top_social_icon_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-social-icon-box ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_top_social_icon_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-social-icon-box ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'footer_top_social_icon_tabs_hover',
            [
                'label' => __( 'Icon Hover', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'footer_top_social_icon_hcolor',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-social-icon-box ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_top_social_icon_hcolorbg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-social-icon-box ul li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'footer_top_social_icon_hborder',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-social-icon-box ul li a:hover',
            ]
        );
        $this->add_responsive_control(
            'footer_top_social_icon_hradius',
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
                    '{{WRAPPER}} .tronix-social-icon-box ul li a:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'footer_top_social_icon_hshadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-social-icon-box ul li a:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->start_controls_tabs(
            'map_tabs'
        );
        $this->start_controls_tab(
            'footer_top_map_tab',
            [
                'label' => __( 'Map Link Style', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'footer_top_map_link_color',
            [
                'label' => esc_html__( 'Map Link Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .google-map-link a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_top_map_link_color_hover',
            [
                'label' => esc_html__( 'Map Link Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .google-map-link a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'footer_top_map_link_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .google-map-link a',
            ]
        );
        $this->add_responsive_control(
            'footer_top_map_link_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .google-map-link a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_top_map_link_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .google-map-link a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
		$this->start_controls_section(
            'footer_top_form_box_css',
            [
                'label' => esc_html__( 'Footer Top Form Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->start_controls_tabs(
			'footer_top_form_box_tabs'
		);
		
		$this->start_controls_tab(
			'footer_top_form_box_tab',
			[
				'label' => esc_html__( 'Box', 'textdomain' ),
			]
		);
        $this->add_responsive_control(
            'tronix_ctf7_box_align',
            [
                'label'     => __( 'Alignment', 'tronixcore' ),
                'type'      => Controls_Manager::CHOOSE,
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
                'selectors' => [
                    '{{WRAPPER}} .tronix-contact-from-two-wrappwr' => 'text-align: {{VALUE}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'tronix_ctf7_box_bg',
                'label'    => __( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .tronix-contact-from-two-wrappwr',
            ]
        );
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'tronix_ctf7_input_border',
                'label'    => __( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-contact-from-two-wrappwr',
            ]
        );
        $this->add_responsive_control(
            'tronix_ctf7_input_border_radius',
            [
                'label'     => __( 'Border Radius', 'tronixcore' ),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .tronix-contact-from-two-wrappwr' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
                'separator' => 'before',
            ]
        );
		$this->add_responsive_control(
            'tronix_ctf7_box_padding',
            [
                'label'      => __( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-contact-from-two-wrappwr' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
        $this->add_responsive_control(
            'tronix_ctf7_box_margin',
            [
                'label'      => __( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-contact-from-two-wrappwr' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->start_controls_tabs(
			'footer_top_Content_tabs'
		);

		$this->start_controls_tab(
			'footer_top_title_tab',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'footer_top_title_typo',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => ' {{WRAPPER}} .form-title',
			]
		);

		$this->add_responsive_control(
			'footer_top_title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .form-title' => 'color: {{VALUE}};',
					
				],
			]
		);

		$this->add_responsive_control(
			'footer_top_title_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .form-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'footer_top_title_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .form-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'footer_top__description_tab',
			[
				'label' => esc_html__( 'Descrioption', 'tronixcore' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'footer_top_dec_typo',
				'label' => esc_html__( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .form-des',
			]
		);
		$this->add_responsive_control(
			'footer_top_dec_color',
			[
				'label' => esc_html__( 'Color', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .form-des' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'footer_top_dec_margin',
			[
				'label' => esc_html__( 'Margin', 'tronixcore' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .form-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'footer_top_dec_padding',
			[
				'label' => esc_html__( 'Padding', 'tronixcore' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .form-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->start_controls_tabs(
			'input_form_style_tabs'
		);
		
		$this->start_controls_tab(
			'input_form_style_tab',
			[
				'label' => esc_html__( 'Input Style', 'textdomain' ),
			]
		);
		$this->add_control(
            'tronix_ctf7_input_height',
            [
                'label'     => __( 'Height', 'tronixcore' ),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'max' => 150,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]'   => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]'  => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]'    => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]'    => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]'   => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select'         => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_control(
            'tronix_ctf7_textarea_height',
            [
                'label'     => __( 'Text Area Height', 'tronixcore' ),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'max' => 450,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea'         => 'height: {{SIZE}}{{UNIT}};',
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
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]'   => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]'  => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]'    => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]'    => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]'   => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select'         => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'tronix_ctf7_input_bg',
            [
                'label'     => __( 'Background Color', 'tronixcore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]'   => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]'  => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]'    => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]'    => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]'   => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select'         => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'tronix_ctf7_input_typography',
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select,{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea',
            ]
        );
        $this->add_control(
            'tronix_ctf7_input_text_color',
            [
                'label'     => __( 'Text Color', 'tronixcore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]'   => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]'    => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]'    => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]'   => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select'         => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea'         => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'tronix_ctf7_input_placeholder_color',
            [
                'label'     => __( 'Placeholder Color', 'tronixcore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]::-webkit-input-placeholder'   => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]::-moz-placeholder'            => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]:-ms-input-placeholder'        => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]::-webkit-input-placeholder'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]::-moz-placeholder'           => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]:-ms-input-placeholder'       => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]::-webkit-input-placeholder'    => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]::-moz-placeholder'             => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]:-ms-input-placeholder'         => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]::-webkit-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]::-moz-placeholder'          => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]:-ms-input-placeholder'      => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]::-webkit-input-placeholder'    => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]::-moz-placeholder'             => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]:-ms-input-placeholder'         => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]::-webkit-input-placeholder'   => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]::-moz-placeholder'            => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]:-ms-input-placeholder'        => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select'  => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'tronix_ctf7_input_border',
                'label'    => __( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"], {{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select',
            ]
        );
        $this->add_responsive_control(
            'tronix_ctf7_input_border_radius',
            [
                'label'     => __( 'Border Radius', 'tronixcore' ),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]'   => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]'  => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]'    => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]'    => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]'   => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select'         => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form .wpcf7-form-control-wrap textarea'         => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
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
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]'   => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]'  => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]'    => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]'    => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]'   => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select'         => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea'         => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="text"]'   => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="email"]'  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="url"]'    => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="number"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="tel"]'    => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap input[type*="date"]'   => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap .wpcf7-select'         => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpcf7-form .wpcf7-form-control-wrap textarea'         => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->start_controls_tabs( 'tronix_ctf7_btn_tabs' );
		
        $this->start_controls_tab(
            'tronix_ctf7_btn_normal_tab',
            [
                'label' => __( 'Button Normal', 'tronixcore' ),
            ]
        );
        $this->add_control(
            'tronix_ctf7_btn_height',
            [
                'label'     => __( 'Height', 'tronixcore' ),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'max' => 170,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'tronix_ctf7_btn_width',
            [
                'label'      => __( 'Width', 'tronixcore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 50,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'tronix_ctf7_btn_typography',
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-submit',
            ]
        );
        $this->add_control(
            'tronix_ctf7_btn_text_color',
            [
                'label'     => __( 'Text Color', 'tronixcore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'tronix_ctf7_btn_bg_color',
            [
                'label'     => __( 'Background Color', 'tronixcore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_ctf7_btn_padding',
            [
                'label'      => __( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
        $this->add_responsive_control(
            'tronix_ctf7_btn_margin',
            [
                'label'      => __( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'tronix_ctf7_btn_border',
                'label'    => __( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-submit',
            ]
        );
        $this->add_responsive_control(
            'tronix_ctf7_btn_border_radius',
            [
                'label'     => __( 'Border Radius', 'tronixcore' ),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'tronix_ctf7_btn_box_shadow',
                'label'    => __( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-submit',
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'tronix_ctf7_btn_hover_tab',
            [
                'label' => __( 'Button Hover', 'tronixcore' ),
            ]
        );
        $this->add_control(
            'tronix_ctf7_btnhover_text_color',
            [
                'label'     => __( 'Text Color', 'tronixcore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'tronix_ctf7_btnhover_background_color',
            [
                'label'     => __( 'Background Color', 'tronixcore' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'tronix_ctf7_btnhover_border',
                'label'    => __( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-submit:hover',
            ]
        );
        $this->add_responsive_control(
            'tronix_ctf7_btn_border_hradius',
            [
                'label'     => __( 'Border Radius', 'tronixcore' ),
                'type'      => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form .wpcf7-submit:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'tronix_ctf7_btn_box_hshadow',
                'label'    => __( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .wpcf7-form .wpcf7-submit:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
		$this->end_controls_section();
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
        <div class="footer-two-wrapper footer-wrapper">
             <?php if($settings['enable_footer_top'] == 'yes' ) : ?>
                <div class="footer-two-top-area ">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12">
								<div class="footer-two-left-area">
									<div class="about-item">
										<?php if ( ! empty( $settings['stitle'] ) ) :?> <span class="about-small-stitle"> <?php echo esc_html($settings['stitle']); ?> </span><?php endif?>
										<?php if ( ! empty( $settings['footer_about_title'] ) ) :?> <h2 class="footer-two-about-title"> <?php echo esc_html($settings['footer_about_title']); ?> </h2> <?php endif?>
										<?php if ( ! empty( $settings['footer_about_content'] ) ) :?> <div class="footer-two-about-des"> <?php echo esc_html($settings['footer_about_content']); ?> </div><?php endif?>
									</div>
									<div class="tronix-social-icon-box footer-social">
										<?php if(!empty($settings['tronix_social_icons_title'])){
											echo '<h6 class="footer-social-icon-label">'.esc_html($settings['tronix_social_icons_title']).'</h6>';
										} ?>
										<ul>
											<?php foreach($settings['tronix_icon'] as $social_icon){
												$target = $social_icon['tronix_icon_link']['is_external'] ? ' target="_blank"' : '';
												$nofollow = $social_icon['tronix_icon_link']['nofollow'] ? ' rel="nofollow"' : '';    
												echo ' <li><a href="'.esc_url($social_icon['tronix_icon_link']['url']).'" title="'.esc_attr($social_icon['social_icon_label']).'" '. $target . $target . '><i class="'.esc_attr($social_icon['tronix_social_icon']['value']).'"></i></a></li>';
											} ?>
										</ul>
										<div class="footer-google-map-link">
											<?php if ( ! empty( $settings['google_map_link']['url'] ) ) {
												$this->add_link_attributes( 'google_map_link', $settings['google_map_link'] );
											} ?>
											<a <?php echo $this->get_render_attribute_string( 'google_map_link' ); ?>> <?php echo esc_html($settings['google_map_link_title']) ?></a>
										</div>
									</div>
								</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-12">

									<?php echo do_shortcode( $settings['Contact_form'] );?>
								</div>
								
                        </div>
                    </div>
                </div>
            <?php endif?>
			 <?php if ( $settings['edit_widget_from_appearance'] != 'yes' ) { ?>
				<div class="footer-two-content-wrp">
					<div class="container">
						<div class="row">
							<div class="col-xl-3 col-lg-6 col-md-6 col-12 two">
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
							<div class="col-xl-3 col-lg-6 col-md-6 col-12 two">
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
							<div class="col-xl-3 col-lg-6 col-md-6 col-12 two">
								<div class="footer-one-service-list-widget ">
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
							<div class="col-xl-3 col-lg-6 col-md-6 col-12 two">
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

Plugin::instance()->widgets_manager->register( new tronix_footer_two_widget );