<?php namespace Elementor;

class contact_info_widget extends Widget_Base {

    public function get_name() {

        return 'contact_info';
    }

    public function get_title() {
        return esc_html__( 'Contact Info', 'tronixcore' );
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
            'eco_team_content',
            [
                'label' => esc_html__( 'Contact Info', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label'       => esc_html__( 'Title', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'Need Any Help?', 'tronixcore' ),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'content',
            [
                'label'   => esc_html__( 'Content', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'Need Any Help, Call Us 24/7 For Support', 'tronixcore' ),
                
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label'   => esc_html__( 'Icon', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'bi bi-envelope-fill',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
            'list_title',
            [
                'label'       => esc_html__( 'Title', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__( 'inside@tronix.com', 'tronixcore' ),
                'label_block' => true,
            ]
        );
      
       
       
      
        $this->add_control(
            'tronix_repeter_list',
            [
                'label'       => esc_html__( 'Repeater List', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
				'default' => [
					[
						'title' => esc_html__( 'inside@tronix.com', 'tronixcore' ),
						
					],
				],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->add_control(
			'enable_container',
			[
				'label' => esc_html__( 'Enable Container Full', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tronixcore' ),
				'label_off' => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->end_controls_section();

        //========================================//
        //========= SERVICE BOX style Start==========//
        //========================================//

        $this->start_controls_section(
            'tronix-box',
            [
                'label' => esc_html__( 'Box Sftyle', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
			'list_gap',
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
					'{{WRAPPER}} .contact-info-list' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
				'separator' => 'before',
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
					'{{WRAPPER}} .contact-info-box' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_responsive_control(
            'list-positon',
            [
                'label'     => __( 'Alignment', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'flex-start'   => [
                        'title' => __( 'Start', 'tronixcore' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'tronixcore' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'flex-end'  => [
                        'title' => __( 'End', 'tronixcore' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'center',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .contact-info-list ' => 'justify-content: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .contact-info-box',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .contact-info-box',
            ]
        );
        $this->add_responsive_control(
            'tronix-border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-info-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .contact-info-box',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .contact-info-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .contact-info-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .contact-info-title',
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info-title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .contact-info-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .contact-info-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .contact-info-subtitle',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-info-subtitle' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .contact-info-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .contact-info-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //==========================================//
        //======= SERVICE ICON STYLE START=========//
        //========================================//
        
        $this->start_controls_section(
            'icon_Style',
            [
                'label' => esc_html__( 'Icon Style', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_typo',
                'selector' => '{{WRAPPER}} .tronix-list-icon',
            ]
        );
        $this->add_responsive_control(
            'tronix-icon_color',
            [
                'label'     => esc_html__( 'Icon Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-list-icon' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .tronix-list-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-list-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    // 
		// ----------------List Style------------------
        // 

        $this->start_controls_section(
			'list_options',
			[
				'label' => esc_html__('List Style', 'tronixcore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'list_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .contact-info-subtitle',
            ]
        );
        $this->add_responsive_control(
            'list_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-info-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'list_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .contact-info-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'list_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .contact-info-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
           if( $settings['enable_container'] == 'yes' ){
            $container = 'container';
        }else{
            $container = 'container-Full';
        }
        ob_start();

        ?>
       <div class="tronix_list-wrapper">
            <div class="<?php echo esc_attr($container)?>">
                <div class="contact-info-box">
                    <div class="contact-info-section">
                        <h5 class="contact-info-title"><?php echo esc_html($settings['title']); ?> </h5>
                        <div class="contact-info-subtitle"><?php echo esc_html($settings['content']); ?> </div>
                    </div>
                    <?php foreach ( $settings['tronix_repeter_list'] as $item ): ?>
                        <div class="contact-info-list ">
                            <div class="contact-info-list-icon">
                                <?php  \Elementor\Icons_Manager::render_icon( $item['icon'], ['aria-hidden' => 'true'] ); ?>
                            </div>
                            <div class="contact-info-list-title"> <?php echo esc_html($item['list_title']); ?> </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    <?php
echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new contact_info_widget );

