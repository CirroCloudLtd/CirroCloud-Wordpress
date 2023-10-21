<?php namespace Elementor;

class icon_box_two_Widget extends Widget_Base {

    public function get_name() {

        return 'icon_box_two';
    }

    public function get_title() {
        return esc_html__( 'Tronix Icon Box V2', 'tronixcore' );
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
            'icon_box_options',
            [
                'label' => esc_html__( 'Icon Box Two', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'select_style',
			[
				'label' => esc_html__( 'Select Style', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'' => esc_html__( 'Default', 'tronixcore' ),
					'one' => esc_html__( 'One', 'tronixcore' ),
					'two'  => esc_html__( 'Two', 'tronixcore' ),
				],
			]
		);
        $this->add_control(
            'icon',
            [
                'label'   => esc_html__( 'Icon', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fab fa-laravel',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label'   => esc_html__( 'Title', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Provide Skills Services', 'tronixcore' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'description',
            [
                'label'   => esc_html__( 'Description', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'enable_link',
            [
                'label'        => esc_html__( 'Enable Link', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'link',
            [
                'label'         => __( 'Link', 'tronixcore' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => __( 'https://your-link.com', 'tronixcore' ),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'condition' => [
                    'enable_link' => 'yes',
                ],
            ]
        );

      
        $this->add_control(
            'title_tag',
            [
                'label'   => __( 'Select Title Tag', 'tronixcore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'h6',
                'options' => [
                    'h1'   => __( 'H1', 'tronixcore' ),
                    'h2'   => __( 'H2', 'tronixcore' ),
                    'h3'   => __( 'H3', 'tronixcore' ),
                    'h4'   => __( 'H4', 'tronixcore' ),
                    'h5'   => __( 'H5', 'tronixcore' ),
                    'h6'   => __( 'H6', 'tronixcore' ),
                    'span' => __( 'Span', 'tronixcore' ),
                    'p'    => __( 'P', 'tronixcore' ),
                    'div'  => __( 'Div', 'tronixcore' ),
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
            'alignment',
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
                    '{{WRAPPER}} .icon-box-two-wrapper' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
			'reverge',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Row Reverse', 'ecofinecore' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ecofinecore' ),
						'icon' => 'eicon-long-arrow-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ecofinecore' ),
						'icon' => 'eicon-long-arrow-right',
					],
				],
				'default' => 'riht',
                'toggle'  => true,
                'selectors_dictionary' => [
                    'right'   => 'flex-direction:row',
                    'left'  => 'flex-direction:row-reverse',
                ],
                'selectors'            => [
                    '{{WRAPPER}} .icon-box-two-wrapper' => '{{VALUE}}',
                ],
			]
		);
		$this->add_responsive_control(
            'icon-positon',
            [
                'label'     => __( 'Alignment', 'ecofinecore' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'flex-start'   => [
                        'title' => __( 'Start', 'ecofinecore' ),
                        'icon'  => 'eicon-align-start-v',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'ecofinecore' ),
                        'icon'  => 'eicon-align-center-h',
                    ],
                    'flex-end'  => [
                        'title' => __( 'End', 'ecofinecore' ),
                        'icon'  => 'eicon-align-end-v',
                    ],
                ],
                'default'   => 'center',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-two-wrapper' => 'align-items: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .icon-box-two-wrapper',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .icon-box-two-wrapper',
            ]
        );

        $this->add_responsive_control(
            'box_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
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
                    '{{WRAPPER}} .icon-box-two-wrapper' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .icon-box-two-wrapper',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .icon-box-two-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .icon-box-two-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // 
        //  Icon Style Css
        // 
        $this->start_controls_section(
            'icon_css',
            [
                'label' => __( 'Icon Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'icon_size',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .tronix-icon-two,{{WRAPPER}} .tronix-icon-style-two',
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
                    '{{WRAPPER}} .tronix-icon-two' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tronix-icon-style-two' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
         $this->add_responsive_control(
            'min_icon_width',
            [
                'label'      => esc_html__( 'Min Width', 'tronixcore' ),
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
                    '{{WRAPPER}} .tronix-icon-two' => 'min-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tronix-icon-style-two' => 'min-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-icon-two' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tronix-icon-style-two' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-icon-two' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tronix-icon-style-two' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .tronix-icon-two,{{WRAPPER}} .tronix-icon-style-two',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__( 'icon Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-icon-two,{{WRAPPER}} .tronix-icon-style-two',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-icon-two,{{WRAPPER}} .tronix-icon-style-two',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-icon-two' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .tronix-icon-style-two' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-icon-two svg' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tronix-icon-style-two svg' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-icon-two svg' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .tronix-icon-style-two svg' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-icon-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .tronix-icon-style-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-icon-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .tronix-icon-style-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .icon-box-two-title,{{WRAPPER}} .icon-box-style-two-title',
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-box-two-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .icon-box-two-title a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .icon-box-style-two-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .icon-box-style-two-title a' => 'color: {{VALUE}};',
				],
			]
		);
        $this->add_responsive_control(
			'title_color_hover',
			[
				'label'       => esc_html__('Hover Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .icon-box-two-title a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .icon-box-style-two-title a:hover' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .icon-box-two-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .icon-box-style-two-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .icon-box-two-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .icon-box-style-two-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'label' => esc_html__( 'Description', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typo',
				'label' => __( 'Typography', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .icon-box-des',
			]
		);

		$this->add_responsive_control(
			'des_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-box-des' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'des_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .icon-box-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'des_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .icon-box-des' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
       
            <div class="icon-box-two-wrapper">
            <?php if( $settings['select_style'] == 'one' ): ?>
                <?php if ( !empty( $settings['icon'] ) ): ?>
                    <div class="tronix-icon-two">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], ['aria-hidden' => 'true'] );?>
                    </div>
                <?php endif;?>
                <div class="icon-box-two-content">
                    <?php if ( !empty( $settings['title'] ) ): ?>
                        <<?php echo esc_attr( $settings['title_tag'] ); ?> class="icon-box-two-title">
                            <?php if ( $settings['enable_link'] == 'yes' ):
                                if ( ! empty( $settings['link']['url'] ) ) {
                                    $this->add_link_attributes( 'link', $settings['link'] );
                                }?>
                                <a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
                            <?php endif;?>
                                <?php echo esc_html( $settings['title'] ); ?>
                            <?php if ( $settings['enable_link'] == 'yes' ) : ?> </a> <?php endif?>
                        </<?php echo esc_attr( $settings['title_tag'] ); ?>>
                    <?php endif;?>
                    <?php if ( !empty( $settings['description'] ) ): ?>
                        <div class="icon-box-des"> <?php echo esc_html( $settings['description'] ); ?> </div>
                    <?php endif;?>
                </div>
                <?php endif; ?>
                <?php if( $settings['select_style'] == 'two' ): ?>
                    <div class="tronix-icon-style-two">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], ['aria-hidden' => 'true'] );?>
                    </div>
                    <div class="icon-box-style-two-content">
                        <?php if ( !empty( $settings['title'] ) ): ?>
                            <<?php echo esc_attr( $settings['title_tag'] ); ?> class="icon-box-style-two-title">
                                <?php if ( $settings['enable_link'] == 'yes' ):
                                    if ( ! empty( $settings['link']['url'] ) ) {
                                        $this->add_link_attributes( 'link', $settings['link'] );
                                    }?>
                                    <a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
                                <?php endif;?>
                                    <?php echo esc_html( $settings['title'] ); ?>
                                <?php if ( $settings['enable_link'] == 'yes' ) : ?> </a> <?php endif?>
                            </<?php echo esc_attr( $settings['title_tag'] ); ?>>
                        <?php endif;?>
                        <?php if ( !empty( $settings['description'] ) ): ?>
                            <div class="icon-box-des"> <?php echo esc_html( $settings['description'] ); ?> </div>
                        <?php endif;?>
                    </div>
                <?php endif; ?>
            </div>
       
        <?php
echo ob_get_clean();

    }
}
Plugin::instance()->widgets_manager->register( new icon_box_two_Widget );