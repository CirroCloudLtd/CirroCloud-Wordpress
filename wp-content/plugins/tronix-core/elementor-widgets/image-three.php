<?php namespace Elementor;

class tronix_about_image_three extends Widget_Base {

    public function get_name() {

        return 'tronix_image_three';
    }

    public function get_title() {
        return esc_html__( 'Tronix Image Three', 'tronixcore' );
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
			'number',
			[
				'label'   => esc_html__( 'Number', 'tronixcore' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 999999999,
				'step'    => 1,
				'default' => 540,
			]
		);
		$this->add_control(
			'symble',
			[
				'label'   => esc_html__( 'Symble', 'tronixcore' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '+', 'tronixcore' ),
				'label_block' => esc_html__( '+', 'tronixcore' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'   => esc_html__( 'Title', 'tronixcore' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Years Of Experience', 'tronixcore' ),
                'label_block' => true,
				'dynamic' => [
					'active' => true,
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
                    '{{WRAPPER}} .image-three-wrapper' => 'text-align: {{VALUE}}',
                ],
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
					'{{WRAPPER}} .image-three-big-img > img' => 'max-height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .image-three-big-img > img' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .image-three-big-img > img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .image-three-big-img > img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tronix_image_border',
				'selector' => '{{WRAPPER}} .image-three-big-img > img',
			]
		);
		 $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .image-three-big-img > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .image-three-big-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .image-three-big-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'tronix_small_image_CSS',
            [
                'label' => esc_html__( 'Tronix Small image', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'tronix_small_image_CSS_aligment',
            [
                'type'                 => \Elementor\Controls_Manager::CHOOSE,
                'label'                => esc_html__( 'Postion', 'tronixcore' ),
                'options'              => [
                    'left'  => [
                        'title' => esc_html__( 'Left', 'tronixcore' ),
                        'icon'  => 'eicon-long-arrow-left',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'tronixcore' ),
                        'icon'  => 'eicon-long-arrow-right',
                    ],
                ],
                'toggle'               => true,
                'selectors_dictionary' => [
                    'left'  => 'left: -200px',
                    'right' => 'left:auto;right:-200px',
                ],
                'selectors'            => [
                    '{{WRAPPER}} .image-three-small-img' => '{{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
			'max_small_Image_height',
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
					'{{WRAPPER}} .image-three-big-img .image-three-small-img > img' => 'max-height: {{SIZE}}{{UNIT}};',
				],
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
					'{{WRAPPER}} .image-three-big-img .image-three-small-img > img' => 'height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .image-three-big-img .image-three-small-img > img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .image-three-big-img .image-three-small-img > img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'tronix_small_image_border',
				'selector' => '{{WRAPPER}} .image-three-big-img .image-three-small-img > img',
			]
		);
		 $this->add_responsive_control(
            'small_image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .image-three-big-img .image-three-small-img > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .image-three-big-img .image-three-small-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .image-three-big-img .image-three-small-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'box_css',
            [
                'label' => esc_html__( 'Box Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'box_width',
            [
                'label'      => esc_html__( 'Box Width', 'tronixcore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 500,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .experience-count-process' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'box-alignment',
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
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'left',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .experience-count-process' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .experience-count-process',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .experience-count-process',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .experience-count-process' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .experience-count-process',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .experience-count-process' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .experience-count-process' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'counter_number',
			[
				'label' => esc_html__( 'Number CSS', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'number_color',
			[
				'label'     => esc_html__( 'Number Color', 'tronixcore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .experience-counter.timer' => 'color: {{VALUE}}',
					'{{WRAPPER}} .experienc-counter-numner span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'number_title_typo',
				'label'    => esc_html__( 'Title Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .experience-counter.timer',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'number_symble_typo',
				'label'    => esc_html__( 'Symbol Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .experienc-counter-numner span',
			]
		);
		$this->add_responsive_control(
			'number_margin',
			[
				'label'      => esc_html__( 'Number Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .experience-counter.timer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .experienc-counter-numner span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'number_padding',
			[
				'label'      => esc_html__( 'Number Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .experience-counter.timer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .experienc-counter-numner span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'counter_title',
			[
				'label' => esc_html__( 'Title CSS', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'tronixcore' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .experienc-counter-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typo',
				'label'    => esc_html__( 'Title Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .experienc-counter-title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Title Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .experienc-counter-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Title Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .experienc-counter-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
      
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        echo '
        <script>
			jQuery(document).ready(function($) {
				 "use strict";
				$(".timer").countTo();
				$(".experience-count-process").appear(function() {
				    $(".timer").countTo();
				}, {
				    accY: -200
				});
			});
		</script>
        ';
        ob_start();
        ?>
            <div class="image-three-wrapper ">
                <div class="image-three-big-img">
                    <?php echo wp_get_attachment_image( $settings['image']['id'], 'full' ); ?>
                    <div class="image-three-small-img">
                            <?php echo wp_get_attachment_image( $settings['image_two']['id'], 'full' ); ?>
                    </div>
                    <div class="experience-count-process">
                    <?php if ( !empty( $settings['number'] ) ): ?>
                        <div class="experienc-counter-numner">
                            <h2 class="experience-counter timer" data-to="<?php echo esc_attr( $settings['number'] ); ?>" data-speed="5000">
                                <?php echo esc_html( $settings['number'] ); ?>
                            </h2>
                            <?php if ( !empty( $settings['symble'] ) ): ?>
                                <span><?php echo esc_html( $settings['symble'] ); ?></span>
                            <?php endif;?>
                        </div>
                    <?php endif;?>
                        <?php if ( !empty( $settings['title'] ) ): ?>
                        <h6 class="experienc-counter-title"><?php echo esc_html( $settings['title'] ); ?></h6>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new tronix_about_image_three );