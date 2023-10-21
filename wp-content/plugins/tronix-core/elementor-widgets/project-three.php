<?php namespace Elementor;

class project_three_widget extends Widget_Base {

    public function get_name() {

        return 'project_three';
    }

    public function get_title() {
        return esc_html__( 'Tronix project V3', 'tronixcore' );
    }

    public function get_icon() {

        return 'eicon-shape';
    }

    public function get_categories() {
        return ['tronixcore'];
    }


    protected function register_controls() {
        $options = array();
        $args = array(
            'hide_empty' => false,
        );
        $categories = get_categories( $args );
        foreach ( $categories as $key => $category ) {
            $options[$category->term_id] = $category->name;
        }
      
        $this->start_controls_section(
            'project_content_section',
            [
                'label' => esc_html__( 'Necessary Option', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'item_show',
            [
                'label'   => esc_html__( 'Disply Items', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 4,
            ]
        );
        $this->add_control(
            'enable_cat',
            [
                'label'        => esc_html__( 'Post By Category', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'post_cat',
            [
                'label'     => __( 'Select Categoris', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::SELECT2,
                'multiple'  => true,
                'options'   => $options,
                'condition' => [
                    'enable_cat' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'title_lanth',
            [
                'label'   => esc_html__( 'Title Lanth ', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 30,
                'step'    => 1,
                'default' => 6,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'   => esc_html__( 'Order Type', 'tronixcore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'          => esc_html__( 'None', 'tronixcore' ),
                    'ID'            => esc_html__( 'ID', 'tronixcore' ),
                    'date'          => esc_html__( 'Date', 'tronixcore' ),
                    'name'          => esc_html__( 'Name', 'tronixcore' ),
                    'title'         => esc_html__( 'Title', 'tronixcore' ),
                    'comment_count' => esc_html__( 'Comment count', 'tronixcore' ),
                    'rand'          => esc_html__( 'Random', 'tronixcore' ),
                ],
            ]
        );
        $this->add_responsive_control(
            'order',
            [
                'label'   => esc_html__( 'Order', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC'  => esc_html__( 'ASC', 'tronixcore' ),
                    'DESE' => esc_html__( 'DESE', 'tronixcore' ),
                ],
            ]
        );
        $this->add_control(
            'pagination',
            [
                'label'        => esc_html__( 'Show Navication', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        
        $this->end_controls_section();
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Slider Options', 'tronixcore' ),
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
                'default' => 'col-xl-3',
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
                'default' => 'col-lg-3',
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
                'default' => 'col-md-6',
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
				'default' => 'no',
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
                'max' => 6,
                'step' => 1,
                'default' => 4,
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

        //===========================================//
        //========= PROJECT BOX STYLE START ========//
        //=========================================//
    
        $this->start_controls_section(
            'box_style',
            [
                'label' => esc_html__( 'Box Style', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .tronix-project-three-box' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .tronix-project-three-box',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-project-three-box',
            ]
        );
        $this->add_responsive_control(
            'team_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-project-three-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-project-three-box',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-project-three-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-project-three-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

           // ===============================================
        // =========== IMAGE STYLE CSS ===================
        // ===============================================

        $this->start_controls_section(
            'image_style',
            [
                'label' => esc_html__( 'Image Style', 'tronixcore' ),
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
						'max' => 1000,
						'step' =>1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-project-three-box img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
		$this->add_responsive_control(
            'min_image_height',
            [
                'label'      => esc_html__( 'Min Height', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' =>1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-project-three-box img' => 'min-height: {{SIZE}}{{UNIT}};',
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
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-project-three-box img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-project-three-box img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .tronix-project-three-box img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .tronix-project-three-box img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-project-three-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .tronix-project-three-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ===================================================
        // ============== CONTENT STYLE ======================
        // ===================================================

        $this->start_controls_section(
            'content_tab_style',
            [
                'label' => esc_html__( 'Content Style', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs( 'tronix_Content_tabs' );
        $this->start_controls_tab(  
            'services_title_normal_tab',
            [
                'label' => esc_html__( 'Title', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'ptitle_typography',
                'selector' => '{{WRAPPER}} .project-three-title',
            ]
        );
        $this->add_responsive_control(
            'ptitle_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-three-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ptitle_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-three-title a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ptitle_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-three-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ptitle_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-three-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        // ===================== Category STYLE====================

        $this->start_controls_tab(  
            'category_tab ',
            [
                'label' => esc_html__( 'Category', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'cat_typography',
                'selector' => '{{WRAPPER}} .project-three-category ul li a',
            ]
        );

        $this->add_responsive_control(
            'cat_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-three-category ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_color_h',
            [
                'label'     => esc_html__( 'Hover Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-three-category ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-three-category ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-three-category ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        
		 // *********************************************************
        //                Icon Style Css
        // *********************************************************

        $this->start_controls_section(
            'icon_css',
            [
                'label' => __( 'Icon Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'icon_tabs'
        );
        $this->start_controls_tab(
            'icon_tab_normal',
            [
                'label' => __( 'Normal', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_typography',
                'selector' => '{{WRAPPER}} .project-three-icon a',
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
                    '{{WRAPPER}} .project-three-icon a' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .project-three-icon a' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .project-three-icon a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-three-icon a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .project-three-icon a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__( 'icon Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .project-three-icon a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .project-three-icon a',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-three-icon a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .project-three-icon a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .project-three-icon a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'icon_tab_hover',
            [
                'label' => __( 'Hover', 'tronixcore' ),
            ]
        );
        $this->add_responsive_control(
            'icon_hcolor',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-three-icon a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_hbg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .project-three-icon a:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_hshadow',
                'label'    => esc_html__( 'icon Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .project-three-icon a:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_hborder',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .project-three-icon a:hover',
            ]
        );
        $this->add_responsive_control(
            'icon_hradius',
            [
                'label'      => esc_html__( 'Border Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-three-icon a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        if( $settings['enable_container'] == 'yes' ){
            $container = 'container';
        }else{
            $container = 'container-fluid';
        } 
        $unique_id = rand( 2585, 8241 );
        if($settings['enable_slide'] == 'yes' ){
            $column = 'project-slide-item';
            $slider = 'slide'; ?>
            
            <script>
            jQuery(document).ready(function($) { 
                "use strict";
                $('#project-<?php echo esc_attr($unique_id); ?>').slick({
                    infinite: true,
                    rtl: <?php  echo json_encode( is_rtl() == 'yes' ? true : false);?>,
                    speed:<?php echo json_encode($settings['Tronix_slider_speed']);?>,
                    autoplay:<?php echo json_encode($settings['enable_slider_auto_loop'] == 'yes' ? true : false );?>,
                    arrows: false,
                    dots: false,
                    slidesToShow: <?php echo json_encode($settings['slid_show_item']); ?>,
                    slidesToScroll: 1,
                    cssEase: 'linear',
                    prevArrow: $(".slider-prev"),
                     nextArrow: $(".slider-next"),
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 3,
                                arrows: false,
                            }
                        },
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow:2,
                                arrows: false,
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow:1,
                                arrows: false,
                            }
                        }
                    ]
                });
            });
        </script>
        <?php
        }else{
            $slider = '';
            $column = $settings['desktop_col'] . ' ' . $settings['ipadpro_col'] . ' ' . $settings['tab_col'];
        } 
        ?>

   
  
 <?php
        global $post;
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        if ( $settings['enable_cat'] == 'yes' && !empty( $settings['post_cat'] ) ) {
            $p = new \WP_Query( array(
                'posts_per_page' => esc_attr( $settings['item_show'] ),
                'post_type'      => 'tronix_project',
                'paged'          => $paged,
                'order'          => esc_attr( $settings['orderby'] ),
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => $settings['post_cat'],
                    ),
                ),
            ) );
        } else {
            $p = new \WP_Query( array(
                'posts_per_page' => esc_attr( $settings['item_show'] ),
                'post_type'      => 'tronix_project',
                'paged'          => $paged,
                'orderby'        => esc_attr( $settings['orderby'] ),
                'order'          => esc_attr( $settings['order'] ),
            ) );
        }
        ob_start();
        ?>
        <div class="tronix-project-wrapper">
            <div class="<?php echo esc_attr( $container ); ?>">
                <div class="row" id="project-<?php echo esc_attr($unique_id); ?>">
                    <?php while ( $p->have_posts() ): $p->the_post();?>
                        <div class="<?php echo esc_attr($column); ?> ">
                            <div class="tronix-project-three-box <?php echo esc_attr($slider); ?>">
                                <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                                <div class="project-three-content-area">
                                    <div class="project-three-item">
                                        <h5 class="project-three-title"> <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $settings['title_lanth'] ); ?> </a></h5>
                                        <?php $project_catagorys = get_the_terms( get_the_ID(), 'tronix_project_cat' );
                                        if ( $project_catagorys && ! is_wp_error( $project_catagorys ) ) : ?>
                                            <div class="project-three-category">
                                                <ul>
                                                <?php 
                                                    foreach($project_catagorys as $project_catagory ): ?>
                                                        <li><a href="<?php echo esc_url(get_term_link($project_catagory->slug, 'tronix_project_cat')) ?>"> 
                                                            <?php echo esc_html($project_catagory->name)?> 
                                                        </a></li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="project-three-icon">
                                        <a  href="<?php the_permalink(); ?>"> <i class="fas fa-plus"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata();wp_reset_query();?>
                </div>
				<?php if($settings['pagination'] == 'yes' ) { ?>
                        <?php tronixcore_paginate_nav($p); ?>
                <?php } ?>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new project_three_widget );