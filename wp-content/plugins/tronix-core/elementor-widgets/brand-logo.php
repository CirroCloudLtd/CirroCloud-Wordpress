<?php namespace Elementor;

class tronix_brand_logo_Widget extends Widget_Base {

    public function get_name() {

        return 'tronix_brand_logo';
    }

    public function get_title() {
        return esc_html__( 'Tronix Brand Logo', 'tronixcore' );
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
                'label' => esc_html__( 'Brand Logo', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
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
            'select_style',
            [
                'label'        => esc_html__( 'Select Style', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'One', 'tronixcore' ),
                'label_off'    => esc_html__( 'Two', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image',
			[
				'label'   => __( 'Choose Logo', 'tronixcore' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
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
					'{{WRAPPER}} .tronix-brand-item img' => 'filter: contrast({{SIZE}}%);',
					'{{WRAPPER}} .tronix-brand-item img' => '-webkit-filter: contrast({{SIZE}}%);',
					'{{WRAPPER}} .tronix-brand-item-style-two img' => 'filter: contrast({{SIZE}}%);',
					'{{WRAPPER}} .tronix-brand-item-style-two img' => '-webkit-filter: contrast({{SIZE}}%);',
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
					'{{WRAPPER}} .tronix-brand-item:hover img' => 'filter: contrast({{SIZE}}%);',
					'{{WRAPPER}} .tronix-brand-item:hover img' => '-webkit-filter: contrast({{SIZE}}%);',
					'{{WRAPPER}} .tronix-brand-item-style-two:hover img' => 'filter: contrast({{SIZE}}%);',
					'{{WRAPPER}} .tronix-brand-item-style-two:hover img' => '-webkit-filter: contrast({{SIZE}}%);',
				],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
			'slide_option',
			[
				'label' => esc_html__( 'Slide Options', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'slide_enable',
			[
				'label'        => esc_html__( 'Enable Slide', 'tronixcore' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'tronixcore' ),
				'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);
		$this->add_control(
			'display',
			[
				'label'     => esc_html__( 'Display Item', 'tronixcore' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 1,
				'max'       => 30,
				'step'      => 1,
				'default'   => 5,
				'condition' => [
					'slide_enable' => 'yes',
				],
			]
		);
		$this->add_control(
			'clsl_loop',
			[
				'label'        => esc_html__( 'Enable Loop ', 'tronixcore' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'tronixcore' ),
				'label_off'    => esc_html__( 'Off', 'tronixcore' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'slide_enable' => 'yes',
				],
			]
		);
		$this->add_control(
			'clsl_speed',
			[
				'label'     => esc_html__( 'Slide Speed', 'tronixcore' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 500,
				'max'       => 8000,
				'step'      => 10,
				'default'   => 4000,
				'condition' => array(
					'slide_enable' => 'yes',
					'clsl_loop'                => 'yes',

				),
			]
		);
		$this->add_control(
			'clsl_aloop',
			[
				'label'        => esc_html__( 'Enable Auto Loop ', 'tronixcore' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'tronixcore' ),
				'label_off'    => esc_html__( 'Off', 'tronixcore' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'slide_enable' => 'yes',
					'clsl_loop'                => 'yes',
				],
			]
		);
		$this->add_control(
			'clsl_aspeed',
			[
				'label'     => esc_html__( 'Slide auto Speed', 'tronixcore' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 500,
				'max'       => 8000,
				'step'      => 50,
				'default'   => 3000,
				'condition' => array(
					'clsl_aloop'               => 'yes',
					'clsl_loop'                => 'yes',
					'slide_enable' => 'yes',
				),
			]
		);
		$this->add_control(
			'clsl_dot',
			[
				'label'        => esc_html__( 'Enable Dots ', 'tronixcore' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'tronixcore' ),
				'label_off'    => esc_html__( 'Off', 'tronixcore' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'slide_enable' => 'yes',
				],
			]
		);
		$this->add_control(
			'clsl_nav',
			[
				'label'        => esc_html__( 'Enable Nav ', 'tronixcore' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'On', 'tronixcore' ),
				'label_off'    => esc_html__( 'Off', 'tronixcore' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'slide_enable' => 'yes',
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
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tronix-brand-logo-wrapper',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
				'selectors'=> [
				   'selector' => '{{WRAPPER}} .tronix-brand-logo-wrapper',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .tronix-brand-logo-wrapper',
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
                    '{{WRAPPER}} .tronix-brand-logo-wrapper' => 'border-radius: {{SIZE}}{{UNIT}};',
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
					 '{{WRAPPER}} .tronix-brand-logo-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tronix-brand-logo-wrapper ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'brand_CSS_options',
			[
				'label' => esc_html__( 'Item', 'tronixcore' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'brand_CSS_item_shadow',
				'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .tronix-brand-item,{{WRAPPER}} .tronix-brand-item-style-two',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'brand_CSS_item_border',
				'label'    => esc_html__( 'Border', 'tronixcore' ),
				'selector' => '{{WRAPPER}} .tronix-brand-item,{{WRAPPER}} .tronix-brand-item-style-two',
			]
		);

		$this->add_responsive_control(
			'brand_CSS_item_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .tronix-brand-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tronix-brand-item-style-two' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'brand_CSS_item_margin',
			[
				'label'      => esc_html__( 'Margin', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .tronix-brand-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tronix-brand-item-style-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'brand_CSS_item_padding',
			[
				'label'      => esc_html__( 'Padding', 'tronixcore' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .tronix-brand-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tronix-brand-item-style-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $dynamic_id = rand( 1241, 3256 );
		if ( $settings['slide_enable'] == 'yes' ) {
			$coloum ="";
			$noslide = 'enable-slide';
			echo '
                <script>
                jQuery(document).ready(function($) {
                "use strict";
                $("#logo-slide-' . esc_attr( $dynamic_id ) . '").slick({
                slidesToShow:' . json_encode( $settings['display'] ) . ',
                slidesToScroll: 5,
                rtl: ' . json_encode( is_rtl() == 'yes' ? true : false ) . ',
                dots: ' . json_encode( $settings['clsl_dot'] == 'yes' ? true : false ) . ',
                arrows: ' . json_encode( $settings['clsl_nav'] == 'yes' ? true : false ) . ',
                infinite: ' . json_encode( $settings['clsl_loop'] == 'yes' ? true : false ) . ',
                autoplay: ' . json_encode( $settings['clsl_aloop'] == 'yes' ? true : false ) . ',';
			if ( $settings['clsl_loop'] == 'yes' ) {
				echo 'speed: ' . esc_attr( $settings['clsl_speed'] ) . ',';
			}
			if ( $settings['clsl_aloop'] == 'yes' ) {
				echo 'autoplaySpeed: ' . esc_attr( $settings['clsl_aspeed'] ) . ',';
			}
			echo '
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 4,
                            }
                        },

                        {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            }
                        },

                        {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                            }
                        },

                        {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        </script>';
		} else {
			$noslide = 'no-slide';
            $coloum ="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12";
		}
		if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container-fluid';
        } else {
            $container = 'container';
        }
		if ( $settings['select_style'] == 'yes' ) {
            $style = 'tronix-brand-item';
        } else {
            $style = 'tronix-brand-item-style-two';
        }
        ob_start();
        ?>
            <div class="tronix-brand-logo-wrapper">
				<div class="<?php echo esc_attr( $container ); ?>">
                    <div class="row">
						<div class="tronix-brand-items <?php echo esc_attr( $noslide ); ?>" id="logo-slide-<?php echo esc_attr( $dynamic_id ); ?>">
							<?php foreach ( $settings['items'] as $item ):
								$img_src   = $item['image']['url'];
								$img_alt   = get_post_meta( $item['image']['id'], '_wp_attachment_image_alt', true );
								$img_title = get_the_title( $item['image']['id'] );
							?>
								<div class="<?php echo esc_attr( $style ); ?> <?php echo esc_attr( $coloum ); ?>">
									<?php if ( $item['enable_link'] == 'yes' ):
										$url      = $item['url']['url'];
										$target   = $item['url']['is_external'] ? ' target="_blank"' : '';
										$nofollow = $item['url']['nofollow'] ? ' rel="nofollow"' : '';
									?>
										<a href="<?php echo esc_url( $url ); ?>" <?php echo $target . $nofollow; ?>>
									<?php endif; ?>
										<img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" title="<?php echo esc_attr( $img_title ); ?>">
									<?php if ( $item['enable_link'] == 'yes' ): ?>
										</a>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new tronix_brand_logo_Widget );