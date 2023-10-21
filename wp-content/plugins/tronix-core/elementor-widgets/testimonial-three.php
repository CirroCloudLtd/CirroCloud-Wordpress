<?php namespace Elementor;

class tronix_testimonial_three_Widget extends Widget_Base {

    public function get_name() {

        return 'tronix_testimonial-three';
    }

    public function get_title() {
        return esc_html__( 'Tronix Testimonial Three', 'tronixcore' );
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
            'title_section',
            [
                'label' => esc_html__( 'Tronix Testimonial Title', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'stitle',
            [
                'label'   => esc_html__( 'Small Title', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'More About Our Company', 'tronixcore' ),
            ]
        );
        $this->add_control(
            'title',
            [
                'label'       => esc_html__( 'Title', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'People talk about us', 'tronixcore' ),
                'dynamic'     => [
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
            'description',
            [
                'label'       => esc_html__( 'Description', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'rows'        => 10,
            ]
        );
        $this->add_control(
			'testimonial_content',
			[
				'label' => esc_html__( 'Testimonial Content', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'main_image',
			[
				'label' => esc_html__( 'Testimonial Main Image', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
            'testimonial_title',
            [
                'label'       => esc_html__( 'TItle', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( '“Elit penatibus curae aucto”', 'tronixcore' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'descriptions',
            [
                'label'       => esc_html__( 'Description', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'Sem a penatibus varius dui nostra vehicula gravida congue, potenti etiam erat justo faucibus fusce quis nulla eu, dignissim eget posuere blandit curabitur porta inceptos. Inceptos faucibus fringilla pharetra mi suscipit curabitu', 'tronixcore' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'rows'        => 10,
            ]
        );
        $repeater->add_control(
            'name',
            [
                'label'       => esc_html__( 'Name', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Andrew Smith', 'tronixcore' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'testi_desig',
            [
                'label'       => esc_html__( 'Desiganation', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'default'     => __( 'Designer at <span>(Montan_Agency)</span>', 'tronixcore' ),
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
						'name' => esc_html__( 'Andrew Smith', 'tronixcore' ),
						'testi_desig' => __( 'Designer at <span>(Montan_Agency)</span>', 'tronixcore' ),
					],
                    [
						'name' => esc_html__( 'Andrew Smith', 'tronixcore' ),
						'testi_desig' => __( 'Designer at <span>(Montan_Agency)</span>', 'tronixcore' ),
					],
				],
                'title_field' => '{{{ name }}}',
            ]
        );
        $this->add_control(
			'testimonial_big_image',
			[
				'label' => esc_html__( 'Testimonial Static Image', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'separator' => 'before',
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'shape_image_one',
			[
				'label' => esc_html__( 'Shape Image One', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'shape_image_two',
			[
				'label' => esc_html__( 'Shape Image Two', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'shape_image_three',
			[
				'label' => esc_html__( 'Shape Image Three', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'shape_image_four',
			[
				'label' => esc_html__( 'Shape Image Four', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->end_controls_section();
        
        // Testimonial Option -----------------

        $this->start_controls_section(
			'testimonial_options',
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
                'default' => 1,
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
        // START CSS
        $this->start_controls_section(
            'section_box',
            [
                'label' => esc_html__( 'Box Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'box_aligment',
            [
                'label'     => __( 'Alignment', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
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
                        'icon'  => 'eicon-text-align-left',
                    ],
                ],
                'default'   => 'center',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-section-title-content' => 'text-align: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'testimonial_main_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .testimonial-three-section-wrapper',
			]
		);
		$this->add_responsive_control(
            'main_image_object',
            [
                'label'     => esc_html__( 'Object Fit', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'cover',
                'options'   => [
                    'fill'    => esc_html__( 'Fill', 'tronixcore' ),
                    'contain' => esc_html__( 'Contain', 'tronixcore' ),
                    'cover'   => esc_html__( 'Cover', 'tronixcore' ),
                    'ntwo'    => esc_html__( 'Ntwo', 'tronixcore' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-three-section-wrapper' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'section_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-section-title-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'section_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-section-title-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .tronix-section-small-title',
			]
		);

		$this->add_responsive_control(
			'subtitle_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tronix-section-small-title' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_responsive_control(
			'subtitle_color_before',
			[
				'label'       => esc_html__('Dote Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tronix-section-small-title:before' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .tronix-section-small-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tronix-section-small-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .tronix-section-title',
			]
		);

		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tronix-section-title' => 'color: {{VALUE}};',
                    
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
					'{{WRAPPER}} .tronix-section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tronix-section-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

        // 
		// ----------------Description Style------------------
        // 

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
                'selector' => '{{WRAPPER}} .tronix-section-description',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-section-description' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .tronix-section-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-section-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // Testimonial Content 

          //=================================================//
        //========= TESTIMONIAL BOX STYLE START===========//
        //===============================================//

        $this->start_controls_section(
            'box_tab_style',
            [
                'label' => esc_html__( 'Testimonial Box Style', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .testimonial-three-slide-box' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial-three-section-wrapper ',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-three-section-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-three-section-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

          // 
        // ========== Testimonial Image ===========
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
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-three-slide-box .image-wrap img' => 'height: {{SIZE}}{{UNIT}};',
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
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-three-slide-box .image-wrap img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-three-slide-box .image-wrap img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-three-slide-box .image-wrap img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-three-slide-box .image-wrap img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-three-slide-box .image-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-three-slide-box .image-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        
        // 
		// ----------------Title Style------------------
        // 

		$this->start_controls_section(
			'testimonial_title_options',
			[
				'label' => esc_html__( 'Title', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'testimonial_title_typo',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .testimonial-title',
			]
		);
		$this->add_responsive_control(
			'testimonial_title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'testimonial_title_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .testimonial-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'testimonial_title_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .testimonial-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

        // 
		// ----------------Description Style------------------
        // 

        $this->start_controls_section(
			'testimonial_des_options',
			[
				'label' => esc_html__('Description', 'tronixcore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_dec_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-description',
            ]
        );
        $this->add_responsive_control(
            'testimonial_dec_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-description' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'testimonial_dec_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testimonial_dec_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();



        // 
		// ----------------Testimonial Info Style------------------
        // 

        $this->start_controls_section(
			'testimonial_info_options',
			[
				'label' => esc_html__('Testimonial Info', 'tronixcore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->start_controls_tabs(
            'testimonial_tabs'
        );
        
        $this->start_controls_tab(
            'style_name_tab',
            [
                'label' => esc_html__( 'Name', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'name_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-three-name',
            ]
        );
        $this->add_responsive_control(
            'name_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-three-name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'name_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-three-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'name_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-three-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'style_designation_tab',
            [
                'label' => esc_html__( 'Designation', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'designation_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-three-designation',
            ]
        );
        $this->add_responsive_control(
            'designation_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-three-designation' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'designation_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-three-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'designation_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-three-designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $unique_id = rand( 2585, 8241 );
        if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
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
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 1,
                                arrows: false,
                            }
                        }
                    ]
                });
            });
        </script>
        <div class="testimonial-three-section-wrapper">
            <div class="container">
                <div class="testimonial-section-title-content">
                    <?php  if ( ! empty( $settings['stitle'] ) ) :?>
                    <span class="tronix-section-small-title">
                    <?php echo esc_html( $settings['stitle'] ); ?>
                    </span>
                    <?php endif?>
                    <?php if ( !empty( $settings['title'] ) ): ?>
                    <<?php echo esc_attr($settings['title_tag']);?> class="tronix-section-title">
                        <?php echo esc_html( $settings['title'] ); ?>
                    </<?php echo esc_attr($settings['title_tag']);?>>
                    <?php endif;?>
                    <?php if ( !empty( $settings['description'] ) ): ?>
                    <div class="tronix-section-description">
                        <?php echo esc_html( $settings['description'] ); ?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xxl-4 col-xl-3 col-lg-3 col-md-2 col-sm-12">
                        <div class="testimonial-three-full-image">
                        <?php echo wp_get_attachment_image( $settings['testimonial_big_image']['id'], 'full' ); ?>
                        </div>
                    </div>
                    <div class="col-xxl-4  col-xl-6 col-lg-6 col-md-8 col-sm-12 ">
                        <div class="testimonial-slide-item" id="testimonial-<?php echo esc_attr($unique_id); ?>">
                            <?php foreach($settings['Tronix_repeater_list'] as $item) :?>
                                <div class="testimonial-three-slide-box">
                                    <div class="image-wrap">                                    
                                        <?php echo wp_get_attachment_image( $item['main_image']['id'], 'full' ); ?>                                               
                                    </div>
                                    <div class="testimonial-three-information">
                                        <h3 class="testimonial-title"><?php echo esc_html( $item['testimonial_title'] ); ?></h3>
                                        <div class="testimonial-description">
                                            <?php echo esc_html( $item['descriptions'] ); ?>
                                        </div> 
                                        <div class="testimonial-three-name">
                                            <?php echo esc_html( $item['name'] ); ?>
                                        </div> 
                                        <div class="testimonial-three-designation">
                                            <?php echo wp_kses_post( $item['testi_desig'] ); ?>
                                        </div>                 
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-3 col-lg-3 col-md-2 col-sm-12">
                        <div class="testimonial-three-small-image-one">
                        <?php echo wp_get_attachment_image( $settings['shape_image_one']['id'], 'full' ); ?>
                        </div>
                        <div class="testimonial-three-small-image-two">
                        <?php echo wp_get_attachment_image( $settings['shape_image_two']['id'], 'full' ); ?>
                        </div>
                        <div class="testimonial-three-small-image-three">
                        <?php echo wp_get_attachment_image( $settings['shape_image_three']['id'], 'full' ); ?>
                        </div>
                        <div class="testimonial-three-small-image-four">
                        <?php echo wp_get_attachment_image( $settings['shape_image_four']['id'], 'full' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new tronix_testimonial_three_Widget );