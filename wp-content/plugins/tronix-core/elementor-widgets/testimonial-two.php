<?php namespace Elementor;

class testimonial_two_Widget extends Widget_Base {

    public function get_name() {

        return 'tronix_testimonial_two';
    }

    public function get_title() {
        return esc_html__( 'Tronix Testimonial V2', 'tronixcore' );
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
            'Tronix_title_options',
            [
                'label' => esc_html__( 'Tronix Testomonial Two', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'stitle',
            [
                'label' => esc_html__( 'Small Title', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'More About Our Company', 'tronixcore' ),
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
                'default' => __( 'What They’re Saying', 'tronixcore' ),
                'show_label' => true,
                'dynamic' => [
                   'active' => true,
                ],
            ]
        );
        $this->add_control(
            'content',
            [
                'label' => esc_html__( 'Description', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( '“Completely formulate user-centric partnerships and cross top benefits and team driven is services edefine after cross capital. Intrinsicly  engage integrated intellectual.”', 'tronixcore' ),
                'dynamic' => [
                   'active' => true,
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
            'name',
            [
                'label'       => esc_html__( 'Name', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Marvin McKinney', 'tronixcore' ),
                'label_block' => true,
            ]
        );
     

        $repeater->add_control(
            'designation',
            [
                'label'       => esc_html__( 'Desiganation', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'CFO', 'tronixcore' ),
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'Tronix_repeater_list',
            [
                'label'       => esc_html__( 'Repeater List', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
				'default' => [
					[
						'name' => esc_html__( 'Manaf Hasan', 'tronixcore' ),
						'designation' => esc_html__( 'CFO/Founder', 'tronixcore' ),
					],
                    [
						'name' => esc_html__( 'Manaf Hasan', 'tronixcore' ),
						'designation' => esc_html__( 'CFO/Founder', 'tronixcore' ),
					],
				],
                'title_field' => '{{{ name }}}',
            ]
        );
     
        $this->end_controls_section();
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Testimonial Options', 'tronixcore' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'Tronix_enable_arrows',
            [
                'label'        => esc_html__( 'Enable Arrows ', 'tronixcore' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'tronixcore' ),
                'label_off'    => esc_html__( 'Off', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'enable_slider_auto_loop',
            [
                'label'        => esc_html__( 'Enable Auto Loop ', 'tronixcore' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'tronixcore' ),
                'label_off'    => esc_html__( 'Off', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'slid_show_item',
            [
                'label' => esc_html__( 'Display Item', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 4,
                'step' => 1,
                'default' => 2,
            ]
        );
        $this->add_control(
            'Tronix_slider_speed',
            [
                'label'     => esc_html__( 'Slide Speed', 'tronixcore' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 500,
                'max'       => 8000,
                'step'      => 10,
                'default'   => 800,
            ]
        );

        $this->end_controls_section();

        //=================================================//
        //========= TESTIMONIAL BOX STYLE START===========//
        //===============================================//

        $this->start_controls_section(
            'box_tab_style',
            [
                'label' => esc_html__( 'Box Style', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'normal_box_tabs'
        );
        $this->start_controls_tab(
            'normal_box_tab',
            [
                'label' => esc_html__( 'Normal', 'tronixcore' ),
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
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .testimonial-content-two' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial-item-box-two.testimonial-slider ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-item-box-two.testimonial-slider',
            ]
        );
        $this->add_responsive_control(
            'box_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box-two.testimonial-slider' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-item-box-two.testimonial-slider',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box-two.testimonial-slider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-item-box-two.testimonial-slider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'box_active_tab',
            [
                'label' => esc_html__( 'Active Box', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'testi_active_after_color',
            [
                'label'     => esc_html__( 'After Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial_two_Widget-two .slick-current.slick-active .testimonial-item-box-two.testimonial-slider:after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds_active',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial_two_Widget-two .slick-current.slick-active .testimonial-item-box-two.testimonial-slider',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow_active',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial_two_Widget-two .slick-current.slick-active .testimonial-item-box-two.testimonial-slider',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border_active',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial_two_Widget-two .slick-current.slick-active .testimonial-item-box-two.testimonial-slider',
            ]
        );

        $this->add_responsive_control(
            'border_radius_active',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial_two_Widget-two .slick-current.slick-active .testimonial-item-box-two.testimonial-slider' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

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
				'selector' => '{{WRAPPER}} .testimonial-two-title',
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-two-title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .testimonial-two-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .testimonial-two-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .testimonial-des',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-des' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .testimonial-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

     
        // 
        // ========== Testimonial Content ===========
        // 
        $this->start_controls_section(
            'image_Style',
            [
                'label' => esc_html__( ' Image Style', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box-two .image-wrap' => 'height: {{SIZE}}{{UNIT}};',
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
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box-two .image-wrap' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-item-box-two .image-wrap' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-item-box-two .image-wrap img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box-two .image-wrap img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box-two .image-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-item-box-two .image-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        // 
        // ========== Testimonial Content ===========
        // 

        $this->start_controls_section(
			'testi_content',
			[
				'label' => esc_html__( 'Content', 'tronixcore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->start_controls_tabs(
            'testi_content_tabs'
        );
        $this->start_controls_tab(
            'testi_name_tab',
            [
                'label' => esc_html__( 'Name', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testi_name_typo',
                'selector' => '{{WRAPPER}} .testimonial-name',
            ]
        );
        $this->add_responsive_control(
            'testi_name_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_name_Margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_name_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'testi_designation_tab',
            [
                'label' => esc_html__( 'Designation', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testi_designation_typo',
                'selector' => '{{WRAPPER}} .testimonial-designation',
            ]
        );
        $this->add_responsive_control(
            'testi_designation_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-designation' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'testi_designation_Margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_designation_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        //=========== Arrow STYLE START===========//
        //

        $this->start_controls_section(
			'testi_arrow_content',
			[
				'label' => esc_html__( 'Arrow Style', 'tronixcore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Tronix_enable_arrows' => 'yes',
                ],
			]
		);
        $this->add_responsive_control(
            'arrow_height',
            [
                'label'      => esc_html__( 'Height', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-two-arrow-wrapper .slick-arrow' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_width',
            [
                'label'      => esc_html__( 'width', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-two-arrow-wrapper .slick-arrow' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'arrow_typography',
				'selector' => '{{WRAPPER}} .testimonial-two-arrow-wrapper .slick-arrow',
			]
		);
		$this->add_responsive_control(
            'arrow_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-two-arrow-wrapper .slick-arrow' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_responsive_control(
            'arrow_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-two-arrow-wrapper .slick-arrow:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
			'arrow_background_options',
			[
				'label' => esc_html__( 'Background Options', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_responsive_control(
            'arrow_background',
            [
                'label'     => esc_html__( 'Background Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-two-arrow-wrapper .slick-arrow' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_background_hover',
            [
                'label'     => esc_html__( 'Background Hover Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-two-arrow-wrapper .slick-arrow:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'arrow_border',
				'selector' => '{{WRAPPER}} .testimonial-two-arrow-wrapper .slick-arrow',
			]
		);

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-two-arrow-wrapper .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
        $this->end_controls_section();

    }


    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $unique_id = rand( 2585, 8241 );
        if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
            $row = 'no-row';
            $box = 'testimonial-slider';
            ?>
             <script>
                jQuery(document).ready(function($) {
                    "use strict";
                    $('#testimonial-<?php echo esc_attr($unique_id); ?>').slick({
                        infinite: true,
						rtl: <?php  echo json_encode( is_rtl() == 'yes' ? true : false);?>,
                        speed:<?php echo json_encode($settings['Tronix_slider_speed']);?>,
                        autoplay:<?php echo json_encode($settings['enable_slider_auto_loop'] == 'yes' ? true : false );?>,
                        arrows: <?php  echo json_encode($settings['Tronix_enable_arrows'] == 'yes' ? true : false);?>,
                        dots: false,
                        slidesToShow: <?php echo json_encode($settings['slid_show_item']); ?>,
                        slidesToScroll: 1,
                        cssEase: 'linear',
                        prevArrow: $(".testimonial-prev"),
                        nextArrow: $(".testimonial-next"),
                        responsive: [
                            {
                                breakpoint: 1450,
                                settings: {
                                    arrows: false,
                                }
                            },
                            {
                                breakpoint: 767,
                                settings: {
                                    slidesToShow: 1,
                                    arrows: false,
                                }
                            }
                        ]
                    });
                });
            </script>
        <div class="testimonial_two_Widget-two">
            <div class="<?php echo esc_attr( $container ); ?>">
                <div class="testimonial-content-two">
                        <?php if ( ! empty( $settings['stitle'] ) ) :?> <span class="about-small-stitle"> <?php echo esc_html($settings['stitle']); ?> </span><?php endif?>
                        <?php if ( ! empty( $settings['title'] ) ) :?> <h2 class="testimonial-two-title"> <?php echo esc_html($settings['title']); ?> </h2> <?php endif?>
                       
                        <?php   if ( $settings['Tronix_enable_arrows'] == 'yes' ) :?>
                            <div class="testimonial-two-arrow-wrapper">
                                    <button class="testimonial-prev"><i class="bi bi-arrow-left"></i></button>
                                    <button class="testimonial-next"><i class="bi bi-arrow-right"></i></button>
                            </div>
                        <?php endif?>
                    </div>
                <div class="<?php echo esc_attr($row); ?>" id="testimonial-<?php echo esc_attr($unique_id); ?>">
                    <?php foreach($settings['Tronix_repeater_list'] as $item) :?>
                        <div class="testmonial-slide-item">
							 <?php if ( ! empty( $settings['content'] ) ) :?> <div class="testimonial-des"> <?php echo esc_html($settings['content']); ?> </div><?php endif?>
                            <div class="testimonial-item-box-two <?php echo esc_attr($box); ?>">
								
                                <div class="image-wrap">                                    
                                    <?php echo wp_get_attachment_image( $item['image']['id'], 'full' ); ?>                                               
                                </div> 
                                <div class="testimonial-information">
                                    <h5 class="testimonial-name"><?php echo esc_html( $item['name'] ); ?></h5>
                                    <span class="testimonial-designation"> <?php echo esc_html( $item['designation'] ); ?></span>                 
                                </div>                                                      
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new testimonial_two_Widget );