<?php namespace Elementor;

class tronix_skillabar_Widget extends Widget_Base {
    public function get_script_depends() {
         return [ 'counterup','appear' ];
    }
    public function get_name() {

        return 'tronix_Skillabar';
    }

    public function get_title() {
        return esc_html__( 'Tronix Skill Bar', 'tronixcore' );
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
            'skillbar_options',
            [
                'label' => esc_html__( 'Skill Bar', 'tronixcore' ),
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
        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'       => __('Title', 'tronixcore'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Business Security',
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'percent',
			[
				'label' => __( 'Percentage', 'tronixcore' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 80,
				],
			]
		);
		$this->add_control(
			'skills',
			[
				'label'       => __('Skill List', 'tronixcore'),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title'   => 'Business Security',
						'percent' => 65,
					],
                    [
						'title'   => 'Career Development',
						'percent' => 88,
					],
                    [
						'title'   => 'Business Inovation',
						'percent' => 90,
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'skill_box_css',
            [
                'label' => esc_html__( 'Progress Bar', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'box_width',
            [
                'label' => esc_html__( 'Width', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tronix-skills-wrapper .skillbar-item' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'alignment',
            [
                'label' => __( 'Alignment', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'tronixcore' ),
                        'icon' => 'eicon-long-arrow-left',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'tronixcore' ),
                        'icon' => 'eicon-long-arrow-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tronix-skills-wrapper .skillbar-item' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'number_align',
            [
                'label' => __( 'Number Alignment', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'tronixcore' ),
                        'icon' => 'eicon-long-arrow-left',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'tronixcore' ),
                        'icon' => 'eicon-long-arrow-right',
                    ],
                ],
                'toggle' => true,
                'default' => 'left',
                'selectors_dictionary' => [
                    'left'  => 'left: 0;right:auto',
                    'right' => 'right:0',
                ],
                'selectors' => [
                    '{{WRAPPER}} .skillbar .skill-percent-count-wrap' => '{{VALUE}}',
                ],
                'condition' => [
                    'alignment' => 'right',
                ],
            ]
        );
        $this->add_responsive_control(
            'height_box',
            [
                'label' => esc_html__( 'Box Height', 'tronixcore' ),
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
                    '{{WRAPPER}} .tronix-skills-wrapper .skillbar-item .skillbar' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'width_box',
            [
                'label' => esc_html__( 'Box Width', 'tronixcore' ),
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
                    '{{WRAPPER}} .tronix-skills-wrapper .skillbar-item .skillbar' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'box_bg',
                'label' => esc_html__( 'Background', 'tronixcore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .tronix-skills-wrapper .skillbar-item .skillbar',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-skills-wrapper .skillbar-item .skillbar',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-skills-wrapper .skillbar-item .skillbar',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
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
                    '{{WRAPPER}} .tronix-skills-wrapper .skillbar-item .skillbar' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
			'inner_Progress_bar',
			[
				'label' => esc_html__( 'Inner Progress Bar', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'inner_box_color',
			[
				'label' => esc_html__( 'Inner Box Color', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tronix-skills-wrapper .skillbar-item .skillbar .count-bar' => 'background-color: {{VALUE}}',
				],
			]
		);
        $this->add_responsive_control(
            'inner_box_radius',
            [
                'label' => esc_html__( 'Inner Border Radius', 'tronixcore' ),
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
                    '{{WRAPPER}} .tronix-skills-wrapper .skillbar-item .skillbar .count-bar' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .tronix-skills-wrapper .skillbar-item .skillbar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-skills-wrapper .skillbar-item .skillbar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'skill_content_css',
            [
                'label' => esc_html__( 'Content', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs(
                'skill_content_tab'
            );
                $this->start_controls_tab(
                    'skill_title_tab',
                    [
                        'label' => __( 'Title', 'tronixcore' ),
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'title_typo',
                        'label' => esc_html__( 'Typography', 'tronixcore' ),
                        'selector' => '{{WRAPPER}}  .skill-title',
                    ]
                );
                $this->add_responsive_control(
                    'title_color',
                    [
                        'label' => esc_html__( 'Title Color', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .skill-title' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'title_margin',
                    [
                        'label' => esc_html__( 'Margin', 'tronixcore' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .skill-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'title_padding',
                    [
                        'label' => esc_html__( 'Padding', 'tronixcore' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .skill-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->end_controls_tab();

                $this->start_controls_tab(
                    'skill_number_tab',
                    [
                        'label' => __( 'Number', 'tronixcore' ),
                    ]
                );
                $this->add_responsive_control(
                    'number_color',
                    [
                        'label' => esc_html__( 'Number Color', 'tronixcore' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .skill-percent-count-wrap' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_group_control(
                    \Elementor\Group_Control_Typography::get_type(),
                    [
                        'name' => 'number_tyoo',
                        'label' => esc_html__( 'Typography', 'tronixcore' ),
                        'selector' => '{{WRAPPER}} .skill-percent-count-wrap',
                    ]
                );
                $this->add_responsive_control(
                    'number_margin',
                    [
                        'label' => esc_html__( 'Margin', 'tronixcore' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .skill-percent-count-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                $this->add_responsive_control(
                    'number_padding',
                    [
                        'label' => esc_html__( 'Padding', 'tronixcore' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .skill-percent-count-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        <div class="tronix-skills-main-wrapper">
			<div class="<?php echo esc_attr($container)?>">
				<div class="tronix-skills-wrapper">
					 <?php if($settings['skills']) : ?>
						<?php foreach($settings['skills'] as $skill ) : ?>
							<div class="skillbar-item">
								<div class="skill-title"><?php echo esc_html($skill['title']);?></div>
								<div class="skillbar" data-percent="<?php echo esc_attr($skill['percent']['size']);?>%">
									<div class="skill-percent-count-wrap">
										<span class="skill-percent-count"><?php echo esc_html($skill['percent']['size']);?></span>%
									</div>
									<div class="count-bar"></div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
        </div>
		<script>
            (function ($) {
                "use strict";
                $(document).ready(function () {
                    $(".skillbar").each(function() {
                        $(this).appear(function() {
                            $(this).find(".count-bar").animate({
                                width:$(this).attr("data-percent")
                            },3000);
                        });
                    });

                    $(".skill-percent-count").counterUp({
                        delay: 10,
                        time: 3000
                    });
                });
            })(jQuery);
        </script>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new tronix_skillabar_Widget );