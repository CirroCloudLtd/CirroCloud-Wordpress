<?php
namespace Elementor;
class tronix_header_template_three extends Widget_Base {

	public function get_name() {
		return 'tronix_header_template_three';
	}

	public function get_title() {
		return esc_html__( 'Tronix Header Three', 'tronixcore' );
	}

	public function get_icon() {
		return 'eicon-shape';
	}

	public function get_categories() {
		return [ 'tronix_header_template' ];
	}

	private function get_available_menus() {
		$menus = wp_get_nav_menus();
		$options = [];
		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}
		return $options;
	}

	protected function register_controls() {
		$this->start_controls_section(
			'header_top',
			[
				'label' => esc_html__( 'Header Top', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'enable_header_top',
			[
				'label' => esc_html__( 'Enable Top Header', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tronixcore' ),
				'label_off' => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'promotion_text',
			[
				'label' => esc_html__( 'Text', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Get 50% off on Tronix theme. Limited time offer! Purchase now' , 'tronixcore' ),
				'label_block' => true,
				'condition' => [
                    'enable_header_top' => 'yes',
                ],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'logo_settings',
			[
				'label' => esc_html__( 'Logo & Menu', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'logo_select',
			[
				'label' => esc_html__( 'Select Logo', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'tronixcore' ),
					'cunstom' => esc_html__( 'Coustom Logo', 'tronixcore' ),
				],
			]
		);
		$this->add_control(
			'logo',
			[
				'label'       => __( 'Logo', 'tronixcore' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_responsive_control(
			'logo_width',
			[
				'label' => esc_html__( 'Logo Width', 'tronixcore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],

				'selectors' => [
					'{{WRAPPER}} .header-logo a img' => 'width: {{SIZE}}px;max-width: {{SIZE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'logo_height',
			[
				'label' => esc_html__( 'Logo Height', 'tronixcore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],

				'selectors' => [
					'{{WRAPPER}} .header-logo a img' => 'height: {{SIZE}}px;height-width: {{SIZE}}px;',
				],
			]
		);
	$this->add_control(
			'mobile_logo_select',
			[
				'label' => esc_html__( 'Select Mobile Logo', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'Default', 'tronixcore' ),
					'cunstom' => esc_html__( 'Coustom Logo', 'tronixcore' ),
				],
			]
		);
		$this->add_control(
			'mobile_logo',
			[
				'label'       => __( 'Logo', 'tronixcore' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'condition' => [
					'mobile_logo_select' => 'cunstom',
				],
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'mobile_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tronix-menu-wrapper .mobile-logo',
			]
		);
		
		$menus = $this->get_available_menus();

		if ( ! empty( $menus ) ) {
			$this->add_control(
				'menu_select',
				[
					'label' => __( 'Menu', 'tronixcore' ),
					'type' => Controls_Manager::SELECT,
					'options' => $menus,
					'default' => array_keys( $menus )[0],
					'save_default' => true,
					'separator' => 'after',
					'description' => sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'tronixcore' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		} else {
			$this->add_control(
				'menu_select',
				[
					'type' => Controls_Manager::RAW_HTML,
					'raw' => '<strong>' . __( 'There are no menus in your site.', 'tronixcore' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'tronixcore' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' => 'after',
					'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}
		
		$this->add_control(
			'sticky_menu',
			[
				'label' => esc_html__( 'Enable Sticky Menu', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tronixcore' ),
				'label_off' => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		
		$this->add_responsive_control(
			'sticky_bg',
			[
				'label' => esc_html__( 'Sticky Background', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu-area.sticky' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'sticky_menu' => 'yes',
				],
			]
		);
		
		$this->end_controls_section();


		$this->start_controls_section(
			'header_buttons',
			[
				'label' => esc_html__( 'Buttons', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		 $this->add_control(
            'serarch_bar_show',
            [
                'label' => esc_html__( 'Show Search Bar', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tronixcore' ),
                'label_off' => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default' => 'no',
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
			'button_Text',
			[
				'label' => esc_html__( 'Button Text', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Get Started' , 'tronixcore' ),
				'label_block' => true,
				'condition' => [
                    'enable_button' => 'yes',
                ],
			]
		);
		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Link', 'tronixcore' ),
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
                    'enable_button' => 'yes',
                ],
			]
		);
		$this->end_controls_section();

		// Canva content list

		$this->start_controls_section(
			'canvacontent',
			[
				'label' => esc_html__( 'Canva Content', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'canva_title_Text',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'About Us' , 'tronixcore' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'canva_des',
			[
				'label' => esc_html__( 'Description', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'The argument in favor of using filler text goes something like this: If you use real content in the Consulting Process, anytime you reach a review' , 'tronixcore' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'canva_content_list',
			[
				'label' => esc_html__( 'Canva Contact List', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'canva_contact_title',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Contact Info' , 'tronixcore' ),
				'label_block' => true,
			]
		);
		$repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'contact_list_title',
            [
                'label'       => esc_html__( 'Title', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'State Of Themepul City, BD', 'tronixcore' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'contact_list_icon',
            [
                'label'   => esc_html__( 'Icon', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'ico ico-map-marker2',
                    'library' => 'fa-solid',
                ],
            ]
        );       
        $this->add_control(
            'tronix_contact_list',
            [
                'label'       => esc_html__( 'Repeater List', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
				'default' => [
					[
						'contact_list_title' => esc_html__( 'State Of Themepul City, BD', 'tronixcore' ),
					],
					[
						'contact_list_title' => esc_html__( 'info@tronix.com', 'tronixcore' ),
					],
					[
						'contact_list_title' => esc_html__( 'Week Days: 09.00 to 18.00 ', 'tronixcore' ),
					],
				],
            ]
        );
		$this->add_control(
			'canva_social_list',
			[
				'label' => esc_html__( 'Canva Socal List', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$repeater = new \Elementor\Repeater();
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
            'tronix_icon',
            [
                'label'   => esc_html__( 'Icons List', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'tronix_social_icon' => 'fab fa-facebook-f',
					],
                ],
            ]
        );
		$this->end_controls_section();

		$this->start_controls_section(
			'header_top_style',
			[
				'label' => esc_html__( 'Header Top', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
 		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'header_top_typo',
                'selector' => '{{WRAPPER}} .header-three-top-area',
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'bg_color',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .header-three-top-area',
			]
		);
		$this->add_control(
			'text_color',
			[
				'label'       => esc_html__('Text Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .header-three-top-area,{{WRAPPER}} .header-three-top-area a' => 'color: {{VALUE}};',
				],
			]
		);
		 $this->add_responsive_control(
            'top_header_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .header-three-top-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'top_header_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .header-three-top-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();

	
        $this->start_controls_section(
            'menu_css_options',
            [
                'label' => esc_html__( ' Menu Style ', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'menu_box_style',
            [
                'label' => esc_html__( 'menu Box Style', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'menu_box_bg',
                'label' => esc_html__( 'Background', 'tronixcore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .menu-area',
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'menu_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .menu-area',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'menu_box_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .menu-area',
            ]
        );

		
        $this->add_responsive_control(
            'menu_box_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .menu-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_box_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .menu-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'main_menu_style',
            [
                'label' => esc_html__( 'Main Menu Style', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'menu_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu>ul>li>a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_hcolor',
            [
                'label'     => esc_html__( 'Hover Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu>ul>li>a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'menu_typo',
                'selector' => '{{WRAPPER}} .main-menu>ul>li>a',
            ]
        );
        $this->add_responsive_control(
            'menu_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .main-menu>ul>li>a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'menu_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .main-menu>ul>li>a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

            $this->start_controls_tabs(
                'menu_style_tabs'
            );

                $this->start_controls_tab(
                    'sub_menu_tab',
                    [
                        'label' => esc_html__( 'Sub Menu', 'tronixcore' ),
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name'     => 'submenu_typo',
                        'selector' => '{{WRAPPER}} .main-menu ul li.no-mega ul.sub-menu li a',
                    ]
                );
                $this->add_responsive_control(
                    'submenu_width',
                    [
                        'label'      => esc_html__( 'Min Width', 'tronixcore' ),
                        'type'       => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'range'      => [
                            'px' => [
                                'min'  => 0,
                                'max'  => 300,
                                'step' => 1,
                            ],
                            '%'  => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors'  => [
                            '{{WRAPPER}} .main-menu ul li.no-mega ul.sub-menu' => 'min-width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_color',
                    [
                        'label'     => esc_html__( 'Color', 'tronixcore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.no-mega ul.sub-menu li a' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_hcolor',
                    [
                        'label'     => esc_html__( 'Hover Color', 'tronixcore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.no-mega ul.sub-menu li a:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_bg',
                    [
                        'label'     => esc_html__( 'background', 'tronixcore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.no-mega ul.sub-menu' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_hbg',
                    [
                        'label'     => esc_html__( 'Hover Background', 'tronixcore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.no-mega ul.sub-menu li a:hover' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_border',
                    [
                        'label'     => esc_html__( 'Border Color', 'tronixcore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.no-mega ul.sub-menu li' => 'border-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_align',
                    [
                        'label'     => esc_html__( 'Alignment', 'tronixcore' ),
                        'type'      => \Elementor\Controls_Manager::CHOOSE,
                        'options'   => [
                            'left'   => [
                                'title' => esc_html__( 'Left', 'tronixcore' ),
                                'icon'  => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'tronixcore' ),
                                'icon'  => 'eicon-text-align-center',
                            ],
                            'right'  => [
                                'title' => esc_html__( 'Right', 'tronixcore' ),
                                'icon'  => 'eicon-text-align-right',
                            ],
                        ],
                        'default'   => 'left',
                        'toggle'    => true,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.no-mega ul.sub-menu' => 'text-align: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_margin',
                    [
                        'label'      => esc_html__( 'Margin', 'tronixcore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .main-menu ul li.no-mega ul.sub-menu li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'submenu_padding',
                    [
                        'label'      => esc_html__( 'Padding', 'tronixcore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .main-menu ul li.no-mega ul.sub-menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();

                $this->start_controls_tab(
                    'mega_menu_tab',
                    [
                        'label' => esc_html__( 'Mega Menu', 'tronixcore' ),
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name'     => 'mega_typo',
                        'selector' => '{{WRAPPER}} .main-menu ul li.mega ul li a',
                    ]
                );
                $this->add_responsive_control(
                    'mega_width',
                    [
                        'label'      => esc_html__( 'Box Width', 'tronixcore' ),
                        'type'       => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'range'      => [
                            'px' => [
                                'min'  => 0,
                                'max'  => 1600,
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
                            '{{WRAPPER}} .main-menu ul li.mega ul' => 'max-width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'mega_align',
                    [
                        'label'     => esc_html__( 'Alignment', 'tronixcore' ),
                        'type'      => \Elementor\Controls_Manager::CHOOSE,
                        'options'   => [
                            'left'   => [
                                'title' => esc_html__( 'Left', 'tronixcore' ),
                                'icon'  => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'tronixcore' ),
                                'icon'  => 'eicon-text-align-center',
                            ],
                            'right'  => [
                                'title' => esc_html__( 'Right', 'tronixcore' ),
                                'icon'  => 'eicon-text-align-right',
                            ],
                        ],
                        'default'   => 'left',
                        'toggle'    => true,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.mega ul li a' => 'text-align: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'mega_bg',
                    [
                        'label'     => esc_html__( 'Box bg', 'tronixcore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu>ul>li.mega>ul' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'mega_color',
                    [
                        'label'     => esc_html__( 'Color', 'tronixcore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.mega ul.sub-menu li a' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'mega_hcolor',
                    [
                        'label'     => esc_html__( 'Hover Color', 'tronixcore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.mega ul.sub-menu li a:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'mega_margin',
                    [
                        'label'      => esc_html__( 'Margin', 'tronixcore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .main-menu ul li.mega ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'mega_padding',
                    [
                        'label'      => esc_html__( 'Padding', 'tronixcore' ),
                        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                        'selectors'  => [
                            '{{WRAPPER}} .main-menu ul li.mega ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_control(
                    'mega_top',
                    [
                        'label'     => esc_html__( 'Mega Hadding', 'tronixcore' ),
                        'type'      => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name'     => 'mega_hadding_typo',
                        'selector' => '{{WRAPPER}} .main-menu ul li.mega > ul > li > a',
                    ]
                );
                $this->add_responsive_control(
                    'mega_hadding_color',
                    [
                        'label'     => esc_html__( 'Color', 'tronixcore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.mega > ul.sub-menu > li > a' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'mega_hadding_border_color',
                    [
                        'label'     => esc_html__( 'border Color', 'tronixcore' ),
                        'type'      => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .main-menu ul li.mega > ul.sub-menu > li > a' => 'border-color: {{VALUE}}',
							
                        ],
                    ]
                );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();



		 $this->start_controls_section(
            'btn_style',
            [
                'label' => esc_html__( 'Button Style ', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'btn_tabs'
        );

        $this->start_controls_tab(
            'btn_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'tronixcore' ),
            ]
        ); 
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'btn_typo',
                'selector' => '{{WRAPPER}} .header-one-botton .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'btn_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-one-botton .theme-btns' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'btn_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .header-one-botton .theme-btns',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'btn_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .header-one-botton .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'btn_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-one-botton .theme-btns' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name'     => 'btn_shadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .header-one-botton .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'btn_Margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-one-botton .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-one-botton .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'btn_tab_hover',
            [
                'label' => esc_html__( 'Hover', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'btn_typo_hover',
                'selector' => '{{WRAPPER}} .header-one-botton .theme-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'btn_color_hover',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-one-botton .theme-btns:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'btn_bg_hover',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .header-one-botton .theme-btns:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name'     => 'btn_shadow_hover',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .header-one-botton .theme-btns:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'btn_border_hover',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .header-one-botton .theme-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'btn_border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-one-botton .theme-btns:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

		
		 $this->start_controls_section(
            'mobile_menu_settings',
            [
                'label' => esc_html__( 'Mobile Menu', 'tronixcore' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'mobile_menu_body_style',
			[
				'label' => esc_html__( 'Body Style', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
            'mobile_menu_width',
            [
                'label' => esc_html__( 'Width', 'tronixcore' ),
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
                    '{{WRAPPER}} .tronix-menu-wrapper .tronix-menu-area' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'mobile_body_bg',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tronix-menu-wrapper .tronix-menu-area',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'mobile_menu_body_border',
				'label' => esc_html__( 'Border', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .tronix-menu-wrapper .tronix-menu-area',
			]
		);
            $this->start_controls_tabs(
                'mobile_meni_tabs'
            );
            
                $this->start_controls_tab(
                    'mobile_menu_icon_tab',
                    [
                        'label' => esc_html__( 'Icon', 'tronixcore' ),
                    ]
                );
                
                    $this->add_group_control(
                        \Elementor\Group_Control_Typography::get_type(),
                        [
                            'name' => 'mobile_icon_size',
                            'selector' => '{{WRAPPER}} .tronix-menu-toggle',
                        ]
                    );

                    $this->add_responsive_control(
                        'mobile_icon_color',
                        [
                            'label' => esc_html__( 'Icon Color', 'tronixcore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tronix-menu-toggle' => 'color: {{VALUE}}',
                            ],
                        ]
                    );
                    
                    $this->add_responsive_control(
                        'mobile_icon_hcolor',
                        [
                            'label' => esc_html__( 'Icon Hover Color', 'tronixcore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tronix-menu-toggle:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'mobile_icon_bg',
                        [
                            'label' => esc_html__( 'background', 'tronixcore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tronix-menu-toggle' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );
                    
                    $this->add_responsive_control(
                        'mobile_icon_hbg',
                        [
                            'label' => esc_html__( 'Hover background', 'tronixcore' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .tronix-menu-toggle:hover' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'mobile_icon_margin',
                        [
                            'label' => esc_html__( 'Margin', 'tronixcore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .tronix-menu-toggle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'mobile_icon_padding',
                        [
                            'label' => esc_html__( 'Padding', 'tronixcore' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                            'selectors' => [
                                '{{WRAPPER}} .tronix-menu-toggle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();
            
                $this->start_controls_tab(
                    'mobile_menu_logo_tab',
                    [
                        'label' => esc_html__( 'Logo', 'tronixcore' ),
                    ]
                );
            
                $this->add_responsive_control(
                    'mobile_logo_width',
                    [
                        'label' => esc_html__( 'Width', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 300,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .tronix-menu-wrapper .mobile-logo img' => 'width: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
                        'name' => 'mobile_logo_bg',
                        'types' => [ 'classic', 'gradient', 'video' ],
                        'selector' => '{{WRAPPER}} .tronix-menu-wrapper .mobile-logo',
                    ]
                );

                $this->add_responsive_control(
                    'mobile_menu_align',
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
                        'default' => 'center',
                        'toggle' => true,
                        'selectors' => [
                            '{{WRAPPER}} .tronix-menu-wrapper .mobile-logo' => 'text-align: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'mobile_logo_margin',
                    [
                        'label' => esc_html__( 'Margin', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .tronix-menu-wrapper .mobile-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'mobile_logo_padding',
                    [
                        'label' => esc_html__( 'Padding', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .tronix-menu-wrapper .mobile-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'mobile_menu_tab',
                    [
                        'label' => esc_html__( 'menu', 'tronixcore' ),
                    ]
                );
            
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'mobile_menu_typo',
                        'selector' => '{{WRAPPER}} .tronix-mobile-menu ul li a',
                    ]
                );

                $this->add_responsive_control(
                    'mobile-menu_color',
                    [
                        'label' => esc_html__( 'Color', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tronix-mobile-menu ul li a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'mobile_menu_active',
                    [
                        'label' => esc_html__( 'Active Color', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tronix-mobile-menu ul li.tp-active>a' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'border_color',
                    [
                        'label' => esc_html__( 'Border Color', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tronix-mobile-menu ul li' => 'border-color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'mobile_menu_bg',
                    [
                        'label' => esc_html__( 'background Color', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tronix-menu-wrapper .tp-menu-area' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'margin',
                    [
                        'label' => esc_html__( 'Margin', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .tronix-mobile-menu ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'mobile_menu_padding',
                    [
                        'label' => esc_html__( 'Padding', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                        'selectors' => [
                            '{{WRAPPER}} .tronix-mobile-menu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'mobile_menu_arrow_note',
                    [
                        'label' => esc_html__( 'Arrow Icon Options', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'mobile_menu_arrow_typo',
                        'selector' => '{{WRAPPER}} .tronix-mobile-menu ul .tronix-item-has-children>a .tronix-mean-expand',
                    ]
                );

                $this->add_responsive_control(
                    'mobile_arrow_color',
                    [
                        'label' => esc_html__( ' Icon Color', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tronix-mobile-menu ul .tronix-item-has-children>a .tronix-mean-expand' => 'color: {{VALUE}}',
                        ],
                    ]
                );

                $this->add_responsive_control(
                    'mobile_arrow_icon_bg',
                    [
                        'label' => esc_html__( 'Text Color', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tronix-mobile-menu ul .tronix-item-has-children>a .tronix-mean-expand' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );

                $this->end_controls_tab();
            
            $this->end_controls_tabs();

        $this->end_controls_section();
		
		// ---------- CANVA sTYLE cSS ------

		$this->start_controls_section(
			'canva_area_style',
			[
				'label' => esc_html__( 'Canva Button Style', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'canva_area_bg',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .headere-sidebar-textwidget',
			]
		);
        $this->add_responsive_control(
            'canva_area_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .headere-sidebar-textwidget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->start_controls_tabs(
			'canva_btn_tabs'
		);
		$this->start_controls_tab(
			'toggle_btn_tab',
			[
				'label' => esc_html__( 'Toggle Button', 'tronixcore' ),
			]
		);
		$this->add_responsive_control(
			'toggle_btn_area_bg',
			[
				'label'       => esc_html__('Background-Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .button.tronix-canva-open' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'toggle_button_text_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .button.tronix-canva-open' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'toggle_button_hover_color',
			[
				'label' => esc_html__( 'Hover Options', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'toggle_btn_area_bg_hover',
			[
				'label'       => esc_html__('Background-Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .button.tronix-canva-open:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'toggle_button_text_color_hover',
			[
				'label'       => esc_html__('Hover  Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .button.tronix-canva-open:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
            'toggle_button_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .button.tronix-canva-open' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
            'toggle_button_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .button.tronix-canva-open' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->start_controls_tab(
			'close_btn_tab',
			[
				'label' => esc_html__( 'close Button', 'tronixcore' ),
			]
		);
		$this->add_responsive_control(
			'close_btn_bg',
			[
				'label'       => esc_html__('Background-Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .tronix-canva-open.canva-close' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'close_btn_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .tronix-canva-open.canva-close' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'close_btn_hover_option',
			[
				'label' => esc_html__( 'Hover Options', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'close_btn_bg_hover',
			[
				'label'       => esc_html__('Background-Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .tronix-canva-open.canva-close:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'close_btn_color_hover',
			[
				'label'       => esc_html__('Hover  Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .tronix-canva-open.canva-close:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		
		$this->end_controls_tabs();
		
		$this->start_controls_tabs(
			'canva_content_tabs'
		);
		
		$this->start_controls_tab(
			'canva_title_tab',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .header-sidebar-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-sidebar-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->start_controls_tab(
			'canva_des_tab',
			[
				'label' => esc_html__( 'Description', 'tronixcore' ),
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'dec_typography',
                'selector' => '{{WRAPPER}} .header-sidebar-desc',
            ]
        );

        $this->add_responsive_control(
            'dec_color',
            [
                'label'     => esc_html__( 'Title Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-desc' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'dect_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-sidebar-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();

		// ----------------------

		$this->start_controls_tabs(
			'contact_list_tabs'
		);
		
		$this->start_controls_tab(
			'contact_title_tab',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'contact_title_typography',
                'selector' => '{{WRAPPER}} .header-sidebar-contact-info-title',
            ]
        );
        $this->add_responsive_control(
            'contact_title_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-contact-info-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_title_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-sidebar-contact-info-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->start_controls_tab(
			'contact_list_tab',
			[
				'label' => esc_html__( 'Contact List', 'tronixcore' ),
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'contact_list_typography',
                'selector' => '{{WRAPPER}} .header-sidebar-contact-info ul li i',
            ]
        );
		$this->add_responsive_control(
            'contact_list_icon_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-contact-info ul li i' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'contact_list_icon_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .header-sidebar-contact-info ul li i',
            ]
        );
		$this->add_control(
			'contact_list_text_options',
			[
				'label' => esc_html__( 'Text Option', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'contact_text_typography',
                'selector' => '{{WRAPPER}} .header-sidebar-contact-info ul li',
            ]
        );
		$this->add_responsive_control(
            'contact_list_text_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-contact-info ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_responsive_control(
            'contact_list_title_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .header-sidebar-contact-info ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_tab();
		$this->end_controls_tabs();


		$this->start_controls_tabs(
			'social_icon_tabs'
		);
		
		$this->start_controls_tab(
			'social_icon_tab',
			[
				'label' => esc_html__( 'Social Icon', 'tronixcore' ),
			]
		);
		$this->add_responsive_control(
            'tronix_social_icon_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_colorbg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tronix_social_icon_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .header-sidebar-social-icon ul li a',
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
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'tronix_social_icon_shadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .header-sidebar-social-icon ul li a',
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_margin',
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
            'tronix_social_icon_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_hcolorbg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tronix_social_icon_hborder',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .header-sidebar-social-icon ul li a:hover',
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
                    '{{WRAPPER}} .header-sidebar-social-icon ul li a:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'tronix_social_icon_hshadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .header-sidebar-social-icon ul li a:hover',
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
    <!-- Mobile Menu -->
        <div class="tronix-menu-wrapper">
            <div class="tronix-menu-area text-center">
                <button class="tronix-menu-toggle"><i class="bi bi-x-lg"></i></button>
                <div class="mobile-logo">
					<?php
						if( $settings['mobile_logo_select'] == 'cunstom' ){ ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php
									$logo_alt = get_post_meta( $settings['mobile_logo']['id'], '_wp_attachment_image_alt', true );
									$logo_title = get_the_title( $settings['mobile_logo']['id']);
								?>
								<img src="<?php echo $settings['mobile_logo']['url'] ?>" alt="<?php echo $logo_alt;?>" title="<?php echo $logo_title;?>">
							</a>
						<?php }elseif(has_custom_logo()){
									 the_custom_logo();
							  }else{
						?>
						<h2>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php esc_html(bloginfo( 'name' )); ?>
							</a>
						</h2>
					<?php  } ?>

                </div>
                <div class="tronix-mobile-menu">
                        <?php
							if($settings['menu_select']){
								$header_menu = $settings['menu_select'];
							}else{
								$header_menu = '';
							}
							wp_nav_menu(
								array(
									'menu'           => $header_menu,
									'container'      => false,
									'theme_location' => 'mainmenu',
									'menu_id'        => 'mainmenu',
									'menu_class'     => '',

								)
							);
						?>
                </div>
            </div>
        </div>

        <!-- end Mobile menu -->
		<header class="header-area site-header">
				<div class="tronix-header header-template-one two">
					<?php if($settings['enable_header_top'] == 'yes' ) : ?>
						<div class="header-three-top-area">
							<div class="container ">
								<div class="header-three-banner">
									<?php echo esc_html($settings['promotion_text']); ?>
								</div>
							</div>
						</div>
					<?php endif?>
					<div class="menu-area" id="<?php echo esc_attr( $settings['sticky_menu'] == 'yes' ? 'sticky-menu' : 'no-sticky-menu' ); ?>">
						<div class="container">
							<div class="row align-items-center justify-content-between">
								<div class="header-logo col-auto">
									<?php
										if( $settings['logo_select'] == 'cunstom' ){ ?>
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
												<?php
													$logo_alt = get_post_meta( $settings['logo']['id'], '_wp_attachment_image_alt', true );
													$logo_title = get_the_title( $settings['logo']['id']);
												?>
												<img src="<?php echo $settings['logo']['url'] ?>" alt="<?php echo $logo_alt;?>" title="<?php echo $logo_title;?>">
											</a>

										<?php 
										}elseif(has_custom_logo()){
											the_custom_logo();
										}else{
											?>
											<h2>
												<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
													<?php esc_html(bloginfo( 'name' )); ?>
												</a>
											</h2>
											<?php 
										}
									?>
								</div>
								<div class="col-auto">
									<nav class="main-menu d-none d-lg-inline-block">
										<?php
											if($settings['menu_select']){
												$header_menu = $settings['menu_select'];
											}else{
												$header_menu = '';
											}
											wp_nav_menu(
												array(
													'menu'           => $header_menu,
													'container'      => false,
													'theme_location' => 'mainmenu',
													'menu_id'        => 'mainmenu',
													'menu_class'     => '',

												)
											);
										?>
									</nav>
									<button type="button" class="tronix-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>
								</div>
								<div class="col-auto d-none d-xxl-block ">
									<div class="header-one-button-area"> 
										<?php if($settings['serarch_bar_show'] == 'yes'): ?>
											<div class="button search-open"> <i class="fas fa-search"></i>  </div>
										<?php endif; ?>
										<?php if($settings['enable_button'] == 'yes'): ?>
									   <div class="header-one-botton">
											<?php if ( ! empty( $settings['button_link']['url'] ) ) {
												$this->add_link_attributes( 'button_link', $settings['button_link'] );
											}?>
											<a <?php echo $this->get_render_attribute_string( 'button_link' ); ?> class=" theme-btns" target="_blank">  <?php echo esc_html($settings['button_Text']); ?> </a>
									   </div>
										<?php endif; ?>
									   <div class="button tronix-canva-open">
											<i class="fas fa-bars"></i>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</header>
		<!-- Headding sidebar Area Design -->
		<div class="canva-tronix-wrapper">
		<div class="headere-sidebar-textwidget tronix-canva-content">
			<div class="header-sidebar-info-contents">
				<div class="header-sidebar-toggle" id="closeButton"> 
					<div class="button tronix-canva-open canva-close"> X </div> 
				</div>
				<div class="header-sidebar-logo">
					<?php
						if( $settings['logo_select'] == 'cunstom' ){ ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php
									$logo_alt = get_post_meta( $settings['logo']['id'], '_wp_attachment_image_alt', true );
									$logo_title = get_the_title( $settings['logo']['id']);
								?>
								<img src="<?php echo $settings['logo']['url'] ?>" alt="<?php echo $logo_alt;?>" title="<?php echo $logo_title;?>">
							</a>

						<?php 
						}elseif(has_custom_logo()){
							the_custom_logo();
						}else{
							?>
							<h2>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php esc_html(bloginfo( 'name' )); ?>
								</a>
							</h2>
							<?php 
						}
					?>
				</div>
				<div class="header-sidebar-content-inner">
					<h4 class="header-sidebar-title"> <?php echo esc_html( $settings['canva_title_Text'] ); ?> </h4>
					<div class="header-sidebar-desc"> <?php echo esc_html( $settings['canva_des'] ); ?></div> 
					<div class="header-sidebar-contact-info">
					<h4 class="header-sidebar-contact-info-title"> <?php echo esc_html( $settings['canva_contact_title'] ); ?> </h4>
						<ul>
						<?php foreach($settings['tronix_contact_list'] as $contact_list): ?>
								<li>  <?php \Elementor\Icons_Manager::render_icon( $contact_list['contact_list_icon'], ['aria-hidden' => 'true'] );?>
								<?php echo esc_html( $contact_list ['contact_list_title'] ); ?>  </li>
							<?php endforeach?>
						</ul>
					</div>
					<!-- Social Box -->
					<div class="header-sidebar-social-icon">
						<ul>
							<?php foreach($settings['tronix_icon'] as $social): 
								$burl      = $social['tronix_icon_link']['url'];
								$btarget   = $social['tronix_icon_link']['is_external'] ? ' target="_blank"' : '';
								$bnofollow = $social['tronix_icon_link']['nofollow'] ? ' rel="nofollow"' : '';	
								?>
								<li>
									<a class="facebook social-icon" href="<?php echo esc_url($burl); ?>" >
										<?php \Elementor\Icons_Manager::render_icon( $social['tronix_social_icon'], ['aria-hidden' => 'true'] );?>
									</a>
								</li>
							<?php endforeach?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="overlay-canva tronix-canva-open"></div>
		</div>
    <div class="header-search-popup">
        <div class="header-search-overlay search-open"></div>
        <div class="header-search-popup-content">
            <form method="get" class="searchform pop_search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <span class="screen-reader-text"><?php esc_html_e( 'Search here...', 'tronixcore' ) ?></span>
                <input type="search" value="<?php echo esc_attr(get_search_query()) ?>" name="s" placeholder="<?php esc_attr_e( 'Search here... ', 'tronixcore' ) ?>" title="<?php esc_attr_e( 'Search for:', 'tronixcore' ) ?>">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>		
        </div>
    </div>
		<script>
            (function ($) {
                "use strict";
                jQuery(".site").addClass("header-template-three-activate");
            })(jQuery);
        </script>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new tronix_header_template_three );
?>