<?php
namespace Elementor;
class header_template_four extends Widget_Base {

	public function get_name() {
		return 'header_template_four';
	}

	public function get_title() {
		return esc_html__( 'Tronix Header Four', 'tronixcore' );
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
			'enable_top_header',
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
				'label'       => __( 'Promotion Text', 'tronixcore' ),
				'type'        => Controls_Manager::TEXT,
				'default' => esc_html__( 'We are reliaible & consistent IT Solution Team', 'tronixcore' ),
				'label_block' => true,
				'condition' => [
					'enable_top_header' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'opening_titme',
			[
				'label'       => __( 'Opening Time', 'tronixcore' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Mon - Sat 9.00 AM - 18.00 PM', 'tronixcore' ),
				'label_block' => true,
				'condition' => [
					'enable_top_header' => 'yes',
				],
			]
		);
		$this->add_control(
			'oping_iocn',
			[
				'label' => esc_html__( 'Icon', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-clock',
					'library' => 'fa-solid',
				],
				'condition' => [
					'enable_top_header' => 'yes',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'logo_settings',
			[
				'label' => esc_html__( 'Menu & Logo', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'logo_select',
			[
				'label' => esc_html__( 'Select Site Logo', 'tronixcore' ),
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
				'condition' => [
					'logo_select' => 'cunstom',
				],
				'default'     => [
					'url' => Utils::get_placeholder_image_src(),
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
		$this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'sticky_menu_background',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .tronix-icon-box .tronix-icon',
            ]
        );
		$this->end_controls_section();


		$this->start_controls_section(
			'header_buttons',
			[
				'label' => esc_html__( 'Buttons Arrea', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'enable_call_us_area',
			[
				'label'        => esc_html__( 'Enable Call Ua Area', 'tronixcore' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'tronixcore' ),
				'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);
		$this->add_control(
			'call_icon',
			[
				'label'            => esc_html__( 'Call Icon', 'tronixcore' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'label_block'      => true,
				'default' => [
					'value' => 'bi bi-telephone-fill',
					'library' => 'fa-solid',
				],
				'condition' => [
					'enable_call_us_area' => 'yes',
				],
			]
		);

		$this->add_control(
			'call_btn_subtitle',
			[
				'label'       => __( 'Call Button Subtitle', 'tronixcore' ),
				'label_block'       => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Quick Call' ),
				'condition' => [
					'enable_call_us_area' => 'yes',
				],
			]
		);

		$this->add_control(
			'call_btn_number',
			[
				'label'       => __( 'Call Button Number', 'tronixcore' ),
				'label_block'       => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( '(904) 12-366-25' ),
				'condition' => [
					'enable_call_us_area' => 'yes',
				],
			]
		);

// ---------------------------------
	$this->add_control(
			'button_options',
			[
				'label' => esc_html__( 'Button Options', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'enable_button',
			[
				'label'        => esc_html__( 'Enable Call Ua Area', 'tronixcore' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'tronixcore' ),
				'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default'      => 'yes',
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

		$this->start_controls_section(
			'header_top_style',
			[
				'label' => esc_html__( 'Header Top', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'top_box_bg',
                'label' => esc_html__( 'Background', 'tronixcore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .header-four-top-area',
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'top_box_border',
				'selector' => '{{WRAPPER}} .header-four-top-area',
			]
		);
		$this->add_responsive_control(
			'top_box_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .header-four-top-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'top_box_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .header-four-top-area' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
			$this->start_controls_tabs(
				'top_header_content_tabs'
			);
			
				$this->start_controls_tab(
					'promotion_text_tab',
					[
						'label' => esc_html__( 'Promotion Text', 'tronixcore' ),
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'promotion_text_typography',
						'selector' => '{{WRAPPER}} .header-four-top-text',
					]
				);
		
				$this->add_responsive_control(
					'promotion_text_color',
					[
						'label'       => esc_html__('Text Color', 'tronixcore'),
						'type'        => Controls_Manager::COLOR,
						'selectors'   => [
							'{{WRAPPER}} .header-four-top-text' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_responsive_control(
					'promotion_text_margin',
					[
						'label'      => esc_html__( 'Margin', 'tronixcore' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors'  => [
							'{{WRAPPER}} .header-four-top-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'promotion_text_padding',
					[
						'label'      => esc_html__( 'Padding', 'tronixcore' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors'  => [
							'{{WRAPPER}} .header-four-top-text' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->end_controls_tab();
			
				$this->start_controls_tab(
					'opening_tabs',
					[
						'label' => esc_html__( 'Opening text', 'tronixcore' ),
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'opening_text_typography',
						'selector' => '{{WRAPPER}} .header-four-top-open-time',
					]
				);
		
				$this->add_responsive_control(
					'opening_text_color',
					[
						'label'       => esc_html__('Text Color', 'tronixcore'),
						'type'        => Controls_Manager::COLOR,
						'selectors'   => [
							'{{WRAPPER}} .header-four-top-open-time' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_responsive_control(
					'opening_text_margin',
					[
						'label'      => esc_html__( 'Margin', 'tronixcore' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors'  => [
							'{{WRAPPER}} .header-four-top-open-time' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'opening_text_padding',
					[
						'label'      => esc_html__( 'Padding', 'tronixcore' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors'  => [
							'{{WRAPPER}} .header-four-top-open-time' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'more_options',
					[
						'label' => esc_html__( 'Iocn Style Options', 'tronixcore' ),
						'type' => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'opening_icon_typography',
						'selector' => '{{WRAPPER}} .header-four-top-open-time i',
					]
				);
				$this->add_responsive_control(
					'opening_icon_color',
					[
						'label'       => esc_html__('Icon Color', 'tronixcore'),
						'type'        => Controls_Manager::COLOR,
						'selectors'   => [
							'{{WRAPPER}} .header-four-top-open-time>i' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_responsive_control(
					'opening_icon_margin',
					[
						'label'      => esc_html__( 'Margin', 'tronixcore' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors'  => [
							'{{WRAPPER}} .header-four-top-open-time i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_responsive_control(
					'opening_icon_padding',
					[
						'label'      => esc_html__( 'Padding', 'tronixcore' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors'  => [
							'{{WRAPPER}} .header-four-top-open-time i' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();


		$this->start_controls_section(
			'logo_style',
			[
				'label' => esc_html__( 'Logo Style', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'header_logo_after_bg',
			[
				'label'     => esc_html__( 'Background After Color', 'tronixcore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-four-logo-inner' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'header_logo_bg',
				'label'    => esc_html__( 'Background Color', 'tronixcore' ),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .header-four-logo-inner:after',
			]
		);
		$this->add_responsive_control(
			'header_logo_max_height',
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
					'{{WRAPPER}} .header-four-logo-inner > img' => 'max-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'header_logo_height',
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
					'{{WRAPPER}} .header-four-logo-inner > img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'header_logo_width',
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
					'{{WRAPPER}} .header-four-logo-inner > img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'header_logo_object',
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
					'{{WRAPPER}} .header-four-logo-inner > img' => 'object-fit: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'header_logo_border',
				'selector' => '{{WRAPPER}} .header-four-logo-inner > img',
			]
		);
		$this->add_responsive_control(
			'header_logo_radius',
			[
				'label' => esc_html__( 'Border Radius', 'tronixcore' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .header-four-logo-inner > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'header_logo_margin',
			[
				'label' => esc_html__( 'Margin', 'tronixcore' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .header-four-logo-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'header_logo_padding',
			[
				'label' => esc_html__( 'Padding', 'tronixcore' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .header-four-logo-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        'selector' => '{{WRAPPER}} .main-menu ul li.mega > ul.sub-menu > li > a',
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

		$this->start_controls_section(
			'btn_area',
			[
				'label' => esc_html__( 'Buttons', 'tronixcore' ),
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
						'name'     => 'border_text_typography',
						'selector' => '{{WRAPPER}} .header-one-botton .theme-btns',
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name'     => 'button_background',
						'label'    => esc_html__( 'Background', 'tronixcore' ),
						'types'    => ['classic', 'gradient', 'video'],
						'selector' => '{{WRAPPER}} .header-one-botton .theme-btns',
					]
				);
				$this->add_responsive_control(
					'button_color',
					[
						'label'     => esc_html__( 'Color', 'tronixcore' ),
						'type'      => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .header-one-botton .theme-btns' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name'     => 'button_border',
						'label'    => esc_html__( 'Border', 'tronixcore' ),
						'selector' => '{{WRAPPER}} .header-one-botton .theme-btns',
					]
				);
				$this->add_responsive_control(
					'button_border_radius',
					[
						'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => ['px', '%', 'em'],
						'selectors'  => [
							'{{WRAPPER}} .header-one-botton .theme-btns' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Box_Shadow::get_type(),
					[
						'name'     => 'button_box_shadow',
						'label'    => esc_html__( 'Shadow', 'tronixcore' ),
						'selector' => '{{WRAPPER}} .header-one-botton .theme-btns',
					]
				);
				$this->add_responsive_control(
					'button_margin',
					[
						'label'      => esc_html__( 'Margin', 'tronixcore' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => ['px', '%', 'em'],
						'selectors'  => [
							'{{WRAPPER}} .header-one-botton .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .header-one-botton .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'selector' => '{{WRAPPER}} .header-one-botton .theme-btns:hover',
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name'     => 'button_background_hover',
						'label'    => esc_html__( 'Background', 'tronixcore' ),
						'types'    => ['classic', 'gradient', 'video'],
						'selector' => '{{WRAPPER}} .header-one-botton .theme-btns:hover',
					]
				);
				$this->add_responsive_control(
					'button_color_hover',
					[
						'label'     => esc_html__( 'Color', 'tronixcore' ),
						'type'      => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .header-one-botton .theme-btns:hover' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name'     => 'button_border_hover',
						'label'    => esc_html__( 'Border', 'tronixcore' ),
						'selector' => '{{WRAPPER}} .header-one-botton .theme-btns:hover',
					]
				);
				$this->add_responsive_control(
					'button_border_radius_hover',
					[
						'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => ['px', '%', 'em'],
						'selectors'  => [
							'{{WRAPPER}} .header-one-botton .theme-btns:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Box_Shadow::get_type(),
					[
						'name'     => 'button_box_shadow_hover',
						'label'    => esc_html__( 'Shadow', 'tronixcore' ),
						'selector' => '{{WRAPPER}} .header-one-botton .theme-btns:hover',
					]
				);

				$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();

		// -----------------------------------------
		$this->start_controls_section(
			'call_us_area',
			[
				'label' => esc_html__( 'Call Us Area', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
            'call_us_area_tabs'
        );
			$this->start_controls_tab(
				'icon_tab',
				[
					'label' => __( 'Iocn', 'tronixcore' ),
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'icon_size',
					'selector' => '{{WRAPPER}} .header-four-call-icon',
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
						'{{WRAPPER}} .header-four-call-icon' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .header-four-call-icon' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'icon_color',
				[
					'label'     => esc_html__( 'Color', 'tronixcore' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .header-four-call-icon' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name'     => 'icon_bg',
					'label'    => esc_html__( 'Background', 'tronixcore' ),
					'types'    => ['classic', 'gradient', 'video'],
					'selector' => '{{WRAPPER}} .header-four-call-icon',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_box_Shadow::get_type(),
				[
					'name'     => 'icon_shadow',
					'label'    => esc_html__( 'icon Shadow', 'tronixcore' ),
					'selector' => '{{WRAPPER}} .header-four-call-icon',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name'     => 'icon_border',
					'label'    => esc_html__( 'Border', 'tronixcore' ),
					'selector' => '{{WRAPPER}} .header-four-call-icon',
				]
			);
			$this->add_responsive_control(
				'icon_radius',
				[
					'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => ['px', '%', 'em'],
					'selectors'  => [
						'{{WRAPPER}} .header-four-call-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .header-four-call-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .header-four-call-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'label' => esc_html__( 'SVG With', 'tronixcore' ),
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
						'{{WRAPPER}} .header-four-call-icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .header-four-call-icon svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'small_title_tab',
				[
					'label' => esc_html__( 'Small Title', 'tronixcore' ),
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'small_title_typo',
					'label' => __( 'Typography', 'tronixcore' ),
					'selector' => ' {{WRAPPER}} .header-one-call-title ',
				]
			);
	
			$this->add_responsive_control(
				'small_title_color',
				[
					'label'       => esc_html__('Color', 'tronixcore'),
					'type'        => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .header-one-call-title' => 'color: {{VALUE}};',
						
					],
				]
			);
	
			$this->add_responsive_control(
				'small_title_margin',
				[
					'label'      => esc_html__( 'Margin', 'tronixcore' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .header-one-call-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'small_title_padding',
				[
					'label'      => esc_html__( 'Padding', 'tronixcore' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .header-one-call-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'number_tab',
				[
					'label' => esc_html__( 'Number Style', 'tronixcore' ),
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'number_typo',
					'label' => __( 'Typography', 'tronixcore' ),
					'selector' => ' {{WRAPPER}} .header-one-call-number ',
				]
			);
	
			$this->add_responsive_control(
				'number_color',
				[
					'label'       => esc_html__('Color', 'tronixcore'),
					'type'        => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .header-one-call-number' => 'color: {{VALUE}};',
						
					],
				]
			);
	
			$this->add_responsive_control(
				'number_margin',
				[
					'label'      => esc_html__( 'Margin', 'tronixcore' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .header-one-call-number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'number_padding',
				[
					'label'      => esc_html__( 'Padding', 'tronixcore' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .header-one-call-number' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

    <header class="header-area site-header">		
        <div class="tronix-header header-template-four">
			<?php if($settings['enable_top_header'] == 'yes' ) : ?>
				<div class="header-four-top-area">
					<div class="container container-1500">
						<div class="row ">
							<div class="col-xl-6 col-lg-6 col-md-12 col-12 ">
								<div class="header-four-top-text">
								<?php echo esc_html($settings['promotion_text']); ?>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-12 col-12">
								<div class="header-four-top-open-time"> <?php \Elementor\Icons_Manager::render_icon( $settings['oping_iocn'], [ 'aria-hidden' => 'true' ] ); ?> 
									<?php echo esc_html($settings['opening_titme']); ?></div>
							</div>
						</div>
					</div>
				</div>
			<?php endif?>
            <div class="menu-area" id="<?php echo esc_attr( $settings['sticky_menu'] == 'yes' ? 'sticky-menu' : 'no-sticky-menu' ); ?>">
                <div class="container container-1500">
                    <div class="row align-items-center ms-0 me-auto menu-content-area">
                        <div class="header-four-logo col-auto">
							<div class="header-four-logo-inner">
                                
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
                        </div>
                        <div class="col-auto ms-3">
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
						<div class="col-auto d-none d-xxl-block ms-auto me-0">
                            <div class="header-one-button-area">
								<?php if ( $settings['enable_call_us_area'] == 'yes' ): ?>
								   <div class="header-one-call-us-area">
										<div class="header-four-call-icon"> 
										<?php \Elementor\Icons_Manager::render_icon( $settings['call_icon'], [ 'aria-hidden' => 'true' ] ); ?>
										</div>
										<div class="header-one-call-text">
											<div class="header-one-call-title"> <?php echo esc_html($settings['call_btn_subtitle']); ?> </div>
											<div class="header-one-call-number"><?php echo esc_html($settings['call_btn_number']); ?></div>
										</div>
								   </div>
								<?php endif?>
								<?php if ( $settings['enable_button'] == 'yes' ): ?>
								   <div class="header-one-botton">
									<?php if ( ! empty( $settings['button_link']['url'] ) ) {
										$this->add_link_attributes( 'button_link', $settings['button_link'] );
									}?>
										<a <?php echo $this->get_render_attribute_string( 'button_link' ); ?> class=" theme-btns" target="_blank">  
											<?php echo esc_html($settings['button_Text']); ?> </a>
								   </div>
								<?php endif?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</header>
        <script>
            (function ($) {
                "use strict";
                jQuery(".site").addClass("header-template-four-activate");
            })(jQuery);
        </script>
		<?php
	}
}

Plugin::instance()->widgets_manager->register( new header_template_four );
?>
