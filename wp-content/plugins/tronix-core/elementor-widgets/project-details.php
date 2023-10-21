<?php namespace Elementor;

class project_details_widget extends Widget_Base {

    public function get_name() {

        return 'project_details';
    }

    public function get_title() {
        return esc_html__( 'Tronix Project Details', 'tronixcore' );
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
            'portfolio_details_options',
            [
                'label' => esc_html__( 'Portfolio Details', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_responsive_control(
            'select_iamge',
            [
                'label' => esc_html__( 'Image type', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'featured',
                'options' => [
                    'featured'  => esc_html__( 'Featured', 'tronixcore' ),
                    'custom' => esc_html__( 'Custom', 'tronixcore' ),
                ],
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __( 'Choose Image', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'select_iamge' => 'custom',
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'A large company ', 'tronixcore' ),
                'dynamic' => [
                   'active' => true,
                ],
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label'   => __( 'Select Title Tag', 'tronixcore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'h1',
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

        // *********************************************************
        //                Box  Style Css
        // *********************************************************

        $this->start_controls_section(
            'box_css_options',
            [
                'label' => esc_html__( 'Box', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'box_alignment',
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
                    'justify' => [
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
                    '{{WRAPPER}} .eco-portfolio-details-wrapper' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_bg',
                'label'    => esc_html__( 'Background', 'tronixcore' ),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-portfolio-details-wrapper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .eco-portfolio-details-wrapper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .eco-portfolio-details-wrapper',
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
                    '{{WRAPPER}} .eco-portfolio-details-wrapper' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-portfolio-details-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-portfolio-details-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // *********************************************************
        //                Image  Style Css
        // *********************************************************

        $this->start_controls_section(
            'image_css',
            [
                'label' => esc_html__( 'Image', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label'      => esc_html__( 'Height', 'tronixcore' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 800,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .project-details-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'object',
            [
                'label'     => esc_html__( 'Object Fit', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'cover',
                'options'   => [
                    'fill'    => esc_html__( 'Fill', 'tronixcore' ),
                    'contain' => esc_html__( 'Contain', 'tronixcore' ),
                    'cover'   => esc_html__( 'Cover', 'tronixcore' ),
                    'none'    => esc_html__( 'None', 'tronixcore' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .project-details-image img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .project-details-image img',
            ]
        );

        $this->add_responsive_control(
            'image_radius',
            [
                'label'      => esc_html__( 'image Radius', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-details-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'image_shadow',
                'label'    => esc_html__( 'Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .project-details-image img',
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-details-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .project-details-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        
        // *********************************************************
        //                Content  Style Css
        // *********************************************************

        $this->start_controls_section(
            'content_css',
            [
                'label' => esc_html__( 'Content', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'content_tabs'
        );
        $this->start_controls_tab(
            'content_tab_title',
            [
                'label' => __( 'Title', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .portfolio-details-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details-title a' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .portfolio-details-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .portfolio-details-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'des_tab_stitle',
            [
                'label' => __( 'Descrtiption', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'des_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .portfolio-content',
            ]
        );
        $this->add_responsive_control(
            'des_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'des_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'des_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();


        // *********************************************************
        //                Portfolio Details  Style Css
        // *********************************************************
        $this->start_controls_section(
            'port_content_css',
            [
                'label' => esc_html__( 'Portfolio List Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'port_content_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'port_content_paddng',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'port_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .portfolio-details ul li',
			]
		);
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'port_content_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .portfolio-details ul li',
            ]
        );
        $this->add_responsive_control(
            'port_content_radius',
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
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details ul li' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'port_content_shadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .portfolio-details ul li',
            ]
        );
        $this->start_controls_tabs(
            'content_list_tabs'
        );
        $this->start_controls_tab(
            'content_tab_ltitle',
            [
                'label' => __( 'Title', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ltitle_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .portfolio-name',
            ]
        );
        $this->add_responsive_control(
            'ltitle_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ltitle_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ltitle_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
                
        $this->start_controls_tab(
            'label_tab_stitle',
            [
                'label' => __( 'Label', 'tronixcore' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'label_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .portfolio-details ul li span',
            ]
        );
        $this->add_responsive_control(
            'label_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details ul li span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'label_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details ul li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'label_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details ul li span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $unique = get_the_ID();
        $portfolio_meta = get_post_meta( $unique, 'tronix_project', true );
        ob_start();
        ?>
        <div class="project-details-wrapper">
            <div class="container">
                <div class="project-details-image">
                    <?php if($settings['select_iamge'] == 'featured' ){
                        the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );
                        }else{
                        echo wp_get_attachment_image( $settings['image']['id'], 'full' );
                        } ?>
                </div>
                <div class="project-details-content">
                    <!-- Title -->
                    <?php $project_catagorys = get_the_terms( get_the_ID(), 'tronix_project_cat' );
                        if ( $project_catagorys && ! is_wp_error( $project_catagorys ) ) : ?>
                        <div class="project-details-category">
                            <ul>
                                <?php  foreach($project_catagorys as $project_catagory ): ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_term_link($project_catagory->slug, 'tronix_project_cat')) ?>"> 
                                            <?php echo esc_html($project_catagory->name)?> 
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if( !empty( $settings['title']) ) : ?>
                        <<?php echo esc_attr($settings['title_tag']); ?> class="project-details-title">
                            <?php echo esc_html($settings['title']); ?>
                        </<?php echo esc_attr($settings['title_tag']); ?>>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
        echo ob_get_clean();

    }
}
Plugin::instance()->widgets_manager->register( new project_details_widget );