<?php namespace Elementor;

class tronix_team_details_Widget extends Widget_Base {

    public function get_name() {

        return 'tronix_team_details';
    }

    public function get_title() {
        return esc_html__( 'Tronix Team Details', 'tronixcore' );
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
            'team_details_options',
            [
                'label' => esc_html__( 'Team Details', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_responsive_control(
            'select_iamge',
            [
                'label' => esc_html__( 'Image type', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'featured',
                'options' => [
                    'featured'  => esc_html__( 'Featured', 'tronixcore' ),
                    'custom' => esc_html__( 'Custom', 'tronixcore' ),
                ],
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __( 'Choose Image', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'select_iamge' => 'custom',
                ],
            ]
        );
        $this->end_controls_section();

        //================================================//
        //========= Team Details Box STYLE START ========//
        //==============================================//

        $this->start_controls_section(
			'team_single_section',
			[
				'label' => esc_html__( 'Team Section Style', 'tronixcore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
        $this->start_controls_tabs(
            'team_content_tabs'
        );
		$this->start_controls_tab(
            'team_box_tab',
            [
                'label' => esc_html__( 'Box', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
			'image_gap',
			[
				'label' => esc_html__( 'Gap', 'tronixcore' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 2,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-info-wrapper-area' => 'margin-left: {{SIZE}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .team_details_wraper',
            ]
        );
		 $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'team_box_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .team_details_wraper',
            ]
        );
		$this->add_responsive_control(
            'team_box_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team_details_wraper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		 $this->add_responsive_control(
            'team_box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team_details_wraper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_box_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team_details_wraper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'team_image_tab',
            [
                'label' => esc_html__( 'image', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label'      => esc_html__( 'Height', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' =>1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .team-datails-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_width',
            [
                'label'      => esc_html__( 'width', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 800,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .team-datails-image img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .team-datails-image img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .team-datails-image img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-datails-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_section_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-datails-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .team-datails-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // 
        // Title Style ----------------------------------
        // 

        $this->start_controls_section(
            'team_name_style',
            [
                'label' => esc_html__( 'Name Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typo',
                'selector' => '{{WRAPPER}} .team-details-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-details-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_Margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-details-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-details-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // 
        // Degination Style -----------------------------------------
        // 
        $this->start_controls_section(
            'team_designation_style',
            [
                'label' => esc_html__( 'Designation Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'team_designation_typo',
                'selector' => '{{WRAPPER}} .team-details-designation',
            ]
        );
        $this->add_responsive_control(
            'team_designation_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-details-designation' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_designation_Margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-details-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_designation_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-details-designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_details_description_style',
            [
                'label' => esc_html__( 'Description Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'team_des_typo',
                'selector' => '{{WRAPPER}} .team-sort-dec',
            ]
        );
        $this->add_responsive_control(
            'team_des_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-sort-dec' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_des_Margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-sort-dec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_des_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-sort-dec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();

        
        //==============================================//
        //========= SOCIAL SECTION STYLE START ========//
        //============================================//

		$this->start_controls_section(
            'tronix_social_icon_style',
            [
                'label' => esc_html__( 'Social Icon Style', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'social_icon_tabs'
        );
        $this->start_controls_tab(
            'social_icon_tab',
            [
                'label' => esc_html__( 'Normal', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
			'gap',
			[
				'label' => esc_html__( 'Gap', 'tronixcore' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 2,
						'max' => 60,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-social-area' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
				'separator' => 'before',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'social_icons_typo',
                'selector' => '{{WRAPPER}} .team-social-area ul li a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'team_social_icon_backgrounds',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .team-social-area ul li a',
            ]
        );
      
        $this->add_responsive_control(
            'tean_social_icon_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-social-area ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_socials_icon_height',
            [
                'label'      => esc_html__( 'Icon Height', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-social-area ul li a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_social_icon_width',
            [
                'label'      => esc_html__( 'Icon Width', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .team-social-area ul li a' => 'Width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'social_icons_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .team-social-area ul li a',
            ]
        );
        $this->add_responsive_control(
            'social_icons_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-social-area ul li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icons_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-social-area ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icons_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-social-area ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_description_tab',
            [
                'label' => esc_html__( 'Hover', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'social_icon_typo',
                'selector' => '{{WRAPPER}} .team-social-area ul li a:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'team_social_backgrounds',
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .team-social-area ul li a:hover',
            ]
        );
      
        $this->add_responsive_control(
            'social_icon_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-social-area ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'social_icon_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .team-social-area ul li a:hover',
            ]
        );
        $this->add_responsive_control(
            'social_icon_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-social-area ul li a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-social-area ul li a:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-social-area ul li a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
                        
        //==============================================//
        //========= Info Details STYLE START ========//
        //============================================//

        $this->start_controls_section(
            'team_info_details',
            [
                'label' => esc_html__( 'Info Details', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'label_tabs'
        );
        
        $this->start_controls_tab(
            'label_tab',
            [
                'label' => esc_html__( 'Label', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'label_typo',
                'selector' => '{{WRAPPER}} .team-info-list-wrapper .info-label',
            ]
        );
        $this->add_responsive_control(
            'label_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-info-list-wrapper .info-label' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'label_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-info-list-wrapper .info-label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'label_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-info-list-wrapper .info-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'address_tab',
            [
                'label' => esc_html__( 'Address', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'team_info_typo',
                'selector' => '{{WRAPPER}} .team-info-list-wrapper ul li',
            ]
        );
        $this->add_responsive_control(
            'team_info_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-info-list-wrapper ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_info_Margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-info-list-wrapper ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'team_info_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-info-list-wrapper ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //========================================//
        //=======  ICON STYLE START=====//
        //========================================//
        $this->start_controls_section(
            'icon_Style',
            [
                'label' => esc_html__( 'Icon Style', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'icon_width',
            [
                'label' => esc_html__( 'Width', 'tronixcore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-details-icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_height',
            [
                'label' => esc_html__( 'Height', 'tronixcore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-details-icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_typo',
                'selector' => '{{WRAPPER}} .team-details-icon',
            ]
        );
        $this->add_responsive_control(
            'color_icon',
            [
                'label'     => esc_html__( 'Icon Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-details-icon' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Icon Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .team-details-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'border_icon',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .team-details-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_border_redius',
            [
                'label'      => esc_html__( 'Border Redius', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-details-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
      
        $this->add_responsive_control(
            'icon_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-details-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .team-details-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

    }
    //Render

    protected function render() {
        $settings = $this->get_settings_for_display();

        $unique = get_the_ID();
        $team_meta = get_post_meta( $unique, 'Tronix_teammeta', true );

        if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
        ?>
        <div class="team_details_wraper">
            <div class="<?php echo esc_attr( $container ); ?>">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <div class="team-datails-image">
                            <?php if($settings['select_iamge'] == 'featured' ){
                                the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );
                            }else{
                                echo wp_get_attachment_image( $settings['image']['id'], 'full' );
                            } ?>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <div class="team-info-wrapper-area">
                            <div class="team-info-wrapper">
                                <h3 class="team-details-title"><?php the_title(); ?> </h3>
                                <!-- Designation -->
                                <?php if(!empty($team_meta['Tronix_team_stitle'])) : ?>
                                    <div class="team-details-designation"><?php echo esc_html($team_meta['Tronix_team_stitle']); ?></div>
                                <?php endif; ?>

                                    <!-- Description -->
                                <?php if(!empty($team_meta['tronix_team_description'])) : ?>
                                    <div class="team-sort-dec">
                                        <?php echo wp_kses_post($team_meta['tronix_team_description']); ?>
                                    </div>
                                <?php endif; ?>   
                            
                                            <!-- Team Details Social -->
                                <?php if(!empty($team_meta['Tronix_team_socials'])) :?>
                                    <div class="team-social-area">
                                        <ul>
                                            <?php foreach($team_meta['Tronix_team_socials'] as $social ) : ?>
                                                <li><a href="<?php echo esc_url($social['Tronix_teams_social_url']['url']); ?>" target="<?php echo esc_attr($social['Tronix_teams_social_url']['target']); ?>" class="">
                                                <i class="<?php echo esc_attr($social['Tronix_teams_social_icon']); ?>"></i></a></li>
                                            <?php endforeach; ?>
                                        </ul>                           
                                    </div>
                                <?php endif?>
                            </div>
                            <?php foreach($team_meta['Tronix_team_info'] as $info ) : ?>
                                <div class="team-details-contact-area">
                                    <div class="team-details-icon">
                                        <i class="<?php echo esc_attr($info['Tronix_team_info_icon']); ?>"></i>
                                    </div>
                                    <div class="team-details-content-info">
                                        <div class="team-details-contact-label"><?php echo esc_html($info['Tronix_team_info_label']); ?></div>
                                        <div class="team-details-contact-text"><?php echo wp_kses_post($info['Tronix_team_info_content']); ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new tronix_team_details_Widget );