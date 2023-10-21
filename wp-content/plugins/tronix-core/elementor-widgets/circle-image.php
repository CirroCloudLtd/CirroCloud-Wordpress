<?php namespace Elementor;

class circle_image_wrapper extends Widget_Base {

    public function get_name() {

        return 'circle-image';
    }

    public function get_title() {
        return esc_html__( 'Tronix Circle Image', 'tronixcore' );
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
            'tronix_image_options',
            [
                'label' => esc_html__( 'Tronix image', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Main Image', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'image_two',
			[
				'label' => esc_html__( 'Choose Small Image', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'image_three',
			[
				'label' => esc_html__( 'Choose Small Image', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
            'tronix_image_CSS',
            [
                'label' => esc_html__( 'Tronix Main image', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'tronix_image_CSS_aligment',
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
                    '{{WRAPPER}} .circle_image-wrapper' => 'text-align: {{VALUE}}',
                ],
            ]
        );
       
        $this->add_responsive_control(
			'min_Image_height',
			[
				'label' => esc_html__( 'Min Height', 'tronixcore' ),
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
					'{{WRAPPER}} .circle_image-wrapper .circle-main-image > img' => 'min-height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .circle_image-wrapper .circle-main-image > img' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .circle_image-wrapper .circle-main-image > img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .circle_image-wrapper .circle-main-image > img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tronix_image_border',
				'selector' => '{{WRAPPER}} .circle_image-wrapper .circle-main-image > img',
			]
		);
		 $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .circle_image-wrapper .circle-main-image > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .circle_image-wrapper .circle-main-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .circle_image-wrapper .circle-main-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'tronix_small_image_CSS',
            [
                'label' => esc_html__( 'Small Image One', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
			'small_Image_height',
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
					'{{WRAPPER}} .circle_image-wrapper .circle_small_image_one > img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'small_Image_width',
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
					'{{WRAPPER}} .circle_image-wrapper .circle_small_image_one > img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'small_object',
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
                    '{{WRAPPER}} .circle_image-wrapper .circle_small_image_one > img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tronix_small_image_border',
				'selector' => '{{WRAPPER}} .circle_image-wrapper .circle_small_image_one > img',
			]
		);
		 $this->add_responsive_control(
            'small_image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .circle_image-wrapper .circle_small_image_one > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'small_image_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .circle_image-wrapper .circle_small_image_one' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'small_image_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .circle_image-wrapper .circle_small_image_one' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'tronix_small_image_CSS_two',
            [
                'label' => esc_html__( 'Small Image One', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
			'small_Image_height_two',
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
					'{{WRAPPER}} .circle_image-wrapper .circle_small_image_two > img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'small_Image_width_two',
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
					'{{WRAPPER}} .circle_image-wrapper .circle_small_image_two > img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
            'small_object_two',
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
                    '{{WRAPPER}} .circle_image-wrapper .circle_small_image_two > img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tronix_small_image_border_two',
				'selector' => '{{WRAPPER}} .circle_image-wrapper .circle_small_image_two > img',
			]
		);
		 $this->add_responsive_control(
            'small_image_border_radius_two',
            [
                'label' => esc_html__( 'Border Radius', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .circle_image-wrapper .circle_small_image_two > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'small_image_margin_two',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .circle_image-wrapper .circle_small_image_two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'small_image_padding_two',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .circle_image-wrapper .circle_small_image_two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
      
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
     
        ob_start();
        ?>
            <div class="circle_image-wrapper ">
                <div class="container">
                    <div class="circle-main-image">
                        <?php echo wp_get_attachment_image( $settings['image']['id'], 'full' ); ?>
                        <div class="circle_small_image_one jump">
                                <?php echo wp_get_attachment_image( $settings['image_two']['id'], 'full' ); ?>
                        </div>
                        <div class="circle_small_image_two jump">
                                <?php echo wp_get_attachment_image( $settings['image_three']['id'], 'full' ); ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new circle_image_wrapper );