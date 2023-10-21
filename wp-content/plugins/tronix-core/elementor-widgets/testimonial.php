<?php namespace Elementor;

class testimonial__Widget extends Widget_Base {

    public function get_name() {

        return 'tronix_testimonial';
    }

    public function get_title() {
        return esc_html__( 'Tronix Testimonial V1', 'tronixcore' );
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
            'Tronix_title_options',
            [
                'label' => esc_html__( 'Tronix Testomonial', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
       
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
            'name',
            [
                'label'       => esc_html__( 'Name', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'Marvin McKinney', 'tronixcore' ),
                'label_block' => true,
            ]
        );
     

        $repeater->add_control(
            'designation',
            [
                'label'       => esc_html__( 'Desiganation', 'tronixcore' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__( 'CFO', 'tronixcore' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Tronixlogy is crucial for our understanding of the natural world, and is bTronixming increasingly important as human activities, such as pollution, deforestation, and climate change, have led to a decline.' , 'tronixcore' ),
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
						'name' => esc_html__( 'Manaf Hasan', 'tronixcore' ),
						'designation' => esc_html__( 'CFO/Founder', 'tronixcore' ),
					],
                    [
						'name' => esc_html__( 'Manaf Hasan', 'tronixcore' ),
						'designation' => esc_html__( 'CFO/Founder', 'tronixcore' ),
					],
				],
                'title_field' => '{{{ name }}}',
            ]
        );
     
        $this->end_controls_section();
        $this->start_controls_section(
			'content_section',
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
            'desktop_col',
            [
                'label' => esc_html__( 'Columns On Desktop', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-xl-6',
                'options' => [
                    'col-xl-12'  => esc_html__( '1 Column', 'tronixcore' ),
                    'col-xl-6'  => esc_html__( '2 Column', 'tronixcore' ),
                    'col-xl-4'  => esc_html__( '3 Column', 'tronixcore' ),
                    'col-xl-3'  => esc_html__( '4 Column', 'tronixcore' ),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ipadpro_col',
            [
                'label' => esc_html__( 'Columns On Ipad Pro', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-lg-6',
                'options' => [
                    'col-lg-12'  => esc_html__( '1 Column', 'tronixcore' ),
                    'col-lg-6'  => esc_html__( '2 Column', 'tronixcore' ),
                    'col-lg-4'  => esc_html__( '3 Column', 'tronixcore' ),
                    'col-lg-3'  => esc_html__( '4 Column', 'tronixcore' ),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'tab_col',
            [
                'label' => esc_html__( 'Columns On Tablet', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-md-12',
                'options' => [
                    'col-md-12'  => esc_html__( '1 Column', 'tronixcore' ),
                    'col-md-6'  => esc_html__( '2 Column', 'tronixcore' ),
                    'col-md-4'  => esc_html__( '3 Column', 'tronixcore' ),
                    'col-md-3'  => esc_html__( '4 Column', 'tronixcore' ),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->add_control(
			'enable_slide',
			[
				'label' => esc_html__( 'Enable Slide', 'tronixcore' ),
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
                'default'      => 'no',
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'Tronix_enable_dots',
            [
                'label'        => esc_html__( 'Enable Dots ', 'tronixcore' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'On', 'tronixcore' ),
                'label_off'    => esc_html__( 'Off', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition' => [
                    'enable_slide' => 'yes',
                ],

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
                'condition' => [
                    'enable_slide' => 'yes',
                ],
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
                'default' => 2,
                'condition' => [
                    'enable_slide' => 'yes',
                ],
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
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        //=================================================//
        //========= TESTIMONIAL BOX STYLE START===========//
        //===============================================//

        $this->start_controls_section(
            'box_tab_style',
            [
                'label' => esc_html__( 'Box Style', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'normal_box_tabs'
        );
        $this->start_controls_tab(
            'normal_box_tab',
            [
                'label' => esc_html__( 'Normal', 'tronixcore' ),
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
					'{{WRAPPER}} .testimonial-item-box' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial-item-box ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-item-box',
            ]
        );
        $this->add_responsive_control(
            'box_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-item-box',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-item-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'box_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds_hover',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial-item-box:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow_hover',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-item-box:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border_hover',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-item-box:hover',
            ]
        );

        $this->add_responsive_control(
            'border_radius_hover',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // 
        // ========== TESTIMONIAL Info Box ===========
        // 

        $this->start_controls_section(
			'testimonial_info_box',
			[
				'label' => esc_html__( 'Testimonial Info Box', 'tronixcore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_responsive_control(
			'content_text_align',
			[
				'label'       => esc_html__('Bottom Content Align', 'tronixcore'),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'flex-start' => [
						'title' => __('Left', 'tronixcore'),
						'icon'  => 'eicon-text-align-left',
					],

					'center' => [
						'title' => __('Center', 'tronixcore'),
						'icon'  => 'eicon-text-align-center',
					],

					'flex-end' => [
						'title' => __('Right', 'tronixcore'),
						'icon'  => 'eicon-text-align-right',
					],
				],

				'devices' => ['desktop', 'tablet', 'mobile'],
				'selectors' => [
					'{{WRAPPER}} .testimonial-info' => 'justify-content: {{VALUE}};',
				],

			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'info_box_backgrounds',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial-info ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'info_box_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-info',
            ]
        );
        $this->add_responsive_control(
            'info_box_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'info_box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-info',
            ]
        );
        $this->add_responsive_control(
            'info_box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'info_box_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        // 
        // ========== Testimonial Content ===========
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
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-info .image-wrap' => 'height: {{SIZE}}{{UNIT}};',
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
						'max' => 200,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-info .image-wrap' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-info .image-wrap' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .testimonial-info .image-wrap img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-info .image-wrap img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-info .image-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-info .image-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        // 
        // ========== Testimonial Content ===========
        // 

        $this->start_controls_section(
			'testi_content',
			[
				'label' => esc_html__( 'Content', 'tronixcore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->start_controls_tabs(
            'testi_content_tabs'
        );
        $this->start_controls_tab(
            'testi_name_tab',
            [
                'label' => esc_html__( 'Name', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testi_name_typo',
                'selector' => '{{WRAPPER}} .testimonial-name',
            ]
        );
        $this->add_responsive_control(
            'testi_name_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_name_Margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_name_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'testi_designation_tab',
            [
                'label' => esc_html__( 'Designation', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testi_designation_typo',
                'selector' => '{{WRAPPER}} .testimonial-designation',
            ]
        );
        $this->add_responsive_control(
            'testi_designation_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-designation' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'testi_designation_Margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_designation_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        
        //
        //=========== CONTENT STYLE START===========//
        //

        $this->start_controls_section(
            'description_Style',
            [
                'label' => esc_html__( ' Description', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
      
      
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testi_des_typo',
                'selector' => '{{WRAPPER}} .testimonial-item-content',
            ]
        );
        $this->add_responsive_control(
            'testi_des_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item-content' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-item-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_des_Margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_des_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //
        //=========== Dote STYLE START===========//
        //

        $this->start_controls_section(
			'dote_style',
			[
				'label' => esc_html__( 'Dote Style', 'tronixcore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Tronix_enable_dots' => 'yes',
                ],
			]
		);
        $this->add_responsive_control(
            'dode_background_color',
            [
                'label'     => esc_html__( 'Dote Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'dote_active_color',
            [
                'label'     => esc_html__( 'Active Dote Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li.slick-active button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'dote_border',
				'selector' => '{{WRAPPER}} .slick-dots li',
			]
		);
       
        $this->add_responsive_control(
            'dote_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-wrapper-one .slick-dots li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonial-wrapper-one .slick-dots li button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
		$this->add_responsive_control(
            'dote_Margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-wrapper-one .slick-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dote_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-wrapper-one .slick-dots li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //
        //=========== Arrow STYLE START===========//
        //

        $this->start_controls_section(
			'testi_arrow_content',
			[
				'label' => esc_html__( 'Arrow Style', 'tronixcore' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'Tronix_enable_arrows' => 'yes',
                ],
			]
		);
        $this->add_responsive_control(
            'arrow_height',
            [
                'label'      => esc_html__( 'Height', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-wrapper-one .slick-arrow' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_width',
            [
                'label'      => esc_html__( 'width', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 150,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-wrapper-one .slick-arrow' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'arrow_typography',
				'selector' => '{{WRAPPER}} .testimonial-wrapper-one .slick-arrow',
			]
		);
		$this->add_responsive_control(
            'arrow_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-wrapper-one .slick-arrow' => 'color: {{VALUE}}',
                ],
            ]
        );
		$this->add_responsive_control(
            'arrow_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-wrapper-one .slick-arrow:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
			'arrow_background_options',
			[
				'label' => esc_html__( 'Background Options', 'tronixcore' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_responsive_control(
            'arrow_background',
            [
                'label'     => esc_html__( 'Background Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-wrapper-one .slick-arrow' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_background_hover',
            [
                'label'     => esc_html__( 'Background Hover Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-wrapper-one .slick-arrow:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'arrow_border',
				'selector' => '{{WRAPPER}} .testimonial-wrapper-one .slick-arrow',
			]
		);

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-wrapper-one .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        ); 
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
        if($settings['enable_slide'] == 'yes' ){
            $row = 'no-row';
            $col = 'testmonial-slide-item';
            $box = 'testimonial-slider';
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
                        dots: <?php  echo json_encode($settings['Tronix_enable_dots'] == 'yes' ? true : false);?>,
                        slidesToShow: <?php echo json_encode($settings['slid_show_item']); ?>,
                        slidesToScroll: 1,
                        cssEase: 'linear',
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
            <?php 
        }else{
            $box = '';
            $row = 'row';
            $col =  'col-12 col-sm-12 '.$settings['desktop_col'] . ' ' . $settings['ipadpro_col'] . ' ' . $settings['tab_col'].'';
        }
        ?>
        <div class="testimonial-wrapper-one">
            <div class="<?php echo esc_attr( $container ); ?>">
                <div class="<?php echo esc_attr($row); ?>" id="testimonial-<?php echo esc_attr($unique_id); ?>">
                    <?php foreach($settings['Tronix_repeater_list'] as $item) :?>
                        <div class="<?php echo esc_attr($col); ?>">
                            <div class="testimonial-item-box <?php echo esc_attr($box); ?>">
                                <div class="testimonial-item-content">
                                    <?php echo wp_kses_post( $item['description'] ); ?>
                                </div>  
                                <div class="testimonial-info">                                   
                                    <div class="image-wrap">                                    
                                        <?php echo wp_get_attachment_image( $item['image']['id'], 'full' ); ?>                                               
                                    </div> 
                                    <div class="testimonial-information">
                                        <h5 class="testimonial-name"><?php echo esc_html( $item['name'] ); ?></h5>
                                        <span class="testimonial-designation"> <?php echo esc_html( $item['designation'] ); ?></span>                 
                                    </div>                                      
                                </div>                   
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new testimonial__Widget );