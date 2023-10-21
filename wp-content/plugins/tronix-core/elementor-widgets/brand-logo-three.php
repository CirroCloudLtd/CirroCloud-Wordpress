<?php namespace Elementor;

class tronix_brand_title_Widget extends Widget_Base {

    public function get_name() {

        return 'tronix_brand_title';
    }

    public function get_title() {
        return esc_html__( 'Tronix Brand Title', 'tronixcore' );
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
                'label' => esc_html__( 'Brand Title', 'tronixcore' ),
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
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Get Our Service', 'textdomain' ),
				 'label_block' => true,
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
				'label'   => esc_html__( 'Title List', 'tronixcore' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
					[
						'image' => '',
					],
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
			'display',
			[
				'label'     => esc_html__( 'Display Item', 'tronixcore' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 1,
				'max'       => 30,
				'step'      => 1,
				'default'   => 5,
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
				'clsl_loop' => 'yes',

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
				'clsl_loop'  => 'yes',
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
        $this->add_responsive_control(
            'cbox_align',
            [
                'label' => __( 'Alignment', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'tronixcore' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'tronixcore' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'tronixcore' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tronix-brand-items' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'box_bg',
                'label' => esc_html__( 'Background', 'tronixcore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .tronix-brand-items',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-brand-items' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-brand-items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

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
				'selector' => '{{WRAPPER}} .tronix-brand-title',
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'       => esc_html__('Color', 'tronixcore'),
				'type'        => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tronix-brand-title' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .tronix-brand-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .tronix-brand-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $coloum ="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12";
        $dynamic_id = rand( 1241, 3256 );
			echo '
                <script>
                jQuery(document).ready(function($) {
                "use strict";
                $("#logo-slide-' . esc_attr( $dynamic_id ) . '").slick({
                slidesToShow:' . json_encode( $settings['display'] ) . ',
                slidesToScroll: 5,
                rtl: ' . json_encode( is_rtl() == 'yes' ? true : false ) . ',
                dots: ' . json_encode( $settings['clsl_dot'] == 'yes' ? true : false ) . ',
                arrows:  false,
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
                                slidesToShow: 3,
                                slidesToScroll: 3,
                            }
                        },
                        {
                        breakpoint: 991,
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
		
		if ( $settings['enable_container'] == 'yes' ) {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
        ?>
            <div class="tronix-brand-title-wrapper">
				<div class="<?php echo esc_attr( $container ); ?>">
                    <div class="row">
						<div class="tronix-brand-items" id="logo-slide-<?php echo esc_attr( $dynamic_id ); ?>">
							<?php foreach ( $settings['items'] as $item ): ?>
							<div class="<?php echo esc_attr( $coloum ); ?>">
								<?php if ( $item['enable_link'] == 'yes' ):
									$url      = $item['url']['url'];
									$target   = $item['url']['is_external'] ? ' target="_blank"' : '';
									$nofollow = $item['url']['nofollow'] ? ' rel="nofollow"' : '';
								?>
									<a href="<?php echo esc_url( $url ); ?>" <?php echo $target . $nofollow; ?>>
								<?php endif; ?>
									<h4 class="tronix-brand-title"> <?php echo $item['title']; ?> </h4>
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
Plugin::instance()->widgets_manager->register( new tronix_brand_title_Widget );