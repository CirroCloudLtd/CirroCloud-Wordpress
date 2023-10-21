<?php
//Single Post
CSF::createSection($TronixThemeOption, array(
    'parent' => 'Tronix_page_options',
    'title'  => esc_html__('Single Post / Post Details', 'tronix'),
    'icon'   => 'fa fa-pencil',
    'fields' => array(

        array(
			'id'      => 'single_post_default_layout',
			'type'    => 'select',
			'title'   => esc_html__( 'Layout', 'tronix' ),
			'options' => array(
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'tronix' ),
				'full-width'    => esc_html__( 'Full Width', 'tronix' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'tronix' ),
			),
			'default' => 'right-sidebar',
			'desc'    => esc_html__( 'Select single post layout', 'tronix' ),
		),

        array(
            'id'       => 'Tronix_single_post_author',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Author Name', 'tronix'),
            'text_on'  => esc_html__('Yes', 'tronix'),
            'text_off' => esc_html__('No', 'tronix'),
            'desc'     => esc_html__('Hide or show author name on post details page.', 'tronix'),
            'default'  => true
        ),
        array(
            'id'       => 'Tronix_single_post_date',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Date', 'tronix'),
            'text_on'  => esc_html__('Yes', 'tronix'),
            'text_off' => esc_html__('No', 'tronix'),
            'desc'     => esc_html__('Hide or show date on post details page.', 'tronix'),
            'default'  => true
        ),

        array(
            'id'       => 'Tronix_single_post_cmnt',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Comments Number', 'tronix'),
            'text_on'  => esc_html__('Yes', 'tronix'),
            'text_off' => esc_html__('No', 'tronix'),
            'desc'     => esc_html__('Hide or show comments number on post details page.', 'tronix'),
            'default'  => true
        ),

        array(
            'id'       => 'Tronix_single_post_cat',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Categories', 'tronix'),
            'text_on'  => esc_html__('Yes', 'tronix'),
            'text_off' => esc_html__('No', 'tronix'),
            'desc'     => esc_html__('Hide or show categories on post details page.', 'tronix'),
            'default'  => true
        ),

        array(
            'id'       => 'Tronix_single_post_tag',
            'type'     => 'switcher',
            'title'    => esc_html__('Post Tags', 'tronix'),
            'text_on'  => esc_html__('Yes', 'tronix'),
            'text_off' => esc_html__('No', 'tronix'),
            'desc'     => esc_html__('Hide or show tags on post details page.', 'tronix'),
            'default'  => true
        ),
        
        array(
            'id'       => 'Tronix_post_share',
            'type'     => 'switcher',
            'title'    => esc_html__('Social Share icons', 'tronix'),
            'text_on'  => esc_html__('Yes', 'tronix'),
            'text_off' => esc_html__('No', 'tronix'),
            'desc'     => esc_html__('Hide or show social share icons on post details page.', 'tronix'),
            'default'  => false
        ),

        array(
            'id'       => 'Tronix_author_profile',
            'type'     => 'switcher',
            'title'    => esc_html__('Author profile', 'tronix'),
            'text_on'  => esc_html__('Yes', 'tronix'),
            'text_off' => esc_html__('No', 'tronix'),
            'desc'     => esc_html__('Hide or show social share icons on post details page.', 'tronix'),
            'default'  => false
        ),

        array(
            'id'       => 'Tronix_post_nav',
            'type'     => 'switcher',
            'title'    => esc_html__('Enable Post Nav', 'tronix'),
            'text_on'  => esc_html__('Yes', 'tronix'),
            'text_off' => esc_html__('No', 'tronix'),
            'desc'     => esc_html__('Hide or show social share icons on post details page.', 'tronix'),
            'default'  => true
        ),
    ),
));