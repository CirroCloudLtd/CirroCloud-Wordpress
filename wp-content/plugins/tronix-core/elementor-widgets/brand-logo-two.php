<?php namespace Elementor;

class tronix_brand_logo_two_Widget extends Widget_Base {

    public function get_name() {

        return 'tronix_brand_logo_two';
    }

    public function get_title() {
        return esc_html__( 'Tronix Brand Logo V2', 'tronixcore' );
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
            'brand_logo_options',
            [
                'label' => esc_html__( 'Brand Logo Two', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'enable_link',
			[
				'label'        => esc_html__( 'Enable URL', 'tronixcore' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'tronixcore' ),
				'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'dynamic'      => [
					'active' => true,
				],
			]
		);
		$repeater->add_control(
			'url',
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
				'condition'     => [
					'enable_link' => 'yes',
				],
				'dynamic'       => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'items',
			[
				'label'   => esc_html__( 'Logo List', 'tronixcore' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
					[
						'image' => '',
					],
				],
			]
		);
		$this->add_control(
            'enable_container',
            [
                'label'        => esc_html__( 'Enable Container', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
			'filter',
			[
				'label'      => esc_html__( 'Filter', 'tronixcore' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .content-image img' => 'filter: contrast({{SIZE}}%);',
					'{{WRAPPER}} .content-image img' => '-webkit-filter: contrast({{SIZE}}%);',
				],
			]
		);
		$this->add_control(
			'hfilter',
			[
				'label'      => esc_html__( 'Hover Filter', 'tronixcore' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .content-image:hover img' => 'filter: contrast({{SIZE}}%);',
					'{{WRAPPER}} .content-image:hover img' => '-webkit-filter: contrast({{SIZE}}%);',
				],
			]
		);
		$this->add_control(
            'desktop_col',
            [
                'label'     => __( 'Columns On Desktop', 'tronixcore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-xl-3',
                'options'   => [
                    'col-xl-12' => __( '1 Column', 'tronixcore' ),
                    'col-xl-6'  => __( '2 Column', 'tronixcore' ),
                    'col-xl-4'  => __( '3 Column', 'tronixcore' ),
                    'col-xl-3'  => __( '4 Column', 'tronixcore' ),
                    'col-xl-2'  => __( '6 Column', 'tronixcore' ),
                ],
            ]
        );

        $this->add_control(
            'laptop_col',
            [
                'label'     => __( 'Columns for Laptop', 'tronixcore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-lg-3',
                'options'   => [
                    'col-lg-12' => __( '1 Column', 'tronixcore' ),
                    'col-lg-6'  => __( '2 Column', 'tronixcore' ),
                    'col-lg-4'  => __( '3 Column', 'tronixcore' ),
                    'col-lg-3'  => __( '4 Column', 'tronixcore' ),
                    'col-lg-2'  => __( '6 Column', 'tronixcore' ),
                ],
            ]
        );

        $this->add_control(
            'tab_col',
            [
                'label'     => __( 'Columns On Tablet', 'tronixcore' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-md-6',
                'options'   => [
                    'col-md-12' => __( '1 Column', 'tronixcore' ),
                    'col-md-6'  => __( '2 Column', 'tronixcore' ),
                    'col-md-4'  => __( '3 Column', 'tronixcore' ),
                    'col-md-3'  => __( '4 Column', 'tronixcore' ),
                    'col-md-2'  => __( '6 Column', 'tronixcore' ),
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'box_css_options',
            [
                'label' => esc_html__( 'Box', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'more_options',
			[
				'label' => esc_html__( 'Main  Box Options', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'main_box_border',
				'selector' => '{{WRAPPER}} .tronix-brand-logo-wrapper-two',
			]
		);
		$this->add_responsive_control(
            'main_box_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-brand-logo-wrapper-two' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .single-client.image-switcher',
				'separator' => 'before',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
				'selectors'=> [
				   'selector' => '{{WRAPPER}} .single-client.image-switcher',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .single-client.image-switcher',
			]
		);
        $this->add_responsive_control(
            'box_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tronixcore' ),
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
                    '{{WRAPPER}} .single-client.image-switcher' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
					 '{{WRAPPER}} .single-client.image-switcher' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'box_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
					'{{WRAPPER}} .single-client.image-switcher ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
		$column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
		if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
        ?>
            <div class="tronix-brand-logo-wrapper-two">
				<div class="<?php echo esc_attr( $container ); ?>">
                    <div class="row">
						<?php foreach ( $settings['items'] as $item ):
						?>
						<div class="<?php echo esc_attr( $column ); ?>">
							<div class="single-client image-switcher">
								<div class="content-image">
									<?php echo wp_get_attachment_image( $item['image']['id'], 'full' );?>                                    
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new tronix_brand_logo_two_Widget );
