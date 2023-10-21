<?php namespace Elementor;

class tronix_bolg_two_Widget extends Widget_Base {

    public function get_name() {

        return 'tronix_blog_two';
    }

    public function get_title() {
        return esc_html__( 'Tronix Blog V2', 'tronixcore' );
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
        //Content tab start
        $this->start_controls_section(
            'blog_options',
            [
                'label' => esc_html__( 'Blogs', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'note9',
            [
                'label' => __( 'Display Item Settings', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'item_show',
            [
                'label'   => esc_html__( 'Display Item', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
                'default' => 3,
            ]
        );
        $this->add_control(
            'note3',
            [
                'label' => __( 'Enable Category Settings', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
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
            'note4',
            [
                'label' => __( 'Category Settings', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'enable_cat' => 'yes',
                ],
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
            'note5',
            [
                'label' => __( 'Order By Settings', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label'   => esc_html__( 'Order by', 'tronixcore' ),
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
        $this->add_control(
            'note6',
            [
                'label' => __( 'Order Settings', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'order',
            [
                'label'   => esc_html__( 'Order By', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC'  => esc_html__( 'ASC', 'tronixcore' ),
                    'DESE' => esc_html__( 'DESE', 'tronixcore' ),
                ],
            ]
        );
        $this->add_control(
            'note7',
            [
                'label' => __( 'Title Settings', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title_lanth',
            [
                'label'   => esc_html__( 'Title Lanth ', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 20,
                'step'    => 1,
                'default' => 7,
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'tronixcore' ),
                'description' => esc_html__( 'Add HTML Tag For Small Title', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h4',
                'options' => [
                    'h1'  => esc_html__( 'H1', 'tronixcore' ),
                    'h2'  => esc_html__( 'H2', 'tronixcore' ),
                    'h3'  => esc_html__( 'H3', 'tronixcore' ),
                    'h4'  => esc_html__( 'H4', 'tronixcore' ),
                    'h5'  => esc_html__( 'H5', 'tronixcore' ),
                    'h6'  => esc_html__( 'H6', 'tronixcore' ),
                    'p'  => esc_html__( 'P', 'tronixcore' ),
                    'span'  => esc_html__( 'span', 'tronixcore' ),
                    'div'  => esc_html__( 'Div', 'tronixcore' ),
                ],
            ]
        );
        $this->add_control(
            'note8',
            [
                'label' => __( 'Content Settings', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'enable_dec',
            [
                'label' => esc_html__( 'Enable Content', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'tronixcore' ),
                'label_off' => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'dec_lanth',
            [
                'label'   => esc_html__( 'Content Lanth ', 'tronixcore' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 50,
                'step'    => 1,
                'default' => 12,
                'condition' => [
                    'enable_dec' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'enable_button',
            [
                'label'        => esc_html__( 'Button Enable', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Buttom Test', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Read More', 'tronixcore' ),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'note11',
            [
                'label' => __( 'Date Settings', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'enable_date',
            [
                'label'        => esc_html__( 'Date Enable', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'note114',
            [
                'label' => __( 'Author Settings', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'enable_author',
            [
                'label'        => esc_html__( 'Author Enable', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        
        $this->add_control(
            'note012',
            [
                'label' => __( 'Container Settings', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'note10',
            [
                'label' => __( 'Post navication Settings', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'navication',
            [
                'label'        => esc_html__( 'Pagination', 'tronixcore' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'tronixcore' ),
                'label_off'    => esc_html__( 'Hide', 'tronixcore' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'container',
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
            'note12',
            [
                'label' => __( 'Column Settings', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'desktop_col',
            [
                'label'   => __( 'Columns On Desktop', 'tronixcore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-xl-4',
                'options' => [
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
                'label'   => __( 'Columns for Laptop', 'tronixcore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-lg-4',
                'options' => [
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
                'label'   => __( 'Columns On Tablet', 'tronixcore' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-md-6',
                'options' => [
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
            'box_css',
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
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'box_bg',
                'label' => esc_html__( 'Background', 'tronixcore' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .news-block-two .news-inner-box-two',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .news-block-two .news-inner-box-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .news-block-two .news-inner-box-two',
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
                    '{{WRAPPER}} .news-block-two .news-inner-box-two' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .news-block-two .news-inner-box-two',
            ]
        );
        $this->end_controls_section();

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
                'label' => esc_html__( 'Height', 'tronixcore' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px','%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .news-image-two img' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .news-image-two img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => esc_html__( 'Border', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .news-block-two .news-inner-box-two .news-image-two',
            ]
        );
        
        $this->add_responsive_control(
            'image_radius',
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
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .news-image-two' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .news-image-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .news-image-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        

        // =================================================
        // ================ Meta Box STYLE CSS =============
        // =================================================

        $this->start_controls_section(
            'meta_css',
            [
                'label' => esc_html__( 'Meta Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .post-info li',
            ]
        );
        $this->add_responsive_control(
            'meta_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .post-info li' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .post-info li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_hcolor',
            [
                'label' => esc_html__( 'Hover Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .post-info li:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .post-info li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .post-info li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_padding',
            [
                'label' => esc_html__( 'Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .post-info li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'note_icon',
            [
                'label' => __( 'meta Icon Options', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'meta_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .post-info li i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'meta_icon_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .post-info li i',
            ]
        );
        $this->add_responsive_control(
            'i_margin',
            [
                'label' => esc_html__( 'Icon Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .post-info li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'i_padding',
            [
                'label' => esc_html__( 'Icon Padding', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .post-info li i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'title_css',
            [
                'label' => esc_html__( 'Title', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .blog-two-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .blog-two-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_hcolor',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .blog-two-title a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'tilte_margin',
            [
                'label' => esc_html__( 'Margin', 'tronixcore' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .blog-two-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .news-block-two .news-inner-box-two .lower-content .blog-two-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // =================================================
        // ================ Description STYLE CSS =============
        // =================================================

        $this->start_controls_section(
            'dec_css',
            [
                'label' => esc_html__( 'Description Style', 'tronixcore' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_dec' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'dec_typo',
                'label' => esc_html__( 'Typography', 'tronixcore' ),
                'selector' => '{{WRAPPER}} .lower-content .tronix-blog-dec',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__( 'Color', 'tronixcore' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lower-content .tronix-blog-dec' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .lower-content .tronix-blog-dec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .lower-content .tronix-blog-dec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

             // 
        // ========= BUTTON  STYLE START ========//
        // 

       
        $this->start_controls_section(
            'btn_style',
            [
                'label' => esc_html__( 'Button Style ', 'tronixcore' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'btn_typo',
                'selector' => '{{WRAPPER}} .news-button .theme-button',
            ]
        );
        $this->add_responsive_control(
            'btn_color',
            [
                'label'     => esc_html__( 'Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-button .theme-button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_color_hover',
            [
                'label'     => esc_html__( 'Hover Color', 'tronixcore' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .news-button .theme-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_Margin',
            [
                'label'      => esc_html__( 'Margin', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .news-button .theme-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label'      => esc_html__( 'Padding', 'tronixcore' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .news-button .theme-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


    }
    //Render
    protected function render() {
        $settings = $this->get_settings_for_display();
        $column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
        global $post;
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        if ( $settings['enable_cat'] == 'yes' && !empty( $settings['post_cat'] ) ) {
            $p = new \WP_Query( array(
                'posts_per_page' => $settings['item_show'],
                'post_type'      => 'post',
                'paged'          => $paged,
                'orderby'        => esc_attr( $settings['orderby'] ),
                'order'          => esc_attr( $settings['order'] ),
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
                'posts_per_page' => $settings['item_show'],
                'post_type'      => 'post',
                'paged'          => $paged,
                'orderby'        => esc_attr( $settings['orderby'] ),
                'order'          => esc_attr( $settings['order'] ),
            ) );
        }
        if( $settings['container'] == 'yes' ){
            $container = 'container';
        }else{
            $container = 'container-fluid';
        }
        ob_start();
        ?>
        <div class="tronix-blog-wrapper-two">
            <div class="tronix-blog--two-inner-section">
                <div class="<?php echo esc_attr($container); ?>">
                    <div class="row">
                        <?php while ( $p->have_posts() ): $p->the_post(); ?>
                            <div class="<?php echo esc_attr( $column ); ?> col-sm-12 ">
                                <div class="news-block-two">
                                    <div class="news-inner-box-two">
                                    <?php if ( has_post_thumbnail() ): ?>
                                        <div class="news-image-two">
                                            <a href="<?php echo the_permalink(); ?>">  <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );?> </a>
                                            <?php if($settings['enable_date'] == 'yes' ) : ?>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif;?>
                                        <div class="lower-content">
                                            <ul class="post-info clearfix">
                                                <li><i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?> </li>
                                                <li><i class="far fa-folder-open"></i>  <?php the_category(','); ?> </li>
                                            
                                            </ul>
                                            <<?php echo esc_attr($settings['title_tag']);?> class="blog-two-title">
                                                <a href="<?php echo the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $settings['title_lanth'] ); ?></a>
                                            </<?php echo esc_attr($settings['title_tag']);?>>
                                            <?php if($settings['enable_dec'] == 'yes' ) : ?>
                                                <div class="tronix-blog-dec"><?php echo wp_trim_words( get_the_content(), $settings['dec_lanth'] ); ?></div>
                                            <?php endif; ?>
                                            <?php if($settings['enable_button'] == 'yes' ) :?>
                                                <div class="news-button">
                                                    <a href="<?php echo the_permalink(); ?>" class="theme-button"> <?php echo esc_html($settings['button_text']); ?><i class="fas fa-arrow-right"></i> </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_query();?>
                        <?php if ( $settings['navication'] == 'yes' ) {?>
                            <?php tronixcore_paginate_nav( $p );?>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <?php
echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register( new tronix_bolg_two_Widget );