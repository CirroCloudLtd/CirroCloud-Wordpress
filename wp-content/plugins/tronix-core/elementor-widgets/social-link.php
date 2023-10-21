<?php namespace Elementor;

class tronix_social_icons_Widget extends Widget_Base {

    public function get_name() {

        return 'tronix_social_icons';
    }

    public function get_title() {
        return esc_html__( 'Tronix Social Icons', 'tronixcore' );
    }

    public function get_icon() {

        return 'eicon-social-icons';
    }

    public function get_categories() {
        return ['tronixcore'];
    }

    protected function register_controls() {

        //Content tab start
        $this->start_controls_section(
            'tronix_social_icons_options',
            [
                'label' => esc_html__( 'tronix Social Icons', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
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
            'tronix_social_icons_title',
            [
                'label' => esc_html__( 'Title', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Follow Us:', 'tronixcore' ),
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'social_icon_label',
            [
                'label' => esc_html__( 'Label', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Facebook', 'tronixcore' ),
            ]
        );
        $repeater->add_control(
            'tronix_social_icon',
            [
                'label' => esc_html__( 'Icon', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-facebook',
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
                        'tronix_icon_link' => '',
                        'tronix_social_icons_latel' => '',
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
			]
		);

        $this->end_controls_section();
        $this->start_controls_section(
            'tronix_social_icon_CSS_options',
            [
                'label' => esc_html__( 'Social Icon CSS', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_CSS_align',
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
            'tronix_social_icon_tabs'
        );
        $this->start_controls_tab(
            'tronix_social_icon_tabs_title',
            [
                'label' => __( 'Title', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_title_c',
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
                'name' => 'tronix_social_icon_title_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .social-icon-label',
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_title_margin',
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
            'tronix_social_icon_title_padding',
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
                    '{{WRAPPER}} .tronix-social-icon-box ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_colorbg',
            [
                'label' => esc_html__( 'Background Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tronix-social-icon-box ul li a' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .tronix-social-icon-box ul li a' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-social-icon-box ul li a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'tronix_social_icon_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-social-icon-box ul li a',
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
                'name' => 'tronix_social_icon_shadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-social-icon-box ul li a',
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
                    '{{WRAPPER}} .tronix-social-icon-box ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-social-icon-box ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_social_icon_hcolorbg',
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
                'name' => 'tronix_social_icon_hborder',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-social-icon-box ul li a:hover',
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
                    '{{WRAPPER}} .tronix-social-icon-box ul li a:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'tronix_social_icon_hshadow',
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
            'tronix_map_tab',
            [
                'label' => __( 'Map Link Style', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'tronix_map_link_color',
            [
                'label' => esc_html__( 'Map Link Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .google-map-link a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tronix_map_link_color_hover',
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
                'name' => 'tronix_map_link_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .google-map-link a',
            ]
        );
        $this->add_responsive_control(
            'tronix_map_link_margin',
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
            'tronix_map_link_padding',
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
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        ob_start();
        if( $settings['enable_container'] == 'yes' ){
            $container = 'container';
        }else{
            $container = 'container-fluid';
        }
        ?>
        <div class="tronix-social-wrapper">
            <div class="<?php echo esc_attr($container)?>">
				<div class="tronix-social-icon-box">
					<?php if(!empty($settings['tronix_social_icons_title'])){
						echo '<h6 class="social-icon-label">'.esc_html($settings['tronix_social_icons_title']).'</h6>';
					} ?>
					<ul>
						<?php foreach($settings['tronix_icon'] as $social_icon){
							$target = $social_icon['tronix_icon_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $social_icon['tronix_icon_link']['nofollow'] ? ' rel="nofollow"' : '';    
							echo ' <li><a href="'.esc_url($social_icon['tronix_icon_link']['url']).'" title="'.esc_attr($social_icon['social_icon_label']).'" '. $target . $target . '>
									<i class="'.esc_attr($social_icon['tronix_social_icon']['value']).'"></i>
								</a></li>';
						} ?>
					</ul>
					<div class="google-map-link">
						<?php if ( ! empty( $settings['google_map_link']['url'] ) ) {
							$this->add_link_attributes( 'google_map_link', $settings['google_map_link'] );
						} ?>
						<a <?php echo $this->get_render_attribute_string( 'google_map_link' ); ?>> <?php echo esc_html($settings['google_map_link_title']) ?></a>
					</div>
				</div>
			</div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new tronix_social_icons_Widget );